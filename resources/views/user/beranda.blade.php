<x-layout>
    <x-slot:name>Beranda</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-beranda.css') }}</x-slot>
    {{-- Alertt berhasil --}}
    @if (session('success'))
        <div class="alert-popup" id="alertPopup">
            <div class="alert alert-success">
                <i class="fa fa-check-circle icon"></i>
                <span class="message">{{ session('success') }}</span>
                <button class="close-btn" onclick="closePopup()">×</button>
            </div>
        </div>
    @endif

    @if (session('register'))
        <div class="alert-popup" id="alertPopup">
            <div class="alert alert-success">
                <i class="fa fa-check-circle icon"></i>
                <span class="message">{{ session('register') }}</span>
                <button class="close-btn" onclick="closePopup()">×</button>
            </div>
        </div>
    @endif
    {{-- End Alertt berhasil --}}
    <section class="banner" id="home">
        <div class="textBx">
            <h2>PERIBUMI CONSULTANT</h2>
            <p>PERI BUMI hadir dan berkomitmen untuk membantu memfasilitasi langkah percepatan dalam rangka pengembangan
                dan atau peningkatan kompetensi serta kapasitas Sumber daya manusia yang dimiliki</p>
        </div>
    </section>

    <section class="about" id="about">
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
                        <ol type="1">
                            <li>Menghadirkan berbagai unit kerja yang berkaitan dengan Pembangunan dan
                                Pengembangan suatu bisnis baik fisik
                                maupun non-fisik (Infrastruktur)</li>
                            <li>Memfasilitasi kebutuhan pengguna atau pelanggan melalui
                                berbagai produk dan Layanan yang dimiliki baik berupa
                                barang dan jasa</li>
                            <li>Memastikan pemenuhan kebutuhan pengguna atau
                                pelanggan dengan standar mutu yang terjamin dan
                                berkualitas dalam balutan profesionalitas yang tinggi.</li>
                            <li>Mendukung proses pertumbuhan pengguna atau pelanggan ke
                                arah yang lebih baik melalui kesiagaan dan pemberdayaan
                                sumber daya yang dimiliki</li>
                            <li>Menjadikan kepuasan yang dirasakan oleh pengguna atau
                                pelanggan atas produk dan layanan yang dihadirkan
                                sebagai pengalaman berharga tak akan ternilai yang
                                memberikan motivasi lebih untuk terus berinovasi</li>
                        </ol>
                    </div>
                    <div class="tim-peribumi">
                        <button class="tim-peribumi">Tim Peribumi</button>
                    </div>
                </div>
            </div>
                <img src="{{ asset('../image/bg-4.jpg') }}" alt="foto">

        </div>
    </section>

    <section class="mitpro">
        <div class="title-product">
            <h2>PRODUK KAMI</h2>
            <p>Kami menghadirkan beragam produk berkualitas tinggi yang dirancang untuk memenuhi kebutuhan Anda. Temukan inovasi, keunggulan, dan solusi terbaik di setiap kategori.</p>
        </div>
        <div class="cards-container">
            <div class="card">
                <div class="box">
                    <a href="{{ route('manajemen') }}">
                    <img src="{{ asset('../image/bg-10.jpg') }}" alt="">
                    <div class="gradient-layer"></div>
                    <div class="textbx-card">
                        <h3>Management Business</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga beatae magnam blanditiis nobis.
                        </p>
                    </div>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="box">
                    <a href="{{ route('training') }}">
                    <img src="{{ asset('../image/bg-8.jpg') }}" alt="">
                    <div class="gradient-layer"></div>
                    <div class="textbx-card">
                        <h3>Training Center</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga beatae magnam blanditiis nobis.
                        </p>
                    </div>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="box">
                    <a href="{{ route('digital') }}">
                    <img src="{{ asset('../image/bg-4.jpg') }}" alt="">
                    <div class="gradient-layer"></div>
                    <div class="textbx-card">
                        <h3>Digital Solution</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga beatae magnam blanditiis nobis.
                        </p>
                    </div>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="box">
                    <a href="{{ route('personal') }}">
                    <img src="{{ asset('../image/bg-5.jpg') }}" alt="">
                    <div class="gradient-layer"></div>
                    <div class="textbx-card">
                        <h3>Personal Development</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga beatae magnam blanditiis nobis.
                        </p>
                    </div>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="box">
                    <a href="{{ route('event') }}">
                    <img src="{{ asset('../image/bg-6.jpg') }}" alt="">
                    <div class="gradient-layer"></div>
                    <div class="textbx-card">
                        <h3>Organizer</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga beatae magnam blanditiis nobis.
                        </p>
                    </div>
                    </a>
                </div>
            </div>
        </div>


        <hr id="mitra">

        <div>
            <div class="title-client">
                <h2>CLIENT & KEMITRAAN</h2>
                <p>Kami bangga dapat menjalin kerja sama dengan berbagai pihak yang mempercayakan kami sebagai bagian dari perjalanan mereka. Bersama, kami membangun solusi inovatif dan memberikan dampak positif di berbagai bidang.</p>
            </div>
            <div class="mitra-logo">
                <img src="{{ asset('../image/mitra1.png') }}" alt="logo">
                <img src="{{ asset('../image/mitra2.png') }}" alt="logo">
                <img src="{{ asset('../image/mitra3.png') }}" alt="logo">
            </div>

        </div>
    </section>
</x-layout>
