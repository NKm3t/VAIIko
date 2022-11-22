<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!--       Fonts and icons       -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Style -->
    <link href="/Frontend/CSS/bootstrap5.css" rel="stylesheet" />
    <link href="/Frontend/CSS/custom.css" rel="stylesheet" />
    <link href="/Frontend/CSS/owl.carousel.min.css" rel="stylesheet" />
    <link href="/Frontend/CSS/owl.theme.default.min.css" rel="stylesheet" />
    <style>
        a{
            color: #000;
        }
    </style>

</head>
<body>
    @include('layouts.inc.frontnavbar')
    <div class="g-sidenav-show ">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="/Frontend/js/bootstrap.bundle.min.js"></script>
    <script src="/Frontend/js/jquery-3.6.1.min.js"></script>
    <script src="/Frontend/js/owl.carousel.min.js"></script>

    @yield('scripts')
</body>
</html>
