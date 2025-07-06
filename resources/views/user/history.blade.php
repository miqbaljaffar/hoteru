@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | Riwayat Pesanan</title>
@endsection

@section('content')
<div class="container my-5">
    <div class="row">
        {{-- Sidebar Profil --}}
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card border-0 shadow-sm text-center">
                <div class="card-body">
                    <img src="{{ $user->image ? asset('storage/' . $user->image) : '/img/default-user.jpg' }}"
                         alt="avatar"
                         class="rounded-circle img-fluid mb-3"
                         style="width: 120px; height: 120px; object-fit: cover;">
                    <h4 class="mb-0">{{ $user->Customer->name }}</h4>
                    <p class="text-muted">Riwayat Pesanan Anda</p>
                </div>
            </div>
        </div>

        {{-- Daftar Riwayat --}}
        <div class="col-lg-8 col-md-12">
            @forelse ($his as $h)
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div>
                                <h5 class="card-title fw-bold">Invoice #{{ $h->invoice }}</h5>
                                <p class="card-text text-muted mb-2">Tanggal Pesan: {{ $h->created_at->format('d M Y') }}</p>
                                <p class="card-text fw-bold">Total: IDR {{ number_format($h->price) }}</p>
                            </div>
                            <div class="text-md-end mt-3 mt-md-0">
                                @php
                                    $statusClass = 'bg-secondary';
                                    $statusText = $h->status;
                                    if ($h->status == 'Success') {
                                        $statusClass = 'bg-success';
                                    } elseif ($h->status == 'Pending' && $h->image == null) {
                                        $statusClass = 'bg-danger';
                                        $statusText = 'Menunggu Pembayaran';
                                    } elseif ($h->status == 'Pending' && $h->image != null) {
                                        $statusClass = 'bg-warning text-dark';
                                        $statusText = 'Menunggu Konfirmasi';
                                    }
                                @endphp
                                <span class="badge rounded-pill {{ $statusClass }} p-2 mb-3">{{ $statusText }}</span>

                                <div class="d-grid gap-2 d-md-block">
                                    @if ($h->status == 'Pending' && $h->image == null)
                                        <a href="{{ route('payment.form', ['transaction' => $h->transaction_id]) }}" class="btn btn-danger btn-sm">Bayar Sekarang</a>
                                    @endif
                                    <a href="/invoice/{{ $h->id }}" class="btn btn-outline-dark btn-sm">Lihat Invoice</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center">
                    Anda belum memiliki riwayat pesanan.
                </div>
            @endforelse

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-4">
                {!! $his->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
