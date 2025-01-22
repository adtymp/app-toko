<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'image',
        'nama_produk',
        'gender',
        'kategori',
        'price',
        'stok'
    ];
}
