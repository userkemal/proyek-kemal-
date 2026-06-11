<div class="card" id="pendaftaran-form-card" style="margin-bottom: 25px;">
    
    <div class="card" id="pendaftaran-form-card">
        <h2 class="section-title">Formulir Biodata Pendaftaran</h2>
    </div>

    <p class="section-subtitle">Isikan data diri lengkap Anda untuk pendaftaran murid baru.</p>
{{-- MULAI BLOK IF --}}
    @if(session('success'))
        <div class="alert-success-custom">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @elseif($pendaftaran)
        <div class="alert-warning-custom" style="border-color:#bbf7d0; background:#ecfdf5; color:#065f46;">
            <i class="fa-solid fa-circle-check"></i> Data pendaftaran Anda sudah tersimpan.
        </div>
    @endif
    {{-- AKHIR BLOK IF --}}

    <div class="alert-warning-custom">
        Data berikut wajib diisi lengkap untuk melanjutkan pendaftaran.
    </div>

    <!-- STEPPERS TAB NAVIGATION -->
    <div class="form-steps-tab">
        <button type="button" class="step-badge active" onclick="switchStep(0)">Data Pribadi</button>
        <button type="button" class="step-badge" onclick="switchStep(1)">Data Sekolah Asal</button>
        <button type="button" class="step-badge" onclick="switchStep(2)">Data Orang Tua/Wali</button>
        <button type="button" class="step-badge" onclick="switchStep(3)">Upload Berkas</button>
    </div>

    <div class="form-split-layout">
        
        <form action="{{ route('pendaftaran.store') }}"
              method="POST"
              id="mainFormSPMB"
              enctype="multipart/form-data">
            @csrf
            
            <!-- STEP 1: DATA PRIBADI -->
            <div class="form-step-content" id="step-0">
                
                <div class="form-group-custom">
                    <label for="full_name">Nama Lengkap (Sesuai Ijazah) <span class="required">*</span></label>
                    <input type="text" id="full_name" name="nama" value="{{ old('nama', $pendaftaran->nama ?? Auth::user()->name ?? '') }}" placeholder="Nama Lengkap" required>
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="nik_siswa">NIK Siswa <span class="required">*</span></label>
                        <input type="text" id="nik_siswa" name="nik_siswa" value="{{ old('nik_siswa', $pendaftaran->nik_siswa ?? '') }}" placeholder="16 Digit Nomor Induk Kependudukan" required>
                    </div>
                    <div class="form-group-custom">
                        <label for="nisn_code">NISN <span class="required">*</span></label>
                        <input type="text" id="nisn_code" name="nisn" value="{{ old('nisn', $pendaftaran->nisn ?? Auth::user()->nisn ?? '') }}" placeholder="Nomor Induk Siswa Nasional" required>
                    </div>
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="form-tmp-lahir">Tempat Lahir <span class="required">*</span></label>
                        <input type="text" id="form-tmp-lahir" name="tempat_lahir" placeholder="Contoh: Banda Aceh" required>
                    </div>

                    <div class="form-group-custom">
                        <label for="birth_date">Tanggal Lahir <span class="required">*</span></label>
                        <input type="date" id="birth_date" name="tanggal_lahir" required>
                    </div>
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label>Jenis Kelamin <span class="required">*</span></label>
                        <div class="radio-box-wrapper">
                            <label class="radio-option">
                                <input type="radio" name="jenis_kelamin" value="Laki-laki" checked required> Laki-laki
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                            </label>
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label for="form-agama">Agama <span class="required">*</span></label>
                        <select id="form-agama" name="agama" required>
                            <option value="" disabled selected>-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Khonghucu">Khonghucu</option>
                        </select>
                    </div>
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="telepon_siswa">Nomor HP / WhatsApp Siswa <span class="required">*</span></label>
                        <input type="text" id="telepon_siswa" name="telepon_siswa" placeholder="Contoh: 08XXXXXXXXXX" required>
                    </div>
                    <div class="form-group-custom">
                        <label for="email_siswa">Email Aktif <span class="required">*</span></label>
                        <input type="email" id="email_siswa" name="email_siswa" value="{{ Auth::user()->email ?? '' }}" placeholder="contoh@email.com" required>
                    </div>
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="anak_ke">Status Saudara Kandung <span class="required">*</span></label>
                        <div class="form-custom-row-box">
                            <span>Anak Ke-</span>
                            <input type="number" id="anak_ke" name="anak_ke" min="1" placeholder="1" required>
                            <span>Dari</span>
                            <input type="number" id="jumlah_saudara" name="jumlah_saudara" min="1" placeholder="3" required>
                            <span>Bersaudara</span>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label for="form-jurusan">Kompetensi Keahlian (Pilihan Jurusan) <span class="required">*</span></label>
                        <select id="form-jurusan" name="jurusan_pilihan" required>
                            <option value="" disabled selected>-- Pilih Jurusan --</option>
                            <option value="TJA">Teknik Jaringan Akses (TJA)</option>
                            <option value="TKJ">Teknik Komputer dan Jaringan (TKJ)</option>
                            <option value="RPL">Rekayasa Perangkat Lunak (RPL)</option>
                            <option value="MM">Multi Media (MM)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group-custom">
                    <label for="full_address">Alamat Lengkap Rumah <span class="required">*</span></label>
                    <textarea id="full_address" name="alamat" rows="3" placeholder="Nama jalan, nomor rumah, RT/RW, Kecamatan, Kabupaten/Kota" required></textarea>
                </div>

                <div class="btn-action-container">
                    <button type="button" class="btn-submit-green" onclick="switchStep(1)">Selanjutnya</button>
                </div>
            </div>

            <!-- STEP 2: DATA SEKOLAH ASAL -->
            <div class="form-step-content" id="step-1" style="display: none;">
                
                <div class="form-group-custom">
                    <label for="form-sekolah">Nama Sekolah Asal (SMP / MTs) <span class="required">*</span></label>
                    <input type="text" id="form-sekolah" name="sekolah_asal" placeholder="Contoh: SMP Negeri 1 Banda Aceh">
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="status_sekolah">Status Sekolah <span class="required">*</span></label>
                        <select id="status_sekolah" name="status_sekolah">
                            <option value="" disabled selected>-- Pilih Status --</option>
                            <option value="Negeri">Negeri</option>
                            <option value="Swasta">Swasta</option>
                        </select>
                    </div>
                    <div class="form-group-custom">
                        <label for="jenis_sekolah">Jenis Sekolah <span class="required">*</span></label>
                        <select id="jenis_sekolah" name="jenis_sekolah">
                            <option value="" disabled selected>-- Pilih Jenis --</option>
                            <option value="SMP">SMP</option>
                            <option value="MTs">MTs</option>
                            <option value="PKBM">PKBM / Paket B</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="provinsi_sekolah">Provinsi Sekolah Asal <span class="required">*</span></label>
                        <input type="text" id="provinsi_sekolah" name="provinsi_sekolah" placeholder="Contoh: Aceh">
                    </div>
                    <div class="form-group-custom">
                        <label for="kota_sekolah">Kabupaten / Kota Sekolah <span class="required">*</span></label>
                        <input type="text" id="kota_sekolah" name="kota_sekolah" placeholder="Contoh: Kota Banda Aceh">
                    </div>
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="tahun_lulus">Tahun Lulus <span class="required">*</span></label>
                        <input type="text" id="tahun_lulus" name="tahun_lulus" placeholder="Contoh: 2026">
                    </div>
                    <div class="form-group-custom">
                        <label for="no_ijazah">Nomor Seri Ijazah / SKL</label>
                        <input type="text" id="no_ijazah" name="no_ijazah" placeholder="Masukkan nomor ijazah (kosongkan jika belum ada)">
                    </div>
                </div>

                <div class="form-sub-section-title">
                    <i class="fa-solid fa-graduation-cap"></i> Nilai Akademik Pendukung
                </div>

                <div class="form-group-custom">
                    <label for="nilai_rapor">Rata-Rata Nilai Rapor (Semester 1 - 5) <span class="required">*</span></label>
                    <input type="number" id="nilai_rapor" name="nilai_rapor" step="0.01" min="0" max="100" placeholder="Contoh: 85.50">
                </div>

                <div class="btn-action-container" style="gap: 12px;">
                    <button type="button" class="btn-submit-green btn-gray" onclick="switchStep(0)">Kembali</button>
                    <button type="button" class="btn-submit-green" onclick="switchStep(2)">Selanjutnya</button>
                </div>
            </div>

            <!-- STEP 3: DATA ORANG TUA/WALI -->
            <div class="form-step-content" id="step-2" style="display: none;">
                
                <div class="form-sub-section-title">
                    <i class="fa-solid fa-user-tie"></i> Data Ayah Kandung
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="nama_ayah">Nama Lengkap Ayah <span class="required">*</span></label>
                        <input type="text" id="nama_ayah" name="nama_ayah" placeholder="Nama Lengkap Ayah Sesuai KK">
                    </div>
                    <div class="form-group-custom">
                        <label for="status_ayah">Status Ayah <span class="required">*</span></label>
                        <select id="status_ayah" name="status_ayah">
                            <option value="Masih Hidup">Masih Hidup</option>
                            <option value="Sudah Meninggal">Sudah Meninggal / Wafat</option>
                        </select>
                    </div>
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="nik_ayah">NIK Ayah <span class="required">*</span></label>
                        <input type="text" id="nik_ayah" name="nik_ayah" placeholder="16 Digit Nomor Induk Kependudukan">
                    </div>
                    <div class="form-group-custom">
                        <label for="tahun_lahir_ayah">Tahun Lahir <span class="required">*</span></label>
                        <input type="text" id="tahun_lahir_ayah" name="tahun_lahir_ayah" placeholder="Contoh: 1975">
                    </div>
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="pendidikan_ayah">Pendidikan Terakhir <span class="required">*</span></label>
                        <select id="pendidikan_ayah" name="pendidikan_ayah">
                            <option value="" disabled selected>-- Pilih Pendidikan --</option>
                            <option value="SD">SD / Sederajat</option>
                            <option value="SMP">SMP / Sederajat</option>
                            <option value="SMA">SMA / SMK / Sederajat</option>
                            <option value="D3">Diploma 3 (D3)</option>
                            <option value="S1">Sarjana Terapan / Strata 1 (D4/S1)</option>
                            <option value="S2">Magister (S2)</option>
                            <option value="S3">Doktor (S3)</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                        </select>
                    </div>
                    <div class="form-group-custom">
                        <label for="pekerjaan_ayah">Pekerjaan Utama <span class="required">*</span></label>
                        <select id="pekerjaan_ayah" name="pekerjaan_ayah">
                            <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                            <option value="PNS">PNS / ASN</option>
                            <option value="TNI/POLRI">TNI / POLRI</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Wiraswasta">Wiraswasta / Pedagang</option>
                            <option value="Petani/Nelayan">Petani / Nelayan</option>
                            <option value="Buruh">Buruh Harian Lepas</option>
                            <option value="Pensiunan">Pensiunan</option>
                            <option value="Tidak Bekerja">Tidak Bekerja / Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="form-group-custom">
                    <label for="penghasilan_ayah">Penghasilan Bulanan Rata-Rata <span class="required">*</span></label>
                    <select id="penghasilan_ayah" name="penghasilan_ayah">
                        <option value="" disabled selected>-- Pilih Rentang Penghasilan --</option>
                        <option value="Kurang dari 1 Juta">Kurang dari Rp 1.000.000</option>
                        <option value="1 Juta - 2 Juta">Rp 1.000.000 - Rp 2.000.000</option>
                        <option value="2 Juta - 5 Juta">Rp 2.000.000 - Rp 5.000.000</option>
                        <option value="5 Juta - 10 Juta">Rp 5.000.000 - Rp 10.000.000</option>
                        <option value="Lebih dari 10 Juta">Lebih dari Rp 10.000.000</option>
                        <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                    </select>
                </div>

                <div class="form-sub-section-title" style="margin-top: 35px;">
                    <i class="fa-solid fa-user-nurse"></i> Data Ibu Kandung
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="nama_ibu">Nama Lengkap Ibu <span class="required">*</span></label>
                        <input type="text" id="nama_ibu" name="nama_ibu" placeholder="Nama Lengkap Ibu Sesuai KK">
                    </div>
                    <div class="form-group-custom">
                        <label for="status_ibu">Status Ibu <span class="required">*</span></label>
                        <select id="status_ibu" name="status_ibu">
                            <option value="Masih Hidup">Masih Hidup</option>
                            <option value="Sudah Meninggal">Sudah Meninggal / Wafat</option>
                        </select>
                    </div>
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="nik_ibu">NIK Ibu <span class="required">*</span></label>
                        <input type="text" id="nik_ibu" name="nik_ibu" placeholder="16 Digit Nomor Induk Kependudukan">
                    </div>
                    <div class="form-group-custom">
                        <label for="tahun_lahir_ibu">Tahun Lahir <span class="required">*</span></label>
                        <input type="text" id="tahun_lahir_ibu" name="tahun_lahir_ibu" placeholder="Contoh: 1978">
                    </div>
                </div>

                <div class="form-flex-row">
                    <div class="form-group-custom">
                        <label for="pendidikan_ibu">Pendidikan Terakhir <span class="required">*</span></label>
                        <select id="pendidikan_ibu" name="pendidikan_ibu">
                            <option value="" disabled selected>-- Pilih Pendidikan --</option>
                            <option value="SD">SD / Sederajat</option>
                            <option value="SMP">SMP / Sederajat</option>
                            <option value="SMA">SMA / SMK / Sederajat</option>
                            <option value="D3">Diploma 3 (D3)</option>
                            <option value="S1">Sarjana Terapan / Strata 1 (D4/S1)</option>
                            <option value="S2">Magister (S2)</option>
                            <option value="S3">Doktor (S3)</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                        </select>
                    </div>
                    <div class="form-group-custom">
                        <label for="pekerjaan_ibu">Pekerjaan Utama <span class="required">*</span></label>
                        <select id="pekerjaan_ibu" name="pekerjaan_ibu">
                            <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga (IRT)</option>
                            <option value="PNS">PNS / ASN</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Wiraswasta">Wiraswasta / Pedagang</option>
                            <option value="Petani/Nelayan">Petani / Nelayan</option>
                            <option value="Buruh">Buruh Harian Lepas</option>
                            <option value="Tidak Bekerja">Tidak Bekerja / Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="form-group-custom">
                    <label for="penghasilan_ibu">Penghasilan Bulanan Rata-Rata <span class="required">*</span></label>
                    <select id="penghasilan_ibu" name="penghasilan_ibu">
                        <option value="" disabled selected>-- Pilih Rentang Penghasilan --</option>
                        <option value="Tidak Berpenghasilan">Tidak Berpenghasilan / IRT</option>
                        <option value="Kurang dari 1 Juta">Kurang dari Rp 1.000.000</option>
                        <option value="1 Juta - 2 Juta">Rp 1.000.000 - Rp 2.000.000</option>
                        <option value="2 Juta - 5 Juta">Rp 2.000.000 - Rp 5.000.000</option>
                        <option value="5 Juta - 10 Juta">Rp 5.000.000 - Rp 10.000.000</option>
                        <option value="Lebih dari 10 Juta">Lebih dari Rp 10.000.000</option>
                    </select>
                </div>

                <div class="form-sub-section-title" style="margin-top: 35px;">
                    <i class="fa-solid fa-address-book"></i> Kontak Orang Tua/Wali
                </div>

                <div class="form-group-custom">
                    <label for="hp_ortu">Nomor HP / WhatsApp Orang Tua (Aktif) <span class="required">*</span></label>
                    <input type="text" id="hp_ortu" name="hp_ortu" placeholder="Contoh: 081234567890">
                </div>

                <div class="btn-action-container" style="gap: 12px;">
                    <button type="button" class="btn-submit-green btn-gray" onclick="switchStep(1)">Kembali</button>
                    <button type="button" class="btn-submit-green" onclick="switchStep(3)">Selanjutnya</button>
                </div>
            </div>

            <!-- STEP 4: UPLOAD BERKAS -->
            <div class="form-step-content" id="step-3" style="display: none;">
                <div class="form-group-custom">
                    <label for="pas_foto">Pas Foto 3x4 (Latar Biru, Maks 2MB) <span class="required">*</span></label>
                    <div class="upload-input-container">
                        <input type="file" id="pas_foto" name="pas_foto" accept="image/*" onchange="handleFileStatus(this)" required>
                        <span class="upload-status-badge"><i class="fa-solid fa-arrow-up-from-bracket"></i> Belum Ada</span>
                    </div>
                </div>

                <div class="form-group-custom">
                    <label for="berkas_kk">Foto / Scan Kartu Keluarga (PDF/JPG, Maks 2MB) <span class="required">*</span></label>
                    <div class="upload-input-container">
                        <input type="file" id="berkas_kk" name="berkas_kk" accept="image/*, application/pdf" onchange="handleFileStatus(this)" required>
                        <span class="upload-status-badge"><i class="fa-solid fa-arrow-up-from-bracket"></i> Belum Ada</span>
                    </div>
                </div>

                <div class="form-group-custom">
                    <label for="berkas_ijazah">Foto / Scan Ijazah atau SKL (PDF/JPG, Maks 2MB) <span class="required">*</span></label>
                    <div class="upload-input-container">
                        <input type="file" id="berkas_ijazah" name="berkas_ijazah" accept="image/*, application/pdf" onchange="handleFileStatus(this)" required>
                        <span class="upload-status-badge"><i class="fa-solid fa-arrow-up-from-bracket"></i> Belum Ada</span>
                    </div>
                </div>

                <div class="form-group-custom">
                    <label for="berkas_akta">Foto / Scan Akta Kelahiran (PDF/JPG, Maks 2MB) <span class="required">*</span></label>
                    <div class="upload-input-container">
                        <input type="file" id="berkas_akta" name="berkas_akta" accept="image/*, application/pdf" onchange="handleFileStatus(this)" required>
                        <span class="upload-status-badge"><i class="fa-solid fa-arrow-up-from-bracket"></i> Belum Ada</span>
                    </div>
                </div>

                <div class="btn-action-container" style="gap: 12px;">
                    <button type="button" class="btn-submit-green btn-gray" onclick="switchStep(2)">Kembali</button>
                    <button type="submit" class="btn-submit-green">Kirim Pendaftaran</button>
                </div>
            </div>
        </form>

        <!-- SIDEBAR PETUNJUK -->
        <div class="instruction-panel">
            <h4>Petunjuk Pengisian</h4>
            <div id="instruction-text">
                <ul>
                    <li>Isi data diri sesuai dokumen resmi (KK / Akta).</li>
                    <li>Pastikan data NIK dan NISN siswa valid dan benar.</li>
                    <li>Gunakan email dan nomor WhatsApp aktif Anda sendiri.</li>
                    <li>Gunakan alamat rumah tinggal saat ini secara rinci.</li>
                </ul>
            </div>
        </div>

    </div> 
</div> 