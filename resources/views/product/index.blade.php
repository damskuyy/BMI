@extends('layout.master')
@section('content')
    @use('Illuminate\Support\Facades\Storage')
    
    @php
        $productSlider = \App\Models\Slider::where('section', 'product')->first();
    @endphp
    
    <style>
        .page-slider-fade-in {
            animation: pageSliderFadeIn 0.8s ease-in;
        }
        @keyframes pageSliderFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        /* Ensure product card images are square on small screens */
        @media (max-width: 575px) {
            .single-project .project-img {
                display: block !important;
                position: relative !important;
                width: 100% !important;
                padding-bottom: 100% !important; /* 1:1 aspect ratio */
                height: 0 !important;
                overflow: hidden !important;
            }
            .single-project .project-img img {
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                height: 100% !important;
                object-fit: cover !important;
            }
        }
    </style>

    <!-- slider Area Start-->
    @if($productSlider && $productSlider->image)
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center mb-200"
                style="background-image: url('{{ Storage::url($productSlider->image) }}'); background-size: cover; background-position: center;">
    @else
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center mb-200"
                data-background="fe/img/hero/produk.png">
    @endif
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap pt-100">
                                <h2>My Product</h2>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Product Area Start -->
    <section class="project-area section-padding-30" id="product-section">
        <div class="container">
            <div class="project-heading mb-35">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle3">
                            <div class="front-text">
                                <h2 class="">Our Product</h2>
                            </div>
                            <span class="back-text">Crafts</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="properties__button">
                            <!--Nav Button  -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    @php
                                        $activeTab = request()->get('tab', 'home');
                                    @endphp
                                    <a class="nav-item nav-link {{ $activeTab == 'home' ? 'active' : '' }}"
                                        id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                        aria-controls="nav-home" aria-selected="false">Show all</a>
                                    <a class="nav-item nav-link {{ $activeTab == 'profile' ? 'active' : '' }}"
                                        id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">Manufaktur</a>
                                    <a class="nav-item nav-link {{ $activeTab == 'contact' ? 'active' : '' }}"
                                        id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                                        aria-controls="nav-contact" aria-selected="false">Kuliner (UMKM)</a>
                                    <a class="nav-item nav-link {{ $activeTab == 'last' ? 'active' : '' }}"
                                        id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab"
                                        aria-controls="nav-last" aria-selected="false">Kerajinan</a>
                                </div>
                            </nav>
                            <!-- Search Box Start -->
                            <form method="GET" action="{{ url()->current() }}" class="form-inline mb-2 mt-3">
                                <input type="hidden" name="tab" value="{{ request('tab', 'home') }}">
                                <input type="text" name="search" class="form-control mr-2" placeholder="Cari produk..."
                                    value="{{ request('search') }}" style="min-width:180px;">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                            <!-- Search Box End -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Nav Card -->
                    <div class="product-img-bg mb-30">
                        <div class="tab-content active" id="nav-tabContent">
                            <!-- Helper function for product display -->
                            @php
                                function renderProductsTab($categoryFilter = null) {
                                    $search = strtolower(request()->get('search', ''));
                                    
                                    if ($categoryFilter) {
                                        $allProducts = \App\Models\Product::where('category', $categoryFilter)->get();
                                    } else {
                                        $allProducts = \App\Models\Product::all();
                                    }
                                    
                                    if ($search) {
                                        $allProducts = $allProducts->filter(function($p) use ($search) {
                                            return strpos(strtolower($p->name), $search) !== false ||
                                                   strpos(strtolower($p->description), $search) !== false;
                                        })->values();
                                    }
                                    
                                    $isMobile = isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $_SERVER['HTTP_USER_AGENT']);
                                    $perPage = $isMobile ? 8 : 9;
                                    $page = request()->get('page', 1);
                                    $total = $allProducts->count();
                                    $totalPages = ceil($total / $perPage);
                                    $offset = ($page - 1) * $perPage;
                                    $productsToShow = $allProducts->slice($offset, $perPage);
                                    
                                    return [
                                        'products' => $productsToShow,
                                        'page' => $page,
                                        'total' => $total,
                                        'totalPages' => $totalPages,
                                        'perPage' => $perPage
                                    ];
                                }
                            @endphp

                            <!-- card ALL -->
                            <div class="tab-pane fade {{ $activeTab == 'home' ? 'show active' : '' }}" id="nav-home"
                                role="tabpanel" aria-labelledby="nav-home-tab">
                                @php
                                    $data = renderProductsTab(null);
                                    $productsToShow = $data['products'];
                                    $page = $data['page'];
                                    $totalPages = $data['totalPages'];
                                @endphp
                                <div class="project-caption">
                                    <div class="row">
                                        @if(count($productsToShow) == 0)
                                            <div class="col-12">
                                                <div class="alert alert-primary text-center"
                                                    style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk yang Anda cari.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                            @php
                                                $imagePath = $product->image;
                                                if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
                                                    $imageUrl = $imagePath;
                                                } elseif (strpos($imagePath, 'fe/') === 0) {
                                                    $imageUrl = asset($imagePath);
                                                } else {
                                                    $imageUrl = asset('storage/' . ltrim($imagePath, '/'));
                                                }
                                            @endphp
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single-project mb-30">
                                                    <a class="project-img product-preview" href="javascript:void(0);" style="display:block; width:100%; padding-bottom:100%; position:relative; overflow:hidden;"
                                                        data-img="{{ $imageUrl }}" 
                                                        data-title="{{ $product->name }}"
                                                        data-desc="{{ $product->description }}">
                                                        <img src="{{ $imageUrl }}" alt="{{ $product->name }}" style="position:absolute !important; top:0 !important; left:0 !important; width:100% !important; height:100% !important; object-fit:cover !important;">
                                                    </a>
                                                    <div class="project-cap">
                                                        <div class="marketplace-row">
                                                            @if($product->ordering_method === 'marketplace')
                                                                @if($product->shopee_link)
                                                                    <a href="{{ $product->shopee_link }}" class="plus-btn shopee-btn" target="_blank">
                                                                        <img src="fe/img/icon/shopee-putih.png" alt="Shopee" width="32" height="32">
                                                                    </a>
                                                                @endif
                                                                @if($product->tokopedia_link)
                                                                    <a href="{{ $product->tokopedia_link }}" class="plus-btn tokopedia-btn" target="_blank">
                                                                        <img src="fe/img/icon/tokopedia-putih.png" alt="Tokopedia" width="32" height="32">
                                                                    </a>
                                                                @endif
                                                            @elseif($product->ordering_method === 'whatsapp')
                                                                @php
                                                                    $whatsappNumber = $product->use_default_phone ? '6282189327077' : $product->phone;
                                                                    $whatsappText = 'Halo, saya tertarik dengan produk ' . urlencode($product->name);
                                                                    $whatsappUrl = 'https://wa.me/' . $whatsappNumber . '?text=' . $whatsappText;
                                                                @endphp
                                                                <a href="{{ $whatsappUrl }}" class="plus-btn whatsapp-btn" target="_blank">
                                                                    <img src="fe/img/icon/whatsapp-putih.png" alt="WhatsApp" width="38" height="38">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <h4><a>{{ $product->name }}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @include('product.partials.pagination', ['page' => $page, 'totalPages' => $totalPages])
                            </div>

                            <!-- Card Manufaktur -->
                            <div class="tab-pane fade {{ $activeTab == 'profile' ? 'show active' : '' }}" id="nav-profile"
                                role="tabpanel" aria-labelledby="nav-profile-tab">
                                @php
                                    $data = renderProductsTab('manufaktur');
                                    $productsToShow = $data['products'];
                                    $page = $data['page'];
                                    $totalPages = $data['totalPages'];
                                @endphp
                                <div class="project-caption">
                                    <div class="row">
                                        @if(count($productsToShow) == 0)
                                            <div class="col-12">
                                                <div class="alert alert-primary text-center"
                                                    style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk kategori manufaktur.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                            @php
                                                $imagePath = $product->image;
                                                if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
                                                    $imageUrl = $imagePath;
                                                } elseif (strpos($imagePath, 'fe/') === 0) {
                                                    $imageUrl = asset($imagePath);
                                                } else {
                                                    $imageUrl = asset('storage/' . ltrim($imagePath, '/'));
                                                }
                                            @endphp
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single-project mb-30">
                                                    <a class="project-img product-preview" href="javascript:void(0);" style="display: block; aspect-ratio: 1/1; overflow: hidden;"
                                                        data-img="{{ $imageUrl }}" 
                                                        data-title="{{ $product->name }}"
                                                        data-desc="{{ $product->description }}">
                                                        <img src="{{ $imageUrl }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                                    </a>
                                                    <div class="project-cap">
                                                        <div class="marketplace-row">
                                                            @if($product->ordering_method === 'marketplace')
                                                                @if($product->shopee_link)
                                                                    <a href="{{ $product->shopee_link }}" class="plus-btn shopee-btn" target="_blank">
                                                                        <img src="fe/img/icon/shopee-putih.png" alt="Shopee" width="32" height="32">
                                                                    </a>
                                                                @endif
                                                                @if($product->tokopedia_link)
                                                                    <a href="{{ $product->tokopedia_link }}" class="plus-btn tokopedia-btn" target="_blank">
                                                                        <img src="fe/img/icon/tokopedia-putih.png" alt="Tokopedia" width="32" height="32">
                                                                    </a>
                                                                @endif
                                                            @elseif($product->ordering_method === 'whatsapp')
                                                                @php
                                                                    $whatsappNumber = $product->use_default_phone ? '6282189327077' : $product->phone;
                                                                    $whatsappText = 'Halo, saya tertarik dengan produk ' . urlencode($product->name);
                                                                    $whatsappUrl = 'https://wa.me/' . $whatsappNumber . '?text=' . $whatsappText;
                                                                @endphp
                                                                <a href="{{ $whatsappUrl }}" class="plus-btn whatsapp-btn" target="_blank">
                                                                    <img src="fe/img/icon/whatsapp-putih.png" alt="WhatsApp" width="38" height="38">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <h4><a>{{ $product->name }}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @include('product.partials.pagination', ['page' => $page, 'totalPages' => $totalPages])
                            </div>

                            <!-- Card Kuliner -->
                            <div class="tab-pane fade {{ $activeTab == 'contact' ? 'show active' : '' }}" id="nav-contact"
                                role="tabpanel" aria-labelledby="nav-contact-tab">
                                @php
                                    $data = renderProductsTab('kuliner');
                                    $productsToShow = $data['products'];
                                    $page = $data['page'];
                                    $totalPages = $data['totalPages'];
                                @endphp
                                <div class="project-caption">
                                    <div class="row">
                                        @if(count($productsToShow) == 0)
                                            <div class="col-12">
                                                <div class="alert alert-primary text-center"
                                                    style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk kategori kuliner.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                            @php
                                                $imagePath = $product->image;
                                                if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
                                                    $imageUrl = $imagePath;
                                                } elseif (strpos($imagePath, 'fe/') === 0) {
                                                    $imageUrl = asset($imagePath);
                                                } else {
                                                    $imageUrl = asset('storage/' . ltrim($imagePath, '/'));
                                                }
                                            @endphp
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single-project mb-30">
                                                    <a class="project-img product-preview" href="javascript:void(0);" style="display: block; aspect-ratio: 1/1; overflow: hidden;"
                                                        data-img="{{ $imageUrl }}" 
                                                        data-title="{{ $product->name }}"
                                                        data-desc="{{ $product->description }}">
                                                        <img src="{{ $imageUrl }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                                    </a>
                                                    <div class="project-cap">
                                                        <div class="marketplace-row">
                                                            @if($product->ordering_method === 'marketplace')
                                                                @if($product->shopee_link)
                                                                    <a href="{{ $product->shopee_link }}" class="plus-btn shopee-btn" target="_blank">
                                                                        <img src="fe/img/icon/shopee-putih.png" alt="Shopee" width="32" height="32">
                                                                    </a>
                                                                @endif
                                                                @if($product->tokopedia_link)
                                                                    <a href="{{ $product->tokopedia_link }}" class="plus-btn tokopedia-btn" target="_blank">
                                                                        <img src="fe/img/icon/tokopedia-putih.png" alt="Tokopedia" width="32" height="32">
                                                                    </a>
                                                                @endif
                                                            @elseif($product->ordering_method === 'whatsapp')
                                                                @php
                                                                    $whatsappNumber = $product->use_default_phone ? '6282189327077' : $product->phone;
                                                                    $whatsappText = 'Halo, saya tertarik dengan produk ' . urlencode($product->name);
                                                                    $whatsappUrl = 'https://wa.me/' . $whatsappNumber . '?text=' . $whatsappText;
                                                                @endphp
                                                                <a href="{{ $whatsappUrl }}" class="plus-btn whatsapp-btn" target="_blank">
                                                                    <img src="fe/img/icon/whatsapp-putih.png" alt="WhatsApp" width="38" height="38">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <h4><a>{{ $product->name }}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @include('product.partials.pagination', ['page' => $page, 'totalPages' => $totalPages])
                            </div>

                            <!-- Card Kerajinan -->
                            <div class="tab-pane fade {{ $activeTab == 'last' ? 'show active' : '' }}" id="nav-last"
                                role="tabpanel" aria-labelledby="nav-last-tab">
                                @php
                                    $data = renderProductsTab('kerajinan');
                                    $productsToShow = $data['products'];
                                    $page = $data['page'];
                                    $totalPages = $data['totalPages'];
                                @endphp
                                <div class="project-caption">
                                    <div class="row">
                                        @if(count($productsToShow) == 0)
                                            <div class="col-12">
                                                <div class="alert alert-primary text-center"
                                                    style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk kategori kerajinan.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                            @php
                                                $imagePath = $product->image;
                                                if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
                                                    $imageUrl = $imagePath;
                                                } elseif (strpos($imagePath, 'fe/') === 0) {
                                                    $imageUrl = asset($imagePath);
                                                } else {
                                                    $imageUrl = asset('storage/' . ltrim($imagePath, '/'));
                                                }
                                            @endphp
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single-project mb-30">
                                                    <a class="project-img product-preview" href="javascript:void(0);" style="display: block; aspect-ratio: 1/1; overflow: hidden;"
                                                        data-img="{{ $imageUrl }}" 
                                                        data-title="{{ $product->name }}"
                                                        data-desc="{{ $product->description }}">
                                                        <img src="{{ $imageUrl }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                                    </a>
                                                    <div class="project-cap">
                                                        <div class="marketplace-row">
                                                            @if($product->ordering_method === 'marketplace')
                                                                @if($product->shopee_link)
                                                                    <a href="{{ $product->shopee_link }}" class="plus-btn shopee-btn" target="_blank">
                                                                        <img src="fe/img/icon/shopee-putih.png" alt="Shopee" width="32" height="32">
                                                                    </a>
                                                                @endif
                                                                @if($product->tokopedia_link)
                                                                    <a href="{{ $product->tokopedia_link }}" class="plus-btn tokopedia-btn" target="_blank">
                                                                        <img src="fe/img/icon/tokopedia-putih.png" alt="Tokopedia" width="32" height="32">
                                                                    </a>
                                                                @endif
                                                            @elseif($product->ordering_method === 'whatsapp')
                                                                @php
                                                                    $whatsappNumber = $product->use_default_phone ? '6282189327077' : $product->phone;
                                                                    $whatsappText = 'Halo, saya tertarik dengan produk ' . urlencode($product->name);
                                                                    $whatsappUrl = 'https://wa.me/' . $whatsappNumber . '?text=' . $whatsappText;
                                                                @endphp
                                                                <a href="{{ $whatsappUrl }}" class="plus-btn whatsapp-btn" target="_blank">
                                                                    <img src="fe/img/icon/whatsapp-putih.png" alt="WhatsApp" width="38" height="38">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <h4><a>{{ $product->name }}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @include('product.partials.pagination', ['page' => $page, 'totalPages' => $totalPages])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Catalog section -->
    <div class="container box_1170 mb-100">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card p-4 catalog-card" data-animate="1" style="border-radius:12px; box-shadow:0 8px 30px rgba(2,8,52,0.06);">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div>
                            <h3 class="mb-1" style="font-family:'Teko',sans-serif; font-size:28px; color:#0b1c39;">
                                Katalog Lengkap Produk Kami
                            </h3>
                            <p class="mb-10 text-muted" style="max-width:720px;">
                                Lihat dan download katalog lengkap produk kami dalam format PDF untuk semua kategori yang tersedia.
                            </p>
                        </div>
                        <div class="mt-3 mt-md-0 d-flex gap-2">
                            <a href="#" class="btn btn-primary mr-2" id="catalogViewBtn" data-toggle="modal" data-target="#catalogPdfModal">
                                <i class="fas fa-eye"></i> Lihat PDF
                            </a>
                            <a href="" class="btn btn-outline-primary" id="catalogDownloadBtn" download>
                                <i class="fas fa-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PDF preview modal -->
    <div class="modal fade" id="catalogPdfModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document" style="max-width:1100px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Katalog Produk — Lihat (PDF)</h5>
                    <div class="modal-actions">
                        <a id="downloadPdfBtnModal" href="#" class="btn btn-sm btn-outline-primary" download style="margin-right: 12px;">
                            <i class="fas fa-download"></i> Download
                        </a>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:1.6rem;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body p-0" style="background:#fff;">
                    <iframe id="catalogPdfFrame" src="" frameborder="0" style="width:100%; height:80vh; min-height:480px;"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Preview Product -->
    <div class="modal fade" id="productPreviewModal" tabindex="-1" role="dialog" aria-labelledby="productPreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content" style="background:#00235b;">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-white" id="productPreviewLabel"></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="font-size:2rem;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="productPreviewImg" src="" alt="Preview" style="max-width:100%; max-height:400px; border-radius:12px; box-shadow:0 2px 12px rgba(0,0,0,0.15);">
                    <div id="productPreviewDesc" class="mt-3 text-white"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const catalogs = {
            'home': '{{ asset("fe/files/Katalog-UMKM-YDBA-BMI.pdf") }}',
            'profile': '{{ asset("fe/files/Katalog-Manufaktur-YDBA-BMI.pdf") }}',
            'contact': '{{ asset("fe/files/Katalog-Kuliner-YDBA-BMI.pdf") }}',
            'last': '{{ asset("fe/files/Katalog-Kerajinan-YDBA-BMI.pdf") }}'
        };

        const tabNames = {
            'home': 'Semua Produk',
            'profile': 'Manufaktur',
            'contact': 'Kuliner',
            'last': 'Kerajinan'
        };

        function updateCatalog(tabId) {
            const pdfUrl = catalogs[tabId] || catalogs['home'];
            const tabName = tabNames[tabId] || 'Semua Produk';
            document.getElementById('catalogViewBtn').setAttribute('data-pdf', pdfUrl);
            document.getElementById('catalogDownloadBtn').href = pdfUrl;
            document.getElementById('downloadPdfBtnModal').href = pdfUrl;
            document.querySelector('.modal-title').textContent = 'Katalog Produk ' + tabName + ' — Lihat (PDF)';
        }

        const activeTab = '{{ request()->get("tab", "home") }}';
        updateCatalog(activeTab);

        document.querySelectorAll('.nav-tabs .nav-link').forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                const tabId = this.getAttribute('href').replace('#nav-', '');
                setTimeout(() => { updateCatalog(tabId); }, 100);
            });
        });

        $('#catalogPdfModal').on('show.bs.modal', function(event) {
            const pdfUrl = document.getElementById('catalogViewBtn').getAttribute('data-pdf');
            document.getElementById('catalogPdfFrame').src = pdfUrl + '#toolbar=0&navpanes=0';
        });

        $('#catalogPdfModal').on('hidden.bs.modal', function() {
            document.getElementById('catalogPdfFrame').src = '';
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.nav-tabs .nav-link').forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const tabId = this.getAttribute('href').replace('#nav-', '');
                const url = new URL(window.location.href);
                url.searchParams.set('tab', tabId);
                url.searchParams.delete('page');
                url.searchParams.delete('search');
                // keep user at product cards section when switching tabs
                window.location.href = url.pathname + url.search + '#product-section';
            });
        });

        function scrollToProductSection(offset = 150) {
            const productSection = document.getElementById('product-section');
            if (!productSection) return;
            const top = productSection.getBoundingClientRect().top + window.pageYOffset - offset;
            window.scrollTo({ top: top, behavior: 'smooth' });
        }

        if (window.location.hash === '#product-section') {
            // give the page a short moment to render then scroll with offset
            setTimeout(() => scrollToProductSection(150), 150);
        }

        document.querySelectorAll('.product-preview').forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const img = this.getAttribute('data-img');
                const title = this.getAttribute('data-title');
                const desc = this.getAttribute('data-desc');
                document.getElementById('productPreviewLabel').textContent = title;
                document.getElementById('productPreviewImg').src = img;
                document.getElementById('productPreviewDesc').textContent = desc;
                $('#productPreviewModal').modal('show');
            });
        });
    });
    </script>
@endsection
@section('client')
    @include('layout.client')
@endsection
