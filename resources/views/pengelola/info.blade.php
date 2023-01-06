@extends('user.template')
@section('title', 'Dashboard - Info')

@section('content')

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
</head>
<style>
    .btn-linkacc {
        color: #838383;
        font-weight: 400;
        width: 180px;
        font-size: 16px;
        border: solid 1px #ACB8C2;
        border-radius: 10px;
    }

    .payment-logo {
        justify-content: center;
        text-align: center;
        display: block;
        align-items: center;
        object-fit: fill;
    }

    .btn-edit {
        color: #183153;
        font-weight: 400;
        width: 230px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #D98829;
    }
    .btn-reg {
        color: #fff;
        font-weight: 400;
        width: 230px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #564b46;
    }

    .btn-reg:hover {
        color: #fff;
        font-weight: 400;
        width: 230px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #876f61;
    }
</style>
<div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-80vh overflow-auto p-4">
    @if ($errors->any())
    <div class="flex w-full p-4 mb-4 text-sm text-white bg-red-700 rounded-lg self-start" role="alert">
        <ul class="mt-1.5 text-blue-700 list-disc list-inside">
            {!! implode('', $errors->all('<li style="color: #373737;">:message</li>')) !!}
        </ul>
    </div>
    @endif
    @foreach ($parkir as $cat)

    <form action="" method="post" class="w-full" enctype="multipart/form-data">
        @csrf
        <div class="row text-left">
            <div class="col-sm-12 mt-2">
                <input value="{{ $cat->latitude }}" type="hidden" class="form-control" id="latitude" name="latitude">
                <input value="{{ $cat->longitude }}" type="hidden" class="form-control" id="longitude" name="longitude">
                <div id="mymap" style="width:100%;height:300px"></div>
            </div>
        </div>

        <div class="form-group mt-3 row">
            <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">Lokasi</label>
            <div class="col-sm-10">
                <input value="{{ $cat->lokasi }}" type="text" id="lokasi" class="form-control" placeholder="Lokasi" name="lokasi">
            </div>
        </div>
        <div class="form-group mt-3 row">
            <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">Nama Parkir</label>
            <div class="col-sm-10">
                <input value="{{ $cat->name }}" type="text" id="name" class="form-control" placeholder="Nama Parkir" name="name">
            </div>
        </div>
        <div class="form-group mt-3 row">
            <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">Parkir Tersedia</label>
            <div class="col-sm-10">
                <input value="{{ $cat->slot }}" type="text" id="slot" class="form-control" placeholder="Spot Parkir Tersedia" name="slot">
            </div>
        </div>
        <div class="form-group mt-3 row">
            <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">Total Spot Parkir</label>
            <div class="col-sm-10">
                <input value="{{ $cat->slotmaksimal }}" type="text" id="slotmaksimal" class="form-control" placeholder="Total Spot Parkir" name="slotmaksimal">
            </div>
        </div>
        <div class="form-group mt-3 row">
            <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">Biaya per Jam</label>
            <div class="col-sm-10">
                <input value="{{ $cat->biaya }}" type="text" id="biaya" class="form-control" placeholder="Biaya per Jam" name="biaya">
            </div>
        </div>

        <div class="text-center" style="float: right;">
            <button type="submit" class="btn btn-edit mx-2">Modifikasi</button>
        </div>
    </form>
    @endforeach

</div>
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
        $("#lokasi").val(position.lat + "," + position.lng);
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
        lokasiInput.value = lat + "," + lng;
        console.log(lat);
        console.log(lng);
    })
</script>
@endsection