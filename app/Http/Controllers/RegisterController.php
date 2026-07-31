<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegister()
    {
        $roles = DB::table('roles')->get();
        return view('register', compact('roles'));
    }

    public function register(Request $request)
    {
        // Cek username sudah ada
        $exists = DB::table('user_akses')
            ->where('username', $request->username)
            ->first();

        if ($exists) {
            return back()->with('error', 'Username sudah digunakan!');
        }

        DB::table('user_akses')->insert([
            'username'   => $request->username,
            'password'   => md5($request->password),
            'email'      => $request->email,
            'role_id'    => $request->role_id,
            'is_active'  => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
}