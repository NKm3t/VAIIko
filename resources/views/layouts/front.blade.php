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

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Style -->
    <link href="/Frontend/CSS/bootstrap5.css" rel="stylesheet" />
    <link href="/Frontend/CSS/custom.css" rel="stylesheet" />
    <link href="/Frontend/CSS/owl.carousel.min.css" rel="stylesheet" />
    <link href="/Frontend/CSS/owl.theme.default.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
        a{
            text-decoration: none;
            color: #000;
        }
    </style>

</head>
<body>
    @include('layouts.inc.frontnavbar')

        <div class="conta">
            @yield('content')
        </div>


    <!-- Scripts -->
    <script src="/Frontend/js/bootstrap.bundle.min.js"></script>
    <script src="/Frontend/js/jquery-3.6.1.min.js"></script>
    <script src="/Frontend/js/owl.carousel.min.js"></script>
    <script src="/Frontend/js/custom.js"></script>

    @yield('scripts')
</body>
</html>
