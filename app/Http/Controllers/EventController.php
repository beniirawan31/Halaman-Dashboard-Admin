<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(5); // paginate 5 item per halaman
        return view('Admin.Event.index', compact('events'));
    }

    // Form create event
    public function create()
    {
        return view('Admin.Event.create');
    }

    // Simpan event baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'type' => 'required|string',
            'speaker' => 'nullable|string|max:255',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'quota' => 'nullable|integer|min:0',
            'point' => 'nullable|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
            'information' => 'nullable|string',
            'kategori' => 'required|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        }

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->image = $imagePath;
        $event->type = $request->type;
        $event->speaker = $request->speaker;
        $event->harga = $request->harga;
        $event->diskon = $request->diskon ?? 0;
        $event->total_harga = $event->harga - ($event->harga * $event->diskon / 100); // dihitung manual karena kolom disimpan
        $event->quota = $request->quota;
        $event->point = $request->point ?? 0;
        $event->status = $request->status;
        $event->information = $request->information;
        $event->kategori = $request->kategori;
        $event->save();

        return redirect()->route('events.index')->with('success', 'Event berhasil dibuat.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('Admin.Event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'type' => 'required|string',
            'speaker' => 'nullable|string|max:255',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'quota' => 'nullable|integer|min:0',
            'point' => 'nullable|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
            'information' => 'nullable|string',
            'kategori' => 'required|string',
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            // Simpan gambar baru
            $event->image = $request->file('image')->store('events', 'public');
        }

        $event->title = $request->title;
        $event->description = $request->description;
        $event->type = $request->type;
        $event->speaker = $request->speaker;
        $event->harga = $request->harga;
        $event->diskon = $request->diskon ?? 0;
        $event->total_harga = $event->harga - ($event->harga * $event->diskon / 100);
        $event->quota = $request->quota;
        $event->point = $request->point ?? 0;
        $event->status = $request->status;
        $event->information = $request->information;
        $event->kategori = $request->kategori;

        $event->save();

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        // Hapus event dari database
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus.');
    }
}
