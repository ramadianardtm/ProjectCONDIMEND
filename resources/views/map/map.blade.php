<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google Map</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>

<body>
    <div id="map" class="h-screen w-screen relative">
        <div class="z-1000 absolute top-4 left-10 w-auto">
            <form action="" method="post">
                <input type="text" autocomplete="off" id="keyword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange focus:border-orange focus:outline-none block w-96 py-5 px-3 text-center dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lokasi, Kode Pos, ...">
            </form>
            @foreach($parkir as $pr)
            <div id="container">
                <div class="block mt-2 max-w-sm max-h-70vh p-2 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-auto">
                    <a href="detail/{{$pr['id']}}" class="flex justify-center w-full p-2 bg-white border border-gray-200 rounded-lg shadow-md mt-4">
                        <div class="w-2/5">
                            <img src="/storage/{{ $pr->image }}" class="rounded-xl" alt="tempat parkir">
                        </div>
                        <div class="w-3/5 p-1 text-blueDarker">
                            <p class="truncate">{{$pr->name}}</p>
                            @php $rating = 1.6; @endphp

                            @foreach (range(1, 5) as $i)
                            <span class="fa-stack" style="width:1em">
                                <i class="far fa-star fa-stack-1x"></i>

                                @if ($rating > 0)
                                @if ($rating > 0.5)
                                <i class="fas fa-star text-orange fa-stack-1x"></i>
                                @else
                                <i class="fas fa-star-half fa-stack-1x"></i>
                                @endif
                                @endif
                                @php $rating--; @endphp
                            </span>
                            @endforeach
                            <p class="truncate">{{ $pr->lokasi }}</p>
                            <p class="truncate">67 meter</p>
                            <p class="truncate">Rp {{ $pr->biaya }} / jam</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        var keyword = document.getElementById('keyword');
        var container = document.getElementById('container');

        keyword.addEventListener('keyup', function() {

            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log('ajax ok');

                }
            }

            // xhr.open('GET', 'map.map',true);
            // xhr.send();

        });
    </script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        var map = L.map('map', {
            zoomControl: false
        }).setView([-7.616882175138912, 110.30778782424002], 11);
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

        var marker = L.marker([-7.616882175138912, 110.30778782424002], {
            icon: iconMarker
        }).addTo(map);

        const successCallback = (position) => {
            console.log(position);
        };

        const errorCallback = (error) => {
            console.log(error);
        };

        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    </script>
</body>

</html>