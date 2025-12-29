@extends('layout-be.master')
@section('title', 'Add Product')
@section('content')
@use('Illuminate\Support\Facades\Storage')

<style>
    .form-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        padding: 30px;
    }
    .form-section {
        margin-bottom: 30px;
    }
    .form-section-title {
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f0f0f0;
    }
    .image-preview-box {
        border: 2px dashed #ddd;
        border-radius: 6px;
        padding: 16px;
        text-align: center;
        transition: all 0.3s;
        min-height: 180px;
        max-width: 420px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fafafa;
        aspect-ratio: 1;
    }
    .image-preview-box.has-image {
        border: 1px solid #ddd;
        padding: 0;
    }
    .image-preview-box.has-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 6px;
    }
    .image-preview-box:hover {
        border-color: #2196F3;
        background: #f0f7ff;
    }
    .upload-icon {
        font-size: 48px;
        margin-bottom: 10px;
    }
    .section-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 8px;
    }
    .option-btn {
        padding: 12px 16px;
        border: 2px solid #ddd;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s;
        text-align: center;
        background: white;
    }
    .option-btn:hover {
        border-color: #2196F3;
        background: #f0f7ff;
    }
    .option-btn input[type="radio"] {
        display: none;
    }
    .option-btn.checked {
        border-color: #2196F3;
        background: #e3f2fd;
        font-weight: 600;
        color: #2196F3;
    }
    .conditional-field {
        display: none;
        margin-top: 15px;
        padding: 15px;
        background: #f9f9f9;
        border-radius: 6px;
    }
    .conditional-field.show {
        display: block;
    }
    .phone-button-group {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
    .phone-btn {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background: white;
        cursor: pointer;
        transition: all 0.2s;
    }
    .phone-btn.active {
        background: #2196F3;
        color: white;
        border-color: #2196F3;
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
    .error-message {
        color: #d32f2f;
        font-size: 12px;
        margin-top: 6px;
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
        width: 100%;
    }
    .form-control:focus {
        border-color: #2196F3;
        outline: none;
        box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
    }
    .form-help {
        font-size: 12px;
        color: #999;
        margin-top: 6px;
    }
</style>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Add New Product</h1>
        <a href="{{ route('product_be.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-card">
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

                <form action="{{ route('product_be.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Product Image Section -->
                    <div class="form-section">
                        <div class="form-section-title">Product Image</div>
                        <label for="image" class="form-label">Image (1:1 Aspect Ratio) *</label>
                        <div class="image-preview-box" id="imagePreviewBox">
                            <div id="uploadPrompt">
                                <div class="upload-icon">📸</div>
                                <p class="text-muted mb-0">Click to upload or drag & drop</p>
                                <small class="text-muted d-block">1:1 square format (500x500 minimum)</small>
                                <small class="text-muted d-block">• JPG, PNG, WebP •</small>
                            </div>
                            <img id="imagePreview" style="display:none;" />
                        </div>
                        <input 
                            type="file" 
                            id="image" 
                            name="image" 
                            class="d-none" 
                            accept="image/jpeg,image/png,image/webp"
                            required
                        >
                        @error('image')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Basic Info Section -->
                    <div class="form-section">
                        <div class="form-section-title">Product Information</div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name *</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}" 
                                placeholder="Enter product name"
                                required
                            >
                            @error('name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea 
                                class="form-control @error('description') is-invalid @enderror" 
                                id="description" 
                                name="description" 
                                rows="4"
                                placeholder="Enter product description"
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category *</label>
                            <div class="section-grid">
                                @foreach(['manufaktur' => 'Manufaktur', 'kuliner' => 'Kuliner (UMKM)', 'kerajinan' => 'Kerajinan'] as $key => $label)
                                    <label class="option-btn {{ old('category') === $key ? 'checked' : '' }}">
                                        <input type="radio" name="category" value="{{ $key }}" {{ old('category') === $key ? 'checked' : '' }} required>
                                        <div>{{ $label }}</div>
                                    </label>
                                @endforeach
                            </div>
                            @error('category')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Ordering Method Section -->
                    <div class="form-section">
                        <div class="form-section-title">Ordering Method</div>
                        
                        <label class="form-label">How to Order *</label>
                        <div class="section-grid">
                            <label class="option-btn {{ old('ordering_method') === 'marketplace' ? 'checked' : '' }}">
                                <input type="radio" name="ordering_method" value="marketplace" {{ old('ordering_method') === 'marketplace' ? 'checked' : '' }} required>
                                <div>🛍️ Marketplace</div>
                            </label>
                            <label class="option-btn {{ old('ordering_method') === 'whatsapp' ? 'checked' : '' }}">
                                <input type="radio" name="ordering_method" value="whatsapp" {{ old('ordering_method') === 'whatsapp' ? 'checked' : '' }} required>
                                <div>💬 WhatsApp</div>
                            </label>
                        </div>
                        @error('ordering_method')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                        <!-- Marketplace Links -->
                        <div class="conditional-field {{ old('ordering_method') === 'marketplace' ? 'show' : '' }}" id="marketplaceFields">
                            <label for="shopee_link" class="form-label">Shopee Link</label>
                            <input 
                                type="url" 
                                class="form-control @error('shopee_link') is-invalid @enderror" 
                                id="shopee_link" 
                                name="shopee_link" 
                                value="{{ old('shopee_link') }}"
                                placeholder="https://shopee.co.id/..."
                            >
                            @error('shopee_link')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                            <label for="tokopedia_link" class="form-label mt-3">Tokopedia Link</label>
                            <input 
                                type="url" 
                                class="form-control @error('tokopedia_link') is-invalid @enderror" 
                                id="tokopedia_link" 
                                name="tokopedia_link" 
                                value="{{ old('tokopedia_link') }}"
                                placeholder="https://tokopedia.com/..."
                            >
                            @error('tokopedia_link')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- WhatsApp Phone -->
                        <div class="conditional-field {{ old('ordering_method') === 'whatsapp' ? 'show' : '' }}" id="whatsappFields">
                            <label class="form-label">Contact Number</label>
                            <div class="phone-button-group">
                                <button type="button" class="phone-btn {{ old('use_default_phone', true) ? 'active' : '' }}" onclick="setPhoneMode(true, event)">
                                    Use Default (62821-8932-7077)
                                </button>
                                <button type="button" class="phone-btn {{ old('use_default_phone') === '0' ? 'active' : '' }}" onclick="setPhoneMode(false, event)">
                                    Custom Number
                                </button>
                            </div>
                            <input type="hidden" id="use_default_phone" name="use_default_phone" value="{{ old('use_default_phone', 1) }}">

                            <div id="customPhoneField" class="mt-3" style="{{ old('use_default_phone', true) ? 'display:none;' : '' }}">
                                <input 
                                    type="text" 
                                    class="form-control @error('phone') is-invalid @enderror" 
                                    id="phone" 
                                    name="phone" 
                                    value="{{ old('phone') }}"
                                    placeholder="628xxxxxxxxxx"
                                >
                                <small class="form-help">Enter phone number in format: 628xxxxxxxxxx</small>
                                @error('phone')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-buttons">
                        <a href="{{ route('product_be.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create Product</button>
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

    // Image upload handlers
    imagePreviewBox.addEventListener('click', () => imageInput.click());

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

    // Category selection visual feedback
    document.querySelectorAll('input[name="category"]').forEach(input => {
        input.addEventListener('change', function() {
            document.querySelectorAll('input[name="category"]').forEach(i => {
                i.closest('.option-btn').classList.remove('checked');
            });
            this.closest('.option-btn').classList.add('checked');
        });
    });

    // Ordering method toggle
    document.querySelectorAll('input[name="ordering_method"]').forEach(input => {
        input.addEventListener('change', function() {
            document.querySelectorAll('input[name="ordering_method"]').forEach(i => {
                i.closest('.option-btn').classList.remove('checked');
            });
            this.closest('.option-btn').classList.add('checked');
            
            const marketplaceFields = document.getElementById('marketplaceFields');
            const whatsappFields = document.getElementById('whatsappFields');
            
            if (this.value === 'marketplace') {
                marketplaceFields.classList.add('show');
                whatsappFields.classList.remove('show');
            } else {
                marketplaceFields.classList.remove('show');
                whatsappFields.classList.add('show');
            }
        });
    });

    // Phone mode toggle
    function setPhoneMode(useDefault, event) {
        event.preventDefault();
        document.getElementById('use_default_phone').value = useDefault ? 1 : 0;
        document.getElementById('customPhoneField').style.display = useDefault ? 'none' : 'block';
        
        document.querySelectorAll('.phone-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
    }
</script>
@endsection
 
{{-- @endpush --}}
