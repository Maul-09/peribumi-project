<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/head-footer-style/auth.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <input type="password" name="password" placeholder="Password" />
              </div>
              @if (session('Failed'))
                <div style="color:red;">
                    {{ session('Failed') }}
                </div>
              @endif
              <div>
                <label>
                    <input type="checkbox" name="remember" value="1"> Remember me
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </label>
            </div>
              <input type="submit" class="btn" value="Sign up" />
              <p class="social-text">Or signin with Google</p>
              <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
              </div>
            </form>
            <form action="{{ route('signup') }}" method="post" class="sign-up-form" id="signup">
                @csrf
              <h2 class="title">Sign up</h2>
              <div class="input-field">
                <i class="fas fa-envelope"></i>
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
                <input type="password" name="password" placeholder="Password" />
                @error('password')

                <p>{{ $message }}</p>

                @enderror
              </div>
              <input type="submit" class="btn" value="Sign up" />
              <p class="social-text">Or signup with Google</p>
              <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
              </div>
            </form>

            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Start your
                        Carier now</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                        ex ratione. Aliquid!
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                        laboriosam ad deleniti.
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
