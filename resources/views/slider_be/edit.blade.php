
@extends('layout-be.master')
@section('title', 'Edit Slider')
@section('content')
@use('App\Models\Slider')
@use('Illuminate\Support\Facades\Storage')

<style>
    .form-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        padding: 30px;
    }
    .form-group-row {
        margin-bottom: 24px;
    }
    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: block;
    }
    .form-control {
        border-radius: 6px;
        border: 1px solid #ddd;
        padding: 10px 12px;
        font-size: 14px;
    }
    .form-control:focus {
        border-color: #2196F3;
        box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
    }
    .form-help {
        font-size: 12px;
        color: #999;
        margin-top: 6px;
    }
    .image-preview-box {
        border: 2px dashed #ddd;
        border-radius: 6px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s;
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fafafa;
    }
    .image-preview-box.has-image {
        border: 1px solid #ddd;
        padding: 0;
    }
    .image-preview-box.has-image img {
        max-width: 100%;
        max-height: 300px;
        border-radius: 6px;
    }
    .image-preview-box:hover {
        border-color: #2196F3;
        background: #f0f7ff;
    }
    .upload-icon {
        font-size: 48px;
        color: #999;
        margin-bottom: 10px;
    }
    .form-buttons {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 30px;
    }
    .btn {
        padding: 10px 24px;
        border-radius: 6px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-primary {
        background: #2196F3;
        color: white;
    }
    .btn-primary:hover {
        background: #1976D2;
    }
    .btn-secondary {
        background: #e0e0e0;
        color: #333;
    }
    .btn-secondary:hover {
        background: #d0d0d0;
    }
    .btn-danger {
        background: #f44336;
        color: white;
    }
    .btn-danger:hover {
        background: #da190b;
    }
    .section-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 8px;
    }
    .section-option {
        padding: 12px 16px;
        border: 2px solid #ddd;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s;
        text-align: center;
        background: white;
    }
    .section-option:hover {
        border-color: #2196F3;
        background: #f0f7ff;
    }
    .section-option input[type="radio"] {
        display: none;
    }
    .section-option.checked {
        border-color: #2196F3;
        background: #e3f2fd;
    }
    .section-option.checked .section-label {
        color: #2196F3;
        font-weight: 600;
    }
    .error-message {
        color: #d32f2f;
        font-size: 12px;
        margin-top: 6px;
    }
    .current-image-info {
        background: #f5f5f5;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 12px;
        font-size: 13px;
        color: #666;
    }
    .current-data-preview {
        background: #ffffff;
        border: 1px solid #eee;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 18px;
        display: flex;
        gap: 12px;
        align-items: center;
    }
    .current-data-preview img {
        max-width: 220px;
        max-height: 120px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #e8e8e8;
    }
