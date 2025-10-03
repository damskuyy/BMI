@extends('layout.master')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="fe/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>About us</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">About</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- About Area Start -->
    <section class="support-company-area fix pt-10" style="margin-top:120px;">
        <div class="support-wrapper align-items-end">
            <div class="left-content">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-55">
                    <div class="front-text">
                        <h3 class="">Who we are</h3>
                    </div>
                    <span class="back-text">About us</span>
                </div>
                <div class="support-caption">
                    <p class="pera-top">Kami adalah UMKM Binaan dari Yayasan Astra YDBA, dan kami mulai berkomitmen membangun komunitas tahun 2021.</p>
                    <p>Diakhir tahun 2023 kamimulai mengembangkan bisniskomunitas kami menjadi koperasi yang sebagian besarnya adalah anggota umkm binaan astra di bidang Manufaktur, Kuliner, & Kerajinan.</p>
                    {{-- <a href="/about" class="btn red-btn2">read more</a> --}}
                </div>
            </div>
            <div class="right-content">
                <!-- img -->
                <div class="right-img">
                    <img src="fe/img/gallery/safe_in.png" alt="">
                </div>
                <div class="support-img-cap text-center">
                    <span>2021</span>
                    <p>Since</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
    <!-- Visi & Misi -->
    <section class="about-section about-visi-misi mt-5 mb-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <div class="card-visi">
                        <h3 class="section-title">Visi</h3>
                        <p>Mewujudkan UMKM yang mandiri, inovatif, dan berdaya saing global melalui kolaborasi dan pemberdayaan komunitas.</p>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card-misi">
                        <h3 class="section-title">Misi</h3>
                        <ul>
                            <li>Meningkatkan kualitas produk dan layanan UMKM.</li>
                            <li>Memperluas jaringan pemasaran dan kemitraan.</li>
                            <li>Mendorong inovasi dan digitalisasi bisnis anggota.</li>
                            <li>Memberikan pelatihan dan pendampingan berkelanjutan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tujuan & Fungsi (digabung) -->
    <section class="about-section about-tujuan-fungsi mb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-tujuan-fungsi">
                        <h3 class="section-title">Tujuan & Fungsi</h3>
                        <ul>
                            <li>
                                Meningkatkan kesejahteraan anggota UMKM, menjadi wadah pengembangan bisnis yang profesional, mendukung pertumbuhan ekonomi lokal dan nasional, serta berfungsi sebagai fasilitator kolaborasi, pusat informasi dan edukasi UMKM, dan pendorong inovasi serta adaptasi teknologi.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Goals -->
    <section class="about-section about-goals mb-50">
        <div class="container">
            <div class="card-goals">
                <h3 class="section-title">Our Goals</h3>
                <ul>
                    <li>Menjadi koperasi UMKM terbaik di Indonesia.</li>
                    <li>Memberikan dampak positif bagi anggota, masyarakat, dan lingkungan.</li>
                    <li>Mengutamakan inovasi, kolaborasi, dan pemberdayaan berkelanjutan.</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Client Area Start -->
@endsection
@section('client')
    @include('layout.client')
@endsection