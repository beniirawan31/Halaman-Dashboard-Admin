<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('Admin.Buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('Admin.Buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'nama_pengarang' => 'required|string',
            'kategori' => 'required|string',
            'deskription' => 'required|string',
            'information' => 'required|string',
            'harga' => 'required|numeric',
            'diskon' => 'required|numeric',
            'stock' => 'required|numeric',
            'sold' => 'required|numeric',
            'rating' => 'required|numeric',
            'point' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('bukus', 'public');
        }

        $totalHarga = $request->harga - ($request->harga * $request->diskon / 100);

        Buku::create([
            'title' => $request->title,
            'nama_pengarang' => $request->nama_pengarang,
            'kategori' => $request->kategori,
            'deskription' => $request->deskription,
            'information' => $request->information,
            'harga' => $request->harga,
            'diskon' => $request->diskon,
            'total_harga' => $totalHarga,
            'stock' => $request->stock,
            'sold' => $request->sold,
            'rating' => $request->rating,
            'point' => $request->point,
            'image' => $imagePath,
        ]);

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('Admin.Buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'nama_pengarang' => 'required|string',
            'kategori' => 'required|string',
            'deskription' => 'required|string',
            'information' => 'required|string',
            'harga' => 'required|numeric',
            'diskon' => 'required|numeric',
            'stock' => 'required|numeric',
            'sold' => 'required|numeric',
            'rating' => 'required|numeric',
            'point' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        $imagePath = $buku->image;

        if ($request->hasFile('image')) {
            if ($buku->image && Storage::disk('public')->exists($buku->image)) {
                Storage::disk('public')->delete($buku->image);
            }

            $imagePath = $request->file('image')->store('bukus', 'public');
        }

        $totalHarga = $request->harga - ($request->harga * $request->diskon / 100);

        $buku->update([
            'title' => $request->title,
            'nama_pengarang' => $request->nama_pengarang,
            'kategori' => $request->kategori,
            'deskription' => $request->deskription,
            'information' => $request->information,
            'harga' => $request->harga,
            'diskon' => $request->diskon,
            'total_harga' => $totalHarga,
            'stock' => $request->stock,
            'sold' => $request->sold,
            'rating' => $request->rating,
            'point' => $request->point,
            'image' => $imagePath,
        ]);

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->image && Storage::disk('public')->exists($buku->image)) {
            Storage::disk('public')->delete($buku->image);
        }

        $buku->delete();

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil dihapus!');
    }
}
