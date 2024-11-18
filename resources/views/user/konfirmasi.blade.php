@section('content')
    <div class="container">
        <h2>Konfirmasi Pembelian</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                <p class="card-text">{{ $produk->deskripsi }}</p>
                <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->nama_produk }}" class="img-fluid">
                <p><strong>Harga:</strong> {{ $produk->hl_harga }}</p>
                <p><strong>Durasi:</strong> {{ $produk->durasi }} Hari</p>
                <p><strong>Sasaran:</strong> {{ $produk->sasaran }}</p>
                <p><strong>Metodologi:</strong> {{ $produk->metodologi }}</p>
                <p><strong>Persyaratan:</strong> {{ $produk->persyaratan }}</p>

                <form action="{{ route('whatsapp.notice', $produk->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Konfirmasi Pembelian</button>
                    <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
