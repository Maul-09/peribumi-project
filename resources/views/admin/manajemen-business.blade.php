<x-adminlayout>
    <main id="main" class="main">
        <div class="pagetitle">
            <div class="d-flex align-items-center justify-content-between pe-3">
                <h1>Management Business</h1>
                <a href="{{ route('produk.create') }}" class="btn btn-primary"><i class="bi bi-plus me-1"></i> Tambah Data</a>
            </div>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item">Management Product</li>
                    <li class="breadcrumb-item active">Management Business</li>
                </ol>
            </nav>
        </div>

    @foreach($produkGrouped as $type => $produkList)
        <h2>{{ $type }}</h2>

        @if($produkList->isEmpty())
            <p>Tidak ada produk dalam kategori ini.</p>
        @else
            <ul>
                @foreach($produkList as $item)
                    <li>{{ $item->nama_produk }} - Harga: {{ $item->hl_harga }}</li>
                    <p>{{ $item->deskripsi }}</p>
                @endforeach
            </ul>
        @endif
    @endforeach
    </main>
</x-adminlayout>
