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
<!-- Vendor CSS Files -->
<link href="{{ asset('aset/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('aset/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('aset/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('aset/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('aset/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ asset('aset/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('aset/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
<!-- Template Main CSS File -->
<link href="{{ asset('aset/assets/css/style.css') }}" rel="stylesheet">
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
<script src="{{ asset('aset/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('aset/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('aset/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('aset/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('aset/assets/vendor/quill/quill.js') }}"></script>
<script src="{{ asset('aset/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('aset/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('aset/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('aset/assets/js/main.js') }}"></script>
</body>

</html>
