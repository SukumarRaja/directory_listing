<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', __('Admin')) • {{ config('app.name', __('EaseBook')) }}</title>

    <!-- CSS -->
    @stack('styles-top')
    <link rel="stylesheet" href="{{ asset('assets/b/vendors/feather/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/b/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/b/vendors/mdi-icons/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/b/vendors/alertifyjs/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/b/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/b/css/style.css') }}">
    @stack('styles-bottom')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/f/demo/img/favicon.ico') }}" />
</head>

<body class="{{ $_COOKIE['sidebar-size'] ?? '' }}">
    <div class="container-scroller">

        <!-- Partials->Header - Start -->
        @include('web.layouts.partials.admin.header')
        <!-- Partials->Header - End -->

        <div class="container-fluid page-body-wrapper">

            <!-- Partials->Sidebar-Right - Start -->
            @include('web.layouts.partials.admin.sidebar-right')
            <!-- Partials->Sidebar-Right - End -->

            <!-- Partials->Sidebar-Left - Start -->
            @include('web.layouts.partials.admin.sidebar-left')
            <!-- Partials->Sidebar-Left - End -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Main Content - Start -->
                    @yield('content')
                    <!-- Main Content - End -->
                </div>

                <!-- Partials->Footer - Start -->
                @include('web.layouts.partials.admin.footer')
                <!-- Partials->Footer - End -->

            </div>
        </div>
    </div>

    <!-- Scripts -->
    @stack('scripts-top')
    <script src="{{ asset('assets/b/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/b/vendors/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/b/vendors/alertifyjs/js/alertify.min.js') }}"></script>
    <script src="{{ asset('assets/b/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/b/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/b/js/template.js') }}"></script>
    <script src="{{ asset('assets/b/js/settings.js') }}"></script>
    <script src="{{ asset('assets/b/js/todolist.js') }}"></script>
    @stack('scripts-bottom')

    @if(session('type') == "notify")
    <script>
        alertify.notify("{{ session('message') }}", "{{ session('status') }}");
    </script>
    @endif
</body>

</html>