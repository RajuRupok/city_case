<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            {{-- <h1><a href="/">CCM</a></h1> --}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/">
                <img src="{{ asset('frontend/assets/img/CCM_Logo.svg') }}" alt="" class="img-fluid">
            </a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link {{ Route::is('homepage') ? 'active' : '' }}" href="/">{{ __('Home') }}</a></li>
                <li><a class="nav-link {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">{{ __('About') }}</a></li>
                <li><a class="nav-link {{ Route::is('service') ? 'active' : '' }}" href="{{ route('service') }}">{{ __('Services') }}</a></li>
                <li><a class="nav-link {{ Route::is('case') ? 'active' : '' }}" href="{{ route('case') }}">{{ __('Completed Cases') }}</a></li>
                <li><a class="nav-link {{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">{{ __('Contact') }}</a></li>

                @auth
                    @if (auth()->user()->role == 'citizen')
                        <li class="dropdown {{ Request::is('citizen/case*') ? 'active' : '' }}">
                            <a href="javascript:void(0);">
                                <span>{{ __('Cases') }}</span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('citizen.case.index') }}" class="{{ Request::is('citizen/case') ? 'active' : '' }} {{ Request::is('citizen/case/details*') ? 'active' : '' }}">
                                        {{ __('My Cases') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('citizen.case.create') }}" class="{{ Request::is('citizen/case/create*') ? 'active' : '' }}">
                                        {{ __('Create New Case') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif                    
                @endauth

                @guest
                    <li style="margin-left: 15px;">
                        <a class="btn btn-dark btn-custom text-bold" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#loginToCCM">
                            {{ __('LOGIN') }}
                        </a>
                    </li>
                @else
                    <li class="dropdown {{ Request::is('citizen/profile*') ? 'active' : '' }}">
                        <a href="javascript:void(0);">
                            <span>{{ auth()->user()->name }}</span>
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('citizen.profile.index') }}" class="{{ Request::is('citizen/profile*') ? 'active' : '' }}">
                                    {{ __('My Profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>
@include('auth.login')
<!-- End Header -->
