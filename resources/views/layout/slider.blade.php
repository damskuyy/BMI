<!-- slider Area Start-->
@use('Illuminate\Support\Facades\Storage')
@php
    $homeSlider = \App\Models\Slider::where('section', 'home')->first();
@endphp

<style>
    /* Fade in animation - only on first render */
    .slider-fade-in {
        animation: sliderFadeIn 0.8s ease-in;
    }
    @keyframes sliderFadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>

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

