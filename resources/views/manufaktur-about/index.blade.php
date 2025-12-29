@extends('layout.master')
@section('content')
    @use('Illuminate\Support\Facades\Storage')
    
    @php
        $manufakturSlider = \App\Models\Slider::where('section', 'manufaktur')->first();
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
    @if($manufakturSlider && $manufakturSlider->image)
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center"
                style="background-image: url('{{ Storage::url($manufakturSlider->image) }}'); background-size: cover; background-position: center;">
    @else
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center"
                data-background="fe/img/hero/manufaktur-bg.webp">
    @endif
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

            <div class="row mb-40">
                <div class="col-lg-6 col-md-6">
                    <div class="card reveal-on-scroll h-100">
                        <div class="card-body">
                            <h4 class="card-title">Pengertian Manufaktur</h4>
                            <p class="card-text">
                                Manufaktur merupakan proses pengolahan bahan baku menjadi produk jadi melalui tahapan produksi yang terencana. Kegiatan ini melibatkan penggunaan mesin, tenaga kerja terampil, serta sistem kontrol kualitas untuk menghasilkan produk yang bernilai tambah. Sektor manufaktur menjadi bagian penting dalam mendukung kebutuhan industri dan perkembangan ekonomi, baik dalam skala lokal maupun nasional.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="card reveal-on-scroll h-100">
                        <div class="card-body">
                            <h4 class="card-title">Fungsi & Peran</h4>
                            <ul class="card-list">
                                <li>Mengubah bahan mentah menjadi produk bernilai guna dan bernilai jual.</li>
                                <li>Menyediakan lapangan kerja serta meningkatkan kapasitas produksi.</li>
                                <li>Mendukung penguatan rantai pasok untuk kebutuhan domestik maupun ekspor.</li>
                                <li>Mendorong penerapan inovasi dan peningkatan efisiensi proses produksi.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-40">
                <div class="col-lg-4 col-md-4">
                    <div class="card reveal-on-scroll h-100">
                        <h5>Tujuan</h5>
                        <p>
                            Tujuan utama manufaktur adalah meningkatkan produktivitas, menekan biaya operasional, memenuhi kebutuhan pasar, dan menghasilkan produk berkualitas yang mampu bersaing di tingkat nasional maupun internasional.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card reveal-on-scroll h-100">
                        <h5>Contoh</h5>
                        <p>
                            Ruang lingkup manufaktur meliputi industri pengolahan makanan, tekstil, furnitur, otomotif, serta berbagai industri kecil seperti jasa permesinan dan fabrikasi.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card reveal-on-scroll h-100">
                        <h5>Manfaat</h5>
                        <p>
                            Sektor manufaktur memberikan kontribusi dalam bentuk peningkatan nilai ekonomi, pengembangan keahlian tenaga kerja, pemenuhan kebutuhan pasar domestik, penguatan UMKM pendukung, serta penciptaan peluang ekspor.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card long-card reveal-on-scroll">
                        <div class="card-body">
                            <h5>Ringkasan Praktis & Rekomendasi</h5>
                            <p>
                                Peningkatan daya saing manufaktur memerlukan investasi pada pengembangan sumber daya manusia, penerapan teknologi yang tepat guna seperti otomasi dasar dan sistem kontrol kualitas, serta penguatan rantai pasok lokal. Kolaborasi antara pelaku UMKM, industri, lembaga pelatihan, dan pemerintah daerah menjadi faktor penting dalam memperluas kapasitas produksi serta memperkuat akses pasar.
                            </p>
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