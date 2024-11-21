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
    <div class="login">
        <form action="{{ route('signin') }}" method="post" class="sign-in-form" id="signin">
            @csrf
            <h2 class="title">Sign in</h2>
            <div class="input-field">
                <input type="text" name="username" placeholder="Username" />
                @error('username')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password" placeholder="Password">
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
