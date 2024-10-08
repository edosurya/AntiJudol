<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <title>@yield('meta_title')</title>
    <!-- <link rel="shortcut icon" href="{{ asset('frontend/images/used/logo/favicon.png') }}" type="image/x-icon"> -->
    <!-- <link rel="icon" href="{{ asset('frontend/images/used/logo/favicon.png') }}" type="image/x-icon"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="ai ,artificial intelligence, indosat, indonesia ai day 2024">
    <meta property="og:title" content="@yield('meta_title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:keywords" content="ai ,artificial intelligence, indosat, indonesia ai day 2024">


    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('frontend/css/bootstrap-grid.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-grid">
    <link href="{{ asset('frontend/css/bootstrap-reboot.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-reboot">



    @stack('css-plugin') {{-- Asset URL Plugin Javascript --}}

    @stack('style') {{-- Css Code --}}

    <style>


        p,
        span {
            font-family: "IndosatSansRegular-Regular", sans-serif;
        }

        @font-face {
            font-family: "IndosatBold-Bold";
            src: url("{{ asset('frontend/fonts/indosat/IndosatBold-Bold.woff') }}") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "IndosatMedium-Medium";
            src: url("{{ asset('frontend/fonts/indosat/IndosatMedium-Medium.woff2') }}") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "IndosatSansRegular-Regular";
            src: url('{{ asset('frontend/fonts/indosatSans/IndosatSansRegular-Regular.woff2') }}') format('woff2');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "IndosatSansBold-Bold";
            src: url('{{ asset('frontend/fonts/indosatSans/IndosatSansBold-Bold.woff2') }}') format('woff2');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        .indosat_bold {
            font-family: 'IndosatBold-Bold', sans-serif !important;
        }

        .indosat_medium {
            font-family: 'indosatMedium-Medium', sans-serif !important;
        }

        .indosat_body {
            font-family: "IndosatSansRegular-Regular", sans-serif !important;
        }

        .indosat_bold_body {
            font-family: "IndosatSansBold-Bold", sans-serif !important;
        }

        .form-control {
            padding: 0.7rem !important
        }

        label {
            margin-bottom: 0.7rem !important
        }

        .button-26 {
            background: var(--head-text);
            /* background: #02141f; */
            /* border: 2px solid var(--head-text); */
            border: 2px solid #02141f;
            cursor: pointer;
            border-radius: 35px;
            outline: none;
            padding: 0;
            box-shadow: 0 2px 10px #32ebeb43, 5px 14px 20px #32ebeb43;
            transition: all 0.1s ease-in-out;
        }

        .button-secondary {

            background: #02141f;
            /* background: #02141f; */
            /* border: 2px solid var(--head-text); */
            border: 2px solid var(--head-text);
            cursor: pointer;
            border-radius: 35px;
            outline: none;
            padding: 0;
            box-shadow: 0 2px 1px #32ebeb43, 5px 1px 20px #32ebeb43;
            transition: all 0.1s ease-in-out;
        }

        .button-secondary__content {
            padding: 10px 20px;
            border-radius: 23px;
            line-height: 10px;
            box-shadow: inset -2px 0px #32ebeb3c, -2px -2px #32ebeb3c;
            transition: all 0.1s ease-in-out;
        }

        .button-secondary__text {
            /* color: var(--head-text); */
            color: var(--head-text);
            display: block;
            transform: translate3d(0, -4px, 0);
            transition: all 0.1s ease-in-out;
            line-height: normal;
        }

        .button-26__content {
            padding: 10px 20px;
            border-radius: 23px;
            line-height: 10px;
            box-shadow: inset -2px 0px #32ebeb3c, -2px -2px #32ebeb3c;
            transition: all 0.1s ease-in-out;
        }

        .button-26__text {
            /* color: var(--head-text); */
            font-family: 'IndosatBold-Bold', sans-serif !important;
            color: #02141f;
            display: block;
            transform: translate3d(0, -4px, 0);
            transition: all 0.1s ease-in-out;
            line-height: normal;
        }

        .button-26:active {
            box-shadow: none;
        }

        .button-26:active .button-26__content {
            box-shadow: none;
        }

        .button-26:active .button-26__text {
            transform: translate3d(0, 0, 0);
        }

        .head_text_color {
            color: #33C9BD !important;
        }


        .primary_text_color {
            color: var(--primary-color-1) !important;
        }


        #banner {
            height: 100vh !important;
        }

        @media (max-width: 575.98px) {
            .button-26__content {
                padding: 5px 10px;
            }

            .button-secondary__content {
                padding: 5px 10px;
            }
        }

        @media (min-width: 1024px) {
            #mainmenu li>ul {
                width: 70px !important;
                top: 67px !important;
                left: 5px !important;
            }

            #mainmenu li li a {
                width: 70px !important;
            }
        }

        @media (max-width: 1157) {
            #logo {
                display: none !important
            }
        }

        #mainmenu li a:after,
        #mainmenu li li a:hover,
        #mainmenu li:hover>a {
            color: rgb(255, 255, 255) !important;
            background: rgb(87, 254, 193) !important;
            background: -moz-linear-gradient(270deg, rgba(87, 254, 193, 1) 30%, rgba(79, 160, 240, 1) 100%) !important;
            background: -webkit-linear-gradient(270deg, rgba(87, 254, 193, 1) 30%, rgba(79, 160, 240, 1) 100%) !important;
            background: linear-gradient(270deg, rgba(87, 254, 193, 1) 30%, rgba(79, 160, 240, 1) 100%) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ec008c", endColorstr="#ffc805", GradientType=1);
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;

            text-shadow: 0px 3px 20px rgba(87, 254, 193, 1) !important;
        }

        #section-schedule {
            background: rgb(1, 11, 27);
        }

        .sticky-info {
            position: -webkit-sticky;
            position: sticky;
            bottom: 0;
            z-index: 1;
            /* background-color: #ff007a; */
            /* Bright pink background */
            color: white;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
        }

        .sticky-info span {
            font-size: 12px;
        }

        /* .sticky-info .btn {
            border-radius: 5px;
            font-size: 14px;
        } */

        .sticky-info .btn-primary {
            background-color: #00c8c8;
            border-color: #00c8c8;
        }

        .sticky-info .btn-primary:hover {
            background-color: #009999;
            border-color: #009999;
        }

        .gradient-color-text {
            background: rgb(87, 254, 193);
            background: -moz-linear-gradient(270deg, rgba(87, 254, 193, 1) 30%, rgba(79, 160, 240, 1) 100%);
            background: -webkit-linear-gradient(270deg, rgba(87, 254, 193, 1) 30%, rgba(79, 160, 240, 1) 100%);
            background: linear-gradient(270deg, rgba(87, 254, 193, 1) 30%, rgba(79, 160, 240, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ec008c", endColorstr="#ffc805", GradientType=1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

        }

        .gradient-color {
            background: rgb(236, 0, 140);
            background: -moz-linear-gradient(270deg, rgba(236, 0, 140, 1) 30%, rgba(255, 200, 5, 1) 100%);
            background: -webkit-linear-gradient(270deg, rgba(236, 0, 140, 1) 30%, rgba(255, 200, 5, 1) 100%);
            background: linear-gradient(270deg, rgba(236, 0, 140, 1) 30%, rgba(255, 200, 5, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ec008c", endColorstr="#ffc805", GradientType=1);
            transition: all 0.1s ease-in-out !important;
        }

        .gradient-color:hover {
            background: rgb(236, 0, 140) !important;
            transition: all 0.1s ease-in-out !important;
            background: -moz-linear-gradient(90deg, rgba(236, 0, 140, 1) 30%, rgba(255, 200, 5, 1) 100%) !important;
            background: -webkit-linear-gradient(90deg, rgba(236, 0, 140, 1) 30%, rgba(255, 200, 5, 1) 100%) !important;
            background: linear-gradient(90deg, rgba(236, 0, 140, 1) 30%, rgba(255, 200, 5, 1) 100%) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ec008c", endColorstr="#ffc805", GradientType=1) !important;
        }

        .text-sm {
            font-size: 14px;
        }

        .text-md {
            font-size: 16px;
        }

        .text-lg {
            font-size: 18px;
        }

        .text-lg {
            font-size: 20px;
        }

        .col-button-banner {
            margin-top: 20px !important
        }


        #section-why-visit .spacer-why-visit-custom {
            width: 100%;
            height: 240px;
            display: block;
            clear: both;
        }

        #section-speakers .text-xs {
            font-size: 18px !important
        }

        #menu-btn:hover {
            background: none !important;
        }

        #menu-btn:before {
            color: #fff !important
        }

        #menu-btn.clicked:before,
        #menu-btn.unclick:before {
            color: #fff !important
        }

        .modal-fullscreen {
            width: auto !important;
        }

        .navbarCustom {
            height: 30px !important;
        }

        #reservationCompleteModal .customImage {
            width: 40% !important;
        }

        @media only screen and (max-width: 768px) {
            .sticky-info span {
                font-size: 65%;
            }

            .sticky-info button {
                padding-top: 1px !important;
                padding-bottom: 1px !important;
            }

            .sticky-info .text-xs {
                font-size: 65%;
            }

            .unleashText {
                font-size: 22px !important;
            }

            .subUnleashText {
                font-size: 14px !important;
            }

            .sub {
                width: 100% !important
            }

            .head {
                width: 50% !important;
                margin-top: 0px !important;
            }

            .responsive_name_card {
                min-height: 16vh !important;
                height: 16vh !important
            }

            #btn-section-banner {
                /* width: 100% !important; */
                margin-top: 10px !important;
            }

            #btn-section-banner span {
                font-size: 14px !important;
                /* padding: 5px 10px !important; */
            }

            .col-button-banner {
                margin-top: 0 !important;
            }

            #section-why-visit .spacer-why-visit-custom {
                width: 100%;
                height: 60px;
                display: block;
                clear: both;
            }

            .navbarCustom {
                height: 45px !important;
            }
        }

        @media only screen and (max-width: 425px) {
            .sticky-info span {
                font-size: 65%;
            }

            .sticky-info button {
                padding-top: 1px !important;
                padding-bottom: 1px !important;
            }

            .sticky-info .text-xs {
                font-size: 60%;
            }

            .unleashText {
                font-size: 22px !important;
            }

            .subUnleashText {
                font-size: 14px !important;
            }

            .sub {
                width: 100% !important
            }

            .head {
                width: 80% !important;
                margin-top: 0px !important;
            }

            .responsive_name_card {
                min-height: 16vh !important;
                height: 16vh !important
            }

            #btn-section-banner {
                width: 100% !important;
                margin-top: 10px !important;
            }

            #btn-section-banner span {
                font-size: 14px !important;
                /* padding: 5px 10px !important; */
            }

            .col-button-banner {
                margin-top: 0 !important;
            }

            #section-speakers .text-sm {
                font-size: 14px !important;
            }


            #section-why-visit .spacer-why-visit-custom {
                width: 100%;
                height: 120px;
                display: block;
                clear: both;
            }

            #section-why-visit .spacer-single-custom {
                height: 10px !important;
            }

            #section-speakers .text-xs {
                font-size: 14px !important
            }

            .navbarCustom {
                height: 45px !important;
            }
        }

        @media only screen and (max-width: 320px) {
            #btn-section-banner span {
                font-size: 12px !important;
            }

            .sticky-info .text-xs {
                font-size: 62%;
            }

            .sticky-info>.container {
                padding: 0 !important;
                /* margin-left: 3px !important; */
            }

            #section-speakers .text-sm {
                font-size: 12px !important;
            }

            #section-speakers .text-xs {
                font-size: 12px !important
            }

            .navbarCustom {
                height: 45px !important;
            }

            #reservationCompleteModal .customImage {
                width: 100% !important;
            }
        }
    </style>
