<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sensive Blog - @yield('title','Home')</title>
    <link rel="icon" href="{{asset('/')}}assets/frontend/img/Fevicon.png" type="image/png">

    <link rel="stylesheet" href="{{asset('/')}}assets/frontend/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/frontend/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/frontend/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/frontend/vendors/linericon/style.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/frontend/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/frontend/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="{{asset('/')}}assets/frontend/css/style.css">

    @stack('css')
</head>
<body>
@include('sweetalert::alert')
<!--================Header Menu Area =================-->
    @include('frontend.includes.header')
<!--================Header Menu Area =================-->

    @yield('content')
<!--================ Start Footer Area =================-->
    @include('frontend.includes.footer')
<!--================ End Footer Area =================-->

<script src="{{asset('/')}}assets/frontend/vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="{{asset('/')}}assets/frontend/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/frontend/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('/')}}assets/frontend/js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('/')}}assets/frontend/js/mail-script.js"></script>
<script src="{{asset('/')}}assets/frontend/js/main.js"></script>

@stack('js')
</body>
</html>
