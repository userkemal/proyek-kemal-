<div class="card">
    <h2 class="section-title"><i class="fa-solid fa-check-circle"></i> Data Pendaftaran Anda</h2>
    <div class="rekap-grid">
        <div class="rekap-item">
            <label>Nama Lengkap</label>
            <p>{{ $pendaftaran->nama }}</p>
        </div>
        <div class="rekap-item">
            <label>NISN</label>
            <p>{{ $pendaftaran->nisn }}</p>
        </div>
        <div class="rekap-item">
            <label>Jurusan Pilihan</label>
            <p>{{ $pendaftaran->jurusan_pilihan }}</p>
        </div>
        </div>
    
    <div class="alert-info">
        Status Pendaftaran: <strong>{{ $pendaftaran->status ?? 'Menunggu Verifikasi' }}</strong>
    </div>
</div>