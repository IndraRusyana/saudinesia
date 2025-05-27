<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link href="{{asset('assets/admin/vendor/fontawesome/css/fontawesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendor/fontawesome/css/solid.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendor/fontawesome/css/brands.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/master.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendor/flagiconcss/css/flag-icon.min.css')}}" rel="stylesheet">
</head>

<body>
    
    @yield('content')

    <script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/chartsjs/Chart.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/dashboard-charts.js')}}"></script>
    <script src="{{asset('assets/admin/js/script.js')}}"></script>
</body>

</html>
