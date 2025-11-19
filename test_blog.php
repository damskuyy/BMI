<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use App\Models\Blog;

$user = User::first();
if ($user) {
    $blog = Blog::create([
        'title' => 'Test Blog Post',
        'slug' => 'test-blog-post',
        'content' => '<p>This is a test blog post with HTML content.</p><p>It has multiple paragraphs.</p>',
        'image' => 'blog/test.jpg',
        'status' => 'published',
        'author_id' => $user->id,
        'category' => 'Technology',
        'quote' => 'The best time to plant a tree was 20 years ago.',
        'poster_name' => 'Admin User',
        'posted_at' => now()
    ]);
    echo "✓ Blog created: " . $blog->title . " (ID: " . $blog->id . ", Slug: " . $blog->slug . ")\n";
} else {
    echo "✗ No user found\n";
}
