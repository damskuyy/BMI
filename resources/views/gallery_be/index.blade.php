@extends('layout-be.master')
@section('title', 'Gallery')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Gallery</h1>
        <a href="{{ route('gallery_be.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Image
        </a>
    </div>

    {{-- @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}

    <div class="row">
        @forelse($galleries as $gallery)
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-2">
                            @php
                                $thumb = $gallery->images->first();
                                $thumbUrl = asset('be/img/placeholder.png');
                                if ($thumb) {
                                    // Check public storage (storage/app/public)
                                    if (\Illuminate\Support\Facades\Storage::disk('public')->exists($thumb->image)) {
                                        $thumbUrl = asset('storage/' . $thumb->image);
                                    }
                                    // Check if stored path already points to a public asset (fe/img/...)
                                    elseif (file_exists(public_path($thumb->image))) {
                                        $thumbUrl = asset($thumb->image);
                                    }
                                    // Also try common gallery folder
                                    elseif (file_exists(public_path('fe/img/gallery/' . $thumb->image))) {
                                        $thumbUrl = asset('fe/img/gallery/' . $thumb->image);
                                    }
                                }
                            @endphp
                            <img src="{{ $thumbUrl }}" class="img-fluid h-100" style="object-fit:cover; width:100%; height:100%; max-height:150px;" onerror="this.src='{{ asset('be/img/placeholder.png') }}'" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $gallery->title }}</h5>
                                <p class="card-text small text-muted">Event Date: {{ \Carbon\Carbon::parse($gallery->event_date)->format('d M Y') }}</p>
                                @if($gallery->description)
                                    <p class="card-text">{{ Str::limit($gallery->description, 150) }}</p>
                                @endif
                                <div class="mt-2">
                                    <span class="badge bg-primary">{{ $gallery->images->count() }} photos</span>
                                    @if($gallery->images->count())
                                        <span class="badge bg-info">Modes: {{ $gallery->images->pluck('display_mode')->unique()->implode(', ') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <div>
                                <a href="{{ route('gallery_be.edit', $gallery) }}" class="btn btn-sm btn-info w-100 mb-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('gallery_be.destroy', $gallery) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger w-100"  onclick="hapus(event, this)" >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No gallery items yet.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $galleries->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

<script>

        function hapus(event, el){
            event.preventDefault()
            swal({
                title: "Are you sure?",
                text: "Your will delete this package permanently!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
                },
                function(){
                    el.closest('form').submit()
                });
        }

        function tampil_pesan(){
            const pesan = "{{session('success')}}"

            if(pesan.trim() !== ''){
                swal('Good Job', pesan, 'success')
            }
        }

        window.addEventListener('load', function(){
            tampil_pesan()
        })
    </script>

@push('styles')
<style>
    .card-img-top {
        transition: transform .3s ease;
    }
    .card:hover .card-img-top {
        transform: scale(1.05);
    }
</style>
@endpush
@endsection