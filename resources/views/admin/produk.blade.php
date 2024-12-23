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
                                    <form action="{{ route('produk.store') }}" method="POST"
                                        enctype="multipart/form-data" id="form-id" class="form-section {{ $formNumber == 1 ? 'active' : '' }}">
                                        @csrf
                                        <input type="hidden" id="silabus-data" name="silabus_data">
                                        <input type="hidden" name="form_identifier" value="form1">
                                        <div class="form-group">
                                            <label for="image" class="form-label">Upload Gambar Produk:</label>
                                            <input type="file" name="image" id="image" class="form-control"
                                                accept="image/*" value="{{ old('image') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_produk" class="form-label">Nama:</label>
                                            <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk') }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="teknis" class="form-label">Teknis:</label>
                                            <input type="text" name="teknis" id="teknis" class="form-control" value="{{ old('teknis') }}"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi" class="form-label">Deskripsi:</label>
                                            <input name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="durasi" class="form-label">Durasi:</label>
                                            <div style="display: flex; align-items: center;">
                                                <input type="number" name="durasi" id="durasi" value="{{ old('durasi') }}" placeholder="" class="form-control" required><span style="border: 1px solid #ccc; padding: 0.75em 2em; border-radius: 5px; font-family: Arial, sans-serif; font-weight: bold;">Hari</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="personil" class="form-label">Personil:</label>
                                            <input name="personil" id="personil" value="{{ old('personil') }}" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="persyaratan" class="form-label">Persyaratan:</label>
                                            <textarea name="persyaratan" id="persyaratan" class="form-control" required>{{ old('persyaratan') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="metodologi" class="form-label">Metodologi:</label>
                                            <input name="metodologi" id="metodologi" value="{{ old('metodologi') }}" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="sasaran" class="form-label">Sasaran:</label>
                                            <textarea name="sasaran" id="sasaran" class="form-control" required>{{ old('sasaran') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="jadwal_lokasi_fasilitas" class="form-label">Jadwal, Lokasi,
                                                Fasilitas:</label>
                                            <textarea name="jadwal_lokasi_fasilitas" id="jadwal_lokasi_fasilitas" class="form-control" required>{{ old('jadwal_lokasi_fasilitas') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="highlight" class="form-label">Highlight:</label>
                                            <textarea name="highlight" id="highlight" class="form-control" required>{{ old('highlight') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="harga" class="form-label">Harga:</label>
                                            <textarea name="harga" id="harga" class="form-control" required>{{ old('harga') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="produkType" class="form-label">Pilihan Kategori:</label>
                                            <select name="produkType" id="produkType" class="select-control">
                                                <option value="{{ old('produkType') }}">Pilihan Kategori</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat }}">{{ $kat }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="link" class="form-label">Masukkan Link:</label>
                                            <div class="input-group">
                                                <input type="url" name="link" id="link" value="{{ old('link') }}"
                                                    class="form-control link-input" placeholder="https://contoh.com">
                                                <button type="button" class="btn-small"
                                                    onclick="previewLink()">Preview</button>
                                            </div>
                                        </div>

                                        <input type="hidden" name="silabus_data" id="silabus-data">
                                        <button type="submit" class="btn-tambah-product">Simpan Produk</button>
                                    </form>

                                    <form action="{{ route('produk.store') }}" method="POST"
                                        enctype="multipart/form-data" id="form-id" class="form-section {{ $formNumber == 2 ? 'active' : '' }}">
                                        @csrf
                                        <input type="hidden" id="silabus-data" name="silabus_data">
                                        <input type="hidden" name="form_identifier" value="form2">

                                        <div class="form-group">
                                            <label for="image" class="form-label">Upload Gambar Produk:</label>
                                            <input type="file" name="image" id="image" class="form-control"
                                                accept="image/*" value="{{ old('image') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_produk" class="form-label">Nama:</label>
                                            <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk') }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="teknis" class="form-label">Teknis:</label>
                                            <input type="text" name="teknis" id="teknis" class="form-control" value="{{ old('teknis') }}"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi" class="form-label">Deskripsi:</label>
                                            <input name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan:</label>
                                            <textarea type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control"
                                                required>{{ old('jenis_pekerjaan') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="ruang_lingkup" class="form-label">Ruang Lingkup:</label>
                                            <textarea name="ruang_lingkup" id="ruang_lingkup" class="form-control" required>{{ old('ruang_lingkup') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="klasifikasi" class="form-label">Klasifikasi:</label>
                                            <textarea name="klasifikasi" id="klasifikasi" class="form-control" required>{{ old('klasifikasi') }}</textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="durasi" class="form-label">Durasi:</label>
                                            <div style="display: flex; align-items: center;">
                                                <input type="number" name="durasi" id="durasi" placeholder="" value="{{ old('durasi') }}" class="form-control" required><span style="border: 1px solid #ccc; padding: 0.75em 2em; border-radius: 5px; font-family: Arial, sans-serif; font-weight: bold;">Hari</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tahapan" class="form-label">Tahapan:</label>
                                            <textarea name="tahapan" id="tahapan" class="form-control" required>{{ old('tahapan') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="harga" class="form-label">Harga:</label>
                                            <textarea name="harga" id="harga" class="form-control" required>{{ old('harga') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="produkType" class="form-label">Pilihan Kategori:</label>
                                            <select name="produkType" id="produkType" class="select-control">
                                                <option value="{{ old('produkType') }}">Pilihan Kategori</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat }}">{{ $kat }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="link" class="form-label">Masukkan Link:</label>
                                            <div class="input-group">
                                                <input type="url" name="link" id="link" value="{{ old('link') }}"
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
