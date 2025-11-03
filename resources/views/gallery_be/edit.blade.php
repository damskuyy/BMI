
@extends('layout-be.master')
@section('title', 'Edit Gallery Image')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Gallery Image</h1>
        <a href="{{ route('gallery.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="event_date" class="form-label">Event Date</label>
                    <input type="date" class="form-control @error('event_date') is-invalid @enderror" 
                           id="event_date" name="event_date" 
                           value="{{ old('event_date', $gallery->event_date->format('Y-m-d')) }}" required>
                    @error('event_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" 
                              rows="3">{{ old('description', $gallery->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                           id="image" name="image" accept="image/*">
                    <small class="form-text text-muted">Leave empty to keep current image</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image</label>
                    <div class="current-image-container">
                        <img id="preview" src="{{ Storage::url($gallery->image) }}" 
                             alt="{{ $gallery->title }}" 
                             class="img-fluid rounded" 
                             style="max-width: 300px; max-height: 300px;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Image
                </button>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    .current-image-container {
        padding: 10px;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        display: inline-block;
    }
</style>
@endpush

@push('scripts')
<script>
    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(e.target.files[0]);
    });
</script>
@endpush
@endsection