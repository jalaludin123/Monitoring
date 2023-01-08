<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Informasi extends Model
{
    use HasFactory;
    protected $table = 'informasis';
    protected $fillable = [
        'kategori_informasis_id',
        'name_informasi',
        'tentang',
        'file_informasi'
    ];

    /**
     * Get the user that owns the Informasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriInformasi::class, 'kategori_informasis_id', 'id');
    }
}