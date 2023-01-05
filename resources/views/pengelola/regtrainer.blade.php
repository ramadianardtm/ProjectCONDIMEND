@extends('user.template')
@section('title', 'Add Trainer | CONDIMEND')

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
        background-color: #fff;
        border: solid 1px #c4c4c4;
        display: inline-block;
        text-align: center;
        align-items: center;
        padding: 40px;
        cursor: pointer;
    }

    .btn-reg {
        color: #fff;
        font-weight: 400;
        width: 300px;
        margin-top: 20px;
        font-size: 16px;
        border-radius: 4px;
        background-color: #0bd18c;
    }

    .btn-reg:hover {
        color: #fff;
        font-weight: 400;
        width: 300px;
        margin-top: 20px;
        font-size: 16px;
        border-radius: 4px;
        background-color: #0dffaa;
    }
</style>

<body>

    <div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-150vh overflow-auto p-4">
        <div class="row">
            <p class="col text-blueDark text-xl" style="font-size: 28px;">Add Trainer</p>
            @if ($errors->any())
            <div class="flex w-full p-4 mb-4 text-sm text-white bg-red-700 rounded-lg self-start" role="alert">
                <ul class="mt-1.5 text-blue-700 list-disc list-inside">
                    {!! implode('', $errors->all('<li style="color: #373737;">:message</li>')) !!}
                </ul>
            </div>
            @endif
        </div>
        <div class="block w-full p-4 bg-white border border-gray-200 rounded-lg shadow-md mt-4">
            <div class="w-full flex justify-center">
                <form action="{{ route('pengelola.regtrainer') }}" method="POST" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <div class="row text-left">
                        <div class="col-sm-12 mb-3">
                            <div class="before" id="before" style="display: block;">
                                <label class="custom-file-upload">
                                    <i class="fa-solid fa-plus" style="color:#5B5B5B;font-size:50px;"></i>
                                    <p style="color:#373737;">Trainer Image</p>
                                    <input type="file" onchange="loadFile(this)" id="image" name="image" class="form-control-file">
                                </label>
                            </div>
                            <div class="after" id="after" style="display: none;">
                                <center>
                                    <img class="mb-2" id="output" style="max-width: 100%;height:200px;object-fit:cover;" />
                                </center>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="name" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Trainer Name</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Insert Trainer Name">
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="name" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Trainer Detail</label>
                            <input id="detail" name="detail" type="text" class="form-control" placeholder="Insert Trainer Detail">
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="name" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Trainer Speciality</label>
                            <input id="special" name="special" type="text" class="form-control" placeholder="Insert Trainer Speciality">
                        </div>
                    <div class="col-sm-12 center text-center">
                        <button type="submit" class="btn btn-reg mx-2">Add Trainer</button>
                    </div>
                </form>
            </div>
        </div>
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
<script>
    var loadFile = function(e) {
        console.log('masuk');
        var output = document.getElementById('output');
        document.getElementById('before').style.display = 'none';
        document.getElementById('after').style.display = 'block';

        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection

</html>