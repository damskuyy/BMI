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
                        <p>Maju bersama sesama anggota untuk meningkatkan usaha berkelanjutan.</p>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card-misi">
                        <h3 class="section-title">Misi</h3>
                        <ul>
                            <li>Menjalankan dan membantu UMKM naik kelas dan berkelanjutan.</li>
                            <li>Membuat pelanggan percaya dan memberikan pelayanan terbaik.</li>
                            <li>Membangun kolaborasi dan saling mendukung antar anggota.</li>
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
                                Akan menjadi koperasi terbaik se-Indonesia, & akan membangun perekonomian yang baik di Kabupaten Bogor.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Goals -->
    <section class="about-section about-goals">
        <div class="container">
            <div class="card-goals">
                <h3 class="section-title">Our Goals</h3>
                <ul>
                    <li>Mempunyai gedung atau gallery tahun 2028.</li>
                    <li>Omzet Rp. 1 Milyar tahun 2026 atau tumbuh 100% per tahun.</li>
                    <li>Mempunyai 1.000 anggota UMKM tahun 2030.</li>
                    <li>Mempunyai komunitas yang solid untuk mencapai kesejahteraan anggota BMI.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Business Model Canvas Section -->
    <section class="about-section about-bmc mb-5">
        <div class="container">
            <h3 class="section-title text-center" style="color:#00235b;font-weight:700;margin-bottom:24px;">
                Business Model Canvas
            </h3>
            <div class="bmc-grid" style="display:grid;grid-template-columns:2fr 2fr 2fr 2fr 2fr;gap:12px;">
                <div class="bmc-cell" style="grid-column:1;grid-row:1/3;background:#f7f7fd;border-radius:8px;padding:16px;">
                    <b>Key Partners</b>
                    <ul style="font-size:14px;margin-top:8px;">
                        <li>Jaringan antar anggota (UMKM) & Komunitas</li>
                        <li>YDBA</li>
                        <li>Ayah Angkat</li>
                        <li>Pemerintah (KEMENPERIN, DPMPTSP, DISDAGIN, DISKOP)</li>
                        <li>Notaris</li>
                        <li>Supplier material</li>
                        <li>Anggota Produsen</li>
                    </ul>
                </div>
                <div class="bmc-cell" style="grid-column:2;grid-row:1;background:#f7f7fd;border-radius:8px;padding:16px;">
                    <b>Key Activities</b>
                    <ul style="font-size:14px;margin-top:8px;">
                        <li>Pelatihan & Pendampingan</li>
                        <li>Benchmarking</li>
                        <li>Temu rutin komunitas bisnis</li>
                        <li>Pelatihan & Pendampingan terkait QCD</li>
                        <li>Mengelola hubungan dengan supplier/ayah angkat</li>
                        <li>Mengelola harga competitor</li>
                        <li>Penjualan B2B, B2C</li>
                        <li>Mengelola Digital Platform</li>
                    </ul>
                </div>
                <div class="bmc-cell" style="grid-column:2;grid-row:2;background:#f7f7fd;border-radius:8px;padding:16px;">
                    <b>Key Resources</b>
                    <ul style="font-size:14px;margin-top:8px;">
                        <li>Ekosistem YDBA</li>
                        <li>Legalitas komunitas bisnis korporasi</li>
                        <li>Management system</li>
                        <li>Sosial Media Marketing</li>
                        <li>Website</li>
                        <li>Gedung Korporasi</li>
                    </ul>
                </div>
                <div class="bmc-cell" style="grid-column:3;grid-row:1/3;background:#f7f7fd;border-radius:8px;padding:16px;">
                    <b>Value Propositions</b>
                    <ul style="font-size:14px;margin-top:8px;">
                        <li>Produk anggota komunitas MFG, KUL & KRJN yang mempunyai nilai kualitas dan pelayanan terbaik</li>
                    </ul>
                </div>
                <div class="bmc-cell" style="grid-column:4;grid-row:1;background:#f7f7fd;border-radius:8px;padding:16px;">
                    <b>Customer Relationships</b>
                    <ul style="font-size:14px;margin-top:8px;">
                        <li>Self service by komunitas/community organizer</li>
                        <li>Special price-special moment</li>
                        <li>Garansi Produk/Jasa</li>
                    </ul>
                </div>
                <div class="bmc-cell" style="grid-column:4;grid-row:2;background:#f7f7fd;border-radius:8px;padding:16px;">
                    <b>Channels</b>
                    <ul style="font-size:14px;margin-top:8px;">
                        <li>Sosial Media Marketing</li>
                        <li>Website</li>
                        <li><i>Government</i></li>
                        <li>Networking ekosistem YDBA</li>
                        <li>Jaringan antar anggota & Komunitas</li>
                    </ul>
                </div>
                <div class="bmc-cell" style="grid-column:5;grid-row:1/3;background:#f7f7fd;border-radius:8px;padding:16px;">
                    <b>Customer Segments</b>
                    <ul style="font-size:14px;margin-top:8px;">
                        <li><b>B2B</b>
                            <ul>
                                <li>Perusahaan swasta</li>
                                <li>Grup Astra/Non Grup Astra</li>
                                <li>Jaringan market existing UKM</li>
                                <li>Pemerintahan</li>
                                <li>BUMN/BUMD</li>
                            </ul>
                        </li>
                        <li><b>B2C</b>
                            <ul>
                                <li>Market place</li>
                                <li>Pasar tradisional</li>
                                <li>Anggota Komunitas</li>
                                <li>Pameran</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="bmc-cell" style="background:#eaf6ff;border-radius:8px;padding:16px;">
                        <b>Cost Structure</b>
                        <ul style="font-size:14px;margin-top:8px;">
                            <li>Biaya Legalitas Koperasi</li>
                            <li>Biaya Pembuatan Platform Digital</li>
                            <li>Biaya Operasional (BBM, Listrik, Internet, dll)</li>
                            <li>Biaya Marketing</li>
                            <li>Biaya R & D</li>
                            <li>Biaya Gaji Pegawai</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bmc-cell" style="background:#eaf6ff;border-radius:8px;padding:16px;">
                        <b>Revenue Streams</b>
                        <ul style="font-size:14px;margin-top:8px;">
                            <li>Penjualan produk alat rumah</li>
                            <li>Penjualan produk alat kebersihan</li>
                            <li>Penjualan produk alat kesehatan</li>
                            <li>Penjualan produk Aksesoris R2 & AC</li>
                            <li>Jasa Pabrikasi & Custom</li>
                            <li>Penjualan produk KUL & KRJN</li>
                            <li>Next: Penyedia material, equipment, tools, dll untuk anggota</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latar Belakang Koperasi BMI - Interaktif -->
    <section class="about-section background-bmi py-5">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <div style="position:relative;display:inline-block;">
                        <h2 class="section-title" style="font-size:2.4rem;color:#ff0000;font-weight:900;letter-spacing:1px;line-height:1.2;">
                            <span style="background:linear-gradient(90deg,#ff0000 60%,#f27420 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">
                                Latar Belakang
                            </span>
                            <br>
                            <span style="color:#00235b;font-size:2rem;font-weight:700;">
                                Koperasi Bogor Manufaktur Indonesia
                            </span>
                        </h2>
                        <div style="height:4px;width:80px;background:linear-gradient(90deg,#ff0000 60%,#f27420 100%);border-radius:2px;margin:18px auto 0;"></div>
                    </div>
                    <p style="font-size:1.15rem;color:#222;margin-top:18px;max-width:650px;margin-left:auto;margin-right:auto;">
                        <span style="background:rgba(255,0,0,0.07);padding:4px 12px;border-radius:8px;font-weight:500;">
                            Mengapa KBMI hadir dan menjadi motor penggerak UMKM di Bogor?
                        </span>
                        <br>
                        <span style="color:#00235b;font-weight:600;">
                            Temukan kekuatan, sinergi, dan dampaknya untuk UMKM, masyarakat, dan ekonomi lokal!
                        </span>
                    </p>
                </div>
            </div>
            <div class="row gy-4">
                <!-- Card 1: Visi & Misi YDBA -->
                <div class="col-md-6 col-lg-3">
                    <div class="card hover-animate h-100 shadow-sm border-0" style="background:linear-gradient(135deg,#fff 80%,#eaf6ff 100%);border-radius:18px;">
                        <div class="card-body text-center">
                            <img src="https://firebasestorage.googleapis.com/v0/b/explorefireb4se.appspot.com/o/Icons%2Fsearch-book-unscreen.gif?alt=media&token=72708d0c-ac38-4eea-98e3-94d05d263010" alt="YDBA" style="width:48px;height:48px;margin-bottom:12px;">
                            <h5 class="card-title" style="color:#ff0000;font-weight:700;">Visi & Misi YDBA</h5>
                            <p class="card-text" style="font-size:15px;">
                                <span style="color:#ff0000;font-weight:600;">"Berikan Kail Bukan Ikan"</span> – Filosofi Yayasan Astra membina UMKM agar mandiri dan berdaya saing, bukan sekadar bantuan sesaat. KBMI adalah hasil pembinaan intensif, berstandar tinggi, dan terkurasi.
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center">
                            <span class="badge badge-pill badge-danger px-3 py-2" style="background:#ff0000;color:#fff;">Pembinaan Astra</span>
                        </div>
                    </div>
                </div>
                <!-- Card 2: Potensi Bogor -->
                <div class="col-md-6 col-lg-3">
                    <div class="card hover-animate h-100 shadow-sm border-0" style="background:linear-gradient(135deg,#fff 80%,#ffeaea 100%);border-radius:18px;">
                        <div class="card-body text-center">
                            <img src="https://firebasestorage.googleapis.com/v0/b/explorefireb4se.appspot.com/o/Icons%2F360-feedback.gif?alt=media&token=63220144-e26a-4e26-a32d-49434ed8380d" alt="Bogor" style="width:48px;height:48px;margin-bottom:12px;">
                            <h5 class="card-title" style="color:#00235b;font-weight:700;">Potensi & Karakteristik Bogor</h5>
                            <ul class="list-unstyled" style="font-size:15px;">
                                <li><b>Manufaktur:</b> Komponen & sparepart industri.</li>
                                <li><b>Kuliner:</b> Olahan talas, asinan, makanan khas.</li>
                                <li><b>Kerajinan:</b> Eco-print, kayu, batik Bogor.</li>
                            </ul>
                            <p style="font-size:14px;color:#888;">Bogor: Pusat pertumbuhan ekonomi Jawa Barat, dekat Jakarta, kaya sumber daya & budaya.</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center">
                            <span class="badge badge-pill badge-primary px-3 py-2" style="background:#00235b;color:#fff;">Kekayaan Lokal</span>
                        </div>
                    </div>
                </div>
                <!-- Card 3: Sinergi Tiga Sektor -->
                <div class="col-md-6 col-lg-3">
                    <div class="card hover-animate h-100 shadow-sm border-0" style="background:linear-gradient(135deg,#fff 80%,#eafbe7 100%);border-radius:18px;">
                        <div class="card-body text-center">
                            <img src="https://firebasestorage.googleapis.com/v0/b/explorefireb4se.appspot.com/o/Icons%2Fmanagement-consulting.gif?alt=media&token=db2d8a1b-46ff-4e95-b8ff-478beddbfeba" alt="Sinergi" style="width:48px;height:48px;margin-bottom:12px;">
                            <h5 class="card-title" style="color:#009e3c;font-weight:700;">Sinergi Tiga Sektor</h5>
                            <p class="card-text" style="font-size:15px;">
                                <b>Koperasi Multisektor:</b> Manufaktur, Kuliner, Kerajinan saling mendukung. Sinergi produk, kolaborasi pemasaran, efisiensi operasional, dan skala ekonomi tercipta untuk seluruh anggota.
                            </p>
                            <div class="d-flex justify-content-center gap-2 mt-2">
                                <span class="badge badge-success mr-10" style="background:#009e3c;">Kolaborasi</span>
                                <span class="badge badge-success" style="background:#009e3c;">Diversifikasi</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 4: Tujuan & Dampak -->
                <div class="col-md-6 col-lg-3">
                    <div class="card hover-animate h-100 shadow-sm border-0" style="background:linear-gradient(135deg,#fff 80%,#ffeaea 100%);border-radius:18px;">
                        <div class="card-body text-center">
                            <img src="https://firebasestorage.googleapis.com/v0/b/explorefireb4se.appspot.com/o/Icons%2Ftrophy-unscreen.gif?alt=media&token=006d9110-a018-4cc1-a730-785acfa81bc7" alt="Dampak" style="width:48px;height:48px;margin-bottom:12px;">
                            <h5 class="card-title" style="color:#f27420;font-weight:700;">Tujuan & Dampak</h5>
                            <ul class="list-unstyled" style="font-size:15px;">
                                <li>UMKM <b>naik kelas</b> & mandiri.</li>
                                <li>Motor ekonomi lokal.</li>
                                <li>Penyerapan tenaga kerja & nilai tambah produk Bogor.</li>
                            </ul>
                            <span class="badge badge-pill badge-danger px-3 py-2 mt-2" style="background:#f27420;color:#fff;">Dampak Nyata</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Interaktif: Timeline/Highlight -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="bmi-timeline px-2 py-4" style="background:#f7f7fd;border-radius:18px;">
                        <div class="d-flex flex-wrap align-items-center justify-content-center gap-4">
                            <div class="timeline-step text-center">
                                <div class="timeline-icon" style="background:#ff0000;width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:auto;">
                                    <i class="fas fa-lightbulb" style="color:#fff;font-size:22px;"></i>
                                </div>
                                <div class="timeline-label mt-2" style="font-weight:600;color:#ff0000;">Inspirasi YDBA</div>
                                <div style="font-size:13px;color:#222;">Pembinaan UMKM berstandar tinggi</div>
                            </div>
                            <div class="timeline-arrow" style="font-size:32px;color:#ff0000;">→</div>
                            <div class="timeline-step text-center">
                                <div class="timeline-icon" style="background:#00235b;width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:auto;">
                                    <i class="fas fa-map-marker-alt" style="color:#fff;font-size:22px;"></i>
                                </div>
                                <div class="timeline-label mt-2" style="font-weight:600;color:#00235b;">Potensi Bogor</div>
                                <div style="font-size:13px;color:#222;">Manufaktur, Kuliner, Kerajinan</div>
                            </div>
                            <div class="timeline-arrow" style="font-size:32px;color:#ff0000;">→</div>
                            <div class="timeline-step text-center">
                                <div class="timeline-icon" style="background:#009e3c;width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:auto;">
                                    <i class="fas fa-users" style="color:#fff;font-size:22px;"></i>
                                </div>
                                <div class="timeline-label mt-2" style="font-weight:600;color:#009e3c;">Sinergi Sektor</div>
                                <div style="font-size:13px;color:#222;">Kolaborasi & Efisiensi</div>
                            </div>
                            <div class="timeline-arrow" style="font-size:32px;color:#ff0000;">→</div>
                            <div class="timeline-step text-center">
                                <div class="timeline-icon" style="background:#f27420;width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:auto;">
                                    <i class="fas fa-rocket" style="color:#fff;font-size:22px;"></i>
                                </div>
                                <div class="timeline-label mt-2" style="font-weight:600;color:#f27420;">Dampak & Tujuan</div>
                                <div style="font-size:13px;color:#222;">UMKM Mandiri & Motor Ekonomi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CTA Interaktif -->
            <div class="row mt-4">
                <div class="col-lg-12 text-center">
                    <a href="/members" class="btn btn-lg btn-primary" style="background:#ff0000;border-radius:8px;font-weight:700;letter-spacing:1px;">
                        Lihat Anggota Koperasi & Produk Unggulan Bogor
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Area Start -->
@endsection
@section('client')
    @include('layout.client')
@endsection