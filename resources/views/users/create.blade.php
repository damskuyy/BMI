
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="foto" class="form-label">Avatar (Opsional)</label>
                    <input type="file" name="foto" class="form-control" id="foto">
                </div>

                <div class="mb-3">
                    <img id="avatarPreview" src="#" style="max-width:140px;display:none;" class="rounded">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3 row">
                    <div class="col">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('foto')?.addEventListener('change', function(e){
    const p = document.getElementById('avatarPreview');
    if(!e.target.files.length) return p.style.display='none';
    p.src = URL.createObjectURL(e.target.files[0]);
    p.style.display = 'inline-block';
});
</script>
@endpush
@push('styles')
<style>
    @media (max-width: 768px) {
        #avatarPreview { display: block !important; max-width: 120px; width: 40%; margin: 8px auto; }
        input[type="file"] { width: 100%; }
        .card .card-body { padding: 10px; }
        .container-fluid .d-flex.justify-content-between { gap: 8px; }
        .btn.btn-primary { width: 100%; display: block; }
        .row .col { margin-bottom: 8px; }
    }
</style>
@endpush
@endsection