<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <h1><a href="index.html">Vesperr</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link active" href="/">Home</a></li>
                <li><a class="nav-link" href="#">About</a></li>
                <li><a class="nav-link" href="#">Services</a></li>
                <li><a class="nav-link" href="#">Contact</a></li>

                @guest
                    <li>
                        <a class="getstarted login-btn" href="{{ route('login') }}">
                            {{ __('Login') }}
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
<!-- End Header -->
