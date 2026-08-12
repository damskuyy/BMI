@extends('layout.master')

@section('content')
<div class="slider-area">
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center" style="background-image: url('{{ asset('fe/img/hero/gallery.png') }}'); background-size: cover; background-position: center;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap pt-100">
                                <h2>Keanggotaan</h2>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="#">Keanggotaan</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-tittle section-tittle4 text-center mb-1000">
                    <div class="front-text">
                        <h2>Ayo Bergabung Dengan Kami!</h2>
                    </div>
                </div>

                <div class="requirements-content">
                    <p class="requirements-intro">Berikut adalah <strong>Syarat Menjadi UMKM Binaan Yayasan Astra - YDBA Bogor Citeureup</strong> :</p>

                    <div class="row gy-4 mb-40">
                        <div class="col-lg-6">
                            <div class="requirements-panel">
                                <h3>Persyaratan</h3>
                                <ul class="requirements-list">
                                    <li>Lama usaha/bisnis minimal 1 tahun</li>
                                    <li>Usaha memiliki kegiatan produksi/jasa</li>
                                    <li>Termasuk Kategori UMKM (PP No. 7 Th. 2021 : Omset Maks. 50 Milyar/Th)</li>
                                    <li>Aktif mengikuti program Pembinaan (Asesment, Pelatihan, Pendampingan, &amp; Pemasaran)</li>
                                    <li>Melaporkan data perkembangan usaha (Omset &amp; Tenaga Kerja) secara berkala (Per 4 Bulan)</li>
                                    <li>Jenis bidang usaha : Manufaktur, Kuliner, atau Kerajinan</li>
                                </ul>
                                <p class="requirements-pdf"><strong>Persyaratan lengkap :</strong> <a href="https://tinyurl.com/SyaratUMKMBinaanYDBA" target="_blank">tinyurl.com/SyaratUMKMBinaanYDBA</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="requirements-panel requirements-panel-alt">
                                <h3>Manfaat Bergabung</h3>
                                <ul class="requirements-list">
                                    <li>Dukungan pembinaan dan pelatihan usaha dari YDBA Astra</li>
                                    <li>Peluang pemasaran lebih luas melalui jaringan BMI</li>
                                    <li>Pendampingan bisnis dan penguatan kapasitas produksi</li>
                                    <li>Akses data perkembangan usaha untuk evaluasi dan peningkatan</li>
                                    <li>Komunitas UMKM yang berkolaborasi dan berbagi peluang</li>
                                </ul>
                                <p class="requirements-panel-subtext">Lebih dari sekadar syarat, BMI hadir untuk membantu UMKM Anda tumbuh lebih kuat, lebih terstruktur, dan siap menghadapi pasar.</p>
                            </div>
                        </div>
                    </div>

                    <p class="requirements-note">Sudah siap membawa usaha Anda ke level baru? Klik tombol di bawah untuk gabung dengan BMI dan kembangkan UMKM Anda dengan dukungan pembinaan, pemasaran, dan jaringan yang tepat.</p>

                    <div class="requirements-actions d-flex flex-wrap align-items-center mt-30 mb-100">
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLScxMP9qCIOt7CkjUH7sYYofUJWon-drSAQoX5mF8u-wT-MShw/viewform" target="_blank" class="requirements-btn requirements-btn-primary">Daftar Disini</a>
                        <a href="/" class="requirements-btn requirements-btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('client')
    @include('layout.client')
@endsection
