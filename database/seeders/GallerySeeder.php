<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\GalleryImage;

use function GuzzleHttp\describe_type;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'title' => 'Event Bazar Sunset di Kebun Raya Bogor',
                'event_date' => '2024-08-15',
                'description' => 'Highlights from the Bazar Sunset event.',
                'images' => [
                    ['file' => 'gallery1.jpg', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gallery2.jpg', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gallery3.jpg', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gallery4.jpg', 'mode' => 'col-6', 'center' => true],
                ],
            ],
            [
                'title' => 'Event Bazar di Desa Puspasari',
                'event_date' => '2024-09-10',
                'description' => 'Coverage of Bazar di Desa Puspasari.',
                'images' => [
                    ['file' => 'gallery5.jpg', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gallery22.jpg', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gallery6.jpg', 'mode' => 'col-6', 'center' => true],
                ],
            ],
            [
                'title' => 'Temu Rutin anggota BMI di Kebun Wisata Pasir Mukti',
                'event_date' => '2024-10-01',
                'description' => 'Photos from the regular meeting at Kebun Wisata Pasir Mukti.',
                'images' => [
                    ['file' => 'gallery9.jpg', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gallery23.jpg', 'mode' => 'col-6', 'center' => false],
                ],
            ],
            [
                'title' => 'Pendampingan pengembangan komunitas bisnis BMI',
                'event_date' => '2024-10-01',
                'description' => 'Photos from the regular meeting at Kebun Wisata Pasir Mukti.',
                'images' => [
                    ['file' => 'gallery15.jpg', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gallery13.jpg', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gallery14.jpg', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gallery12.jpg', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gallery11.jpg', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gallery8.jpg', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gallery21.jpg', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gallery7.jpg', 'mode' => 'col-4', 'center' => false],
                ],
            ],
            [
                'title' => 'Gathering komunitas BMI',
                'event_date' => '2024-10-12',
                'description' => 'Gathering and networking.',
                'images' => [
                    ['file' => 'gallery16.jpg', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gallery17.jpg', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gallery18.jpg', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gallery19.jpg', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gallery20.jpg', 'mode' => 'col-6', 'center' => false],
                ],
            ],
        ];

        foreach ($items as $item) {
            $g = Gallery::create([
                'title' => $item['title'],
                'description' => $item['description'],
                'event_date' => $item['event_date'],
            ]);

            foreach ($item['images'] as $img) {
                GalleryImage::create([
                    'gallery_id' => $g->id,
                    'image' => 'gallery/' . $img['file'],
                    'display_mode' => $img['mode'],
                    'center_image' => $img['center'] ?? false,
                ]);
            }
        }
    }
}
