<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta content="" name="description" /> --}}
    {{-- <meta content="" name="title" /> --}}

    <!-- App favicon -->
    <title>{{config('app.name')}} | @yield('title')</title>
    <!-- <link rel="shortcut icon" href="{{ asset('frontend/images/used/logo/favicon.png') }}" type="image/x-icon"> -->
    <!-- <link rel="icon" href="{{ asset('frontend/images/used/logo/favicon.png') }}" type="image/x-icon"> -->

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @stack('css-plugin') {{-- Asset URL Plugin Javascript --}}

    @stack('style') {{-- Css Code --}}

</head>


<body data-sidebar="dark">
    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('components.admin.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('components.admin.sidebar')

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content mb-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                @yield('breadcrumb')
                            </div>
                        </div>
                    </div>
                    <!-- start page title -->
                    @yield('content')
                    <!-- end page title -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('components.admin.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">

            <div class="rightbar-title d-flex align-items-center px-3 py-4">

                <h5 class="m-0 me-2">Pengaturan Tampilan</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Pilih Tampilan</h6>

            <div class="p-4">
                {{-- <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="">
                    </div> --}}
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>
                {{-- 
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="">
                    </div> --}}
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="admin/assets/css/bootstrap-dark.min.css" data-appStyle="admin/assets/css/bootstrap-dark.min.css" />
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    @stack('js-plugin') {{-- Asset URL Plugin Javascript --}}

    @stack('script') {{-- Javascript Code --}}

    <script>
        $(document).ready(function() {
            $('#logoutBtn').on('click', function() {
                $('#logout').trigger('submit')
            });

            $('.btn-link').on('click', function() {
                var collapseElement = $(this).siblings('.accordion-collapse');
                var isCollapsed = collapseElement.hasClass('collapse');

                if (isCollapsed) {
                    collapseElement.show();
                    collapseElement.removeClass('collapse');
                    $(this).find('.fas').removeClass('fa-plus-square').addClass('fa-minus-square');
                } else {
                    collapseElement.hide();
                    collapseElement.addClass('collapse');
                    $(this).find('.fas').removeClass('fa-minus-square').addClass('fa-plus-square');
                }
            })
        });
    </script>
</body>

</html>
