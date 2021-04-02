<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Theta is a bootstrap & laravel admin dashboard template">
        <meta name="keywords" content="admin, admin dashboard, admin panel, admin template, analytics, bootstrap 4, crm, laravel admin, responsive, sass support, ui kits">
        <meta name="author" content="Themesbox17">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> BD HIKE PLUS </title>
        <!-- Fevicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
        <!-- Start CSS -->
        @yield('style')
        <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
        <!-- End CSS -->
        <!-- End Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <!-- End Sweet Alert End -->
        <!--====== AJAX ======-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body class="vertical-layout">
    @include('layouts.extra-needs')
        <!-- Start Infobar Notifications Sidebar -->
        <!-- Start Containerbar -->
        <div id="containerbar">
            <!-- Start Leftbar -->
            @include('layouts.leftbar')
            <!-- End Leftbar -->
            <!-- Start Rightbar -->
            @include('layouts.rightbar')
            @yield('content')
            <!-- End Rightbar -->
        </div>
        <!-- End Containerbar -->
        <!-- Start JS -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('assets/js/detect.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/vertical-menu.js') }}"></script>
        <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>
        @yield('script')
        <!-- Core JS -->
        <script src="{{ asset('assets/js/core.js') }}"></script>
        <!-- End JS -->
    <!--Jquery UI-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--Jquery-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </body>
</html>
