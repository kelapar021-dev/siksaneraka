<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class UserAksesSeeder extends Seeder
{
    use WithoutModelEvents;
 
    public function run(): void
    {
        // role_id: 1=admin, 2=dosen, 3=mahasiswa
        DB::table('user_akses')->insert([
            [
                'username'   => 'admin',
                'email'      => 'admin@absensi.ac.id',
                'password'   => md5('admin123'),
                'role_id'    => 1,
                'is_active'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'dosen01',
                'email'      => 'budi.santoso@absensi.ac.id',
                'password'   => md5('dosen123'),
                'role_id'    => 2,
                'is_active'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'dosen02',
                'email'      => 'siti.rahayu@absensi.ac.id',
                'password'   => md5('dosen123'),
                'role_id'    => 2,
                'is_active'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'mhs001',
                'email'      => 'ryan@mahasiswa.ac.id',
                'password'   => md5('mhs123'),
                'role_id'    => 3,
                'is_active'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'mhs002',
                'email'      => 'andi@mahasiswa.ac.id',
                'password'   => md5('mhs123'),
                'role_id'    => 3,
                'is_active'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}