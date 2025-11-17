
@extends('layout-be.master')
@section('title', 'Sliders Management')
@section('content')
@use('App\Models\Slider')
@use('Illuminate\Support\Str')
@use('Illuminate\Support\Facades\Storage')
<style>
    .slider-card {
        transition: all 0.3s ease;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        background: white;
    }
    .slider-card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }
    .slider-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
        background: #f5f5f5;
    }
    .slider-info {
        padding: 15px;
    }
    .section-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 8px;
    }
    .section-home { background-color: #e3f2fd; color: #1976d2; }
    .section-about { background-color: #f3e5f5; color: #7b1fa2; }
    .section-manufaktur { background-color: #e0f2f1; color: #00796b; }
    .section-kuliner { background-color: #fff3e0; color: #e65100; }
    .section-kerajinan { background-color: #f1f8e9; color: #558b2f; }
    .section-member { background-color: #fce4ec; color: #c2185b; }
    .section-product { background-color: #ede7f6; color: #512da8; }
    .section-gallery { background-color: #e8f5e9; color: #2e7d32; }
    .section-blog { background-color: #ffebee; color: #c62828; }
    .section-blog_details { background-color: #fff8e1; color: #f57f17; }
    .section-contact { background-color: #e0f2f1; color: #004d40; }
    .slider-title {
        font-size: 15px;
        font-weight: 600;
        color: #333;
        margin: 10px 0 5px 0;
        word-break: break-word;
    }
    .slider-link {
        font-size: 12px;
        color: #999;
        margin: 5px 0 10px 0;
        word-break: break-all;
    }
    .slider-actions {
        display: flex;
        gap: 8px;
        margin-top: 10px;
    }
    .action-btn {
        flex: 1;
        padding: 6px 10px;
        font-size: 12px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: all 0.2s;
    }
    .action-edit {
        background: #2196F3;
        color: white;
    }
    .action-edit:hover {
        background: #1976D2;
    }
    .action-delete {
        background: #f44336;
        color: white;
    }
    .action-delete:hover {
        background: #da190b;
    }
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #999;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Slider Management</h1>
            <small class="text-muted">Manage sliders for different page sections</small>
        </div>
        <a href="{{ route('slider_be.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle"></i> Add New Slider
        </a>
    </div>

    {{-- @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif --}}

    @if($sliders->count() > 0)
        <div class="row g-3">
            @foreach($sliders as $slider)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="slider-card">
                        @if($slider->image)
                            <img src="{{ Storage::url($slider->image) }}" alt="{{ $slider->title }}" class="slider-image">
                        @else
                            <div class="slider-image d-flex align-items-center justify-content-center">
                                <span class="text-muted">No Image</span>
                            </div>
                        @endif
                        
                        <div class="slider-info">
                            <div class="section-badge section-{{ $slider->section }}">
                                {{ Slider::$sections[$slider->section] ?? $slider->section }}
                            </div>
                            
                            @if($slider->title)
                                <div class="slider-title" title="{{ $slider->title }}">
                                    {{ Str::limit($slider->title, 40) }}
                                </div>
                            @endif
                            
                            @if($slider->link)
                                <div class="slider-link" title="{{ $slider->link }}">
                                    {{ Str::limit($slider->link, 50, '...') }}
                                </div>
                            @endif
                            
                            <div class="slider-actions">
                                <a href="{{ url('slider_be/' . $slider->id . '/edit') }}" class="action-btn action-edit">
                                    <i class="fas fa-edit"> Edit</i>
                                </a>
                                <form action="{{ url('slider_be/' . $slider->id) }}" method="POST" class="flex-grow-1" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn action-delete w-100" onclick="hapus(event, this)">
                                        <i class="fas fa-trash"> Hapus</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $sliders->links() }}
        </div>
    @else
        <div class="empty-state">
            <h4>No Sliders Yet</h4>
            <p>Start by creating your first slider for any page section.</p>
            <a href="{{ route('slider_be.create') }}" class="btn btn-primary">Create First Slider</a>
        </div>
    @endif
</div>

<script>
    // Prevent multiple form submissions
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            this.querySelectorAll('button[type="submit"]').forEach(btn => {
                btn.disabled = true;
            });
        });
    });

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
@endsection