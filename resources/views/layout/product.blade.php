<!-- Product Area Start -->
<section class="project-area section-padding-30">
    <div class="container">
        <div class="project-heading mb-35">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle3">
                        <div class="front-text">
                            <h2 class="">Produk Kami</h2>
                        </div>
                        <span class="back-text"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <!-- Nav Card -->
                <div class="product-img-bg mb-30">
                    <div class="tab-content active" id="nav-tabContent">
                        <!-- card ALL -->
                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="project-caption">
                                <div class="row product-row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="single-project mb-30">
                                            <a class="project-img product-preview" href="javascript:void(0);" data-img="{{ asset('fe/img/gallery/kuliner/yogurt.png') }}" data-title="Yogurt drink with jelly" data-desc="Minuman sehat dengan jelly.">
                                                <img src="{{ asset('fe/img/gallery/kuliner/yogurt.png') }}" alt="">
                                            </a>
                                            <div class="project-cap">
                                                <div class="marketplace-row">
                                                    <a href="https://wa.me/6282189327077" class="plus-btn tokopedia-btn">
                                                        <img src="{{ asset('fe/img/icon/whatsapp-putih.png') }}" alt="WhatsApp" width="38" height="38">
                                                    </a>
                                                </div>
                                                <h4><a>Yogurt drink with jelly</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="single-project mb-30">
                                            <a class="project-img product-preview"
                                                href="javascript:void(0);"
                                                data-img="{{ asset('fe/img/gallery/manufaktur/set-meja-kotak.jpeg') }}"
                                                data-title="Set meja bar kotak panjang (outdoor)"
                                                data-desc="Set meja bar kotak panjang — meja kuat untuk area bar/café dengan finishing tahan cuaca.">
                                                <img src="{{ asset('fe/img/gallery/manufaktur/set-meja-kotak.jpeg') }}" alt="">
                                            </a>
                                            <div class="project-cap">
                                                <div class="marketplace-row">
                                                    <a href="https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-bar-kotak-panjang-outdoor-1-meja-4-kursi-wallnut-brown-f063f?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key=" target="_blank" class="plus-btn tokopedia-btn">
                                                        <img src="{{ asset('fe/img/icon/tokopedia-putih.png') }}" alt="Tokopedia" width="38" height="38">
                                                    </a>
                                                    <a href="https://shopee.co.id/1-Set-Meja-Bar-Kotak-Panjang-Outdoor-1-Meja-4-Kursi-i.1396487386.26723564178" target="_blank" class="plus-btn shopee-btn">
                                                        <img src="{{ asset('fe/img/icon/shopee-putih.png') }}" alt="Shopee" width="38" height="38">
                                                    </a>
                                                </div>
                                                <h4><a>Set meja bar kotak panjang</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="single-project mb-30">
                                            <a class="project-img product-preview" href="javascript:void(0);" data-img="{{ asset('fe/img/gallery/kerajinan/jas-hujan.png') }}" data-title="Produk kerajinan jas hujan" data-desc="Jas hujan kerajinan — jas hujan praktis dengan jahitan rapi, ideal untuk kegiatan di luar ruangan.">
                                                <img src="{{ asset('fe/img/gallery/kerajinan/jas-hujan.png') }}" alt="">
                                            </a>
                                            <div class="project-cap">
                                                <div class="marketplace-row">
                                                    <a href="https://wa.me/6282189327077" class="plus-btn tokopedia-btn">
                                                        <img src="{{ asset('fe/img/icon/whatsapp-putih.png') }}" alt="WhatsApp" width="38" height="38">
                                                    </a>
                                                </div>
                                                <h4><a>Produk kerajinan jas hujan</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/product" class="btn red-btn2 mt-20" style="">Lebih Banyak</a>
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
