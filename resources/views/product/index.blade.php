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
                            <span class="back-text">Gellary</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="properties__button">
                            <!--Nav Button  -->                                            
                            <nav> 
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false"> Show  all </a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Manufaktur</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Kuliner</a>
                                    <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Kerajinan</a>
                                    {{-- <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Park</a> --}}
                                </div>
                            </nav>
                            <!--End Nav Button  -->
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
                            <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                                <div class="project-caption">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <a class="project-img product-preview"
                                                    href="javascript:void(0);"
                                                    data-img="fe/img/gallery/set-meja-kursi.jpeg"
                                                    data-title="Set meja bar kotak panjang"
                                                    data-desc="Produk furniture berkualitas untuk cafe dan rumah.">
                                                    <img src="fe/img/gallery/set-meja-kursi.jpeg" alt="">
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
                                                    <h4><a>Set meja bar kotak panjang (outdoor)</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <a class="project-img product-preview" href="javascript:void(0);" data-img="fe/img/gallery/yogurt.jpeg" data-title="Set meja bar kotak panjang" data-desc="Produk furniture berkualitas untuk cafe dan rumah.">
                                                    <img src="fe/img/gallery/yogurt.jpeg" alt="">
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
                                                    <h4><a>Yogurt drink with jelly</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <a class="project-img product-preview" href="javascript:void(0);" data-img="fe/img/gallery/konveksi-jaket.jpeg" data-title="Set meja bar kotak panjang" data-desc="Produk furniture berkualitas untuk cafe dan rumah.">
                                                    <img src="fe/img/gallery/konveksi-jaket.jpeg" alt="">
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
                                                    <h4><a>Jas hujan anti badai</a></h4>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Card Manufaktur -->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="project-caption">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <a class="project-img product-preview" href="javascript:void(0);" data-img="fe/img/gallery/set-meja-kursi.jpeg" data-title="Set meja bar kotak panjang" data-desc="Produk furniture berkualitas untuk cafe dan rumah.">
                                                    <img src="fe/img/gallery/set-meja-kursi.jpeg" alt="">
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
                                                    <h4><a>Set meja bar kotak panjang (outdoor) </a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Kuliner -->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="project-caption">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <a class="project-img product-preview" href="javascript:void(0);" data-img="fe/img/gallery/set-meja-kursiyogurtpanjang" data-desc="Produk furniture berkualitas untuk cafe dan rumah.">
                                                    <img src="fe/img/gallery/yogurt.jpeg" alt="">
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
                                                    <h4><a>Yogurt drink with jelly</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card Kerajinan -->
                            <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                <div class="project-caption">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <a class="project-img product-preview" href="javascript:void(0);" data-img="fe/img/gallery/konveksi-jaket.jpeg" data-title="Set meja bar kotak panjang" data-desc="Produk furniture berkualitas untuk cafe dan rumah.">
                                                    <img src="fe/img/gallery/konveksi-jaket.jpeg" alt="">
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
                                                    <h4><a>Jas hujan anti badai</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="/product" class="btn red-btn2 mt-20" style="align-items: center">read more</a>
                        </div>
                    </div>
                <!-- End Nav Card -->
                </div>
            </div>
        </div>
    </section>
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