<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama' => 'required',
            'nik_siswa' => 'required|numeric',
            'nisn' => 'required|numeric',
            'pas_foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'berkas_kk' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'berkas_ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'berkas_akta' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // 2. Proses Upload Berkas
        $berkasKk = time().'_'.$request->file('berkas_kk')->getClientOriginalName();
        $request->file('berkas_kk')->move(public_path('uploads'), $berkasKk);

        $berkasIjazah = time().'_'.$request->file('berkas_ijazah')->getClientOriginalName();
        $request->file('berkas_ijazah')->move(public_path('uploads'), $berkasIjazah);

        $berkasAkta = time().'_'.$request->file('berkas_akta')->getClientOriginalName();
        $request->file('berkas_akta')->move(public_path('uploads'), $berkasAkta);

        $pasFoto = time().'_'.$request->file('pas_foto')->getClientOriginalName();
        $request->file('pas_foto')->move(public_path('uploads/pas_foto'), $pasFoto);

        // 3. Masukkan data formulir ke Database
        $pendaftaran = new Pendaftaran();
        $pendaftaran->user_id = Auth::id(); // Relasi user
        
        // Data Pribadi
        $pendaftaran->nama = $request->nama;
        $pendaftaran->nik_siswa = $request->nik_siswa;
        $pendaftaran->nisn = $request->nisn;
        $pendaftaran->tempat_lahir = $request->tempat_lahir;
        $pendaftaran->tanggal_lahir = $request->tanggal_lahir;
        $pendaftaran->jenis_kelamin = $request->jenis_kelamin;
        $pendaftaran->agama = $request->agama;
        $pendaftaran->telepon_siswa = $request->telepon_siswa;
        $pendaftaran->email_siswa = $request->email_siswa;
        $pendaftaran->anak_ke = $request->anak_ke;
        $pendaftaran->jumlah_saudara = $request->jumlah_saudara;
        $pendaftaran->jurusan_pilihan = $request->jurusan_pilihan;
        $pendaftaran->alamat = $request->alamat;

        // Data Sekolah Asal
        $pendaftaran->sekolah_asal = $request->sekolah_asal;
        $pendaftaran->status_sekolah = $request->status_sekolah;
        $pendaftaran->jenis_sekolah = $request->jenis_sekolah;
        $pendaftaran->provinsi_sekolah = $request->provinsi_sekolah;
        $pendaftaran->kota_sekolah = $request->kota_sekolah;
        $pendaftaran->tahun_lulus = $request->tahun_lulus;
        $pendaftaran->no_ijazah = $request->no_ijazah;
        $pendaftaran->nilai_rapor = $request->nilai_rapor;

        // Data Ayah
        $pendaftaran->nama_ayah = $request->nama_ayah;
        $pendaftaran->status_ayah = $request->status_ayah;
        $pendaftaran->nik_ayah = $request->nik_ayah;
        $pendaftaran->tahun_lahir_ayah = $request->tahun_lahir_ayah;
        $pendaftaran->pendidikan_ayah = $request->pendidikan_ayah;
        $pendaftaran->pekerjaan_ayah = $request->pekerjaan_ayah;
        $pendaftaran->penghasilan_ayah = $request->penghasilan_ayah;

        // Data Ibu
        $pendaftaran->nama_ibu = $request->nama_ibu;
        $pendaftaran->status_ibu = $request->status_ibu;
        $pendaftaran->nik_ibu = $request->nik_ibu;
        $pendaftaran->tahun_lahir_ibu = $request->tahun_lahir_ibu;
        $pendaftaran->pendidikan_ibu = $request->pendidikan_ibu;
        $pendaftaran->pekerjaan_ibu = $request->pekerjaan_ibu;
        $pendaftaran->penghasilan_ibu = $request->penghasilan_ibu;
        $pendaftaran->hp_ortu = $request->hp_ortu;

        // Simpan Nama File ke Database
        $pendaftaran->berkas_kk = $berkasKk;
        $pendaftaran->berkas_ijazah = $berkasIjazah;
        $pendaftaran->berkas_akta = $berkasAkta;
        $pendaftaran->pas_foto = 'uploads/pas_foto/' . $pasFoto; 

        // Simpan
        $pendaftaran->save();

        // 4. Redirect ke Dashboard (Form akan hilang karena query 'pendaftaran' di controller sudah tidak null)
        return redirect()->route('dashboard')->with('success', 'Selamat, pendaftaran Anda telah berhasil disimpan!');
    }
}