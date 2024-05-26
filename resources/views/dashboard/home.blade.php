@extends('layouts.dashboard-volt')

@section('css')
    <style>
        * {
            box-sizing: border-box
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
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
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
    </div>
    <br>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3">
        <div class="d-block mt-3 mb-4 mb-md-0">
            <h2 class="nama1">BNI Agen46</h2>
            <h2 class="nama2">Melayani Paling Dekat</h2>
            <p class="mb-0"><b>BNI Agen46</b> adalah mitra BNI (perorangan atau badan hukum yang telah bekerjasama dengan BNI)
                untuk menyediakan layanan perbankan kepada masyarakat (Layanan Laku Pandai, Layanan LKD dan Layanan
                e-Payment).</p>
            <br>

            <h2 class="nama3">Fitur dan Layanan BNI Agen46</h2>
            

            <ulcust>
                <licust>
                    <ul>
                        <h2 class="h5">Layanan Laku Pandai</h2>
                        <li>Buka Rekening Tabungan BNI Pandai.</li>
                        <li>Setoran Tunai.</li>
                        <li>Tarik Tunai.</li>

                    </ul>
                </licust>

                <licust>
                    <ul>
                        <h2 class="h5">Layanan LKD</h2>
                        <li>Pendaftaran (Register) Uang Elektronik.</li>
                        <li>Setor Tunai (Cash In) Uang Elektronik.</li>
                        <li>Tarik Tunai (Cash Out) Uang Elektronik.</li>

                    </ul>
                </licust>

                <licust>
                    <ul>
                        <h2 class="h5">Layanan E-Payment</h2>
                        <li>Transfer (Antara BNI dan Online antar Bank).</li>
                        <li>Pembelian (Pulsa, Paket Data & Token Listrik).</li>
                        <li>Pembayaran (Tagihan Listrik, PDAM, BPJS, dll).</li>

                    </ul>
                </licust>
            </ulcust>

            <h2 class="nama2">Produk Unggulan BNI</h2>
            <p class="mb-0">BNI memperkuat komitmennya untuk selalu hadir dan mendukung beragam aspek pertumbuhan nasabah, dengan fokus pada menyediakan solusi keuangan terintegrasi berbasis digital serta dukungan jaringan Go Global.
                <br><br>
                Dalam segmen ritel, pengguna BNI Mobile Banking meningkat 20,9% YoY menjadi 15,6 juta user pada Q3 2023, yang diikuti dengan peningkatan jumlah transaksi sebesar 75,3% YoY mencapai 738 juta transaksi, dan nilai transaksi yang tumbuh 53,6% YoY menjadi Rp 874 triliun.
                <br><br>
                Angka-angka ini mencerminkan pergeseran nasabah BNI yang terus meningkatkan penggunaan platform digital sebagai sarana utama untuk transaksi keuangan, sejalan dengan strategi BNI untuk menjadikan BNI Mobile Banking sebagai solusi keuangan komprehensif bagi nasabah.
                <br><br>    
                Dalam mendukung langkah-langkah strategisnya, BNI telah menghadirkan 4 produk unggulan yang bertujuan untuk memperkuat bisnis transaksi ritel dan institusi serta meningkatkan solusi perbankan yang ditawarkan kepada UMKM yang ingin berkembang secara global.</p>
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
