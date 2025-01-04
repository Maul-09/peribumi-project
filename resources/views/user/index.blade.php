<x-layout :ShowNavbar="false" :ShowFooter="false">

    <x-slot:name>Digital Solution</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-index-product.css') }}</x-slot>
    <div class="full-screen">
        <div class="container">
            <div class="produk-header">
                <h2 class="produk-title">{{ $produk->nama_produk }}</h2>
                <img src="{{ asset($produk->image) }}" alt="Produk Image" class="produk-image">
            </div>

            <h3 class="section-title">Detail Produk</h3>
            <div class="produk-details">
                @foreach ($product as $key => $value)
                    @if (in_array($key, $specialKeys) && !empty($value))
                        <div class="detail-item">
                            <span class="detail-label">{{ ucwords(str_replace('_', ' ', $key)) }}:</span>
                            @foreach (explode("\n", $value) as $line)
                                <span class="detail-value">{{ $line }}</span>
                            @endforeach
                        </div>
                    @elseif (!is_array($value) && !in_array($key, $specialKeys))
                        <div class="detail-item">
                            <span class="detail-label">{{ ucwords(str_replace('_', ' ', $key)) }}:</span>
                            <span class="detail-value">{{ $value }}</span>
                        </div>
                    @endif
                @endforeach

                @if($produk->durasi)
                    <div class="detail-item">
                        <span class="detail-label">Durasi:</span>
                        <span class="detail-value">{{ $produk->durasi }} Hari</span>
                    </div>
                @endif
            </div>
            <div class="detail-item">
                <span class="detail-label">Proposal:</span>
                @if ($produk->link)
                    <a href="{{ $produk->link }}" class="btn-detail" target="_blank">Unduh Sekarang</a>
                @else
                    <span class="no-link">Tidak ada link tersedia</span>
                @endif
            </div>

            {{-- <h3 class="section-title">Silabus</h3>
            <div class="silabus-container">
                @foreach ($produk->silabus as $silabus)
                    <div class="silabus-item">
                        <div class="silabus-header" onclick="Dropdown(this)">
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
            </div> --}}
            <hr class="garis-bawah">
            <h3 class="section-title">Ulasan dan Rating</h3>
            @if ($userProduk && $userProduk->pivot->status_transaksi === 'confirmed')
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
            @endif
            @if ($produk->reviewRatings->isEmpty())
                <p class="no-reviews">Tidak ada ulasan yang tersedia.</p>
            @else
                <ul class="review-list">
                    @foreach ($produk->reviewRatings as $review)
                        <li class="review-item">
                            @php
                                $emote = '';
                                switch ($review->star_rating) {
                                    case 5:
                                        $emote = '🥳';
                                        break;
                                    case 4:
                                        $emote = '😄';
                                        break;
                                    case 3:
                                        $emote = '🤔';
                                        break;
                                    case 2:
                                        $emote = '😞';
                                        break;
                                    case 1:
                                        $emote = '🤬';
                                        break;
                                    default:
                                        $emote = '❓';
                                        break;
                                }
                            @endphp
                            <strong>{!! $emote !!} {{ $review->user->name ?? 'Tidak diketahui' }}</strong>
                            <br>
                            <span class="review-stars">
                                {!! str_repeat('<i class="fa-solid fa-star text-warning"></i>', $review->star_rating) !!}
                            </span>
                            <p>{{ $review->comments }}</p>
                            <p><em>{{ $review->created_at->format('d-m-Y') }}</em></p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="card-harga">
            <img src="{{ asset($produk->image) }}" alt="Produk Image" class="image-card">
            <div class="content">
                <span class="detail-label" id="label-harga">Harga:</span>
                <span class="deskripsi-harga">{{ $produk->harga }}</span>
                @if($produk->durasi)
                    <span class="detail-label" id="label-harga">Durasi:</span>
                    <span class="deskripsi-harga">{{ $produk->durasi }} Hari</span>
                @endif
                <a href="#" class="btn-beli" id="openModal" data-produk-nama="{{ $produk->nama_produk }}"
                    data-produk-harga="{{ $produk->harga }}"
                    data-whatsapp-url="{{ route('whatsapp.blank', $produk->id) }}">Beli
                    Produk</a>
            </div>
        </div>
    </div>
    <div id="konfirmasiModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal"><i class="fas fa-close"></i></span>
            <h5 id="modalProdukNama"></h5>
            <p><strong>Harga:</strong> <span id="modalHarga"></span></p>
            @if($produk->durasi)
                <p><strong>Durasi:</strong> <span id="modalDurasi">{{ $produk->durasi }}</span> Hari</p>
            @endif

            <h3>Konfirmasi Pembelian</h3>
            <p>Klik tombol di bawah ini untuk melanjutkan ke WhatsApp dan mengonfirmasi pembelian Anda:</p>
            <form id="konfirmasiModalForm" action="{{ route('whatsapp.notice', $produk->id) }}" method="POST"
                style="display: none;">
                @csrf
                @method('post')
            </form>

            @if($produk->durasi)
                <label for="tanggalMulai">Tanggal Mulai:</label>
                <input type="date" id="tanggalMulai" name="tanggal_mulai" required />
            @endif

            <button id="whatsappLink" class="btn btn-success" target="_blank">Konfirmasi via WhatsApp</button>
            <a href="#" class="btn btn-danger" id="closeModalBtn">Batal</a>
        </div>
    </div>

</x-layout>
