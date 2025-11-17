
@extends('layout-be.master')
@section('title', 'Edit Gallery Image')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Gallery Image</h1>
        <a href="{{ route('gallery_be.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('gallery_be.update', $gallery) }}" method="POST" enctype="multipart/form-data">
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
                  value="{{ old('event_date', $gallery->event_date ? \Carbon\Carbon::parse($gallery->event_date)->format('Y-m-d') : '') }}" required>
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
                    <div class="mb-2">
                        <small class="text-muted">Add new photos (optional). Each new photo can select a display mode.</small>
                    </div>
                    <div id="images-container">
                        <div class="image-row mb-2 d-flex align-items-center gap-2">
                            <input type="file" name="images[]" accept="image/*" class="form-control-file">
                            <select name="display_mode[]" class="form-select w-auto">
                                <option value="col-4">col-4</option>
                                <option value="col-6">col-6</option>
                            </select>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="center_image[]" value="0" id="center-0">
                                <label class="form-check-label" for="center-0">Center</label>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="button" id="add-image-row" class="btn btn-secondary btn-sm">
                            <i class="fas fa-plus"></i> Add another photo
                        </button>
                    </div>
                    @error('images.*')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Existing Photos</label>
                    <div class="row">
                        @foreach($gallery->images as $image)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img src="{{ Storage::url($image->image) }}" class="card-img-top" style="height:150px; object-fit:cover;" />
                                    <div class="card-body p-2">
                                        <div class="mb-2">
                                            <label class="form-label small">Display mode</label>
                                            <select name="existing_display_mode[{{ $image->id }}]" class="form-select form-select-sm">
                                                <option value="col-4" {{ $image->display_mode=='col-4' ? 'selected' : '' }}>col-4</option>
                                                <option value="col-6" {{ $image->display_mode=='col-6' ? 'selected' : '' }}>col-6</option>
                                            </select>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="existing_center_image[]" value="{{ $image->id }}" id="center-exist-{{ $image->id }}" {{ $image->center_image ? 'checked' : '' }}>
                                            <label class="form-check-label small" for="center-exist-{{ $image->id }}">Center</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remove_image_ids[]" value="{{ $image->id }}" id="remove-{{ $image->id }}">
                                            <label class="form-check-label small" for="remove-{{ $image->id }}">Remove</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
    let rowCount = 1;
    
    document.getElementById('add-image-row').addEventListener('click', function() {
        const container = document.getElementById('images-container');
        const row = document.createElement('div');
        row.className = 'image-row mb-2 d-flex align-items-center gap-2';
        row.innerHTML = `
            <input type="file" name="images[]" accept="image/*" class="form-control-file">
            <select name="display_mode[]" class="form-select w-auto">
                <option value="col-4">col-4</option>
                <option value="col-6">col-6</option>
            </select>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="center_image[]" value="${rowCount}" id="center-${rowCount}">
                <label class="form-check-label" for="center-${rowCount}">Center</label>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
        `;
        container.appendChild(row);
        rowCount++;
    });

    document.getElementById('images-container').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-row')) {
            e.target.closest('.image-row').remove();
        }
    });
</script>
@endpush
@endsection