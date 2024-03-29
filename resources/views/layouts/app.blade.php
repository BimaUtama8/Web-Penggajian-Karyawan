<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <title> Dashboards | Penggajian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.html') }}">
    <link href="{{ asset('home/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('home/libs/swiper/swiper.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Layout config Js -->
    <script type="text/javascript" charset="utf8" src="{{ asset('home/js/layout.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script> --}}
    <script type="text/javascript" charset="utf8" src="{{ asset('/DataTables/datatables.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/DataTables/datatables.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Icons Css -->
    <link href="{{ asset('home/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('home/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('home/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="layout-wrapper">

        @include('layouts.navbar')

        @include('layouts.sidebar')

        <div class="vertical-overlay"></div>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('home/libs/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('home/libs/node-waves/node-waves.min.js') }}"></script>
    <script src="{{ asset('home/libs/feather-icons/feather-icons.min.js') }}"></script>
    <script src="{{ asset('home/js/pages/plugins/lord-icon-2.1.0.min.js') }}"></script>
    <script src="{{ asset('home/js/plugins.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> --}}
    <!-- apexcharts -->
    <script src="{{ asset('home/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('home/libs/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('home/libs/swiper/swiper.min.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ asset('home/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <script src="{{ asset('home/js/app.min.js') }}"></script>
    <!-- list js init -->
    <script src="{{ asset('home/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ asset('home/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ asset('home/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>
    <script src="{{ asset('home/js/pages/listjs.init.js') }}"></script>
    <script src="{{ asset('home/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset("home/libs/particles.js/particles.js.min.js") }}"></script>
    <script src="{{ asset("home/js/pages/particles.app.js") }}"></script>
    <script src="{{ asset("home/js/pages/password-addon.init.js") }}"></script>
</body>
@stack('script')
</html>
