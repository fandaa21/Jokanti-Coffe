<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    //nama table
    protected $table = 'product';

    public $timestamps = false;

    // nama kolom
    protected $fillable = [
        'judul',
        'deskripsi',
        'harga',
        'gambar',
    ];
}
