<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiAuth
{
    public function handle(Request $request, Closure $next)
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

        $request->merge([
            'mahasiswa_id' => $mahasiswa->id,
            'mahasiswa'    => (array) $mahasiswa,
        ]);

        return $next($request);
    }
}
