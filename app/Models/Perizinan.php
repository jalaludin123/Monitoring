<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Perizinan extends Model
{
    use HasFactory;
    protected $table = 'perizinans';
    protected $fillable = [
        'name_perusahan',
        'user_id',
        'name_penangungJawab',
        'phone_perusahan',
        'email_perusahan',
        'nib',
        'sektor',
        'badan_usaha',
        'skala_usaha',
        'file_perizinan',
        'status_perizinan',
        'kbli',
        'alamat_perusahan',
        'kecamatan',
        'kelurahan'
    ];

    /**
     * Get the user that owns the Perizinan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the kecamatan that owns the Perizinan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getKecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan', 'dis_id');
    }

    /**
     * Get the user that owns the Perizinan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getKelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan', 'subdis_id');
    }

    /**
     * Get all of the comments for the Perizinan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengawasan(): HasMany
    {
        return $this->hasMany(Pengawasan::class, 'perizinan_id', 'id');
    }

    /**
     * Get the user associated with the Perizinan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function verifikasi(): HasOne
    {
        return $this->hasOne(Pengawasan::class, 'perizinan_id', 'id');
    }
}