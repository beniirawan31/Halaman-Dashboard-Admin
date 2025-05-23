<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'type',          // Jenis event: promo, diskon, seminar, dll
        'speaker',
        'harga',
        'diskon',
        'total_harga',
        'quota',
        'point',
        'status',        // Aktif / Nonaktif
        'information',
        'kategori',
    ];

    // Accessor: Hitung total harga setelah diskon
    public function getTotalHargaAttribute()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
}
