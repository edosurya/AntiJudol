<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ config('app.name') }} login" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="{{ asset('frontend/images/used/logo/favicon.png') }}"> -->

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    {{-- Form assets css --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/toastr/toastr.min.css') }}" />
    <link href="{{ asset('admin/assets/css/loading.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/validation.css') }}" rel="stylesheet" type="text/css" />
    {{-- end form assets css --}}

    <style>
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

        a.btn-custom,
        input.btn-custom {
            font-size: 13px;
            color: #222;
            letter-spacing: 3px;
            line-height: normal;
            text-decoration: none;
            text-transform: uppercase;
            padding: 7px 25px 7px 25px;
            background: #ec167f;
            display: inline-block;
        }

        a.btn-custom:hover {
            color: #222;
            opacity: .8;
        }
    </style>
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        @yield('content')
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    {{-- // form ajax resource --}}
    <script src="{{ asset('admin/assets/js/helpers/submitForm.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/toastr/toastr.min.js') }}"></script>
    {{-- form ajax resource --}}

    @stack('script')

    <script>
        $(document).ready(function() {
            $('#submitForm').submit(function(event) {
                event.preventDefault();
                let form = $(this);
                submitForm({
                    form: form,
                    modal: null,
                    datatable: null,
                    customArray: []
                })
            });
        });
    </script>
</body>

</html>
