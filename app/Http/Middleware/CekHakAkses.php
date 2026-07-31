<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekHakAkses
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Belum login
        if (!session('user_id')) {
            return redirect('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $userRole = session('user_role');

        // ADMIN selalu bisa akses semua halaman tanpa terkecuali
        if ($userRole === 'admin') {
            return $next($request);
        }

        // Cek role jika ada pembatasan
        if (!empty($roles) && !in_array($userRole, $roles)) {

            if ($userRole === 'mahasiswa') {
                return redirect('absensi-kuliah')
                    ->with('error', 'Anda tidak memiliki akses ke halaman tersebut!');
            }

            if ($userRole === 'dosen') {
                return redirect('jadwal-kuliah')
                    ->with('error', 'Anda tidak memiliki akses ke halaman tersebut!');
            }

            // Staf Akademik diarahkan ke data-mahasiswa jika akses ditolak
            if ($userRole === 'staf_akademik') {
                return redirect('data-mahasiswa')
                    ->with('error', 'Anda tidak memiliki akses ke halaman tersebut!');
            }

            return redirect('login')
                ->with('error', 'Anda tidak memiliki akses ke halaman tersebut!');
        }

        return $next($request);
    }
}
