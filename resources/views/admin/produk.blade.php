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
                    <label for="deskripsi">Deskripsi Produk:</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                </div
            </form>
            <div id="silabus-container">
                <h3>Silabus</h3>
                <button type="button" class="btn btn-secondary mb-3" onclick="addSilabus()">Tambah Silabus</button>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan Produk</button>
            </div>
        </div>
    </section>
</main>
</x-adminlayout>
