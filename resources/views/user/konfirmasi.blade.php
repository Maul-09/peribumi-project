@section('content')
    <div class="container">
        <h2>Konfirmasi Pembelian</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                <p><strong>Harga:</strong> {{ $produk->hl_harga }}</p>
                <p><strong>Durasi:</strong> {{ $produk->durasi }} Hari</p>


                <h3>Konfirmasi Pembelian</h3>
                <p>Klik tombol di bawah ini untuk melanjutkan ke WhatsApp dan mengonfirmasi pembelian Anda:</p>

                <a href="{{ $whatsappUrl }}" class="btn btn-success" target="_blank">Konfirmasi via WhatsApp</a>
                <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-danger">Batal</a>
            </div>
        </div>
    </div>
