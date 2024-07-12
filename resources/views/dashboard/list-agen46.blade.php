@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .pagination-controls {
            display: flex;
            align-items: center;
        }

        .pagination-controls label {
            margin-right: 10px;
            /* Mengatur jarak antara label "Show" dan dropdown */
        }

        .pagination-controls .form-select {
            flex-grow: 1;
            /* Menyesuaikan panjang dropdown pagination dengan ruang tersedia */
            min-width: 4rem;
            /* Lebar minimum untuk dropdown pagination */
        }
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="dashboardadmin">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">List BNI Agen46</li>
                </ol>
            </nav>
            <h2 class="h4">List Agen46</h2>
            <p class="mb-0">Temukan Data Agen46.</p>
        </div>
    </div>

    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <!-- Metode Lokasi dan Pagination Controls -->
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h4">Pilih Metode Lokasi</h2>
                <div class="mb-3">
                    <button class="btn btn-primary" id="useGeolocation">Gunakan Lokasi Saya</button>
                    <button class="btn btn-primary" id="useManualLocation">Gunakan Lokasi Manual</button>
                </div>
                <div id="manualLocationInputs" style="display: none;">
                    <div class="form-group">
                        <label for="latitude">Latitude:</label>
                        <input type="text" class="form-control" id="latitude" placeholder="Enter latitude">
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude:</label>
                        <input type="text" class="form-control" id="longitude" placeholder="Enter longitude">
                    </div>
                    <button class="btn btn-primary" id="submitManualLocation">Submit</button>
                </div>
            </div>
            <div class="d-flex align-items-center mt-3">
                <input type="text" id="dataTableSearch" class="form-control form-control-sm me-3" placeholder="Search">
                <div class="pagination-controls">
                    <label for="pageLengthSelect" class="me-2 mt-1">Show:</label>
                    <select class="form-select form-select-sm" id="pageLengthSelect">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Data Table -->
        <table id="dataAgenTable" class="display">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kecamatan</th>
                    <th>Kota</th>
                    <th>Keterangan</th>
                    <th>Jarak(m)</th>
                </tr>
            </thead>
            <tbody id="storeTableBody">
                <!-- Table rows will be dynamically populated -->
            </tbody>
        </table>
    </div>
@endsection

@push('javascript')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var table;

            // Initialize DataTable with options
            function initializeDataTable() {
                table = $('#dataAgenTable').DataTable({
                    dom: 'lrtip', // Remove default search input
                    lengthChange: false, // Disable show entries feature
                    ordering: true, // Enable sorting for all columns
                    info: true, // Show "Showing X to Y of Z entries"
                    paging: true, // Enable pagination
                    pageLength: 5, // Set default items per page to 5
                    columnDefs: [{
                            width: '30%',
                            targets: 1
                        }, // Set width for the 'Alamat' column
                        {
                            width: '20%',
                            targets: 4
                        }, // Set width for the 'Alamat' column
                        {
                            width: 'auto',
                            targets: [0, 2, 3, 5]
                        } // Let other columns adjust automatically
                    ],
                    autoWidth: false // Disable auto width calculation
                });

                // Add custom search input functionality
                $('#dataTableSearch').on('keyup', function() {
                    table.search(this.value).draw();
                });

                // Add custom page length change functionality
                $('#pageLengthSelect').on('change', function() {
                    table.page.len(this.value).draw();
                });
            }

            initializeDataTable(); // Initialize DataTable on page load

            useGeolocation(); // Initialize with geolocation on page load

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
                // Replace this with your actual route name for fetching data
                return $.ajax({
                    url: route('api.agen.json'), // Adjust this route according to your Laravel routes
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
                // Clear existing table data
                $('#storeTableBody').empty();

                let storeLocation = getStoreLocationDistance(userLocation);

                storeLocation.data.forEach((store) => {
                    // Append store data to table
                    $('#storeTableBody').append(`
                    <tr>
                        <td>${store.nama_agen}</td>
                        <td>${store.alamat}</td>
                        <td>${store.kecamatan}</td>
                        <td>${store.kota}</td>
                        <td>${store.keterangan}</td>
                        <td>${store.distance}</td>
                    </tr>
                    `);
                });

                // Refresh DataTables after updating table body
                table.clear().rows.add($('#storeTableBody tr')).draw();
            }

            // Toggle pagination button click event
            $('.toggle-pagination').on('click', function() {
                table.page.len() === -1 ? table.page.len(5).draw() : table.page.len(-1).draw();
                $(this).toggleClass('btn-primary btn-secondary');
                $(this).text(table.page.len() === -1 ? 'Disable Pagination' : 'Enable Pagination');
            });

            // Page length select change event
            $('#pageLengthSelect').on('change', function() {
                var val = $(this).val();
                table.page.len(val).draw();
            });
        });
    </script>
@endpush
