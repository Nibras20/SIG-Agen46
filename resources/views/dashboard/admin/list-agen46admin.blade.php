@extends('layouts.dashboardadmin-volt')
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
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" id="btnTambahagen">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Tambah Data
            </a>
            {{-- <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div> --}}
        </div>
    </div>
    <div class="table-settings mb-4">
        <div class="row align-items-center justify-content-between">

            {{-- Kolom Pencarian --}}
            <div class="col col-md-6 col-lg-3 col-xl-4">
                <div class="input-group me-2 me-lg-3 fmxw-400">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Cari">
                </div>
            </div>

            {{-- Dropdown --}}
            <div class="col-4 col-md-2 col-xl-1 ps-md-0 text-end">
                <div class="dropdown">
                    <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-1"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end pb-0">
                        <span class="small ps-3 fw-bold text-dark">Show</span>
                        <a class="dropdown-item fw-bold" href="{{ route('list-agen46admin', ['perPage' => 5]) }}">5</a>
                        <a class="dropdown-item fw-bold" href="{{ route('list-agen46admin', ['perPage' => 10]) }}">10</a>
                        <a class="dropdown-item fw-bold rounded-bottom" href="{{ route('list-agen46admin', ['perPage' => 20]) }}">20</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::get('warning'))
            <div class="alert alert-warning">
                {{ Session::get('warning') }}
            </div>
        @endif
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">No.</th>
                    <th class="border-gray-200">Kode Agen</th>
                    <th class="border-gray-200">Nama Agen</th>
                    <th class="border-gray-200">Alamat</th>
                    <th class="border-gray-200">Kecamatan</th>
                    <th class="border-gray-200">Kabupaten/Kota</th>
                    <th class="border-gray-200">Keterangan</th>
                    <th class="border-gray-200">Longitude</th>
                    <th class="border-gray-200">Latitude</th>
                    
                    <th class="border-gray-200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->
                @foreach ($data_agen as $w)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration + $data_agen->firstItem() - 1 }}</td>
                        <td class="align-middle"><span class="fw-normal">{{ $w->kode_agen }}</span></td>
                        <td class="align-middle"><span class="fw-normal">{{ $w->nama_agen }}</span></td>
                        <td class="align-middle"><span class="fw-normal">{{ $w->alamat }}</span></td>
                        <td class="align-middle"><span class="fw-normal">{{ $w->kecamatan }}</span></td>
                        <td class="align-middle"><span class="fw-normal">{{ $w->kota }}</span></td>
                        <td class="align-middle"><span class="fw-normal">{{ $w->keterangan }}</span></td>
                        <td class="align-middle"><span class="fw-normal">{{ $w->longitude }}</span></td>
                        <td class="align-middle"><span class="fw-normal">{{ $w->latitude }}</span></td>
                        
                        <td>
                            <div class="btn-group">
                                <form action="#" method="POST" style="margin-right: 2px;">
                                    @csrf
                                    <button type="button" class="btn btn-info btn-sm edit"
                                        kode_agen="{{ $w->kode_agen }}" style="padding: 1px 3px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                            width="12" height="12" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                            <path
                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                            </path>
                                            <path d="M16 5l3 3"></path>
                                        </svg>
                                    </button>
                                </form>
                                <form action="agen/{{ $w->kode_agen }}/delete" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-sm delete-confirm" style="padding: 1px 3px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                            width="12" height="12" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $data_agen->links('vendor.pagination.bootstrap-5') }}


    </div>

    {{-- Modal Tambah Data --}}
    <div class="modal modal-blur fade" id="modal-inputagen" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Agen46</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="agen/store" method="POST" id="frmAgen" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-barcode" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                                            <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                                            <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                                            <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                                            <path d="M5 11h1v2h-1z"></path>
                                            <path d="M10 11l0 2"></path>
                                            <path d="M14 11h1v2h-1z"></path>
                                            <path d="M19 11l0 2"></path>
                                        </svg>
                                    </span>
                                    <input type="text" value="" id="kode_agen" class="form-control"
                                        name="kode_agen" placeholder="Kode Agen">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        </svg>
                                    </span>
                                    <input type="text" value="" id="nama_agen" class="form-control"
                                        name="nama_agen" placeholder="Nama Agen">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-affiliate" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5.931 6.936l1.275 4.249m5.607 5.609l4.251 1.275"></path>
                                            <path d="M11.683 12.317l5.759 -5.759"></path>
                                            <path d="M5.5 5.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0"></path>
                                            <path d="M18.5 5.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0"></path>
                                            <path d="M18.5 18.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0"></path>
                                            <path d="M8.5 15.5m-4.5 0a4.5 4.5 0 1 0 9 0a4.5 4.5 0 1 0 -9 0"></path>
                                        </svg>
                                    </span>
                                    <input type="text" value="" id="alamat" class="form-control"
                                        name="alamat" placeholder="Alamat">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-device-mobile" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z">
                                            </path>
                                            <path d="M11 4h2"></path>
                                            <path d="M12 17v.01"></path>
                                        </svg>
                                    </span>
                                    <input type="text" value="" id="kecamatan" class="form-control"
                                        name="kecamatan" placeholder="Kecamatan">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-device-mobile" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z">
                                            </path>
                                            <path d="M11 4h2"></path>
                                            <path d="M12 17v.01"></path>
                                        </svg>
                                    </span>
                                    <input type="text" value="" id="kota" class="form-control"
                                        name="kota" placeholder="Kota">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-device-mobile" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z">
                                            </path>
                                            <path d="M11 4h2"></path>
                                            <path d="M12 17v.01"></path>
                                        </svg>
                                    </span>
                                    <input type="text" value="" id="keterangan" class="form-control"
                                        name="keterangan" placeholder="Keterangan">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-device-mobile" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z">
                                            </path>
                                            <path d="M11 4h2"></path>
                                            <path d="M12 17v.01"></path>
                                        </svg>
                                    </span>
                                    <input type="text" value="" id="latitude" class="form-control"
                                        name="latitude" placeholder="Latitude">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-device-mobile" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z">
                                            </path>
                                            <path d="M11 4h2"></path>
                                            <path d="M12 17v.01"></path>
                                        </svg>
                                    </span>
                                    <input type="text" value="" id="longitude" class="form-control"
                                        name="longitude" placeholder="Longitude">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-primary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 14l11 -11"></path>
                                            <path
                                                d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5">
                                            </path>
                                        </svg>
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal modal-blur fade" id="modal-editagen" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Agen46</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadeditform">

                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to set items per page
        function setPerPage(perPage) {
            var url = window.location.href.split('?')[0];
            window.location.href = url + '?perPage=' + perPage;
        }
    </script>
