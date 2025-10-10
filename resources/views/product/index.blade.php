@extends('layout.master')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center mb-200" data-background="fe/img/hero/about.jpg">
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
    <!-- slider Area End-->
<!-- Product Area Start -->
    <section class="project-area section-padding-30">
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
                                    <a class="nav-item nav-link {{ $activeTab == 'home' ? 'active' : '' }}" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Show all</a>
                                    <a class="nav-item nav-link {{ $activeTab == 'profile' ? 'active' : '' }}" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Manufaktur</a>
                                    <a class="nav-item nav-link {{ $activeTab == 'contact' ? 'active' : '' }}" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Kuliner</a>
                                    
                                    <a class="nav-item nav-link {{ $activeTab == 'last' ? 'active' : '' }}" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Kerajinan</a>
                                </div>
                            </nav>
                            <!-- Search Box Start -->
                            <form method="GET" action="{{ url()->current() }}" class="form-inline mb-2 mt-3">
                                <input type="hidden" name="tab" value="{{ request('tab', 'home') }}">
                                <input type="text" name="search" class="form-control mr-2" placeholder="Cari produk..." value="{{ request('search') }}" style="min-width:180px;">
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
                            <!-- card ALL -->
                            <div class="tab-pane fade {{ $activeTab == 'home' ? 'show active' : '' }}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                                @php
                                    $search = strtolower(request()->get('search', ''));
                                    $products = [
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/set-meja-kursi.jpeg',
                                            'title' => 'Set meja bar kotak panjang (outdoor)',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/yogurt.jpeg',
                                            'title' => 'Yogurt drink with jelly',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/konveksi-jaket.jpeg',
                                            'title' => 'Jas hujan anti badai',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/pan-mixer.png',
                                            'title' => 'Pan Mixer',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/basreng-ikan-original.png',
                                            'title' => 'Basreng Ikan Original',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/es-dawet-IRENG.jpeg',
                                            'title' => 'Es dawet ireng',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/rak-plastik.png',
                                            'title' => 'Rak Plastik',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/kacang.jpeg',
                                            'title' => 'Camilan Kacang',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keju-kriwil.jpeg',
                                            'title' => 'Camilan keju kriwil',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/lemari-apron.png',
                                            'title' => 'Lemari apron',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/kentang-mustofa.jpeg',
                                            'title' => 'Camilan kentang mustofa',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/gerobak-sampah.png',
                                            'title' => 'Gerobak sampah',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keripik-pangsit.jpeg',
                                            'title' => 'Camilan keripik pangsit',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/proofer.png',
                                            'title' => 'Proofer',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keripik-pisang-coklat.png',
                                            'title' => 'Camilan keripik pisang',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/mixer.png',
                                            'title' => 'Mixer',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keripik-tempe-tigasaudara.jpeg',
                                            'title' => 'Camilan keripik tempe',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/loyang-brownies.png',
                                            'title' => 'Loyang brownies',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/kerupuk-rambak.jpg',
                                            'title' => 'Camilan kerupuk rambak',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/bracket-plat.png',
                                            'title' => 'Bracket plat nomor',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/onde-onde.jpg',
                                            'title' => 'Camilan onde-onde',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/bak-penampung.png',
                                            'title' => 'Bak penampung',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/sus-buah.jpeg',
                                            'title' => 'Camilan kue sus buah',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/trolley-makan.png',
                                            'title' => 'Troli Makan',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                    ];
                                    if ($search) {
                                        $products = array_filter($products, function($p) use ($search) {
                                            return strpos(strtolower($p['title']), $search) !== false
                                                || strpos(strtolower($p['desc']), $search) !== false;
                                        });
                                        $products = array_values($products); // reset index array
                                    }
                                    $perPage = 9;
                                    $page = request()->get('page', 1);
                                    $total = count($products);
                                    $totalPages = ceil($total / $perPage);
                                    $offset = ($page - 1) * $perPage;
                                    $productsToShow = array_slice($products, $offset, $perPage);
                                @endphp
                                <div class="project-caption">
                                    <div class="row">
                                        @if(count($productsToShow) == 0)
                                            <div class="col-12">
                                                <div class="alert alert-primary text-center" style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk yang Anda cari.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <a class="project-img product-preview"
                                                    href="javascript:void(0);"
                                                    data-img="{{ $product['img'] }}"
                                                    data-title="{{ $product['title'] }}"
                                                    data-desc="{{ $product['desc'] }}">
                                                    <img src="{{ $product['img'] }}" alt="">
                                                </a>
                                                <div class="project-cap">
                                                    <div class="marketplace-row">
                                                        <a href="https://www.tokopedia.com" class="plus-btn tokopedia-btn">
                                                            <img src="fe/img/icon/tokopedia.png" alt="Tokopedia" width="38" height="38">
                                                        </a>
                                                        <a href="https://www.shopee.com" class="plus-btn shopee-btn">
                                                            <img src="fe/img/icon/shopee.png" alt="Shopee" width="38" height="38">
                                                        </a>
                                                    </div>
                                                    <h4><a>{{ $product['title'] }}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <nav aria-label="Product pagination">
                                        <ul class="pagination">
                                            <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                                                <a class="page-link" href="?page={{ $page - 1 }}" tabindex="-1">Previous</a>
                                            </li>
                                            @for($i = 1; $i <= $totalPages; $i++)
                                                <li class="page-item {{ $page == $i ? 'active' : '' }}">
                                                    <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                                                <a class="page-link" href="?page={{ $page + 1 }}">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            
                            <!-- Card Manufaktur -->
                            <div class="tab-pane fade {{ $activeTab == 'profile' ? 'show active' : '' }}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                @php
                                    $search = strtolower(request()->get('search', ''));
                                    $products = [
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/set-meja-kursi.jpeg',
                                            'title' => 'Set meja bar kotak panjang (outdoor)',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                    ];
                                    if ($search) {
                                        $products = array_filter($products, function($p) use ($search) {
                                            return strpos(strtolower($p['title']), $search) !== false
                                                || strpos(strtolower($p['desc']), $search) !== false;
                                        });
                                        $products = array_values($products); // reset index array
                                    }
                                    $perPage = 9;
                                    $page = request()->get('page', 1);
                                    $total = count($products);
                                    $totalPages = ceil($total / $perPage);
                                    $offset = ($page - 1) * $perPage;
                                    $productsToShow = array_slice($products, $offset, $perPage);
                                @endphp
                                <div class="project-caption">
                                    <div class="row">
                                        @if(count($productsToShow) == 0)
                                            <div class="col-12">
                                                <div class="alert alert-primary text-center" style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk yang Anda cari.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <a class="project-img product-preview"
                                                    href="javascript:void(0);"
                                                    data-img="{{ $product['img'] }}"
                                                    data-title="{{ $product['title'] }}"
                                                    data-desc="{{ $product['desc'] }}">
                                                    <img src="{{ $product['img'] }}" alt="">
                                                </a>
                                                <div class="project-cap">
                                                    <div class="marketplace-row">
                                                        <a href="https://www.tokopedia.com" class="plus-btn tokopedia-btn">
                                                            <img src="fe/img/icon/tokopedia.png" alt="Tokopedia" width="38" height="38">
                                                        </a>
                                                        <a href="https://www.shopee.com" class="plus-btn shopee-btn">
                                                            <img src="fe/img/icon/shopee.png" alt="Shopee" width="38" height="38">
                                                        </a>
                                                    </div>
                                                    <h4><a>{{ $product['title'] }}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <nav aria-label="Product pagination">
                                        <ul class="pagination">
                                            <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                                                <a class="page-link" href="?page={{ $page - 1 }}" tabindex="-1">Previous</a>
                                            </li>
                                            @for($i = 1; $i <= $totalPages; $i++)
                                                <li class="page-item {{ $page == $i ? 'active' : '' }}">
                                                    <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                                                <a class="page-link" href="?page={{ $page + 1 }}">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <!-- Card Kuliner -->
                            <div class="tab-pane fade {{ $activeTab == 'contact' ? 'show active' : '' }}" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                @php
                                    $search = strtolower(request()->get('search', ''));
                                    $products = [
                                        [
                                            'img' => 'fe/img/gallery/kuliner/yogurt.jpeg',
                                            'title' => 'Yogurt drink with jelly',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                    ];
                                    if ($search) {
                                        $products = array_filter($products, function($p) use ($search) {
                                            return strpos(strtolower($p['title']), $search) !== false
                                                || strpos(strtolower($p['desc']), $search) !== false;
                                        });
                                        $products = array_values($products); // reset index array
                                    }
                                    $perPage = 9;
                                    $page = request()->get('page', 1);
                                    $total = count($products);
                                    $totalPages = ceil($total / $perPage);
                                    $offset = ($page - 1) * $perPage;
                                    $productsToShow = array_slice($products, $offset, $perPage);
                                @endphp
                                <div class="project-caption">
                                    <div class="row">
                                        @if(count($productsToShow) == 0)
                                            <div class="col-12">
                                                <div class="alert alert-primary text-center" style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk yang Anda cari.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <a class="project-img product-preview"
                                                    href="javascript:void(0);"
                                                    data-img="{{ $product['img'] }}"
                                                    data-title="{{ $product['title'] }}"
                                                    data-desc="{{ $product['desc'] }}">
                                                    <img src="{{ $product['img'] }}" alt="">
                                                </a>
                                                <div class="project-cap">
                                                    <div class="marketplace-row">
                                                        <a href="https://www.tokopedia.com" class="plus-btn tokopedia-btn">
                                                            <img src="fe/img/icon/tokopedia.png" alt="Tokopedia" width="38" height="38">
                                                        </a>
                                                        <a href="https://www.shopee.com" class="plus-btn shopee-btn">
                                                            <img src="fe/img/icon/shopee.png" alt="Shopee" width="38" height="38">
                                                        </a>
                                                    </div>
                                                    <h4><a>{{ $product['title'] }}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <nav aria-label="Product pagination">
                                        <ul class="pagination">
                                            <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                                                <a class="page-link" href="?page={{ $page - 1 }}" tabindex="-1">Previous</a>
                                            </li>
                                            @for($i = 1; $i <= $totalPages; $i++)
                                                <li class="page-item {{ $page == $i ? 'active' : '' }}">
                                                    <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                                                <a class="page-link" href="?page={{ $page + 1 }}">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <!-- card Kerajinan -->
                            <div class="tab-pane fade {{ $activeTab == 'last' ? 'show active' : '' }}" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                @php
                                    $search = strtolower(request()->get('search', ''));
                                    $products = [
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/konveksi-jaket.jpeg',
                                            'title' => 'Jas hujan anti badai',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                        ],
                                    ];
                                    if ($search) {
                                        $products = array_filter($products, function($p) use ($search) {
                                            return strpos(strtolower($p['title']), $search) !== false
                                                || strpos(strtolower($p['desc']), $search) !== false;
                                        });
                                        $products = array_values($products); // reset index array
                                    }
                                    $perPage = 9;
                                    $page = request()->get('page', 1);
                                    $total = count($products);
                                    $totalPages = ceil($total / $perPage);
                                    $offset = ($page - 1) * $perPage;
                                    $productsToShow = array_slice($products, $offset, $perPage);
                                @endphp
                                <div class="project-caption">
                                    <div class="row">
                                        @if(count($productsToShow) == 0)
                                            <div class="col-12">
                                                <div class="alert alert-primary text-center" style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk yang Anda cari.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <a class="project-img product-preview"
                                                    href="javascript:void(0);"
                                                    data-img="{{ $product['img'] }}"
                                                    data-title="{{ $product['title'] }}"
                                                    data-desc="{{ $product['desc'] }}">
                                                    <img src="{{ $product['img'] }}" alt="">
                                                </a>
                                                <div class="project-cap">
                                                    <div class="marketplace-row">
                                                        <a href="https://www.tokopedia.com" class="plus-btn tokopedia-btn">
                                                            <img src="fe/img/icon/tokopedia.png" alt="Tokopedia" width="38" height="38">
                                                        </a>
                                                        <a href="https://www.shopee.com" class="plus-btn shopee-btn">
                                                            <img src="fe/img/icon/shopee.png" alt="Shopee" width="38" height="38">
                                                        </a>
                                                    </div>
                                                    <h4><a>{{ $product['title'] }}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <nav aria-label="Product pagination">
                                        <ul class="pagination">
                                            <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                                                <a class="page-link" href="?page={{ $page - 1 }}" tabindex="-1">Previous</a>
                                            </li>
                                            @for($i = 1; $i <= $totalPages; $i++)
                                                <li class="page-item {{ $page == $i ? 'active' : '' }}">
                                                    <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                                                <a class="page-link" href="?page={{ $page + 1 }}">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End Nav Card -->
                </div>
            </div>
        </div>
    </section>
    <script>
        // Reset page ke 1 dan search ke kosong saat pindah tab produk
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.nav-tabs .nav-link').forEach(function(tab) {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    var tabId = this.getAttribute('href').replace('#nav-', '');
                    var url = new URL(window.location.href);
                    url.searchParams.set('tab', tabId);
                    url.searchParams.delete('page'); // reset page ke 1
                    url.searchParams.delete('search'); // reset search
                    window.location.href = url.pathname + url.search;
                });
            });
        });
    </script>
    <!-- Product Area End -->

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
    @endsection
@section('client')
    @include('layout.client')
@endsection