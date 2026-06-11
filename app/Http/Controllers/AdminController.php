<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // Bypass autentikasi untuk sementara agar admin dashboard bisa diakses langsung.
        // (Proteksi role/auth akan ditambahkan kembali setelah fitur utama beres.)
    }

    public function index()
    {
        // Proteksi role dinonaktifkan dulu agar /admin/dashboard bisa diakses saat tahap awal.
        // Nanti setelah login admin selesai, proteksi role bisa diaktifkan kembali.

        $data = [
            'total_pendaftar' => Pendaftaran::count(),

            // NOTE:
            // Kolom `status` di tabel `pendaftarans` belum ada pada migration.
            // Biar halaman admin tidak error, sementara tampilkan hitungan berbasis data yang tersedia.
            // Jika nanti kamu menambahkan kolom `status` (mis. Disetujui / Menunggu Verifikasi),
            // bagian ini bisa dikembalikan.
            'status_disetujui' => 0,
            'status_menunggu'  => 0,

            'pendaftarans'     => Pendaftaran::latest()->get(),
        ];

        return view('admin_dashboard', $data);
    }
}

