<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMB SMKN 5 Telkom Banda Aceh - Beranda Utama</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0f3d9e;
            --primary-dark: #0a296b;
            --primary-light: rgba(15, 61, 158, 0.08);
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-radius: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background: var(--bg-color);
            color: var(--text-main);
        }

        /* NAVBAR */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10%;
            box-shadow: 0 1px 3px rgba(0,0,0,.05);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid #f1f5f9;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo img {
            width: 45px;
            height: 45px;
            object-fit: contain;
        }

        .logo h2 {
            color: var(--primary-color);
            font-size: 16px;
            font-weight: 800;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn-nav {
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-outline {
            color: var(--primary-color);
            border: 1.5px solid var(--primary-color);
        }

        .btn-outline:hover {
            background: var(--primary-light);
        }

        .btn-solid {
            background: var(--primary-color);
            color: white;
            box-shadow: 0 4px 10px rgba(15, 61, 158, 0.2);
        }

        .btn-solid:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* HERO SECTION */
        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            padding: 80px 10%;
            gap: 50px;
            min-height: calc(100vh - 80px);
        }

        .hero-text h1 {
            font-size: 42px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-text h1 span {
            color: var(--primary-color);
        }

        .hero-text p {
            font-size: 16px;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 35px;
        }

        .hero-cta {
            display: flex;
            gap: 15px;
        }

        .btn-hero {
            padding: 14px 28px;
            border-radius: var(--border-radius);
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s ease;
        }

        .hero-image {
            position: relative;
            display: flex;
            justify-content: center;
        }

        .hero-image img {
            width: 100%;
            max-width: 480px;
            border-radius: var(--border-radius);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        /* STATS SECTION */
        .stats-section {
            background: white;
            padding: 5px 0;
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 32px;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .stat-item p {
            font-size: 14px;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* STEPS SECTION (ALUR) */
        .section {
            padding: 80px 10%;
            text-align: center;
        }

        .section-title {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .section-subtitle {
            font-size: 15px;
            color: var(--text-muted);
            margin-bottom: 50px;
        }

        .grid-steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .step-card {
            background: white;
            padding: 30px 20px;
            border-radius: var(--border-radius);
            border: 1px solid #e2e8f0;
            position: relative;
            transition: all 0.3s ease;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border-color: var(--primary-color);
        }

        .step-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-light);
            color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin: 0 auto 20px;
        }

        .step-card h4 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .step-card p {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.5;
        }

        .step-number {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            font-weight: 800;
            color: #f1f5f9;
        }

        /* MAJORS SECTION (JURUSAN) */
        .bg-white {
            background: white;
        }

        .grid-majors {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .major-card {
            background: var(--bg-color);
            border-radius: var(--border-radius);
            overflow: hidden;
            border: 1px solid #e2e8f0;
            text-align: left;
            transition: all 0.3s ease;
        }

        .major-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        }

        .major-img {
            height: 160px;
            background-size: cover;
            background-position: center;
        }

        .major-info {
            padding: 20px;
        }

        .major-info h4 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #0f172a;
        }

        .major-info p {
            font-size: 12.5px;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* FOOTER */
        .main-footer {
            background: #0f172a;
            color: #94a3b8;
            padding: 60px 10% 30px;
            font-size: 14px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 50px;
            margin-bottom: 40px;
        }

        .footer-logo h3 {
            color: white;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .footer-col h4 {
            color: white;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-col ul li a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #334155;
            font-size: 13px;
        }

        /* RESPONSIVE */
        @media (max-width: 1200px) {
            .grid-majors { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 1024px) {
            .hero { grid-template-columns: 1fr; text-align: center; }
            .hero-cta { justify-content: center; }
            .hero-image { order: -1; }
            .grid-steps { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .navbar .nav-links { display: none; }
            .grid-steps { grid-template-columns: 1fr; }
            .grid-majors { grid-template-columns: 1fr; }
            .footer-content { grid-template-columns: 1fr; gap: 30px; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="logo">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Logo">
        <h2>SMKN 5 TELKOM<br><span style="font-size: 12px; font-weight: 500; color: var(--text-muted)">BANDA ACEH</span></h2>
    </div>

    <div class="nav-links">
        <a href="#">Beranda</a>
        <a href="#alur">Alur Pendaftaran</a>
        <a href="#jurusan">Jurusan</a>
        <a href="{{ route('panduan') }}">Panduan</a>
    </div>

    <div class="nav-buttons">
        @auth
            <a href="{{ route('user.dashboard') }}" class="btn-nav btn-solid">Dashboard Saya</a>
        @else
            <a href="{{ route('login') }}" class="btn-nav btn-outline">Masuk</a>
            <a href="{{ route('register') }}" class="btn-nav btn-solid">Daftar Akun</a>
        @endauth
    </div>
</nav>

<header class="hero">
    <div class="hero-text">
        <h1>Mulai Masa Depan Digitalmu di <span>SMKN 5 Telkom</span></h1>
        <p>Ayo bergabung bersama Seleksi Penerimaan Murid Baru (SPMB) tahun ajaran 2026/2027. Jadilah bagian dari generasi unggul, kompeten, dan siap kerja di era transformasi digital global.</p>
        <div class="hero-cta">
            <a href="{{ route('register') }}" class="btn-hero btn-solid">Daftar Sekarang <i class="fa-solid fa-arrow-right"></i></a>
            <a href="#alur" class="btn-hero btn-gray" style="border: 1px solid #cbd5e1; background: #f1f5f9; color: var(--text-main);">Pelajari Alur</a>
        </div>
    </div>
    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1740" alt="Siswa SMKN 5 Telkom">
    </div>
</header>

<section class="stats-section">
    <div class="stats-container">
        <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
            <h3>A+</h3>
            <p>Akreditasi Sekolah</p>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
            <h3>4</h3>
            <p>Pilihan Jurusan Unggulan</p>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
            <h3>100%</h3>
            <p>Fasilitas Lab Modern</p>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
            <h3>1.200+</h3>
            <p>Alumni Terserap Industri</p>
        </div>
    </div>
</section>

<section class="section" id="alur">
    <h2 class="section-title">Alur Pendaftaran Mudah</h2>
    <p class="section-subtitle">Ikuti 4 langkah mudah berikut untuk mendaftar menjadi calon siswa baru</p>

    <div class="grid-steps">
        <div class="step-card">
            <div class="step-number">01</div>
            <div class="step-icon"><i class="fa-solid fa-user-plus"></i></div>
            <h4>Buat Akun</h4>
            <p>Lakukan registrasi data diri awal untuk mengaktifkan akun pendaftaran sistem SPMB.</p>
        </div>

        <div class="step-card">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fa-solid fa-file-invoice"></i></div>
            <h4>Lengkapi Berkas</h4>
            <p>Isi biodata lengkap dan unggah dokumen administrasi penunjang (Kartu Keluarga, SKL/Rapor).</p>
        </div>

        <div class="step-card">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fa-solid fa-clipboard-check"></i></div>
            <h4>Verifikasi Data</h4>
            <p>Tim panitia internal akan memvalidasi dokumen Anda secara berkala dalam 2x24 jam.</p>
        </div>

        <div class="step-card">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fa-solid fa-comments"></i></div>
            <h4>Tes Wawancara</h4>
            <p>Ikuti rangkaian ujian seleksi wawancara sesuai jadwal penentuan untuk pengumuman kelulusan.</p>
        </div>
    </div>
</section>

<section class="section bg-white" id="jurusan">
    <h2 class="section-title">Kompetensi Keahlian (Jurusan)</h2>
    <p class="section-subtitle">Pilih peminatan bakat terbaikmu untuk bersaing di dunia teknologi informasi global</p>

    <div class="grid-majors">
        <div class="major-card">
            <div class="major-img" style="background-image: url('https://images.unsplash.com/photo-1544197150-b99a580bb7a8?q=80&w=600')"></div>
            <div class="major-info">
                <h4>Teknik Jaringan Akses (TJA)</h4>
                <p>Mempelajari instalasi jaringan fiber optik, sistem komunikasi seluler, gelombang radio micro-link, dan infrastruktur broadband telekomunikasi.</p>
            </div>
        </div>

        <div class="major-card">
            <div class="major-img" style="background-image: url('https://images.unsplash.com/photo-1600132806370-bf17e65e942f?q=80&w=600')"></div>
            <div class="major-info">
                <h4>Teknik Komputer dan Jaringan (TKJ)</h4>
                <p>Fokus pada perancangan infrastruktur jaringan LAN/WAN, manajemen routing server, administrasi sistem cyber-security, dan cloud computing.</p>
            </div>
        </div>

        <div class="major-card">
            <div class="major-img" style="background-image: url('https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=600')"></div>
            <div class="major-info">
                <h4>Rekayasa Perangkat Lunak (RPL)</h4>
                <p>Mempelajari pengembangan software backend/frontend, coding aplikasi Mobile Android/iOS, desain website responsive, serta pengelolaan database.</p>
            </div>
        </div>

        <div class="major-card">
            <div class="major-img" style="background-image: url('https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=600')"></div>
            <div class="major-info">
                <h4>Multi Media (MM)</h4>
                <p>Pengembangan kreativitas media digital, produksi konten video, modeling 3D, editing animasi 2D/3D, fotografi studio, dan seni UI/UX visual.</p>
            </div>
        </div>
    </div>
</section>

<footer class="main-footer">
    <div class="footer-content">
        <div class="footer-logo">
            <h3>SMKN 5 Telkom Banda Aceh</h3>
            <p style="line-height: 1.6; font-size: 13px;">Sekolah Pusat Keunggulan bidang teknologi informasi dan komunikasi yang berkomitmen melahirkan praktisi andal digital tanah air.</p>
        </div>
        <div class="footer-col">
            <h4>Navigasi</h4>
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#alur">Alur Seleksi</a></li>
                <li><a href="#jurusan">Jurusan Pilihan</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Kontak Hubungi</h4>
            <p style="font-size: 13px; line-height: 1.6;">
                <i class="fa-solid fa-location-dot"></i> Jl. Telkom No. 5, Banda Aceh<br>
                <i class="fa-solid fa-envelope"></i> spmb@smkn5telkom-bna.sch.id<br>
                <i class="fa-solid fa-phone"></i> +62 651 1234 567
            </p>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2026 SMKN 5 Telkom Banda Aceh. All Rights Reserved.
    </div>
</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({ duration: 1000, once: true });

  function animateCounter(element, target, duration = 2000) {
    let start = 0;
    let increment = target / (duration / 16);
    let timer = setInterval(() => {
      start += increment;
      if (start >= target) {
        // Menampilkan angka dengan format ribuan dan menambahkan simbol jika ada
        let symbol = element.dataset.symbol || '';
        element.innerText = target.toLocaleString('id-ID') + symbol;
        clearInterval(timer);
      } else {
        element.innerText = Math.floor(start);
      }
    }, 16);
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const h3 = entry.target.querySelector('h3');
        // Hanya jalankan jika data-target adalah angka
        if (h3.dataset.target !== "NaN") {
          animateCounter(h3, parseInt(h3.dataset.target));
        }
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  document.querySelectorAll('.stat-item').forEach(item => {
    const h3 = item.querySelector('h3');
    let text = h3.innerText;
    
    // Pisahkan angka dari simbol (+, %, dll)
    let numberMatch = text.match(/[\d,.]+/);
    
    if (numberMatch) {
      let numericValue = parseInt(numberMatch[0].replace(/\./g, ''));
      h3.dataset.target = numericValue;
      h3.dataset.symbol = text.replace(/[\d,.]+/g, ''); // Simpan simbolnya
      h3.innerText = '0'; // Set ke 0 agar animasi mulai dari 0
      observer.observe(item);
    }
  });
</script>

</body>
</html>