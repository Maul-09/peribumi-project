<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/head-footer-style/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin/color-palete.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Peribumi Consultant - Register</title>
</head>

<body class="log">
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="{{ route('signin') }}" method="post" class="sign-in-form" id="signin">
                    @csrf
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password" />
                        <div id="togglePassword" class="toggle-password">
                            <i class="fas fa-eye-slash" id="eyeIcon"></i>
                        </div>
                    </div>

                    @if (session('Failed'))
                        <div style="color:red;">
                            {{ session('Failed') }}
                        </div>
                    @endif
                    <label class="forgot">
                        <input type="checkbox" name="remember" value="1"> Remember me
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </label>
                    <input type="submit" class="btn" value="Sign In" />

                </form>
                <form action="{{ route('signup') }}" method="post" class="sign-up-form" id="signup">
                    @csrf
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-id-card"></i>
                        <input type="text" name="name" placeholder="Nama lengkap" />
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" />
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" />
                        @error('username')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password" />
                        <span id="togglePassword" class="toggle-password">
                            <i class="fas fa-eye-slash" id="eyeIcon"></i>
                        </span>
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="submit" class="btn" value="Sign up" />

                </form>

            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Start your
                        Carier now</h3>
                    <p>
                        If you don’t have an account yet, join us and start your carier
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="{{ asset('image/log.svg') }}" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Hello
                        friends</h3>
                    <p>
                        If you already have an account, signin here and have fun!
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="{{ asset('image/register.svg') }}" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>
