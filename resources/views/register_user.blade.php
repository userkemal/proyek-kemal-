<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun Siswa - SPMB SMKN 5 Telkom Banda Aceh</title>

    <!-- Font & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0f3d9e;
            --primary-dark: #0a296b;
            --bg-gradient: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --danger: #ef4444;
            --border-radius: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 20px;
        }

        .register-container {
            background: var(--card-bg);
            width: 100%;
            max-width: 520px;
            padding: 40px 35px;
            border-radius: var(--border-radius);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
        }

        /* HEADER REGISTRASI */
        .register-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .register-header img {
            width: 65px;
            height: 65px;
            object-fit: contain;
            margin-bottom: 14px;
        }

        .register-header h1 {
            font-size: 22px;
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 6px;
        }

        .register-header p {
            font-size: 14px;
            color: var(--text-muted);
        }

        /* ALERT ERROR BLOCK (Bawaan Laravel) */
        .alert-danger {
            background: #fef2f2;
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--danger);
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .alert-danger ul {
            list-style-position: inside;
            margin-top: 5px;
            padding-left: 5px;
        }

        /* FORM INPUT STYLING */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            color: var(--text-muted);
            font-size: 15px;
            width: 18px;
            text-align: center;
        }

        .input-wrapper input {
            width: 100%;
            padding: 13px 16px 13px 45px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 14px;
            color: var(--text-main);
            background: #f8fafc;
            outline: none;
            transition: all 0.2s ease;
        }

        .input-wrapper input:focus {
            border-color: var(--primary-color);
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(15, 61, 158, 0.1);
        }

        /* BUTTON SUBMIT */
        .btn-register {
            width: 100%;
            padding: 14px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .btn-register:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        /* FOOTER LINGKUNGAN / LOGIN LINK */
        .register-footer {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: var(--text-muted);
        }

        .register-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .register-footer a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .btn-back-home {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 20px;
            font-size: 13px;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .btn-back-home:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>

<div class="register-container">
    <!-- Header -->
    <div class="register-header">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Logo SMKN 5 Telkom">
        <h1>Daftar Akun Baru</h1>
        <p>Sistem Seleksi Penerimaan Murid Baru (SPMB)</p>
    </div>

    <!-- Menampilkan Error Validasi Laravel jika ada -->
    @if ($errors->any())
        <div class="alert-danger">
            <div style="font-weight: 600;"><i class="fa-solid fa-circle-exclamation"></i> Gagal mendaftar. Mohon periksa kembali:</div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Registrasi -->
    <form action="{{ route('register.proses') }}" method="POST">
        @csrf
        
        <!-- Input Nama Lengkap -->
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-user"></i>
                <input type="text" id="name" name="name" placeholder="Masukkan nama sesuai ijazah" value="{{ old('name') }}" required autofocus>
            </div>
        </div>

        <!-- Input NISN -->
        <div class="form-group">
            <label for="nisn">NISN (Nomor Induk Siswa Nasional)</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-id-card"></i>
                <input type="text" id="nisn" name="nisn" placeholder="Contoh: 0081234567" value="{{ old('nisn') }}" required>
            </div>
        </div>

        <!-- Input Nomor Handphone -->
        <div class="form-group">
            <label for="no_hp">Nomor Handphone (WhatsApp)</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-phone"></i>
                <input type="text" id="no_hp" name="no_hp" placeholder="Contoh: 08123456789" value="{{ old('no_hp') }}" required>
            </div>
        </div>

        <!-- Input Email -->
        <div class="form-group">
            <label for="email">Alamat Email Aktif</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="contoh@email.com" value="{{ old('email') }}" required>
            </div>
        </div>

        <!-- Input Password -->
        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required>
            </div>
        </div>

        <!-- Input Konfirmasi Password -->
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Kata Sandi</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-shield-halved"></i>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi Anda" required>
            </div>
        </div>

        <!-- Tombol Registrasi -->
        <button type="submit" class="btn-register">
            Mendaftar Sekarang <i class="fa-solid fa-user-plus"></i>
        </button>
    </form>

    <!-- Footer Pendaftaran -->
    <div class="register-footer">
        Sudah memiliki akun? <a href="{{ route('login') }}">Masuk di sini</a>
        <br>
        <a href="/" class="btn-back-home">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda Utama
        </a>
    </div>
</div>

</body>
</html>