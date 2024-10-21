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
        <form action="{{ route('store') }}" method="post">
            @csrf
            <label>Nama Depan</label>
            <input type="text" name="first_name">
            <label>Nama belakang</label>
            <input type="text" name="last_name">
            <label>Email</label>
            <input type="text" name="email">
            <label>Username</label>
            <input type="text" name="username">
            <label>Password</label>
            <input type="text" name="password">
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>

</html>
