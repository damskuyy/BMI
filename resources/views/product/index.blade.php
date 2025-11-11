@extends('layout.master')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center mb-200"
            data-background="fe/img/hero/produk.png">
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
                                        aria-controls="nav-contact" aria-selected="false">Kuliner</a>

                                    <a class="nav-item nav-link {{ $activeTab == 'last' ? 'active' : '' }}"
                                        id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab"
                                        aria-controls="nav-contact" aria-selected="false">Kerajinan</a>
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
                            <!-- card ALL -->
                            <div class="tab-pane fade {{ $activeTab == 'home' ? 'show active' : '' }}" id="nav-home"
                                role="tabpanel" aria-labelledby="nav-home-tab">
                                @php
                                    $search = strtolower(request()->get('search', ''));
                                    $products = [
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/set-meja-kotak.jpeg',
                                            'title' => 'Set meja bar kotak panjang',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-bar-kotak-panjang-outdoor-1-meja-4-kursi-wallnut-brown-f063f?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/1-Set-Meja-Bar-Kotak-Panjang-Outdoor-1-Meja-4-Kursi-i.1396487386.26723564178'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/yogurt.png',
                                            'title' => 'Yogurt drink with jelly',
                                            'desc' => 'Minuman sehat dengan jelly.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077?text=Halo%20saya%20mau%20pesan%20Yogurt%20drink%20with%20jelly'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/es-dawet-IRENG.png',
                                            'title' => 'Es dawet ireng',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/pan-mixer.png',
                                            'title' => 'Pan Mixer',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/pan-mixer-mesin-produksi-pengaduk-material-beton-kuning-34564?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Pan-Mixer-Mesin-Produksi-Pengaduk-Material-Beton-i.1396487386.28423565178'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/basreng-ikan-original.png',
                                            'title' => 'Basreng Ikan Original',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/jas-hujan.png',
                                            'title' => 'Kerajinan jas hujan',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/rak-plastik.png',
                                            'title' => 'Rak Plastik',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/kacang.png',
                                            'title' => 'Camilan Kacang',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/proofer.png',
                                            'title' => 'Proofer',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/lemari-apron.png',
                                            'title' => 'Lemari apron',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/lemari-apron-lemari-penyimpanan-baju-apron-lemari-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Lemari-Apron-Lemari-Penyimpanan-Baju-Apron-Lemari-Rumah-Sakit-i.1396487386.29073581426'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keripik-pisang-coklat.png',
                                            'title' => 'Camilan keripik pisang',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/gerobak-sampah.png',
                                            'title' => 'Gerobak sampah',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keripik-pangsit.png',
                                            'title' => 'Camilan keripik pangsit',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keju-kriwil.png',
                                            'title' => 'Camilan keju kriwil',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/kentang-mustofa.png',
                                            'title' => 'Camilan kentang mustofa',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/mixer.png',
                                            'title' => 'Mixer',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keripik-tempe-tigasaudara.png',
                                            'title' => 'Camilan keripik tempe',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/loyang-brownies.png',
                                            'title' => 'Loyang brownies',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-brownies-30x10x4-cm-cetakan-brownies?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Loyang-Brownies-30x10x4-cm-Cetakan-Brownies-i.1396487386.24640500063'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/kerupuk-rambak.png',
                                            'title' => 'Camilan kerupuk rambak',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/bracket-plat.png',
                                            'title' => 'Bracket plat nomor',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/trolley-makan.png',
                                            'title' => 'Troli Makan',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/trolley-makan-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/BMI-Trolley-Makanan-Stainless-Steel-Trolley-Makan-Rumah-Sakit-i.1396487386.27523575751'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/bak-penampung.png',
                                            'title' => 'Bak penampung Makanan',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/bak-penampung-olahan-makanan-bak-penampung-keripik-matang-mesin-pelengkap-produksi?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Bak-Penampung-Olahan-Makanan-Bak-Penampung-Keripik-Matang-Mesin-Pelengkap-Produksi-i.1396487386.26473570115'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/sus-buah.png',
                                            'title' => 'Camilan kue sus buah',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/onde-onde.png',
                                            'title' => 'Camilan onde-onde',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/ajuster-baud.png',
                                            'title' => 'Ajuster baud',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/bracket-spakbor.png',
                                            'title' => 'Bracket spakbor motor',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/ladder-hanger.jpeg',
                                            'title' => 'Ladder hanger',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/ladder-hanger-gantungan-handuk-gantungan-mukena-estetik-unik-wallnut-brown-fa899?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Ladder-Hanger-Gantungan-Handuk-Gantungan-Mukena-Estetik-Unik-i.1396487386.29768280433'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/meja-kerja.png',
                                            'title' => 'Meja kerja stainless',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/meja-kerja-stainless-steel-meja-kerja-pabrik-1730631299889792956?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Meja-Kerja-Stainless-Steel-Meja-Kerja-Pabrik-i.1396487386.29725918173'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/j-ring.png',
                                            'title' => 'J-Ring',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/j-ring-test-12-16-bar-alat-uji-lab-beton-alat-uji-laboratorium-teknik-sipil-j-ring-12-bar-b06e0?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/J-Ring-Test-12-16-Bar-Alat-Uji-Lab-Beton-Alat-Uji-Laboratorium-Teknik-Sipil-i.1396487386.28773565575'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/oven-gas.png',
                                            'title' => 'Oven gas',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/plat-kumis.png',
                                            'title' => 'Plat kumis motor',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/put-kelem.png',
                                            'title' => 'Put kelem',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/set-meja-bulat.jpeg',
                                            'title' => 'Set meja bulat',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-bulat-cafe-semi-outdoor-1-meja-2-kursi-wallnut-brown-2377b?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/1-Set-Meja-Bulat-Cafe-Semi-Outdoor-1-Meja-2-Kursi-i.1396487386.29573559438'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/set-meja-makan.jpeg',
                                            'title' => 'Set meja makan',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-makan-kotak-hpl-1-meja-4-kursi-wallnut-brown-c3041?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/1-Set-Meja-Makan-Kotak-HPL-1-Meja-4-Kursi-i.1396487386.26273564118'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/set-meja-kursi.jpg',
                                            'title' => 'Set meja kotak (Semi outdoor)',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-kursi-kotak-cafe-furniture-semi-outdoor-1-meja-2-kursi-wallnut-brown-066c9?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/1-Set-Meja-Kursi-Kotak-Cafe-Furniture-Semi-Outdoor-1-Meja-2-Kursi-i.1396487386.29018277776'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/standar-casset.png',
                                            'title' => 'Standar casset',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/standar-casset-rontgen-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Standar-Casset-Rontgen-Rumah-Sakit-i.1396487386.27923567040'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/standing-astray.png',
                                            'title' => 'Standing astray',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/tank-farm.png',
                                            'title' => 'Tank farm',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/tutup-hollow.png',
                                            'title' => 'Tutup hollow',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/tutup-pipa.png',
                                            'title' => 'Tutup pipa',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/viewer-single.png',
                                            'title' => 'Viewer single',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/standar-casset-rontgen-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Alat-Viewer-Rontgen-Single-atau-Double-Alat-Kesehatan-Rumah-Sakit-i.1396487386.26026010816'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/loyang-chifon.png',
                                            'title' => 'Loyang chifon',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-chifon-bongkar-pasang-20x10x15-cm-cetakan-chifon-bongkar-pasang?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Loyang-Chifon-Bongkar-Pasang-20x10x15-cm-Cetakan-Chifon-Bongkar-Pasang-i.1396487386.29673566174'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/loyang-lidah-kucing.png',
                                            'title' => 'Loyang lidah kucing',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-lidah-kucing-18-lubang-24x22x1-5-cm-cetakan-lidah-kucing?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Loyang-Lidah-Kucing-18-Lubang-24x22x1-5-cm-Cetakan-Lidah-Kucing-i.1396487386.27523580428'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/loyang-roti-sisir.png',
                                            'title' => 'Loyang roti sisir',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-roti-sisir-20x12x5-cm-cetakan-roti-sisir?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Loyang-Roti-Sisir-20x12x5-cm-Cetakan-Roti-Sisir-i.1396487386.28923570278'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/loyang-roti-tawar.png',
                                            'title' => 'Loyang roti tawar',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-roti-tawar-bandung-gerigi-22x10x8-cm-cetakan-roti-tawar-bandung?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Loyang-Roti-Tawar-Bandung-Gerigi-22x10x8-cm-Cetakan-Roti-Tawar-Bandung-i.1396487386.26573575319'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/visor-servo.png',
                                            'title' => 'Visor servo',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/jahe-merah-bubuk.jpg',
                                            'title' => 'Jahe merah bubuk',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/ganci-pesawat.jpg',
                                            'title' => 'Gantungan kunci pesawat',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/jaket-konveksi.png',
                                            'title' => 'Jaket konveksi',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/kendi-rajut.jpg',
                                            'title' => 'Kerajinan kendi rajut',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/tempat-rajut.jpg',
                                            'title' => 'Kerajinan tempat rajut',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/topi-rajut.jpg',
                                            'title' => 'Kerajinan topi rajut',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/vas-bunga-rajut.jpg',
                                            'title' => 'Kerajinan vas bunga rajut',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                    ];
                                    if ($search) {
                                        $products = array_filter($products, function ($p) use ($search) {
                                            return strpos(strtolower($p['title']), $search) !== false
                                                || strpos(strtolower($p['desc']), $search) !== false;
                                        });
                                        $products = array_values($products); // reset index array
                                    }
                                    $isMobile = isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $_SERVER['HTTP_USER_AGENT']);
                                    $perPage = $isMobile ? 8 : 9;
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
                                                <div class="alert alert-primary text-center"
                                                    style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk yang Anda cari.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                            @php
                                                $marketplaces = $product['marketplaces'] ?? [];
                                            @endphp
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single-project mb-30">
                                                    <a class="project-img product-preview" href="javascript:void(0);"
                                                        data-img="{{ $product['img'] }}" data-title="{{ $product['title'] }}"
                                                        data-desc="{{ $product['desc'] }}">
                                                        <img src="{{ $product['img'] }}" alt="">
                                                    </a>
                                                    <div class="project-cap">
                                                        <div class="marketplace-row">
                                                            @foreach($marketplaces as $market)
                                                                @if($market['type'] == 'tokopedia')
                                                                    <a href="{{ $market['url'] }}" class="plus-btn tokopedia-btn"
                                                                        target="_blank">
                                                                        <img src="fe/img/icon/tokopedia-putih.png" alt="Tokopedia"
                                                                            width="32" height="32">
                                                                    </a>
                                                                @elseif($market['type'] == 'shopee')
                                                                    <a href="{{ $market['url'] }}" class="plus-btn shopee-btn"
                                                                        target="_blank">
                                                                        <img src="fe/img/icon/shopee-putih.png" alt="Shopee" width="32"
                                                                            height="32">
                                                                    </a>
                                                                @elseif($market['type'] == 'whatsapp')
                                                                    <a href="{{ $market['url'] }}" class="plus-btn whatsapp-btn"
                                                                        target="_blank">
                                                                        <img src="fe/img/icon/whatsapp-putih.png" alt="WhatsApp"
                                                                            width="38" height="38">
                                                                    </a>
                                                                @endif
                                                            @endforeach
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
                                                <a class="page-link" href="?page={{ $page - 1 }}#product-section">Previous</a>
                                            </li>
                                            @php
                                                $maxShow = 4;
                                                $start = max(1, min($page - 1, $totalPages - $maxShow + 1));
                                                $end = min($totalPages, $start + $maxShow - 1);
                                            @endphp
                                            @for($i = $start; $i <= $end; $i++)
                                                <li class="page-item {{ $page == $i ? 'active' : '' }}">
                                                    <a class="page-link" href="?page={{ $i }}#product-section">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                                                <a class="page-link" href="?page={{ $page + 1 }}#product-section">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <!-- Card Manufaktur -->
                            <div class="tab-pane fade {{ $activeTab == 'profile' ? 'show active' : '' }}" id="nav-profile"
                                role="tabpanel" aria-labelledby="nav-profile-tab">
                                @php
                                    $search = strtolower(request()->get('search', ''));
                                    $products = [
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/set-meja-kotak.jpeg',
                                            'title' => 'Set meja bar kotak panjang',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-bar-kotak-panjang-outdoor-1-meja-4-kursi-wallnut-brown-f063f?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/1-Set-Meja-Bar-Kotak-Panjang-Outdoor-1-Meja-4-Kursi-i.1396487386.26723564178'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/pan-mixer.png',
                                            'title' => 'Pan Mixer',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/pan-mixer-mesin-produksi-pengaduk-material-beton-kuning-34564?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Pan-Mixer-Mesin-Produksi-Pengaduk-Material-Beton-i.1396487386.28423565178'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/rak-plastik.png',
                                            'title' => 'Rak Plastik',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/proofer.png',
                                            'title' => 'Proofer',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/lemari-apron.png',
                                            'title' => 'Lemari apron',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/lemari-apron-lemari-penyimpanan-baju-apron-lemari-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Lemari-Apron-Lemari-Penyimpanan-Baju-Apron-Lemari-Rumah-Sakit-i.1396487386.29073581426'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/gerobak-sampah.png',
                                            'title' => 'Gerobak sampah',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/mixer.png',
                                            'title' => 'Mixer',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/loyang-brownies.png',
                                            'title' => 'Loyang brownies',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-brownies-30x10x4-cm-cetakan-brownies?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Loyang-Brownies-30x10x4-cm-Cetakan-Brownies-i.1396487386.24640500063'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/bracket-plat.png',
                                            'title' => 'Bracket plat nomor',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/trolley-makan.png',
                                            'title' => 'Troli Makan',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/trolley-makan-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/BMI-Trolley-Makanan-Stainless-Steel-Trolley-Makan-Rumah-Sakit-i.1396487386.27523575751'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/bak-penampung.png',
                                            'title' => 'Bak penampung Makanan',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/bak-penampung-olahan-makanan-bak-penampung-keripik-matang-mesin-pelengkap-produksi?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Bak-Penampung-Olahan-Makanan-Bak-Penampung-Keripik-Matang-Mesin-Pelengkap-Produksi-i.1396487386.26473570115'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/ajuster-baud.png',
                                            'title' => 'Ajuster baud',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/bracket-spakbor.png',
                                            'title' => 'Bracket spakbor motor',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/ladder-hanger.jpeg',
                                            'title' => 'Ladder hanger',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/ladder-hanger-gantungan-handuk-gantungan-mukena-estetik-unik-wallnut-brown-fa899?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Ladder-Hanger-Gantungan-Handuk-Gantungan-Mukena-Estetik-Unik-i.1396487386.29768280433'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/meja-kerja.png',
                                            'title' => 'Meja kerja stainless',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/meja-kerja-stainless-steel-meja-kerja-pabrik-1730631299889792956?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Meja-Kerja-Stainless-Steel-Meja-Kerja-Pabrik-i.1396487386.29725918173'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/j-ring.png',
                                            'title' => 'J-Ring',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/j-ring-test-12-16-bar-alat-uji-lab-beton-alat-uji-laboratorium-teknik-sipil-j-ring-12-bar-b06e0?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/J-Ring-Test-12-16-Bar-Alat-Uji-Lab-Beton-Alat-Uji-Laboratorium-Teknik-Sipil-i.1396487386.28773565575'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/oven-gas.png',
                                            'title' => 'Oven gas',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/plat-kumis.png',
                                            'title' => 'Plat kumis motor',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/put-kelem.png',
                                            'title' => 'Put kelem',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/set-meja-bulat.jpeg',
                                            'title' => 'Set meja bulat',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-bulat-cafe-semi-outdoor-1-meja-2-kursi-wallnut-brown-2377b?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/1-Set-Meja-Bulat-Cafe-Semi-Outdoor-1-Meja-2-Kursi-i.1396487386.29573559438'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/set-meja-makan.jpeg',
                                            'title' => 'Set meja makan',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-makan-kotak-hpl-1-meja-4-kursi-wallnut-brown-c3041?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/1-Set-Meja-Makan-Kotak-HPL-1-Meja-4-Kursi-i.1396487386.26273564118'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/set-meja-kursi.jpg',
                                            'title' => 'Set meja kotak (Semi outdoor)',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-kursi-kotak-cafe-furniture-semi-outdoor-1-meja-2-kursi-wallnut-brown-066c9?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/1-Set-Meja-Kursi-Kotak-Cafe-Furniture-Semi-Outdoor-1-Meja-2-Kursi-i.1396487386.29018277776'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/standar-casset.png',
                                            'title' => 'Standar casset',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/standar-casset-rontgen-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Standar-Casset-Rontgen-Rumah-Sakit-i.1396487386.27923567040'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/standing-astray.png',
                                            'title' => 'Standing astray',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/tank-farm.png',
                                            'title' => 'Tank farm',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/tutup-hollow.png',
                                            'title' => 'Tutup hollow',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/tutup-pipa.png',
                                            'title' => 'Tutup pipa',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/viewer-single.png',
                                            'title' => 'Viewer single',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/standar-casset-rontgen-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Alat-Viewer-Rontgen-Single-atau-Double-Alat-Kesehatan-Rumah-Sakit-i.1396487386.26026010816'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/loyang-chifon.png',
                                            'title' => 'Loyang chifon',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-chifon-bongkar-pasang-20x10x15-cm-cetakan-chifon-bongkar-pasang?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Loyang-Chifon-Bongkar-Pasang-20x10x15-cm-Cetakan-Chifon-Bongkar-Pasang-i.1396487386.29673566174'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/loyang-lidah-kucing.png',
                                            'title' => 'Loyang lidah kucing',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-lidah-kucing-18-lubang-24x22x1-5-cm-cetakan-lidah-kucing?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Loyang-Lidah-Kucing-18-Lubang-24x22x1-5-cm-Cetakan-Lidah-Kucing-i.1396487386.27523580428'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/loyang-roti-sisir.png',
                                            'title' => 'Loyang roti sisir',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-roti-sisir-20x12x5-cm-cetakan-roti-sisir?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Loyang-Roti-Sisir-20x12x5-cm-Cetakan-Roti-Sisir-i.1396487386.28923570278'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/loyang-roti-tawar.png',
                                            'title' => 'Loyang roti tawar',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'tokopedia',
                                                    'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-roti-tawar-bandung-gerigi-22x10x8-cm-cetakan-roti-tawar-bandung?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='
                                                ],
                                                [
                                                    'type' => 'shopee',
                                                    'url' => 'https://shopee.co.id/Loyang-Roti-Tawar-Bandung-Gerigi-22x10x8-cm-Cetakan-Roti-Tawar-Bandung-i.1396487386.26573575319'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/manufaktur/visor-servo.png',
                                            'title' => 'Visor servo',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                    ];
                                    if ($search) {
                                        $products = array_filter($products, function ($p) use ($search) {
                                            return strpos(strtolower($p['title']), $search) !== false
                                                || strpos(strtolower($p['desc']), $search) !== false;
                                        });
                                        $products = array_values($products); // reset index array
                                    }
                                    $isMobile = isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $_SERVER['HTTP_USER_AGENT']);
                                    $perPage = $isMobile ? 8 : 9;
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
                                                <div class="alert alert-primary text-center"
                                                    style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk yang Anda cari.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                            @php
                                                $marketplaces = $product['marketplaces'] ?? [];
                                            @endphp
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single-project mb-30">
                                                    <a class="project-img product-preview" href="javascript:void(0);"
                                                        data-img="{{ $product['img'] }}" data-title="{{ $product['title'] }}"
                                                        data-desc="{{ $product['desc'] }}">
                                                        <img src="{{ $product['img'] }}" alt="">
                                                    </a>
                                                    <div class="project-cap">
                                                        <div class="marketplace-row">
                                                            @foreach($marketplaces as $market)
                                                                @if($market['type'] == 'tokopedia')
                                                                    <a href="{{ $market['url'] }}" class="plus-btn tokopedia-btn"
                                                                        target="_blank">
                                                                        <img src="fe/img/icon/tokopedia-putih.png" alt="Tokopedia"
                                                                            width="32" height="32">
                                                                    </a>
                                                                @elseif($market['type'] == 'shopee')
                                                                    <a href="{{ $market['url'] }}" class="plus-btn shopee-btn"
                                                                        target="_blank">
                                                                        <img src="fe/img/icon/shopee-putih.png" alt="Shopee" width="32"
                                                                            height="32">
                                                                    </a>
                                                                @elseif($market['type'] == 'whatsapp')
                                                                    <a href="{{ $market['url'] }}" class="plus-btn whatsapp-btn"
                                                                        target="_blank">
                                                                        <img src="fe/img/icon/whatsapp-putih.png" alt="WhatsApp"
                                                                            width="38" height="38">
                                                                    </a>
                                                                @endif
                                                            @endforeach
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
                                            @php
                                                $baseParams = request()->except('page');
                                                $prevPage = max(1, $page - 1);
                                                $nextPage = min($totalPages, $page + 1);
                                            @endphp

                                            <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                                                <a class="page-link"
                                                    href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => $prevPage])) }}#product-section">Previous</a>
                                            </li>

                                            @for($i = $start; $i <= $end; $i++)
                                                <li class="page-item {{ $page == $i ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => $i])) }}#product-section">{{ $i }}</a>
                                                </li>
                                            @endfor

                                            <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                                                <a class="page-link"
                                                    href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => $nextPage])) }}#product-section">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <!-- Card Kuliner -->
                            <div class="tab-pane fade {{ $activeTab == 'contact' ? 'show active' : '' }}" id="nav-contact"
                                role="tabpanel" aria-labelledby="nav-contact-tab">
                                @php
                                    $search = strtolower(request()->get('search', ''));
                                    $products = [
                                        [
                                            'img' => 'fe/img/gallery/kuliner/yogurt.png',
                                            'title' => 'Yogurt drink with jelly',
                                            'desc' => 'Minuman sehat dengan jelly.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077?text=Halo%20saya%20mau%20pesan%20Yogurt%20drink%20with%20jelly'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/es-dawet-IRENG.png',
                                            'title' => 'Es dawet ireng',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/basreng-ikan-original.png',
                                            'title' => 'Basreng Ikan Original',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/kacang.png',
                                            'title' => 'Camilan Kacang',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keripik-pisang-coklat.png',
                                            'title' => 'Camilan keripik pisang',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keripik-pangsit.png',
                                            'title' => 'Camilan keripik pangsit',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keju-kriwil.png',
                                            'title' => 'Camilan keju kriwil',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/kentang-mustofa.png',
                                            'title' => 'Camilan kentang mustofa',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/keripik-tempe-tigasaudara.png',
                                            'title' => 'Camilan keripik tempe',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/kerupuk-rambak.png',
                                            'title' => 'Camilan kerupuk rambak',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/sus-buah.png',
                                            'title' => 'Camilan kue sus buah',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/onde-onde.png',
                                            'title' => 'Camilan onde-onde',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kuliner/jahe-merah-bubuk.jpg',
                                            'title' => 'Jahe merah bubuk',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                    ];
                                    if ($search) {
                                        $products = array_filter($products, function ($p) use ($search) {
                                            return strpos(strtolower($p['title']), $search) !== false
                                                || strpos(strtolower($p['desc']), $search) !== false;
                                        });
                                        $products = array_values($products); // reset index array
                                    }
                                    $isMobile = isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $_SERVER['HTTP_USER_AGENT']);
                                    $perPage = $isMobile ? 8 : 9;
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
                                                <div class="alert alert-primary text-center"
                                                    style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk yang Anda cari.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single-project mb-30">
                                                    <a class="project-img product-preview" href="javascript:void(0);"
                                                        data-img="{{ $product['img'] }}" data-title="{{ $product['title'] }}"
                                                        data-desc="{{ $product['desc'] }}">
                                                        <img src="{{ $product['img'] }}" alt="">
                                                    </a>
                                                    <div class="project-cap">
                                                        <div class="marketplace-row">
                                                            <a href="https://wa.me/6282189327077" class="plus-btn whatsapp-btn"
                                                                target="_blank">
                                                                <img src="fe/img/icon/whatsapp-putih.png" alt="WhatsApp"
                                                                    width="28" height="28">
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
                                            @php
                                                // hitung ulang paging untuk tab ini
                                                $isMobile = isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $_SERVER['HTTP_USER_AGENT']);
                                                $perPage = $isMobile ? 8 : 9;
                                                $page = max(1, (int) request()->get('page', 1));
                                                $total = isset($total) ? $total : 0; // pastikan $total berisi jumlah produk untuk TAB saat ini
                                                $totalPages = max(1, (int) ceil($total / max(1, $perPage)));
                                                // window pagination (maksimal tombol tampil)
                                                $maxShow = 4;
                                                $half = (int) floor($maxShow / 2);
                                                $start = max(1, min($page - $half, max(1, $totalPages - $maxShow + 1)));
                                                $end = min($totalPages, $start + $maxShow - 1);

                                                $baseParams = request()->except('page'); // menyertakan tab/search otomatis
                                                $prevPage = max(1, $page - 1);
                                                $nextPage = min($totalPages, $page + 1);
                                            @endphp

                                            <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                                                <a class="page-link"
                                                    href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => $prevPage])) }}">Previous</a>
                                            </li>

                                            @for($i = $start; $i <= $end; $i++)
                                                <li class="page-item {{ $page == $i ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => $i])) }}">{{ $i }}</a>
                                                </li>
                                            @endfor

                                            <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                                                <a class="page-link"
                                                    href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => $nextPage])) }}">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <!-- card Kerajinan -->
                            <div class="tab-pane fade {{ $activeTab == 'last' ? 'show active' : '' }}" id="nav-last"
                                role="tabpanel" aria-labelledby="nav-last-tab">
                                @php
                                    $search = strtolower(request()->get('search', ''));
                                    $products = [
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/jas-hujan.png',
                                            'title' => 'Kerajinan jas hujan',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/ganci-pesawat.jpg',
                                            'title' => 'Gantungan kunci pesawat',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/jaket-konveksi.png',
                                            'title' => 'Jaket konveksi',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/kendi-rajut.jpg',
                                            'title' => 'Kerajinan kendi rajut',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/tempat-rajut.jpg',
                                            'title' => 'Kerajinan tempat rajut',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/topi-rajut.jpg',
                                            'title' => 'Kerajinan topi rajut',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                        [
                                            'img' => 'fe/img/gallery/kerajinan/vas-bunga-rajut.jpg',
                                            'title' => 'Kerajinan vas bunga rajut',
                                            'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                                            'marketplaces' => [
                                                [
                                                    'type' => 'whatsapp',
                                                    'url' => 'https://wa.me/6282189327077'
                                                ]
                                            ]
                                        ],
                                    ];
                                    if ($search) {
                                        $products = array_filter($products, function ($p) use ($search) {
                                            return strpos(strtolower($p['title']), $search) !== false
                                                || strpos(strtolower($p['desc']), $search) !== false;
                                        });
                                        $products = array_values($products); // reset index array
                                    }
                                    $isMobile = isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $_SERVER['HTTP_USER_AGENT']);
                                    $perPage = $isMobile ? 8 : 9;
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
                                                <div class="alert alert-primary text-center"
                                                    style="background:#00235b; color:#fff; border:none;">
                                                    Tidak ada produk yang Anda cari.
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($productsToShow as $product)
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single-project mb-30">
                                                    <a class="project-img product-preview" href="javascript:void(0);"
                                                        data-img="{{ $product['img'] }}" data-title="{{ $product['title'] }}"
                                                        data-desc="{{ $product['desc'] }}">
                                                        <img src="{{ $product['img'] }}" alt="">
                                                    </a>
                                                    <div class="project-cap">
                                                        <div class="marketplace-row">
                                                            <a href="https://wa.me/6282189327077" class="plus-btn whatsapp-btn"
                                                                target="_blank">
                                                                <img src="fe/img/icon/whatsapp-putih.png" alt="WhatsApp"
                                                                    width="28" height="28">
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
                                            @php
                                                $isMobile = isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $_SERVER['HTTP_USER_AGENT']);
                                                $perPage = $isMobile ? 8 : 9;
                                                $page = max(1, (int) request()->get('page', 1));
                                                $total = count($products);
                                                $totalPages = max(1, (int) ceil($total / max(1, $perPage)));

                                                // pastikan tab tetap ter-include di link
                                                $baseParams = request()->except('page');
                                                $baseParams['tab'] = 'last';
                                                $prevPage = max(1, $page - 1);
                                                $nextPage = min($totalPages, $page + 1);
                                            @endphp

                                            @if($totalPages <= 1)
                                                {{-- hanya tampilkan "1" aktif --}}
                                                <li class="page-item disabled">
                                                    <a class="page-link"
                                                        href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => $prevPage])) }}">Previous</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a class="page-link"
                                                        href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => 1])) }}">1</a>
                                                </li>
                                                <li class="page-item disabled">
                                                    <a class="page-link"
                                                        href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => $nextPage])) }}">Next</a>
                                                </li>
                                            @else
                                                {{-- normal pagination window jika > 1 halaman --}}
                                                @php
                                                    $maxShow = 4;
                                                    $half = (int) floor($maxShow / 2);
                                                    $start = max(1, min($page - $half, max(1, $totalPages - $maxShow + 1)));
                                                    $end = min($totalPages, $start + $maxShow - 1);
                                                @endphp

                                                <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => $prevPage])) }}">Previous</a>
                                                </li>

                                                @for($i = $start; $i <= $end; $i++)
                                                    <li class="page-item {{ $page == $i ? 'active' : '' }}">
                                                        <a class="page-link"
                                                            href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => $i])) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor

                                                <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ url()->current() . '?' . http_build_query(array_merge($baseParams, ['page' => $nextPage])) }}">Next</a>
                                                </li>
                                            @endif
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
    <div class="container box_1170 mb-100">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card p-4 catalog-card" data-animate="1" style="border-radius:12px; box-shadow:0 8px 30px rgba(2,8,52,0.06);">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div>
                            <h3 class="mb-1" style="font-family:'Teko',sans-serif; font-size:28px; color:#0b1c39;">
                                Lihat Katalog Produk Lengkap
                            </h3>
                            <p class="mb-10 text-muted" style="max-width:720px;">
                                Jelajahi katalog produk lengkap yang berisi beragam pilihan dari berbagai kategori, mulai dari olahan kuliner, produk manufaktur, hingga hasil kerajinan kreatif. Setiap produk disajikan dengan informasi dan tampilan yang menarik untuk memudahkan Anda mengenali karakteristik dan keunggulannya.
                            </p>
                        </div>
                        <div class="mt-3 mt-md-0 d-flex gap-2">
                            <a href="#" class="btn btn-primary mr-2" id="catalogViewBtn" data-toggle="modal" data-target="#catalogPdfModal">
                                <i class="fas fa-eye"></i> Lihat Katalog
                            </a>
                            <a href="" class="btn btn-outline-primary" id="catalogDownloadBtn" download>
                                <i class="fas fa-download"></i> Download
                            </a>
                            {{-- <a href="{{ asset('fe/files/Katalog-umkm-ydba-bmi.pdf') }}"
                                class="btn btn-primary"
                                target="_blank" rel="noopener noreferrer">
                                Lihat Katalog
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PDF preview modal (katalog lengkap) -->
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
                    <iframe id="catalogPdfFrame" src="" frameborder="0"
                        style="width:100%; height:80vh; min-height:480px;"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Katalog untuk setiap kategori
        const catalogs = {
            'home': '{{ asset("fe/files/Katalog-UMKM-YDBA-BMI.pdf") }}',
            'profile': '{{ asset("fe/files/Katalog-Manufaktur-YDBA-BMI.pdf") }}', // Manufaktur
            'contact': '{{ asset("fe/files/Katalog-Kuliner-YDBA-BMI.pdf") }}',     // Kuliner
            'last': '{{ asset("fe/files/Katalog-Kerajinan-YDBA-BMI.pdf") }}'       // Kerajinan
        };

        const tabNames = {
            'home': 'Semua Produk',
            'profile': 'Manufaktur',
            'contact': 'Kuliner',
            'last': 'Kerajinan'
        };

        // Fungsi untuk update katalog sesuai tab
        function updateCatalog(tabId) {
            const pdfUrl = catalogs[tabId] || catalogs['home'];
            const tabName = tabNames[tabId] || 'Semua Produk';
            
            // Update button dengan PDF URL
            document.getElementById('catalogViewBtn').setAttribute('data-pdf', pdfUrl);
            document.getElementById('catalogDownloadBtn').href = pdfUrl;
            document.getElementById('downloadPdfBtnModal').href = pdfUrl;
            
            // Update title modal
            document.querySelector('.modal-title').textContent = 'Katalog Produk ' + tabName + ' — Lihat (PDF)';
        }

        // Set katalog awal sesuai tab aktif
        const activeTab = '{{ request()->get("tab", "home") }}';
        updateCatalog(activeTab);

        // Event listener saat tab berubah
        document.querySelectorAll('.nav-tabs .nav-link').forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                const tabId = this.getAttribute('href').replace('#nav-', '');
                // Tunggu tab switch sebelum update katalog
                setTimeout(() => {
                    updateCatalog(tabId);
                }, 100);
            });
        });

        // Modal event untuk update iframe saat dibuka
        $('#catalogPdfModal').on('show.bs.modal', function(event) {
            const pdfUrl = document.getElementById('catalogViewBtn').getAttribute('data-pdf');
            document.getElementById('catalogPdfFrame').src = pdfUrl + '#toolbar=0&navpanes=0';
        });

        $('#catalogPdfModal').on('hidden.bs.modal', function() {
            document.getElementById('catalogPdfFrame').src = '';
        });
    });
    </script>

    <script>
        // Reset page ke 1 dan search ke kosong saat pindah tab produk
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.nav-tabs .nav-link').forEach(function (tab) {
                tab.addEventListener('click', function (e) {
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cek apakah ada hash di URL (misalnya #product-section)
        if (window.location.hash === '#product-section') {
            const productSection = document.getElementById('product-section');
            if (productSection) {
                // Scroll ke elemen dengan smooth behavior
                productSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    });
    </script>
    <!-- Product Area End -->

    <!-- Modal Preview Product -->
    <div class="modal fade" id="productPreviewModal" tabindex="-1" role="dialog" aria-labelledby="productPreviewLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content" style="background:#00235b;">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-white" id="productPreviewLabel"></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"
                        style="font-size:2rem;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="productPreviewImg" src="" alt="Preview"
                        style="max-width:100%; max-height:400px; border-radius:12px; box-shadow:0 2px 12px rgba(0,0,0,0.15);">
                    <div id="productPreviewDesc" class="mt-3 text-white"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('client')
    @include('layout.client')
@endsection