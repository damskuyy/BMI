@use('Illuminate\Support\Facades\Storage')

@php
    $slider = \App\Models\Slider::where('section', $section)->first();
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
<div class="slider-area">
    @if($slider && $slider->image)
        <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center" 
             style="background-image: url('{{ Storage::url($slider->image) }}'); background-size: cover; background-position: center;">
    @else
        <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center" 
             data-background="{{ $defaultBackground }}">
    @endif
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap pt-100">
                        <h2>{{ $title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ $title }}</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
