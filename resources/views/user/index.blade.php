<x-layout :ShowNavbar="false" :ShowFooter="false">
    
    <x-slot:name>Digital Solution</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-digital.css') }}</x-slot>
    <div class="container">
        
            <div class="produk-item">
                <h2>{{ $produk->nama_produk }}</h2>
                <p><strong>Deskripsi Produk:</strong> {{ $produk->deskripsi }}</p>
                <p><strong>Durasi:</strong> {{ $produk->durasi }}</p>
                <p><strong>Personil:</strong> {{ $produk->personil }}</p>
                <p><strong>Sasaran:</strong> {{ $produk->sasaran }}</p>
                <p><strong>Persyaratan:</strong> {{ $produk->persyaratan }}</p>
                <p><strong>Metodologi:</strong> {{ $produk->metodologi }}</p>
                <p><strong>Jadwal, Lokasi, dan Fasilitas:</strong> {{ $produk->jadwal_lokasi_fasilitas }}</p>
                <p><strong>Harga:</strong> {{ $produk->desc_harga }} ({{ $produk->hl_harga }})</p>

                <h3>Silabus:</h3>
                @foreach ($produk->silabus as $silabus)
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
    </div>

</x-layout>