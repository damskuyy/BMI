<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(15);
        return view('slider_be.index', compact('sliders'));
    }

    public function create()
    {
        $sections = Slider::$sections;
        return view('slider_be.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required|in:' . implode(',', array_keys(Slider::$sections)),
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'link' => 'nullable|url'
        ]);

        $data = $request->only(['title', 'link', 'section']);
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->extension();
            $path = $file->storeAs('sliders', $filename, 'public');
            $data['image'] = $path;
        }

        Slider::create($data);
        return redirect()->route('slider_be.index')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        $sections = Slider::$sections;
        return view('slider_be.edit', compact('slider', 'sections'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'section' => 'required|in:' . implode(',', array_keys(Slider::$sections)),
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'link' => 'nullable|url'
        ]);

        $data = $request->only(['title', 'link', 'section']);
        
        if ($request->hasFile('image')) {
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->extension();
            $path = $file->storeAs('sliders', $filename, 'public');
            $data['image'] = $path;
        } else {
            // Jika tidak ada foto baru, gunakan foto yang sebelumnya
            $data['image'] = $slider->image;
        }

        $slider->update($data);
        return redirect()->route('slider_be.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();
        return redirect()->route('slider_be.index')->with('success', 'Slider deleted successfully.');
    }
}