</head>

<body id="homepage" class="de_light">

    <div id="wrapper">

        <!-- header begin -->

        @yield('header')
        <!-- header close -->


        <!-- content begin -->
        <div id="content" class="no-bottom no-top">

            @yield('content')

            @include('components.frontend.modal-privacy-policy')
            @include('components.frontend.modal-terms-condition')

        </div>
    </div>
    @yield('sticky')



    <div id="de-overlay"></div>

    <!-- Javascript Files
    ================================================== -->

    <script src="{{ asset('frontend/js/plugins.js') . '?v=' . autoVersioning('frontend/js/plugins.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.3/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('frontend/js/designesia.js') . '?v=' . autoVersioning('frontend/js/designesia.js') }}"></script>
    <script src="{{ asset('frontend/js/validation.js') . '?v=' . autoVersioning('frontend/js/validation.js') }}"></script>
    {{-- 
    
    <script src="{{ asset('frontend/js/particles.js')}}"></script>
    <script src="{{ asset('frontend/js/particles-settings.js')}}"></script> --}}
    {{-- <script src="{{ asset('frontend/js/countdown-custom.js') }}"></script> --}}


    @stack('js-plugin') {{-- Asset URL Plugin Javascript --}}

    @stack('script') {{-- Javascript Code --}}

    <script>
        function showSticky() {
            $('.sticky-info').show();
        }
    </script>
</body>

</html>
