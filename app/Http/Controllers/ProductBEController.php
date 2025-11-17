<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductBEController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('product_be.index', compact('products'));
    }

    public function create()
    {
        return view('product_be.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:manufaktur,kuliner,kerajinan',
            'ordering_method' => 'required|in:marketplace,whatsapp',
            'shopee_link' => 'nullable|url',
            'tokopedia_link' => 'nullable|url',
            'phone' => 'nullable|string|max:20',
            'use_default_phone' => 'nullable|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp'
        ]);

        $data = $request->only(['name','description','category','ordering_method','shopee_link','tokopedia_link','phone']);
        $data['slug'] = Str::slug($data['name'] ?? time());
        $data['use_default_phone'] = $request->boolean('use_default_phone');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->extension();
            $path = $file->storeAs('products', $filename, 'public');
            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()->route('product_be.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('product_be.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:manufaktur,kuliner,kerajinan',
            'ordering_method' => 'required|in:marketplace,whatsapp',
            'shopee_link' => 'nullable|url',
            'tokopedia_link' => 'nullable|url',
            'phone' => 'nullable|string|max:20',
            'use_default_phone' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp'
        ]);

        $data = $request->only(['name','description','category','ordering_method','shopee_link','tokopedia_link','phone']);
        $data['slug'] = Str::slug($data['name'] ?? $product->name);
        $data['use_default_phone'] = $request->boolean('use_default_phone');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->extension();
            $path = $file->storeAs('products', $filename, 'public');
            $data['image'] = $path;
        }

        $product->update($data);

        return redirect()->route('product_be.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('product_be.index')->with('success', 'Product deleted.');
    }
}