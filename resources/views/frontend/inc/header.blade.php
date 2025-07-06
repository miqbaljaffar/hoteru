<nav class="navbar navbar-expand-lg navbar-dark fixed-top px-lg-3 py-lg-2 shadow-sm
    {{ Request::is('/') ? '' : 'navbar-solid' }}">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center fw-bold fs-3" href="/">
            <img src="/img/logo.png" style="height: 1.5em;" class="me-2">
            <span>Aurora Haven</span>
        </a>
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end align-items-center flex-grow-1 pe-3">
                    <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : ''}}" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('rooms*') ? 'active' : ''}}" href="/rooms">Kamar</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('facilities*') ? 'active' : ''}}" href="/facilities">Fasilitas</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('contact*') ? 'active' : ''}}" href="/contact">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('about*') ? 'active' : ''}}" href="/about">Tentang Kami</a></li>

                    @guest
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-5"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                             @if(auth()->user()->is_admin)
                                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                            @endif
                            <li><a class="dropdown-item" href="/myaccount"><i class="bi bi-person-fill me-2"></i>Akun Saya</a></li>
                            <li><a class="dropdown-item" href="/history"><i class="bi bi-clock-history me-2"></i>Riwayat Pesanan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
