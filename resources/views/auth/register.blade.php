<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="bg-register">
        <img src="{{ asset('image/bg-login.png') }}" alt="bg">
    </div>
    <div class="register">
        <form action="{{ route('signup') }}" method="post" class="signup">
            @csrf
            <h2 class="title">Sign up</h2>
            <div class="input-field">
                <input type="text" name="name" placeholder=" " value="{{ old('name') }}" />
                <label for="name">Nama Lengkap</label>
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="email" name="email" placeholder=" " value="{{ old('email') }}" />
                <label for="email">Email</label>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="text" name="username" placeholder=" " value="{{ old('username') }}" />
                <label for="username">Username</label>
                @error('username')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password" placeholder=" " />
                <label for="password">Password</label>
                @error('password')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder=" " />
                <label for="password_confirmation">Konfirmasi Password</label>
                @error('password_confirmation')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" class="btn" value="Sign up" />
        </form>
        <p>Sudah punya akun? <a href="{{ route('login') }}" class="btn-login">Sign In</a></p>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>
