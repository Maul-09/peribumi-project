<x-layout :ShowNavbar="false" :ShowFooter="false">

    <x-slot:name>Digital Solution</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-digital.css') }}</x-slot>
    <div class="container">

        <div class="produk-item">
            <img src="{{ asset($produk->image) }}" alt="image" style="width: 100%; min-height: 150px;">
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
    <form action="{{ route('review.store') }}" method="POST">
        @csrf
        <input type="hidden" name="booking_id" value="{{ $produk->id }}">
        <div class="rate">
            <input type="radio" id="star5" name="rating" value="5" />
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" name="rating" value="4" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rating" value="3" />
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rating" value="2" />
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rating" value="1" />
            <label for="star1" title="text">1 star</label>
        </div>
        <textarea name="comment" rows="4" placeholder="Comment"></textarea>
        <button type="submit">Submit</button>
    </form>
    <h3>Ulasan dan Rating</h3>
    @if ($produk->reviewRatings->isEmpty())
        <p>Tidak ada ulasan yang tersedia.</p>
    @else
        <ul>
            @foreach ($produk->reviewRatings as $review)
                <li>
                    <strong>{{ $review->user->name ?? 'Tidak diketahui' }}:</strong>
                    <span>{{ str_repeat('⭐', $review->star_rating) }}</span>
                    <p>{{ $review->comments }}</p>
                    <p><em>{{ $review->created_at->format('d-m-Y') }}</em></p>
                </li>
            @endforeach
        </ul>
    @endif
</x-layout>
