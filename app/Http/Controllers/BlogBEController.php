<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BlogBEController extends Controller
{
    public function index()
    {
        $q = request()->input('q');
        $query = Blog::query();
        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('title', 'like', "%{$q}%")
                    ->orWhere('content', 'like', "%{$q}%")
                    ->orWhere('category', 'like', "%{$q}%");
            });
        }

        $blogs = $query->latest()->paginate(10)->withQueryString();
        return view('blog_be.index', compact('blogs', 'q'));
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
            'supporting_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description_1' => 'nullable|string',
            'description_2' => 'nullable|string',
            'description_3' => 'nullable|string',
            'description_4' => 'nullable|string',
            'description_5' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'category' => 'nullable|string|max:255',
            'quote' => 'nullable|string|max:255',
            'poster_name' => 'nullable|string|max:255',
            'posted_at' => 'nullable|date'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $imagePath = $image->storeAs('blog', $imageName, 'public');

        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'image' => $imagePath,
            'status' => $request->input('status'),
            'author_id' => Auth::id(),
            'category' => $request->input('category'),
            'quote' => $request->input('quote'),
            'poster_name' => $request->input('poster_name')
        ];

        // include description sections if provided
        for ($i = 1; $i <= 5; $i++) {
            $field = 'description_' . $i;
            if ($request->filled($field)) {
                $data[$field] = $request->input($field);
            }
        }

        if ($request->filled('posted_at')) {
            $data['posted_at'] = Carbon::parse($request->input('posted_at'));
        }

        $blog = Blog::create($data);

        // handle supporting images (supporting_images[])
        if ($request->hasFile('supporting_images')) {
            foreach ($request->file('supporting_images') as $img) {
                if (!$img->isValid()) continue;
                $name = time() . '_' . uniqid() . '.' . $img->extension();
                $path = $img->storeAs('blog/supporting', $name, 'public');
                BlogImage::create(['blog_id' => $blog->id, 'image' => $path]);
            }
        }

        return redirect()->route('blog_be.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog_be.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'supporting_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description_1' => 'nullable|string',
            'description_2' => 'nullable|string',
            'description_3' => 'nullable|string',
            'description_4' => 'nullable|string',
            'description_5' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'category' => 'nullable|string|max:255',
            'quote' => 'nullable|string|max:255',
            'poster_name' => 'nullable|string|max:255',
            'posted_at' => 'nullable|date'
        ]);

        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'category' => $request->input('category'),
            'quote' => $request->input('quote'),
            'poster_name' => $request->input('poster_name')
        ];

        if ($request->filled('posted_at')) {
            $data['posted_at'] = Carbon::parse($request->input('posted_at'));
        } else {
            $data['posted_at'] = null;
        }

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($blog->image) {
                try {
                    Storage::disk('public')->delete($blog->image);
                } catch (\Throwable $e) {
                    // don't block update if delete fails
                    Log::warning('Failed to delete old blog image', ['id' => $blog->id, 'err' => $e->getMessage()]);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('blog', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        // include description sections if provided
        for ($i = 1; $i <= 5; $i++) {
            $field = 'description_' . $i;
            if ($request->filled($field)) {
                $data[$field] = $request->input($field);
            } else {
                // ensure key exists so update doesn't accidentally remove columns
                $data[$field] = $blog->{$field} ?? null;
            }
        }

        // handle new supporting images added in update
        if ($request->hasFile('supporting_images')) {
            foreach ($request->file('supporting_images') as $img) {
                if (!$img->isValid()) continue;
                $name = time() . '_' . uniqid() . '.' . $img->extension();
                $path = $img->storeAs('blog/supporting', $name, 'public');
                BlogImage::create(['blog_id' => $blog->id, 'image' => $path]);
            }
        }

        $blog->update($data);

        return redirect()->route('blog_be.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image) {
            try {
                Storage::disk('public')->delete($blog->image);
            } catch (\Throwable $e) {
                Log::warning('Failed to delete blog image on destroy', ['id' => $blog->id, 'err' => $e->getMessage()]);
            }
        }

        $blog->delete();

        return redirect()->route('blog_be.index')
            ->with('success', 'Blog deleted.');
    }
}