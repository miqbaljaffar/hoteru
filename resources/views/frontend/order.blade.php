@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | Konfirmasi Pesanan</title>
@endsection

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold h-font">Konfirmasi Pesanan Anda</h2>
        <p class="text-muted">Satu langkah lagi untuk menyelesaikan pemesanan Anda.</p>
    </div>

    <div class="row justify-content-center g-4">
        {{-- Detail Pesanan --}}
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Detail Pesanan</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <strong class="col-4">Kamar:</strong>
                        <div class="col-8">{{ $room->type->name }} #{{ $room->no }}</div>
                    </div>
                     <div class="row mb-2">
                        <strong class="col-4">Harga per Malam:</strong>
                        <div class="col-8">IDR {{ number_format($room->price) }}</div>
                    </div>
                    <hr>
                    <div class="row mb-2">
                        <strong class="col-4">Check-in:</strong>
                        <div class="col-8">{{ Carbon\Carbon::parse($stayfrom)->isoformat('dddd, D MMMM Y') }}</div>
                    </div>
                    <div class="row mb-2">
                        <strong class="col-4">Check-out:</strong>
                        <div class="col-8">{{ Carbon\Carbon::parse($stayuntil)->isoformat('dddd, D MMMM Y') }}</div>
                    </div>
                     <div class="row mb-2">
                        <strong class="col-4">Lama Menginap:</strong>
                        <div class="col-8">{{ $dayDifference }} Malam</div>
                    </div>
                    <hr>
                     <div class="row fw-bold fs-5">
                        <strong class="col-4">Total Biaya:</strong>
                        <div class="col-8 text-success">IDR {{ number_format($total) }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Pembayaran & Data Pelanggan --}}
        <div class="col-lg-5">
             <div class="card border-0 shadow-sm">
                 <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Data Pelanggan & Pembayaran</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $customer->name }}</p>
                    <p><strong>NIK:</strong> {{ $customer->nik ?? '-' }}</p>
                    <hr>
                    <form method="POST" action="{{ route('order.store') }}">
                        @csrf
                        <input type="hidden" name="customer" value="{{ $customer->id }}">
                        <input type="hidden" name="room" value="{{ $room->id }}">
                        <input type="hidden" name="check_in" value="{{ $stayfrom }}">
                        <input type="hidden" name="check_out" value="{{ $stayuntil }}">
                        <input type="hidden" name="total_price" value="{{ $total }}">

                        <div class="mb-3">
                            <label for="paymentmethod" class="form-label">Metode Pembayaran</label>
                            <select name="payment_method_id" class="form-select" id="paymentmethod">
                                @foreach ($paymentmet as $pay)
                                    <option value="{{ $pay->id }}">{{ $pay->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Lanjutkan ke Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
