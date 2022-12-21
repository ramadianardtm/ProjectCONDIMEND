<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['name']}}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>

<body>
    <div id="map" class="h-screen w-screen relative">
        <div class="z-1000 absolute top-4 left-10 w-auto">
            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange focus:border-orange focus:outline-none block w-96 py-5 px-8 text-center dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <p class="truncate">{{$data['lokasi']}}</p>
            </div>
            <div class="max-w-sm mt-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="/storage/{{ $data->image }}" alt="" />
                </a>
                <div class="p-5 overflow-auto" style="max-height: 40vh">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$data['name']}}</h5>
                    <p class="my-2 text-base text-blueDarker">{{$data['lokasi']}}</p>
                    <div class="flex text-base text-blueDarker my-2">
                        <div class="w-1/2">
                            <p>Parkir Tersedia</p>
                            <p>Biaya Parkir</p>
                        </div>
                        <div class="w-1/2">
                            <p>{{$data['slot']}}/{{$data['slotmaksimal']}}</p>
                            <p>Rp {{$data['biaya']}} / jam</p>
                        </div>
                    </div>
                    <a href="/reservasi/{{$data['id']}}"><button  type="button" class="focus:outline-none w-full bg-orange font-medium rounded-lg text-base px-5 py-2 mr-2 mb-2">Reservasi</button></a>
                </div>
            </div>

        </div>
    </div>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        var lat = <?php echo json_encode($data['latitude'])?>;
        var long = <?php echo json_encode($data['longitude'])?>;

        var map = L.map('map', {
            zoomControl: false
        }).setView([lat,long], 11);
        // map layer
        L.tileLayer('http://mts1.google.com/vt/lyrs=m&hl=id&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            attribution: '&copy; <a target="_blank" href="http://www.google.com/maps">GoogleMap</a>',
        }).addTo(map);
        // zoom control
        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);

        // marker
        var iconMarker = L.icon({
            iconUrl: "{{ asset('images/marker.png') }}", // image url
            iconSize: [40, 70], // size of the icon
            iconAnchor: [20, 70], // point of the icon which will correspond to marker's location
            popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        var marker = L.marker([lat, long], {
            icon: iconMarker
        }).addTo(map).bindPopup('Tangcity Mall');
    </script>
</body>

</html>