<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class GalleryBEController extends Controller
{
    public function index()
    {
        // eager load images for thumbnails/count
        $galleries = Gallery::with('images')->latest()->paginate(12);
        return view('gallery_be.index', compact('galleries'));
    }

    public function create()
    {
        return view('gallery_be.create');
    }

    public function store(Request $request)
    {
        Log::info('Gallery store request received');
        Log::info('Has images: ' . ($request->hasFile('images') ? 'YES' : 'NO'));
        Log::info('File count: ' . count($request->file('images') ?? []));
        
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'event_date' => 'required|date',
            'images.*' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $gallery = Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
        ]);

        Log::info('Gallery created with ID: ' . $gallery->id);

        // handle multiple uploaded images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $img) {
                try {
                    $imageName = uniqid() . '_' . $index . '.' . $img->extension();
                    Log::info('Attempting to store image: ' . $imageName . ' to disk public');
                    
                    $path = $img->storeAs('gallery', $imageName, 'public');
                    
                    if ($path === false) {
                        Log::error('Failed to store image: ' . $imageName . ' - storeAs returned false');
                        continue;
                    }
                    
                    Log::info('Image stored successfully: ' . $path);

                    // get display mode for this index if provided
                    $mode = 'col-4';
                    if ($request->filled('display_mode') && isset($request->display_mode[$index])) {
                        $dm = $request->display_mode[$index];
                        if (in_array($dm, ['col-4','col-6'])) {
                            $mode = $dm;
                        }
                    }

                    // get center option for this index if provided
                    $center = false;
                    if ($request->filled('center_image') && in_array($index, $request->center_image)) {
                        $center = true;
                    }

                    GalleryImage::create([
                        'gallery_id' => $gallery->id,
                        'image' => $path,
                        'display_mode' => $mode,
                        'center_image' => $center,
                    ]);
                } catch (\Exception $e) {
                    Log::error('Exception storing image: ' . $e->getMessage());
                }
            }
        }

        return redirect()->route('gallery_be.index')
            ->with('success', 'Gallery created successfully.');
    }

    public function edit(Gallery $gallery)
    {
        $gallery->load('images');
        return view('gallery_be.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'event_date' => 'required|date',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);

        $gallery->update([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
        ]);

        // update existing image display modes
        if ($request->filled('existing_display_mode')) {
            foreach ($request->existing_display_mode as $id => $mode) {
                $img = GalleryImage::find($id);
                if ($img && in_array($mode, ['col-4','col-6'])) {
                    $img->update(['display_mode' => $mode]);
                }
            }
        }

        // update center_image status for existing images
        if ($request->filled('existing_center_image')) {
            // Mark all checked images as centered
            foreach ($request->existing_center_image as $id) {
                $img = GalleryImage::find($id);
                if ($img) {
                    $img->update(['center_image' => true]);
                }
            }
        }
        // Uncheck all images not in the center_image list
        $allImageIds = $gallery->images()->pluck('id')->toArray();
        foreach ($allImageIds as $id) {
            if (!$request->filled('existing_center_image') || !in_array($id, $request->existing_center_image)) {
                $img = GalleryImage::find($id);
                if ($img) {
                    $img->update(['center_image' => false]);
                }
            }
        }

        // remove images if requested
        if ($request->filled('remove_image_ids')) {
            foreach ($request->remove_image_ids as $id) {
                $img = GalleryImage::find($id);
                if ($img) {
                    Storage::delete('public/' . $img->image);
                    $img->delete();
                }
            }
        }

        // add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $imgFile) {
                try {
                    $imageName = uniqid() . '_u' . $index . '.' . $imgFile->extension();
                    Log::info('Attempting to store updated image: ' . $imageName . ' to disk public');
                    
                    $path = $imgFile->storeAs('gallery', $imageName, 'public');
                    
                    if ($path === false) {
                        Log::error('Failed to store updated image: ' . $imageName . ' - storeAs returned false');
                        continue;
                    }
                    
                    Log::info('Image updated/added: ' . $path);

                    $mode = 'col-4';
                    if ($request->filled('display_mode') && isset($request->display_mode[$index])) {
                        $dm = $request->display_mode[$index];
                        if (in_array($dm, ['col-4','col-6'])) {
                            $mode = $dm;
                        }
                    }

                    // get center option for new images
                    $center = false;
                    if ($request->filled('center_image') && in_array($index, $request->center_image)) {
                        $center = true;
                    }

                    GalleryImage::create([
                        'gallery_id' => $gallery->id,
                        'image' => $path,
                        'display_mode' => $mode,
                        'center_image' => $center,
                    ]);
                } catch (\Exception $e) {
                    Log::error('Exception storing updated image: ' . $e->getMessage());
                }
            }
        }

        return redirect()->route('gallery_be.index')
            ->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        try {
            Log::info('Starting gallery deletion for ID: ' . $gallery->id);
            Log::info('Gallery class: ' . (is_object($gallery) ? get_class($gallery) : gettype($gallery)));
            Log::info('Gallery attributes: ' . json_encode(is_object($gallery) ? $gallery->getAttributes() : []));

            // delete related images files
            $imageCount = is_object($gallery) ? $gallery->images()->count() : 0;
            Log::info('Found ' . $imageCount . ' images to delete');

            foreach ($gallery->images as $img) {
                if ($img->image) {
                    Log::info('Deleting file: ' . $img->image);
                    Storage::delete('public/' . $img->image);
                }
            }

            Log::info('Deleting gallery record ID: ' . $gallery->id);
            $result = $gallery->delete();
            Log::info('Gallery delete result: ' . ($result ? 'TRUE' : 'FALSE'));

            return redirect()->route('gallery_be.index')
                ->with('success', 'Gallery item deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting gallery: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect()->route('gallery_be.index')
                ->with('error', 'Failed to delete gallery: ' . $e->getMessage());
        }
    }
}