<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // ============ LOGIN ADMIN ============
        if ($request->filled('username') && $request->filled('password')) {

            $user = DB::table('user_akses')
                ->where('username', $request->username)
                ->where('is_active', 1)
                ->first();

            if (!$user) {
                return back()->with('error', 'Username tidak ditemukan!')
                             ->with('last_panel', 'admin');
            }

            $roleData = DB::table('roles')->where('id', $user->role_id)->first();

            if (!$roleData || $roleData->nama_role !== 'admin') {
                return back()->with('error', 'Akun ini bukan admin!')
                             ->with('last_panel', 'admin');
            }

            $passwordMd5 = md5($request->password);
            $passwordDb  = $user->password;

            if ($passwordDb !== $passwordMd5 && $passwordDb !== $request->password) {
                return back()->with('error', 'Password salah!')
                             ->with('last_panel', 'admin');
            }

            session([
                'user_id'   => $user->id,
                'username'  => $user->username,
                'user_role' => 'admin',
                'role'      => 'admin',
            ]);

            DB::table('user_akses')->where('id', $user->id)
                ->update(['last_login' => now()]);

            return redirect('data-mahasiswa');
        }

        // ============ LOGIN STAF AKADEMIK ============
        if ($request->filled('username_staf') && $request->filled('password_staf')) {

            $user = DB::table('user_akses')
                ->where('username', $request->username_staf)
                ->where('is_active', 1)
                ->first();

            if (!$user) {
                return back()->with('error', 'Username Staf tidak ditemukan!')
                             ->with('last_panel', 'staf');
            }

            $roleData = DB::table('roles')->where('id', $user->role_id)->first();

            if (!$roleData || $roleData->nama_role !== 'staf_akademik') {
                return back()->with('error', 'Akun ini bukan Staf Akademik!')
                             ->with('last_panel', 'staf');
            }

            $passwordMd5 = md5($request->password_staf);
            $passwordDb  = $user->password;

            if ($passwordDb !== $passwordMd5 && $passwordDb !== $request->password_staf) {
                return back()->with('error', 'Password Staf salah!')
                             ->with('last_panel', 'staf');
            }

            session([
                'user_id'   => $user->id,
                'username'  => $user->username,
                'user_role' => 'staf_akademik',
                'role'      => 'staf_akademik',
            ]);

            DB::table('user_akses')->where('id', $user->id)
                ->update(['last_login' => now()]);

            // Staf diarahkan ke halaman data mahasiswa sebagai landing page
            return redirect('data-mahasiswa');
        }

        // ============ LOGIN DOSEN ============
        if ($request->filled('nip') && $request->filled('username_dosen')) {

            $dosen = DB::table('dosen')
                ->where('nip', $request->nip)
                ->whereRaw('LOWER(TRIM(nama)) = ?', [strtolower(trim($request->username_dosen))])
                ->first();

            if (!$dosen) {
                $cekNip = DB::table('dosen')
                    ->where('nip', $request->nip)
                    ->first();

                if ($cekNip) {
                    return back()->with('error',
                        'NIP ditemukan tapi nama salah! Nama di DB: "' . $cekNip->nama . '"'
                    )->with('last_panel', 'dosen');
                }
                return back()->with('error', 'NIP tidak ditemukan!')
                             ->with('last_panel', 'dosen');
            }

            session([
                'user_id'   => $dosen->id,
                'username'  => $dosen->nama,
                'user_role' => 'dosen',
                'role'      => 'dosen',
                'dosen_id'  => $dosen->id,
                'nip'       => $dosen->nip,
            ]);

            return redirect('jadwal-kuliah');
        }

        // ============ LOGIN MAHASISWA ============
        if ($request->filled('nim') && $request->filled('nama')) {

            $mahasiswa = DB::table('mahasiswa')
                ->where('nim', $request->nim)
                ->whereRaw('LOWER(TRIM(nama)) = ?', [strtolower(trim($request->nama))])
                ->first();

            if (!$mahasiswa) {
                $cekNim = DB::table('mahasiswa')
                    ->where('nim', $request->nim)
                    ->first();

                if ($cekNim) {
                    return back()->with('error',
                        'NIM ditemukan tapi nama salah! Nama di DB: "' . $cekNim->nama . '"'
                    )->with('last_panel', 'mahasiswa');
                }
                return back()->with('error', 'NIM tidak ditemukan!')
                             ->with('last_panel', 'mahasiswa');
            }

            if ($mahasiswa->user_id) {
                $userAkses = DB::table('user_akses')
                    ->where('id', $mahasiswa->user_id)
                    ->where('is_active', 1)
                    ->first();

                if (!$userAkses) {
                    return back()->with('error', 'Akun mahasiswa tidak aktif!')
                                 ->with('last_panel', 'mahasiswa');
                }

                session([
                    'user_id'      => $userAkses->id,
                    'username'     => $mahasiswa->nama,
                    'user_role'    => 'mahasiswa',
                    'role'         => 'mahasiswa',
                    'mahasiswa_id' => $mahasiswa->id,
                    'nim'          => $mahasiswa->nim,
                ]);
            } else {
                session([
                    'user_id'      => $mahasiswa->id,
                    'username'     => $mahasiswa->nama,
                    'user_role'    => 'mahasiswa',
                    'role'         => 'mahasiswa',
                    'mahasiswa_id' => $mahasiswa->id,
                    'nim'          => $mahasiswa->nim,
                ]);
            }

            return redirect('data-mahasiswa');
        }

        return back()->with('error', 'Silakan isi form login dengan lengkap!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}