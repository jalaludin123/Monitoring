<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'subdistricts';
    protected $fillable = [
        'subdis_name',
        'dis_id'
    ];

    protected $id = 'subdis_id';
}