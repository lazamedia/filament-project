<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi
    protected $fillable = [
        'name', 'slug', 'description', 'kategori_produks_id', 'original_price', 'sale_price', 'sold', 'image', 'link_drive'
    ];


    public function kategoriProduk()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk_id');
    }

}
