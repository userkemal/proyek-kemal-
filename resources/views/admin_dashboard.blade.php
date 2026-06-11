@extends('layouts.app')

@section('content')
<div class="container">
    <h1>BERHASIL! Halaman ini sudah muncul.</h1>
    <p>Jika Anda melihat tulisan ini, berarti masalah rute dan controller sudah beres.</p>

    <h2>Dashboard Admin</h2>
    <hr>
    <div class="alert alert-success">
        Selamat datang, Admin! Anda berhasil mengakses halaman ini.
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-info text-white p-3">
                <h5>Total Pendaftar</h5>
                <h3>{{ $total_pendaftar ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white p-3">
                <h5>Disetujui</h5>
                <h3>{{ $status_disetujui ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-dark p-3">
                <h5>Menunggu Verifikasi</h5>
                <h3>{{ $status_menunggu ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendaftarans as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->jurusan_pilihan }}</td>
                <td>
                    <span class="badge {{ $p->status == 'Disetujui' ? 'bg-success' : 'bg-warning' }}">
                        {{ $p->status }}
                    </span>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Detail</a>
                </td>
            </tr> 
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data pendaftar.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
