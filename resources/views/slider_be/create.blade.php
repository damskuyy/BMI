
@extends('layout-be.master')
@section('title', 'Add New Slider')
@section('content')
@use('App\Models\Slider')

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
    .section-option input[type="radio"]:checked + label {
        color: #2196F3;
    }
    .section-option input[type="radio"]:checked ~ .section-label {
        color: #2196F3;
        font-weight: 600;
    }
    .section-option input:checked + label,
    .section-option.checked {
        border-color: #2196F3;
        background: #e3f2fd;
    }
    .error-message {
        color: #d32f2f;
        font-size: 12px;
        margin-top: 6px;
    }
</style>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a href="{{ route('slider_be.index') }}" class="mb-3 d-inline-block text-decoration-none text-muted">
                <i class="bi bi-arrow-left"></i> Back to Sliders
            </a>

            <div class="form-card">
                <h2 class="h4 mb-4">Add New Slider</h2>

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

                <form action="{{ route('slider_be.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Section Selection -->
                    <div class="form-group-row">
                        <label class="form-label">Select Slider Section *</label>
                        <div class="section-grid">
                            @foreach(Slider::$sections as $key => $label)
                                <label class="section-option {{ old('section') === $key ? 'checked' : '' }}">
                                    <input type="radio" name="section" value="{{ $key }}" {{ old('section') === $key ? 'checked' : '' }} required>
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
                        <label for="image" class="form-label">Upload Image *</label>
                        <div class="image-preview-box" id="imagePreviewBox">
                            <div id="uploadPrompt">
                                <div class="upload-icon">📸</div>
                                <p class="text-muted mb-0">Click to upload or drag & drop</p>
                                <small class="text-muted d-block">Landscape format recommended (16:9 or 1920x1080)</small>
                                <small class="text-muted d-block">• JPG, JPEG, PNG, WebP •</small>
                            </div>
                            <img id="imagePreview" style="display:none;" />
                        </div>
                        <input 
                            type="file" 
                            id="image" 
                            name="image" 
                            class="d-none" 
                            accept="image/jpeg,image/png,image/webp" 
                            {{ old('image') ? '' : 'required' }}
                        >
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
                            class="form-control" 
                            placeholder="e.g., Summer Campaign"
                            value="{{ old('title') }}"
                        >
                        <div class="form-help">Give this slider a descriptive title for reference</div>
                    </div>

                    <!-- Link (Optional) -->
                    <div class="form-group-row">
                        <label for="link" class="form-label">Link (Optional)</label>
                        <input 
                            type="url" 
                            id="link" 
                            name="link" 
                            class="form-control" 
                            placeholder="https://example.com"
                            value="{{ old('link') }}"
                        >
                        <div class="form-help">URL to navigate to when slider is clicked</div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-buttons">
                        <a href="{{ route('slider_be.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create Slider</button>
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
 