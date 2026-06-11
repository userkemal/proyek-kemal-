<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil - SPMB SMKN 5 Telkom Banda Aceh</title>
    <style>
        body { font-family: sans-serif; background: #f3f4f6; padding: 50px; }
        .edit-container { width: 400px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { color: #1d3f91; margin-bottom: 20px; }
        label { display: block; margin-top: 15px; font-weight: 600; }
        input { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; }
        button { width: 100%; padding: 12px; background: #1d3f91; color: white; border: none; border-radius: 5px; margin-top: 20px; cursor: pointer; }
        .btn-back { display: block; text-align: center; margin-top: 10px; color: #666; text-decoration: none; }
    </style>
</head>
<body>

<div class="edit-container">
    <h2>Edit Profil</h2>
    
    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label>Nama Lengkap:</label>
        <input type="text" name="name" value="{{ Auth::user()->name }}" required>

        <label>Ganti Foto Profil:</label>
        <input type="file" name="foto" accept="image/*">

        <button type="submit">Simpan Perubahan</button>
    </form>

    <a href="{{ route('profil') }}" class="btn-back">Kembali ke Profil</a>
</div>

</body>
</html>