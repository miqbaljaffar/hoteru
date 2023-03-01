<nav class="navbar navbar-expand-lg bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="/"><img src="/img/logo.png" style="max-width:90px"> <span class="h5 fw-bold fs-3"> DONQUIXOTE </span> </a>
    <a class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('index*') ? 'active' : ''}}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2 {{ Request::is('rooms*') ? 'active' : ''}} " href="/rooms">Rooms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2 {{ Request::is('facilities*') ? 'active' : ''}}" href="/facilities">Facilities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link me-2 {{ Request::is('about*') ? 'active' : ''}}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2 {{ Request::is('contact*') ? 'active' : ''}}" href="/contact">Contact</a>
        </li>

      </ul>
      <div class="d-flex">
        @if (!auth()->user())
        <a href="/login" class="btn btn-outline-dark shadow-none me-lg-3 me-2">Login</a>
        <a href="/register" class="btn btn-outline-dark shadow-none">Register</a>
        @else
        <div class="dropdown">
            <a href="#" class="btn btn-light shadow-none me-lg-3 me-2 dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static"><i class="bi bi-person-lines-fill " style="font-size:1.5rem"></i></a>
            <ul class="dropdown-menu" style="margin-top:10px; font-size:12px">
                @if(auth()->user()->is_admin == 1)
                <li><a class="dropdown-item" href="/dashboard">
                    <i class="bi bi-pc-display" style="font-size:15px"></i>&nbsp; My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                @endif
                <li><a class="dropdown-item mt-2 mb-2" href="/myaccount">
                    <i class="bi bi-person-vcard-fill" style="font-size:15px"></i> &nbsp;My account</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item mt-2 mb-2" href="/history">
                    <i class="bi bi-cart-check-fill" style="font-size:15px" aria-hidden="true"></i>&nbsp; history</a></li>
            </ul>
          </div>
        {{-- <form action="/logout" method="post">
        @csrf --}}
        <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal" class="btn btn-light border shadow-none" style="margin-top:7px">Logout</a>
            {{-- <button type="submit" class="btn btn-light border shadow-none" style="margin-top:7px">Logout</button> --}}
        {{-- </form> --}}
        @endif


        {{-- logout --}}
      </div>
    </div>
  </div>
</nav>
