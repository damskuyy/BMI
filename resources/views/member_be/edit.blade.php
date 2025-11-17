
@extends('layout-be.master')
@section('title', 'Edit Member')
@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-lg-8">
            <h1 class="h2 fw-bold">Edit Anggota</h1>
            <p class="text-muted">Perbarui informasi anggota di bawah</p>
            <a href="{{ route('member_be.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Terjadi kesalahan:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif --}}

                    <form action="{{ route('member_be.update', $member) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Anggota <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $member->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Struktur/Posisi <span class="text-danger">*</span></label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $member->position) }}" required>
                            @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sektor <span class="text-danger">*</span></label>
                                <select name="sector" class="form-select @error('sector') is-invalid @enderror" required>
                                    <option value="">Pilih Sektor</option>
                                    <option value="MFG" {{ old('sector', $member->sector) == 'MFG' ? 'selected' : '' }}>MFG (Manufaktur)</option>
                                    <option value="KUL" {{ old('sector', $member->sector) == 'KUL' ? 'selected' : '' }}>KUL (Kuliner)</option>
                                    <option value="KRJ" {{ old('sector', $member->sector) == 'KRJ' ? 'selected' : '' }}>KRJ (Kerajinan)</option>
                                </select>
                                @error('sector')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No HP <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $member->phone) }}" required>
                                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Usaha <span class="text-danger">*</span></label>
                            <input type="text" name="business" class="form-control @error('business') is-invalid @enderror" value="{{ old('business', $member->business) }}" required>
                            @error('business')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Produk <span class="text-danger">*</span></label>
                            <input type="text" name="product" class="form-control @error('product') is-invalid @enderror" value="{{ old('product', $member->product) }}" required>
                            @error('product')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Domisili <span class="text-danger">*</span></label>
                            <input type="text" name="domicile" class="form-control @error('domicile') is-invalid @enderror" value="{{ old('domicile', $member->domicile) }}" required>
                            @error('domicile')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Anggota</label>
                            @if($member->foto && file_exists(storage_path('app/public/'.$member->foto)))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $member->foto) }}" alt="{{ $member->name }}" style="max-width: 150px; border-radius: 0.25rem;">
                                </div>
                            @endif
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto. Format: JPG, PNG, GIF | Max: 5MB</small>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check me-2"></i> Perbarui
                            </button>
                            <a href="{{ route('member_be.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fotoInput = document.getElementById('foto');
    const fotoPreview = document.getElementById('fotoPreview');
    const fotoPlaceholder = document.getElementById('fotoPlaceholder');
    const fotoDropZone = document.getElementById('fotoDropZone');
    const currentFoto = document.getElementById('currentFoto');

    // Click to upload
    fotoDropZone.addEventListener('click', () => fotoInput.click());

    // Handle file selection
    fotoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                fotoPreview.src = e.target.result;
                fotoPreview.style.display = 'block';
                fotoPlaceholder.style.display = 'none';
                if (currentFoto) currentFoto.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    });

    // Drag and drop
    fotoDropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        fotoDropZone.style.backgroundColor = '#f8f9fa';
    });

    fotoDropZone.addEventListener('dragleave', () => {
        fotoDropZone.style.backgroundColor = '';
    });

    fotoDropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        fotoDropZone.style.backgroundColor = '';
        if (e.dataTransfer.files.length) {
            fotoInput.files = e.dataTransfer.files;
            const event = new Event('change', { bubbles: true });
            fotoInput.dispatchEvent(event);
        }
    });
});
</script>
@endpush
@endsection