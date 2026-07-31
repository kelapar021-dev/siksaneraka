<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FuzzyHasil extends Model
{
    protected $table = 'fuzzy_hasil';

    protected $fillable = [
        'penilaian_id',
        'nim',
        'nama_mahasiswa',
        'kehadiran',
        'nilai_tugas',
        'keaktifan_diskusi',
        'kehadiran_rendah',
        'kehadiran_sedang',
        'kehadiran_tinggi',
        'tugas_rendah',
        'tugas_sedang',
        'tugas_tinggi',
        'diskusi_rendah',
        'diskusi_sedang',
        'diskusi_tinggi',
        'detail_inferensi',
        'total_alpha_z',
        'total_alpha',
        'hasil_defuzzifikasi',
        'keterangan',
    ];

    protected $casts = [
        'kehadiran'           => 'float',
        'nilai_tugas'         => 'float',
        'keaktifan_diskusi'   => 'float',
        'kehadiran_rendah'    => 'float',
        'kehadiran_sedang'    => 'float',
        'kehadiran_tinggi'    => 'float',
        'tugas_rendah'        => 'float',
        'tugas_sedang'        => 'float',
        'tugas_tinggi'        => 'float',
        'diskusi_rendah'      => 'float',
        'diskusi_sedang'      => 'float',
        'diskusi_tinggi'      => 'float',
        'detail_inferensi'    => 'array',
        'total_alpha_z'       => 'float',
        'total_alpha'         => 'float',
        'hasil_defuzzifikasi' => 'float',
    ];

    public function penilaian(): BelongsTo
    {
        return $this->belongsTo(PenilaianAkademik::class, 'penilaian_id');
    }
}
