<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ninico</title>
    <meta name="Ninico" content="Household marketplace">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}assets/img/logo/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('/')}}assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/animate.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/slick.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/nice-select.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/spacing.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/main.css">
</head>

<body>

    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->
    @include('frontend.includes.header')
    <main>
        @yield('body')
    </main>
    @include('frontend.includes.footer')

</body>

</html>