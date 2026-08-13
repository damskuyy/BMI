<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bogor Manufaktur Indonesia</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('fe/img/logo/logo-bmi-kotak.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('fe/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/magnific-popup.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('fe/css/fontawesome-all.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('fe/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/style.css') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- SweetAlert CSS -->
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Clean circular CTA in bottom-left with inline SVG (no image borders) */
        .tiktok-live-cta{
            position: fixed !important;
            bottom: 24px !important;
            left: 24px !important;
            right: auto !important;
            z-index: 99999 !important;
            display: block !important;
            pointer-events: auto;
        }
        .tiktok-live-cta a{
            display:block;
            width: 120px !important;
            height: 120px !important;
            overflow: visible !important;
            border-radius: 50% !important;
            padding: 0 !important;
            margin: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
            border: none !important;
            outline: none !important;
        }
        .tiktok-live-cta svg{
            width: 100% !important;
            height: 100% !important;
            display: block !important;
        }
        /* smaller on mobile */
        @media (max-width: 575px) {
            .tiktok-live-cta{ bottom: 16px !important; left: 16px !important; }
            .tiktok-live-cta a{ width: 88px !important; height: 88px !important; }
        }
    </style>
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                                    <div class="preloader-img pere-text">
                    <img src="{{ asset('fe/img/logo/logo-bmi-kotak.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li><a href="https://wa.me/6282189327077">+62-821-8932-7077</a></li>
                                        <li><a href="mailto:bogormanufakturindonesia@gmail.com" target="_blank">bogormanufakturindonesia@gmail.com</a></li>
                                        {{-- <li>Mon - Sat 8:00 - 17:30, Sunday - CLOSED</li> --}}
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">
                                        <li>
                                            <a href="https://id.shp.ee/THsScMy" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg"  width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M15.941 17.963c.23-1.879-.98-3.077-4.175-4.097c-1.548-.528-2.277-1.22-2.26-2.171c.065-1.056 1.048-1.825 2.352-1.85a5.3 5.3 0 0 1 2.883.89c.116.072.197.06.263-.04c.09-.144.315-.493.39-.62c.051-.08.061-.186-.068-.28c-.185-.137-.704-.415-.983-.532a6.5 6.5 0 0 0-2.511-.514c-1.91.008-3.413 1.215-3.54 2.826q-.122 1.746 1.73 2.827c.263.152 1.68.716 2.244.892c1.774.552 2.695 1.542 2.478 2.697c-.197 1.047-1.299 1.724-2.818 1.744c-1.203-.046-2.287-.537-3.127-1.19l-.141-.11c-.104-.08-.218-.075-.287.03c-.05.077-.376.547-.458.67c-.077.108-.035.168.045.234c.35.293.817.613 1.134.775a6.7 6.7 0 0 0 2.829.727a4.9 4.9 0 0 0 2.075-.354c1.095-.465 1.803-1.394 1.945-2.554M12 1.401c-2.068 0-3.754 1.95-3.833 4.39h7.665C15.751 3.35 14.066 1.4 12 1.4m7.851 22.598l-.08.001l-15.784-.002c-1.074-.04-1.863-.91-1.971-1.991l-.01-.195l-.707-15.526a.46.46 0 0 1 .45-.494h4.975C6.845 2.568 9.16 0 12 0s5.153 2.569 5.275 5.79h4.968a.46.46 0 0 1 .458.483l-.773 15.588l-.007.131c-.094 1.094-.979 1.977-2.07 2.006"/></svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.tokopedia.com/bogor-manufaktur-indonesia/" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48"><path fill="currentColor"stroke="#222" stroke-linecap="round" stroke-linejoin="round" d="M27.043 12.942c-3.43-2.897-16.85-2.247-16.85-2.247l-.473 32.65s17.855.134 23.353 0s9.341-4.508 9.4-7.878s0-24.18 0-24.18c-6.858-.829-11.942-.178-15.43 1.655" stroke-width="2"/><circle cx="19.531" cy="24.172" r="6.976" fill="currentColor"stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path fill="currentColor"stroke="#222" stroke-linecap="round" stroke-linejoin="round" d="M32.043 29.33a6.272 6.272 0 1 0-2.3-1.786m-19.55-16.849l-4.494 3.252L5.5 39.369l4.22 3.977m23.975-32.251a7.796 7.796 0 0 0-15.318-.299" stroke-width="2"/><path fill="currentColor"stroke="#222" stroke-linecap="round" stroke-linejoin="round" d="M34.396 19.662a2.36 2.36 0 0 1-3.878 2.59a4.194 4.194 0 1 0 3.878-2.59m-13.872.345a2.424 2.424 0 0 1-4.251 2.211a4.31 4.31 0 1 0 4.25-2.21m3.838 11.41c0-2.817 2.031-3.962 4.721-3.962c2.395 0 3.755 3.252 3.755 3.252a18.2 18.2 0 0 1-7.45 1.449a9.9 9.9 0 0 0 5.321 2.542s-.827.62-3.665.62c-2.306.001-2.682-2.453-2.682-3.902" stroke-width="2"/><path fill="currentColor"stroke="#222" stroke-linecap="round" stroke-linejoin="round" d="M30.317 31.569a10.4 10.4 0 0 1-.258 3.008" stroke-width="2"/></svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/share/1775GVAmjM/" target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/bogor_manufaktur_indonesia?igsh=YTdmM3d5dThmMmFp" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.tiktok.com/@bmi_business" target="_blank">
                                                <i class="fab fa-tiktok"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                    <!-- logo-1 -->
                                        <a href="/home" class="big-logo"><img src="{{ asset('fe/img/logo/bmi-round4.png') }}"
                                            style="width: auto; height: 90px;" alt=""></a>
                                    <!-- logo-2 -->
                                    <a href="/home" class="small-logo"><img src="{{ asset('fe/img/logo/bmi-round4.png') }}" style="width: auto; height: 48px;" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            {{-- <li>
                                                <a href="/home" class="{{ Request::is('home') ? 'active' : '' }}">Home</a>
                                            </li> --}}
                                            <li>
                                                <a href="/about" class="{{ Request::is('about') ? 'active' : '' }}">Tentang</a>
                                                <ul class="submenu">
                                                    <li class="d-block d-lg-none">
                                                        <a href="/about" class="{{ Request::is('about') ? 'active' : '' }}">BMI</a>
                                                    </li>
                                                    <li>
                                                        <a href="/manufaktur-about" class="{{ Request::is('manufaktur-about') ? 'active' : '' }}">Manufaktur</a>
                                                    </li>
                                                    <li>
                                                        <a href="/umkm-about" class="{{ Request::is('umkm-about') ? 'active' : '' }}">Kuliner</a>
                                                    </li>
                                                    <li>
                                                        <a href="/kerajinan-about" class="{{ Request::is('kerajinan-about') ? 'active' : '' }}">Kerajinan</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="/members" class="{{ Request::is('members') ? 'active' : '' }}">Anggota</a>
                                            </li>
                                            <li>
                                                <a href="/product" class="{{ Request::is('product') ? 'active' : '' }}">Produk</a>
                                            </li>
                                            <li>
                                                <a href="/gallery" class="{{ Request::is('gallery') ? 'active' : '' }}">Galeri</a>
                                            </li>
                                            <li>
                                                <a href="/blog" class="{{ Request::is('blog') ? 'active' : '' }}">Berita</a>
                                            </li>
                                            <li class="d-block d-lg-none">
                                                <a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">Kontak</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <a href="/contact" class="btn">Hubungi Kami</a>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
        @yield('slider')
        @yield('countdown')
        @yield('content')
        @yield('about')
        @yield('service')
        @yield('product')
        @yield('team')
        @yield('join')
        @yield('client')
        @yield('testimonial')
    </main>

    <footer>
        <!-- Footer Start-->
        <div class="footer-main">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row  justify-content-between">
                        <div class="col-lg-4 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="400" height="200"
                                        viewBox="0 0 400 200">
                                        <!-- Shape pita pendek -->
                                        <path d="M 100,60 L 80,80 L 100,100 L 80,120 L 100,140 L 300,140 L 320,120 L 300,100 L 320,80 L 300,60 Z" fill="white" fill-opacity="0.3" />
                                        <!-- Logo di depan -->
                                        <image href="{{ asset('fe/img/logo/logo-bmi.png') }}"
                                            x="70" y="40" width="250" height="120"
                                            preserveAspectRatio="xMidYMid meet" />
                                    </svg>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">Kami adalah UMKM binaan Astra yang bergerak di bidang manufaktur, kuliner, dan juga kerajinan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Link Cepat</h4>
                                    <ul>
                                        <li><a href="/home">Beranda</a></li>
                                        <li><a href="/about">Tentang Kami</a></li>
                                        <li><a href="/members">Anggota</a></li>
                                        <li><a href="/product">Produk</a></li>
                                        <li><a href="/gallery">Galeri</a></li>
                                        <li><a href="/blog">Berita</a></li>
                                        <li><a href="/contact">Hubungi Kami</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Kontak</h4>
                                    <div class="footer-pera">
                                        <p class="info1">Jl. Industri Kp. Sireum Kilang No. 15 Kab Bogor, 16810</p>
                                    </div>
                                    <ul>
                                        <li><a href="https://wa.me/6282189327077">Phone: +62-821-8932-7077</a></li>
                                        {{-- <li><a href="#">Cell: +95 (0) 123 456 789</a></li> --}}
                                    </ul>
                                    <ul>
                                        <li><a href="/dashboard">Admin</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank"
                                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part" novalidate="true">
                                            <input type="email" name="EMAIL" id="newsletter-form-email"
                                                placeholder=" Email Address " class="placeholder hide-on-focus"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm">
                                                    SIGN UP
                                                </button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Map -->
                                <div class="map-footer">
                                    <img src="{{ asset('fe/img/gallery/map-footer.png') }}" alt="">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Copy-Right -->
                    <div class="row align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>document.write(new Date().getFullYear());</script> Bogor Manufaktur
                                    Indonesia | All rights reserved
                                    <!-- Subtle admin shortcut placed inline next to copyright -->
                                    {{-- <a href="/dashboard" class="admin-link" title="Admin area (for site managers)" aria-label="Admin area">
                                        <small>Admin</small>
                                    </a> --}}
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <div class="tiktok-live-cta" aria-hidden="false">
        <a href="https://www.tiktok.com/@bmi_business" target="_blank" rel="noopener noreferrer" aria-label="Tiktok Live">
            <!-- Inline SVG: circular badge with broadcast waves and LIVE text; transparent background -->
            <svg viewBox="0 0 160 160" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="false">
                <defs>
                    <linearGradient id="g1" x1="0" x2="1">
                        <stop offset="0%" stop-color="#00f0ff" />
                        <stop offset="100%" stop-color="#ff2fa6" />
                    </linearGradient>
                </defs>
                <!-- outer circle (transparent fill) -->
                <circle cx="80" cy="80" r="78" fill="transparent" />
                <!-- small rounded rectangle badge background (transparent center, subtle stroke) -->
                <rect x="8" y="44" width="96" height="72" rx="12" ry="12" fill="#000000" fill-opacity="0.85" stroke="url(#g1)" stroke-width="3" />
                <!-- broadcast waves (left) -->
                <g transform="translate(18,78) scale(0.9)">
                    <path d="M6 0 C6 0 6 0 6 0" fill="none"/>
                    <path d="M0 -6 C6 -12 18 -12 24 -6" stroke="#ffffff" stroke-width="3" fill="none" stroke-linecap="round"/>
                    <path d="M6 -12 C12 -18 30 -18 36 -12" stroke="#ffffff" stroke-width="2" fill="none" stroke-linecap="round" opacity="0.85"/>
                    <circle cx="6" cy="-6" r="4" fill="#ffffff" />
                </g>
                <!-- LIVE text -->
                <text x="60" y="90" font-family="Arial, Helvetica, sans-serif" font-size="28" fill="#ffffff" font-weight="700">LIVE</text>
            </svg>
        </a>
    </div>

    <!-- JS here -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- All JS Custom Plugins Link Here here -->
    <script src="/fe/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="/fe/js/popper.min.js"></script>
    <script src="/fe/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="/fe/js/jquery.slicknav.min.js"></script>
    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="/fe/js/owl.carousel.min.js"></script>
    <script src="/fe/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="/fe/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="/fe/js/wow.min.js"></script>
    <script src="/fe/js/animated.headline.js"></script>
    <script src="/fe/js/jquery.magnific-popup.js"></script>
    <!-- Scrollup, nice-select, sticky -->
    <script src="/fe/js/jquery.scrollUp.min.js"></script>
    <script src="/fe/js/jquery.nice-select.min.js"></script>
    <script src="/fe/js/jquery.sticky.js"></script>
    <!-- counter , waypoint -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="/fe/js/jquery.counterup.min.js"></script>
    <!-- contact js -->
    <script src="/fe/js/contact.js"></script>
    <script src="/fe/js/jquery.form.js"></script>
    <script src="/fe/js/jquery.validate.min.js"></script>
    <script src="/fe/js/mail-script.js"></script>
    <script src="/fe/js/jquery.ajaxchimp.min.js"></script>
    <!-- Jquery Plugins, main Jquery -->
    <script src="/fe/js/plugins.js"></script>
    <script src="/fe/js/main.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        // Adjust ukuran text otomatis di card product
        document.querySelectorAll('.project-cap h4').forEach(function(el) {
            // Mulai dari ukuran besar
            let maxFont = 25;
            let minFont = 18;
            el.style.fontSize = maxFont + 'px';
            el.style.whiteSpace = 'nowrap';
            el.style.overflow = 'visible';
            el.style.textOverflow = 'unset';

            // Perbesar font sampai hampir memenuhi lebar card, tapi tetap muat 1 baris
            while (
                el.scrollWidth <= el.offsetWidth &&
                parseFloat(el.style.fontSize) < maxFont
            ) {
                el.style.fontSize = (parseFloat(el.style.fontSize) + 1) + 'px';
            }
            // Jika font terlalu besar dan jadi lebih dari 1 baris, kecilkan lagi
            while (
                el.scrollWidth > el.offsetWidth &&
                parseFloat(el.style.fontSize) > minFont
            ) {
                el.style.fontSize = (parseFloat(el.style.fontSize) - 1) + 'px';
            }
        });

        // Images Preview Fullscreen
        $(document).ready(function() {
            $('.product-preview').on('click', function() {
                var img = $(this).data('img');
                var title = $(this).data('title');
                var desc = $(this).data('desc');
                $('#productPreviewImg').attr('src', img);
                $('#productPreviewLabel').text(title);
                // $('#productPreviewDesc').text(desc);
                $('#productPreviewModal').modal('show');
            });
        });

        // Data Tables
        $(document).ready(function() {
            $('#bmiTable').DataTable({
                responsive: true,
                pageLength: 5,
                lengthMenu: [5, 10, 15, 20, 25],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    }
                }
            });
        });

        // Text Align Left di Hero
        function forceLeftAlign() {
            // Untuk slider
            const sliderElements = document.querySelectorAll('.hero__caption, .stock-text, .hero-text1, .hero__caption h1, .stock-text h2');
            sliderElements.forEach(el => {
                el.style.textAlign = 'left';
                el.style.marginLeft = '0';
                el.style.paddingLeft = '0';
                el.style.float = 'none';
                el.style.display = 'block';
            });

            // Reset position untuk stock-text
            const stockTexts = document.querySelectorAll('.stock-text');
            stockTexts.forEach(el => {
                el.style.position = 'relative';
                el.style.left = '0';
                el.style.top = '0';
            });
        }
        // Jalankan setelah DOM loaded
        document.addEventListener('DOMContentLoaded', forceLeftAlign);
        // Jalankan lagi setelah semua resource loaded
        window.addEventListener('load', forceLeftAlign);
        // Jalankan lagi setelah 500ms untuk memastikan
        setTimeout(forceLeftAlign, 500);

        // HERO Images
        // $(document).ready(function(){
        //     $('.slider-active').owlCarousel({
        //         items: 1,
        //         loop: true,
        //         autoplay: true,
        //         autoplayTimeout: 3500,
        //         autoplayHoverPause: false,
        //         nav: true,
        //         dots: false,
        //         smartSpeed: 800,
        //         mouseDrag: true,
        //         touchDrag: true,
        //         animateOut: 'fadeOut',
        //         animateIn: 'fadeIn'
        //     });

        //     $('.single-slider').each(function(){
        //         var bg = $(this).attr('data-background');
        //         if(bg){
        //             $(this).css('background-image', 'url(' + bg + ')');
        //         }
        //     });
        // });
        // var swiper = new Swiper(".mySwiper", {
        //     loop: true,
        //     autoplay: {
        //         delay: 3500,
        //         disableOnInteraction: false,
        //     },
        //     pagination: {
        //         el: ".swiper-pagination",
        //         clickable: true,
        //     },
        //     navigation: {
        //         nextEl: ".swiper-button-next",
        //         prevEl: ".swiper-button-prev",
        //     },
        //     effect: "slide",
        // });

        // Plus sign di CountDown
        // document.addEventListener('DOMContentLoaded', function() {
        //     setTimeout(function() {
        //         document.querySelectorAll('.purecounter[data-plus="true"]').forEach(function(el) {
        //         if (!el.textContent.endsWith('+')) {
        //             el.textContent = el.textContent + '+';
        //         }
        //         });
        //     }, 1200); // waktu animasi purecounter
        // });

    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function(){
        const sliders = document.querySelectorAll('.single-slider[data-background]');
        sliders.forEach(function(slider) {
            const bgImage = slider.getAttribute('data-background');
            if(bgImage) {
                slider.style.backgroundImage = `url(${bgImage})`;
                // ensure animation runs with background present: remove then re-add class to trigger
                slider.classList.remove('slide-fade-zoom');
                // force reflow
                void slider.offsetWidth;
                slider.classList.add('slide-fade-zoom');
            }
        });
    });
    </script>

</body>
</html>

