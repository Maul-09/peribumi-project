<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <div>
        <p>silahkan login terlebih dahulu</p>

        <a href="{{ route('logreg') }}">back to login</a>

        <p>lupa password?</p>

        <a href="{{ route('password.request') }}">forgot password</a>

    </div>

</body>

</html>
