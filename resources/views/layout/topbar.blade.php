<nav class="navbars">
    <a href="#" class="navbars-logo">Kenangan<span>Senja</span>.</a>
    <div class="navbars-nav">
        <a href="#home">home</a>
        <a href="#about">Tentang kami</a>
        <a href="#fasilitas">fasilitas</a>
        <a href="#contact"> Kontak</a>
        @if (Auth::check() == true)
        @if (auth()->user()->is_admin)
        <a href="/dashboard"> Dash</a>
        @endif
        @endif
    </div>

    <div class="nav-item dropdown">
        @if (Auth::check() == true )
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown"
        role="button" data-bs-toggle="dropdown" aria-expanded="false"> Welcome back {{ auth()->user()->username }} &nbsp; <i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu dropdown-menu-dark w-100 mt-3" aria-labelledby="navbarDropdown">
            @if(auth()->user()->is_admin == 1)
        <li><a class="dropdown-item mt-2 mb-2" href="/dashboard">
            <i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; My Dashboard</a></li>
        <li><hr class="dropdown-divider"></li>
            @endif
        <li><a class="dropdown-item mt-2 mb-2" href="/my-account">
            <i class="fa fa-id-card-o" aria-hidden="true"></i> &nbsp;My account</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item mt-2 mb-2" href="/history">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp; My Order</a></li>
        <li><hr class="dropdown-divider"></li>

        <li>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item mt-2 mb-2">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                </button>
            </form>
        </li>
        </ul>
        @else
        <a href="/login"> LOGIN </a>
        <a href="/register"> REGISTER </a>
        @endif
        {{-- <a href="#" id="hamburger-menus"> <i data-feather="menus"></i></a> --}}
    </div>
</nav>
