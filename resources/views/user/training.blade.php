<x-layout>
    <x-slot:name>Training Center</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-training.css') }}</x-slot>
    <section class="banner" id="home">
        <div class="textBx">
            <h2>TRAINING CENTER</h2>
            <p>Kami menawarkan pelatihan profesional yang dirancang secara khusus untuk meningkatkan keterampilan dan pengetahuan Anda, sehingga Anda dapat bekerja lebih efisien dan efektif. Dengan materi yang up-to-date dan metode pengajaran yang interaktif, kami membantu Anda siap menghadapi tantangan bisnis dengan percaya diri dan kompeten</p>
        </div>
    </section>
    <div id="produk-layanan"></div>
    <section class="product-training">
        <div>
            <div class="title-produk">
                <h3>Produk & Layanan</h3>
            </div>
            <x-card-produk></x-card-produk>
        </div>
        <br>
    </section>
</x-layout>
