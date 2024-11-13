<x-layout>
    <div class="container">
        <h1>Daftar Produk</h1>
        
        @foreach ($produk as $item)
            <div class="produk-item">
                <h2>{{ $item->nama_produk }}</h2>
                <p><strong>Deskripsi Produk:</strong> {{ $item->deskripsi }}</p>
                <p><strong>Durasi:</strong> {{ $item->durasi }}</p>
                <p><strong>Personil:</strong> {{ $item->personil }}</p>
                <p><strong>Sasaran:</strong> {{ $item->sasaran }}</p>
                <p><strong>Persyaratan:</strong> {{ $item->persyaratan }}</p>
                <p><strong>Metodologi:</strong> {{ $item->metodologi }}</p>
                <p><strong>Jadwal, Lokasi, dan Fasilitas:</strong> {{ $item->jadwal_lokasi_fasilitas }}</p>
                <p><strong>Harga:</strong> {{ $item->desc_harga }} ({{ $item->hl_harga }})</p>

                <h3>Silabus:</h3>
                @foreach ($item->silabus as $silabus)
                    <div class="silabus-item">
                        <h4>{{ $silabus->judul }}</h4>
                        <p><strong>Deskripsi Silabus:</strong> {{ $silabus->deskripsi }}</p>

                        <h5>Isi Silabus:</h5>
                        @foreach ($silabus->isiSilabus as $isi)
                            <div class="isi-silabus">
                                <h6>{{ $isi->judul_isi }}</h6>
                                <p>{{ $isi->konten }}</p>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

</x-layout>