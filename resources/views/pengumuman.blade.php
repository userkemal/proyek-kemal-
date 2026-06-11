<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman - SPMB SMKN 5 Telkom Banda Aceh</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI', sans-serif; }
        body { background:#f5f6fa; color:#333; }
        
        header { background:#fff; display:flex; justify-content:space-between; align-items:center; padding:15px 60px; box-shadow:0 2px 8px rgba(0,0,0,0.08); position:sticky; top:0; z-index:999; }
        .logo { display:flex; align-items:center; gap:12px; }
        .logo img { width:55px; height:55px; border-radius:50%; }
        .logo h2 { color:#1d3f91; font-size:22px; }
        
        .btn-kembali { padding:10px 20px; background:#1d3f91; color:white; text-decoration:none; border-radius:6px; font-weight:600; transition: 0.3s; }
        .btn-kembali:hover { background:#112963; color:white; }
        
        .container { width:70%; margin:40px auto; }
        .main-content { background:white; padding:40px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.05); }
        
        h1 { color:#1d3f91; margin-bottom:30px; border-bottom:3px solid #1d3f91; padding-bottom:10px; }
        .announcement-box { background: #fff; border-left: 5px solid #ef4444; padding: 20px; margin-bottom: 20px; border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .announcement-box.info { border-left-color: #21468b; }
        
        footer { text-align:center; padding:25px; background:#16233b; color:white; margin-top:60px; }
        @media(max-width:768px){ .container { width:90%; } }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Logo">
        <h2>SMKN 5 TELKOM BANDA ACEH</h2>
    </div>
    <a href="{{ route('dashboard') }}" class="btn-kembali"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
</header>

<div class="container">
    <div class="main-content">
        <h1>Pengumuman Hasil Seleksi</h1>

        @php
            $user = auth()->user();
        @endphp

        @if($user)
            <div class="card shadow-sm border-0 rounded-4 p-4 mb-4">
                @if($user->status == 'Lulus')
                    <div class="alert alert-success border-0 rounded-3 mb-4" style="background-color: #d1e7dd; color: #0f5132;">
                        <i class="fa-solid fa-circle-check me-2"></i> <strong>Selamat, {{ $user->name }}!</strong> Anda dinyatakan <strong>LULUS</strong>.
                    </div>
                @elseif($user->status == 'Tidak Lulus')
                    <div class="alert alert-danger border-0 rounded-3 mb-4" style="background-color: #f8d7da; color: #842029;">
                        <i class="fa-solid fa-circle-xmark me-2"></i> Mohon maaf, {{ $user->name }}. Anda belum berhasil pada seleksi tahun ini.
                    </div>
                @else
                    <div class="alert alert-warning border-0 rounded-3 mb-4" style="background-color: #fff3cd; color: #856404;">
                        <i class="fa-solid fa-clock me-2"></i> Status pendaftaran Anda masih dalam tahap verifikasi.
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <h5 class="fw-bold mb-3">Detail Kelulusan</h5>
                        <table class="table table-borderless">
                            <tr><td>Nama</td><td>: {{ $user->name }}</td></tr>
                            <tr><td>NISN</td><td>: {{ $user->nisn ?? 'Data tidak tersedia' }}</td></tr>
                            <tr><td>Status</td><td>: <span class="badge {{ $user->status == 'Lulus' ? 'bg-success' : 'bg-danger' }}">{{ $user->status }}</span></td></tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <h5 class="fw-bold mb-3">Instruksi Selanjutnya</h5>
                        <ol class="ps-3 text-muted">
                            <li>Ikuti tes wawancara pada 29 Juni 2026</li>
                            <li>Siapkan dokumen asli untuk verifikasi</li>
                            <li>Registrasi ulang 1-5 Juli 2026</li>
                        </ol>
                    </div>
                </div>

                @if($user->status == 'Lulus')
                    <a href="{{ route('download.bukti') }}" class="btn btn-danger w-100 mt-3 rounded-3 py-2 fw-bold">
                        <i class="fa-solid fa-download me-2"></i> Download Bukti Kelulusan
                    </a>
                @endif
            </div>
        @else
            <p>Mohon maaf, Anda harus login terlebih dahulu untuk melihat pengumuman.</p>
        @endif

        <h3 class="mb-3">Informasi Tambahan</h3>
        <div class="announcement-box">
            <div class="text-danger fw-bold mb-1"><i class="fa-solid fa-calendar-days"></i> 20 Juni 2026</div>
            <h5>Jadwal Tes Wawancara SPMB 2026</h5>
            <p>Pelaksanaan tes wawancara gelombang pertama akan dilaksanakan secara tatap muka.</p>
        </div>
    </div>
</div>

<footer>
    © 2026 SMKN 5 Telkom Banda Aceh. All Rights Reserved.
</footer>

</body>
</html>