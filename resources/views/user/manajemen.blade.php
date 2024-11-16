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
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <br>
    </section>
</x-layout>
