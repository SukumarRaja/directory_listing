<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', __('User')) | {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/f/demo/img/favicon.ico') }}" type="image/x-icon">

    <!-- CSS -->
    @stack('styles-top')
    <link rel="stylesheet" href="{{ asset('assets/f/fonts/jost/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/fontawesome-pro/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/quilljs/css/quill.bubble.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/quilljs/css/quill.core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/quilljs/css/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/chosen/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/photoswipe/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/photoswipe/default-skin/default-skin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/datetimepicker/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/libs/venobox/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/css/custom.css') }}">
    @stack('styles-bottom')
</head>

<body>
    <div id="wrapper">

        <!-- Header - Start -->
        @include('web.layouts.user.header')
        <!-- Header - End -->

        <!-- Main Content - Start -->
        @yield('content')
        <!-- Main Content - End -->

        <!-- Footer - Start -->
        @include('web.layouts.user.footer')
        <!-- Footer - End -->

        <!-- JS -->
        @stack('scripts-top')
        <script src="{{ asset('assets/f/libs/jquery/jquery-1.12.4.js') }}"></script>
        <script src="{{ asset('assets/f/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('assets/f/libs/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/f/libs/slick/slick.min.js') }}"></script>
        <script src="{{ asset('assets/f/libs/slick/jquery.zoom.min.js') }}"></script>
        <script src="{{ asset('assets/f/libs/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/f/libs/quilljs/js/quill.core.js') }}"></script>
        <script src="{{ asset('assets/f/libs/quilljs/js/quill.js') }}"></script>
        <script src="{{ asset('assets/f/libs/chosen/chosen.jquery.min.js') }}"></script>
        <script src="{{ asset('assets/f/libs/photoswipe/photoswipe.min.js') }}"></script>
        <script src="{{ asset('assets/f/libs/photoswipe/photoswipe-ui-default.min.js') }}"></script>
        <script src="{{ asset('assets/f/libs/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
        <script src="{{ asset('assets/f/libs/venobox/venobox.min.js') }}"></script>
        <script src="{{ asset('assets/f/js/main.js?v=1.4') }}"></script>
        <script src="{{ asset('assets/f/js/custom.js?v=1.4') }}"></script>
        @stack('scripts-bottom')
</body>

</html>