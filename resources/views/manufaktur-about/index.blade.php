@extends('layout.master')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
            data-background="fe/img/hero/manufaktur-bg.webp">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>Manufaktur - BMI</h2>
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

    <!-- Manufaktur Detail Section -->
    <section class="manufaktur-section section-padding30">
        <div class="container">
            <div class="section-tittle section-tittle3 text-center mb-10">
                <div class="front-text">
                    <h2>Tentang Manufaktur</h2>
                </div>
                <span class="back-text">Manufaktur</span>
            </div>

            <div class="row align-items-start mb-40">
                <div class="col-lg-6">
                    <div class="card reveal-on-scroll">
                        <div class="card-body">
                            <h4 class="card-title">Pengertian Manufaktur</h4>
                            <p class="card-text">
                                Manufaktur adalah proses pengolahan bahan baku menjadi produk jadi menggunakan proses
                                produksi, mesin, tenaga kerja, dan sistem pengendalian untuk menghasilkan barang dengan
                                nilai tambah. Sektor ini meliputi skala kecil hingga pabrik besar dan menjadi tulang
                                punggung banyak rantai pasokan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card reveal-on-scroll">
                        <div class="card-body">
                            <h4 class="card-title">Fungsi & Peran</h4>
                            <ul class="card-list">
                                <li>Mengubah bahan mentah menjadi produk bernilai jual</li>
                                <li>Menciptakan lapangan pekerjaan dan kapasitas produksi</li>
                                <li>Mendukung rantai pasok lokal dan ekspor</li>
                                <li>Mendorong inovasi proses dan efisiensi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-40">
                <div class="col-md-4">
                    <div class="feature-card reveal-on-scroll">
                        <h5>Tujuan</h5>
                        <p>Meningkatkan produktivitas, menurunkan biaya produksi, memenuhi kebutuhan pasar, serta
                            menghasilkan produk berkualitas dan kompetitif.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card reveal-on-scroll">
                        <h5>Contoh</h5>
                        <p>Industri pengolahan makanan, tekstil, mebel, otomotif, pengemasan, dan industri alat industri
                            kecil (bengkel/jasa permesinan).</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card reveal-on-scroll">
                        <h5>Manfaat</h5>
                        <p>Nilai tambah ekonomis, peningkatan skill tenaga kerja, pemenuhan kebutuhan domestik, pertumbuhan
                            UMKM pendukung, serta peluang ekspor.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card long-card reveal-on-scroll">
                        <div class="card-body">
                            <h5>Ringkasan Praktis & Rekomendasi</h5>
                            <p>
                                Untuk memperkuat sektor manufaktur lokal, penting melakukan investasi pada pelatihan SDM,
                                adopsi teknologi tepat guna (otomasi dasar, CNC, kontrol kualitas), pengembangan rantai
                                pasok lokal, dan penerapan praktik produksi bersih. Kolaborasi antar koperasi/UMKM, lembaga
                                pelatihan, dan pemerintah daerah mempercepat peningkatan kapasitas produksi serta akses
                                pasar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('client')
    @include('layout.client')
@endsection

{{-- Animasi kecil untuk reveal on scroll --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const obs = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    // optional: unobserve to run once
                    obs.unobserve(e.target);
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('.reveal-on-scroll').forEach(el => {
            // initial hidden state handled by CSS
            obs.observe(el);
        });
    });
</script>