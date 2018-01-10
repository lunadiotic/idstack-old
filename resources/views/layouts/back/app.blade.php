<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="Tutorial Coding Bahasa Indonesia, Kursus Online Pemrograman, IDStack" />
	    <meta name="keywords" content="study, learn, course, tutor, tutorial, teach, college, school, institute, teacher, instructor, php, laravel, web, mysql, html, css" />
        <meta name="author" content="IDStack">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('assets/back/images/favicon_1.ico') }}">

        <title>IDStack - @yield('title', 'Admin')</title>

        <link href="{{ asset('assets/back/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/back/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/back/css/style.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('assets/back/js/modernizr.min.js') }}"></script>
        @yield("styles")
        <script src="{{ asset('assets/back/plugins/tinymce/tinymce.min.js') }}"></script>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper" class="enlarged forced">

            <!-- Top Bar Start -->
            @include('layouts.back.partials._topbar')
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.back.partials._sidebar')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    @yield('content')
                </div> <!-- content -->

                <footer class="footer text-right">
                    &copy; 2016 - 2017. All rights reserved.
                </footer>

            </div>

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('assets/back/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/back/js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
        <script src="{{ asset('assets/back/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/back/js/detect.js') }}"></script>
        <script src="{{ asset('assets/back/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/back/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/back/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/back/js/waves.js') }}"></script>
        <script src="{{ asset('assets/back/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/back/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/back/js/jquery.scrollTo.min.js') }}"></script>

        <script src="{{ asset('assets/back/js/jquery.core.js') }}"></script>
        <script src="{{ asset('assets/back/js/jquery.app.js') }}"></script>
        @yield("scripts")
        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>