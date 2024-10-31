<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/head-footer-style/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin/color-palete.css') }}">
    <title>Document</title>
</head>
<body class="verif">
    <div class="page-wrapper">
        <img src="{{ asset('image/logo-peribumi.png') }}" alt="Logo" class="logo"> <!-- Logo di atas box -->
        <div class="verification-container">
            <p>Silahkan cek verifikasi Email Anda</p>
            <h1>Belum Terima Email Verifikasi?</h1>
            <p>Jika Anda belum menerima email, klik tombol di bawah ini untuk mengirim ulang.</p>

            <form id="resendForm" action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button type="submit" class="resend-button" onclick="showConfirmation()">Kirim Ulang Email</button>
            </form>

            <p id="confirmationMessage" class="confirmation-message">Email verifikasi telah dikirim ulang!</p>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
