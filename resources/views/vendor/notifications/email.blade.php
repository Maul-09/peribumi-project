<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi Email</title>
</head>

<body style="background-color: #f7f7f7;
        color: #333;
        padding: 20px;">
    <div class="email-container"
        style="background-color: #fff;
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <div class="email-header" style="text-align: center;
        margin-bottom: 20px;">
            <img src="{{ asset('image/logo-peribumi.png') }}" alt="Logo Peribumi" class="logo"
                style="width: 150px;
        /* Sesuaikan ukuran logo */
        margin-bottom: 15px;">
            <h1 style="color: #4CAF50;
        /* Warna header */
        font-size: 24px;">Verifikasi Email Anda</h1>
        </div>

        <div class="email-body"
            style="text-align: center;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        margin-bottom: 20px;">
            <h2 style="color: #333;
        font-size: 20px;
        margin-bottom: 15px;">Halo, {{ $user->name }}
            </h2>
            <p style="font-size: 16px;
        line-height: 1.5;">Terima kasih telah mendaftar! Untuk memverifikasi
                email Anda, silakan klik tombol di bawah ini:</p>

            <div class="button-container" style="margin-top: 20px;">
                <a href="{{ $verificationUrl }}" class="button"
                    style="display: inline-block;
        padding: 12px 25px;
        background-color: #4CAF50;
        /* Warna tombol */
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;"
                    onmouseover="this.style.backgroundColor='#45a049'"
                    onmouseout="this.style.backgroundColor=''">Verifikasi Email</a>
            </div>

            <p>Jika Anda tidak merasa melakukan pendaftaran, Anda bisa mengabaikan email ini.</p>
        </div>

        <div class="email-footer" style="text-align: center;
        font-size: 12px;
        color: #777;">
            <p>PT Peribumi Cahaya Nusa | Jl. Contoh No. 123, Jakarta</p>
            <p>© 2024 Semua Hak Dilindungi.</p>
            <p>
                <a href="https://konsultanqta.com" style="color: #4CAF50;
        text-decoration: none;"
                    onmouseover="this.style.textDecoration='underline'"
                    onmouseout="this.style.textDecoration='none'">Kunjungi Website Kami</a> |
                <a href="mailto:support@example.com" style="color: #4CAF50;
        text-decoration: none;"
                    onmouseover="this.style.textDecoration='underline'"
                    onmouseout="this.style.textDecoration='none'">Hubungi Kami</a>
            </p>
        </div>
    </div>
</body>

</html>
