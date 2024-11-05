<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Produk</title>
    <!-- Pastikan untuk menyertakan CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <h1>Tambah Produk</h1>
        <form action="{{ route('produk.store') }}" method="POST">
            @csrf
            <!-- Form untuk Produk -->
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Produk:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
            </div>

            <!-- Form untuk Silabus -->
            <div id="silabus-container">
                <h3>Silabus</h3>
                <button type="button" class="btn btn-secondary mb-3" onclick="addSilabus()">Tambah Silabus</button>

                <!-- Tempat untuk menambahkan silabus -->
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan Produk</button>
        </form>
    </div>
</body>
</html>
