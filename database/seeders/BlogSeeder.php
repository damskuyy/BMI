<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\BlogImage;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure an author exists
        $author = User::firstWhere('email', 'admin@bmi.com');
        if (! $author) {
            $author = User::create([
                'name' => 'Admin BMI',
                'email' => 'admin@bmi.com',
                'password' => Hash::make('bmi2025'),
                'foto' => null,
            ]);
        }

        $blogsData = [
            [
                'title' => 'Gathering BMI 2023',
                'content' => '<p>Gathering BMI adalah kesempatan bagi anggota untuk bersilaturahmi, berbagi pengalaman, dan membahas agenda organisasi.</p>',
                'image' => 'fe/img/elements/gathering2023-3.jpg',
                'category' => 'Gathering',
                'quote' => '“UMKM yang maju adalah UMKM yang mau berjalan bersama komunitasnya.”',
                'description_1' => '<p><strong>Instruktur:</strong> Bapak Triyono dan Progresif Outbond.</p>',
                'description_2' => '<p><strong>Waktu & Tempat:</strong> 13-14 Desember 2023, Bamboo Sanctuary Cikereteg, Bogor.</p>',
                'description_3' => '<p><strong>Jumlah Peserta:</strong> 16 UMKM</p>',
                'description_4' => '<p>Gathering ini dilaksanakan selama dua hari dengan beberapa rangkaian kegiatan. Pada pagi hari pertama, UMKM berangkat bersamasama ke tempat kegiatan, yaitu di Bamboo Sanctuary Cikereteg Bogor. Tiba di lokasi, UMKM beristirahat sejenak dan dilanjutkan dengan pemaparan materi oleh instruktur, Bapak Triyono. Materi yang dibahas mengenai Dinamika Kelompok. Materi ini berfokus pada pengenalan komunitas, mulai dari pemahaman terkait bentuk komunitas hingga manfaat berkomunitas dalam usaha. Kegiatan dilaksanakan hingga sore hari dan dilanjutkan dengan malam keakraban guna meningkatkan solidaritas antar UMKM. Pada hari kedua, UMKM diarahkan mengikuti kegiatan Team Building.</p>',
                'description_5' => '<p>Semoga dengan adanya kegiatan ini UMKM semakin solid dan memahami manfaat berkomunitas.</p>',
                'gallery_images' => [
                    'fe/img/elements/gathering2023-8.jpg',
                    'fe/img/elements/gathering2023-9.jpg',
                    'fe/img/elements/gathering2023-10.jpg',
                    'fe/img/elements/gathering2023-11.jpg',
                ],
            ],
            [
                'title' => 'Pelatihan Pengembangan Komunitas Bisnis',
                'content' => '<p>Pelatihan ini bertujuan untuk meningkatkan kemampuan UMKM dalam mengembangkan komunitas bisnis.</p>',
                'image' => 'fe/img/elements/pelatihan1-1.jpg',
                'category' => 'Pelatihan',
                'quote' => '"One Mission, One Team, One System"',
                'description_1' => '<p><strong>Instruktur:</strong> Bapak Triyono.</p>',
                'description_2' => '<p><strong>Waktu & Tempat:</strong> 30-31 Januari 2024, Kantor YDBA Bogor - Citeureup</p>',
                'description_3' => '<p><strong>Jumlah Peserta:</strong> 11 UMKM</p>',
                'description_4' => '<p> Pelatihan dilaksanakan selama dua hari. Pada hari pertama, Bapak Triyono selaku instruktur memaparkan materi mengenai cara untuk mengatur komunitas bisnis yang sudah dibentuk. Materi ini mencakup tentang Business Fundamental , Desain Organisasi Bisnis, dan Kunci Membangun Tim. Pada hari kedua dilanjutkan dengan materi mengenai cara mengidentifikasi masalah membangun komunitas bisnis secara terstruktur. Materi ini terdiri dari Segitita BI dan Fase Bisnis, Restrukturisasi Bisnis, dan Business Model Generation.</p>',
                'description_5' => '<p>Dengan diadakannya pelatihan ini semoga UMKM dapat mengimplementasikan organisasi bisnis yang sudah dibentuk dengan nilainilai yang telah disepakati.</p>',
                'gallery_images' => [
                    'fe/img/elements/pelatihan1-2.jpg',
                    'fe/img/elements/pelatihan1-3.jpg',
                    'fe/img/elements/pelatihan1-4.jpg',
                    'fe/img/elements/pelatihan1-6.jpg',
                ],
            ],
            [
                'title' => 'Pendampingan Pengembangan Komunitas Bisnis',
                'content' => '<p>Pendampingan ini merupakan lanjutan dari pelatihan untuk memperkuat komunitas UMKM.</p>',
                'image' => 'fe/img/elements/pendampingan1-6.jpg',
                'category' => 'Pendampingan',
                'quote' => '“Komunitas UMKM mengubah keterbatasan menjadi kekuatan kolektif.”',
                'description_1' => '<p><strong>Instruktur:</strong> Bapak Triyono.</p>',
                'description_2' => '<p><strong>Waktu & Tempat:</strong> 29 Februari - 6 Juni 2024, Kantor YDBA Bogor - Citeureup</p>',
                'description_3' => '<p><strong>Jumlah Peserta:</strong> 20 UMKM</p>',
                'description_4' => '<p> Kegiatan pendampingan ini merupakan lanjutan dari Pelatihan Pengembangan Komunitas Bisnis dengan instruktur yang sama, yaitu Bapak Triyono. Pendampingan dilaksanakan sebanyak 3 kali visit dengan materi yang berfokus pada penguatan komunitas dan instruktur menampilkan contoh dokumen-dokumen sebuah koperasi, terutama Anggaran Rumah Tangga (ART) Koperasi.</p>',
                'description_5' => '<p>Harapannya UMKM lebih matang lagi dalam membangun komunitas dan memiliki gambaran mengenai kegiatan koperasi.</p>',
                'gallery_images' => [
                    'fe/img/elements/pendampingan1-2.jpg',
                    'fe/img/elements/pendampingan1-3.jpg',
                    'fe/img/elements/pendampingan1-4.jpg',
                    'fe/img/elements/pendampingan1-5.jpg',
                ],
            ],
            [
                'title' => 'Gathering BMI 2024',
                'content' => '<p>Gathering BMI 2024 untuk menjaga keharmonisan antar UMKM.</p>',
                'image' => 'fe/img/elements/gathering2024-4.jpg',
                'category' => 'Gathering',
                'quote' => '“Di balik UMKM yang bertahan, selalu ada komunitas yang saling mendukung.”',
                'description_1' => '<p><strong>Instruktur:</strong> Bapak Triyono.</p>',
                'description_2' => '<p><strong>Waktu & Tempat:</strong> Desember 2024, Taman Wisata Pasir Mukti</p>',
                'description_3' => '<p><strong>Jumlah Peserta:</strong> 10 UMKM</p>',
                'description_4' => '<p> Kegiatan komunitas UMKM pada tahun 2024 diakhiri dengan Gathering yang dihadiri oleh 10 UMKM dan instruktur yang sama dengan kegiatan sebelumnya, yaitu Bapak Triyono. Kegiatan ini dilaksanakan untuk menjaga keharmonisan antar UMKMSelain itu, pada kegiatan ini juga mulai membahas project yang dapat dikerjakan bersama-sama di bawah naungan Komunitas Bogor Manufaktur Indonesia.</p>',
                'description_5' => '<p> UMKM diharapkan dapat saling bekerjasama dan saling mendukung.</p>',
                'gallery_images' => [
                    'fe/img/elements/gathering2024-1.jpeg',
                    'fe/img/elements/gathering2024-2.jpeg',
                    'fe/img/elements/gathering2024-4.jpg',
                    'fe/img/elements/gathering2024-3.jpg',
                ],
            ],
            [
                'title' => 'IMA Award 2024',
                'content' => '<p>CV Adiwijaya Teknik berhasil masuk 20 besar IMA Award 2024.</p>',
                'image' => 'fe/img/elements/ima2024-1.jpeg',
                'category' => 'Penghargaan',
                'quote' => '“Di balik penghargaan UMKM, ada ketekunan, keberanian, dan semangat yang terus membara.”',
                'description_1' => '<p><strong>Penyelenggara:</strong> Indonesia Marketing Assosiation (IMA)</p>',
                'description_2' => '<p><strong>Waktu & Tempat:</strong> Desember 2024, Djakarta Theatre</p>',
                'description_3' => '<p><strong>UMKM Terlibat:</strong> CV Adiwijaya Teknik</p>',
                'description_4' => '<p><strong>UMKM Penghargaan:</strong> Finalis 20 Besar dari 807 Peserta</p>',
                'description_5' => '<p>CV Adiwijaya Teknik berhasil menepis 807 peserta dan masuk 20 besar IMA Award 2024. Acara penghargaan yang diselenggarakan oleh Indonesia Marketing Association (IMA) ini bertujuan memberikan apreasiasi kepada pelaku UMKM yang dinilai unggul dalam inovasi, kreativitas, serta kontribusi bagi masyarakat. Rangkaian acara ini mulai dari pendaftaran, pembuatan Business Plan, pelatihan dan coaching , lalu diakhiri dengan pameran khusus peserta yang masuk 20 besar pada puncak acara IMA Award 2024. Semoga penghargaan ini menjadi pemacu CV Adiwijaya Teknik untuk terus maju dan berinovasi dalam usaha.</p>',
                'gallery_images' => [
                    'fe/img/elements/ima2024-1.jpeg',
                    'fe/img/elements/ima2024-2.jpeg',
                ],
            ],
        ];

        foreach ($blogsData as $blogData) {
            $slug = Str::slug($blogData['title'] . '-' . now()->format('Y-m-d-H-i-s'));

            $blog = Blog::create([
                'title' => $blogData['title'],
                'slug' => $slug,
                'content' => $blogData['content'],
                'image' => $blogData['image'],
                'status' => 'published',
                'author_id' => $author->id,
                'category' => $blogData['category'],
                'quote' => $blogData['quote'],
                'poster_name' => $author->name,
                'posted_at' => now(),
                'description_1' => $blogData['description_1'],
                'description_2' => $blogData['description_2'],
                'description_3' => $blogData['description_3'],
                'description_4' => $blogData['description_4'],
                'description_5' => $blogData['description_5'],
            ]);

            // Attach gallery images
            foreach ($blogData['gallery_images'] as $img) {
                BlogImage::create([
                    'blog_id' => $blog->id,
                    'image' => $img,
                    'caption' => null,
                ]);
            }
        }
    }
}
