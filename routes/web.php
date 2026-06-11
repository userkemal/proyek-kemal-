<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\DashboardController; // Ensure DashboardController is imported
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('beranda_user');
})->name('beranda');

Route::get('/panduan', function () {
    return view('panduan');
})->name('panduan');

/*
|--------------------------------------------------------------------------
| GUEST (BELUM LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', function () { return view('login_user'); })->name('login');
    Route::post('/login', [AuthController::class, 'loginProses'])->name('login.proses');

    Route::get('/register', function () { return view('register_user'); })->name('register');
    Route::post('/register', [AuthController::class, 'registerProses'])->name('register.proses');
});

/*
|--------------------------------------------------------------------------
| AUTH (SUDAH LOGIN - USER BIASA)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Dashboard & Pendaftaran
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    
    Route::post('/pendaftaran/simpan', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    // Pengumuman & Profil
    Route::get('/dashboard/pengumuman', function () {
        $pendaftaran = \App\Models\Pendaftaran::where('user_id', auth()->id())->latest()->first();
        return view('pengumuman', compact('pendaftaran'));
    })->name('pengumuman');

    Route::get('/dashboard/profil', function () {
        $pendaftaran = \App\Models\Pendaftaran::where('user_id', auth()->id())->latest()->first();
        return view('profil', compact('pendaftaran'));
    })->name('profil');

    Route::get('/dashboard/profil/edit', function () { return view('profil_edit'); })->name('profil.edit');
    Route::post('/dashboard/profil/update', [ProfileController::class, 'update'])->name('profil.update');

    // Logout
    Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTE (KHUSUS ADMIN)
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin_dashboard');
