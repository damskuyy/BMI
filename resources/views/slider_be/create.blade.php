
@extends('layout-be.master')
@section('title', 'Add Slider')
@section('content')
<div class="container-fluid">
    <h1 class="h3">Add Slider</h1>
    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Link</label>
            <input type="url" name="link" class="form-control">
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection