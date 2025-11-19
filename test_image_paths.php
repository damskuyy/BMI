<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

// Check existing blogs
$blogs = Blog::all();
echo "=== Existing Blogs ===\n";
foreach ($blogs as $blog) {
    echo "ID: {$blog->id}\n";
    echo "  Title: {$blog->title}\n";
    echo "  Image path (DB): {$blog->image}\n";
    echo "  Image URL: " . Storage::url($blog->image) . "\n";
    echo "  Image exists: " . (Storage::disk('public')->exists($blog->image) ? 'YES' : 'NO') . "\n";
    echo "\n";
}

// List all files in public/blog directory
echo "=== Files in storage/app/public/blog ===\n";
$files = Storage::disk('public')->files('blog');
if (count($files) > 0) {
    foreach ($files as $file) {
        echo "- $file\n";
    }
} else {
    echo "No files found\n";
}
