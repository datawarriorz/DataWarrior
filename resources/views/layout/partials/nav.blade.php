<link rel="stylesheet" href="{{ asset('css/main/master.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/navbar.css') }}" />
<div class="navbar-container">
    <nav class="navbar navbar-expand-lg">

        <a class="navbar-brand" href="/"><img class="navbar-brand-img" alt="Logo" class="nav-img"
                src="{{ asset('images/logo2.png') }}" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item-left">
                    <a class="nav-link" href="/">
                        <p class="nav-link-header"><i class="fas fa-home"></i> Home</p>
                    </a>
                </li>
                <li class="nav-item-left navli">
                    <a class="nav-link" href="#">
                        <p class="nav-link-header"><i class="fas fa-wrench"></i> Services</p>
                    </a>
                </li>
                <li class="nav-item-left navli">
                    <a class="nav-link" href="/contact">
                        <p class="nav-link-header"><i class="fas fa-phone-alt"></i> Contact</p>
                    </a>
                </li>
                <li class="nav-item-left navli">
                    <a class="nav-link" href="/faq">
                        <p class="nav-link-header"><i class="fas fa-info-circle"></i> FAQ</p>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav nav-right justify-content-end">
                @guest
                <li class="nav-item-right">
                    <a class="nav-link-right" href="{{ route('login') }}">
                        <button type="button" class="btn navbtn">Sign-In
                        </button>
                    </a>
                </li>
                @if(Route::has('register'))
                <li class="nav-item-right">
                    <a class="nav-link-right" href="{{ route('register') }}"><button type="button"
                            class="btn navbtn">Register</button></a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="dropdown-toggle user-icon" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </a>
                            <a class="dropdown-item" href="/viewprofile">
                                <i class="fas fa-user-circle"></i> Profile
                            </a>
                            <a class="dropdown-item" href="/">
                                <i class="fas fa-clipboard-list"></i> My Applications
                            </a>
                            <a class="dropdown-item" href="/viewprofile">
                                <i class="fas fa-user-cog"></i> Settings
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
    {{-- <hr class="seperator1"> --}}
    @guest
    @else
    @if(Auth::user()->email_verified_at == null)
    <div class="nav-message text-center">
        <a class="" href="{{ route('verifymail') }}">
            Email not verified! Click here to verify ></i>
        </a>
    </div>
    @endif
    @endguest
</div>