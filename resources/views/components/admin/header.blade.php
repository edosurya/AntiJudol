<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">

                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('frontend/images/used/logo.webpa') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('frontend/images/used/logo.webpa') }}" alt="" height="17">
                    </span>
                </a>

                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('frontend/images/used/logo.webpa') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('frontend/images/used/logo.webpa') }}" alt="" height="18">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-theme-light-dark"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted mx-3">{{ Auth::user()->name }}</span>
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=FFFFFF&background=2b3a4a"
                        alt="user" class="rounded-circle header-profile-user" style="object-fit:cover !important;">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{route('admin.profile.edit')}}"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item " id="logoutBtn" style="cursor: pointer"><i
                            class="mdi mdi-power font-size-17 text-muted align-middle me-1"></i>
                        Keluar</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                        </form>
                </div>
            </div>
        </div>
    </div>
</header>
