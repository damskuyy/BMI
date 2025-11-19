
@extends('layout-be.master')
@section('title', 'Edit Blog Post')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Blog Post</h1>
        <a href="{{ route('blog_be.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('blog_be.update', $blog) }}" method="POST" enctype="multipart/form-data">
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

                {{-- Description sections (1..5) --}}
                @for($i = 1; $i <= 5; $i++)
                <div class="mb-3">
                    <label for="description_{{ $i }}" class="form-label">Description {{ $i }} (optional)</label>
                    <textarea class="form-control" id="description_{{ $i }}" name="description_{{ $i }}" rows="4">{{ old('description_'.$i, $blog->{'description_'.$i} ?? '') }}</textarea>
                </div>
                @endfor

                <div class="mb-3">
                    <label for="supporting_images" class="form-label">Add Supporting Images (gallery)</label>
                    <input type="file" class="form-control @error('supporting_images') is-invalid @enderror" id="supporting_images" name="supporting_images[]" accept="image/*" multiple>
                    <small class="form-text text-muted">Upload additional gallery images. Existing images are shown below.</small>
                    @error('supporting_images')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @if($blog->images && $blog->images->count())
                <div class="mb-3">
                    <label class="form-label">Existing Supporting Images</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($blog->images as $img)
                            @php
                                $g = $img->image ?? '';
                                $gTrim = ltrim($g, '/');
                                if (preg_match('/^https?:\/\//', $gTrim)) {
                                    $gSrc = $gTrim;
                                } elseif ($gTrim === '') {
                                    $gSrc = asset('fe/img/blog/author.png');
                                } elseif (strpos($gTrim, 'fe/img') === 0) {
                                    $gSrc = asset($gTrim);
                                } else {
                                    $gSrc = Storage::url($gTrim);
                                }
                            @endphp
                            <div style="width:120px;">
                                <img src="{{ $gSrc }}" alt="" class="img-fluid rounded" style="width:100%;height:80px;object-fit:cover;">
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

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
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror"
                           id="category" name="category" value="{{ old('category', $blog->category) }}">
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="quote" class="form-label">Quote of the Day (optional)</label>
                    <input type="text" class="form-control @error('quote') is-invalid @enderror"
                           id="quote" name="quote" value="{{ old('quote', $blog->quote) }}">
                    @error('quote')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="poster_name" class="form-label">Poster Name (optional)</label>
                    <input type="text" class="form-control @error('poster_name') is-invalid @enderror"
                           id="poster_name" name="poster_name" value="{{ old('poster_name', $blog->poster_name) }}">
                    @error('poster_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="posted_at" class="form-label">Posting Date</label>
                    <input type="datetime-local" class="form-control @error('posted_at') is-invalid @enderror"
                           id="posted_at" name="posted_at" value="{{ old('posted_at', optional($blog->posted_at)->format('Y-m-d\TH:i')) }}">
                    @error('posted_at')
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
                        @php
                            $cur = $blog->image ?? '';
                            $curTrim = ltrim($cur, '/');
                            if (preg_match('/^https?:\/\//', $curTrim)) {
                                $curSrc = $curTrim;
                            } elseif ($curTrim === '') {
                                $curSrc = asset('fe/img/blog/author.png');
                            } elseif (strpos($curTrim, 'fe/img') === 0) {
                                $curSrc = asset($curTrim);
                            } else {
                                $curSrc = Storage::url($curTrim);
                            }
                        @endphp
                        <img id="preview" src="{{ $curSrc }}" 
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
<script>
    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(e.target.files[0]);
    });
</script>
@endpush
@endsection