<x-layout>
    <x-slot:name>Management Business</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-manajemen.css') }}</x-slot>
    <section class="banner" id="home">
        <div class="textBx">
            <h2>MANAGEMENT BUSINESS</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint voluptate consequatur alias
                recusandae
                explicabo temporibus, ad dolorum nisi, voluptatum ab non minima totam iure repellat sapiente nulla
                repellendus
                suscipit?</p>
        </div>
    </section>

    <section class="product-manajemen">
        <div>
            <div class="title-produk">
                <h3>Produk Kami</h3>
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
                                <!-- Tampilkan Rata-rata Rating -->
                                    <p class="rating">
                                        @if ($item->averageRating > 0)
                                            @php
                                                $fullStars = floor($item->averageRating); // Jumlah bintang penuh
                                                $halfStar = $item->averageRating - $fullStars >= 0.5 ? 1 : 0; // Setengah bintang
                                                $emptyStars = 5 - $fullStars - $halfStar; // Bintang kosong
                                            @endphp
                                            <!-- Bintang penuh -->
                                            @for ($i = 1; $i <= $fullStars; $i++)
                                                <span class="star full"></span>
                                            @endfor
                                            <!-- Bintang setengah -->
                                            @if ($halfStar)
                                                <span class="star half"></span>
                                            @endif
                                            <!-- Bintang kosong -->
                                            @for ($i = 1; $i <= $emptyStars; $i++)
                                                <span class="star empty"></span>
                                            @endfor

                                            <!-- Nilai rata-rata rating -->
                                            <span
                                                class="rating-value">({{ number_format($item->averageRating, 1) }})</span>
                                        @else
                                            <span class="text-muted">Belum ada rating</span>
                                        @endif
                                    </p>

                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
        <br>
    </section>
</x-layout>
