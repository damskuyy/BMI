<!-- slider Area Start-->
@use('Illuminate\Support\Facades\Storage')
@php
    $homeSlider = \App\Models\Slider::where('section', 'home')->first();
@endphp

<style>
    /* Fade in animation - improved: ensure initial opacity 0 and persist final state */
    .slider-fade-in {
        opacity: 0;
        transform: scale(1.06);
        -webkit-transform: scale(1.06);
        animation-name: sliderFadeZoom;
        animation-duration: 900ms;
        animation-timing-function: cubic-bezier(.22,.8,.27,1);
        animation-fill-mode: both; /* keep final state */
        -webkit-animation-name: sliderFadeZoom;
        -webkit-animation-duration: 900ms;
        -webkit-animation-timing-function: cubic-bezier(.22,.8,.27,1);
        -webkit-animation-fill-mode: both;
    }
    @keyframes sliderFadeZoom {
        from { opacity: 0; transform: scale(1.06); }
        to   { opacity: 1; transform: scale(1); }
    }
    @-webkit-keyframes sliderFadeZoom {
        from { opacity: 0; -webkit-transform: scale(1.06); }
        to   { opacity: 1; -webkit-transform: scale(1); }
    }
</style>

<!-- Ensure animation runs after carousel initialization. Uses jQuery if available, falls back to plain JS. -->
<script>
    (function(){
        function triggerFade(sliderSelector){
            var slides = document.querySelectorAll(sliderSelector + ' .single-slider');
            if(!slides.length) return;
            // remove then re-add to force animation replay
            slides.forEach(function(s){ s.classList.remove('slider-fade-in'); });
            // small timeout to allow reflow
            setTimeout(function(){
                slides.forEach(function(s){ s.classList.add('slider-fade-in'); });
            }, 50);
        }

        // If jQuery is present, prefer hooking into Slick or Owl carousel events so animation runs after slider init
        if(window.jQuery){
            jQuery(function($){
                // Slick carousel (used by theme main.js)
                if(typeof $.fn.slick === 'function'){
                    $('.slider-active').on('init reInit afterChange', function(){ triggerFade('.slider-active'); });
                    $('.slider-active-mobile').on('init reInit afterChange', function(){ triggerFade('.slider-active-mobile'); });
                    // trigger once in case init already fired
                    triggerFade('.slider-active');
                    triggerFade('.slider-active-mobile');
                    return;
                }

                // Owl carousel fallback
                if(typeof $.fn.owlCarousel === 'function'){
                    $('.slider-active').on('initialized.owl.carousel changed.owl.carousel refreshed.owl.carousel', function(){ triggerFade('.slider-active'); });
                    $('.slider-active-mobile').on('initialized.owl.carousel changed.owl.carousel refreshed.owl.carousel', function(){ triggerFade('.slider-active-mobile'); });
                    triggerFade('.slider-active');
                    triggerFade('.slider-active-mobile');
                    return;
                }

                // If neither slider lib is available, just run on DOM ready
                triggerFade('.slider-active');
                triggerFade('.slider-active-mobile');
            });
        } else {
            // fallback: trigger on DOMContentLoaded
            document.addEventListener('DOMContentLoaded', function(){
                triggerFade('.slider-active');
                triggerFade('.slider-active-mobile');
            });
        }
    })();
</script>

<div class="slider-area home-slider">
    <div class="slider-active owl-carousel">
        @if($homeSlider && $homeSlider->image)
            <div class="single-slider hero-overly slider-height slider-fade-in d-flex align-items-center" style="background-image: url('{{ Storage::url($homeSlider->image) }}'); background-size: cover; background-position: center;">
        @else
            <div class="single-slider hero-overly slider-height slider-fade-in d-flex align-items-center" style="background-image: url('{{ asset('fe/img/hero/kab-bogor-scaled.png') }}'); background-size: cover; background-position: center;">
        @endif
            <div class="container" style="margin-top: -370px !important;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero__caption" style="text-align: left !important; margin-left: 0 !important; padding-left: 0 !important;">
                            <div class="hero-text1" style="text-align: left !important;">
                                <span data-animation="fadeInUp" data-delay=".3s" style="text-align: left !important; display: block !important;">Welcome to </span>
                            </div>
                            <div class="stock-text" data-animation="fadeInUp" data-delay=".8s" style="text-align: left !important; position: relative !important; left: 0 !important; top: 0 !important;" >
                                <h2 style="text-align: left !important;">Bogor</h2>
                                <h2 style="text-align: left !important;">Bogor</h2>
                            </div>
                            <h1 data-animation="fadeInUp" data-delay=".5s" style="margin-top: 100px;margin-bottom: 25px; text-align: left !important;">Manufaktur</h1>
                            <div class="stock-text" data-animation="fadeInUp" data-delay=".8s" style="text-align: left !important; position: relative !important; left: 0 !important; top: 0 !important; margin-top: -20px;">
                                <h2 style="text-align: left !important;">Indonesia</h2>
                                <h2 style="text-align: left !important;">Indonesia</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="slider-area slider-mobile">
    <div class="slider-active-mobile">
        @if($homeSlider && $homeSlider->image)
            <div class="single-slider hero-overly slider-height-mobile slider-fade-in d-flex align-items-center" style="background-image: url('{{ Storage::url($homeSlider->image) }}'); background-size: cover; background-position: center;">
        @else
            <div class="single-slider hero-overly slider-height-mobile slider-fade-in d-flex align-items-center" style="background-image: url('{{ asset('fe/img/hero/bg1.png') }}'); background-size: cover; background-position: center;">
        @endif
            <div class="container" style="margin-top: -30px !important;margin-left: 20px;">
                <div class="row">
                    <div class="col-12">
                        <div class="hero__caption hero-mobile-caption">
                            <div class="hero-text1">
                                <span data-animation="fadeInUp" data-delay=".2s">Welcome to</span>
                            </div>
                            <h1 data-animation="fadeInUp" class="stock-text" data-delay=".4s">Bogor</h1>
                            <h1 data-animation="fadeInUp" class="stock-text" data-delay=".4s">Manufaktur</h1>
                            <h1 data-animation="fadeInUp" class="stock-text" data-delay=".4s">Indonesia</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

