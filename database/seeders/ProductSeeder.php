<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get products data and seed them
        $products = self::getProductsData();
        
        foreach ($products as $product) {
            Product::create($product);
        }
    }

    /**
     * Get all products data with correct structure.
     * Returns array compatible with Product model.
     */
    public static function getProductsData(): array
    {
        $rawData = self::getRawProductsData();
        $products = [];

        foreach ($rawData as $item) {
            $tokopedia = null;
            $shopee = null;
            $phone = null;
            $use_default_phone = true;
            $ordering_method = 'marketplace';

            // Extract marketplace links
            foreach ($item['marketplaces'] as $m) {
                if (isset($m['type']) && $m['type'] === 'tokopedia') {
                    $tokopedia = $m['url'];
                }
                if (isset($m['type']) && $m['type'] === 'shopee') {
                    $shopee = $m['url'];
                }
                if (isset($m['type']) && $m['type'] === 'whatsapp') {
                    $ordering_method = 'whatsapp';
                    if (isset($m['url']) && preg_match('/wa\.me\/(\d+)/', $m['url'], $matches)) {
                        $phone = $matches[1];
                        $use_default_phone = false;
                    }
                }
            }

            // Determine category from image path
            $category = 'manufaktur';
            if (strpos($item['img'], '/kuliner/') !== false) {
                $category = 'kuliner';
            } elseif (strpos($item['img'], '/kerajinan/') !== false) {
                $category = 'kerajinan';
            }

            $products[] = [
                'name' => $item['title'],
                'description' => $item['desc'],
                'image' => $item['img'],
                'category' => $category,
                'ordering_method' => $ordering_method,
                'shopee_link' => $shopee,
                'tokopedia_link' => $tokopedia,
                'phone' => $phone,
                'use_default_phone' => $use_default_phone,
                'slug' => Str::slug($item['title']),
            ];
        }

        return $products;
    }

    /**
     * Get raw products data in the new structure format.
     */
    public static function getRawProductsData(): array
    {
        return [
            [
                'img' => 'fe/img/gallery/manufaktur/set-meja-kotak.jpeg',
                'title' => 'Set meja bar kotak panjang',
                'desc' => 'Set meja bar kotak panjang — meja kuat untuk area bar/café dengan finishing tahan cuaca.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-bar-kotak-panjang-outdoor-1-meja-4-kursi-wallnut-brown-f063f?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/1-Set-Meja-Bar-Kotak-Panjang-Outdoor-1-Meja-4-Kursi-i.1396487386.26723564178']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/yogurt.png',
                'title' => 'Yogurt drink with jelly',
                'desc' => 'Minuman sehat dengan jelly.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077?text=Halo%20saya%20mau%20pesan%20Yogurt%20drink%20with%20jelly']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/es-dawet-IRENG.png',
                'title' => 'Es dawet ireng',
                'desc' => 'Es dawet ireng — minuman tradisional segar dengan cendol hitam dan gula kelapa, cocok dinikmati kapan saja.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/pan-mixer.png',
                'title' => 'Pan Mixer',
                'desc' => 'Pan Mixer — mesin pengaduk serbaguna untuk produksi adonan besar pada usaha bakery dan catering.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/pan-mixer-mesin-produksi-pengaduk-material-beton-kuning-34564?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Pan-Mixer-Mesin-Produksi-Pengaduk-Material-Beton-i.1396487386.28423565178']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/basreng-ikan-original.png',
                'title' => 'Basreng Ikan Original',
                'desc' => 'Basreng Ikan Original — camilan gurih berbahan ikan, cocok untuk stok usaha kuliner dan reseller.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/jas-hujan.png',
                'title' => 'Kerajinan jas hujan',
                'desc' => 'Jas hujan kerajinan — jas hujan praktis dengan jahitan rapi, ideal untuk kegiatan di luar ruangan.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/rak-plastik.png',
                'title' => 'Rak Plastik',
                'desc' => 'Rak plastik serbaguna — solusi penyimpanan ringan dan tahan lembap untuk dapur dan gudang.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/kacang.png',
                'title' => 'Camilan Kacang',
                'desc' => 'Camilan kacang — kacang goreng renyah dan gurih, ideal untuk usaha camilan dan toko oleh-oleh.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/proofer.png',
                'title' => 'Proofer',
                'desc' => 'Proofer — chamber pematang adonan dengan kontrol suhu untuk hasil roti yang konsisten.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/lemari-apron.png',
                'title' => 'Lemari apron',
                'desc' => 'Lemari apron — lemari penyimpanan khusus apron dan perlengkapan kerja dengan rak rapi.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/lemari-apron-lemari-penyimpanan-baju-apron-lemari-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Lemari-Apron-Lemari-Penyimpanan-Baju-Apron-Lemari-Rumah-Sakit-i.1396487386.29073581426']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/keripik-pisang-coklat.png',
                'title' => 'Camilan keripik pisang',
                'desc' => 'Keripik pisang coklat — camilan renyah berbalut coklat, cocok untuk kemasan oleh-oleh dan toko online.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/gerobak-sampah.png',
                'title' => 'Gerobak sampah',
                'desc' => 'Gerobak sampah — gerobak kokoh untuk pengelolaan sampah industri dan area publik.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/keripik-pangsit.png',
                'title' => 'Camilan keripik pangsit',
                'desc' => 'Keripik pangsit — camilan gurih kriuk, ideal untuk dijual dalam kemasan usaha kuliner kecil.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/keju-kriwil.png',
                'title' => 'Camilan keju kriwil',
                'desc' => 'Keju kriwil — camilan keju renyah dengan rasa gurih, cocok sebagai pelengkap minuman.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/kentang-mustofa.png',
                'title' => 'Camilan kentang mustofa',
                'desc' => 'Kentang Mustofa — camilan kentang gurih renyah, cocok untuk distributor dan warung.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/mixer.png',
                'title' => 'Mixer',
                'desc' => 'Mixer industri — mesin pengaduk bertenaga untuk adonan, cocok untuk bakery skala menengah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/keripik-tempe-tigasaudara.png',
                'title' => 'Camilan keripik tempe',
                'desc' => 'Keripik tempe — camilan lokal renyah dengan citarasa tradisional, siap jual dalam kemasan menarik.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/loyang-brownies.png',
                'title' => 'Loyang brownies',
                'desc' => 'Loyang brownies — cetakan berkualitas untuk produksi brownies dengan hasil panggangan merata.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-brownies-30x10x4-cm-cetakan-brownies?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Loyang-Brownies-30x10x4-cm-Cetakan-Brownies-i.1396487386.24640500063']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/kerupuk-rambak.png',
                'title' => 'Camilan kerupuk rambak',
                'desc' => 'Kerupuk rambak — gurih dan renyah, cocok untuk penjualan grosir maupun eceran.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/bracket-plat.png',
                'title' => 'Bracket plat nomor',
                'desc' => 'Bracket plat nomor — bracket logam kuat untuk pemasangan plat kendaraan atau mesin.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/trolley-makan.png',
                'title' => 'Troli Makan',
                'desc' => 'Troli makan — troli stainless steel untuk pengantaran makanan di rumah sakit dan katering.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/trolley-makan-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/BMI-Trolley-Makanan-Stainless-Steel-Trolley-Makan-Rumah-Sakit-i.1396487386.27523575751']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/bak-penampung.png',
                'title' => 'Bak penampung Makanan',
                'desc' => 'Bak penampung makanan — wadah besar tahan korosi untuk produksi makanan dan pengolahan massal.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/bak-penampung-olahan-makanan-bak-penampung-keripik-matang-mesin-pelengkap-produksi?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Bak-Penampung-Olahan-Makanan-Bak-Penampung-Keripik-Matang-Mesin-Pelengkap-Produksi-i.1396487386.26473570115']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/sus-buah.png',
                'title' => 'Camilan kue sus buah',
                'desc' => 'Kue sus buah — pastry lembut isi krim dan buah segar, cocok untuk toko kue dan cafe.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/onde-onde.png',
                'title' => 'Camilan onde-onde',
                'desc' => 'Onde-onde — kue tradisional isi kacang hijau, cocok untuk usaha kue rumahan dan pasar lokal.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/ajuster-baud.png',
                'title' => 'Ajuster baud',
                'desc' => 'Ajuster baud — alat presisi untuk penyetelan baut dan komponen mekanik.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/bracket-spakbor.png',
                'title' => 'Bracket spakbor motor',
                'desc' => 'Bracket spakbor motor — bracket kuat untuk pemasangan spakbor pada berbagai jenis motor.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/ladder-hanger.jpeg',
                'title' => 'Ladder hanger',
                'desc' => 'Ladder hanger — gantungan serbaguna untuk menata tangga, peralatan, atau pakaian dengan rapi.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/ladder-hanger-gantungan-handuk-gantungan-mukena-estetik-unik-wallnut-brown-fa899?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Ladder-Hanger-Gantungan-Handuk-Gantungan-Mukena-Estetik-Unik-i.1396487386.29768280433']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/meja-kerja.png',
                'title' => 'Meja kerja stainless',
                'desc' => 'Meja kerja stainless — meja kerja kokoh untuk workshop, dapur industri, dan laboratorium.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/meja-kerja-stainless-steel-meja-kerja-pabrik-1730631299889792956?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Meja-Kerja-Stainless-Steel-Meja-Kerja-Pabrik-i.1396487386.29725918173']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/j-ring.png',
                'title' => 'J-Ring',
                'desc' => 'J-Ring — peralatan uji laboratorium untuk karakteristik campuran beton dan material konstruksi.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/j-ring-test-12-16-bar-alat-uji-lab-beton-alat-uji-laboratorium-teknik-sipil-j-ring-12-bar-b06e0?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/J-Ring-Test-12-16-Bar-Alat-Uji-Lab-Beton-Alat-Uji-Laboratorium-Teknik-Sipil-i.1396487386.28773565575']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/oven-gas.png',
                'title' => 'Oven gas',
                'desc' => 'Oven gas — oven bertenaga untuk memasak dan memanggang skala usaha dengan efisiensi bahan bakar.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/plat-kumis.png',
                'title' => 'Plat kumis motor',
                'desc' => 'Plat kumis motor — aksesori motor estetis untuk pemasangan di bagian depan kendaraan.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/put-kelem.png',
                'title' => 'Put kelem',
                'desc' => 'Put kelem — produk industri berfungsi untuk proses pengepakan atau penutup produk.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/set-meja-bulat.jpeg',
                'title' => 'Set meja bulat',
                'desc' => 'Set meja bulat — set meja dan kursi ideal untuk kafe kecil dan area santai dengan desain elegan.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-bulat-cafe-semi-outdoor-1-meja-2-kursi-wallnut-brown-2377b?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/1-Set-Meja-Bulat-Cafe-Semi-Outdoor-1-Meja-2-Kursi-i.1396487386.29573559438']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/set-meja-makan.jpeg',
                'title' => 'Set meja makan',
                'desc' => 'Set meja makan — set furnitur makan dengan konstruksi kuat dan finishing rapi, cocok untuk rumah dan restoran.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-makan-kotak-hpl-1-meja-4-kursi-wallnut-brown-c3041?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/1-Set-Meja-Makan-Kotak-HPL-1-Meja-4-Kursi-i.1396487386.26273564118']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/set-meja-kursi.jpg',
                'title' => 'Set meja kotak (Semi outdoor)',
                'desc' => 'Set meja kotak semi-outdoor — desain tahan cuaca untuk area luar kafe dan patio.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-kursi-kotak-cafe-furniture-semi-outdoor-1-meja-2-kursi-wallnut-brown-066c9?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/1-Set-Meja-Kursi-Kotak-Cafe-Furniture-Semi-Outdoor-1-Meja-2-Kursi-i.1396487386.29018277776']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/standar-casset.png',
                'title' => 'Standar casset',
                'desc' => 'Standar casset — alat penyangga khusus untuk peralatan uji radiologi dan klinis.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/standar-casset-rontgen-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Standar-Casset-Rontgen-Rumah-Sakit-i.1396487386.27923567040']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/standing-astray.png',
                'title' => 'Standing astray',
                'desc' => 'Standing ashtray — tempat abu rokok berdiri dengan desain rapi untuk area publik dan restoran.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/tank-farm.png',
                'title' => 'Tank farm',
                'desc' => 'Tank farm — tangki penyimpanan industri untuk bahan baku cair dalam skala produksi.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/tutup-hollow.png',
                'title' => 'Tutup hollow',
                'desc' => 'Tutup hollow — komponen finishing untuk struktur hollow dengan kualitas las rapi.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/tutup-pipa.png',
                'title' => 'Tutup pipa',
                'desc' => 'Tutup pipa — tutup pelindung untuk ujung pipa industri, tersedia dalam variasi ukuran.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/viewer-single.png',
                'title' => 'Viewer single',
                'desc' => 'Viewer single — alat pemeriksa sinar/X-ray untuk keperluan klinis dan diagnostik.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/standar-casset-rontgen-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Alat-Viewer-Rontgen-Single-atau-Double-Alat-Kesehatan-Rumah-Sakit-i.1396487386.26026010816']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/loyang-chifon.png',
                'title' => 'Loyang chifon',
                'desc' => 'Loyang chifon — cetakan khusus untuk chiffon cake dengan hasil bolong halus dan rapi.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-chifon-bongkar-pasang-20x10x15-cm-cetakan-chifon-bongkar-pasang?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Loyang-Chifon-Bongkar-Pasang-20x10x15-cm-Cetakan-Chifon-Bongkar-Pasang-i.1396487386.29673566174']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/loyang-lidah-kucing.png',
                'title' => 'Loyang lidah kucing',
                'desc' => 'Loyang lidah kucing — cetakan untuk membuat kue lidah kucing dengan lubang cetak presisi.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-lidah-kucing-18-lubang-24x22x1-5-cm-cetakan-lidah-kucing?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Loyang-Lidah-Kucing-18-Lubang-24x22x1-5-cm-Cetakan-Lidah-Kucing-i.1396487386.27523580428']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/loyang-roti-sisir.png',
                'title' => 'Loyang roti sisir',
                'desc' => 'Loyang roti sisir — cetakan khusus untuk roti bergelombang, mudah dibersihkan dan tahan lama.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-roti-sisir-20x12x5-cm-cetakan-roti-sisir?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Loyang-Roti-Sisir-20x12x5-cm-Cetakan-Roti-Sisir-i.1396487386.28923570278']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/loyang-roti-tawar.png',
                'title' => 'Loyang roti tawar',
                'desc' => 'Loyang roti tawar — loyang untuk membuat roti tawar dengan tekstur matang merata.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-roti-tawar-bandung-gerigi-22x10x8-cm-cetakan-roti-tawar-bandung?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Loyang-Roti-Tawar-Bandung-Gerigi-22x10x8-cm-Cetakan-Roti-Tawar-Bandung-i.1396487386.26573575319']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/visor-servo.png',
                'title' => 'Visor servo',
                'desc' => 'Visor servo — komponen mekanik presisi untuk aplikasi otomotif dan industri.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/jahe-merah-bubuk.jpg',
                'title' => 'Jahe merah bubuk',
                'desc' => 'Jahe merah bubuk — rempah alami untuk minuman dan bumbu, dikemas higienis untuk usaha kuliner.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/ganci-pesawat.jpg',
                'title' => 'Gantungan kunci pesawat',
                'desc' => 'Gantungan kunci pesawat — kerajinan unik berbentuk pesawat, ideal sebagai suvenir atau merchandise.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/jaket-konveksi.png',
                'title' => 'Jaket konveksi',
                'desc' => 'Jaket konveksi — jaket produksi massal dengan jahitan rapi, cocok untuk seragam dan merchandise.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/kendi-rajut.jpg',
                'title' => 'Kerajinan kendi rajut',
                'desc' => 'Kendi rajut — kerajinan tangan estetik untuk dekorasi rumah dan hadiah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/tempat-rajut.jpg',
                'title' => 'Kerajinan tempat rajut',
                'desc' => 'Tempat rajut — tempat serbaguna hasil rajutan tangan, cocok untuk penyimpanan atau dekorasi.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/topi-rajut.jpg',
                'title' => 'Kerajinan topi rajut',
                'desc' => 'Topi rajut — topi hangat buatan tangan, ideal untuk fashion lokal dan pasar kerajinan.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/vas-bunga-rajut.jpg',
                'title' => 'Kerajinan vas bunga rajut',
                'desc' => 'Vas bunga rajut — vas artistik dengan sentuhan rajutan tangan untuk mempercantik interior rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/akar-kelapa.png',
                'title' => 'Camilan Akar Kelapa',
                'desc' => 'Akar kelapa — camilan tradisional manis-gurih berbahan akar kelapa, cocok untuk oleh-oleh dan usaha jajanan.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/catering-kuliner.png',
                'title' => 'Catering Nurhayati Kuliner',
                'desc' => 'Layanan katering profesional menyediakan paket prasmanan dan menu rumahan untuk acara kecil hingga besar.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/catering.png',
                'title' => 'Catering Teras Jajanan Enaak',
                'desc' => 'Jasa katering spesialis jajanan tradisional dan modern, cocok untuk acara, pesta, dan pesanan catering harian.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/dendeng-sapi.png',
                'title' => 'Camilan Dendeng Sapi',
                'desc' => 'Dendeng sapi — irisan daging sapi berbumbu, dikeringkan dan digoreng, rasa gurih dan tahan lama untuk camilan.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/dimsum.png',
                'title' => 'Camilan Dimsum',
                'desc' => 'Dimsum — aneka kukusan dan gorengan siap saji dengan cita rasa Tionghoa, cocok untuk camilan dan hidangan prasmanan.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/kacang-teri.png',
                'title' => 'Camilan Teri Kacang',
                'desc' => 'Teri kacang — kacang goreng renyah bercampur teri asin, camilan gurih dan populer untuk oleh-oleh.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/kerupuk-rambak-jawa.png',
                'title' => 'Camilan Kerupuk Rambak Jawa',
                'desc' => 'Kerupuk rambak — kerupuk khas Jawa berbahan kulit ikan/udang yang renyah dan gurih, cocok untuk camilan.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/keripik-tempe.png',
                'title' => 'Camilan Keripik Tempe',
                'desc' => 'Keripik tempe — tempe tipis yang digoreng hingga renyah, camilan sehat dan cocok untuk dijual kembali.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/pempek.png',
                'title' => 'Camilan Pempek',
                'desc' => 'Pempek — makanan khas Palembang berbahan ikan, disajikan dengan kuah cuka (cuko) yang khas dan lezat.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/rangginang.png',
                'title' => 'Camilan Rangginang',
                'desc' => 'Rangginang — kerupuk dari beras ketan yang digoreng renyah, rasa gurih dan cocok untuk camilan tradisional.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/yogurt-stik.png',
                'title' => 'Yogurt Stik',
                'desc' => 'Yogurt stik — camilan berbasis yogurt yang menyegarkan, dikemas praktis untuk dinikmati kapan saja.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/bantal-leher-mobil.png',
                'title' => 'Bantal leher mobil',
                'desc' => 'Bantal leher mobil — bantal ergonomis untuk kenyamanan perjalanan, bahan lembut dan penopang leher yang nyaman.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/bantal-leher.png',
                'title' => 'Bantal Leher',
                'desc' => 'Bantal leher — bantal portabel untuk perjalanan dan istirahat, desain ergonomis dan mudah dibawa.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/boneka.png',
                'title' => 'Kerajinan Boneka',
                'desc' => 'Boneka kerajinan tangan — boneka lucu dan unik buatan tangan, cocok sebagai hadiah dan dekorasi.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/dompet-koin.png',
                'title' => 'Kerajinan Dompet Koin',
                'desc' => 'Dompet koin kerajinan — dompet kecil praktis untuk menyimpan koin dan kartu, terbuat dari bahan lokal.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/ganci-hp.png',
                'title' => 'Kerajinan Gantungan kunci HP',
                'desc' => 'Gantungan kunci HP — aksesoris fungsional dan dekoratif untuk ponsel atau kunci, dibuat tangan.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/keranjang-mini.png',
                'title' => 'Kerajinan Keranjang Mini',
                'desc' => 'Keranjang mini rotan — keranjang kecil serbaguna untuk penyimpanan dan dekorasi, terbuat dari rotan berkualitas.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/keranjang-rotan-jinjing.png',
                'title' => 'Kerajinan Keranjang Rotan Jinjing',
                'desc' => 'Keranjang rotan jinjing — tas rotan hand-made ideal untuk belanja atau gaya kasual, tahan lama dan estetis.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/keranjang-rotan.png',
                'title' => 'Kerajinan Keranjang Rotan',
                'desc' => 'Keranjang rotan — keranjang serbaguna untuk penyimpanan rumah, terbuat dari rotan alami dengan anyaman rapi.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/lanyard.png',
                'title' => 'Kerajinan Lanyard',
                'desc' => 'Lanyard — tali gantung ID yang kuat dan nyaman, cocok untuk event, kantor, dan penggunaan sehari-hari.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/pouch-ecoprint.png',
                'title' => 'Kerajinan Pouch Ecoprint',
                'desc' => 'Pouch ecoprint — pouch bermotif alami hasil ecoprint, ramah lingkungan dan cocok untuk hadiah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/pouch-kanvas.png',
                'title' => 'Kerajinan Pouch Kanvas',
                'desc' => 'Pouch kanvas — pouch bahan kanvas tebal, tahan lama untuk menyimpan alat tulis atau gadget kecil.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/pouch-macrame.png',
                'title' => 'Kerajinan Pouch Macrame',
                'desc' => 'Pouch macrame — pouch artistik dengan teknik macrame, cocok sebagai aksesori fashion bergaya boho.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/tempat-cincin.png',
                'title' => 'Kerajinan Tempat Cincin',
                'desc' => 'Tempat cincin — wadah kecil untuk menyimpan cincin dan perhiasan, dibuat rapi sebagai kerajinan tangan.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/tempat-pensil.png',
                'title' => 'Kerajinan Tempat Pensil',
                'desc' => 'Tempat pensil kerajinan — tempat pensil fungsional dan dekoratif, ideal untuk meja sekolah atau kantor.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
        ];
    }
}
