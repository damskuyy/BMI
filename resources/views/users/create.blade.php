
@extends('layout-be.master')
@section('title', 'Add User')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Add User</h1>
        <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3 row">
                    <div class="col">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col">
                        <label class="form-label">Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="user" {{ old('role')=='user' ? 'selected' : '' }}>User</option>
                        <option value="editor" {{ old('role')=='editor' ? 'selected' : '' }}>Editor</option>
                        <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Avatar (optional)</label>
                    <input name="avatar" id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" accept="image/*">
                    @error('avatar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <img id="avatarPreview" src="#" style="max-width:140px;display:none;" class="rounded">
                </div>

                <button class="btn btn-primary"><i class="fas fa-save"></i> Create</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('avatar')?.addEventListener('change', function(e){
    const p = document.getElementById('avatarPreview');
    if(!e.target.files.length) return p.style.display='none';
    p.src = URL.createObjectURL(e.target.files[0]);
    p.style.display = 'inline-block';
});
</script>
@endpush
@endsection