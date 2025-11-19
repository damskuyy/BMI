<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $q = request()->input('q');
        $query = Blog::where('status','published');
        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('title','like', "%{$q}%")
                    ->orWhere('content','like', "%{$q}%")
                    ->orWhere('category','like', "%{$q}%");
            });
        }

        $blogs = $query->latest()->paginate(6)->withQueryString();
        return view('blog.index', compact('blogs'));
    }
}
