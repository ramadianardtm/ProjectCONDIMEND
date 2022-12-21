@extends('user.template')
@section('title', 'Register Tempat Parkir')

@section('content')
<html>

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
</head>
<style>
    .home {
        margin-left: 18rem;
        margin-right: 18rem;
        margin-top: 3rem;
    }

    .banner1 {
        width: 100%;
        padding-left: 25rem;
        padding-right: 25rem;

    }

    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        width: 100%;
        height: 100%;
        background-color: #C4C4C4;
        display: inline-block;
        text-align: center;
        align-items: center;
        padding: 40px;
        cursor: pointer;
    }

    .btn-reg {
        color: #183153;
        font-weight: 400;
        width: 300px;
        margin-top: 20px;
        font-size: 16px;
        border-radius: 4px;
        background-color: #D98829;
    }
</style>

<body>

    <div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-150vh overflow-auto p-4">
        <div class="row">
            <i class=" col-sm-1 fas fa-chevron-left text-4xl self-start" onclick="history.back()"></i>
            <p class="col text-blueDark text-xl" style="font-size: 30px;">Register Tempat Parkir</p>
            @if ($errors->any())
            <div class="flex w-full p-4 mb-4 text-sm text-white bg-red-700 rounded-lg self-start" role="alert">
                <ul class="mt-1.5 text-blue-700 list-disc list-inside">
                    {!! implode('', $errors->all('<li style="color: #373737;">:message</li>')) !!}
                </ul>
            </div>
            @endif
        </div>
        @if($parkir)
        <div class="text-center" style="padding: 60px;margin-bottom:50px;">
            <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
            <br>
            <h5 style="margin-top: 20px;">Mohon maaf anda telah register tempat parkir</h5>
        </div>
        @else
        <div class="block w-full p-4 bg-white border border-gray-200 rounded-lg shadow-md mt-4">
            <div class="w-full flex justify-center">
                <form action="{{ route('pengelola.regparkir') }}" method="POST" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <div class="row text-left">
                        <div class="col-sm-6">
                            <label for="name" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Tempat Parkir</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nama Tempat Parkir" aria-label="First name">
                        </div>
                        <div class="col-sm-3">
                            <label for="slot" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Slot Parkir</label>
                            <input type="text" id="slot" name="slot" class="form-control" placeholder="Slot Parkir" aria-label="First name">
                        </div>
                        <div class="col-sm-3">
                            <label for="confirm_password" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya per Jam</label>
                            <input type="text" id="biaya" name="biaya" class="form-control" placeholder="Biaya per Jam" aria-label="Biaya">
                        </div>
                        <div class="col-sm-12 mt-2">
                            <label for="lokasi" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Perusahaan</label>
                            <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Posisi Lokasi" aria-label="Lokasi">
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label class="custom-file-upload">
                                <i class="fa-solid fa-plus" style="color:#5B5B5B;font-size:50px;"></i>
                                <p style="color:#373737;">Upload Foto Lokasi Parkir</p>
                                <input type="file" id="image" name="image" class="form-control" aria-label="">
                            </label>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <input type="hidden" class="form-control" id="latitude" name="latitude">
                            <input type="hidden" class="form-control" id="longitude" name="longitude">
                            <div id="mymap" style="width:100%;height:165px"></div>
                        </div>
                    </div>
                    <div class="center text-center">
                        <button type="submit" class="btn btn-reg mx-2">Register</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>
    var mymap = L.map('mymap').setView([-7.616882175138912, 110.30778782424002], 16);
    // map layer
    L.tileLayer('http://mts1.google.com/vt/lyrs=m&hl=id&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        attribution: '&copy; <a target="_blank" href="http://www.google.com/maps">GoogleMap</a>',
    }).addTo(mymap);
    // zoom control
    L.control.zoom({
        position: 'bottomright'
    }).addTo(mymap);

    //get coordination
    var latInput = document.querySelector("[name=latitude]");
    var lngInput = document.querySelector("[name=longitude]");
    var lokasiInput = document.querySelector("[name=lokasi]");
    var curLocation = [-7.616882175138912, 110.30778782424002];

    mymap.attributionControl.setPrefix(false);



    // marker
    var iconMarker = L.icon({
        iconUrl: "{{ asset('images/marker-1.png') }}", // image url
        iconSize: [40, 50], // size of the icon
        iconAnchor: [20, 70], // point of the icon which will correspond to marker's location
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    var marker = L.marker(curLocation, {
        icon: iconMarker,
        draggable: true
    }).addTo(mymap);

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true',
        }).bindPopup(position).update();
        console.log(event);
        $("#latitude").val(position.lat);
        $("#longitude").val(position.lng);
        $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + position.lat + '&lon=' + position.lng + '', function(data) {

            $("#lokasi").val(data.display_name);
        });

    });

    mymap.addLayer(marker);

    mymap.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(mymap);
        } else {
            marker.setLatLng(e.latlng);
        }
        latInput.value = lat;
        lngInput.value = lng;
        $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + lat + '&lon=' + lng + '', function(data) {
            lokasiInput.value = data.display_name;
        });

    })
</script>

@endsection

</html>