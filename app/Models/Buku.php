<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = [
        'title',
        'image',
        'nama_pengarang',
        'kategori',
        'deskription',
        'information',
        'harga',
        'diskon',
        'total_harga',
        'stock',
        'sold',
        'rating',
        'point',
    ];


    public function getTotalHargaAttribute()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

}

