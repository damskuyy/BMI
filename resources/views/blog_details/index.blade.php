@extends('layout.master')
@section('content')
    @php
        use Illuminate\Support\Facades\Storage;
    @endphp
    
    @php
        $blogDetailsSlider = \App\Models\Slider::where('section', 'blog_details')->first();
    @endphp
    
    <style>
        .page-slider-fade-in {
            animation: pageSliderFadeIn 0.8s ease-in;
        }
        @keyframes pageSliderFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        /* Comment styles */
        .comment-avatar{ width:48px; height:48px; object-fit:cover; border-radius:50%; display:block; }
        .comment-list{ margin-bottom:18px; }
        .comment-desc{ margin-left:12px; }
        .comment-children{ margin-top:12px; }
        .comment-reply { margin-left:auto; margin-right:0; width:70%; }
        .children{ transition: max-height 0.25s ease, opacity 0.2s ease; overflow:hidden; }
        .children.collapsed{ max-height:0; opacity:0; padding:0; margin:0; }
        .children.expanded{ max-height:2000px; opacity:1; }
        .btn-toggle-children{ cursor:pointer; }
        /* Gallery thumbnails: two per row */
        .gallery-thumb { display:inline-block; width:calc(50% - 8px); margin:4px; vertical-align:top; }
        .gallery-thumb img { width:100%; height:70px; object-fit:cover; border-radius:4px; display:block; }
    </style>

    <div class="slider-area">
        @if($blogDetailsSlider && $blogDetailsSlider->image)
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center"
                style="background-image: url('{{ Storage::url($blogDetailsSlider->image) }}'); background-size: cover; background-position: center;">
        @else
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center"
            data-background="{{ asset('fe/img/hero/blog.png') }}">
        @endif
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>Blog Details</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Blog Details</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    @if(empty($blog))
                        <div class="single-post">
                            <div class="feature-img" style="min-height:120px; display:flex; align-items:center; justify-content:center;">
                                <div style="text-align:center;">
                                    <h3 style="margin:0;">Blog tidak tersedia</h3>
                                    <p style="color:#666;">Maaf, artikel blog ini belum tersedia atau telah dihapus.</p>
                                    <a href="{{ route('blog.index') }}" class="button btn_1 boxed-btn">Kembali ke Blog</a>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="single-post">
                        <div class="feature-img">
                            @php
                                $featureImage = ($blog->image && strpos($blog->image, 'fe/img') === 0)
                                    ? asset($blog->image)
                                    : ( $blog->image ? Storage::url($blog->image) : '' );
                            @endphp
                            <img class="img-fluid" src="{{ $featureImage }}" alt="{{ $blog->title ?? '' }}" style="width:100%; max-height:480px; object-fit:cover;">
                        </div>
                        <div class="blog_details">
                            
                            <h2>{{ $blog->title ?? '' }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> {{ $blog->category ?? 'General' }}</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> {{ isset($comments) ? $comments->count() : ($blog->comments()->count() ?? 0) }} Comments</a></li>
                            </ul>
                            {{-- Main content sections: up to 5 description fields (each in its own div) --}}
                            @for ($i = 1; $i <= 5; $i++)
                                @php $field = 'description_' . $i; @endphp
                                @if(!empty($blog->{$field}))
                                    @php
                                        // remove any <img> tags from descriptions so supporting images only show in gallery
                                        $raw = $blog->{$field} ?? '';
                                        $descNoImg = preg_replace('/<img[^>]*>/i', '', $raw);
                                    @endphp
                                    <div class="blog-section blog-section-{{ $i }} mb-3">
                                        {!! $descNoImg !!}
                                    </div>
                                @endif
                            @endfor

                            {{-- Fallback to single content if sections are empty --}}
                            @if(empty($blog->description_1) && empty($blog->description_2) && empty($blog->description_3) && empty($blog->description_4) && empty($blog->description_5))
                                @php
                                    $contentRaw = $blog->content ?? '';
                                    $contentNoImg = preg_replace('/<img[^>]*>/i', '', $contentRaw);
                                @endphp
                                <div class="excert">
                                    {!! $contentNoImg !!}
                                </div>
                            @endif

                            {{-- Optional quote --}}
                            @if(!empty($blog->quote))
                                <div class="quote-wrapper mt-3 mb-3">
                                    <div class="quotes">{{ $blog->quote }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            <img src="{{ (optional($blog->author) && $blog->author->foto) ? Storage::url($blog->author->foto) : asset('fe/img/blog/author.png') }}" alt="">
                            <div class="media-body">
                                <a href="#">
                                    <h4>{{ optional($blog->author)->name ?? $blog->poster_name ?? 'Author' }}</h4>
                                </a>
                                <p>{{ $blog->posted_at ? $blog->posted_at->format('d M Y') : $blog->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="navigation-area">
                            <div class="row">
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            @if($previous)
                                                @php
                                                    $prevImg = ($previous->image && strpos($previous->image, 'fe/img') === 0)
                                                        ? asset($previous->image)
                                                        : Storage::url($previous->image);
                                                @endphp
                                                <a href="{{ route('blog.details.show', $previous->slug) }}">
                                                    <img class="img-fluid" src="{{ $prevImg }}" alt="{{ $previous->title }}" style="width:80px;height:80px;object-fit:cover;border-radius:0;">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="arrow">
                                            @if($previous)
                                                <a href="{{ route('blog.details.show', $previous->slug) }}">
                                                    <span class="lnr text-white ti-arrow-left"></span>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="detials">
                                            <p>Prev Post</p>
                                            @if($previous)
                                                <a href="{{ route('blog.details.show', $previous->slug) }}">
                                                    <h4>{{ $previous->title }}</h4>
                                                </a>
                                            @endif
                                        </div>
                                </div>
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
                                        @if($next)
                                            <a href="{{ route('blog.details.show', $next->slug) }}">
                                                <h4>{{ $next->title }}</h4>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="arrow">
                                        @if($next)
                                            <a href="{{ route('blog.details.show', $next->slug) }}">
                                                <span class="lnr text-white ti-arrow-right"></span>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="thumb">
                                        @if($next)
                                            @php
                                                $nextImg = ($next->image && strpos($next->image, 'fe/img') === 0)
                                                    ? asset($next->image)
                                                    : Storage::url($next->image);
                                            @endphp
                                            <a href="{{ route('blog.details.show', $next->slug) }}">
                                                <img class="img-fluid" src="{{ $nextImg }}" alt="{{ $next->title }}" style="width:80px;height:80px;object-fit:cover;border-radius:0;">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="comments-area">
                        <h4>{{ isset($comments) ? $comments->count() : ($blog->comments()->count() ?? 0) }} Comments</h4>
                        @if(isset($comments) && $comments->count())
                            @foreach($comments as $comment)
                                @include('blog_details._comment', ['comment' => $comment])
                            @endforeach
                        @else
                            <p>No comments yet.</p>
                        @endif
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form class="form-contact comment_form" action="{{ route('blog.comments.store', $blog->slug) }}" method="POST" id="commentForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                            placeholder="Write Comment" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Name" required value="{{ Auth::check() ? Auth::user()->name : old('name') }}">
                                    </div>
                                </div>
                                <input type="hidden" name="parent_id" id="parent_id" value="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                    @endif
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <a href="{{ route('blog.index') }}" class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" style="align-content: center">&larr; Back to Blog</a>
                        </aside>
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
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
                                @foreach($categories ?? collect() as $category)
                                    @php $count = \App\Models\Blog::where('status','published')->where('category', $category)->count(); @endphp
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
                            @foreach($recentPosts ?? collect() as $post)
                                <div class="media post_item">
                                    <img src="{{ ($post->image && strpos($post->image, 'fe/img') === 0) ? asset($post->image) : Storage::url($post->image) }}" alt="post" style="width:80px;height:80px;object-fit:cover;border-radius:4px;margin-right:10px;">
                                    <div class="media-body">
                                        <a href="{{ route('blog.details.show', $post->slug) }}">
                                            <h3>{{ \Illuminate\Support\Str::limit($post->title, 40) }}</h3>
                                        </a>
                                        <p>{{ $post->posted_at ? $post->posted_at->format('M d, Y') : $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @endforeach
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
                                    @forelse($galleryImages ?? collect() as $img)
                                        @php
                                            $gImg = (strpos($img->image ?? '', 'fe/img') === 0) ? asset($img->image) : Storage::url($img->image);
                                        @endphp
                                        <li class="gallery-thumb">
                                            <a href="#" onclick="event.preventDefault(); openPreview('{{ $gImg }}')">
                                                <img src="{{ $gImg }}" alt="{{ $img->caption ?? '' }}" />
                                            </a>
                                        </li>
                                    @empty
                                        <li><p>No images yet.</p></li>
                                    @endforelse
                            </ul>
                        </aside>
                        <!-- Image preview modal for blog details -->
                        <div id="bdImagePreview" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.9); z-index:2000; align-items:center; justify-content:center;">
                            <div style="position:relative; max-width:95%; max-height:95%;">
                                <img id="bdPreviewImg" src="" alt="" style="display:block; max-width:100%; max-height:100%; margin:0 auto; border-radius:4px;" />
                                <button id="bdPreviewClose" aria-label="Close" style="position:absolute; top:8px; right:8px; background:rgba(0,0,0,0.6); color:#fff; border:0; padding:8px 10px; border-radius:4px; cursor:pointer;">✕</button>
                            </div>
                        </div>
                        <script>
                            function openPreview(src){
                                var m = document.getElementById('bdImagePreview');
                                var i = document.getElementById('bdPreviewImg');
                                i.src = src; m.style.display = 'flex'; document.body.style.overflow='hidden';
                            }
                            function closePreview(){ document.getElementById('bdImagePreview').style.display='none'; document.getElementById('bdPreviewImg').src=''; document.body.style.overflow=''; }
                            document.getElementById('bdPreviewClose').addEventListener('click', function(e){ e.stopPropagation(); closePreview(); });
                            document.addEventListener('click', function(e){ var m = document.getElementById('bdImagePreview'); if(m && m.style.display==='flex' && e.target===m) closePreview(); });
                            document.addEventListener('keydown', function(e){ if(e.key==='Escape') closePreview(); });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            // Toggle reply form visibility
            document.querySelectorAll('.comments-area').forEach(function(container){
                container.addEventListener('click', function(e){
                    if (e.target.matches('.btn-reply')) {
                        e.preventDefault();
                        var commentList = e.target.closest('.comment-list');
                        if (!commentList) return;
                        var wrapper = commentList.querySelector('.reply-form-wrapper');
                        if (wrapper) wrapper.style.display = (wrapper.style.display === 'none' || wrapper.style.display === '') ? 'block' : 'none';
                    }
                });
            });

            // Helper to submit a form via fetch and insert returned HTML
            async function postFormAndInsert(form){
                var btn = form.querySelector('button[type="submit"]'); if (btn) btn.disabled = true;
                var action = form.action;
                var data = new FormData(form);
                try {
                    var res = await fetch(action, { method: 'POST', body: data, headers: {'X-Requested-With':'XMLHttpRequest'}, credentials: 'same-origin' });
                    if (res.status === 422){
                        var json = await res.json();
                        alert('Validation failed');
                        return;
                    }
                    if (!res.ok) throw new Error('Network error');
                    var json = await res.json();
                    if (json.html) {
                        if (json.parent_id) {
                            var parent = document.querySelector('[data-comment-id="'+json.parent_id+'"]');
                            if (parent) {
                                var children = parent.querySelector(':scope > .children');
                                if (!children) {
                                    children = document.createElement('div');
                                    children.className = 'children expanded';
                                    parent.appendChild(children);
                                }
                                // ensure children visible
                                children.style.display = 'block';
                                children.classList.remove('collapsed');
                                children.classList.add('expanded');
                                children.insertAdjacentHTML('beforeend', json.html);

                                // update parent toggle count if present
                                var toggle = parent.querySelector('.btn-toggle-children');
                                if (toggle) {
                                    var count = parseInt(toggle.getAttribute('data-count') || '0', 10) + 1;
                                    toggle.setAttribute('data-count', String(count));
                                    toggle.textContent = 'MINIMIZE (' + count + ')';
                                }
                            }
                        } else {
                            var commentsArea = document.querySelector('.comments-area');
                            if (commentsArea) commentsArea.insertAdjacentHTML('beforeend', json.html);
                        }
                        form.reset();
                        var mainParent = document.getElementById('parent_id'); if (mainParent) mainParent.value = '';
                    }
                } catch(err){ console.error(err); alert('Error posting comment'); }
                finally{ if (btn) btn.disabled = false; }
            }

            // Main top-level comment form
            var mainForm = document.getElementById('commentForm');
            if (mainForm) {
                mainForm.addEventListener('submit', function(e){ e.preventDefault(); postFormAndInsert(mainForm); });
            }

            // Delegate reply form submissions (reply forms are added in DOM)
            document.addEventListener('submit', function(e){
                var f = e.target;
                if (f && f.classList && f.classList.contains('reply-form')){
                    e.preventDefault();
                    postFormAndInsert(f);
                    // hide the wrapper after post (optional)
                    var wrapper = f.closest('.reply-form-wrapper'); if (wrapper) wrapper.style.display = 'none';
                }
            });

            // Delete comment (only for authenticated owners) - delegated click handler
            document.addEventListener('click', async function(e){
                if (!e.target.matches('.btn-delete')) return;
                e.preventDefault();
                if (!confirm('Are you sure you want to delete this comment?')) return;
                var id = e.target.getAttribute('data-id');
                if (!id) return;
                try {
                    var csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    var res = await fetch('/blog/comments/' + id, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': csrf, 'X-Requested-With':'XMLHttpRequest' }, credentials: 'same-origin' });
                    if (res.status === 200) {
                        var node = document.querySelector('[data-comment-id="'+id+'"]');
                        if (node) node.remove();
                    } else if (res.status === 403) {
                        alert('You are not authorized to delete this comment.');
                    } else {
                        alert('Failed to delete comment');
                    }
                } catch(err){ console.error(err); alert('Error deleting comment'); }
            });

            // Toggle children visibility (minimize/expand replies)
            document.addEventListener('click', function(e){
                if (!e.target.matches('.btn-toggle-children')) return;
                e.preventDefault();
                var id = e.target.getAttribute('data-id');
                var parent = document.querySelector('[data-comment-id="'+id+'"]');
                if (!parent) return;
                var children = parent.querySelectorAll(':scope > .children, :scope .children');
                if (!children || children.length === 0) return;
                // toggle each children block using classes
                children.forEach(function(c){
                    if (c.classList.contains('collapsed')) {
                        c.classList.remove('collapsed');
                        c.classList.add('expanded');
                        // show
                        c.style.display = 'block';
                        var count = e.target.getAttribute('data-count') || '';
                        e.target.textContent = 'MINIMIZE' + (count ? ' ('+count+')' : '');
                    } else {
                        c.classList.remove('expanded');
                        c.classList.add('collapsed');
                        c.style.display = 'none';
                        var count = e.target.getAttribute('data-count') || '';
                        e.target.textContent = 'EXPAND' + (count ? ' ('+count+')' : '');
                    }
                });
            });
        });
    </script>
    <!--================ Blog Area end =================-->
@endsection