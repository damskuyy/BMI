@extends('layout.master')
@section('content')
    @use('Illuminate\Support\Facades\Storage')
    
    @php
        $gallerySlider = \App\Models\Slider::where('section', 'gallery')->first();
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
    @if($gallerySlider && $gallerySlider->image)
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center mb-200" 
                 style="background-image: url('{{ Storage::url($gallerySlider->image) }}'); background-size: cover; background-position: center;">
    @else
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center mb-200" style="background-image: url('{{ asset('fe/img/hero/gallery.png') }}'); background-size: cover; background-position: center;">
    @endif
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap pt-100">
                                <h2>Our Gallery</h2>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Gallery</a></li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- slider Area End-->
    <div class="whole-wrap">
        <div class="container box_1170 mb-100">
            <div class="section-top-border">
                <div class="section-tittle section-tittle3">
                    <div class="front-text">
                        <h2 class="">Our Gallery</h2>
                    </div>
                    <span class="back-text">Portfolio</span>
                </div>

                @php
                    $galleries = \App\Models\Gallery::with('images')->oldest()->get();
                @endphp

                @forelse($galleries as $gallery)
                    <div class="row" style="margin-top: 50px">
                        <div class="col-12">
                            <h3 class="gallery-section-title text-center mt-4">{{ $gallery->title }}</h3>
                        </div>
                    </div>
                    <div class="row gallery-item">
                        @foreach($gallery->images as $image)
                            @php 
                                $col = $image->display_mode === 'col-6' ? 'col-md-6' : 'col-md-4';
                                $center = $image->center_image ? 'mx-auto' : '';
                            @endphp
                            <div class="{{ $col }} {{ $center }}">
                                <a href="{{ asset('storage/' . $image->image) }}" class="img-pop-up">
                                    <div class="single-gallery-image" style="background: url('{{ asset('storage/' . $image->image) }}');"></div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @empty
                    <div class="row mt-4">
                        <div class="col-12">
                            <p class="text-center">No gallery items yet.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@section('client')
    @include('layout.client')
@endsection