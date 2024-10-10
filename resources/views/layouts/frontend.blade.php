<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="30">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <title>@yield('meta_title')</title>
    <meta name="robots"content="all">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/heroes/hero-5/assets/css/hero-5.css">
    
    <meta name="theme-color" content="#ffffff">

    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="vivo, vivo award">
    <meta property="og:title" content="@yield('meta_title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:keywords" content="vivo, vivo award">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->

    @vite(['resources/sass/theme.scss'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style type="text/css">
        html, body {
          height: 100%;
          margin: 0;
        }
        .main{
          min-height: 100%;
        }
    </style>
    
    @stack('css-plugin') {{-- Asset URL Plugin Javascript --}}

    @stack('style') {{-- Css Code --}}

</head>

<body>
    @if(env('APP_ENV') == 'production')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8SL2HV2"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main bg-black" id="top">

        @include('components.frontend.nav')

        @yield('hero')
        
        @yield('content')
    </main>

    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('frontend/js/lasles/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/lasles/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/lasles/vendors/is/is.min.js') }}"></script>

    @stack('js-plugin') {{-- Asset URL Plugin Javascript --}}

    @stack('script') {{-- Javascript Code --}}

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>   
        AOS.init(); 
    </script>

  </body>

</html>
