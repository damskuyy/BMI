@extends('layout-be.master')
@section('title', 'Edit User')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit User</h1>
        <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">New Password (leave blank to keep)</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Avatar</label><br>
                    @php $currentPublic = public_path('storage/' . ($user->foto ?? '')); @endphp
                    <img id="currentAvatar"
                         src="{{ ($user->foto && file_exists($currentPublic)) ? '/storage/' . $user->foto : asset('fe/img/icon/user.png') }}"
                         alt="{{ $user->name }}"
                         class="rounded-circle mb-2"
                         width="80" height="80">
                </div>

                <div class="mb-3">
                    <label class="form-label">Change Avatar (leave blank to keep)</label>
                    <input name="foto" id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                    @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <img id="avatarPreview" src="#" style="max-width:140px;display:none;" class="rounded">
                </div>

                <button class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('foto')?.addEventListener('change', function(e){
    const preview = document.getElementById('avatarPreview');
    const current = document.getElementById('currentAvatar');
    
    if(!e.target.files.length) {
        preview.style.display = 'none';
        current.style.display = 'inline-block';
        return;
    }
    
    current.style.display = 'none';
    preview.src = URL.createObjectURL(e.target.files[0]);
    preview.style.display = 'inline-block';
});
</script>
@endpush
@endsection