@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | Upload Bukti Pembayaran</title>
@endsection

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold h-font">Konfirmasi Pembayaran</h2>
        <p class="text-muted">Upload bukti pembayaran untuk menyelesaikan pesanan Anda.</p>
    </div>
    <div class="row justify-content-center g-4">
        {{-- Detail Transfer --}}
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                 <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Detail Transfer</h5>
                </div>
                <div class="card-body">
                    <p>Silakan lakukan transfer ke rekening berikut:</p>
                    <div class="alert alert-success">
                        <h4 class="alert-heading">{{ $pay->Methode->nama }}</h4>
                        <p class="fs-5 fw-bold mb-0">{{ $pay->Methode->no_rek }}</p>
                        <hr>
                        <p class="mb-0">Atas Nama: PT Aurora Haven Sejahtera</p>
                    </div>
                     <p class="fw-bold mt-4">Total yang harus dibayar:</p>
                     <p class="fs-4 text-danger fw-bold">IDR {{ number_format($price) }}</p>
                     <p class="small text-muted">Pastikan Anda mentransfer jumlah yang sama persis.</p>
                </div>
            </div>
        </div>

        {{-- Form Upload --}}
         <div class="col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                 <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Upload Bukti</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $pay->id }}">
                        <div class="mb-3">
                            <label for="image" class="form-label">Pilih file bukti transfer (maks: 3MB)</label>
                            <input class="form-control" type="file" name="image" id="image" required>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Kirim Bukti Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
