<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran; // Pastikan model Pendaftaran di-import

class AdminController extends Controller
{
    public function __construct()
    {
        // Memastikan hanya user login yang bisa mengakses controller ini
        $this->middleware('auth');
    }

    public function index()
    {
        // Proteksi Role: Jika bukan admin, arahkan kembali ke dashboard user
        // Menggunakan strtolower untuk menghindari masalah besar/kecil huruf
        if (strtolower(Auth::user()->role) !== 'admin') {
            return redirect('/dashboard')->with('error', 'Akses ditolak! Anda bukan admin.');
        }

        // Mengambil data dari database
        $data = [
            'total_pendaftar' => Pendaftaran::count(),
            'status_disetujui' => Pendaftaran::where('status', 'Disetujui')->count(),
            'status_menunggu'  => Pendaftaran::where('status', 'Menunggu Verifikasi')->count(),
            'pendaftarans'     => Pendaftaran::latest()->get() // Mengambil semua pendaftaran terbaru
        ];

        return view('admin_dashboard', $data);
    }
}