</style>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Slider</h1>
        <a href="{{ route('slider_be.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-card">
                {{-- page title hidden (we kept h2 for visual hierarchy inside card) --}}
                <h2 class="h4 mb-4" style="margin-bottom:1rem;">Edit Slider</h2>

                {{-- Current data preview: show existing values but prefer old() when validation failed --}}
                @php
                    $previewSection = old('section', $slider->section);
                    $previewTitle = old('title', $slider->title);
                    $previewLink = old('link', $slider->link);
                    $previewImageUrl = $slider->image ? Storage::url($slider->image) : null;
                @endphp

                <div class="current-data-preview">
                    <div style="min-width:220px;">
                        @if($previewImageUrl)
                            <img src="{{ $previewImageUrl }}" alt="Current slider image">
                        @else
                            <div style="width:220px;height:120px;display:flex;align-items:center;justify-content:center;color:#999;background:#fafafa;border-radius:6px;border:1px solid #eee;">No image</div>
                        @endif
                    </div>
                    <div style="flex:1;">
                        <div style="margin-bottom:6px;">
                            <span class="section-badge section-{{ $previewSection }}">{{ Slider::$sections[$previewSection] ?? $previewSection }}</span>
                        </div>
                        <div style="margin-bottom:6px;"><strong>Title:</strong> {{ $previewTitle ?: '-' }}</div>
                        <div><strong>Link:</strong>
                            @if($previewLink)
                                <a href="{{ $previewLink }}" target="_blank" rel="noopener">{{ \Illuminate\Support\Str::limit($previewLink, 60) }}</a>
                            @else
                                -
                            @endif
                        </div>
                    </div>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Validation Error!</strong>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('slider_be.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Section Selection -->
                    <div class="form-group-row">
                        <label class="form-label">Select Slider Section *</label>
                        <div class="section-grid">
                            @foreach(Slider::$sections as $key => $label)
                                <label class="section-option {{ old('section', $slider->section) === $key ? 'checked' : '' }}">
                                    <input type="radio" name="section" value="{{ $key }}" {{ old('section', $slider->section) === $key ? 'checked' : '' }} required>
                                    <div class="section-label">{{ $label }}</div>
                                </label>
                            @endforeach
                        </div>
                        @error('section')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="form-group-row">
                        <label class="form-label">Image *</label>
                        
                        @if($slider->image)
                            <div class="current-image-info">
                                <i class="bi bi-info-circle"></i> Current image will be replaced if you upload a new one
                            </div>
                        @endif

                        <div class="image-preview-box {{ $slider->image ? 'has-image' : '' }}" id="imagePreviewBox">
                            <div id="uploadPrompt" {{ $slider->image ? 'style=display:none;' : '' }}>
                                <div class="upload-icon">📸</div>
                                <p class="text-muted mb-0">Click to upload or drag & drop</p>
                                <small class="text-muted d-block">Landscape format recommended (16:9 or 1920x1080)</small>
                                <small class="text-muted d-block">JPG, PNG, WebP • Max 5MB</small>
                            </div>
                            @if($slider->image)
                                <img id="imagePreview" src="{{ Storage::url($slider->image) }}" />
                            @else
                                <img id="imagePreview" style="display:none;" />
                            @endif
                        </div>
                        <input 
                            type="file" 
                            id="image" 
                            name="image" 
                            class="d-none" 
                            accept="image/jpeg,image/png,image/webp"
                        >
                        <div class="form-help">Leave empty to keep current image</div>
                        @error('image')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Title (Optional) -->
                    <div class="form-group-row">
                        <label for="title" class="form-label">Title (Optional)</label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            class="form-control @error('title') is-invalid @enderror" 
                            placeholder="e.g., Summer Campaign"
                            value="{{ old('title', $slider->title) }}"
                        >
                        @error('title')
                            <div class="invalid-feedback" style="display:block;">{{ $message }}</div>
                        @enderror
                        <div class="form-help">Give this slider a descriptive title for reference</div>
                    </div>

                    <!-- Link (Optional) -->
                    <div class="form-group-row">
                        <label for="link" class="form-label">Link (Optional)</label>
                        <input 
                            type="url" 
                            id="link" 
                            name="link" 
                            class="form-control @error('link') is-invalid @enderror" 
                            placeholder="https://example.com"
                            value="{{ old('link', $slider->link) }}"
                        >
                        @error('link')
                            <div class="invalid-feedback" style="display:block;">{{ $message }}</div>
                        @enderror
                        <div class="form-help">URL to navigate to when slider is clicked</div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-buttons">
                        <a href="{{ route('slider_be.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const imageInput = document.getElementById('image');
    const imagePreviewBox = document.getElementById('imagePreviewBox');
    const imagePreview = document.getElementById('imagePreview');
    const uploadPrompt = document.getElementById('uploadPrompt');

    // Click to upload
    imagePreviewBox.addEventListener('click', () => imageInput.click());

    // Drag and drop
    imagePreviewBox.addEventListener('dragover', (e) => {
        e.preventDefault();
        imagePreviewBox.style.borderColor = '#2196F3';
        imagePreviewBox.style.background = '#e3f2fd';
    });

    imagePreviewBox.addEventListener('dragleave', () => {
        imagePreviewBox.style.borderColor = '#ddd';
        imagePreviewBox.style.background = '#fafafa';
    });

    imagePreviewBox.addEventListener('drop', (e) => {
        e.preventDefault();
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            imageInput.files = files;
            handleImageSelect();
        }
    });

    // Handle image selection
    imageInput.addEventListener('change', handleImageSelect);

    function handleImageSelect() {
        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
                uploadPrompt.style.display = 'none';
                imagePreviewBox.classList.add('has-image');
            };
            reader.readAsDataURL(file);
        }
    }

    // Reset border color
    imagePreviewBox.addEventListener('mouseleave', () => {
        if (!imagePreviewBox.classList.contains('has-image')) {
            imagePreviewBox.style.borderColor = '#ddd';
            imagePreviewBox.style.background = '#fafafa';
        }
    });

    // Handle section selection visual feedback
    document.querySelectorAll('.section-option input[type="radio"]').forEach(input => {
        input.addEventListener('change', function() {
            document.querySelectorAll('.section-option').forEach(opt => opt.classList.remove('checked'));
            this.closest('.section-option').classList.add('checked');
        });
    });
</script>
@endsection