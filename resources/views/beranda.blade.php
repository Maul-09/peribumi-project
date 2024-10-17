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
                <ul class="nav-tabs">
                    <li class="active" data-tab="tab1">Home</li>
                    <li data-tab="tab2">About</li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <h2>Welcome to Home</h2>
                        <p>This is the home section content.</p>
                    </div>
                    <div id="tab2" class="tab-pane">
                        <h2>About Us</h2>
                        <p>This is the about section content.</p>
                    </div>
                    <div id="tab3" class="tab-pane">
                        <h2>Contact Us</h2>
                        <p>This is the contact section content.</p>
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
                        <h3>Event Organizer</h3>
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
