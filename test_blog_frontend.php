<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Blog;

// Test frontend blog index query
$blogs = Blog::where('status', 'published')->latest()->take(5)->get();
echo "=== Frontend Blog List ===\n";
echo "Published blogs found: " . $blogs->count() . "\n";

foreach ($blogs as $blog) {
    $excerpt = substr(strip_tags($blog->content), 0, 50) . '...';
    echo "- [{$blog->id}] {$blog->title} | Category: {$blog->category} | Comments: " . $blog->comments()->count() . "\n";
}

// Test blog details
echo "\n=== Blog Details (by slug) ===\n";
$blog = Blog::where('slug', 'test-blog-post')->where('status', 'published')->first();
if ($blog) {
    echo "Title: {$blog->title}\n";
    echo "Category: {$blog->category}\n";
    echo "Quote: {$blog->quote}\n";
    echo "Poster: {$blog->poster_name}\n";
    echo "Posted At: " . ($blog->posted_at ? $blog->posted_at->format('d M Y H:i') : 'N/A') . "\n";
    echo "Comments Count: " . $blog->comments()->count() . "\n";
    echo "✓ Blog details loaded successfully\n";
} else {
    echo "✗ Blog not found by slug\n";
}
