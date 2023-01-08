<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas_perusahaan';
    protected $fillable = [
        'pengawasan_id',
        'nama_fasilitas',
        'kondisi_fasilitas',
        'gambar_fasilitas'
    ];

    /**
     * Get all of the comments for the Fasilitas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fasilitasPengawasan(): HasMany
    {
        return $this->hasMany(Pengawasan::class, 'pengawasan_id', 'id');
    }
}