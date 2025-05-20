<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';

    protected $fillable = [
        'nama',
        'produk',
        'harga',
        'diskon',
        'tanggal',
    ];

    // Accessor untuk total bayar, dihitung otomatis dari harga dan diskon
    public function getTotalBayarAttribute()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
}
