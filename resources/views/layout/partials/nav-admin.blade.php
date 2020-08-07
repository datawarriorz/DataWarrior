<link rel="stylesheet" href="{{ asset('css/admin/master.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/navbar.css') }}" />
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
                    <a class="nav-link" href="/expertdashboard">
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
                    <a class="nav-link" href="#">
                        <p class="nav-link-header"><i class="fas fa-info-circle"></i> About Us</p>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav nav-right justify-content-end">
                @if(Auth::guard('admin')->check())

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle user-icon" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                        </a>
                        <div class="dropdown">
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item">
                                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
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
                                <a class="dropdown-item" href="/logoutadmin">
                                    <i class="fas fa-sign-out-alt"></i>Logout
                                </a>
                            </div>
                        </div>
                    </li>
                @endif

            </ul>
        </div>
    </nav>
    <hr class="seperator1">
</div>
