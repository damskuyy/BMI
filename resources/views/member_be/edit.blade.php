
@extends('layout-be.master')
@section('title', 'Edit Member')
@section('content')
<div class="container-fluid">
    <h1 class="h3">Edit Member</h1>
    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Anggota</label>
            <input type="text" name="name" value="{{ $member->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stuktur</label>
            <input type="text" name="position" value="{{ $member->position }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Sektor</label>
            <input type="text" name="sector" value="{{ $member->sector }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Usaha</label>
            <input type="text" name="business" value="{{ $member->business }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Produk</label>
            <input type="text" name="product" value="{{ $member->product }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Domisili</label>
            <input type="text" name="domicile" value="{{ $member->domicile }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="phone" value="{{ $member->phone }}" class="form-control" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection