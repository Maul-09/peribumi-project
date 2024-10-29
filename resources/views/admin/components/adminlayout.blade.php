<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="{{ asset('aset/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('aset/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
    <title>Document</title>
</head>
<body>
    <x-nav-bar-admin></x-nav-bar-admin>
    {{ $slot }}



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
