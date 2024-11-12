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

                                            <label for="kategori">Pilih Kategori:</label>
                                            <select name="produkType" id="produkType">
                                                <option value="">Pilih Kategori</option>
                                                    @foreach($kategori as $kat)
                                                <option value="{{ $kat }}">{{ $kat }}</option>
                                                    @endforeach
                                            </select>
                                        <button type="submit" class="btn btn-primary mt-3">Simpan Produk</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Silabus Program</h4>
                            <div id="silabus-container">
                                <h3>Silabus</h3>
                                <button type="button" class="btn btn-secondary mb-3" onclick="addSilabus()">Tambah Silabus</button>
                            </div>
                        </div>
                    </div>
                </div>
</section>
</main>
</x-adminlayout>
