<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitProduksi extends Model
{
    use HasFactory;

    protected $table = 'unitproduksi';

    protected $fillable = [
        'kejuruan',
        'nama_up',
        'penanggung_jawab',
        'no_wa',
        'marketplace',
        'link_marketplace',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'up_id', 'id');
    }
}
