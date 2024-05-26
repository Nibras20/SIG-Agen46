@extends('layouts.dashboard-volt')

@section('css')
    <style>
        * {
            box-sizing: border-box
        }

        .gambar1 {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        .nama1 {
            color: #006677;
            font-size: 30px;
        }

        .nama2 {
            color: #b74d0f;
            font-size: 20px;
        }

        .nama3 {
            color: #b74d0f;
            font-size: 20px;
            margin-bottom: 0cm;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Fading animation */
        .fadess {
            animation-name: fadess;
            animation-duration: 1.5s;
        }

        @keyframes fadess {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        .containercust {
            display: grid;
            grid-template-columns: 66% auto;

        }

        ulcust {
            display: grid;
            list-style-type: none;
            margin: 0;
            padding: 0;
            grid-template-columns: repeat(3, auto);
            grid-template-rows: repeat(2, auto);
        }

        ulcust licust {
            padding: 1em;
        }

        ulcust licust span {
            display: block;
            font-size: 1.4em;

            color: white;
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
                    <li class="breadcrumb-item active" aria-current="page">Gabung BNI Agen46</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Slideshow container -->
    <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        <div class="gambar1">
            <img src="{{ asset('assets/img/daftaragen46.jpg') }}">
        </div>
    </div>
    <br>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3">
        <div class="d-block mt-3 mb-4 mb-md-0">
            <h2 class="nama1">BNI Agen46</h2>
            <h2 class="nama2">Cara Mudah Menjadi BNI Agen46</h2>
            <p class="mb-0"><b>Melalui Cabang BNI</b></p>
                <licust>
                    <ul>
                        <li>Calon BNI Agen46 (Perorangan/Badan Hukum) mendatangi Kantor Cabang BNI terdekat.</li>
                        <li>Calon BNI Agen46 mengisi formulir pendaftaran dan melampirkan dokumen pendukung.</li>
                        <li>BNI akan memproses permohonan Calon BNI Agen46 dan akan menginformasikan kepada Calon Agen46 apabila permohonan selesai diproses.</li>
                        <li>Calon BNI Agen46 menandatangani Perjanjian Kerjasama (PKS) Keagenan dengan BNI.</li>
                        <li>BNI Agen46 akan menerima kelengkapan operasional berupa Sertifikat keagenan, Spanduk keagenan, Akses Aplikasi Transaksi & Brosur/Flyer untuk BNI Agen46 dan Nasabah.</li>
                    </ul>
                </licust>

            <p class="mb-0"><b>Melalui Online Registration</b></p>
            <p class="mb-0">Kini anda dapat menjadi BNI Agen46 dengan melakukan pendaftaran/registrasi melalui
                <a target="_blank" href="https://agenbni46.bni.co.id/register"><u>situs registrasi online BNI Agen46 </u></a>dengan melengkapi data-data yang dibutuhkan sesuai formulir.</p>
            <br>
            <p class="mb-0"><b>Melalui Aplikasi BNI Experience</b></p>
            <p class="mb-0">Unduh Aplikasi BNI Experience di <a target="_blank" href="https://play.google.com/store/apps/details?id=id.co.bni.newagenbni46&pcampaignid=web_share"><u>Google Play Store</u></a>.</p>
            <br>

            <h2 class="nama2">Keuntungan Menjadi BNI Agen46</h2>
            <p class="mb-0"><b>Berikut Beberapa Keuntungan Menjadi BNI Agen46</b></p>
                <licust>
                    <ul>
                        <li>Tidak dikenakan biaya pendaftaran.</li>
                        <li>Komisi menarik dari setiap transaksi.</li>
                        <li>Layanan dan fitur terlengkap.</li>
                        <li>Kemudahan mendapatkan modal usaha.</li>
                        <li>Menjadi Agen resmi perbankan.</li>
                    </ul>
                </licust>
            
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 5000); // Change image every 5 seconds
        }
    </script>
@endpush
