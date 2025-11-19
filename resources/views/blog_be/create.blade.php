
@extends('layout-be.master')
@section('title', 'Create Blog Post')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Create New Blog Post</h1>
        <a href="{{ route('blog_be.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('blog_be.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" 
                            id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Description sections (1..5) --}}
                @for($i = 1; $i <= 5; $i++)
                <div class="mb-3">
                    <label for="description_{{ $i }}" class="form-label">Description {{ $i }} (optional)</label>
                    <textarea class="form-control" id="description_{{ $i }}" name="description_{{ $i }}" rows="4">{{ old('description_'.$i) }}</textarea>
                </div>
                @endfor

                <div class="mb-3">
                    <label for="supporting_images" class="form-label">Supporting Images (gallery)</label>
                    <input type="file" class="form-control @error('supporting_images') is-invalid @enderror" id="supporting_images" name="supporting_images[]" accept="image/*" multiple>
                    <small class="form-text text-muted">You can upload multiple supporting/gallery images for this post.</small>
                    @error('supporting_images')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" 
                            id="status" name="status" required>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror"
                           id="category" name="category" value="{{ old('category') }}">
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="quote" class="form-label">Quote of the Day (optional)</label>
                    <input type="text" class="form-control @error('quote') is-invalid @enderror"
                           id="quote" name="quote" value="{{ old('quote') }}">
                    @error('quote')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="poster_name" class="form-label">Poster Name (optional)</label>
                    <input type="text" class="form-control @error('poster_name') is-invalid @enderror"
                           id="poster_name" name="poster_name" value="{{ old('poster_name') }}">
                    @error('poster_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="posted_at" class="form-label">Posting Date</label>
                    <input type="datetime-local" class="form-control @error('posted_at') is-invalid @enderror"
                           id="posted_at" name="posted_at" value="{{ old('posted_at') }}">
                    @error('posted_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Featured Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                           id="image" name="image" accept="image/*" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <img id="preview" src="#" alt="Preview" 
                         class="img-fluid rounded" 
                         style="max-width: 300px; display: none;">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Create Post
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const preview = document.getElementById('preview');
        preview.style.display = 'block';
        preview.src = URL.createObjectURL(e.target.files[0]);
    });
</script>
@endpush
@endsection