<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Pendaftaran - SPMB SMKN 5 Telkom Banda Aceh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        *{ margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI',sans-serif; }
        body{ background:#f5f6fa; color:#333; }
        header{ background:#fff; display:flex; justify-content:space-between; align-items:center; padding:15px 60px; box-shadow:0 2px 8px rgba(0,0,0,0.08); }
        .logo{ display:flex; align-items:center; gap:12px; }
        .logo img{ width:55px; height:55px; border-radius:50%; }
        .logo h2{ color:#1d3f91; font-size:22px; }
        .btn-kembali{ padding:10px 20px; background:#1d3f91; color:white; text-decoration:none; border-radius:6px; font-weight:600; }
        .container{ width:70%; margin:40px auto; background:white; padding:40px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.05); }
        h1{ color:#1d3f91; margin-bottom:30px; border-bottom:3px solid #1d3f91; padding-bottom:10px; }
        .step{ display:flex; gap:20px; margin-bottom:25px; }
        .step-number{ background:#ef4444; color:white; width:40px; height:40px; display:flex; align-items:center; justify-content:center; border-radius:50%; font-weight:bold; font-size:18px; flex-shrink:0; }
        .step-text h3{ color:#1d3f91; margin-bottom:5px; }
        .step-text p{ line-height:1.6; color:#555; }
        footer{ text-align:center; padding:25px; background:#16233b; color:white; margin-top:60px; }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Logo">
        <h2>SMKN 5 TELKOM BANDA ACEH</h2>
    </div>
    <a href="{{ url('/dashboard') }}" class="btn-kembali"><i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda</a>
</header>

<div class="container">
    <h1>Alur & Panduan Pendaftaran SPMB 2026</h1>

    <div class="step">
        <div class="step-number">1</div>
        <div class="step-text">
            <h3>Membuat Akun Pendaftaran</h3>
            <p>Calon murid menekan tombol <b>Daftar</b> di halaman utama, kemudian mengisi Nama Lengkap, NISN, No HP, Email aktif, dan Password.</p>
        </div>
    </div>

    <div class="step">
        <div class="step-number">2</div>
        <div class="step-text">
            <h3>Melakukan Login Sesi</h3>
            <p>Setelah akun terbuat, masuk menggunakan Email dan Password yang telah didaftarkan untuk mengakses Dashboard Siswa.</p>
        </div>
    </div>

    <div class="step">
        <div class="step-number">3</div>
        <div class="step-text">
            <h3>Mengunggah Berkas Dokumen</h3>
            <p>Di dalam dashboard, klik menu 'Unggah Berkas'. Siapkan scan Kartu Keluarga, Akta Kelahiran, dan Raport terakhir dalam format PDF/JPG maksimal 2MB.</p>
        </div>
    </div>

    <div class="step">
        <div class="step-number">4</div>
        <div class="step-text">
            <h3>Memantau Hasil Seleksi Berkas</h3>
            <p>Tim panitia SMKN 5 Telkom Banda Aceh akan memverifikasi berkas Anda. Status kelulusan administrasi dapat dilihat langsung pada kartu status dashboard.</p>
        </div>
    </div>
</div>

<footer>
    © 2026 SMKN 5 Telkom Banda Aceh. All Rights Reserved.
</footer>

</body>
</html>