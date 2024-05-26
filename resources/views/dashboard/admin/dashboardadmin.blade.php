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


    </style>
@endsection

@section('content')
    {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4"> --}}
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
    {{-- </div> --}}

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


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h2">BNI Agen46</h2>
            <h2 class="h4">Melayani Paling Dekat</h2>
            <p class="mb-0">BNI Agen46 adalah mitra BNI (perorangan atau badan hukum yang telah bekerjasama dengan BNI)
                untuk menyediakan layanan perbankan kepada masyarakat (Layanan Laku Pandai, Layanan LKD dan Layanan
                e-Payment).</p>
            <br>

            <h2 class="h4">Fitur dan Layanan BNI Agen46</h2>
            <h2 class="h5">Layanan Laku Pandai</h2>
            <p>1. Buka Rekening Tabungan BNI Pandai.
            <br>2. Setoran Tunai.
            <br>3. Tarik Tunai.</p>
            
            <h2 class="h5">Layanan LKD</h2>
            <p>1. Pendaftaran (Register) Uang Elektronik.
            <br>2. Setor Tunai (Cash In) Uang Elektronik.
            <br>3. Tarik Tunai (Cash Out) Uang Elektronik.</p>

            <h2 class="h5">Layanan E-Payment</h2>
            <p>1. Transfer (Antara BNI dan Online antar Bank).
            <br>2. Pembelian.
            <br>3. Pembayaran.</p>
            

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
