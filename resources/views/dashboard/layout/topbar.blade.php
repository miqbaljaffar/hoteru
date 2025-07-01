<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<ul class="navbar-nav ml-auto">

    {{-- Search Dropdown (Mobile) --}}
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    {{-- Alerts Dropdown --}}
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>

            @php
                // Ambil notifikasi yang belum dibaca
                $unreadNotifications = App\Models\Notifications::where('status', 'unread')
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();

                $countUnread = App\Models\Notifications::where('status', 'unread')->count();

                // Ekstrak ID pembayaran dari data notifikasi
                $paymentIds = $unreadNotifications->map(function ($notification) {
                    $url = json_decode($notification->data)->url;
                    $parts = explode('pay/', $url);
                    return isset($parts[1]) ? trim($parts[1]) : null;
                })->filter();

                // Eager load payments dengan relasi transaction untuk menghindari N+1 query
                $payments = App\Models\Payment::with('transaction')
                    ->whereIn('id', $paymentIds)
                    ->get()
                    ->keyBy('id');
            @endphp

            <span class="badge badge-danger badge-counter">{{ $countUnread }}</span>
        </a>

        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Alerts Center</h6>

            @forelse ($unreadNotifications as $notification)
                @php
                    $data = json_decode($notification->data);
                    $url = $data->url;
                    $parts = explode('pay/', $url);
                    $paymentId = isset($parts[1]) ? trim($parts[1]) : null;
                    $pay = $payments->get($paymentId);

                    $messageParts = explode('.', $data->message);
                    $trimmedMessage = trim($messageParts[0]);
                @endphp

                @if ($pay && $pay->transaction)
                    <form action="{{ $url }}" method="get">
                        @csrf
                        <input type="hidden" name="nid" value="{{ $notification->id }}">
                        <button class="a dropdown-item d-flex align-items-center" type="submit">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">
                                    {{ $notification->created_at->diffForHumans() }},
                                    {{ $notification->created_at->isoFormat('MMM D, Y') }}
                                </div>
                                <span class="font-weight-bold">{{ $trimmedMessage }}</span>

                                @php
                                    $checkin = Carbon\Carbon::parse($pay->transaction->check_in)->format('d M Y');
                                    $checkout = Carbon\Carbon::parse($pay->transaction->check_out)->format('d M Y');
                                @endphp

                                <div class="small text-gray-500">
                                    | Invoice {{ $pay->invoice }} | Total IDR {{ number_format($pay->price) }} | {{ $checkin }} - {{ $checkout }} |
                                </div>
                            </div>
                        </button>
                    </form>
                @endif
            @empty
                <a class="dropdown-item text-center small text-gray-500" href="#">No new notifications</a>
            @endforelse

            <a class="dropdown-item text-center small text-black-500" href="#">Show All Alerts</a>
            <a class="dropdown-item text-center small text-black-500" href="/dashboard/markall">Mark ALL as Read</a>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    {{-- User Information Dropdown --}}
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, {{ Auth::user()->username }}!</span>
            <i class="fa fa-user-circle img-profile rounded-circle fa-lg mt-3 me-2" aria-hidden="true"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="/">
                <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                Halaman Utama
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>
