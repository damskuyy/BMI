
@extends('layout-be.master')
@section('title', 'Edit Slider')
@section('content')
<div class="container-fluid">
    <h1 class="h3">Edit Slider</h1>
    <form action="{{ route('slider.update', $slider) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $slider->title }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Current Image</label>
            <img src="{{ Storage::url($slider->image) }}" alt="{{ $slider->title }}" style="width:100px;">
        </div>
        <div class="mb-3">
            <label>New Image (leave blank to keep current)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label>Link</label>
            <input type="url" name="link" value="{{ $slider->link }}" class="form-control">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection