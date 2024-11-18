<x-layout :ShowNavbar="false" :ShowFooter="false">

    <x-slot:name>Digital Solution</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-index-product.css') }}</x-slot>
    <div class="full-screen">
        <div class="container">
            <div class="produk-header">
                <h2 class="produk-title">{{ $produk->nama_produk }}</h2>
                <img src="{{ asset($produk->image) }}" alt="Produk Image" class="produk-image">
            </div>

            <div class="produk-details">
                <h3 class="section-title">Detail Produk</h3>
                <div class="detail-item">
                    <span class="detail-label">Deskripsi Produk:</span>
                    <span class="detail-value">{{ $produk->deskripsi }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Durasi:</span>
                    <span class="detail-value">{{ $produk->durasi }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Personil:</span>
                    <span class="detail-value">{{ $produk->personil }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Sasaran:</span>
                    <span class="detail-value">{{ $produk->sasaran }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Persyaratan:</span>
                    <span class="detail-value">{{ $produk->persyaratan }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Metodologi:</span>
                    <span class="detail-value">{{ $produk->metodologi }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Jadwal, Lokasi, dan Fasilitas:</span>
                    <span class="detail-value">{{ $produk->jadwal_lokasi_fasilitas }}</span>
                </div>
            </div>

            <div class="card-harga">
                <img src="#" alt="Produk Image" class="image-card">
                <span class="detail-label">Harga:</span>
                <span class="deskripsi-harga">{{ $produk->desc_harga }} ({{ $produk->hl_harga }})</span>
                <a href="{{ route('konfirmasiview', $produk->id) }}">Beli Produk</a>
            </div>

            <h3 class="section-title">Silabus</h3>
            <div class="silabus-container">
                @foreach ($produk->silabus as $silabus)
                    <div class="silabus-item">
                        <div class="silabus-header" onclick="toggleDropdown(this)">
                            <h4 class="silabus-title">{{ $silabus->judul }}</h4>
                            <span class="silabus-toggle">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                        <div class="silabus-content">
                            <p class="silabus-desc">
                                <span class="detail-label">Deskripsi:</span> {{ $silabus->deskripsi }}
                            </p>
                            <div class="isi-silabus-list">
                                <h5>Isi Silabus:</h5>
                                @foreach ($silabus->isiSilabus as $isi)
                                    <div class="isi-silabus-item">
                                        <p><strong>{{ $isi->judul_isi }}</strong></p>
                                        <p>{{ $isi->konten }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <hr class="garis-bawah">

            <h3 class="section-title">Ulasan dan Rating</h3>
            <form action="{{ route('review.store') }}" method="POST" class="rating-form">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $produk->id }}">

                <div class="rate">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label for="star5" title="5 stars">
                        <i class="fa-regular fa-star"></i>
                    </label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4" title="4 stars">
                        <i class="fa-regular fa-star"></i>
                    </label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3" title="3 stars">
                        <i class="fa-regular fa-star"></i>
                    </label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2" title="2 stars">
                        <i class="fa-regular fa-star"></i>
                    </label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1" title="1 star">
                        <i class="fa-regular fa-star"></i>
                    </label>
                </div>

                <textarea name="comment" rows="4" placeholder="Tulis ulasan Anda" class="comment-box"></textarea>
                <button type="submit" class="submit-btn">Kirim</button>
            </form>
            @if ($produk->reviewRatings->isEmpty())
                <p class="no-reviews">Tidak ada ulasan yang tersedia.</p>
            @else
                <ul class="review-list">
                    @foreach ($produk->reviewRatings as $review)
                        <li class="review-item">
                            <strong>{{ $review->user->name ?? 'Tidak diketahui' }}</strong>:
                            <span class="review-stars">
                                {!! str_repeat('<i class="fa-solid fa-star"></i>', $review->star_rating) !!}
                            </span>
                            <p>{{ $review->comments }}</p>
                            <p><em>{{ $review->created_at->format('d-m-Y') }}</em></p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

</x-layout>
