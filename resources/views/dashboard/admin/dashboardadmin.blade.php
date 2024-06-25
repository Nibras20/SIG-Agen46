@extends('layouts.dashboardadmin-volt')

@section('css')
    <style>
        * {
            box-sizing: border-box
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

        .nama1 {
            color: #006677;
            font-size: 35px;
            font-weight: bold;
        }

        .nama2 {
            color: #b74d0f;
            font-size: 25px;
            font-weight: bold;
        }

        .nama3 {
            color: #b74d0f;
            font-size: 20px;
            font-weight: bold;
        }

        .kontenteks {

            font-size: 15px;
            margin-bottom: 0cm;

        }

        /* Grid system */
        .content-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Dua kolom dengan lebar yang sama */
            gap: 20px;
            /* Jarak antara kolom */
        }

        .left-content {
            /* Isi gaya CSS untuk konten di bagian kiri di sini */
        }

        .right-content {
            /* Isi gaya CSS untuk konten di bagian kanan di sini */
        }

        /* Navigation buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
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
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <h2 class="nama1">Selamat Datang di BNI Agen46</h2>
    </div>
    </div>

    <!-- Slideshow container -->
    <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        <div class="mySlides fadess">
            <img src="https://www.bni.co.id/portals/1/bni/beranda/promo/images/St012.jpg" style="width:100%">
        </div>

        <div class="mySlides fadess">
            <img src="https://www.bni.co.id/portals/1/BNI/ebanking/Images/BNI-CONTACTLESS-CC-2024.png" style="width:100%">
        </div>

        <div class="mySlides fadess">
            <img src="https://www.bni.co.id/portals/1/BNI/ebanking/Images/KV-BNI-Mobile-Banking-New-UI.jpg"
                style="width:100%">
        </div>

        <!-- Navigation buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    {{-- Konten --}}
    <div class="flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            
            <h2 class="nama2">Melayani Dengan Penuh Kepuasan</h2>
            <p class="mb-0" style="font-size: 16px; line-height: 1.6;"><b>BNI Agen46</b> adalah mitra BNI yang telah menjalin
                    kerjasama dengan berbagai pihak,
                    baik perorangan maupun badan hukum, untuk menyediakan layanan perbankan kepada masyarakat.
                    Kami menghadirkan berbagai kemudahan dan kecepatan dalam melakukan transaksi keuangan Anda.</p>
            <br><br>
            <h2 class="nama2">Fitur dan Layanan Unggulan</h2>
        </div>

        <div class="content-container">
            <div class="left-content">

                <h2 class="nama3">Layanan Laku Pandai</h2>
                <p class="kontenteks">1.Buka Rekening Tabungan BNI Pandai.</p>
                <p class="kontenteks">2.Setoran Tunai.</p>
                <p class="kontenteks">3.Tarik Tunai.</p>
                <br>
                <h2 class="nama3">Layanan LKD (Layanan Kredit Digital)</h2>
                <p class="kontenteks">1.Pendaftaran (Register) Uang Elektronik.</p>
                <p class="kontenteks">2.Setor Tunai (Cash In) Uang Elektronik.</p>
                <p class="kontenteks">3.Tarik Tunai (Cash Out) Uang Elektronik.</p>
            </div>

            <div class="right-content">
                <h2 class="nama3">Layanan E-Payment</h2>
                <p class="kontenteks">1.Transfer (Antara BNI dan Online antar Bank).</p>
                <p class="kontenteks">2.Pembelian.</p>
                <p class="kontenteks">&emsp;-Top Up Pulsa dan Paket Data.</p>
                <p class="kontenteks">&emsp;-Token Listrik.</p>
                <p class="kontenteks">3.Pembayaran.</p>
                <p class="kontenteks">&emsp;-Tagihan Listrik.</p>
                <p class="kontenteks">&emsp;-Tagihan PDAM.</p>
                <p class="kontenteks">&emsp;-Tagihan Kartu Kredit.</p>
                <p class="kontenteks">&emsp;-Tagihan Telepon.</p>
                <p class="kontenteks">&emsp;-Tagihan Multifinance,dll.</p>
            </div>
        </div>

        <br>
        <h2 class="nama2">Produk Unggulan BNI</h2>
        <p class="mb-0" style="font-size: 16px; line-height: 1.6;">BNI memperkuat komitmennya untuk selalu hadir dan mendukung beragam aspek pertumbuhan nasabah,
            dengan fokus pada menyediakan solusi keuangan terintegrasi berbasis digital serta dukungan jaringan Go Global.
            <br><br>
            Dalam segmen ritel, pengguna BNI Mobile Banking meningkat 20,9% YoY menjadi 15,6 juta user pada Q3 2023, yang
            diikuti dengan peningkatan jumlah transaksi sebesar 75,3% YoY mencapai 738 juta transaksi, dan nilai transaksi
            yang tumbuh 53,6% YoY menjadi Rp 874 triliun.
            <br><br>
            Angka-angka ini mencerminkan pergeseran nasabah BNI yang terus meningkatkan penggunaan platform digital sebagai
            sarana utama untuk transaksi keuangan, sejalan dengan strategi BNI untuk menjadikan BNI Mobile Banking sebagai
            solusi keuangan komprehensif bagi nasabah.
            <br><br>
            Dalam mendukung langkah-langkah strategisnya, BNI telah menghadirkan 4 produk unggulan yang bertujuan untuk
            memperkuat bisnis transaksi ritel dan institusi serta meningkatkan solusi perbankan yang ditawarkan kepada UMKM
            yang ingin berkembang secara global.
        </p>
    @endsection

    @push('javascript')
    <script>
        let slideIndex = 0;

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }

        // Auto play slideshow
        function autoPlaySlides() {
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
            setTimeout(autoPlaySlides, 5000); // Change image every 5 seconds
        }

        showSlides(slideIndex); // Display the first slide
        autoPlaySlides(); // Start auto play
    </script>
@endpush
