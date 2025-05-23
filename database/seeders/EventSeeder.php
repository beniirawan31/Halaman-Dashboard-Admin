<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::truncate(); // Hapus data lama, hati-hati kalau di production

        Event::insert([
            [
                'title' => 'Event Laravel Basics',
                'description' => 'Belajar dasar-dasar Laravel',
                'image' => null,
                'type' => 'seminar',
                'speaker' => 'John Doe',
                'harga' => 100000,
                'diskon' => 10,
                'total_harga' => 90000,
                'quota' => 50,
                'point' => 10,
                'status' => 'aktif',
                'information' => 'Online event via Zoom',
                'kategori' => 'laravel',
            ],
            [
                'title' => 'Flutter Workshop',
                'description' => 'Workshop Flutter untuk pemula',
                'image' => null,
                'type' => 'webinar',
                'speaker' => 'Jane Smith',
                'harga' => 150000,
                'diskon' => 5,
                'total_harga' => 142500,
                'quota' => 30,
                'point' => 15,
                'status' => 'aktif',
                'information' => 'Online event',
                'kategori' => 'flutter',
            ],
            // Tambah 4 data lainnya...
        ]);
    }
}
