@extends('layout.master')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="fe/img/hero/kuliner-bg.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>KULINER - BMI</h2>
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

    <!-- UMKM Kuliner Detail Section -->
    <section class="umkm-section section-padding30">
      <div class="container">
        <div class="section-tittle section-tittle3 text-center">
          <div class="front-text">
            <h2>Tentang Kuliner UMKM</h2>
          </div>
          <span class="back-text">Kuliner</span>
        </div>

        <div class="row align-items-stretch mb-40">
          <div class="col-lg-6 col-md-4">
            <div class="card reveal-on-scroll h-100">
              <div class="card-body">
                <h4 class="card-title">Pengertian Kuliner UMKM</h4>
                <p class="card-text">
                  Kuliner UMKM adalah usaha mikro, kecil, dan menengah di bidang makanan & minuman yang memproduksi, mengolah, dan menjual produk pangan dengan skala lokal hingga regional. UMKM kuliner umumnya mengandalkan resep lokal, keterampilan pengolahan, serta akses pasar tradisional maupun digital.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-4">
            <div class="card reveal-on-scroll h-100">
              <div class="card-body">
                <h4 class="card-title">Fungsi & Peran</h4>
                <ul class="card-list">
                  <li>Menyediakan kebutuhan pangan lokal dan variasi kuliner.</li>
                  <li>Menciptakan lapangan kerja bagi masyarakat sekitar.</li>
                  <li>Menjaga dan melestarikan resep & kearifan lokal.</li>
                  <li>Menjadi pintu masuk UMKM ke rantai pasok modern (financing, distribusi, e‑commerce).</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-30">
          <div class="col-md-4">
            <div class="card reveal-on-scroll">
              <h5>Tujuan</h5>
              <p>Meningkatkan pendapatan pelaku usaha, memperluas akses pasar, menjaga kualitas pangan, dan membangun usaha yang berkelanjutan.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card reveal-on-scroll">
              <h5>Contoh</h5>
              <p>Warung makan rumahan, katering skala kecil, pembuat kue tradisional, usaha minuman kemasan lokal, pedagang jajanan pasar.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card reveal-on-scroll">
              <h5>Manfaat</h5>
              <p>Mendorong ekonomi lokal, mengembangkan keterampilan produksi, membuka peluang ekspor produk khas, dan memperkaya ragam kuliner daerah.</p>
            </div>
          </div>
        </div>

        <div class="row mb-40">
          <div class="col-12">
            <div class="card long-card reveal-on-scroll">
              <div class="card-body">
                <h5>Rekomendasi Pengembangan</h5>
                <p>
                  Perkuat pelatihan higienis & standardisasi resep, bantu akses pembiayaan mikro dan digitalisasi penjualan (platform online), fasilitasi kemasan yang menarik dan standar keamanan pangan, serta dorong kolaborasi antar UMKM untuk efisiensi bahan baku dan pemasaran bersama.
                </p>
                <p class="mt-3"><strong>Catatan:</strong> bila ingin saya susun versi accordion atau infographic interaktif (timeline/flow) untuk tiap subtopik, saya siapkan markup cepat.</p>
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

{{-- Animasi kecil untuk reveal on scroll (reuse existing script if present) --}}
<script>
document.addEventListener('DOMContentLoaded', function(){
  const obs = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        e.target.classList.add('visible');
        obs.unobserve(e.target);
      }
    });
  }, {threshold: 0.12});

  document.querySelectorAll('.reveal-on-scroll').forEach(el => obs.observe(el));
});
</script>