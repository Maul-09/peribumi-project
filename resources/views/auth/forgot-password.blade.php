<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h1>Masukan Email</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>