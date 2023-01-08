<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $fillable = [
        'dis_name',
        'city_id'
    ];

    protected $id = 'dis_id';

    /**
     * Get the kota that owns the Kecamatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class, 'city_id', 'city_id');
    }
}