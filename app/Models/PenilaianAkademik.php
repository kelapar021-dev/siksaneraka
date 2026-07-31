<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PenilaianAkademik extends Model
{
    protected $table = 'penilaian_akademik';

    protected $fillable = [
        'mahasiswa_id',
        'jadwal_id',
        'kehadiran',
        'nilai_tugas',
        'keaktifan_diskusi',
        'skor_fuzzy',
        'keterangan',
    ];

    protected $casts = [
        'kehadiran'         => 'float',
        'nilai_tugas'       => 'float',
        'keaktifan_diskusi' => 'float',
        'skor_fuzzy'        => 'float',
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function fuzzyHasil(): HasOne
    {
        return $this->hasOne(FuzzyHasil::class, 'penilaian_id');
    }
}
