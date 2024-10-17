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

    <section>
        <div id="product">
            <div class="title">
                <h2>PRODUK & LAYANAN</h2>
            </div>
            <div class="card">
                <div class="box">
                    <h3>Management Business</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo nemo pariatur autem libero
                        eveniet,
                        animi provident itaque reiciendis veniam nesciunt, nam ipsam hic minima in dolorum vel odio ad
                        dolor!</p>
                    <a href="#"><img src="#" alt="foto"></a>
                </div>
                <div class="box">
                    <h3>Training Center</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga beatae magnam blanditiis nobis
                        repudiandae tempore, repellendus error sequi ab suscipit sapiente aliquid distinctio aperiam
                        esse
                        autem animi deserunt, sint impedit.</p>
                    <a href="#"><img src="#" alt="foto"></a>
                </div>
                <div class="box">
                    <h3>Digital Solution</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus pariatur esse quaerat minima
                        obcaecati repellat quasi sequi, incidunt quo porro beatae! Vel odit sapiente sint adipisci,
                        dignissimos laboriosam assumenda veniam?</p>
                    <a href="#"><img src="#" alt="foto"></a>
                </div>
                <div class="box">
                    <h3>Personal Development</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga consectetur consequatur magnam
                        incidunt harum quasi dolores vel, repellat officia aliquam quaerat accusamus sint, eos
                        cupiditate
                        eum sed, voluptas assumenda commodi?</p>
                    <a href="#"><img src="#" alt="foto"></a>
                </div>
                <div class="box">
                    <h3>Event Organizer</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cupiditate obcaecati officia
                        velit
                        nulla. Vitae, tempora? Numquam aliquid necessitatibus quas consequatur inventore mollitia
                        dolores
                        expedita, at iste incidunt cupiditate consequuntur.</p>
                    <a href="#"><img src="#" alt="foto"></a>
                </div>
            </div>
        </div>
    </section>

    <section class="mitra">
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
