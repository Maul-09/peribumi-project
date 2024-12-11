<x-layout>
    <x-slot:name>Management Business</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-manajemen.css') }}</x-slot>
    <section class="banner" id="home">
        <div class="textBx">
            <h2>MANAGEMENT BUSINESS</h2>
            <p>Kami hadir dengan solusi manajemen bisnis yang efektif dan inovatif untuk membantu perusahaan Anda berkembang pesat. Dengan strategi yang dirancang khusus, kami siap meningkatkan efisiensi operasional dan mendorong pertumbuhan bisnis secara berkelanjutan</p>
        </div>
    </section>
    <div id="produk-layanan" ></div>
        <section class="product-manajemen">
            <div>
                <div class="title-produk">
                    <h3>Produk & Layanan</h3>
                </div>
                <x-card-produk></x-card-produk>
            </div>
            <br>
        </section>
</x-layout>
