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
        /* gallery spacing fixes */
        .gallery-section-title { margin-bottom: 12px; }
        .gallery-item { padding-top: 22px; }
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
                                $imgUrl = asset('be/img/placeholder.png');

                                if (!empty($image->image)) {
                                    try {
                                        // Prefer the public storage disk (storage/app/public)
                                        if (Storage::disk('public')->exists($image->image)) {
                                            $imgUrl = Storage::url($image->image);
                                        }
                                        // If the stored value is a full URL, use it
                                        elseif (filter_var($image->image, FILTER_VALIDATE_URL)) {
                                            $imgUrl = $image->image;
                                        }
                                        // If the path exists under public folder, use asset()
                                        elseif (file_exists(public_path($image->image))) {
                                            $imgUrl = asset($image->image);
                                        }
                                        // Otherwise try the common fe gallery folder
                                        elseif (file_exists(public_path('fe/img/elements/' . $image->image))) {
                                            $imgUrl = asset('fe/img/elements/' . $image->image);
                                        }
                                    } catch (\Exception $e) {
                                        // Keep placeholder on any error
                                    }
                                }
                            @endphp
                            <div class="{{ $col }} {{ $center }} mb-3">
                                <a href="{{ $imgUrl }}" class="img-pop-up d-block">
                                    <img src="{{ $imgUrl }}" alt="{{ $gallery->title }}" class="img-fluid gallery-thumb" style="width:100%; height:250px; object-fit:cover; display:block;" onerror="this.src='{{ asset('be/img/placeholder.png') }}'" />
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

@section('join')
    @include('layout.join')
@endsection
@section('client')
    @include('layout.client')
@endsection