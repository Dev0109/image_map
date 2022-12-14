<!DOCTYPE html>
<html lang="en">
{{-- @section('title') {{'Lorem ipsum'}} @endsection --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ isset($title) ? $title : 'Dashboard' }} </title>

    <link rel="icon" href="{{ asset('adminAsset/images/favicon.ico') }}">



    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminAsset/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminAsset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminAsset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('adminAsset/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminAsset/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminAsset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminAsset/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminAsset/plugins/summernote/summernote-bs4.min.css') }}">

    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('adminAsset/dist/img/glp-logo.png') }}" alt="School Logo"
            height="70" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/dashboard" class="nav-link">Home</a>
            </li>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->


            <li class="nav-item d-none d-sm-inline-block">
                {{-- <a href="/logout" class="nav-link">Logout</a> --}}

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </li>


        </ul>
    </nav>
    <!-- /.navbar -->
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2015-{{ date('Y') }} <a href="https://glpublications.in">GL
                Publications</a>.</strong> All rights reserved. Powered by <a href="https://complit.in">COMPLIT</a>

        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 2.1.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    </div>


    <!-- jQuery -->

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminAsset/plugins/jquery-ui/jquery-ui.min.js') }}" defer></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminAsset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <!-- ChartJS -->
    <!-- Sparkline -->
    <script src="{{ asset('adminAsset/plugins/sparklines/sparkline.js') }}" defer></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminAsset/plugins/jqvmap/jquery.vmap.min.js') }}" defer></script>
    <script src="{{ asset('adminAsset/plugins/jqvmap/maps/jquery.vmap.usa.js') }}" defer></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminAsset/plugins/jquery-knob/jquery.knob.min.js') }}" defer></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminAsset/plugins/moment/moment.min.js') }}" defer></script>
    <script src="{{ asset('adminAsset/plugins/daterangepicker/daterangepicker.js') }}" defer></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminAsset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}" defer>
    </script>
    <!-- Summernote -->
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminAsset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}" defer></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminAsset/dist/js/adminlte.js') }}" defer></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('adminAsset/dist/js/demo.js') }}" defer></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    @stack('scripts')


</body>

</html>
