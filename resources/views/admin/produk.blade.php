<x-adminlayout>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Produk</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Produk Manajement</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
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
                <div class="form-group">
                    <label for="nama_produk">Nama Produk:</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Singkat Produk:</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="durasi">Durasi Produk:</label>
                    <textarea name="durasi" id="durasi" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="personil">Personil :</label>
                    <textarea name="personil" id="personil" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="persyaratan">Persyaratan Produk:</label>
                    <textarea name="persyaratan" id="persyaratan" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="metodologi">Metodologi :</label>
                    <textarea name="metodologi" id="metodologi" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="sasaran">Sasaran Produk:</label>
                    <textarea name="sasaran" id="sasaran" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="jadwal_lokasi_fasilitas">Jadwal, Lokasi, Fasilitas :</label>
                    <textarea name="jadwal_lokasi_fasilitas" id="jadwal_lokasi_fasilitas" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="desc_harga">Deskripsi Harga Produk :</label>
                    <textarea name="desc_harga" id="desc_harga" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="hl_harga">Highlight Harga Produk :</label>
                    <textarea name="hl_harga" id="hl_harga" class="form-control" required></textarea>
                </div>
                <div id="silabus-container">
                    <h3>Silabus</h3>
                    <button type="button" class="btn btn-secondary mb-3" onclick="addSilabus()">Tambah Silabus</button>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan Produk</button>
                </div>

                <select class="form-control" name="produkType">
                    <option value="">Pilihan Bidang</option>
                    @foreach ($kat as $k)
                        <option value="{{$k->id}}">{{$k->kategori}}</option>
                    @endforeach
                </select>

                </form>
        </div>
    </section>
</main>
</x-adminlayout>
