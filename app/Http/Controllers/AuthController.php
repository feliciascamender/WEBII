<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        // Kalau sudah login, langsung ke dashboard
        if (session()->has('user_id')) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input tidak boleh kosong
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // EDGE CASE 1: Email tidak ditemukan di database
        if (!$user) {
            return back()
                ->with('error', 'Email atau password salah!')
                ->withInput(['email' => $request->email]);
        }

        // EDGE CASE 2: Password tidak cocok
        if (!Hash::check($request->password, $user->password)) {
            return back()
                ->with('error', 'Email atau password salah!')
                ->withInput(['email' => $request->email]);
        }

        // Login berhasil → simpan data ke session
        session([
            'user_id'  => $user->id,
            'username' => $user->username,
            'email'    => $user->email,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Selamat datang, ' . $user->username . '!');
    }

    // Proses logout
    public function logout(Request $request)
    {
        // Hapus semua session
        $request->session()->flush();

        return redirect()->route('login')
            ->with('success', 'Berhasil logout. Sampai jumpa!');
    }
}