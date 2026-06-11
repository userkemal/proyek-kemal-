<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - SPMB SMKN 5 Telkom Banda Aceh</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0f3d9e;
            --primary-dark: #0a296b;
            --primary-light: rgba(15, 61, 158, 0.08);
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --border-radius: 14px;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body{
            background: var(--bg-color);
            color: var(--text-main);
        }

        /* TOPBAR */
        .topbar{
            background: var(--card-bg);
            height: 75px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,.05);
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .logo{
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo img{
            width: 42px;
            height: 42px;
            object-fit: contain;
        }

        .logo h2{
            color: var(--primary-color);
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .top-menu{
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .top-menu a{
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 14px;
            padding: 8px 4px;
            transition: all 0.2s ease;
            position: relative;
        }

        .top-menu a:hover, .top-menu a.active{
            color: var(--primary-color);
        }

        .top-menu a.active::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary-color);
            border-radius: 10px;
        }

        /* DROPDOWN PROFILE */
        .profile-dropdown-container {
            position: relative;
        }

        .user-box{
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 12px;
            border-radius: 30px;
            transition: all 0.2s ease;
            cursor: pointer;
            user-select: none;
            border: 1px solid #e2e8f0;
        }

        .user-box:hover {
            background: #f1f5f9;
        }

        .user-box span {
            font-weight: 600;
            font-size: 14px;
            color: var(--text-main);
        }

        .user-box img{
            width: 34px;
            height: 34px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-box i.fa-chevron-down {
            font-size: 11px;
            color: var(--text-muted);
            transition: transform 0.2s ease;
        }

        .profile-dropdown-container.active .user-box i.fa-chevron-down {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: 52px;
            right: 0;
            background: var(--card-bg);
            min-width: 200px;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);
            border-radius: var(--border-radius);
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.2s ease;
            z-index: 1000;
            border: 1px solid #f1f5f9;
        }

        .profile-dropdown-container.active .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu a, .dropdown-menu button {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 12px 20px;
            text-decoration: none;
            color: var(--text-main);
            font-size: 14px;
            font-weight: 500;
            border: none;
            background: none;
            text-align: left;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .dropdown-menu a:hover, .dropdown-menu button:hover {
            background: #f8fafc;
            color: var(--primary-color);
        }

        .dropdown-menu button.logout-item:hover {
            color: var(--danger);
            background: #fef2f2;
        }

        /* MAIN WRAPPER */
        .wrapper{
            display: flex;
            min-height: calc(100vh - 75px);
        }

        /* SIDEBAR */
        .sidebar{
            width: 260px;
            background: linear-gradient(180deg, #1e3a8a 0%, #0f172a 100%);
            color: white;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar h2{
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 35px;
            color: #f1f5f9;
        }

        .sidebar ul{
            list-style: none;
        }

        .sidebar ul li{
            margin-bottom: 8px;
        }

        .sidebar ul li a{
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #94a3b8;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar ul li a i {
            font-size: 16px;
            width: 20px;
        }

        .sidebar ul li a.active,
        .sidebar ul li a:hover{
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .btn-sidebar-logout {
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .btn-sidebar-logout:hover {
            background: var(--danger);
            color: white;
        }

        /* CONTENT AREA */
        .content{
            flex: 1;
            padding: 30px;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        /* BREADCRUMB */
        .breadcrumb-container {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 20px;
        }

        /* BANNER */
        .banner{
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-11541339907198-e08756dedf3f?q=80&w=1470');
            background-size: cover;
            background-position: center;
            height: 160px;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .banner-text{
            color: white;
            padding: 0 35px;
        }

        .banner-text h1{
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .banner-text p{
            font-size: 14px;
            color: #f1f5f9;
        }

        /* STATUS GRID (3 CARDS UTAMA) */
        .status-grid{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        /* CARDS */
        .card{
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,.02), 0 1px 2px rgba(0,0,0,.04);
            border: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card h3{
            font-size: 15px;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 12px;
        }

        .card p.status-badge {
            font-size: 15px;
            font-weight: 700;
            color: var(--warning);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fffbeb;
            padding: 6px 14px;
            border-radius: 30px;
            width: fit-content;
        }

        .card p.desc-text {
            color: var(--text-main);
            font-size: 16px;
            font-weight: 600;
        }

        .card a.btn-link, .card button.btn-link-submit{
            margin-top: 20px;
            padding: 10px 16px;
            border-radius: 8px;
            color: white;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .btn-red{ background: var(--danger); }
        .btn-red:hover { background: #dc2626; }

        .btn-blue{ background: var(--primary-color); }
        .btn-blue:hover { background: var(--primary-dark); }

        .btn-gray{
            background: #f1f5f9;
            color: var(--text-main) !important;
            border: 1px solid #e2e8f0;
        }
        .btn-gray:hover { background: #e2e8f0; }

        /* CARD SECTIONS TITLE */
        .card h2.section-title {
            font-size: 18px;
            color: var(--text-main);
            font-weight: 700;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card p.section-subtitle {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 20px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 12px;
        }

        /* WARNING NOTIFICATION YELLOW */
        .alert-warning-custom {
            background-color: #fef3c7;
            border: 1px solid #fde68a;
            color: #92400e;
            padding: 14px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 25px;
        }

        /* STEPPERS TAB NAVIGATION */
        .form-steps-tab {
            display: flex;
            gap: 12px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .step-badge {
            padding: 8px 18px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            background: #f1f5f9;
            color: var(--text-muted);
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .step-badge.active {
            background: #1e40af;
            color: #ffffff;
        }

        /* SPLIT SYSTEM FOR FORM & GUIDE */
        .form-split-layout {
            display: grid;
            grid-template-columns: 2.2fr 1fr;
            gap: 30px;
        }

        /* INPUT CONFIGURATIONS */
        .form-group-custom {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group-custom label {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
        }

        .form-group-custom label span.required {
            color: var(--danger);
            margin-left: 3px;
        }

        .form-group-custom input[type="text"],
        .form-group-custom input[type="email"],
        .form-group-custom input[type="number"],
        .form-group-custom input[type="date"],
        .form-custom-row-box input[type="number"],
        .form-group-custom select,
        .form-group-custom textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            color: var(--text-main);
            background: #f8fafc;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-group-custom input:focus, 
        .form-group-custom select:focus, 
        .form-group-custom textarea:focus {
            border-color: var(--primary-color);
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(15, 61, 158, 0.08);
        }

        /* BERKAS UPLOAD INDIKATOR STYLES */
        .upload-input-container {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
        }

        .upload-input-container input[type="file"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            background: #f8fafc;
            outline: none;
            cursor: pointer;
            padding-right: 120px;
            transition: all 0.2s ease;
        }

        .upload-status-badge {
            position: absolute;
            right: 14px;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-muted);
            background: #e2e8f0;
            padding: 5px 12px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            pointer-events: none;
            transition: all 0.2s ease;
        }

        .upload-input-container.uploaded input[type="file"] {
            border-color: var(--success);
            background: #ecfdf5;
        }

        .upload-input-container.uploaded .upload-status-badge {
            background: var(--success);
            color: white;
        }

        /* SUB HEADINGS UNTUK BAGIAN FORM */
        .form-sub-section-title {
            font-size: 15px;
            color: var(--primary-color);
            font-weight: 700;
            margin: 25px 0 15px 0;
            padding-bottom: 6px;
            border-bottom: 2px solid rgba(15, 61, 158, 0.1);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ROW FLEX GRID */
        .form-flex-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-custom-row-box {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .form-custom-row-box span {
            font-size: 14px;
            color: var(--text-muted);
            white-space: nowrap;
        }

        /* RADIO LAYOUT CONFIGURATION */
        .radio-box-wrapper {
            display: flex;
            gap: 25px;
            align-items: center;
            height: 45px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }

        .radio-option input[type="radio"] {
            width: 16px;
            height: 16px;
            accent-color: #1e40af;
        }

        /* SIDEBAR PETUNJUK */
        .instruction-panel {
            background-color: #f0f4f8;
            border-radius: 12px;
            padding: 24px;
            height: fit-content;
        }

        .instruction-panel h4 {
            font-size: 15px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .instruction-panel ul {
            list-style: none;
            padding: 0;
        }

        .instruction-panel ul li {
            font-size: 13px;
            color: #475569;
            margin-bottom: 12px;
            position: relative;
            padding-left: 15px;
            line-height: 1.5;
        }

        .instruction-panel ul li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: #475569;
            font-weight: bold;
        }

        /* NAVIGATION ACTION BUTTONS */
        .btn-action-container {
            margin-top: 15px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-submit-green {
            width: 100%;
            background-color: #386a5a;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
            text-align: center;
        }

        .btn-submit-green:hover {
            background-color: #2c5447;
        }

        /* FOOTER */
        .footer{
            text-align: center;
            color: var(--text-muted);
            font-size: 13px;
            margin-top: 35px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        /* RESPONSIVE MANAGEMENT */
        @media(max-width:1150px){
            .form-split-layout { grid-template-columns: 1fr; }
            .status-grid{ grid-template-columns: 1fr; }
        }
        @media(max-width:768px){
            .sidebar, .top-menu { display: none; }
        }
        @media(max-width: 576px) {
            .form-flex-row { grid-template-columns: 1fr; gap: 0; }
        }
    </style>
</head>
<body>

<div class="topbar">
    <div class="logo">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Logo">
        <h2>SMKN 5 TELKOM BANDA ACEH</h2>
    </div>

    <div class="top-menu">
        <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
        <a href="{{ route('pengumuman') }}">Pengumuman</a>
        <a href="{{ route('panduan') }}">Panduan</a>
        <a href="{{ route('profil') }}">Profil Saya</a>
    </div>

    <div class="profile-dropdown-container" id="profileDropdown">
        <div class="user-box">
            <img src="{{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : asset('default-avatar.png') }}" alt="Avatar">
            <span>{{ Auth::user()->name ?? 'Sulthan' }}</span>
            <i class="fa-solid fa-chevron-down"></i>
        </div>
        
        <div class="dropdown-menu">
            <a href="{{ route('profil') }}">
                <i class="fa-solid fa-user" style="color: var(--primary-color);"></i> Profil Saya
            </a>
            <hr style="border: 0; border-top: 1px solid #f1f5f9;">
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
                @csrf
                <button type="submit" class="logout-item">
                    <i class="fa-solid fa-key" style="color: var(--danger);"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="sidebar">
        <div>
            <h2>SMKN 5 TELKOM</h2>
            <ul>
                <li><a href="{{ route('dashboard') }}" class="active"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
                <li><a href="{{ route('pengumuman') }}"><i class="fa-solid fa-bullhorn"></i>Pengumuman</a></li>
                <li><a href="{{ route('panduan') }}"><i class="fa-solid fa-book"></i>Panduan</a></li>
                <li><a href="{{ route('profil') }}"><i class="fa-solid fa-user"></i>Profil Saya</a></li>
            </ul>
        </div>

        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
            @csrf
            <button type="submit" class="btn-sidebar-logout">
                <i class="fa-solid fa-right-from-bracket"></i> Keluar Aplikasi
            </button>
        </form>
    </div>
        <div class="content">
    <div class="breadcrumb-container">
        Dashboard / Pendaftaran
    </div>

    {{-- Pastikan $pendaftaran tersedia dari route --}}
    @php
        $pendaftaran = $pendaftaran ?? null;
    @endphp

    {{-- LOGIKA BARU DIMULAI DI SINI --}}
    @if(session('success'))
        <div class="alert-success-custom" style="margin-bottom: 20px; padding: 15px; background: #dcfce7; color: #166534; border-radius: 8px;">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-danger-custom" style="margin-bottom: 20px; padding: 15px; background: #fee2e2; color: #991b1b; border-radius: 8px; border: 1px solid #fecaca;">
            <i class="fa-solid fa-triangle-exclamation"></i> {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert-danger-custom" style="margin-bottom: 20px; padding: 15px; background: #fee2e2; color: #991b1b; border-radius: 8px; border: 1px solid #fecaca;">
            <div style="font-weight: 700; margin-bottom: 5px;"><i class="fa-solid fa-triangle-exclamation"></i> Terjadi kesalahan pendaftaran:</div>
            <ul style="margin-left: 20px; font-size: 14px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($pendaftaran)
        {{-- TAMPILAN REKAP (Jika sudah daftar) --}}
        @include('rekap-pendaftaran', ['pendaftaran' => $pendaftaran])
    @else
        {{-- TAMPILAN FORMULIR (Jika belum daftar) --}}
        @include('formulir-pendaftaran')
    @endif
    {{-- LOGIKA SELESAI --}}
    
    <div class="footer">
        &copy; 2026 SMKN 5 Telkom Banda Aceh. All Rights Reserved.
    </div>
</div>
</div>

<script>
    // Logika Dropdown Profile Menu
    const dropdownContainer = document.getElementById('profileDropdown');
    const userBox = dropdownContainer.querySelector('.user-box');

    userBox.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdownContainer.classList.toggle('active');
    });

    document.addEventListener('click', function(e) {
        if (!dropdownContainer.contains(e.target)) {
            dropdownContainer.classList.remove('active');
        }
    });

    // Fitur: Status file upload saat dipilih oleh pendaftar
    function handleFileStatus(inputElement) {
        const container = inputElement.closest('.upload-input-container');
        const badge = container.querySelector('.upload-status-badge');
        
        if (inputElement.files && inputElement.files.length > 0) {
            container.classList.add('uploaded');
            badge.innerHTML = `<i class="fa-solid fa-circle-check"></i> Selesai`;
        } else {
            container.classList.remove('uploaded');
            badge.innerHTML = `<i class="fa-solid fa-arrow-up-from-bracket"></i> Belum Ada`;
        }
    }

    // Variabel Steppers & Validasi
    const steps = document.querySelectorAll('.step-badge');
    const formSections = document.querySelectorAll('.form-step-content');
    const instructionText = document.getElementById('instruction-text');
    let currentActiveStep = 0; 

    const guidelines = [
        `<ul>
            <li>Isi data diri sesuai dokumen resmi (KK / Akta Kependudukan).</li>
            <li>Pastikan data NIK dan NISN sudah benar demi kelancaran pendaftaran Dapodik.</li>
            <li>Gunakan nomor kontak WhatsApp dan alamat Email pribadi yang aktif secara berkala.</li>
            <li>Pilih kompetensi keahlian yang paling sesuai dengan bakat minat Anda.</li>
         </ul>`,
        `<ul>
            <li>Tuliskan nama sekolah asal tanpa disingkat.</li>
            <li>Pilih status (Negeri/Swasta) dan jenis sekolah asal pendaftar secara benar.</li>
            <li>Masukkan wilayah Provinsi serta Kabupaten/Kota lokasi sekolah Anda berada.</li>
            <li>Inputkan nilai rata-rata Rapor semester 1 hingga semester 5 dengan format desimal.</li>
         </ul>`,
        `<ul>
            <li>Isikan data Ayah dan Ibu kandung secara lengkap sesuai dokumen resmi KK.</li>
            <li>Jika orang tua telah wafat, pilih status yang sesuai pada dropdown opsi status.</li>
            <li>Data NIK diperlukan untuk validasi sinkronisasi data kependudukan (Dapodik).</li>
            <li>Pastikan nomor WhatsApp orang tua aktif demi kelancaran informasi sekolah.</li>
         </ul>`,
        `<ul>
            <li>Format file yang diperbolehkan: PDF, JPG, JPEG, atau PNG.</li>
            <li>Pastikan ukuran masing-masing file dokumen tidak melebihi 2 Megabyte.</li>
            <li>Tanda indikator akan berubah menjadi hijau (<span style="color:var(--success); font-weight:bold;">Selesai</span>) jika berkas berhasil dimasukkan.</li>
         </ul>`
    ];
    

    // Logika Manajemen Perpindahan Formulir dengan Validasi Bertahap
    function switchStep(stepIndex, force = false) {
        
        // Aturan Validasi Maju Tab Berurutan (Mencegah user bypass kolom kosong)
        if (!force && stepIndex > currentActiveStep) {
            // Validasi bertahap untuk step saat ini sebelum diizinkan melangkah maju
            const currentContainer = document.getElementById(`step-${currentActiveStep}`);
            const requiredFields = currentContainer.querySelectorAll('[required], select[required], textarea[required]');
            
            // Aktifkan required attribute secara dinamis pada step 2 saat user mencoba melewatinya
            if (currentActiveStep === 1) {
                const step1Fields = currentContainer.querySelectorAll('input, select');
                step1Fields.forEach(field => {
                    if (field.id !== 'no_ijazah') { // Nomor ijazah opsional, yang lain wajib
                        field.setAttribute('required', 'required');
                    }
                });
            }

            if (currentActiveStep === 2) {
                const step2Fields = currentContainer.querySelectorAll('input, select');
                step2Fields.forEach(field => {
                    field.setAttribute('required', 'required');
                });
            }

            let isCurrentStepValid = true;
            for (let field of requiredFields) {
                if (!field.checkValidity()) {
                    isCurrentStepValid = false;
                    field.reportValidity(); 
                    return false; 
                }
            }
        }

        // Jalankan perpindahan tab jika validasi sukses atau ketika menekan tombol "Kembali"
        currentActiveStep = stepIndex; 

        steps.forEach((step, index) => {
            if(index === stepIndex) {
                step.classList.add('active');
            } else {
                step.classList.remove('active');
            }
        });

        formSections.forEach((section, index) => {
            if(index === stepIndex) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        });

        instructionText.innerHTML = guidelines[stepIndex];

        // Otomatis scroll ke area form agar terlihat oleh user
        const formCard = document.getElementById("pendaftaran-form-card");
        if (formCard) {
            formCard.scrollIntoView({ behavior: 'smooth' });
        }
    }
    
    
</script>

</body>
</html>