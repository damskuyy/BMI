
@extends('layout-be.master')
@section('title', 'Edit Blog Post')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Blog Post</h1>
        <a href="{{ route('blog.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('blog.update', $blog) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" 
                            id="content" name="content" rows="10" required>{{ old('content', $blog->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" 
                            id="status" name="status" required>
                        <option value="draft" {{ (old('status', $blog->status) == 'draft') ? 'selected' : '' }}>
                            Draft
                        </option>
                        <option value="published" {{ (old('status', $blog->status) == 'published') ? 'selected' : '' }}>
                            Published
                        </option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Featured Image</label>
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
                        <img id="preview" src="{{ Storage::url($blog->image) }}" 
                             alt="{{ $blog->title }}" 
                             class="img-fluid rounded" 
                             style="max-width: 300px;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Post
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
<script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js"></script>
<script>
    // Initialize TinyMCE
    tinymce.init({
        selector: '#content',
        height: 400,
        plugins: 'lists link image code table',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code'
    });

    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(e.target.files[0]);
    });
</script>
@endpush
@endsection