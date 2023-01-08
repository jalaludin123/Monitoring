<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengawasan extends Model
{
    use HasFactory;
    protected $table = 'pengawasans';
    protected $fillable = [
        'perizinan_id',
        'user_id',
        'produk_jasa',
        'tenaga_kerja',
        'jumlah_bangunan',
        'luas_lahan',
        'no_surat_keterangan_domisili',
        'foto_perusahaan'
    ];

    /**
     * Get the user that owns the Pengawasan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function perizinan(): BelongsTo
    {
        return $this->belongsTo(Perizinan::class, 'perizinan_id', 'id');
    }

    /**
     * Get all of the comments for the Pengawasan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fasilitas(): HasMany
    {
        return $this->hasMany(Fasilitas::class, 'pengawasan_id', 'id');
    }
}