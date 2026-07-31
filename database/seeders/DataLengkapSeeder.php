<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataLengkapSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('transaksi_pembayaran')->truncate();
        DB::table('transaksi_nilai')->truncate();
        DB::table('krs')->truncate();
        DB::table('jadwal_kuliah')->truncate();
        DB::table('mata_kuliah')->truncate();
        DB::table('fuzzy_hasil')->truncate();
        DB::table('penilaian_akademik')->truncate();
        DB::table('dosen')->truncate();
        DB::table('user_akses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->seedUserAkses();
        $this->seedDosen();
        $this->seedMataKuliah();
        $this->seedJadwalKuliah();
        $this->seedKrs();
        $this->seedTransaksiNilai();
        $this->seedTransaksiPembayaran();
    }

    private function seedUserAkses(): void
    {
        $users = [
            ['id' => 1,  'username' => 'admin',   'role_id' => 1],
            ['id' => 2,  'username' => 'dosen01', 'role_id' => 2, 'email' => 'budi.santoso@absensi.ac.id'],
            ['id' => 3,  'username' => 'dosen02', 'role_id' => 2, 'email' => 'siti.rahayu@absensi.ac.id'],
            ['id' => 4,  'username' => 'mhs001',  'role_id' => 3],
            ['id' => 5,  'username' => 'mhs002',  'role_id' => 3],
            ['id' => 6,  'username' => 'dosen03', 'role_id' => 2, 'email' => 'ahmad.wijaya@absensi.ac.id'],
            ['id' => 7,  'username' => 'dosen04', 'role_id' => 2, 'email' => 'mayasari@absensi.ac.id'],
            ['id' => 8,  'username' => 'dosen05', 'role_id' => 2, 'email' => 'dedi.kurniawan@absensi.ac.id'],
            ['id' => 9,  'username' => 'dosen06', 'role_id' => 2, 'email' => 'rina.sari@absensi.ac.id'],
            ['id' => 10, 'username' => 'dosen07', 'role_id' => 2, 'email' => 'joko.purnomo@absensi.ac.id'],
            ['id' => 11, 'username' => 'dosen08', 'role_id' => 2, 'email' => 'lina.mardiana@absensi.ac.id'],
            ['id' => 12, 'username' => 'dosen09', 'role_id' => 2, 'email' => 'toni.hermawan@absensi.ac.id'],
            ['id' => 13, 'username' => 'dosen10', 'role_id' => 2, 'email' => 'sari.dewi@absensi.ac.id'],
            ['id' => 14, 'username' => 'dosen11', 'role_id' => 2, 'email' => 'bambang.setiawan@absensi.ac.id'],
            ['id' => 15, 'username' => 'dosen12', 'role_id' => 2, 'email' => 'nurul.hidayah@absensi.ac.id'],
            ['id' => 16, 'username' => 'dosen13', 'role_id' => 2, 'email' => 'agus.saputra@absensi.ac.id'],
            ['id' => 17, 'username' => 'dosen14', 'role_id' => 2, 'email' => 'putri.amalia@absensi.ac.id'],
            ['id' => 18, 'username' => 'dosen15', 'role_id' => 2, 'email' => 'hendra.wibowo@absensi.ac.id'],
            ['id' => 19, 'username' => 'dosen16', 'role_id' => 2, 'email' => 'mega.oktaviani@absensi.ac.id'],
            ['id' => 20, 'username' => 'dosen17', 'role_id' => 2, 'email' => 'riko.aditya@absensi.ac.id'],
            ['id' => 21, 'username' => 'dosen18', 'role_id' => 2, 'email' => 'fitri.handayani@absensi.ac.id'],
            ['id' => 22, 'username' => 'dosen19', 'role_id' => 2, 'email' => 'arif.rohman@absensi.ac.id'],
            ['id' => 23, 'username' => 'dosen20', 'role_id' => 2, 'email' => 'dian.permatasari@absensi.ac.id'],
            ['id' => 24, 'username' => 'mhs003',  'role_id' => 3],
            ['id' => 25, 'username' => 'mhs004',  'role_id' => 3],
        ];

        $password = md5('admin123');
        $dosenPassword = md5('dosen123');
        $mhsPassword = md5('mhs123');

        foreach ($users as $u) {
            $role = $u['role_id'];
            $pw = $role === 1 ? $password : ($role === 2 ? $dosenPassword : $mhsPassword);

            DB::table('user_akses')->insert([
                'id'         => $u['id'],
                'username'   => $u['username'],
                'password'   => $pw,
                'email'      => $u['email'] ?? ($u['username'] . '@absensi.ac.id'),
                'role_id'    => $role,
                'is_active'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::statement('ALTER TABLE user_akses AUTO_INCREMENT = 26');
    }

    private function seedDosen(): void
    {
        $dosen = [
            ['nip' => '197805102003121004', 'nama' => 'Dr. Ahmad Wijaya, S.Kom., M.T.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Profesor', 'email' => 'ahmad.wijaya@absensi.ac.id', 'no_hp' => '081234567892', 'user_id' => 6],
            ['nip' => '198502152010012005', 'nama' => 'Mayasari, S.T., M.Kom.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Lektor', 'email' => 'mayasari@absensi.ac.id', 'no_hp' => '081234567893', 'user_id' => 7],
            ['nip' => '198003202005011006', 'nama' => 'Dedi Kurniawan, S.Kom., M.T.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Lektor', 'email' => 'dedi.kurniawan@absensi.ac.id', 'no_hp' => '081234567894', 'user_id' => 8],
            ['nip' => '199001012015012007', 'nama' => 'Rina Sari, S.Pd., M.T.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Asisten Ahli', 'email' => 'rina.sari@absensi.ac.id', 'no_hp' => '081234567895', 'user_id' => 9],
            ['nip' => '198207072008011008', 'nama' => 'Joko Purnomo, S.Kom., M.M.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Lektor', 'email' => 'joko.purnomo@absensi.ac.id', 'no_hp' => '081234567896', 'user_id' => 10],
            ['nip' => '198806122012012009', 'nama' => 'Lina Mardiana, S.T., M.Kom.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Asisten Ahli', 'email' => 'lina.mardiana@absensi.ac.id', 'no_hp' => '081234567897', 'user_id' => 11],
            ['nip' => '197905052003121010', 'nama' => 'Dr. Toni Hermawan, S.Kom., M.T.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Profesor', 'email' => 'toni.hermawan@absensi.ac.id', 'no_hp' => '081234567898', 'user_id' => 12],
            ['nip' => '199103202018012011', 'nama' => 'Sari Dewi, S.Kom., M.Kom.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Asisten Ahli', 'email' => 'sari.dewi@absensi.ac.id', 'no_hp' => '081234567899', 'user_id' => 13],
            ['nip' => '198301012008011012', 'nama' => 'Bambang Setiawan, S.T., M.T.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Lektor', 'email' => 'bambang.setiawan@absensi.ac.id', 'no_hp' => '081234567900', 'user_id' => 14],
            ['nip' => '198704152012012013', 'nama' => 'Nurul Hidayah, S.Pd., M.T.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Asisten Ahli', 'email' => 'nurul.hidayah@absensi.ac.id', 'no_hp' => '081234567901', 'user_id' => 15],
            ['nip' => '198105202006011014', 'nama' => 'Agus Saputra, S.Kom., M.Kom.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Lektor', 'email' => 'agus.saputra@absensi.ac.id', 'no_hp' => '081234567902', 'user_id' => 16],
            ['nip' => '199201012019012015', 'nama' => 'Putri Amalia, S.T., M.T.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Asisten Ahli', 'email' => 'putri.amalia@absensi.ac.id', 'no_hp' => '081234567903', 'user_id' => 17],
            ['nip' => '198408082009011016', 'nama' => 'Hendra Wibowo, S.Kom., M.T.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Lektor', 'email' => 'hendra.wibowo@absensi.ac.id', 'no_hp' => '081234567904', 'user_id' => 18],
            ['nip' => '198909092014012017', 'nama' => 'Mega Oktaviani, S.Kom., M.Kom.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Asisten Ahli', 'email' => 'mega.oktaviani@absensi.ac.id', 'no_hp' => '081234567905', 'user_id' => 19],
            ['nip' => '198602142011011018', 'nama' => 'Riko Aditya, S.T., M.T.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Lektor', 'email' => 'riko.aditya@absensi.ac.id', 'no_hp' => '081234567906', 'user_id' => 20],
            ['nip' => '199303032020012019', 'nama' => 'Fitri Handayani, S.Pd., M.Kom.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Asisten Ahli', 'email' => 'fitri.handayani@absensi.ac.id', 'no_hp' => '081234567907', 'user_id' => 21],
            ['nip' => '198006062005011020', 'nama' => 'Arif Rohman, S.Kom., M.M.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Lektor', 'email' => 'arif.rohman@absensi.ac.id', 'no_hp' => '081234567908', 'user_id' => 22],
            ['nip' => '199407072021012021', 'nama' => 'Dian Permatasari, S.T., M.T.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Asisten Ahli', 'email' => 'dian.permatasari@absensi.ac.id', 'no_hp' => '081234567909', 'user_id' => 23],
            ['nip' => '198209092007011022', 'nama' => 'Dr. Candra Kirana, S.Kom., M.T.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Profesor', 'email' => 'candra.kirana@absensi.ac.id', 'no_hp' => '081234567910', 'user_id' => 24],
            ['nip' => '199001102016012023', 'nama' => 'Eka Susanti, S.Kom., M.Kom.', 'prodi' => 'Teknik Informatika', 'jabatan' => 'Asisten Ahli', 'email' => 'eka.susanti@absensi.ac.id', 'no_hp' => '081234567911', 'user_id' => 25],
        ];

        foreach ($dosen as $d) {
            DB::table('dosen')->insert([
                'nip'        => $d['nip'],
                'nama'       => $d['nama'],
                'prodi'      => $d['prodi'],
                'jabatan'    => $d['jabatan'],
                'email'      => $d['email'],
                'no_hp'      => $d['no_hp'],
                'user_id'    => $d['user_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedMataKuliah(): void
    {
        $matkul = [
            ['kode_mk' => 'IF101', 'nama' => 'Pemrograman Dasar', 'sks' => 3, 'semester' => 1, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF102', 'nama' => 'Matematika Diskrit', 'sks' => 3, 'semester' => 1, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF103', 'nama' => 'Pengantar Teknologi Informasi', 'sks' => 2, 'semester' => 1, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF201', 'nama' => 'Struktur Data dan Algoritma', 'sks' => 3, 'semester' => 2, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF202', 'nama' => 'Pemrograman Berorientasi Objek', 'sks' => 3, 'semester' => 2, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF203', 'nama' => 'Sistem Operasi', 'sks' => 3, 'semester' => 2, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF301', 'nama' => 'Pemrograman Web II', 'sks' => 3, 'semester' => 3, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF302', 'nama' => 'Basis Data', 'sks' => 3, 'semester' => 3, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF303', 'nama' => 'Jaringan Komputer', 'sks' => 2, 'semester' => 3, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF304', 'nama' => 'Rekayasa Perangkat Lunak', 'sks' => 3, 'semester' => 3, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF401', 'nama' => 'Kecerdasan Buatan', 'sks' => 3, 'semester' => 4, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF402', 'nama' => 'Grafika Komputer', 'sks' => 3, 'semester' => 4, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF403', 'nama' => 'Keamanan Komputer', 'sks' => 3, 'semester' => 4, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF404', 'nama' => 'Sistem Terdistribusi', 'sks' => 3, 'semester' => 4, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF501', 'nama' => 'Pembelajaran Mesin', 'sks' => 3, 'semester' => 5, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF502', 'nama' => 'Komputasi Awan', 'sks' => 3, 'semester' => 5, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF503', 'nama' => 'Basis Data Lanjut', 'sks' => 3, 'semester' => 5, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF504', 'nama' => 'Pemrograman Mobile', 'sks' => 3, 'semester' => 5, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF601', 'nama' => 'Jaringan Syaraf Tiruan', 'sks' => 3, 'semester' => 6, 'prodi' => 'Teknik Informatika'],
            ['kode_mk' => 'IF602', 'nama' => 'Tugas Akhir', 'sks' => 4, 'semester' => 6, 'prodi' => 'Teknik Informatika'],
        ];

        foreach ($matkul as $m) {
            DB::table('mata_kuliah')->insert([
                'kode_mk'    => $m['kode_mk'],
                'nama'       => $m['nama'],
                'sks'        => $m['sks'],
                'semester'   => $m['semester'],
                'prodi'      => $m['prodi'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedJadwalKuliah(): void
    {
        $jadwal = [
            ['mata_kuliah_id' => 1,  'dosen_id' => 1,  'ruangan_id' => 1, 'tahun_akademik_id' => 3, 'hari' => 'Senin',  'jam_mulai' => '08:00', 'jam_selesai' => '10:30'],
            ['mata_kuliah_id' => 2,  'dosen_id' => 3,  'ruangan_id' => 3, 'tahun_akademik_id' => 3, 'hari' => 'Senin',  'jam_mulai' => '13:00', 'jam_selesai' => '15:30'],
            ['mata_kuliah_id' => 3,  'dosen_id' => 5,  'ruangan_id' => 3, 'tahun_akademik_id' => 3, 'hari' => 'Selasa', 'jam_mulai' => '08:00', 'jam_selesai' => '09:40'],
            ['mata_kuliah_id' => 4,  'dosen_id' => 7,  'ruangan_id' => 2, 'tahun_akademik_id' => 3, 'hari' => 'Selasa', 'jam_mulai' => '10:00', 'jam_selesai' => '12:30'],
            ['mata_kuliah_id' => 5,  'dosen_id' => 9,  'ruangan_id' => 1, 'tahun_akademik_id' => 3, 'hari' => 'Rabu',   'jam_mulai' => '08:00', 'jam_selesai' => '10:30'],
            ['mata_kuliah_id' => 6,  'dosen_id' => 11, 'ruangan_id' => 3, 'tahun_akademik_id' => 3, 'hari' => 'Rabu',   'jam_mulai' => '13:00', 'jam_selesai' => '15:30'],
            ['mata_kuliah_id' => 7,  'dosen_id' => 2,  'ruangan_id' => 1, 'tahun_akademik_id' => 3, 'hari' => 'Kamis',  'jam_mulai' => '08:00', 'jam_selesai' => '10:30'],
            ['mata_kuliah_id' => 8,  'dosen_id' => 4,  'ruangan_id' => 2, 'tahun_akademik_id' => 3, 'hari' => 'Kamis',  'jam_mulai' => '13:00', 'jam_selesai' => '15:30'],
            ['mata_kuliah_id' => 9,  'dosen_id' => 6,  'ruangan_id' => 3, 'tahun_akademik_id' => 3, 'hari' => 'Jumat',  'jam_mulai' => '08:00', 'jam_selesai' => '09:40'],
            ['mata_kuliah_id' => 10, 'dosen_id' => 8,  'ruangan_id' => 4, 'tahun_akademik_id' => 3, 'hari' => 'Jumat',  'jam_mulai' => '10:00', 'jam_selesai' => '12:30'],
            ['mata_kuliah_id' => 11, 'dosen_id' => 10, 'ruangan_id' => 1, 'tahun_akademik_id' => 3, 'hari' => 'Senin',  'jam_mulai' => '10:30', 'jam_selesai' => '13:00'],
            ['mata_kuliah_id' => 12, 'dosen_id' => 12, 'ruangan_id' => 2, 'tahun_akademik_id' => 3, 'hari' => 'Selasa', 'jam_mulai' => '13:00', 'jam_selesai' => '15:30'],
            ['mata_kuliah_id' => 13, 'dosen_id' => 14, 'ruangan_id' => 4, 'tahun_akademik_id' => 3, 'hari' => 'Rabu',   'jam_mulai' => '10:00', 'jam_selesai' => '12:30'],
            ['mata_kuliah_id' => 14, 'dosen_id' => 16, 'ruangan_id' => 1, 'tahun_akademik_id' => 3, 'hari' => 'Kamis',  'jam_mulai' => '10:00', 'jam_selesai' => '12:30'],
            ['mata_kuliah_id' => 15, 'dosen_id' => 18, 'ruangan_id' => 2, 'tahun_akademik_id' => 3, 'hari' => 'Jumat',  'jam_mulai' => '13:00', 'jam_selesai' => '15:30'],
            ['mata_kuliah_id' => 16, 'dosen_id' => 20, 'ruangan_id' => 1, 'tahun_akademik_id' => 3, 'hari' => 'Sabtu',  'jam_mulai' => '08:00', 'jam_selesai' => '10:30'],
            ['mata_kuliah_id' => 17, 'dosen_id' => 13, 'ruangan_id' => 3, 'tahun_akademik_id' => 3, 'hari' => 'Sabtu',  'jam_mulai' => '10:30', 'jam_selesai' => '13:00'],
            ['mata_kuliah_id' => 18, 'dosen_id' => 2,  'ruangan_id' => 4, 'tahun_akademik_id' => 3, 'hari' => 'Senin',  'jam_mulai' => '13:00', 'jam_selesai' => '15:30'],
            ['mata_kuliah_id' => 19, 'dosen_id' => 19, 'ruangan_id' => 2, 'tahun_akademik_id' => 3, 'hari' => 'Selasa', 'jam_mulai' => '08:00', 'jam_selesai' => '10:30'],
            ['mata_kuliah_id' => 20, 'dosen_id' => 1,  'ruangan_id' => 1, 'tahun_akademik_id' => 3, 'hari' => 'Rabu',   'jam_mulai' => '08:00', 'jam_selesai' => '10:30'],
        ];

        foreach ($jadwal as $j) {
            DB::table('jadwal_kuliah')->insert([
                'mata_kuliah_id'    => $j['mata_kuliah_id'],
                'dosen_id'          => $j['dosen_id'],
                'ruangan_id'        => $j['ruangan_id'],
                'tahun_akademik_id' => $j['tahun_akademik_id'],
                'hari'              => $j['hari'],
                'jam_mulai'         => $j['jam_mulai'],
                'jam_selesai'       => $j['jam_selesai'],
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
    }

    private function seedKrs(): void
    {
        $krs = [
            ['mahasiswa_id' => 1, 'mata_kuliah_id' => 7,  'jadwal_id' => 7,  'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 1, 'mata_kuliah_id' => 8,  'jadwal_id' => 8,  'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 1, 'mata_kuliah_id' => 9,  'jadwal_id' => 9,  'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 1, 'mata_kuliah_id' => 10, 'jadwal_id' => 10, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 1, 'mata_kuliah_id' => 11, 'jadwal_id' => 11, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 2, 'mata_kuliah_id' => 7,  'jadwal_id' => 7,  'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 2, 'mata_kuliah_id' => 8,  'jadwal_id' => 8,  'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 2, 'mata_kuliah_id' => 9,  'jadwal_id' => 9,  'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 2, 'mata_kuliah_id' => 11, 'jadwal_id' => 11, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 2, 'mata_kuliah_id' => 12, 'jadwal_id' => 12, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Diajukan'],
            ['mahasiswa_id' => 3, 'mata_kuliah_id' => 7,  'jadwal_id' => 7,  'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 3, 'mata_kuliah_id' => 10, 'jadwal_id' => 10, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 3, 'mata_kuliah_id' => 13, 'jadwal_id' => 13, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 3, 'mata_kuliah_id' => 14, 'jadwal_id' => 14, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 3, 'mata_kuliah_id' => 15, 'jadwal_id' => 15, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Diajukan'],
            ['mahasiswa_id' => 4, 'mata_kuliah_id' => 16, 'jadwal_id' => 16, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 4, 'mata_kuliah_id' => 17, 'jadwal_id' => 17, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 4, 'mata_kuliah_id' => 18, 'jadwal_id' => 18, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
            ['mahasiswa_id' => 4, 'mata_kuliah_id' => 19, 'jadwal_id' => 19, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Diajukan'],
            ['mahasiswa_id' => 4, 'mata_kuliah_id' => 20, 'jadwal_id' => 20, 'tahun_akademik_id' => 3, 'semester' => 5, 'status' => 'Disetujui'],
        ];

        foreach ($krs as $k) {
            DB::table('krs')->insert([
                'mahasiswa_id'       => $k['mahasiswa_id'],
                'mata_kuliah_id'     => $k['mata_kuliah_id'],
                'jadwal_id'          => $k['jadwal_id'],
                'tahun_akademik_id'  => $k['tahun_akademik_id'],
                'semester'           => $k['semester'],
                'status'             => $k['status'],
                'keterangan'         => null,
                'created_at'         => now(),
                'updated_at'         => now(),
            ]);
        }
    }

    private function seedTransaksiNilai(): void
    {
        $nilai = [
            ['mahasiswa_id' => 1, 'kode_matkul' => 'IF301', 'nama_matkul' => 'Pemrograman Web II',     'sks' => 3, 'semester' => 3, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 85.0, 'nilai_huruf' => 'A',  'bobot_nilai' => 4.0, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 1, 'kode_matkul' => 'IF302', 'nama_matkul' => 'Basis Data',             'sks' => 3, 'semester' => 3, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 78.0, 'nilai_huruf' => 'B+', 'bobot_nilai' => 3.5, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 1, 'kode_matkul' => 'IF303', 'nama_matkul' => 'Jaringan Komputer',      'sks' => 2, 'semester' => 3, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 90.0, 'nilai_huruf' => 'A',  'bobot_nilai' => 4.0, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 1, 'kode_matkul' => 'IF304', 'nama_matkul' => 'Rekayasa Perangkat Lunak','sks' => 3, 'semester' => 3, 'tahun_ajaran' => '2024/2025','nilai_angka' => 72.0, 'nilai_huruf' => 'B',  'bobot_nilai' => 3.0, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 2, 'kode_matkul' => 'IF301', 'nama_matkul' => 'Pemrograman Web II',     'sks' => 3, 'semester' => 3, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 68.0, 'nilai_huruf' => 'B',  'bobot_nilai' => 3.0, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 2, 'kode_matkul' => 'IF302', 'nama_matkul' => 'Basis Data',             'sks' => 3, 'semester' => 3, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 55.0, 'nilai_huruf' => 'C',  'bobot_nilai' => 2.0, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 2, 'kode_matkul' => 'IF303', 'nama_matkul' => 'Jaringan Komputer',      'sks' => 2, 'semester' => 3, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 42.0, 'nilai_huruf' => 'D',  'bobot_nilai' => 1.0, 'status_nilai' => 'Tidak Lulus'],
            ['mahasiswa_id' => 2, 'kode_matkul' => 'IF201', 'nama_matkul' => 'Struktur Data dan Algoritma','sks' => 3,'semester' => 2,'tahun_ajaran' => '2024/2025','nilai_angka' => 75.0, 'nilai_huruf' => 'B',  'bobot_nilai' => 3.0, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 3, 'kode_matkul' => 'IF301', 'nama_matkul' => 'Pemrograman Web II',     'sks' => 3, 'semester' => 3, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 92.0, 'nilai_huruf' => 'A',  'bobot_nilai' => 4.0, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 3, 'kode_matkul' => 'IF302', 'nama_matkul' => 'Basis Data',             'sks' => 3, 'semester' => 3, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 88.0, 'nilai_huruf' => 'A',  'bobot_nilai' => 4.0, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 3, 'kode_matkul' => 'IF303', 'nama_matkul' => 'Jaringan Komputer',      'sks' => 2, 'semester' => 3, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 80.0, 'nilai_huruf' => 'A',  'bobot_nilai' => 4.0, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 3, 'kode_matkul' => 'IF202', 'nama_matkul' => 'Pemrograman Berorientasi Objek','sks' => 3,'semester' => 2,'tahun_ajaran' => '2024/2025','nilai_angka' => 85.0, 'nilai_huruf' => 'A', 'bobot_nilai' => 4.0, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 3, 'kode_matkul' => 'IF203', 'nama_matkul' => 'Sistem Operasi',         'sks' => 3, 'semester' => 2, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 76.0, 'nilai_huruf' => 'B+', 'bobot_nilai' => 3.5, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 4, 'kode_matkul' => 'IF401', 'nama_matkul' => 'Kecerdasan Buatan',      'sks' => 3, 'semester' => 4, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 60.0, 'nilai_huruf' => 'C+', 'bobot_nilai' => 2.5, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 4, 'kode_matkul' => 'IF402', 'nama_matkul' => 'Grafika Komputer',       'sks' => 3, 'semester' => 4, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 48.0, 'nilai_huruf' => 'D',  'bobot_nilai' => 1.0, 'status_nilai' => 'Tidak Lulus'],
            ['mahasiswa_id' => 4, 'kode_matkul' => 'IF403', 'nama_matkul' => 'Keamanan Komputer',      'sks' => 3, 'semester' => 4, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 70.0, 'nilai_huruf' => 'B',  'bobot_nilai' => 3.0, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 4, 'kode_matkul' => 'IF404', 'nama_matkul' => 'Sistem Terdistribusi',   'sks' => 3, 'semester' => 4, 'tahun_ajaran' => '2024/2025', 'nilai_angka' => 65.0, 'nilai_huruf' => 'B-', 'bobot_nilai' => 2.5, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 1, 'kode_matkul' => 'IF401', 'nama_matkul' => 'Kecerdasan Buatan',      'sks' => 3, 'semester' => 4, 'tahun_ajaran' => '2025/2026', 'nilai_angka' => 78.0, 'nilai_huruf' => 'B+', 'bobot_nilai' => 3.5, 'status_nilai' => 'Lulus'],
            ['mahasiswa_id' => 2, 'kode_matkul' => 'IF401', 'nama_matkul' => 'Kecerdasan Buatan',      'sks' => 3, 'semester' => 4, 'tahun_ajaran' => '2025/2026', 'nilai_angka' => 35.0, 'nilai_huruf' => 'E',  'bobot_nilai' => 0.0, 'status_nilai' => 'Tidak Lulus'],
            ['mahasiswa_id' => 3, 'kode_matkul' => 'IF501', 'nama_matkul' => 'Pembelajaran Mesin',     'sks' => 3, 'semester' => 5, 'tahun_ajaran' => '2025/2026', 'nilai_angka' => 95.0, 'nilai_huruf' => 'A',  'bobot_nilai' => 4.0, 'status_nilai' => 'Lulus'],
        ];

        foreach ($nilai as $n) {
            DB::table('transaksi_nilai')->insert([
                'mahasiswa_id'  => $n['mahasiswa_id'],
                'kode_matkul'   => $n['kode_matkul'],
                'nama_matkul'   => $n['nama_matkul'],
                'sks'           => $n['sks'],
                'semester'      => $n['semester'],
                'tahun_ajaran'  => $n['tahun_ajaran'],
                'nilai_angka'   => $n['nilai_angka'],
                'nilai_huruf'   => $n['nilai_huruf'],
                'bobot_nilai'   => $n['bobot_nilai'],
                'status_nilai'  => $n['status_nilai'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }

    private function seedTransaksiPembayaran(): void
    {
        $pembayaran = [
            ['mahasiswa_id' => 1, 'kode_bayar' => 'BYR-2025-001', 'jenis_pembayaran' => 'SPP',        'jumlah_bayar' => 3500000, 'tanggal_bayar' => '2025-09-01', 'batas_bayar' => '2025-09-15', 'status_bayar' => 'Lunas',     'metode_bayar' => 'Transfer Bank',  'keterangan' => 'SPP Semester 5'],
            ['mahasiswa_id' => 1, 'kode_bayar' => 'BYR-2025-002', 'jenis_pembayaran' => 'UKT',        'jumlah_bayar' => 2500000, 'tanggal_bayar' => '2025-09-01', 'batas_bayar' => '2025-09-15', 'status_bayar' => 'Lunas',     'metode_bayar' => 'Transfer Bank',  'keterangan' => 'UKT Semester 5'],
            ['mahasiswa_id' => 1, 'kode_bayar' => 'BYR-2025-003', 'jenis_pembayaran' => 'Praktikum',  'jumlah_bayar' => 500000,  'tanggal_bayar' => '2025-09-05', 'batas_bayar' => '2025-09-20', 'status_bayar' => 'Lunas',     'metode_bayar' => 'QRIS',           'keterangan' => 'Praktikum Basis Data'],
            ['mahasiswa_id' => 2, 'kode_bayar' => 'BYR-2025-004', 'jenis_pembayaran' => 'SPP',        'jumlah_bayar' => 3500000, 'tanggal_bayar' => '2025-09-02', 'batas_bayar' => '2025-09-15', 'status_bayar' => 'Lunas',     'metode_bayar' => 'Transfer Bank',  'keterangan' => 'SPP Semester 5'],
            ['mahasiswa_id' => 2, 'kode_bayar' => 'BYR-2025-005', 'jenis_pembayaran' => 'UKT',        'jumlah_bayar' => 2500000, 'tanggal_bayar' => null,          'batas_bayar' => '2025-09-15', 'status_bayar' => 'Belum Lunas','metode_bayar' => null,             'keterangan' => 'UKT Semester 5'],
            ['mahasiswa_id' => 2, 'kode_bayar' => 'BYR-2025-006', 'jenis_pembayaran' => 'Praktikum',  'jumlah_bayar' => 500000,  'tanggal_bayar' => '2025-09-10', 'batas_bayar' => '2025-09-20', 'status_bayar' => 'Lunas',     'metode_bayar' => 'E-Wallet',       'keterangan' => 'Praktikum Jaringan'],
            ['mahasiswa_id' => 3, 'kode_bayar' => 'BYR-2025-007', 'jenis_pembayaran' => 'SPP',        'jumlah_bayar' => 3500000, 'tanggal_bayar' => '2025-09-01', 'batas_bayar' => '2025-09-15', 'status_bayar' => 'Lunas',     'metode_bayar' => 'Transfer Bank',  'keterangan' => 'SPP Semester 5'],
            ['mahasiswa_id' => 3, 'kode_bayar' => 'BYR-2025-008', 'jenis_pembayaran' => 'UKT',        'jumlah_bayar' => 2500000, 'tanggal_bayar' => '2025-09-01', 'batas_bayar' => '2025-09-15', 'status_bayar' => 'Lunas',     'metode_bayar' => 'Transfer Bank',  'keterangan' => 'UKT Semester 5'],
            ['mahasiswa_id' => 3, 'kode_bayar' => 'BYR-2025-009', 'jenis_pembayaran' => 'Praktikum',  'jumlah_bayar' => 500000,  'tanggal_bayar' => '2025-09-08', 'batas_bayar' => '2025-09-20', 'status_bayar' => 'Lunas',     'metode_bayar' => 'QRIS',           'keterangan' => 'Praktikum Pemrograman Web'],
            ['mahasiswa_id' => 4, 'kode_bayar' => 'BYR-2025-010', 'jenis_pembayaran' => 'SPP',        'jumlah_bayar' => 3500000, 'tanggal_bayar' => null,          'batas_bayar' => '2025-09-15', 'status_bayar' => 'Belum Lunas','metode_bayar' => null,             'keterangan' => 'SPP Semester 5'],
            ['mahasiswa_id' => 4, 'kode_bayar' => 'BYR-2025-011', 'jenis_pembayaran' => 'UKT',        'jumlah_bayar' => 2500000, 'tanggal_bayar' => null,          'batas_bayar' => '2025-09-15', 'status_bayar' => 'Belum Lunas','metode_bayar' => null,             'keterangan' => 'UKT Semester 5'],
            ['mahasiswa_id' => 4, 'kode_bayar' => 'BYR-2025-012', 'jenis_pembayaran' => 'Praktikum',  'jumlah_bayar' => 500000,  'tanggal_bayar' => '2025-09-12', 'batas_bayar' => '2025-09-20', 'status_bayar' => 'Lunas',     'metode_bayar' => 'E-Wallet',       'keterangan' => 'Praktikum Grafika'],
            ['mahasiswa_id' => 1, 'kode_bayar' => 'BYR-2025-013', 'jenis_pembayaran' => 'Wisuda',     'jumlah_bayar' => 1500000, 'tanggal_bayar' => null,          'batas_bayar' => '2026-03-01', 'status_bayar' => 'Belum Lunas','metode_bayar' => null,             'keterangan' => 'Biaya Wisuda'],
            ['mahasiswa_id' => 2, 'kode_bayar' => 'BYR-2025-014', 'jenis_pembayaran' => 'SPP',        'jumlah_bayar' => 3500000, 'tanggal_bayar' => '2025-09-05', 'batas_bayar' => '2025-09-15', 'status_bayar' => 'Cicilan',    'metode_bayar' => 'Transfer Bank',  'keterangan' => 'Cicilan 1/2 SPP'],
            ['mahasiswa_id' => 2, 'kode_bayar' => 'BYR-2025-015', 'jenis_pembayaran' => 'SPP',        'jumlah_bayar' => 1750000, 'tanggal_bayar' => '2025-10-05', 'batas_bayar' => '2025-10-15', 'status_bayar' => 'Lunas',     'metode_bayar' => 'Transfer Bank',  'keterangan' => 'Cicilan 2/2 SPP'],
            ['mahasiswa_id' => 3, 'kode_bayar' => 'BYR-2025-016', 'jenis_pembayaran' => 'Wisuda',     'jumlah_bayar' => 1500000, 'tanggal_bayar' => '2025-11-01', 'batas_bayar' => '2026-03-01', 'status_bayar' => 'Lunas',     'metode_bayar' => 'Transfer Bank',  'keterangan' => 'Biaya Wisuda'],
            ['mahasiswa_id' => 1, 'kode_bayar' => 'BYR-2025-017', 'jenis_pembayaran' => 'Lainnya',    'jumlah_bayar' => 200000,  'tanggal_bayar' => '2025-09-15', 'batas_bayar' => '2025-09-30', 'status_bayar' => 'Lunas',     'metode_bayar' => 'QRIS',           'keterangan' => 'Biaya Seminar'],
            ['mahasiswa_id' => 4, 'kode_bayar' => 'BYR-2025-018', 'jenis_pembayaran' => 'SPP',        'jumlah_bayar' => 3500000, 'tanggal_bayar' => '2025-09-10', 'batas_bayar' => '2025-09-15', 'status_bayar' => 'Lunas',     'metode_bayar' => 'Transfer Bank',  'keterangan' => 'SPP Semester 5'],
            ['mahasiswa_id' => 4, 'kode_bayar' => 'BYR-2025-019', 'jenis_pembayaran' => 'UKT',        'jumlah_bayar' => 2500000, 'tanggal_bayar' => '2025-09-10', 'batas_bayar' => '2025-09-15', 'status_bayar' => 'Lunas',     'metode_bayar' => 'Transfer Bank',  'keterangan' => 'UKT Semester 5'],
            ['mahasiswa_id' => 3, 'kode_bayar' => 'BYR-2025-020', 'jenis_pembayaran' => 'Praktikum',  'jumlah_bayar' => 750000,  'tanggal_bayar' => '2025-09-15', 'batas_bayar' => '2025-09-30', 'status_bayar' => 'Lunas',     'metode_bayar' => 'E-Wallet',       'keterangan' => 'Praktikum Sistem Terdistribusi'],
        ];

        foreach ($pembayaran as $p) {
            DB::table('transaksi_pembayaran')->insert([
                'mahasiswa_id'      => $p['mahasiswa_id'],
                'kode_bayar'        => $p['kode_bayar'],
                'jenis_pembayaran'  => $p['jenis_pembayaran'],
                'jumlah_bayar'      => $p['jumlah_bayar'],
                'tanggal_bayar'     => $p['tanggal_bayar'],
                'batas_bayar'       => $p['batas_bayar'],
                'status_bayar'      => $p['status_bayar'],
                'metode_bayar'      => $p['metode_bayar'],
                'keterangan'        => $p['keterangan'],
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
    }
}
