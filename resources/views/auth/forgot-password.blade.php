<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peribumi Consultant - Forgot Password</title>
    <link href="{{ asset('image/logo-peribumi.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('css/skin/color-palete.css') }}">
    <link rel="stylesheet" href="{{ asset('css/head-footer-style/auth.css') }}">
</head>

<body class="forgot">
    <div class="content-forgot">
        <img src="{{ asset('image/logo-peribumi.png') }}" alt="Logo" class="logo-forgot">
        <h1>Reset Your Password</h1>
        <form class="reset-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="input-forgot">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope icon"></i>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <button type="submit" class="reset-button">Reset Password</button>
        </form>

        {{-- <a href="{{ route('trash') }}" class="restore-link">Restore Account</a> --}}
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>
