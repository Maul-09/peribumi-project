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
            <h2>PERI BUMI CONSULTANT</h2>
            <p>Hadir dan berkomitmen untuk membantu memfasilitasi langkah percepatan dalam rangka pengembangan
                dan atau peningkatan kompetensi serta kapasitas Sumber daya manusia yang dimiliki</p>
        </div>
    </section>

    <section class="about" id="about">
        <div class="content">
            <div class="w50">
                <h1>Mengapa memilih kami?</h1>
                <h2>Keunggulan dan Perbedaan</h2>
                <div class="container-chose">
                    <div class="card-chose">
                        <div class="card-content">
                            <div class="card-section">
                                <h3>Produk :</h3>
                                <ul>
                                    <li>Flexibel</li>
                                    <li>Murah dan Terjangkau</li>
                                    <li>Berkesesuaian</li>
                                    <li>Konseptual</li>
                                    <li>Terverifikasi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-chose">
                        <div class="card-content">
                            <div class="card-section">
                                <h3>Layanan :</h3>
                                <ul>
                                    <li>Menyeluruh</li>
                                    <li>Mudah dan Cepat</li>
                                    <li>Terintegrasi</li>
                                    <li>Beragam</li>
                                    <li>Professional</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tim-peribumi">
                    <a href="{{ route('about.us') }}" class="peribumi">Tentang Kami</a>
                </div>
            </div>
            <div class="circle">
                <div class="photo-stack">
                    <img src="{{ asset('../image/bg-10.jpg') }}" class="photo" alt="">
                    <img src="{{ asset('../image/bg-8.jpg') }}" class="photo" alt="">
                    <img src="{{ asset('../image/bg-5.jpg') }}" class="photo" alt="">
                </div>
            </div>

        </div>
    </section>

    <section class="mitpro">
        <div class="title-product">
            <h2>PRODUK & LAYANAN</h2>
            <p>Kami menghadirkan beragam produk berkualitas tinggi yang dirancang untuk memenuhi kebutuhan Anda. Temukan
                inovasi, keunggulan, dan solusi terbaik di setiap kategori produk kami berikut ini.</p>
        </div>
        <div class="carousel-container">
            <div class="cards-container">
                <div class="card">
                    <div class="box">
                        <a href="{{ route('manajemen') }}">
                            <img src="{{ asset('../image/bg-10.jpg') }}" alt="">
                            <div class="gradient-layer"></div>
                            <div class="textbx-card">
                                <h3>Management Business</h3>
                                <p>Ingin bisnismu berkembang cepat? Terapkan manajemen yang terstruktur, efisien, dan
                                    penuh strategi
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
                                <p>Mau jadi lebih kompeten dan percaya diri? Ikuti program training center kami dan
                                    buktikan hasilnya!
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
                                <h3>Digital Solutions</h3>
                                <p>Tantangan digital? Kami punya solusinya! Optimalkan operasional bisnismu dengan
                                    teknologi terkini.
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
                                <h3>Potential Development</h3>
                                <p>Setiap individu punya potensi besar. Kembangkan bersama kami dan capai versi terbaik
                                    dari dirimu!
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
                                <h3> Event Organizer</h3>
                                <p>Setiap momen spesial butuh sentuhan profesional. Percayakan acara Anda pada event
                                    organizer berpengalaman!
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <hr id="mitra">

        <div>
            <div class="title-client">
                <h2>KERJA SAMA & KEMITRAAN</h2>
                <p>Kami bangga dapat menjalin kerja sama dan kemitraan dengan berbagai pihak yang mempercayakan kami
                    sebagai bagian
                    dari perjalanan mereka. Secara bersama-sama, kami membangun solusi inovatif dan memberikan dampak
                    positif di
                    berbagai bidang.</p>
            </div>
            <div class="mitra-logo">
                <img src="{{ asset('../image/mitra1.png') }}" alt="logo">
                <img src="{{ asset('../image/mitra2.png') }}" alt="logo">
                <img src="{{ asset('../image/mitra3.png') }}" alt="logo">
            </div>

        </div>
    </section>
</x-layout>
