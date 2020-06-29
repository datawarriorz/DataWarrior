<link rel="stylesheet" href="./css/navbar.css">


<div class="navbar-container">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#"><img class="navbar-brand-img" alt="Logo" class="nav-img"
                src="./images/logo.png" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <p class="nav-link-header">HOME</p>
                    </a>
                </li>
                <li class="nav-item navli">
                    <a class="nav-link" href="#">
                        <p class="nav-link-header">SERVICES</p>
                    </a>
                </li>
                <li class="nav-item navli">
                    <a class="nav-link" href="#">
                        <p class="nav-link-header">ABOUT US</p>
                    </a>
                </li>
                <li class="nav-item navli">
                    <a class="nav-link" href="#">
                        <p class="nav-link-header">CONTACT</p>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav nav-right justify-content-end">
                @guest
                <li class="nav-item">
                    <a class="nav-link-right" href="{{ route('login') }}"><button type="button"
                            class="btn navbtn">LOGIN</button></a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link-right" href="{{ route('register') }}"><button type="button"
                            class="btn navbtn">REGISTER</button></a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                    </a>


                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item" href="/profile" onclick="event.preventDefault();
                                document.getElementById('profile').submit();">
                            Profile
                        </a>
                        <form id="profile" action="/profile" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>