<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/notif/style-verifikasi.css') }}">
    <title>Verifikasi Email</title>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <img src="{{ asset('image/logo-peribumi.png') }}" alt="Logo Peribumi" class="logo">
            <h1>Verifikasi Email Anda</h1>
        </div>

        <div class="email-body">
            <h2>Halo, {{ $user->name }}</h2>
            <p>Terima kasih telah mendaftar! Untuk memverifikasi email Anda, silakan klik tombol di bawah ini:</p>

            <div class="button-container">
                <a href="{{ $verificationUrl }}" class="button">Verifikasi Email</a>
            </div>

            <p>Jika Anda tidak merasa melakukan pendaftaran, Anda bisa mengabaikan email ini.</p>
        </div>

        <div class="email-footer">
            <p>PT Peribumi Cahaya Nusa | Jl. Contoh No. 123, Jakarta</p>
            <p>© 2024 Semua Hak Dilindungi.</p>
            <p>
                <a href="https://konsultanqta.com">Kunjungi Website Kami</a> |
                <a href="mailto:support@example.com">Hubungi Kami</a>
            </p>
        </div>
    </div>
</body>

</html>
