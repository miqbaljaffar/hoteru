@extends('dashboard.layout.main')

@section('title')
    <title>Dashboard | All Payment</title>
@endsection

@section('content')
    <!-- Content Row -->
    <div class="container-fluid">
        <!-- Pending Payments -->
        <div class="card shadow border-0 mb-4">
            <div class="card-header">
                <h5>Payment Status <span style="color:red">Pending</span></h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">
                    <table class="table table-striped table-bordered table-responsive" id="myTable">
                        <thead>
                            <tr>
                                <th width="4%">#</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">Kamar</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Bukti</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pay1 as $p)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $p->Customer->name }}</td>
                                    <td class="text-center">{{ $p->Transaction->Room->no }}</td>
                                    <td class="text-center">IDR {{ number_format($p->price) }}</td>
                                    <td class="text-center">{{ $p->created_at->isoformat('D MMMM Y') }}</td>
                                    <td class="text-center">
                                        @if ($p->image)
                                            <a href="{{ asset('storage/' . $p->image) }}">Lihat bukti</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($p->status == 'Pending' && $p->image == null)
                                            Tunggu Bukti Pembayaran
                                        @elseif ($p->status == 'Pending' && $p->image != null)
                                            <form action="{{ route('dashboard.payments.confirm') }}" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $p->id }}">
                                                <button class="badge bg-primary border-0"
                                                    onclick="return confirm('Are you sure to Confirm this?')">
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <form action="/dashboard/payment/tolak" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $p->id }}">
                                                <button class="badge bg-danger border-0"
                                                    onclick="return confirm('Are you sure to Reject this?')">
                                                    <span>Tolak</span>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="4%">#</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">Kamar</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Bukti</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Success Payments -->
        <div class="card shadow">
            <div class="card-header">
                <h5>Payment Status <span style="color:green">Success</span></h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">
                    <table class="table table-striped table-bordered table-responsive" id="myTable1">
                        <thead>
                            <tr>
                                <th width="4%">#</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">Kamar</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pay as $p)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $p->Customer->name }}</td>
                                    <td class="text-center">{{ $p->Transaction->Room->no }}</td>
                                    <td class="text-center">IDR {{ number_format($p->price) }}</td>
                                    <td class="text-center">{{ $p->created_at->isoformat('D MMMM Y') }}</td>
                                    <td class="text-center">{{ $p->status }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('dashboard.payments.invoice', $p->id) }}">
                                            <i class="fas fa-file-invoice"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="4%">#</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">Kamar</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
