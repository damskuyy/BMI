@extends('layout.master')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
            data-background="fe/img/hero/kerajinan-bg.jpg">
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
                    <h2>Kerajinan di BMI</h2>
                </div>
                <span class="back-text">Kerajinan</span>
            </div>

            <div class="row align-items-start mb-40">
                <div class="col-lg-6">
                    <div class="card reveal-on-scroll">
                        <div class="card-body">
                            <h4 class="card-title">Pengertian Kerajinan</h4>
                            <p class="card-text">
                                Kerajinan adalah aktivitas pembuatan produk oleh tangan atau dengan bantuan alat sederhana
                                yang mengutamakan keterampilan, nilai estetika, dan fungsi. Di BMI kerajinan meliputi produk
                                tekstil, anyaman, anyaman bambu, keramik, perhiasan sederhana, dan barang dekoratif yang
                                dibuat oleh UMKM dan pengrajin lokal.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card reveal-on-scroll">
                        <div class="card-body">
                            <h4 class="card-title">Fungsi & Peran Kerajinan</h4>
                            <ul class="card-list">
                                <li>Melestarikan kearifan lokal dan teknik tradisional.</li>
                                <li>Menjadi sumber pendapatan dan lapangan kerja skala mikro.</li>
                                <li>Mendorong kreasi desain dan inovasi produk berbasis lokal.</li>
                                <li>Memperkuat identitas budaya daerah di pasar lokal dan wisata.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-30">
                <div class="col-md-4">
                    <div class="feature-card reveal-on-scroll">
                        <h5>Tujuan</h5>
                        <p>Meningkatkan kesejahteraan pengrajin, memperluas akses pasar produk kerajinan, menjamin kualitas
                            dan kontinuitas produksi, serta mendorong nilai tambah kreatif.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card reveal-on-scroll">
                        <h5>Contoh</h5>
                        <p>Anyaman bambu & rotan, kerajinan kulit, tenun & batik lokal, ukiran kayu, keramik, aksesori
                            handmade, dan kemasan kreatif untuk souvenir.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card reveal-on-scroll">
                        <h5>Manfaat</h5>
                        <p>Nilai ekonomi bagi komunitas lokal, pelestarian budaya, diversifikasi produk UMKM, dan potensi
                            pariwisata kreatif.</p>
                    </div>
                </div>
            </div>

            <div class="row mb-40">
                <div class="col-12">
                    <div class="card long-card reveal-on-scroll">
                        <div class="card-body">
                            <h5>Rekomendasi Pengembangan & Praktik</h5>
                            <ul>
                                <li>Pelatihan desain produk, kemasan, dan kontrol kualitas.</li>
                                <li>Fasilitasi akses bahan baku berkualitas dan hemat biaya.</li>
                                <li>Dorongan digitalisasi: foto produk, marketplace & pemasaran digital.</li>
                                <li>Kolaborasi antar pengrajin untuk produksi skala lebih besar dan standarisasi.</li>
                            </ul>

                            <p class="mt-3"><strong>Inovasi:</strong> kombinasikan motif tradisional dengan material modern,
                                tawarkan edisi terbatas (limited edition) untuk meningkatkan margin dan daya tarik pasar.
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