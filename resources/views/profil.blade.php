<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SPMB SMKN 5 Telkom Banda Aceh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        *{ margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI',sans-serif; }
        body{ background:#f3f4f6; color:#333; }
        header{ background:#fff; display:flex; justify-content:space-between; align-items:center; padding:15px 60px; box-shadow:0 2px 8px rgba(0,0,0,0.08); }
        .logo{ display:flex; align-items:center; gap:12px; }
        .logo img{ width:55px; height:55px; border-radius:50%; }
        .logo h2{ color:#1d3f91; font-size:22px; }
        .btn-dashboard{ padding:10px 20px; background:#1d3f91; color:white; text-decoration:none; border-radius:6px; font-weight:600; }
        .btn-edit{ padding:10px 20px; background:#28a745; color:white; text-decoration:none; border-radius:6px; font-weight:600; display:inline-block; margin-top:20px; }
        .profile-container{ width:50%; margin:50px auto; background:white; border-radius:12px; padding:30px; box-shadow:0 4px 15px rgba(0,0,0,0.05); text-align:center; }
        .profile-container img{ width:150px; height:150px; border-radius:50%; border:4px solid #1d3f91; margin-bottom:15px; object-fit: cover; }
        .profile-container h2{ color:#1d3f91; margin-bottom:20px; }
        .info-table { width:100%; margin-top:20px; border-collapse: collapse; text-align: left; }
        .info-table th, .info-table td { padding:12px 15px; border-bottom: 1px solid #e5e7eb; font-size:15px; }
        .info-table th { color:#4b5563; width: 35%; font-weight: 600; }
        .info-table td { color:#111827; }
        footer{ text-align:center; padding:25px; color:#777; margin-top:40px; }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Logo">
        <h2>SMKN 5 TELKOM BANDA ACEH</h2>
    </div>
    <a href="{{ route('dashboard') }}" class="btn-dashboard">
        <i class="fa-solid fa-gauge"></i> Ke Dashboard
    </a>
</header>

<div class="profile-container">
    <img src="{{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : asset('default-avatar.png') }}" width="150" alt="Foto Profil">
    
    <h2>Data Diri Calon Murid</h2>

    <table class="info-table">
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr>
            <th>NISN Siswa</th>
            <td>{{ Auth::user()->nisn }}</td>
        </tr>
        <tr>
            <th>Nomor Handphone</th>
            <td>{{ Auth::user()->no_hp }}</td>
        </tr>
        <tr>
            <th>Alamat Email</th>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr>
            <th>Tanggal Registrasi</th>
            <td>{{ Auth::user()->created_at->format('d F Y') }}</td>
        </tr>
    </table>

    <a href="{{ route('profil.edit') }}" class="btn-edit">
        <i class="fa-solid fa-edit"></i> Edit Profil
    </a>
</div>

<footer>
    © 2026 SMKN 5 Telkom Banda Aceh. All Rights Reserved.
</footer>

</body>
</html>