<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>

<body>
    <div>
        <div>
            <h2>Creat an Account</h2>
            <form action="{{ route('signup') }}" method="post">
                @csrf
                <label>Nama Depan</label>
                <input type="text" name="first_name">
                <label>Nama belakang</label>
                <input type="text" name="last_name">
                <label>Email</label>
                <input type="email" id="email" name="email">
                <label>Username</label>
                <input type="text" name="username">
                <label>Password</label>
                <input type="password" name="password">
                <button type="submit">Sign Up</button>
            </form>
            
        </div>
        <div id="signin">
            <h2>Welcome Back!</h2>
            <form action="{{ route('signin') }}" method="post">
                @csrf
                <label>Username</label>
                <input type="text" name="username">
                <label>Password</label>
                <input type="password" name="password">
                <button type="submit">Sign In</button>
            </form>
            @if (session('Failed'))
                <div>
                    {{ session('Failed') }}
                </div>
            @endif
        </div>
    </div>
</body>

</html>
