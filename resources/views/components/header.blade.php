<header id="page-topbar">
    <div class="container">
        <div class="navbar-header p-0">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box" style="width: auto!important">
                    <a href="{{ route('index') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('images/todo-logo.png') }}" alt="" height="45">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('images/todo-logo.png') }}" alt="" height="50">
                        </span>
                    </a>
                </div>

                <button type="button"
                    class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                    data-toggle="collapse" data-target="#topnav-menu-content">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>

            <div class="d-flex">
                @auth
                    <div class="d-inline-block">
                        <a href="{{ route('create') }}">
                            <button type="button" class="btn header-item waves-effect">
                                <i class="mdi mdi-new-box ml-1"></i> Add New Todo
                            </button>
                        </a>
                    </div>
                @endauth
                <div class="dropdown d-inline-block">
                    @guest
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset('images/user.png') }}"
                                alt="Header Avatar">
                            <span class="d-xl-inline-block ml-1" key="t-henry">Guest</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">

                            @if (Route::has('login'))
                                <a class="dropdown-item" href="{{ route('login') }}"><i
                                        class="bx bx-log-in font-size-16 align-middle mr-1"></i> <span
                                        key="t-login">{{ __('Login') }}</span></a>
                            @endif

                            @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}"><i
                                        class="bx bx-log-in font-size-16 align-middle mr-1"></i> <span
                                        key="t-login">{{ __('Register') }}</span></a>
                            @endif
                        </div>

                    @else
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset('images/user.png') }}"
                                alt="Header Avatar">
                            <span class="d-xl-inline-block ml-1"
                                key="t-{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">

                            <a class="dropdown-item" href="{{ route('finished') }}"><i
                                    class="mdi mdi-check-circle font-size-16 align-middle mr-1"></i> <span
                                    key="t-login">{{ __('Finished Todo') }}</span></a>
                            <a class="dropdown-item" href="{{ route('unfinished') }}"><i
                                    class="mdi mdi-checkbox-blank font-size-16 align-middle mr-1"></i> <span
                                    key="t-login">{{ __('Unfinished Todo') }}</span></a>
                            {{-- <a class="dropdown-item" href="{{ route('profile') }}"><i
                                    class="mdi mdi-account font-size-16 align-middle mr-1"></i> <span
                                    key="t-login">{{ __('Profile') }}</span></a> --}}

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                                <span key="t-logout">{{ __('Logout') }}</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>
