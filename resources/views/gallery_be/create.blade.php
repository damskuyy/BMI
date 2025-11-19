
@extends('layout-be.master')
@section('title', 'Add Gallery Image')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Add New Gallery Image</h1>
        <a href="{{ route('gallery_be.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('gallery_be.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="event_date" class="form-label">Event Date</label>
                    <input type="date" class="form-control @error('event_date') is-invalid @enderror" 
                           id="event_date" name="event_date" value="{{ old('event_date') }}" required>
                    @error('event_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Photos <span class="text-danger">*</span></label>
                    <div id="images-container">
                        <div class="image-row mb-2 d-flex align-items-center gap-2 @error('images.*') border border-danger rounded p-2 @enderror">
                            <input type="file" name="images[]" accept="image/*" class="form-control-file @error('images.*') is-invalid @enderror" required>
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
                    @if ($errors->has('images.*'))
                        <div class="alert alert-danger mt-2 mb-0">
                            @foreach ($errors->get('images.*') as $messages)
                                @foreach ($messages as $message)
                                    <div>{{ $message }}</div>
                                @endforeach
                            @endforeach
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Gallery
                </button>
            </form>
        </div>
    </div>
</div>

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

 