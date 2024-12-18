<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/notif/style-konfirmasi.css') }}">
    <title>Konfirmasi Transaksi</title>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Transaksi Berhasil Dikonfirmasi</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <img src="{{ asset('../image/logo-peribumi.png') }}" alt="Logo Perusahaan"> <!-- Logo -->
            <h2>Hello, {{ $transaksi->user->name }}</h2>
            <p>
                Selamat! Transaksi Anda untuk produk
                <span class="highlight">"{{ $transaksi->produk->nama_produk }}"</span> telah berhasil dikonfirmasi.
            </p>
            {{-- <p>
                Anda kini dapat mengakses pelatihan melalui tautan di bawah ini.
            </p> --}}

            <!-- Button Section -->
            {{-- <div class="button-container">
                <a href="https://lms.example.com" class="button secondary">Akses LMS</a>
            </div> --}}

            <p>
                Admin,
            </p>
            <p>
                PERI BUMI CONSULTANT.
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>PT Peribumi Cahaya Nusa | Jl. Contoh No. 123, Jakarta</p>
            <p>© 2024 Semua Hak Dilindungi.</p>
            <p>
                <a href="https://example.com">Kunjungi Website Kami</a> |
                <a href="mailto:support@example.com">Hubungi Kami</a>
            </p>
        </div>
    </div>
</body>

</html>
