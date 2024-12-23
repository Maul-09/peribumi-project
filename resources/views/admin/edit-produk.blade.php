<x-adminlayout>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Produk</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Produk Manajemen</li>
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
                                    <form action="{{ route('produk.update', $produk->id) }}" method="POST"
                                        enctype="multipart/form-data" id="form-id" class="form-section {{ $formNumber == 1 ? 'active' : '' }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="silabus-data" name="silabus_data">
                                        <input type="hidden" name="form_identifier" value="form1">
                                        <div class="form-group">
                                            <label for="image" class="form-label">Upload Gambar Produk:</label>
                                            <input type="file" name="image" id="image" class="form-control"
                                                accept="image/*" value="{{ $produk->image }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_produk" class="form-label">Nama:</label>
                                            <input type="text" name="nama_produk" id="nama_produk"
                                                class="form-control" required  value="{{ $produk->nama_produk }}"></input>
                                        </div>

                                        <div class="form-group">
                                            <label for="teknis" class="form-label">Teknis:</label>
                                            <input type="text" name="teknis" id="teknis" class="form-control"
                                                required value="{{ $produk->teknis }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi" class="form-label">Deskripsi Singkat:</label>
                                            <input name="deskripsi" id="deskripsi" class="form-control" required value="{{ $produk->deskripsi }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="durasi" class="form-label">Durasi:</label>
                                            <input name="durasi" id="durasi" class="form-control" required value="{{ $produk->durasi }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="personil" class="form-label">Personil:</label>
                                            <input name="personil" id="personil" class="form-control" required value="{{ $produk->personil }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="persyaratan" class="form-label">Persyaratan:</label>
                                            <textarea name="persyaratan" id="persyaratan" class="form-control" required>{{ $produk->persyaratan }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="metodologi" class="form-label">Metodologi:</label>
                                            <input name="metodologi" id="metodologi" class="form-control" required value="{{ $produk->metodologi }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="sasaran" class="form-label">Sasaran:</label>
                                            <textarea name="sasaran" id="sasaran" class="form-control" required>{{ $produk->sasaran }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="jadwal_lokasi_fasilitas" class="form-label">Jadwal, Lokasi,
                                                Fasilitas:</label>
                                            <textarea name="jadwal_lokasi_fasilitas" id="jadwal_lokasi_fasilitas" class="form-control" required>{{ $produk->jadwal_lokasi_fasilitas }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="highlight" class="form-label">Highlight:</label>
                                            <textarea name="highlight" id="highlight" class="form-control" required>{{ $produk->highlight }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="harga" class="form-label">Harga:</label>
                                            <textarea name="harga" id="harga" class="form-control" required>{{ $produk->harga }}</textarea>
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
                                            <label for="link" class="form-label">Masukkan Link:</label>
                                            <div class="input-group">
                                                <input type="url" name="link" id="link" value="{{ $produk->link }}"
                                                    class="form-control link-input" placeholder="https://contoh.com" >
                                                <button type="button" class="btn-small"
                                                    onclick="previewLink()">Preview</button>
                                            </div>
                                        </div>

                                        <input type="hidden" name="silabus_data" id="silabus-data">
                                        <button type="submit" class="btn-tambah-product">Simpan Produk</button>
                                    </form>

                                    <form action="{{ route('produk.update', $produk->id) }}" method="POST"
                                        enctype="multipart/form-data" id="form-id" class="form-section {{ $formNumber == 2 ? 'active' : '' }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="silabus-data" name="silabus_data">
                                        <input type="hidden" name="form_identifier" value="form2">

                                        <div class="form-group">
                                            <label for="image" class="form-label">Upload Gambar Produk:</label>
                                            <input type="file" name="image" id="image" class="form-control"
                                                accept="image/*" value="{{ $produk->image }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_produk" class="form-label">Nama:</label>
                                            <input type="text" name="nama_produk" id="nama_produk"
                                                class="form-control" required value="{{ $produk->nama_produk }}"></input>
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan:</label>
                                            <textarea type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control"
                                                required>{{ $produk->jenis_pekerjaan }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="kualifikasi" class="form-label">Kualifikasi:</label>
                                            <textarea name="kualifikasi" id="kualifikasi" class="form-control" required>{{ $produk->kualifikasi }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="ruang_lingkup" class="form-label">Ruang Lingkup:</label>
                                            <textarea name="ruang_lingkup" id="ruang_lingkup" class="form-control" required>{{ $produk->ruang_lingkup }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="klasifikasi" class="form-label">Klasifikasi:</label>
                                            <textarea name="klasifikasi" id="klasifikasi" class="form-control" required>{{ $produk->klasifikasi }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="durasi" class="form-label">durasi:</label>
                                            <textarea name="durasi" id="durasi" class="form-control" required>{{ $produk->durasi }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="lembaga" class="form-label">Lembaga:</label>
                                            <textarea name="lembaga" id="lembaga" class="form-control" required>{{ $produk->lembaga }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="kategori" class="form-label">Kategori:</label>
                                            <textarea name="kategori" id="kategori" class="form-control" required>{{ $produk->kategori }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="highlight" class="form-label">Highlight:</label>
                                            <textarea name="highlight" id="highlight" class="form-control" required>{{ $produk->highlight }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="harga" class="form-label">Harga:</label>
                                            <textarea name="harga" id="harga" class="form-control" required>{{ $produk->harga }}</textarea>
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
                                            <label for="link" class="form-label">Masukkan Link:</label>
                                            <div class="input-group">
                                                <input type="url" name="link" id="link" value="{{ $produk->link }}"
                                                    class="form-control link-input" placeholder="https://contoh.com">
                                                <button type="button" class="btn-small"
                                                    onclick="previewLink()">Preview</button>
                                            </div>
                                        </div>

                                        <input type="hidden" name="silabus_data" id="silabus-data">
                                        <button type="submit" class="btn-tambah-product">Simpan Produk</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Silabus Program</h5>
                            <div class="activity">
                                <div id="silabus-container" class="card-scroll">
                                    <h3>Silabus</h3>
                                    <button type="button" class="btn-tambah-silabus" onclick="addSilabus()">Tambah
                                        Silabus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
        </section>
    </main>
</x-adminlayout>
