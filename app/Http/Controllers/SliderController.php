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
        $sliders = Slider::latest()->paginate(10);
        return view('slider_be.index', compact('sliders'));
    }

    public function create()
    {
        return view('slider_be.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|url'
        ]);

        $data = $request->only(['title', 'link']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->extension();
            $file->storeAs('public/sliders', $filename);
            $data['image'] = 'sliders/' . $filename;
        }

        Slider::create($data);
        return redirect()->route('slider.index')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('slider_be.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|url'
        ]);

        $data = $request->only(['title', 'link']);
        if ($request->hasFile('image')) {
            if ($slider->image) {
                Storage::delete('public/' . $slider->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->extension();
            $file->storeAs('public/sliders', $filename);
            $data['image'] = 'sliders/' . $filename;
        }

        $slider->update($data);
        return redirect()->route('slider.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::delete('public/' . $slider->image);
        }
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
    }
}
