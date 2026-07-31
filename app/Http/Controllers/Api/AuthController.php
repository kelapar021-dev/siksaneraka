<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nim'  => 'required',
            'nama' => 'required',
        ]);

        $mahasiswa = DB::table('mahasiswa')
            ->where('nim', $request->nim)
            ->whereRaw('LOWER(TRIM(nama)) = ?', [strtolower(trim($request->nama))])
            ->first();

        if (!$mahasiswa) {
            $cekNim = DB::table('mahasiswa')
                ->where('nim', $request->nim)
                ->first();

            if ($cekNim) {
                return response()->json([
                    'message' => 'NIM ditemukan tapi nama salah!',
                ], 401);
            }

            return response()->json([
                'message' => 'NIM tidak ditemukan!',
            ], 401);
        }

        $token = $mahasiswa->id . '|' . md5($mahasiswa->nim . now());

        DB::table('personal_access_tokens')->insert([
            'tokenable_type' => 'App\\Models\\User',
            'tokenable_id'   => $mahasiswa->id,
            'name'           => 'mahasiswa-token',
            'token'          => hash('sha256', $token),
            'abilities'      => '["mahasiswa"]',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        return response()->json([
            'message' => 'Login berhasil',
            'token'   => $token,
            'user'    => [
                'id'       => $mahasiswa->id,
                'nim'      => $mahasiswa->nim,
                'nama'     => $mahasiswa->nama,
                'prodi'    => $mahasiswa->prodi,
                'fakultas' => $mahasiswa->fakultas,
                'email'    => $mahasiswa->email,
            ],
        ]);
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();
        if ($token) {
            $hashed = hash('sha256', $token);
            DB::table('personal_access_tokens')
                ->where('token', $hashed)
                ->delete();
        }

        return response()->json(['message' => 'Logout berhasil']);
    }

    public function user(Request $request)
    {
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $hashed = hash('sha256', $token);
        $accessToken = DB::table('personal_access_tokens')
            ->where('token', $hashed)
            ->first();

        if (!$accessToken) {
            return response()->json(['message' => 'Token tidak valid'], 401);
        }

        $mahasiswa = DB::table('mahasiswa')
            ->where('id', $accessToken->tokenable_id)
            ->first();

        if (!$mahasiswa) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        return response()->json([
            'user' => [
                'id'       => $mahasiswa->id,
                'nim'      => $mahasiswa->nim,
                'nama'     => $mahasiswa->nama,
                'prodi'    => $mahasiswa->prodi,
                'fakultas' => $mahasiswa->fakultas,
                'semester' => $mahasiswa->semester,
                'email'    => $mahasiswa->email,
                'no_hp'    => $mahasiswa->no_hp,
                'ipk'      => $mahasiswa->ipk,
            ],
        ]);
    }
}
