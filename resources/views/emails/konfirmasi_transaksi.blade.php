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
            <p>
                Admin,
            </p>
            <p>
                PERI BUMI CONSULTANT.
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>PT Peribumi Cahaya Nusa | Jl. H. Basuki No. 6, Binong  Jati, Batununggal, Bandung</p>
            <p>© 2024 Semua Hak Dilindungi.</p>
        </div>
    </div>
</body>

</html>
