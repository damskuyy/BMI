@extends('layout-be.master')
@section('title', 'Products')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Products</h1>
            <a href="{{ route('product_be.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Product
            </a>
        </div>

        {{-- @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Metode Pemesanan</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>
                                        @php
                                            // Handle both seeder images (fe/img/gallery/*) and uploaded images (storage/products/*)
                                            $imagePath = strpos($product->image, 'fe/img/gallery') === 0 
                                                ? asset($product->image) 
                                                : asset('storage/' . $product->image);
                                        @endphp
                                        <img src="{{ $imagePath }}" 
                                             alt="{{ $product->name }}" 
                                             width="50">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>
                                        @if($product->ordering_method === 'marketplace')
                                            <span class="badge bg-info">Marketplace</span>
                                        @elseif($product->ordering_method === 'whatsapp')
                                            <span class="badge bg-success">WhatsApp</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $product->ordering_method }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('product_be.edit', $product) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('product_be.destroy', $product) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    onclick="hapus(event, this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No products found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <nav aria-label="Table pagination">
                        <ul class="pagination justify-content-center mb-0">
                            {{-- Previous Page Link --}}
                            @if ($products->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">← Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}">← Previous</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                @if ($page == $products->currentPage())
                                    <li class="page-item active">
                                        <span class="page-link">
                                            {{ $page }}
                                            <span class="sr-only">(current)</span>
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($products->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}">Next →</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next →</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    <div class="text-center mt-3 text-muted small">
                        Showing {{ $products->firstItem() ?? 0 }} to {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
                    </div>
                </div>
            </div>
        </div>
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