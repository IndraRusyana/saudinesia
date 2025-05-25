<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.ico">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Brygada+1918:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/user/fonts/icomoon/style.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/user/fonts/flaticon/font/flaticon.css')}}"> --}}

    <link rel="stylesheet" href="{{asset('assets/user/css/tiny-slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/aos.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/user/css/flatpickr.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/user/css/glightbox.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/custom.css')}}">

    <script src="https://kit.fontawesome.com/71cd5983fb.js" crossorigin="anonymous"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <title>@yield('title')</title>

<body>

    <!-- Navbar -->
    @include('components.user.navbar', ['home' => $home])
    <!-- Navbar -->

    @yield('content')

    <!-- footer -->
    @include('components.user.footer')
    <!-- footer -->

    <script src="{{asset('assets/user/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/user/js/tiny-slider.js')}}"></script>
    <script src="{{asset('assets/user/js/aos.js')}}"></script>
    <script src="{{asset('assets/user/js/navbar.js')}}"></script>
    <script src="{{asset('assets/user/js/counter.js')}}"></script>
    <script src="{{asset('assets/user/js/rellax.js')}}"></script>
    {{-- <script src="{{asset('assets/user/js/flatpickr.js')}}"></script>
    <script src="{{asset('assets/user/js/glightbox.min.js')}}"></script> --}}
    <script src="{{asset('assets/user/js/custom.js')}}"></script>
</body>
