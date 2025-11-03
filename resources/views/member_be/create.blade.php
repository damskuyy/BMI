
@extends('layout-be.master')
@section('title', 'Add Member')
@section('content')
<div class="container-fluid">
    <h1 class="h3">Add Member</h1>
    <form action="{{ route('member_be.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Anggota</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stuktur</label>
            <input type="text" name="position" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Sektor</label>
            <input type="text" name="sector" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Usaha</label>
            <input type="text" name="business" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Produk</label>
            <input type="text" name="product" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Domisili</label>
            <input type="text" name="domicile" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection