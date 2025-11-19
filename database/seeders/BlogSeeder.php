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
        $author = User::firstWhere('email', 'organizer@bmi.local');
        if (! $author) {
            $author = User::create([
                'name' => 'BMI Organizer',
                'email' => 'organizer@bmi.local',
                'password' => Hash::make('password'),
                'foto' => null,
            ]);
        }

        $title = 'Gathering Bulanan BMI - ' . now()->format('F Y');
        $slug = Str::slug('gathering-bulanan-bmi-' . now()->format('Y-m'));

        // Use existing public image under public/fe/img/blog as feature image
        $imagePath = 'fe/img/blog/single_blog_1.png';

        Blog::create([
            'title' => $title,
            'slug' => $slug,
            'content' => '<p>Gathering bulanan BMI adalah kesempatan bagi anggota untuk bersilaturahmi, berbagi pengalaman, dan membahas agenda organisasi.</p>',
            'image' => $imagePath,
            'status' => 'published',
            'author_id' => $author->id,
            'category' => 'Event',
            'quote' => 'Bersama kita maju — Gathering Bulanan BMI',
            'poster_name' => $author->name,
            'posted_at' => now(),
            'description_1' => '<p><strong>Agenda:</strong> Sharing pengalaman, pembahasan kegiatan, dan networking.</p><p><img src="/fe/img/blog/single_blog_2.png" alt="Gathering BMI" style="max-width:100%;height:auto;border-radius:6px;"/></p>',
            'description_2' => '<p><strong>Waktu & Tempat:</strong> Setiap akhir pekan terakhir setiap bulan, bergiliran di ruang pertemuan BMI.</p><p><img src="/fe/img/blog/single_blog_3.png" alt="Waktu & Tempat" style="max-width:100%;height:auto;border-radius:6px;"/></p>',
            'description_3' => '<p><strong>Peserta:</strong> Anggota BMI dan tamu undangan. Terbuka untuk semua yang tertarik bergabung.</p><p><img src="/fe/img/blog/single_blog_4.png" alt="Peserta" style="max-width:100%;height:auto;border-radius:6px;"/></p>',
            'description_4' => '<p><strong>Highlight:</strong> Presentasi proyek anggota, workshop singkat, dan sesi Q&A.</p><p><img src="/fe/img/blog/single_blog_5.png" alt="Highlight" style="max-width:100%;height:auto;border-radius:6px;"/></p>',
            'description_5' => '<p>Untuk informasi lebih lanjut, silakan hubungi panitia melalui email <a href="mailto:organizer@bmi.local">organizer@bmi.local</a>.</p>',
        ]);
        // attach supporting images to blog gallery (small images shown in gallery)
        $blog = Blog::where('slug', $slug)->first();
        if ($blog) {
            $imgs = [
                'fe/img/blog/single_blog_2.png',
                'fe/img/blog/single_blog_3.png',
                'fe/img/blog/single_blog_4.png',
                'fe/img/blog/single_blog_5.png',
            ];
            foreach ($imgs as $i) {
                BlogImage::create([
                    'blog_id' => $blog->id,
                    'image' => $i,
                    'caption' => null,
                ]);
            }
        }
    }
}
