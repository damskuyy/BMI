<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

use Illuminate\Support\Facades\Auth;

class BlogDetailController extends Controller
{
    public function index()
    {
        return view('blog_details.index');
    } 

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->where('status','published')->firstOrFail();

        // top-level comments with replies
        $comments = $blog->comments()->whereNull('parent_id')->with('replies')->latest()->get();

        // supporting images for this blog
        $galleryImages = $blog->images()->latest()->get();

        // previous and next posts (by id)
        $previous = Blog::where('status','published')->where('id', '<', $blog->id)->orderBy('id','desc')->first();
        $next = Blog::where('status','published')->where('id', '>', $blog->id)->orderBy('id','asc')->first();

        // recent posts
        $recentPosts = Blog::where('status','published')->latest()->take(4)->get();

        // categories
        $categories = Blog::where('status','published')->whereNotNull('category')->distinct()->pluck('category');

        return view('blog_details.index', compact('blog','comments','galleryImages','previous','next','recentPosts','categories'));
    }
}
