
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
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="user" {{ old('role', $user->role)=='user' ? 'selected' : '' }}>User</option>
                        <option value="editor" {{ old('role', $user->role)=='editor' ? 'selected' : '' }}>Editor</option>
                        <option value="admin" {{ old('role', $user->role)=='admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">New Password (leave blank to keep)</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Avatar (leave blank to keep)</label>
                    <input name="avatar" id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" accept="image/*">
                    @error('avatar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Avatar</label><br>
                    <img id="avatarPreview" src="{{ $user->avatar ? Storage::url($user->avatar) : asset('fe/img/default-avatar.png') }}" style="max-width:140px;" class="rounded">
                </div>

                <button class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('avatar')?.addEventListener('change', function(e){
    const p = document.getElementById('avatarPreview');
    if(!e.target.files.length) return;
    p.src = URL.createObjectURL(e.target.files[0]);
});
</script>
@endpush
@endsection