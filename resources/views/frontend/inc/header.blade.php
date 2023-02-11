<nav class="navbar navbar-expand-lg bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="/">TJ HOTEL</a>
    <a class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="/rooms">Rooms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="/facilities">Facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="/contact">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="/about">About</a>
        </li>

      </ul>
      <div class="d-flex">
        @if (!auth()->user())
        <a href="/login" class="btn btn-outline-dark shadow-none me-lg-3 me-2">Login</a>
        <a href="/register" class="btn btn-outline-dark shadow-none">Register</a>
        @else
        <form action="/logout" method="post">
        @csrf
            <button type="submit" class="btn btn-outline-dark shadow-none">Logout</button>
        </form>
        @endif
      </div>
    </div>
  </div>
</nav>
