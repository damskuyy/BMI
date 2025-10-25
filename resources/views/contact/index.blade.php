@extends('layout.master')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="fe/img/hero/kontak.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2 class="animate__animated animate__fadeInDown">Contact us</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb animate__animated animate__fadeInUp">
                                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Contact</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Google Map (baru) - tampilkan di atas Contact Info -->
    <section class="map-section mb-100 mt-150" aria-label="Office location map">
        <div class="container">
            <div class="map-wrapper" style="position:relative;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d549.8559420960822!2d106.89416792980698!3d-6.491895631717487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c1c81a8de3f9%3A0x6b605bdd71641d4f!2sLembaga%20Pengembangan%20Bisnis%20Tarikolot!5e1!3m2!1sid!2sid!4v1761366774753!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <a class="btn open-map-btn mt-2" href="https://maps.app.goo.gl/j4dKQfpNtQXgmPEr5" target="_blank" rel="noopener noreferrer" aria-label="Open in Google Maps">Buka di Google Maps</a>
            </div>
        </div>
    </section>
    <!-- End Google Map -->

    <!-- Contact Info Section Start -->
    <section class="contact-info-section mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-5">
                        <h2 class="text-gradient">Get In Touch</h2>
                        <p>We'd love to hear from you! Here's how you can reach us</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-card" data-aos="fade-up" data-aos-delay="100">
                        <a class="contact-link" href="https://maps.app.goo.gl/j4dKQfpNtQXgmPEr5" target="_blank" rel="noopener noreferrer">
                            <div class="contact-icon">
                                <i class="ti-home hover-rotate"></i>
                            </div>
                            <div class="contact-info">
                                <h3>Visit Us</h3>
                                <p>Jl. Industri Kp. Sireum Kilang No. 15</p>
                                <p>Kabupaten Bogor 16810</p>
                            </div>
                            <div class="hover-indicator">
                                <i class="ti-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="contact-card" data-aos="fade-up" data-aos-delay="200">
                        <a class="contact-link" href="https://wa.me/+6282189327077" target="_blank">
                            <div class="contact-icon">
                                <i class="ti-mobile hover-rotate"></i>
                            </div>
                            <div class="contact-info">
                                <h3>Call Us</h3>
                                <p>+62 821-8932-7077</p>
                                <p>Open for any massage</p>
                            </div>
                            <div class="hover-indicator">
                                <i class="ti-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="contact-card" data-aos="fade-up" data-aos-delay="300">
                        <a class="contact-link" href="mailto:bogormanufakturindonesia@gmail.com" target="_blank">
                            <div class="contact-icon">
                                <i class="ti-email hover-rotate"></i>
                            </div>
                            <div class="contact-info">
                                <h3>Email Us</h3>
                                <p>bogormanufakturindonesia@gmail.com</p>
                                <p>Send us your query anytime!</p>
                            </div>
                            <div class="hover-indicator">
                                <i class="ti-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Timeline Achievement Section -->
            <div class="row mt-5">
                <div class="col-lg-8">
                    <section class="contact-hub" data-aos="fade-up" data-aos-delay="400" aria-labelledby="contactHubTitle">
                        <h3 id="contactHubTitle" class="text-center mb-4">Contact Hub — cepat & informatif</h3>

                        <div class="hub-grid d-flex flex-wrap gap-3 justify-content-center">
                            <!-- Live Status -->
                            <article class="hub-card live-status" role="status" aria-live="polite">
                                <div class="status-dot" aria-hidden="true"></div>
                                <h4>Support Status</h4>
                                <p class="muted">Tim dukungan: <strong>Online</strong></p>
                                <p class="small">Biasanya tersedia 08:00 — 17:00 WIB. Klik Call atau WhatsApp untuk terhubung langsung.</p>
                            </article>

                            <!-- Office Hours -->
                            <article class="hub-card office-hours">
                                <h4>Office Hours</h4>
                                <div class="hours-bar" aria-hidden="true">
                                    <div class="hours-fill" style="--fill:80%"></div>
                                </div>
                                <ul class="hours-list">
                                    <li>Mon - Fri: 08:00 — 17:00</li>
                                    <li>Sat: Closed</li>
                                    <li>Sun: Closed</li>
                                </ul>
                            </article>

                            <!-- Team On Duty (avatars tanpa image) -->
                            <article class="hub-card team-duty" aria-label="Team on duty">
                                <h4>Team on Duty</h4>
                                <div class="team-row" role="list">
                                    <button class="avatar" type="button" data-name="Siti" data-role="Sales" data-phone="+6285643992099">E</button>
                                    <button class="avatar" type="button" data-name="Budi" data-role="Technical" data-phone="+6289516559355">H</button>
                                    <button class="avatar" type="button" data-name="Ahmad" data-role="Customer Support" data-phone="+6281311196895">B</button>
                                </div>
                                <p class="small mt-2 muted">Klik inisial untuk melihat kontak cepat.</p>
                            </article>

                            <!-- FAQ Accordion -->
                            <article class="hub-card faq" aria-labelledby="faqTitle">
                                <h4 id="faqTitle">FAQ singkat</h4>
                                <div class="accordion" role="tablist">
                                    <div class="acc-item">
                                        <button class="acc-btn" aria-expanded="false">Bagaimana cara mengunjungi kantor?</button>
                                        <div class="acc-panel" hidden>
                                            <p>Gunakan link 'Visit Us' di atas. Kami menyarankan janji temu terlebih dahulu.</p>
                                        </div>
                                    </div>
                                    <div class="acc-item">
                                        <button class="acc-btn" aria-expanded="false">Jam operasional?</button>
                                        <div class="acc-panel" hidden>
                                            <p>Senin–Jumat 08:00–17:00, Sabtu - Minggu libur.</p>
                                        </div>
                                    </div>
                                    <div class="acc-item">
                                        <button class="acc-btn" aria-expanded="false">Metode pengiriman?</button>
                                        <div class="acc-panel" hidden>
                                            <p>Kami bekerja sama dengan layanan kurir lokal dan ekspedisi nasional; hubungi admin untuk opsi lengkap.</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </section>
                </div>

                <div class="col-lg-4">
                    <aside class="contact-quicklinks" data-aos="fade-left" data-aos-delay="420" aria-label="Quick links">
                        <div class="card quick-card">
                            <h5>Quick Resources</h5>
                            <ul class="quick-list">
                                <li><a href="https://www.google.com/maps/search/?api=1&query=Jl.+Industri+Kp.+Sireum+Kilang+No.+15" target="_blank" rel="noopener">Petunjuk Arah</a></li>
                                <li><a href="https://wa.me/+6282189327077" target="_blank" rel="noopener">Hubungi via WhatsApp</a></li>
                                <li><a href="mailto:bogormanufakturindonesia@gmail.com">Kirim Email</a></li>
                                {{-- <li><a href="#" id="downloadBrochure">Unduh Brosur (PDF)</a></li> --}}
                            </ul>
                            {{-- <p class="small muted">Catatan: brosur akan membuka email compose jika file tidak tersedia.</p> --}}
                        </div>
                    </aside>
                </div>
            </div>
            <!-- End Contact Hub -->
        </div>
    </section>
    <!-- Contact Info Section End -->

    <!-- Add AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        /* Contact Hub styles (page-scoped) */
        
    </style>

    <script>
        // AOS init (already present) — keep idempotent
        AOS.init({ duration: 900, once: true });

        // Accordion behaviour
        document.addEventListener('click', function(e){
            if(e.target.matches('.acc-btn')){
                const btn = e.target;
                const panel = btn.nextElementSibling;
                const expanded = btn.getAttribute('aria-expanded') === 'true';
                // close any open sibling panels (optional)
                btn.closest('.accordion').querySelectorAll('.acc-btn').forEach(b=>{
                    if(b!==btn){ b.setAttribute('aria-expanded','false'); b.nextElementSibling.hidden = true; }
                });
                btn.setAttribute('aria-expanded', String(!expanded));
                panel.hidden = expanded;
            }
        });

        // Avatar quick contact — opens appropriate action
        document.addEventListener('click', function(e){
            if(e.target.matches('.avatar')){
                const name = e.target.dataset.name;
                const role = e.target.dataset.role;
                const phone = e.target.dataset.phone;
                // show lightweight info + shortcut to WA
                if(confirm(name + ' — ' + role + '\\nHubungi sekarang?')){
                    window.open('https://wa.me/' + phone.replace(/[^0-9\\+]/g,''), '_blank');
                }
            }
        });

        // Download brochure placeholder: opens mail compose
        document.getElementById('downloadBrochure')?.addEventListener('click', function(e){
            e.preventDefault();
            // fallback: open mail compose with subject
            window.location.href = 'mailto:bogormanufakturindonesia@gmail.com?subject=Request%20Brosur%20Perusahaan';
        });
    </script>
@endsection

@section('clients')
    @include('layout.client')
@endsection

<style>

</style>