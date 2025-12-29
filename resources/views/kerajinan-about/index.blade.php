@extends('layout.master')
@section('content')
    @use('Illuminate\Support\Facades\Storage')
    
    @php
        $kerajinanSlider = \App\Models\Slider::where('section', 'kerajinan')->first();
    @endphp
    
    <style>
        .page-slider-fade-in {
            animation: pageSliderFadeIn 0.8s ease-in;
        }
        @keyframes pageSliderFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>

    <!-- slider Area Start-->
    @if($kerajinanSlider && $kerajinanSlider->image)
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center"
                style="background-image: url('{{ Storage::url($kerajinanSlider->image) }}'); background-size: cover; background-position: center;">
    @else
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center"
                data-background="fe/img/hero/kerajinan-bg.jpg">
    @endif
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap pt-100">
                                <h2>BMI - Kerajinan</h2>
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

    <!-- Kerajinan Detail Section -->
    <section class="kerajinan-section section-padding30">
        <div class="container">
            <div class="section-tittle section-tittle3 text-center mb-40">
                <div class="front-text">
                    <h2>UMKM Kerajinan</h2>
                </div>
                <span class="back-text">Kerajinan</span>
            </div>

            <div class="row mb-40">
                <div class="col-lg-6 col-md-4">
                    <div class="card reveal-on-scroll h-100">
                        <div class="card-body">
                            <h4 class="card-title">Pengertian Kerajinan</h4>
                            <p class="card-text">
                                Kerajinan adalah kegiatan pembuatan produk yang mengutamakan keterampilan tangan, ketelitian, serta nilai estetika. Prosesnya dapat dilakukan secara manual maupun dengan bantuan alat sederhana. Sektor kerajinan mencakup beragam produk seperti tekstil, anyaman, kerajinan kayu, hingga aksesoris.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-4">
                    <div class="card reveal-on-scroll h-100">
                        <div class="card-body">
                            <h4 class="card-title">Fungsi & Peran Kerajinan</h4>
                            <ul class="card-list">
                                <Menjadi>Melestarikan teknik tradisional serta menjadi sumber penghidupan dan membuka peluang usaha bagi pengrajin skala mikro.</li>
                                <li>Mendorong pengembangan desain dan inovasi produk berbasis material lokal.</li>
                                <li>Memperkuat identitas pengrajin lokal, khususnya dalam pasar domestik dan pariwisata.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-30">
                <div class="col-md-4">
                    <div class="card reveal-on-scroll h-100">
                        <h5>Tujuan</h5>
                        <p>
                            Meningkatkan kesejahteraan UMKM, memperluas cakupan pemasaran produk kerajinan, memastikan kualitas dan kesinambungan produksi, serta menghadirkan nilai tambah melalui kreativitas.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card reveal-on-scroll h-100">
                        <h5>Contoh</h5>
                        <p>
                            Kerajinan kayu, aksesoris, souvenir plakat, anyaman rotan, serta ecoprint.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card reveal-on-scroll h-100">
                        <h5>Manfaat</h5>
                        <p>
                            Memberikan kontribusi ekonomi bagi masyarakat lokal, menjaga keberlanjutan ekonomi kreatif, memperluas ragam produk UMKM, serta mendukung tumbuhnya industri pariwisata kreatif.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mb-40">
                <div class="col-12">
                    <div class="card long-card reveal-on-scroll">
                        <div class="card-body">
                            <h5>Rekomendasi Pengembangan & Praktik</h5>
                            <ul>
                                <li>Pelatihan pengembangan desain, peningkatan kualitas produk, dan perbaikan kemasan.</li>
                                <li>Mendukung akses bahan baku yang stabil, berkualitas, dan terjangkau.</li>
                                <li>Mendorong digitalisasi melalui dokumentasi produk, marketplace, dan pemasaran digital.</li>
                                <li>Penguatan kolaborasi antar pengrajin untuk produksi berskala lebih besar dan standar mutu yang seragam.</li>
                            </ul>

                            <p class="mt-3">
                                <strong>Inovasi:</strong> Kombinasi design dengan material modern serta penawaran edisi terbatas dapat meningkatkan nilai jual dan daya tarik produk di pasar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visual timeline / highlights -->
            <div class="row mb-40">
                <div class="col-12">
                    <div class="bmi-timeline reveal-on-scroll kerajinan-timeline">
                        <div class="d-flex align-items-center" style="gap:18px;">
                            <div class="timeline-step">
                                <div class="timeline-icon round-icon"><i class="fas fa-lightbulb"></i></div>
                                <div class="timeline-label">Ide & Desain</div>
                            </div>
                            <div class="timeline-arrow">→</div>
                            <div class="timeline-step">
                                <div class="timeline-icon round-icon"><i class="fas fa-tools"></i></div>
                                <div class="timeline-label">Produksi</div>
                            </div>
                            <div class="timeline-arrow">→</div>
                            <div class="timeline-step">
                                <div class="timeline-icon round-icon"><i class="fas fa-box-open"></i></div>
                                <div class="timeline-label">Pengemasan</div>
                            </div>
                            <div class="timeline-arrow">→</div>
                            <div class="timeline-step">
                                <div class="timeline-icon round-icon"><i class="fas fa-shopping-cart"></i></div>
                                <div class="timeline-label">Pemasaran</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('join')
    @include('layout.join')
@endsection
@section('client')
    @include('layout.client')
@endsection

{{-- Reveal on scroll + stagger script specific untuk kerajinan --}}
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