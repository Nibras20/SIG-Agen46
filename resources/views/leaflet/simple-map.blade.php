@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <style>
        #map {
            height: 400px;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="home">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Cek Lokasi</li>
                </ol>
            </nav>
            <h2 class="h4">Cek Lokasi</h2>
            <p class="mb-0">Temukan lokasi Agen46 di sekitar anda.</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" id="lokasi">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        
        var lokasi = document.getElementById('lokasi');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        }

        function successCallback(position) {
            //lokasi.value = position.coords.latitude + "," + position.coords.longitude;
            var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 18);
            var map = L.map('map').setView([-7.63336818122693, 111.54137712336089], 18);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            var circle = L.circle([-7.63336818122693, 111.54137712336089], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 25
            }).addTo(map);

            var MarkerIcon = L.Icon.extend({
                options: {
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34]
                }
            });

            

            var lokasiuser = new MarkerIcon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png'
            });

            var lokasiuser = L.marker([-7.63336818122693, 111.54137712336089], {
                icon: lokasiuser
            }).addTo(map).bindPopup("Lokasi Saya");

            let latUser = -7.633458371155025;
            let longUser = 111.54138457462933;

            let latStore = -7.634088897474204;
            let longStore  = 111.5419429855499;

            let distance = ((Math.sqrt(Math.pow(latUser - latStore, 2) + Math.pow(longUser - longStore, 2))*111.319)*1000);

            console.log(distance)

            var lokasi1 = L.marker([latStore, longStore]).addTo(map).bindPopup(`Store 1 distance from user loc is ${distance} / `  + distance);
            var lokasi2 = L.marker([-7.633515985592806, 111.54094330261117]).addTo(map).bindPopup("Toko Sejahtera");

        }

        function errorCallback() {

        }
        
    </script>
@endpush
