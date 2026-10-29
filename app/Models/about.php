<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class about extends Model
{
    use HasFactory;

    protected $table = 'about';

    public $timestamps = false;

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'logo',
        'whatsapp',
        'instagram',
        'tokopedia',
        'grabfood',
        'gofood',
    ];
}
