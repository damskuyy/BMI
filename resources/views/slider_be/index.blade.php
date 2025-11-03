
@extends('layout-be.master')
@section('title', 'Sliders')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Sliders</h1>
        <a href="{{ route('slider_be.create') }}" class="btn btn-primary">Add Slider</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <td><img src="{{ Storage::url($slider->image) }}" alt="{{ $slider->title }}" style="width:100px;"></td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->link }}</td>
                    <td>
                        <a href="{{ route('slider_be.edit', $slider) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('slider_be.destroy', $slider) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this slider?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $sliders->links() }}
</div>
@endsection