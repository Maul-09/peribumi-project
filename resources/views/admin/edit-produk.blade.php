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
                                    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="nama_produk">Nama Produk:</label>
                                            <input type="text" name="nama_produk" id="nama_produk"
                                                class="form-control" required value="{{ $produk->nama_produk }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="teknis">Teknis:</label>
                                            <input type="text" name="teknis" id="teknis" class="form-control"
                                                required value="{{ $produk->teknis }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi Singkat:</label>
                                            <input type="text-area" name="deskripsi" id="deskripsi" class="form-control"
                                                required value="{{ $produk->deskripsi }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="durasi">Durasi:</label>
                                            <input name="durasi" id="durasi" class="form-control" required
                                                value="{{ $produk->durasi }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="personil">Personil:</label>
                                            <input name="personil" id="personil" class="form-control" required
                                                value="{{ $produk->personil }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="persyaratan">Persyaratan:</label>
                                            <textarea name="persyaratan" id="persyaratan" class="form-control" required>{{ $produk->persyaratan }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="metodologi">Metodologi:</label>
                                            <input name="metodologi" id="metodologi" class="form-control" required
                                                value="{{ $produk->metodologi }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="sasaran">Sasaran:</label>
                                            <textarea name="sasaran" id="sasaran" class="form-control" required>{{ $produk->sasaran }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="jadwal_lokasi_fasilitas">Jadwal, Lokasi, Fasilitas:</label>
                                            <textarea name="jadwal_lokasi_fasilitas" id="jadwal_lokasi_fasilitas" class="form-control" required>{{ $produk->jadwal_lokasi_fasilitas }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="desc_harga">Highlight:</label>
                                            <textarea name="desc_harga" id="desc_harga" class="form-control" required>{{ $produk->desc_harga }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="hl_harga">Harga:</label>
                                            <input name="hl_harga" id="hl_harga" class="form-control" required
                                                value="{{ $produk->hl_harga }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Pilihan Kategori:</label>
                                            <select name="produkType" id="produkType" class="select-control">
                                                <option value="">Pilihan Kategori</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat }}"
                                                        {{ $kat == $produk->produkType ? 'selected' : '' }}>
                                                        {{ $kat }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="link">Masukkan Link:</label>
                                            <div class="input-group">
                                                <input type="url" name="link" id="link"
                                                    class="form-control link-input" placeholder="https://contoh.com"
                                                    required value="{{ $produk->link }}">
                                                <button type="button" class="btn btn-small btn-preview"
                                                    onclick="previewLink()">Preview</button>
                                            </div>
                                        </div>
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
                                <button type="button" class="btn btn-secondary mb-3" onclick="addSilabus()">Tambah
                                    Silabus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript">
        var existingSilabus = @json($silabus);
    </script>
</x-adminlayout>
