<!doctype html>
<html lang="en">

<!-- Mirrored from quomodothemes.website/html/shopus/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Nov 2023 08:51:46 GMT -->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/clients/images/homepage-one/icon.png') }}">

    <title>Shopus: Your One-Stop Destination for Fashion and Style</title>

    <link rel="stylesheet" href="{{ asset('assets/clients/css/swiper10-bundle.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap-5.3.2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/clients/css/nouislider.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/clients/css/aos-3.0.0.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
</head>

<body>


    @include('clients.blocks.header')

    @yield('content')
    @include('clients.blocks.footer')


    <script src="{{ asset('assets/clients/js/jquery_3.7.1.min.js') }}"></script>

    <script src="{{ asset('assets/clients/js/bootstrap_5.3.2.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/clients/js/nouislider.min.js') }}"></script>

    <script src="{{ asset('assets/clients/js/aos-3.0.0.js') }}"></script>

    <script src="{{ asset('assets/clients/js/swiper10-bundle.min.js') }}"></script>

    <script src="{{ asset('assets/clients/js/shopus.js') }}"></script>

</body>

<!-- Mirrored from quomodothemes.website/html/shopus/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Nov 2023 08:52:28 GMT -->

</html>
