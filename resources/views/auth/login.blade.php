<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="bg-login">
        <img src="{{ asset('image/bg-login.png') }}" alt="bg">
    </div>
    <div class="login">
        <form action="{{ route('beranda') }}" class="btn-back">
            <button type="submit" class="icon-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 16 16" class="icon-svg">
                    <path fill-rule="evenodd"
                        d="M5.854 4.146a.5.5 0 0 1 0 .708L2.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zM13 8a.5.5 0 0 1-.5.5H3.5a.5.5 0 0 1 0-1h9a.5.5 0 0 1 .5.5z" />
                </svg>
            </button>
        </form>
        <form action="{{ route('signin') }}" method="post" class="sign-in-form" id="signin">
            @csrf
            <h2 class="title">Sign in</h2>
            <div class="input-field">
                <input type="text" name="username" placeholder=" " />
                <label for="username">Username</label>
                @error('username')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password" placeholder=" " />
                <label for="password">Password</label>
                @error('password')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            @if (session('Failed'))
                <div style="color:red;">
                    {{ session('Failed') }}
                </div>
            @endif
            <label class="forgot">
                <div class="items-left">
                    <input type="checkbox" name="remember" value="1"> Remember me
                </div>
                <div class="items-right">
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
            </label>
            <input type="submit" class="btn" value="Sign In" />
        </form>
        <p>Belum punya akun? <a href="{{ route('register') }}" class="btn-register">Sign Up</a></p>
    </div>

</body>

</html>
