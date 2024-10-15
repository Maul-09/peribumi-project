<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin/color-palete.css') }}">
    <title>Beranda</title>
</head>

<body>
    <x-navbar></x-navbar>
    <main>
        {{ $slot }}
    </main>
    <x-footer></x-footer>
</body>

</html>
