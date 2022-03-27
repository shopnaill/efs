<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" sizes="180x180"
        href="{{asset('images/logo-two.png')}}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{asset('images/logo-two.png')}}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{asset('images/logo-two.png')}}">
    <link rel="mask-icon" href="{{asset('images/logo-two.png')}}"
        color="#f9a63d">

    <meta name="msapplication-TileColor" content="#f9a63d">
    <meta name="theme-color" content="#f9a63d">

    <!-- Dependency Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/simple-line-icons.css') }}" type="text/css">



    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="{{ asset('css/css2') }}" rel="stylesheet">



    <script type="text/javascript" charset="UTF-8" src="{{ asset('js/common.js') }}"></script>
    <script type="text/javascript" charset="UTF-8" src="{{ asset('js/util.js') }}"></script>
</head>
</head>

<body id="home-version-5" class="home-version-4" data-style="default" data-new-gr-c-s-check-loaded="14.1054.0"
    data-gr-ext-installed="">
    <a href="#main_content" data-type="section-switch"
        class="return-to-top">
        <i class="fa fa-chevron-up"></i>
    </a>
    <div class="page-loader" style="display: none;">
        <div class="loader">
            <!-- Loader -->
            <div class="blobs">
                <div class="blob-center"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                <defs>
                    <filter id="goo">
                        <fegaussianblur in="SourceGraphic" stdDeviation="10" result="blur"></fegaussianblur>
                        <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo">
                        </fecolormatrix>
                        <feblend in="SourceGraphic" in2="goo"></feblend>
                    </filter>
                </defs>
            </svg>

        </div>
    </div>
    <!-- /.page-loader -->
    <div id="main_content">
        @include('layouts.navbar')
        @include('layouts.banner')
        @yield('content')
        @include('layouts.footer')
    </div>

    <!-- Dependency Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/countUp.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.parallax-scroll.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/gmap3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/js') }}"></script>


    <!-- Site Scripts -->
    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
