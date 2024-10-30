<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{ $title }}">
<link rel="stylesheet" href="{{ asset('css/head-footer-style/footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/skin/color-palete.css') }}">
<link rel="icon" type="image/png" href="{{ asset('image/favicon.ico') }} ">
<link rel="stylesheet" href="{{ asset('css/head-footer-style/style-nav.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Peribumi Consultant - Wellcome</title>
    <title>{{ $name }}</title>
</head>

<body>
    <x-navbar></x-navbar>
    <main>
        {{ $slot }}
    </main>
    <x-footer></x-footer>

<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/nav.js') }}"></script>
</body>

</html>
