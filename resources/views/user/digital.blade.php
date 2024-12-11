<x-layout>
    <x-slot:name>Digital Solution</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-digital.css') }}</x-slot>
    <section class="banner" id="home">
        <div class="textBx">
            <h2>DIGITAL SOLUTION</h2>
            <p>Kami menawarkan solusi digital yang inovatif dan komprehensif untuk membantu bisnis Anda menghadapi tantangan era digital. Dengan teknologi terkini dan pendekatan yang tepat, kami siap meningkatkan efisiensi, mempercepat proses operasional, dan memastikan bisnis Anda siap bersaing di pasar yang terus berkembang</p>
        </div>
    </section>
    <div id="produk-layanan"></div>
    <section class="product-digital">
        <div>
            <div class="title-produk">
                <h3>Produk & Layanan</h3>
            </div>
            <x-card-produk></x-card-produk>
        </div>
        <br>
    </section>
</x-layout>
