@extends('layout-be.master')
@section('title', 'Gallery')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Gallery</h1>
        <a href="{{ route('gallery_be.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Image
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @forelse($galleries as $gallery)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <img src="{{ Storage::url($gallery->image) }}" 
                         class="card-img-top" 
                         alt="{{ $gallery->title }}"
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $gallery->title }}</h5>
                        <p class="card-text small text-muted">
                            Event Date: {{ \Carbon\Carbon::parse($gallery->event_date)->format('d M Y') }}
                        </p>
                        @if($gallery->description)
                            <p class="card-text">{{ Str::limit($gallery->description, 100) }}</p>
                        @endif
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('gallery_be.edit', $gallery) }}" class="btn btn-sm btn-info me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('gallery_be.destroy', $gallery) }}" 
                              method="POST" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No images in gallery yet.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $galleries->links() }}
    </div>
</div>

@push('styles')
<style>
    .card-img-top {
        transition: transform .3s ease;
    }
    .card:hover .card-img-top {
        transform: scale(1.05);
    }
</style>
@endpush
@endsection