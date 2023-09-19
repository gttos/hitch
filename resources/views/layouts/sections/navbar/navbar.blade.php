@php
    $containerNav = $containerNav ?? 'container-fluid';
    $navbarDetached = ($navbarDetached ?? '');

@endphp

        <!-- Navbar -->
@if(isset($navbarDetached) && $navbarDetached == 'navbar-detached')
    <nav class="layout-navbar {{$containerNav}} navbar navbar-expand-xl {{$navbarDetached}} align-items-center bg-navbar-theme"
         id="layout-navbar">
        @endif
        @if(isset($navbarDetached) && $navbarDetached == '')
            <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="{{$containerNav}}">
                    @endif

                    <!--  Brand demo (display only for navbar-full and hide on below xl) -->
                    @if(isset($navbarFull))
                        <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
                            <a href="{{url('/')}}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    @include('template._partials.macros',["width"=>25,"withbg"=>'#696cff'])
                                </span>
                                <span class="app-brand-text demo menu-text fw-bolder">{{config('variables.templateName')}}</span>
                            </a>
                        </div>
                    @endif

                    <!-- ! Not required for layout-without-menu -->
                    @if(!isset($navbarHideToggle))
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ?' d-xl-none ' : '' }}">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>
                    @endif
                    @guest()
                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        <span class="align-middle">Registrar</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        <span class="align-middle">Login</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endguest
                    @auth()
                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <!-- User -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                       data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                                 class="w-px-40 h-auto rounded-circle">
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar avatar-online">
                                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                                                 class="w-px-40 h-auto rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <span class="fw-semibold d-block">Luis Miguel</span>
                                                        <small class="text-muted">Admin</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('auth.user-edit', \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()) }}">
                                                <i class="bx bx-user me-2"></i>
                                                <span class="align-middle">Mi Cuenta</span>
                                            </a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="dropdown-item">
                                                    <i class='bx bx-power-off me-2'></i>
                                                    <span class="align-middle">Log Out</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ User -->
                            </ul>
                        </div>
                    @endauth
                    @if(!isset($navbarDetached))
                </div>
                @endif
            </nav>
            <!-- / Navbar -->
