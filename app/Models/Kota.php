<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = [
        'city_name',
        'prov_id'
    ];

    protected $id = 'city_id';
}