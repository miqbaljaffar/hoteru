@extends('dashboard.layout.main')

@section('title')
    <title>Dashboard | Riwayat Pembayaran</title>
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Riwayat Pembayaran</h1>
        <p class="mb-4">Daftar pembayaran yang sudah diterima dan yang masih tertunda.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Pembayaran DP Diterima</h6>
                {{-- TAMBAHKAN TOMBOL INI --}}
                <a href="{{ route('dashboard.payments.export') }}" class="btn btn-sm btn-success shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Unduh Excel
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableDP" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Pelanggan</th>
                                <th>Transaksi ID</th>
                                <th>Jumlah</th>
                                <th>Metode</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pay as $p)
                                <tr>
                                    <td>{{ $p->invoice }}</td>
                                    <td>{{ $p->Customer->name ?? 'N/A' }}</td>
                                    <td>{{ $p->transaction_id }}</td>
                                    <td>Rp. {{ number_format($p->price) }}</td>
                                    <td>{{ $p->Methode->nama ?? 'N/A' }}</td>
                                    <td>{{ $p->created_at->isoformat('D MMMM Y') }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.payments.invoice', ['payment' => $p->id]) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Lihat Invoice
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Pembayaran Tertunda (Pending)</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTablePending" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Pelanggan</th>
                                <th>Transaksi ID</th>
                                <th>Jumlah</th>
                                <th>Metode</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pay1 as $p1)
                                <tr>
                                    <td>{{ $p1->invoice }}</td>
                                    <td>{{ $p1->Customer->name ?? 'N/A' }}</td>
                                    <td>{{ $p1->transaction_id }}</td>
                                    <td>Rp. {{ number_format($p1->price) }}</td>
                                    <td>{{ $p1->Methode->nama ?? 'N/A' }}</td>
                                    <td>{{ $p1->created_at->isoformat('D MMMM Y') }}</td>
                                    <td><span class="badge badge-warning">{{ $p1->status }}</span></td>
                                    <td>
                                        @if ($p1->image)
                                            <form action="{{ route('dashboard.payments.confirm') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $p1->id }}">
                                                <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                                            </form>
                                            <form action="{{ route('dashboard.payments.reject') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $p1->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                            </form>
                                        @else
                                            <span>Menunggu bukti</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
