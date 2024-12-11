<x-layout>
    <x-slot:name>Organizer</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-event.css') }}</x-slot>
    <section class="banner" id="home">
        <div class="textBx">
            <h2>EVENT ORGANIZER</h2>
            <p>Kami menawarkan layanan event organizer profesional yang siap merancang dan menyelenggarakan acara sesuai kebutuhan Anda. Dengan konsep kreatif, tim yang berpengalaman, dan eksekusi yang sempurna, kami memastikan setiap detail acara berjalan lancar dan meninggalkan kesan mendalam bagi para peserta</p>
        </div>
    </section>
    <div id="produk-layanan"></div>
    <section class="product-event">
        <div>
            <div class="title-produk">
                <h3>Produk & Layanan</h3>
            </div>
            <x-card-produk></x-card-produk>
        </div>
        <br>
    </section>
</x-layout>
