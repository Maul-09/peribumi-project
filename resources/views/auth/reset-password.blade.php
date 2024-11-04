<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peribumi Consultant - Reset Password</title>
    <link href="{{ asset('image/logo-peribumi.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('css/head-footer-style/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin/color-palete.css') }}">
</head>
<body class="reset">
    <div class="reset-container">
        <img src="{{ asset('image/logo-peribumi.png') }}" alt="Website Logo" class="logo-reset">
        <h1>Reset Password</h1>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif
        <form class="reset-form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="input-reset">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-reset">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="New password" required>
            </div>
            <div class="input-reset">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password" required>
            </div>
            <button type="submit" class="reset-btn">Reset Password</button>
        </form>
    </div>
</body>
</html>
