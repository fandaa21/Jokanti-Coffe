<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasan = Ulasan::all();
        return view('ulasan.index', compact('ulasan'));
    }

    public function create()
    {
        return view('ulasan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'isi' => 'required|string',
            'nama' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        Ulasan::create($validated);

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil ditambahkan.');
    }

    public function edit(Ulasan $ulasan)
    {
        return view('ulasan.edit', compact('ulasan'));
    }

    public function update(Request $request, Ulasan $ulasan)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'isi' => 'required|string',
            'nama' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        $ulasan->update($validated);

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil diperbarui.');
    }

    public function destroy(Ulasan $ulasan)
    {
        if ($ulasan->gambar) {
            Storage::disk('public')->delete($ulasan->gambar);
        }

        $ulasan->delete();
        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil dihapus.');
    }
}
