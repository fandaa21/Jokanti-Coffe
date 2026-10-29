<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();
        return view('about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'instagram' => 'nullable|url|max:255',
        'whatsapp' => 'nullable|url|max:255',
        'tokopedia' => 'nullable|url|max:255',
        'grabfood' => 'nullable|url|max:255',
        'gofood' => 'nullable|url|max:255',
    ]);

    $gambar = "";
    $logo = "";

    if ($request->id != NULL) {
        $dataLama = About::findOrfail($request->id);

        // Mengelola gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            Storage::delete('public/' . $dataLama->gambar);
            $gambar = $request->gambar->store('gambar', 'public');
        } else {
            $gambar = $dataLama->gambar;
        }

        // Mengelola logo jika ada file baru
        if ($request->hasFile('logo')) {
            Storage::delete('public/' . $dataLama->logo);
            $logo = $request->logo->store('logo', 'public');
        } else {
            $logo = $dataLama->logo;
        }

        $notif = "About berhasil diubah";
    } else {
        // Menyimpan gambar baru jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->gambar->store('gambar', 'public');
        }

        // Menyimpan logo baru jika ada
        if ($request->hasFile('logo')) {
            $logo = $request->logo->store('logo', 'public');
        }

        $notif = "About berhasil dibuat";
    }

    About::updateOrCreate(
        ['id' => $request->id],
        [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambar,
            'logo' => $logo,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'tokopedia' => $request->tokopedia,
            'grabfood' => $request->grabfood,
            'gofood' => $request->gofood,
        ]
    );

    return redirect()->route('about.index')->with('success', $notif);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'whatsapp' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tokopedia' => 'nullable|url',
            'grabfood' => 'nullable|url',
            'gofood' => 'nullable|url',
            'logo' => 'nullable|image|max:2048', // Untuk file gambar (opsional)
        ]);

        // Cari data About berdasarkan ID
        $about = About::findOrFail($id);

        // Perbarui data
        $about->judul = $validatedData['judul'];
        $about->isi = $validatedData['isi'];
        $about->whatsapp = $validatedData['whatsapp'];
        $about->instagram = $validatedData['instagram'];
        $about->tokopedia = $validatedData['tokopedia'];
        $about->grabfood = $validatedData['grabfood'];
        $about->gofood = $validatedData['gofood'];

        // Jika ada logo baru, upload file dan simpan path-nya
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $about->logo = $logoPath;
        }

        // Simpan perubahan
        $about->save();

        // Redirect atau response
        return redirect()->route('about.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        // Hapus gambar dari storage jika ada
    }
}
