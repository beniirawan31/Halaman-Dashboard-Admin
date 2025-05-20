<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Andi',
                'produk' => 'Laptop Gaming',
                'harga' => 15000000,
                'diskon' => 10, // 10%
                'tanggal' => Carbon::parse('2025-05-01'),
            ],
            [
                'nama' => 'Budi',
                'produk' => 'Smartphone',
                'harga' => 7000000,
                'diskon' => 5,  // 5%
                'tanggal' => Carbon::parse('2025-05-02'),
            ],
            [
                'nama' => 'Citra',
                'produk' => 'Headphone',
                'harga' => 1500000,
                'diskon' => 0,
                'tanggal' => Carbon::parse('2025-05-03'),
            ],
            [
                'nama' => 'Dewi',
                'produk' => 'Smartwatch',
                'harga' => 2500000,
                'diskon' => 15,
                'tanggal' => Carbon::parse('2025-05-04'),
            ],
            [
                'nama' => 'Eko',
                'produk' => 'Keyboard Mechanical',
                'harga' => 1200000,
                'diskon' => 20,
                'tanggal' => Carbon::parse('2025-05-05'),
            ],
            [
                'nama' => 'Fani',
                'produk' => 'Monitor 24 inch',
                'harga' => 3000000,
                'diskon' => 10,
                'tanggal' => Carbon::parse('2025-05-06'),
            ],
        ];

        foreach ($data as $item) {
            Transaksi::create($item);
        }
    }
}
