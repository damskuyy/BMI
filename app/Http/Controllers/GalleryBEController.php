<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryBEController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('gallery_be.index', compact('galleries'));
    }

    public function create()
    {
        return view('gallery_be.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'event_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/gallery', $imageName);

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'image' => 'gallery/' . $imageName
        ]);

        return redirect()->route('gallery.index')
            ->with('success', 'Image added to gallery successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('gallery_be.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'event_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image) {
                Storage::delete('public/' . $gallery->image);
            }
            
            // Store new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/gallery', $imageName);
            $data['image'] = 'gallery/' . $imageName;
        }

        $gallery->update($data);

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery image updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::delete('public/' . $gallery->image);
        }
        
        $gallery->delete();

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery item deleted successfully.');
    }
}