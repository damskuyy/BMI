<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\File;

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
                // Ensure storage target exists and try to copy example images from public folder
                $filename = $img['file'];
                $destDir = storage_path('app/public/gallery');
                if (!File::exists($destDir)) {
                    File::makeDirectory($destDir, 0755, true);
                }

                // Candidate source locations (in order)
                $candidates = [
                    public_path('fe/img/elements/' . $filename),
                    public_path('fe/img/' . $filename),
                    public_path($filename),
                ];

                $copied = false;
                foreach ($candidates as $src) {
                    if (File::exists($src)) {
                        $dest = $destDir . DIRECTORY_SEPARATOR . $filename;
                        // copy only if not already present
                        if (!File::exists($dest)) {
                            File::copy($src, $dest);
                        }
                        $copied = true;
                        break;
                    }
                }

                // Fallback: if exact filename not found, try to pick any real image inside fe/img/gallery (including subfolders)
                if (!$copied) {
                    // File::allFiles returns an array of SplFileInfo for files inside the directory recursively
                    if (File::isDirectory(public_path('fe/img/elements'))) {
                        $all = File::allFiles(public_path('fe/img/elements'));
                        foreach ($all as $f) {
                            $ext = strtolower(pathinfo($f->getFilename(), PATHINFO_EXTENSION));
                            if (in_array($ext, ['jpg','jpeg','png','gif','webp'])) {
                                $src = $f->getPathname();
                                $dest = $destDir . DIRECTORY_SEPARATOR . $filename;
                                if (!File::exists($dest)) {
                                    File::copy($src, $dest);
                                }
                                $copied = true;
                                break;
                            }
                        }
                    }
                }

                // Store path relative to storage disk (public)
                $imagePath = 'gallery/' . $filename;

                GalleryImage::create([
                    'gallery_id' => $g->id,
                    'image' => $imagePath,
                    'display_mode' => $img['mode'],
                    'center_image' => $img['center'] ?? false,
                ]);
            }
        }
    }
}
