<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Aurora Haven</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Interface</div>

    <li class="nav-item {{ Request::is('dashboard/rooms*') || Request::is('dashboard/statuses*') || Request::is('dashboard/types*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Inner</h6>
                <a class="collapse-item" href="{{ route('dashboard.rooms.index') }}">Room</a>
                <a class="collapse-item" href="{{ route('dashboard.statuses.index') }}">Status Room</a>
                <a class="collapse-item" href="{{ route('dashboard.types.index') }}">Type Room</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('dashboard/users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.users.index') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>User</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Addons</div>

    <li class="nav-item {{ Request::is('dashboard/orders*') || Request::is('dashboard/payments*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pesan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Order now:</h6>
                <a class="collapse-item" href="{{ route('dashboard.orders.index') }}">Order</a>
                <h6 class="collapse-header">Data Transactions:</h6>
                <a class="collapse-item" href="{{ route('dashboard.payments.history') }}">History Payment</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
