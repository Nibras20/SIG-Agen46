@extends('layouts.dashboardadmin-volt')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />

    <style>
        #map {
            height: 400px;
        }

        .location-inputs {
            margin-bottom: 15px;
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

                    <li class="breadcrumb-item active" aria-current="page">Cek Lokasi BNI Agen46</li>
                </ol>
            </nav>
            <h2 class="h4">Temukan Lokasi Agen46 di Sekitar Anda</h2>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="location-inputs">
                            <button id="useGeolocation" class="btn btn-primary">Gunakan Lokasi Saya</button>
                            <button id="useManualLocation" class="btn btn-primary">Gunakan Lokasi Manual</button>
                            <button id="toggleCircleButton" class="btn btn-secondary">Radius</button>
                            <div id="manualLocationInputs" style="display: none;">
                                <label for="latitude">Latitude:</label>
                                <input type="text" id="latitude" class="form-control" placeholder="Masukkan Latitude">
                                <label for="longitude">Longitude:</label>
                                <input type="text" id="longitude" class="form-control" placeholder="Masukkan Longitude">
                                <button id="submitManualLocation" class="btn btn-success mt-2">Submit</button>
                            </div>
                        </div>
                        <input type="hidden" id="lokasi">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

    <script>
        var lokasi = document.getElementById('lokasi');
        var routingControl = null;
        var circle = null;
        var map;

        // Function to get and use geolocation
        function useGeolocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            }
        }

        document.getElementById('useGeolocation').addEventListener('click', function() {
            document.getElementById('manualLocationInputs').style.display = 'none';
            useGeolocation();
        });

        document.getElementById('useManualLocation').addEventListener('click', function() {
            document.getElementById('manualLocationInputs').style.display = 'block';
        });

        document.getElementById('submitManualLocation').addEventListener('click', function() {
            let lat = parseFloat(document.getElementById('latitude').value);
            let lng = parseFloat(document.getElementById('longitude').value);
            if (!isNaN(lat) && !isNaN(lng)) {
                let userLocation = {
                    latitude: lat,
                    longitude: lng
                };
                initializeMap(userLocation);
            } else {
                alert('Masukkan koordinat yang valid');
            }
        });

        function getStoreLocationDistance(userLocation) {
            return $.ajax({
                url: route('api.agen.json'),
                method: 'GET',
                data: {
                    userLocation
                },
                async: false
            }).responseJSON;
        }

        function successCallback(position) {
            let userLocation = {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude
            };
            initializeMap(userLocation);
        }

        function errorCallback(error) {
            console.error("Geolocation error: ", error.message);
            // Handle geolocation error appropriately
            // Example: Provide a fallback location or display an error message to the user
        }

        function initializeMap(userLocation) {
            if (map) {
                map.remove();
            }

            map = L.map('map').setView([userLocation.latitude, userLocation.longitude], 18);

            let storeLocation = getStoreLocationDistance(userLocation);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            var userMarker = L.marker([userLocation.latitude, userLocation.longitude], {
                icon: L.icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34]
                })
            }).addTo(map).bindPopup("Lokasi Saya").openPopup();

            if (circle) {
                map.removeLayer(circle);
            }

            circle = L.circle([userLocation.latitude, userLocation.longitude], {
                color: 'green',
                fillColor: '#BCFEA3',
                fillOpacity: 0.5,
                radius: 1000
            }).addTo(map);

            // Euclidean
            // $.each(storeLocation.data, (index, store) => {
            //     L.marker([store.latitude, store.longitude]).addTo(map).bindPopup(
            //         `Agen46 ${store.nama_agen}, jarak anda ${store.distance} meter dari lokasi agen`);
            // })

            // Modifikasi Euclidean
            storeLocation.data.forEach((store) => {
                let markerIconUrl = store.distance > 1000 ?
                    'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png' :
                    'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png';

                circle1 = L.circle([store.latitude, store.longitude], {
                    color: 'yellow',
                    fillColor: '#BCFEA3',
                    fillOpacity: 0.5,
                    radius: 1000
                }).addTo(map);

                let storeMarker = L.marker([store.latitude, store.longitude], {
                    icon: L.icon({
                        iconUrl: markerIconUrl,
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34]
                    })
                }).addTo(map).bindTooltip(
                    `<b>Nama Agen46 : ${store.nama_agen}</b><br>
                    Jarak anda ${store.distance} meter dari lokasi agen`, {
                        permanent: true,
                        direction: "top",
                        offset: [0, -36]
                    } // Atur pop up diatas marker
                ).bindPopup(
                    `<b>Nama Agen46 : ${store.nama_agen}</b><br>
                    Alamat Agen46 : ${store.alamat} <br>
                    Kecamatan Agen46 : ${store.kecamatan} <br>
                    Kota/Kab Agen46 : ${store.kota} <br>
                    Keterangan : ${store.keterangan} <br>
                    <b>Jarak anda ${store.distance} meter dari lokasi agen</b>`
                );

                storeMarker.on('click', function() {
                    storeMarker.unbindTooltip();
                    storeMarker.openPopup();

                    storeMarker.on('popupclose', function() {
                        storeMarker.bindTooltip(
                            `<b>Nama Agen46 : ${store.nama_agen}</b><br>
                            Jarak anda ${store.distance} meter dari lokasi agen`, {
                                permanent: true,
                                direction: "top",
                                offset: [0, -36]
                            } // Atur pop up diatas marker
                        );
                    });

                    if (routingControl) {
                        map.removeControl(routingControl);
                    }
                    routingControl = L.Routing.control({
                        waypoints: [
                            L.latLng(userLocation.latitude, userLocation.longitude),
                            L.latLng(store.latitude, store.longitude)
                        ],
                        routeWhileDragging: true
                    }).addTo(map);
                });
            });

            // Atur ulang toggle circle button pada event listener setiap dibuka
            document.getElementById('toggleCircleButton').addEventListener('click', toggleCircle);
        }

        function toggleCircle() {
            if (map.hasLayer(circle)) {
                map.removeLayer(circle);
            } else {
                map.addLayer(circle);
            }
        }

        // Buka map secara default
        window.onload = useGeolocation;
    </script>
@endpush
