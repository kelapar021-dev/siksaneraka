<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'email',
        'no_hp',
        'prodi',
        'fakultas',
        'semester',
        'ipk',
        'agama',
        'status',
        'asal_sekolah',
        'nama_ayah',
        'nama_ibu'
    ];
}