<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'gambar_produk',
        'up_id',
        'nama_produk',
        'harga_produk',
        'detail_produk',
        'kategori_produk',
        'status_produk',
        'stok_produk',
    ];

    public function unitproduksi()
    {
        return $this->belongsTo(UnitProduksi::class, 'up_id', 'id');
    }
}
