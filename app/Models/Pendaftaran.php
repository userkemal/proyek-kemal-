<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nama',
        'nik_siswa',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'telepon_siswa',
        'email_siswa',
        'anak_ke',
        'jumlah_saudara',
        'jurusan_pilihan',
        'alamat',
        'sekolah_asal',
        'status_sekolah',
        'jenis_sekolah',
        'provinsi_sekolah',
        'kota_sekolah',
        'tahun_lulus',
        'no_ijazah',
        'nilai_rapor',
        'nama_ayah',
        'status_ayah',
        'nik_ayah',
        'tahun_lahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'status_ibu',
        'nik_ibu',
        'tahun_lahir_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'hp_ortu',
        'berkas_kk',
        'berkas_ijazah',
        'pas_foto',
        'berkas_akta',
    ];
}