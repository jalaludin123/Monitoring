<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriInformasi extends Model
{
    use HasFactory;
    protected $table = 'kategori_informasis';
    protected $fillable = [
        'kategori_informasi'
    ];
}