<x-adminlayout>
    <main id="main" class="main">
        <div class="pagetitle">
            <div class="d-flex align-items-center justify-content-between pe-3">
                <h1>Management Business</h1>
                <a href="{{ route('produk.create') }}" class="btn btn-primary"><i class="bi bi-plus me-1"></i> Tambah
                    Data</a>
            </div>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item">Management Product</li>
                    <li class="breadcrumb-item active">Management Business</li>
                </ol>
            </nav>
        </div>

        @foreach ($produkGrouped as $type => $produkList)
            <h2>{{ $type }}</h2>

            @if ($produkList->isEmpty())
                <p>Tidak ada produk dalam kategori ini.</p>
            @else
                <div class="product-container">
                    @foreach ($produkList as $item)
                        <div class="product-card">
                            <a href="{{ route('produk.show', $item->id) }}">
                                <img src="{{ asset($item->image) }}" alt="image">
                                <h3 class="product-name">{{ $item->nama_produk }}</h3>
                                <p class="product-description">{{ $item->deskripsi }}</p>
                                <p class="product-price">Harga: {{ $item->hl_harga }}</p>
                            </a>
                            <form action="{{ route('produk.destroy', $item->id) }}" method="POST" onsubmit="return false;">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('produk.edit', $item->id) }}" class="btn-edit">Edit</a>
                                <button type="button" class="btn-hapus" onclick="showPopup(this.form)">Hapus</button>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div id="delete-popup" class="popup-overlay">
                    <div class="popup-content">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                        <div class="popup-buttons">
                            <button id="confirm-delete" class="btn-confirm">Ya, Hapus</button>
                            <button id="cancel-delete" class="btn-cancel">Batal</button>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </main>
</x-adminlayout>
