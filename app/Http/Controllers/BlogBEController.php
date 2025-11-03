<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogBEController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('blog_be.index', compact('blogs'));
    }

    public function create()
    {
        return view('blog_be.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/blog', $imageName);

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => 'blog/' . $imageName,
            'status' => $request->status,
            'author_id' => auth()->id()
        ]);

        return redirect()->route('blog.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('blog_be.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'status' => $request->status
        ];

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::delete('public/' . $blog->image);
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/blog', $imageName);
            $data['image'] = 'blog/' . $imageName;
        }

        $blog->update($data);

        return redirect()->route('blog.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::delete('public/' . $blog->image);
        }
        
        $blog->delete();

        return redirect()->route('blog.index')
            ->with('success', 'Blog post deleted successfully.');
    }
}