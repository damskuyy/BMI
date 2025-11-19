<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Blog;

// Delete blogs with broken images
Blog::where('id', '<', 3)->delete();

echo "✓ Cleaned up old blog records\n";

// Show current blogs
$blogs = Blog::all();
echo "\n=== Current Blogs ===\n";
foreach ($blogs as $blog) {
    echo "- [{$blog->id}] {$blog->title}\n";
    echo "  Image: {$blog->image}\n";
    echo "  URL: http://127.0.0.1:8000/storage/{$blog->image}\n";
    echo "  Comments: " . $blog->comments()->count() . "\n\n";
}
