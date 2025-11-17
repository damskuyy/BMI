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
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
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
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/pan-mixer.png',
                'title' => 'Pan Mixer',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/pan-mixer-mesin-produksi-pengaduk-material-beton-kuning-34564?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Pan-Mixer-Mesin-Produksi-Pengaduk-Material-Beton-i.1396487386.28423565178']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/basreng-ikan-original.png',
                'title' => 'Basreng Ikan Original',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/jas-hujan.png',
                'title' => 'Kerajinan jas hujan',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/rak-plastik.png',
                'title' => 'Rak Plastik',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/kacang.png',
                'title' => 'Camilan Kacang',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/proofer.png',
                'title' => 'Proofer',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/lemari-apron.png',
                'title' => 'Lemari apron',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/lemari-apron-lemari-penyimpanan-baju-apron-lemari-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Lemari-Apron-Lemari-Penyimpanan-Baju-Apron-Lemari-Rumah-Sakit-i.1396487386.29073581426']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/keripik-pisang-coklat.png',
                'title' => 'Camilan keripik pisang',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/gerobak-sampah.png',
                'title' => 'Gerobak sampah',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/keripik-pangsit.png',
                'title' => 'Camilan keripik pangsit',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/keju-kriwil.png',
                'title' => 'Camilan keju kriwil',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/kentang-mustofa.png',
                'title' => 'Camilan kentang mustofa',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/mixer.png',
                'title' => 'Mixer',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/keripik-tempe-tigasaudara.png',
                'title' => 'Camilan keripik tempe',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/loyang-brownies.png',
                'title' => 'Loyang brownies',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-brownies-30x10x4-cm-cetakan-brownies?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Loyang-Brownies-30x10x4-cm-Cetakan-Brownies-i.1396487386.24640500063']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/kerupuk-rambak.png',
                'title' => 'Camilan kerupuk rambak',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/bracket-plat.png',
                'title' => 'Bracket plat nomor',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/trolley-makan.png',
                'title' => 'Troli Makan',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/trolley-makan-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/BMI-Trolley-Makanan-Stainless-Steel-Trolley-Makan-Rumah-Sakit-i.1396487386.27523575751']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/bak-penampung.png',
                'title' => 'Bak penampung Makanan',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/bak-penampung-olahan-makanan-bak-penampung-keripik-matang-mesin-pelengkap-produksi?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Bak-Penampung-Olahan-Makanan-Bak-Penampung-Keripik-Matang-Mesin-Pelengkap-Produksi-i.1396487386.26473570115']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/sus-buah.png',
                'title' => 'Camilan kue sus buah',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/onde-onde.png',
                'title' => 'Camilan onde-onde',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/ajuster-baud.png',
                'title' => 'Ajuster baud',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/bracket-spakbor.png',
                'title' => 'Bracket spakbor motor',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/ladder-hanger.jpeg',
                'title' => 'Ladder hanger',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/ladder-hanger-gantungan-handuk-gantungan-mukena-estetik-unik-wallnut-brown-fa899?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Ladder-Hanger-Gantungan-Handuk-Gantungan-Mukena-Estetik-Unik-i.1396487386.29768280433']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/meja-kerja.png',
                'title' => 'Meja kerja stainless',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/meja-kerja-stainless-steel-meja-kerja-pabrik-1730631299889792956?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Meja-Kerja-Stainless-Steel-Meja-Kerja-Pabrik-i.1396487386.29725918173']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/j-ring.png',
                'title' => 'J-Ring',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/j-ring-test-12-16-bar-alat-uji-lab-beton-alat-uji-laboratorium-teknik-sipil-j-ring-12-bar-b06e0?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/J-Ring-Test-12-16-Bar-Alat-Uji-Lab-Beton-Alat-Uji-Laboratorium-Teknik-Sipil-i.1396487386.28773565575']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/oven-gas.png',
                'title' => 'Oven gas',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/plat-kumis.png',
                'title' => 'Plat kumis motor',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/put-kelem.png',
                'title' => 'Put kelem',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/set-meja-bulat.jpeg',
                'title' => 'Set meja bulat',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-bulat-cafe-semi-outdoor-1-meja-2-kursi-wallnut-brown-2377b?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/1-Set-Meja-Bulat-Cafe-Semi-Outdoor-1-Meja-2-Kursi-i.1396487386.29573559438']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/set-meja-makan.jpeg',
                'title' => 'Set meja makan',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-makan-kotak-hpl-1-meja-4-kursi-wallnut-brown-c3041?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/1-Set-Meja-Makan-Kotak-HPL-1-Meja-4-Kursi-i.1396487386.26273564118']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/set-meja-kursi.jpg',
                'title' => 'Set meja kotak (Semi outdoor)',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/1-set-meja-kursi-kotak-cafe-furniture-semi-outdoor-1-meja-2-kursi-wallnut-brown-066c9?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/1-Set-Meja-Kursi-Kotak-Cafe-Furniture-Semi-Outdoor-1-Meja-2-Kursi-i.1396487386.29018277776']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/standar-casset.png',
                'title' => 'Standar casset',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/standar-casset-rontgen-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Standar-Casset-Rontgen-Rumah-Sakit-i.1396487386.27923567040']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/standing-astray.png',
                'title' => 'Standing astray',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/tank-farm.png',
                'title' => 'Tank farm',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/tutup-hollow.png',
                'title' => 'Tutup hollow',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/tutup-pipa.png',
                'title' => 'Tutup pipa',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/viewer-single.png',
                'title' => 'Viewer single',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/standar-casset-rontgen-rumah-sakit?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Alat-Viewer-Rontgen-Single-atau-Double-Alat-Kesehatan-Rumah-Sakit-i.1396487386.26026010816']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/loyang-chifon.png',
                'title' => 'Loyang chifon',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-chifon-bongkar-pasang-20x10x15-cm-cetakan-chifon-bongkar-pasang?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Loyang-Chifon-Bongkar-Pasang-20x10x15-cm-Cetakan-Chifon-Bongkar-Pasang-i.1396487386.29673566174']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/loyang-lidah-kucing.png',
                'title' => 'Loyang lidah kucing',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-lidah-kucing-18-lubang-24x22x1-5-cm-cetakan-lidah-kucing?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Loyang-Lidah-Kucing-18-Lubang-24x22x1-5-cm-Cetakan-Lidah-Kucing-i.1396487386.27523580428']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/loyang-roti-sisir.png',
                'title' => 'Loyang roti sisir',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-roti-sisir-20x12x5-cm-cetakan-roti-sisir?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Loyang-Roti-Sisir-20x12x5-cm-Cetakan-Roti-Sisir-i.1396487386.28923570278']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/loyang-roti-tawar.png',
                'title' => 'Loyang roti tawar',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'tokopedia', 'url' => 'https://www.tokopedia.com/bogormanufakturindonesia/loyang-roti-tawar-bandung-gerigi-22x10x8-cm-cetakan-roti-tawar-bandung?extParam=src%3Dshop%26whid%3D17953854&aff_unique_id=&channel=others&chain_key='],
                    ['type' => 'shopee', 'url' => 'https://shopee.co.id/Loyang-Roti-Tawar-Bandung-Gerigi-22x10x8-cm-Cetakan-Roti-Tawar-Bandung-i.1396487386.26573575319']
                ]
            ],
            [
                'img' => 'fe/img/gallery/manufaktur/visor-servo.png',
                'title' => 'Visor servo',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kuliner/jahe-merah-bubuk.jpg',
                'title' => 'Jahe merah bubuk',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/ganci-pesawat.jpg',
                'title' => 'Gantungan kunci pesawat',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/jaket-konveksi.png',
                'title' => 'Jaket konveksi',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/kendi-rajut.jpg',
                'title' => 'Kerajinan kendi rajut',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/tempat-rajut.jpg',
                'title' => 'Kerajinan tempat rajut',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/topi-rajut.jpg',
                'title' => 'Kerajinan topi rajut',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
            [
                'img' => 'fe/img/gallery/kerajinan/vas-bunga-rajut.jpg',
                'title' => 'Kerajinan vas bunga rajut',
                'desc' => 'Produk furniture berkualitas untuk cafe dan rumah.',
                'marketplaces' => [
                    ['type' => 'whatsapp', 'url' => 'https://wa.me/6282189327077']
                ]
            ],
        ];
    }
}
