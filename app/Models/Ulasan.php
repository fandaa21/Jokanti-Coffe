<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ulasan extends Model
{
    use HasFactory;
    //nama table
        protected $table = 'ulasan';

        public $timestamps = false;

        // nama kolom
        protected $fillable = [
            'rating',
            'isi',
            'nama',
            'gambar',
        ];
}
