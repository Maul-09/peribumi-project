<x-layout>
    <x-slot:name>Beranda</x-slot>
    <x-slot:title>{{ asset('css/style-beranda.css') }}</x-slot>
    <section class="banner" id="home">
        <div class="textBx">
            <h2>PERIBUMI CONSULTANT</h2>
            <p>PERI BUMI hadir dan berkomitmen untuk membantu memfasilitasi langkah percepatan dalam rangka pengembangan
                dan atau peningkatan kompetensi serta kapasitas Sumber daya manusia yang dimiliki</p>
        </div>
    </section>

    <section class=" about" id="about">
        <div class="content">
            <div class="w50">
                <h1>Tentang Peribumi Consultan</h1>
                <h2>Kami hadir sejak tahun 2023</h2>
                <div class="navtab">
                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'Tab1')" id="defaultOpen">Visi</button>
                        <button class="tablinks" onclick="openTab(event, 'Tab2')">Misi</button>
                    </div>

                    <div id="Tab1" class="tabcontent">
                        <p class="misi">Menjadi Pelopor Bisnis yang Menginspirasi, Mendukung dan
                            Mewujudkan</p>
                    </div>

                    <div id="Tab2" class="tabcontent scrollable-content">
                        <p>1. Menghadirkan berbagai unit kerja yang berkaitan dengan
                            Pembangunan dan Pengembangan suatu bisnis baik fisik
                            maupun non-fisik (Infrastruktur)</p>
                        <p>2. Memfasilitasi kebutuhan pengguna atau pelanggan melalui
                            berbagai produk dan Layanan yang dimiliki baik berupa
                            barang dan jasa</p>
                        <p>3. Memastikan pemenuhan kebutuhan pengguna atau
                            pelanggan dengan standar mutu yang terjamin dan
                            berkualitas dalam balutan profesionalitas yang tinggi.</p>
                        <p>4. Mendukung proses pertumbuhan pengguna atau pelanggan ke
                            arah yang lebih baik melalui kesiagaan dan pemberdayaan
                            sumber daya yang dimiliki</p>
                        <p>5. Menjadikan kepuasan yang dirasakan oleh pengguna atau
                            pelanggan atas produk dan layanan yang dihadirkan
                            sebagai pengalaman berharga tak akan ternilai yang
                            memberikan motivasi lebih untuk terus berinovasi</p>
                    </div>
                </div>
            </div>
            <div class="w50">
                <img src="{{ asset('../image/bg-4.jpg') }}" alt="foto">
            </div>
        </div>
    </section>

    <section class="mitpro">
        <div id="product">
            <div class="product-title">
                <h2>PRODUK & LAYANAN</h2>
            </div>
            <div class="card">
                <div class="box">
                    <img src="{{ asset('../image/bg-4.jpg') }}" alt="">
                    <div class="textbx-card">
                        <h3>Management Business</h3>
                        <p>{{ Str::limit(
                            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga beatae magnam blanditiis nobis',
                            50,
                        ) }}
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="{{ asset('../image/bg-8.jpg') }}" alt="">
                    <div class="textbx-card">
                        <h3>Training Center</h3>
                        <p>{{ Str::limit(
                            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga beatae magnam blanditiis nobis',
                            50,
                        ) }}
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="{{ asset('../image/bg-5.jpg') }}" alt="">
                    <div class="textbx-card">
                        <h3>Digital Solution</h3>
                        <p>{{ Str::limit(
                            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga beatae magnam blanditiis nobis',
                            50,
                        ) }}
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="{{ asset('../image/bg-6.jpg') }}" alt="">
                    <div class="textbx-card">
                        <h3>Personal Development</h3>
                        <p>{{ Str::limit(
                            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga beatae magnam blanditiis nobis',
                            50,
                        ) }}
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="{{ asset('../image/bg-7.jpg') }}" alt="">
                    <div class="textbx-card">
                        <h3>Organizer</h3>
                        <p>{{ Str::limit(
                            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga beatae magnam blanditiis nobis',
                            50,
                        ) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div id="mitra">
            <div class="client">
                <h2>CLIENT & KEMITRAAN</h2>
            </div>
            <div class="mitra-logo">
                <img src="{{ asset('../image/mitra1.png') }}" alt="logo">
                <img src="{{ asset('../image/mitra2.png') }}" alt="logo">
                <img src="{{ asset('../image/mitra3.png') }}" alt="logo">
            </div>

        </div>
    </section>
</x-layout>
