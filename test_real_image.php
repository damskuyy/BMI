<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

// Create a simple test image (1x1 pixel PNG)
$pngData = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==');

$filename = 'blog-test-' . time() . '.png';
$path = Storage::disk('public')->put('blog/' . $filename, $pngData);

echo "✓ Test image created: blog/{$filename}\n";
echo "  Storage URL: " . Storage::url('blog/' . $filename) . "\n";
echo "  File exists: " . (Storage::disk('public')->exists('blog/' . $filename) ? 'YES' : 'NO') . "\n";

// Create a blog with this image
$user = \App\Models\User::first();
$blog = Blog::create([
    'title' => 'Blog with Real Image',
    'slug' => 'blog-with-real-image',
    'content' => '<p>This blog post has a real image file uploaded.</p>',
    'image' => 'blog/' . $filename,
    'status' => 'published',
    'author_id' => $user->id,
    'category' => 'Testing',
    'quote' => 'Test quote',
    'poster_name' => 'Test Admin',
    'posted_at' => now()
]);

echo "\n✓ Blog created (ID: {$blog->id})\n";
echo "  Image DB path: {$blog->image}\n";
echo "  Image URL: " . Storage::url($blog->image) . "\n";
