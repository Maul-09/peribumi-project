<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ga dapet email?</h1>
    <p>yahahahahaa</p>
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf

        <button type="submit">pencet ini bang buat kirim ulang</button>
    </form>
</body>
</html>