<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Calon Siswa - SPMB SMKN 5 Telkom Banda Aceh</title>

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
            padding: 20px;
        }

        .login-container {
            background: var(--card-bg);
            width: 100%;
            max-width: 450px;
            padding: 40px 35px;
            border-radius: var(--border-radius);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
        }

        /* HEADER LOGIN */
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            margin-bottom: 16px;
        }

        .login-header h1 {
            font-size: 22px;
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 6px;
        }

        .login-header p {
            font-size: 14px;
            color: var(--text-muted);
        }

        /* ALERT ERROR (Jika login gagal) */
        .alert-danger {
            background: #fef2f2;
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--danger);
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* FORM INPUT STYLING */
        .form-group {
            margin-bottom: 20px;
            position: relative;
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
            font-size: 16px;
        }

        .input-wrapper input {
            width: 100%;
            padding: 14px 16px 14px 45px;
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
        .btn-login {
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

        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* FOOTER / LINK DAFTAR */
        .login-footer {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: var(--text-muted);
        }

        .login-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .login-footer a:hover {
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

<div class="login-container">
    <div class="login-header">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Logo SMKN 5 Telkom">
        <h1>SPMB Masuk</h1>
        <p>Panel Seleksi Penerimaan Murid Baru</p>
    </div>

    @if ($errors->any())
        <div class="alert-danger">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>Email atau Password salah, silakan coba lagi.</span>
        </div>
    @endif

    <form action="{{ route('login.proses') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="email">Alamat Email</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="contoh@email.com" value="{{ old('email') }}" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
            </div>
        </div>

        <button type="submit" class="btn-login">
            Masuk Sekarang <i class="fa-solid fa-arrow-right-to-bracket"></i>
        </button>
    </form>

    <div class="login-footer">
        Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
        <br>
        <a href="/" class="btn-back-home">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda Utama
        </a>
    </div>
</div>

</body>
</html>