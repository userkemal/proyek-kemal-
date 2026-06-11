<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            
            // Data Siswa
            $table->string('nama');
            $table->string('nik_siswa');
            $table->string('nisn');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('telepon_siswa');
            $table->string('email_siswa');
            $table->integer('anak_ke');
            $table->integer('jumlah_saudara');
            $table->string('jurusan_pilihan');
            $table->text('alamat');
            $table->string('sekolah_asal');
            $table->string('status_sekolah');
            $table->string('jenis_sekolah');
            $table->string('provinsi_sekolah');
            $table->string('kota_sekolah');
            $table->string('tahun_lulus');
            $table->string('no_ijazah');
            $table->string('nilai_rapor');

            // Data Orang Tua
            $table->string('nama_ayah');
            $table->string('status_ayah');
            $table->string('nik_ayah');
            $table->string('tahun_lahir_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');
            $table->string('nama_ibu');
            $table->string('status_ibu');
            $table->string('nik_ibu');
            $table->string('tahun_lahir_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu');
            $table->string('hp_ortu');

            // Berkas
            $table->string('berkas_kk');
            $table->string('berkas_ijazah');
            $table->string('berkas_akta');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};