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
    
    <script>
    let silabusCount = 0;
    
    function addSilabus() {
        silabusCount++;
        let silabusContainer = document.getElementById("silabus-container");
        
        let silabusHTML = `
            <div class="silabus mt-3" id="silabus-${silabusCount}">
                <h4>Silabus ${silabusCount}</h4>
                <div class="form-group">
                    <label for="judul_silabus_${silabusCount}">Judul Silabus:</label>
                    <input type="text" name="silabus[${silabusCount}][judul]" id="judul_silabus_${silabusCount}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="deskripsi_silabus_${silabusCount}">Deskripsi Silabus:</label>
                    <textarea name="silabus[${silabusCount}][deskripsi]" id="deskripsi_silabus_${silabusCount}" class="form-control" required></textarea>
                </div>
    
                <!-- Bagian Isi Silabus -->
                <div class="isi-silabus-container" id="isi-silabus-container-${silabusCount}">
                    <button type="button" class="btn btn-secondary" onclick="addIsiSilabus(${silabusCount})">Tambah Isi Silabus</button>
                </div>
            </div>
        `;
    
        silabusContainer.insertAdjacentHTML("beforeend", silabusHTML);
    }
    
    function addIsiSilabus(silabusIndex) {
        let isiContainer = document.getElementById(`isi-silabus-container-${silabusIndex}`);
        let isiCount = isiContainer.querySelectorAll(".isi-silabus").length + 1;
    
        let isiHTML = `
            <div class="isi-silabus mt-2">
                <div class="form-group">
                    <label for="judul_isi_${silabusIndex}_${isiCount}">Judul Isi Silabus:</label>
                    <input type="text" name="silabus[${silabusIndex}][isi_silabus][${isiCount}][judul_isi]" id="judul_isi_${silabusIndex}_${isiCount}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="konten_${silabusIndex}_${isiCount}">Konten:</label>
                    <textarea name="silabus[${silabusIndex}][isi_silabus][${isiCount}][konten]" id="konten_${silabusIndex}_${isiCount}" class="form-control" required></textarea>
                </div>
            </div>
        `;
    
        isiContainer.insertAdjacentHTML("beforeend", isiHTML);
    }
    </script>
</body>
</html>