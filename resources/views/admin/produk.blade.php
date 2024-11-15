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
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tambah Produk</h4>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('produk.store') }}" method="POST" <form
                                        action="{{ route('produk.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="image" class="form-label">Upload Gambar Produk:</label>
                                            <input type="file" name="image" id="image" class="form-control"
                                                accept="image/*">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_produk" class="form-label">Nama Produk:</label>
                                            <input type="text" name="nama_produk" id="nama_produk"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi" class="form-label">Deskripsi Singkat Produk:</label>
                                            <input name="deskripsi" id="deskripsi" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="durasi" class="form-label">Durasi Produk:</label>
                                            <input name="durasi" id="durasi" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="personil" class="form-label">Personil :</label>
                                            <input name="personil" id="personil" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="persyaratan" class="form-label">Persyaratan Produk:</label>
                                            <input name="persyaratan" id="persyaratan" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="metodologi" class="form-label">Metodologi :</label>
                                            <input name="metodologi" id="metodologi" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="sasaran" class="form-label">Sasaran Produk:</label>
                                            <input name="sasaran" id="sasaran" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="jadwal_lokasi_fasilitas" class="form-label">Jadwal, Lokasi,
                                                Fasilitas :</label>
                                            <input name="jadwal_lokasi_fasilitas" id="jadwal_lokasi_fasilitas"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="desc_harga" class="form-label">Deskripsi Harga Produk :</label>
                                            <input name="desc_harga" id="desc_harga" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="hl_harga" class="form-label">Highlight Harga Produk :</label>
                                            <input name="hl_harga" id="hl_harga" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="produkType" class="form-label">Pilih Kategori:</label>
                                            <select name="produkType" id="produkType" class="select-control">
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat }}">{{ $kat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="card-prod">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Silabus Program</h4>
                                                    <div id="silabus-container" class="card-scroll">
                                                        <h3>Silabus</h3>
                                                        <button type="button" class="btn-tambah-silabus"
                                                            onclick="addSilabus()">Tambah Silabus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn-tambah-product">Simpan Produk</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        </section>
    </main>
</x-adminlayout>
