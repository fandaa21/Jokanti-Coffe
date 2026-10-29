<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();
        $product->judul = $request->judul;
        $product->deskripsi = $request->deskripsi;
        $product->harga = $request->harga;

        if ($request->hasFile('gambar')) {
            $product->gambar = $request->file('gambar')->store('images', 'public');
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->judul = $request->judul;
        $product->deskripsi = $request->deskripsi;
        $product->harga = $request->harga;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }
            $product->gambar = $request->file('gambar')->store('images', 'public');
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Hapus gambar jika ada
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus.');
    }
}
?>
