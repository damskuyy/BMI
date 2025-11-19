@extends('layout.master')
@section('content')
    @use('Illuminate\Support\Facades\Storage')
    @use('Illuminate\Support\Str')
    
    @php
        $blogSlider = \App\Models\Slider::where('section', 'blog')->first();
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

    <div class="slider-area">
        @if($blogSlider && $blogSlider->image)
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center"
                style="background-image: url('{{ Storage::url($blogSlider->image) }}'); background-size: cover; background-position: center;">
        @else
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center"
                data-background="{{ asset('fe/img/hero/blog.png') }}">
        @endif
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2> Blog</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#"> Blog</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($blogs as $blog)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                            @php
                                                $listImg = ($blog->image && strpos($blog->image, 'fe/img') === 0) ? asset($blog->image) : ( $blog->image ? Storage::url($blog->image) : '' );
                                            @endphp
                                            <img class="card-img rounded-0" src="{{ $listImg }}" alt="{{ $blog->title }}" style="height: 350px; object-fit: cover;">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{ $blog->posted_at ? $blog->posted_at->format('d') : $blog->created_at->format('d') }}</h3>
                                        <p>{{ $blog->posted_at ? $blog->posted_at->format('M') : $blog->created_at->format('M') }}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{ route('blog.details.show', $blog->slug) }}">
                                        <h2>{{ $blog->title }}</h2>
                                    </a>
                                    <p>{{ Str::limit(strip_tags($blog->content), 180) }}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> {{ $blog->category ?? 'General' }}</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> {{ $blog->comments()->count() }} Comments</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach

                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $blogs->links() }}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form method="GET" action="{{ route('blog.index') }}">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" name="q" value="{{ request('q', '') }}" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                @php
                                    $categories = \App\Models\Blog::where('status', 'published')
                                        ->whereNotNull('category')
                                        ->distinct()
                                        ->pluck('category');
                                @endphp
                                @foreach($categories as $category)
                                    @php
                                        $count = \App\Models\Blog::where('status', 'published')
                                            ->where('category', $category)
                                            ->count();
                                    @endphp
                                    <li>
                                        <a href="{{ route('blog.index', ['q' => $category]) }}" class="d-flex">
                                            <p>{{ $category }}</p>
                                            <p>({{ $count }})</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @php
                                $recentPosts = \App\Models\Blog::where('status', 'published')
                                    ->latest()
                                    ->take(4)
                                    ->get();
                            @endphp
                            @forelse($recentPosts as $post)
                                <div class="media post_item">
                                    @php
                                        $recentImg = ($post->image && strpos($post->image, 'fe/img') === 0) ? asset($post->image) : ( $post->image ? Storage::url($post->image) : '' );
                                    @endphp
                                    <img src="{{ $recentImg }}" alt="{{ $post->title }}" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div class="media-body">
                                        <a href="{{ route('blog.details.show', $post->slug) }}">
                                            <h3>{{ Str::limit($post->title, 30) }}</h3>
                                        </a>
                                        <p>{{ $post->posted_at ? $post->posted_at->diffForHumans() : $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @empty
                                <p>No recent posts yet.</p>
                            @endforelse
                        </aside>
                        
                        {{-- <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">project</a>
                                </li>
                                <li>
                                    <a href="#">love</a>
                                </li>
                                <li>
                                    <a href="#">technology</a>
                                </li>
                                <li>
                                    <a href="#">travel</a>
                                </li>
                                <li>
                                    <a href="#">restaurant</a>
                                </li>
                                <li>
                                    <a href="#">life style</a>
                                </li>
                                <li>
                                    <a href="#">design</a>
                                </li>
                                <li>
                                    <a href="#">illustration</a>
                                </li>
                            </ul>
                        </aside> --}}

                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">Photo Gallery</h4>
                            <ul class="instagram_row flex-wrap">
                                @php
                                    $galleryImages = \App\Models\Blog::where('status', 'published')
                                        ->latest()
                                        ->take(6)
                                        ->get();
                                @endphp
                                @forelse($galleryImages as $image)
                                    @php
                                        $raw = $image->image ?? '';
                                        $rawTrim = ltrim($raw, '/');
                                        $imgSrc = ($rawTrim && strpos($rawTrim, 'fe/img') === 0)
                                            ? asset($rawTrim)
                                            : ($raw ? Storage::url($raw) : '');
                                    @endphp
                                    <li>
                                        <img class="img-fluid" src="{{ $imgSrc }}" alt="{{ $image->title }}"
                                            style="width: 100%; height: 100px; object-fit: cover; cursor: pointer;"
                                            onclick="(function(e){ e.stopImmediatePropagation(); e.preventDefault(); openImagePreview('{{ addslashes($imgSrc) }}', '{{ addslashes($image->title) }}'); })(event)">
                                    </li>
                                @empty
                                    <li><p>No blog images yet.</p></li>
                                @endforelse
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image preview modal -->
    <div id="imagePreviewModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.9); z-index:1050; align-items:center; justify-content:center;">
        <div style="position:relative; max-width:95%; max-height:95%;">
            <img id="imagePreviewImg" src="" alt="" style="display:block; max-width:100%; max-height:100%; margin:0 auto; border-radius:4px;" />
            <button id="imagePreviewClose" aria-label="Close" style="position:absolute; top:8px; right:8px; background:rgba(0,0,0,0.6); color:#fff; border:0; padding:8px 10px; border-radius:4px; cursor:pointer;">✕</button>
        </div>
    </div>

    <script>
        function openImagePreview(src, title){
            const modal = document.getElementById('imagePreviewModal');
            const img = document.getElementById('imagePreviewImg');
            img.src = src;
            img.alt = title || '';
            modal.style.display = 'flex';
            // disable body scroll
            document.body.style.overflow = 'hidden';
        }

        function closeImagePreview(){
            const modal = document.getElementById('imagePreviewModal');
            const img = document.getElementById('imagePreviewImg');
            modal.style.display = 'none';
            img.src = '';
            document.body.style.overflow = '';
        }

        document.addEventListener('click', function(e){
            const modal = document.getElementById('imagePreviewModal');
            if(!modal) return;
            // click outside image closes
            if(modal.style.display === 'flex' && e.target === modal){
                closeImagePreview();
            }
        });

        document.getElementById('imagePreviewClose').addEventListener('click', function(e){
            e.stopPropagation();
            closeImagePreview();
        });

        document.addEventListener('keydown', function(e){
            if(e.key === 'Escape') closeImagePreview();
        });
    </script>
@endsection