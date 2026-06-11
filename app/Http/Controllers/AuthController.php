<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Proses Registrasi Akun Baru
    public function registerProses(Request $request)
    {
        // Validasi Input Formulir
        $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|unique:users,nisn',
            'no_hp' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menyimpan data pendaftaran murid baru ke tabel users
        $user = User::create([
            'name' => $request->name,
            'nisn' => $request->nisn,   // 🟢 Baris ini sudah aman terpasang
            'no_hp' => $request->no_hp, // 🟢 Baris ini sudah aman terpasang
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password demi keamanan
        ]);

        // Otomatis membuat sesi login setelah berhasil mendaftar
        Auth::login($user);
        
        // Melempar user langsung masuk ke Dashboard utama mereka
        if (strtolower($user->role) === 'admin') {
            return redirect()->route('admin_dashboard');
        }

        return redirect()->route('dashboard');
    }

    // 2. Proses Login Akun Lama
    public function loginProses(Request $request)
    {
        // Validasi Input Login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Memeriksa kecocokan email & password di database proyek_spmb
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect cerdas berdasarkan role
            if (strtolower(Auth::user()->role) === 'admin') {
                return redirect()->route('admin_dashboard');
            }
            // Jika bukan admin, dialihkan ke Dashboard User
            return redirect()->route('dashboard');
        }

        // Jika data salah, kembali ke halaman login membawa pesan error
        return back()->withErrors([
            'email' => 'Email atau Password yang Anda masukkan salah.',
        ]);
    }

    // 3. Proses Keluar Akun (Logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Dialihkan kembali ke halaman login eksternal
        return redirect()->route('login');
    }
}