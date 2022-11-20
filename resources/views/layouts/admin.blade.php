<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dekorácie Lussy</title>


    <!-- Scripts -->
    <script src="/Admin/js/popper.min.js"></script>
    <script src="/Admin/js/bootstrap.min.js"></script>
    <script src="/Admin/js/perfect-scrollbar.min.js"></script>
    <script src=/Admin/js/smooth-scrollbar.min.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/Admin/js/material-dashboard.min.js"></script>


    <!--       Fonts and icons       -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="/Admin/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/Admin/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Style -->
    <link href="/Admin/css/material-dashboard.css" rel="stylesheet" />
    <link href="/Admin/css/custom.css" rel="stylesheet" />

</head>
<body>

    <div class="g-sidenav-show ">
        @include('layouts.inc.sidebar')

        <div class="main-content">
            @include('layouts.inc.adminnav')

            <div class="container-fluid">
                @yield('content')
            </div>

            @include('layouts.inc.adminfooter')
        </div>
    </div>

    @yield('scripts')
</body>
</html>
