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
                'title' => 'Gathering 2023',
                'event_date' => '2024-08-15',
                'description' => 'Highlights from the Bazar Sunset event.',
                'images' => [
                    ['file' => 'gathering2023-1.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gathering2023-2.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gathering2023-3.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gathering2023-4.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gathering2023-5.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gathering2023-6.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gathering2023-7.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gathering2023-8.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'gathering2023-9.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gathering2023-10.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gathering2023-11.webp', 'mode' => 'col-6', 'center' => true],
                ],
            ],
            [
                'title' => 'Pelatihan Pengembangan Komunitas Bisnis BMI',
                'event_date' => '2024-09-10',
                'description' => 'Coverage of Bazar di Desa Puspasari.',
                'images' => [
                    ['file' => 'pelatihan1-1.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pelatihan1-2.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pelatihan1-3.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pelatihan1-4.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pelatihan1-5.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pelatihan1-6.webp', 'mode' => 'col-4', 'center' => false],
                ],
            ],
            [
                'title' => 'Penampingan Pengembangan Komunitas Bisnis BMI',
                'event_date' => '2024-10-01',
                'description' => 'Photos from the regular meeting at Kebun Wisata Pasir Mukti.',
                'images' => [
                    ['file' => 'pendampingan1-1.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pendampingan1-2.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pendampingan1-3.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pendampingan1-4.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pendampingan1-5.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pendampingan1-6.webp', 'mode' => 'col-4', 'center' => false],
                ],
            ],
            [
                'title' => 'Gathering 2024',
                'event_date' => '2024-10-01',
                'description' => 'Photos from the regular meeting at Kebun Wisata Pasir Mukti.',
                'images' => [
                    ['file' => 'gathering2024-1.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gathering2024-2.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gathering2024-3.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'gathering2024-4.webp', 'mode' => 'col-6', 'center' => false],
                ],
            ],
            [
                'title' => 'IMA Awards 2024',
                'event_date' => '2024-10-12',
                'description' => 'Gathering and networking.',
                'images' => [
                    ['file' => 'ima2024-1.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'ima2024-2.webp', 'mode' => 'col-6', 'center' => false],
                ],
            ],
            [
                'title' => 'Pelatihan Pengembangan Komunitas Bisnis BMI : Business Development',
                'event_date' => '2024-10-12',
                'description' => 'Gathering and networking.',
                'images' => [
                    ['file' => 'pelatihan2-1.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'pelatihan2-2.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'pelatihan2-3.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pelatihan2-4.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pelatihan2-5.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pelatihan2-6.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'pelatihan2-7.webp', 'mode' => 'col-6', 'center' => false],
                ],
            ],
            [
                'title' => 'Pendampingan Pengembangan Komunitas Bisnis BMI : Business Development',
                'event_date' => '2024-10-12',
                'description' => 'Gathering and networking.',
                'images' => [
                    ['file' => 'pendampingan2-1.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pendampingan2-2.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pendampingan2-3.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pendampingan2-4.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pendampingan2-5.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'pendampingan2-6.webp', 'mode' => 'col-4', 'center' => false],
                ],
            ],
            [
                'title' => 'Buka Bersama Ramadhan 2025',
                'event_date' => '2024-10-12',
                'description' => 'Gathering and networking.',
                'images' => [
                    ['file' => 'bukber-1.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'bukber-2.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'bukber-3.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'bukber-4.webp', 'mode' => 'col-6', 'center' => false],
                ],
            ],
            [
                'title' => 'Bazar Ramadhan 2025',
                'event_date' => '2024-10-12',
                'description' => 'Gathering and networking.',
                'images' => [
                    ['file' => 'bazar1-1.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'bazar1-2.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'bazar1-3.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'bazar1-4.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'bazar1-5.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'bazar1-6.webp', 'mode' => 'col-4', 'center' => false],
                ],
            ],
            [
                'title' => 'Bazar Budi Guna',
                'event_date' => '2024-10-12',
                'description' => 'Gathering and networking.',
                'images' => [
                    ['file' => 'bazar2-1.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'bazar2-2.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'bazar2-3.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'bazar2-4.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'bazar2-5.webp', 'mode' => 'col-4', 'center' => false],
                    ['file' => 'bazar2-6.webp', 'mode' => 'col-4', 'center' => false],
                ],
            ],
            [
                'title' => 'Bazar Puspasari',
                'event_date' => '2024-10-12',
                'description' => 'Gathering and networking.',
                'images' => [
                    ['file' => 'bazar3-1.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'bazar3-2.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'bazar3-3.webp', 'mode' => 'col-6', 'center' => true],
                ],
            ],
            [
                'title' => 'Bazar Family Day ASTRA',
                'event_date' => '2024-10-12',
                'description' => 'Gathering and networking.',
                'images' => [
                    ['file' => 'bazar4-1.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'bazar4-2.webp', 'mode' => 'col-6', 'center' => false],
                    ['file' => 'bazar4-3.webp', 'mode' => 'col-6', 'center' => true],
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
