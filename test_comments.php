<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Blog;
use App\Models\Comment;

$blog = Blog::where('slug', 'test-blog-post')->first();

if ($blog) {
    // Test 1: Add a guest comment
    $comment1 = Comment::create([
        'blog_id' => $blog->id,
        'user_id' => null,
        'parent_id' => null,
        'name' => 'John Guest',
        'comment' => 'This is a great blog post! Thanks for sharing.'
    ]);
    echo "✓ Guest comment created (ID: {$comment1->id})\n";

    // Test 2: Add an authenticated comment
    $user = \App\Models\User::first();
    $comment2 = Comment::create([
        'blog_id' => $blog->id,
        'user_id' => $user->id,
        'parent_id' => null,
        'name' => $user->name,
        'comment' => 'Excellent insights! I learned a lot from this.'
    ]);
    echo "✓ Authenticated comment created (ID: {$comment2->id})\n";

    // Test 3: Add a reply to first comment
    $reply = Comment::create([
        'blog_id' => $blog->id,
        'user_id' => null,
        'parent_id' => $comment1->id,
        'name' => 'Jane Reply',
        'comment' => 'I agree! Very insightful.'
    ]);
    echo "✓ Reply created (ID: {$reply->id}, Parent: {$comment1->id})\n";

    // Test 4: Load blog with comments and replies
    $blog->refresh();
    $comments = $blog->comments()->whereNull('parent_id')->with('replies')->latest()->get();
    
    echo "\n=== Blog Comments ===\n";
    echo "Total comments on blog: " . $blog->comments()->count() . "\n";
    echo "Top-level comments: " . $comments->count() . "\n";
    
    foreach ($comments as $comment) {
        echo "- [{$comment->id}] {$comment->name}: \"{$comment->comment}\" (" . $comment->created_at->format('d M Y H:i') . ")\n";
        if ($comment->replies->count() > 0) {
            foreach ($comment->replies as $rep) {
                echo "  └─ [{$rep->id}] {$rep->name}: \"{$rep->comment}\"\n";
            }
        }
    }

    echo "\n✓ All comment tests passed!\n";
} else {
    echo "✗ Blog not found\n";
}
