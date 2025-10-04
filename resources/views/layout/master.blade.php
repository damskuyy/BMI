<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bogor Manufaktur Indonesia</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="fe/img/logo/logo-bmi-kotak.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fe/css/owl.carousel.min.css">
    <link rel="stylesheet" href="fe/css/slicknav.css">
    <link rel="stylesheet" href="fe/css/animate.min.css">
    <link rel="stylesheet" href="fe/css/magnific-popup.css">
    <link rel="stylesheet" href="fe/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="fe/css/themify-icons.css">
    <link rel="stylesheet" href="fe/css/slick.css">
    <link rel="stylesheet" href="fe/css/nice-select.css">
    <link rel="stylesheet" href="fe/css/style.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="fe/img/logo/logo-bmi-kotak.png" alt="">
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
                    <div class="container-fluid">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li>+62-821-8932-7077</li>
                                        <li>bogormanufakturindonesia@gmail.com</li>
                                        {{-- <li>Mon - Sat 8:00 - 17:30, Sunday - CLOSED</li> --}}
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.facebook.com/share/1775GVAmjM/" target="_blank"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li> <a href=" https://www.instagram.com/bogor_manufaktur_indonesia?igsh=YTdmM3d5dThmMmFp"
                                                target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li> <a href=" https://www.instagram.com/bogor_manufaktur_indonesia?igsh=YTdmM3d5dThmMmFp"
                                                target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                    <!-- logo-1 -->
                                    <a href="/home" class="big-logo"><img src="fe/img/logo/logo-bmi.png"
                                            style="width: auto; height: 90px;" alt=""></a>
                                    <!-- logo-2 -->
                                    <a href="/home" class="small-logo"><img src="fe/img/logo/loder-logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="/home" {{ Request::is('home') ? 'active' : '' }}>Home</a></li>
                                            {{-- <li><a href="/about">About</a></li> --}}
                                            <li><a href="/about"
                                                    class="{{ Request::is('about') ? 'active' : '' }}">About</a>
                                                <ul class="submenu">
                                                    <li><a href="/manufaktur-about"
                                                            class="{{ Request::is('manufaktur-about') ? 'active' : '' }}">Manufacture</a>
                                                    </li>
                                                    <li><a href="/umkm-about"
                                                            class="{{ Request::is('umkm-about') ? 'active' : '' }}">Kuliner</a>
                                                    </li>
                                                    <li><a href="/kerajinan-about"
                                                            class="{{ Request::is('kerajinan-about') ? 'active' : '' }}">Kerajinan</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="/members"
                                                    class="{{ Request::is('members') ? 'active' : '' }}">Members</a>
                                            </li>
                                            <li><a href="/product"
                                                    class="{{ Request::is('product') ? 'active' : '' }}">Product</a>
                                            </li>
                                            <li><a href="/gallery"
                                                    class="{{ Request::is('gallery') ? 'active' : '' }}">Gallery</a>
                                            </li>
                                            {{-- <li><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="elements.html">Element</a></li>
                                                    <li><a href="project_details.html">Projects Details</a></li>
                                                    <li><a href="services_details.html">Services Details</a></li>
                                                </ul>
                                            </li> --}}
                                            {{-- <li><a href="/contact"
                                                    class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                                            </li> --}}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <a href="/contact" class="btn">Contact Now</a>
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
        @yield('client')
        @yield('testimonial')
        <!-- contact with us Start -->
        {{-- <section class="contact-with-area" data-background="fe/img/gallery/section-bg2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 offset-xl-1 offset-lg-1">
                        <div class="contact-us-caption">
                            <div class="team-info mb-30 pt-45">
                                <!-- Section Tittle -->
                                <div class="section-tittle section-tittle4">
                                    <div class="front-text">
                                        <h2 class="">Lats talk with us</h2>
                                    </div>
                                    <span class="back-text">Lat`s chat</span>
                                </div>
                                <p>Mollit anim laborum.Dvcuis aute iruxvfg dhjkolohr in re voluptate velit esscillumlore
                                    eu quife nrulla parihatur. Excghcepteur sfwsignjnt occa cupidatat non aute iruxvfg
                                    dhjinulpadeserunt mollitemnth incididbnt ut;o5tu layjobore mofllit anim.</p>
                                <a href="#" class="white-btn">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- contact with us End-->

        <!--latest Nnews Area start -->
        {{-- <div class="latest-news-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle7 mb-50">
                            <div class="front-text">
                                <h2 class="">latest news</h2>
                            </div>
                            <span class="back-text">Our Blog</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <!-- single-news -->
                        <div class="single-news mb-30">
                            <div class="news-img">
                                <img src="fe/img/david/david_1.png" alt="">
                                <div class="news-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="news-caption">
                                <ul class="david-info">
                                    <li> | &nbsp; &nbsp; Porperties</li>
                                </ul>
                                <h2><a href="single-blog.html">Footprints in Time is perfect
                                        House in Kurashiki</a></h2>
                                <a href="single-blog.html" class="d-btn">Read more »</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <!-- single-news -->
                        <div class="single-news mb-30">
                            <div class="news-img">
                                <img src="fe/img/david/david_2.png" alt="">
                                <div class="news-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="news-caption">
                                <ul class="david-info">
                                    <li> | &nbsp; &nbsp; Porperties</li>
                                </ul>
                                <h2><a href="single-blog.html">Footprints in Time is perfect
                                        House in Kurashiki</a></h2>
                                <a href="single-blog.html" class="d-btn">Read more » </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--latest News Area End -->

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
                                        <image href="fe/img/logo/logo-bmi.png"
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
                                    <h4>Quick Links</h4>
                                    <ul>
                                        <li><a href="/home">Home</a></li>
                                        <li><a href="/about">About</a></li>
                                        <li><a href="/members">Members</a></li>
                                        <li><a href="/product">Product</a></li>
                                        <li><a href="/gallery">Gallery</a></li>
                                        <li><a href="/contact">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Contact</h4>
                                    <div class="footer-pera">
                                        <p class="info1">Jl. Industri Kp. Sireum Kilang No. 15 Kab Bogor, 16810</p>
                                    </div>
                                    <ul>
                                        <li><a href="#">Phone: +62-821-8932-7077</a></li>
                                        {{-- <li><a href="#">Cell: +95 (0) 123 456 789</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank"
                                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part" novalidate="true">
                                            {{-- <input type="email" name="EMAIL" id="newsletter-form-email"
                                                placeholder=" Email Address " class="placeholder hide-on-focus"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = ' Email Address '"> --}}
                                            {{-- <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm">
                                                    SIGN UP
                                                </button>
                                            </div> --}}
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Map -->
                                <div class="map-footer">
                                    <img src="fe/img/gallery/map-footer.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Copy-Right -->
                    <div class="row align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>document.write(new Date().getFullYear());</script> Bogor Manufaktur
                                    Indonesia | All rights reserved
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
    
    <!-- JS here -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- All JS Custom Plugins Link Here here -->
    <script src="/fe/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="/fe/js/vendor/jquery-1.12.4.min.js"></script>
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
                $('#productPreviewDesc').text(desc);
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

</body>
</html>