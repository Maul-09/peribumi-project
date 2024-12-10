<x-layout>
    <x-slot:name>Potensial Development</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-personal.css') }}</x-slot>
    <section class="banner" id="home">
        <div class="textBx">
            <h2>POTENTIAL DEVELOPMENT</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint voluptate consequatur alias
                recusandae
                explicabo temporibus, ad dolorum nisi, voluptatum ab non minima totam iure repellat sapiente nulla
                repellendus
                suscipit?</p>
        </div>
    </section>
    <div id="produk-layanan"></div>
    <section class="product-personal">
        <div>
            <div class="title-produk">
                <h3>Produk & Layanan</h3>
            </div>
            <x-card-produk></x-card-produk>
        </div>
        <br>
    </section>
</x-layout>
