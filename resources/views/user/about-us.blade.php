<x-layout>
    <x-slot:name>Sejarah Perusahaan</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-about.css') }}</x-slot>
    <section class="banner" id="home">
        <div class="textBx">
            <h2>TENTANG KAMI</h2>
            <p>Bisnis yang kami jalankan tidak hanya selalu tentang menjual produk yang kami miliki, akan tetapi tentunya didasari dengan pendampingan yang kami berikan secara objektif kepada calon pengguna.</p>
        </div>
    </section>

    <section class="history">
        <div class="content-histori">
            <h3>Sejarah Kami</h3>
            <p>PERI BUMI merupakan suatu platform penyedia yang dimiliki oleh PT. Peribumi
            Cahaya Nusa dan telah berjalan semenjak tahun 2021. Peri bumi merupakan
            Perusahaan yang berbasis Konsultan dan banyak dikenal dengan nama Peri Bumi
            Konsultan. Hingga kini, Peri Bumi Konsultan telah memiliki banyak mitra dan
            klien yang berasal dari berbagai sektor, bidang dan latar belakang. Semua
            pencapaian tersebut tentu atas izin, ridho dan rahmat tuhan yang maha kuasa,
            doa dan dukungan berbagai pihak serta kegigihan usaha yang dilakukan.</p>

            <p>Saat ini, Peri Bumi Konsultan dalam bisnisnya berfokus dalam 5 (lima) bidang
            yaitu : manajemen bisnis, pusat pelatihan dan sertifikasi, pengembangan potensi,
            solusi digital serta penyelenggaraan kegiatan (Event). Adapun semua produk/
            layanan yang kami miliki dapat diperoleh atau digunakan oleh para pengguna/klien
            baik melalui jalur proyek maupun reguler.</p>

            <p>Harapan kami, semoga dengan kehadiran kami dalam dunia usaha/ dunia idustri
            akan banyak memberi manfaat secara luas dan tentunya mampu menyumbangkan
            kontribusi positif dalam mendukung Pembangunan bangsa dan negara Indonesia
            hingga masa mendatang.</p>
        </div>
        <div class="box-1">
            <div class="navtab">
                <h1>Kami hadir sejak tahun 2021</h1>
                <div class="tab">
                    <button class="tablinks" onclick="openTab(event, 'Tab1')">Visi</button>
                    <button class="tablinks" onclick="openTab(event, 'Tab2')" id="defaultOpen">Misi</button>
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
                            sebagai pengalaman berharga tak ternilai Sehingga menjadikan Motivasi lebih bagi kami
                            untuk terus berinovasi</li>
                    </ol>
                </div>
            </div>
            <img src="{{ asset('image/struktur.png') }}" alt="" class="struktur-image">
        </div>
    </section>
</x-layout>
