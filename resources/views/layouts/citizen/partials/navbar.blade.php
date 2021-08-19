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
                <li><a class="nav-link" href="#">{{ __('About') }}</a></li>
                <li><a class="nav-link" href="#">{{ __('Services') }}</a></li>
                <li><a class="nav-link" href="#">{{ __('Contact') }}</a></li>

                @guest
                    <li style="margin-left: 15px;">
                        <a class="btn btn-dark btn-custom text-bold" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#loginToCCM">
                            {{ __('LOGIN') }}
                        </a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#">
                            <span>{{ __('Profile') }}</span>
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <li><a href="#">{{ __('Profile') }}</a></li>
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
