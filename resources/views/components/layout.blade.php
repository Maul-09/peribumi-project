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
    <link rel="stylesheet" href="{{ asset('css/admin-style/style-card-product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user-style/style-modalkonfirmasi.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Peribumi Consultant - Wellcome</title>
    <title>{{ $name }}</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8681639826710276"
        crossorigin="anonymous"></script>
</head>

<body>
    @props(['ShowNavbar' => true, 'ShowFooter' => true])
    @if ($ShowNavbar)
        <x-nav-bar></x-nav-bar>
    @endif
    {{ $slot }}
    @if ($ShowFooter)
        <x-footer></x-footer>
    @endif

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    <script src="{{ asset('js/product.js') }}"></script>
    <script src="{{ asset('js/modalkonfirmasi.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="/js/jquery.mousewheel.js"></script>
</body>

</html>
