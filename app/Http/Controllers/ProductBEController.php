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
            'category' => 'nullable|string|max:100',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096'
        ]);

        $data = $request->only(['name','description','category','price']);
        $data['slug'] = Str::slug($data['name'] ?? time());

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->extension();
            $file->storeAs('public/products', $filename);
            $data['image'] = 'products/' . $filename;
        }

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
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
            'category' => 'nullable|string|max:100',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096'
        ]);

        $data = $request->only(['name','description','category','price']);
        $data['slug'] = Str::slug($data['name'] ?? $product->name);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->extension();
            $file->storeAs('public/products', $filename);
            $data['image'] = 'products/' . $filename;
        }

        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted.');
    }
}