@endsection

@push('javascript')
    <script>
        $(function() {
            $("#btnTambahagen").click(function() {
                $("#modal-inputagen").modal("show");
            });

            // Edit
            $(".edit").click(function() {
                var kode_agen = $(this).attr('kode_agen');
                $.ajax({
                    type: 'POST',
                    url: 'agen/edit',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        kode_agen: kode_agen
                    },
                    success: function(respond) {
                        $("#loadeditform").html(respond);
                    }
                });
                $("#modal-editagen").modal("show");
            });

            //delete
            $(".delete-confirm").click(function(e) {
                var form = $(this).closest('form');
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda Yakin Menghapus Data Ini?',
                    text: "Jik Ya Maka Data Akan Terhapus Permanen",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Terhapus!',
                            'Data Berhasil Dihapus.',
                            'success'
                        )
                    }
                })
            });

            // input
            $("#frmAgen").submit(function() {
                var kode_agen = $("#kode_agen").val();
                var nama_agen = $("#nama_agen").val();
                var alamat = $("#alamat").val();
                var kecamatan = $("#kecamatan").val();
                var kota = $("#kota").val();
                var keterangan = $("#keterangan").val();
                var latitude = $("#latitude").val();
                var longitude = $("#longitude").val();


                if (kode_agen == "") {

                    Swal.fire({
                        title: 'Warning!',
                        text: 'Kode Agen Harus Diisi !',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $("#kode_agen").focus();
                    });
                    return false;
                } else if (nama_agen == "") {
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Nama Agen Harus Diisi !',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $("#nama_agen").focus();
                    });
                    return false;
                } else if (alamat == "") {
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Alamat Harus Diisi !',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $("#alamat").focus();
                    });
                    return false;
                } else if (kecamatan == "") {
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Kecamatan Harus Diisi !',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $("#kecamatan").focus();
                    });
                    return false;
                } else if (kota == "") {
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Kota Harus Diisi !',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $("#kota").focus();
                    });
                    return false;
                } else if (keterangan == "") {
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Keterangan Harus Diisi !',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $("#keterangan").focus();
                    });
                    return false;
                } else if (latitude == "") {
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Latitude Harus Diisi !',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $("#latitude").focus();
                    });
                    return false;
                } else if (longitude == "") {
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Longitude Harus Diisi !',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $("#longitude").focus();
                    });
                    return false;

                }
            });
        });
    </script>
@endpush
