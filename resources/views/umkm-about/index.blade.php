@extends('layout.master')
@section('content')
  @use('Illuminate\Support\Facades\Storage')

  @php
    $kulinerSlider = \App\Models\Slider::where('section', 'kuliner')->first();
  @endphp

  <style>
    .page-slider-fade-in {
      animation: pageSliderFadeIn 0.8s ease-in;
    }

    @keyframes pageSliderFadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }
  </style>

  <!-- slider Area Start-->
  @if($kulinerSlider && $kulinerSlider->image)
    <div class="slider-area">
      <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center"
        style="background-image: url('{{ Storage::url($kulinerSlider->image) }}'); background-size: cover; background-position: center;">
  @else
        <div class="slider-area">
          <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center"
            data-background="fe/img/hero/kuliner-bg.png">
      @endif
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
                    Kuliner UMKM adalah kegiatan usaha mikro, kecil, dan menengah yang bergerak di bidang pengolahan makanan dan minuman. Produk yang dihasilkan biasanya mengangkat cita rasa lokal, diproses dengan keterampilan khas, dan dipasarkan melalui jalur tradisional maupun digital. Sektor ini berperan penting dalam menyediakan pilihan kuliner yang beragam serta mendukung pertumbuhan ekonomi masyarakat.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-4">
              <div class="card reveal-on-scroll h-100">
                <div class="card-body">
                  <h4 class="card-title">Fungsi & Peran</h4>
                  <ul class="card-list">
                    <li>Memenuhi kebutuhan pangan masyarakat dan menghadirkan variasi kuliner lokal.</li>
                    <li>Membuka peluang kerja bagi komunitas sekitar.</li>
                    <li>Melestarikan resep tradisional dan kekayaan kuliner daerah.</li>
                    <li>Menjadi pintu masuk bagi UMKM menuju rantai pasok modern, mulai dari pembiayaan, distribusi, hingga pemasaran digital.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-30">
            <div class="col-md-4">
              <div class="card reveal-on-scroll">
                <h5>Tujuan</h5>
                <p>
                  Meningkatkan pendapatan pelaku usaha, memperluas akses pemasaran, menjaga kualitas pangan, dan membangun usaha kuliner yang berkelanjutan.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card reveal-on-scroll">
                <h5>Contoh</h5>
                <p>
                  Warung makan rumahan, katering skala kecil, produsen kue tradisional, minuman kemasan lokal, hingga pedagang jajanan pasar.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card reveal-on-scroll">
                <h5>Manfaat</h5>
                <p>
                  Mendorong pertumbuhan ekonomi lokal, mengembangkan keterampilan produksi, memperluas potensi ekspor produk khas daerah, serta memperkaya keragaman kuliner Indonesia.
                </p>
              </div>
            </div>
          </div>

          <div class="row mb-40">
            <div class="col-12">
              <div class="card long-card reveal-on-scroll">
                <div class="card-body">
                  <h5>Rekomendasi Pengembangan</h5>
                  <p>
                    Pengembangan sektor kuliner dapat dilakukan melalui pelatihan higienitas dan standardisasi produksi, peningkatan akses pembiayaan, digitalisasi pemasaran melalui platform online, serta penyediaan kemasan yang menarik dan memenuhi standar keamanan pangan. Kerja sama antar pelaku UMKM juga dapat meningkatkan efisiensi pengadaan bahan baku dan memperkuat pemasaran bersama.
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

    {{-- Animasi kecil untuk reveal on scroll (reuse existing script if present) --}}
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const obs = new IntersectionObserver((entries) => {
          entries.forEach(e => {
            if (e.isIntersecting) {
              e.target.classList.add('visible');
              obs.unobserve(e.target);
            }
          });
        }, { threshold: 0.12 });

        document.querySelectorAll('.reveal-on-scroll').forEach(el => obs.observe(el));
      });
    </script>