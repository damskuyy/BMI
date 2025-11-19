@extends('layout-be.master')
@section('title', 'Blog Posts')
@section('content')
    @php use Illuminate\Support\Facades\Storage; @endphp
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Blog Posts</h1>
            <a href="{{ route('blog_be.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create Post
            </a>
        </div>

        {{-- @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif --}}

        <div class="card">
            <div class="card-body">
                <form method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="q" value="{{ request('q', $q ?? '') }}" class="form-control"
                            placeholder="Search title, content, category">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center">Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Poster</th>
                                <th>Posted</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($blogs as $blog)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @php
                                                $img = $blog->image ?? '';
                                                $imgTrim = ltrim($img, '/');
                                                if (preg_match('/^https?:\/\//', $imgTrim)) {
                                                    $imgSrc = $imgTrim;
                                                } elseif ($imgTrim === '') {
                                                    $imgSrc = asset('fe/img/blog/author.png');
                                                } elseif (strpos($imgTrim, 'fe/img') === 0) {
                                                    $imgSrc = asset($imgTrim);
                                                } else {
                                                    $imgSrc = Storage::url($imgTrim);
                                                }
                                            @endphp
                                            <img src="{{ $imgSrc }}" alt="{{ $blog->title }}"
                                                class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                            {{ $blog->title }}
                                        </div>
                                    </td>
                                    <td>{{ $blog->category ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $blog->status === 'published' ? 'success' : 'warning' }}">
                                            {{ ucfirst($blog->status) }}
                                        </span>
                                    </td>
                                    <td>{{ optional($blog->author)->name ?? $blog->poster_name ?? '-' }}</td>
                                    <td>{{ optional($blog->posted_at ?? $blog->created_at)->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('blog_be.edit', $blog) }}" class="btn btn-sm btn-info me-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('blog_be.destroy', $blog) }}" method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger" onclick="hapus(event, this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No blog posts found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>

    @php
        $debugLogRoute = \Illuminate\Support\Facades\Route::has('debug.log.js') ? route('debug.log.js') : null;
    @endphp

    <script>
    const debugLogRoute = {!! json_encode($debugLogRoute ?? '') !!};
    // Prevent multiple form submissions
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            this.querySelectorAll('button[type="submit"]').forEach(btn => {
                btn.disabled = true;
            });
        });
    });

    function hapus(event, el){
        event.preventDefault()
        // send debug click to server
        try {
            if (debugLogRoute) {
                const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch(debugLogRoute, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                    body: JSON.stringify({ event: 'click', action: el.closest('form').action })
                }).catch(()=>{})
            }
        } catch(e) {}

        swal({
            title: "Are you sure?",
            text: "You will delete this blog post permanently!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
            },
            function(){
                // send debug submit event then submit
                try {
                    if (debugLogRoute) {
                        const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        fetch(debugLogRoute, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                            body: JSON.stringify({ event: 'submit', action: el.closest('form').action })
                        }).catch(()=>{});
                    }
                } catch(e) {}

                el.closest('form').submit()
            });
    }

    function tampil_pesan(){
        const pesan = "{{session('success')}}"

        if(pesan && pesan.trim() !== ''){
            swal('Good Job', pesan, 'success')
        }
    }

    window.addEventListener('load', function(){
        tampil_pesan()
    })
    </script>
@endsection