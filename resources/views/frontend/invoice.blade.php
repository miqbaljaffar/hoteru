@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | Invoice #{{ $p->invoice }}</title>
@endsection

@push('styles')
<style>
    .invoice-header {
        background-color: #f8f9fa;
    }
    .invoice-body {
        font-size: 0.95rem;
    }
    .invoice-table th {
        font-weight: 600;
    }
    @media print {
        body > *:not(#invoice-wrapper) {
            display: none !important;
        }
        #invoice-wrapper {
            display: block !important;
            margin: 0;
            padding: 0;
        }
        .invoice-card {
            box-shadow: none !important;
            border: none !important;
        }
    }
</style>
@endpush

@section('content')
<div class="container my-5" id="invoice-page">
    <div class="row">
        {{-- Kolom Aksi --}}
        <div class="col-12 text-end mb-4">
            <button onclick="window.print()" class="btn btn-dark"><i class="bi bi-printer-fill me-2"></i>Cetak</button>
            {{-- Tombol download bisa ditambahkan jika ada fungsionalitasnya --}}
            {{-- <a href="#" class="btn btn-success"><i class="bi bi-download me-2"></i>Unduh PDF</a> --}}
        </div>

        {{-- Konten Invoice --}}
        <div class="col-12" id="invoice-wrapper">
            <div class="card border-0 shadow-sm invoice-card">
                <div class="card-body p-4 p-md-5">
                    {{-- Header Invoice --}}
                    <div class="row align-items-center mb-5">
                        <div class="col-sm-6">
                            <img src="/img/logo.png" style="height: 40px;" alt="Aurora Haven Logo">
                            <span class="fs-4 fw-bold ms-2">Aurora Haven</span>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <h2 class="mb-0">INVOICE</h2>
                            <p class="text-muted mb-0">#{{ $p->invoice }}</p>
                        </div>
                    </div>

                    {{-- Informasi Pengirim & Penerima --}}
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="fw-bold">Ditagihkan Kepada:</h6>
                            <p class="mb-0">{{ $p->transaction->customer->name }}</p>
                            <p class="mb-0">{{ $p->transaction->customer->address }}</p>
                            <p class="mb-0">{{ $p->transaction->customer->user->email }}</p>
                        </div>
                        <div class="col-sm-6 text-sm-end mt-3 mt-sm-0">
                             <h6 class="fw-bold">Detail Pembayaran:</h6>
                             <p class="mb-0"><strong>Tanggal Invoice:</strong> {{ $p->created_at->format('d M Y') }}</p>
                             <p class="mb-0"><strong>Status:</strong>
                                @if ($p->status == 'Pending')
                                    <span class="badge bg-warning text-dark">{{ $p->status }}</span>
                                @else
                                    <span class="badge bg-success">{{ $p->status }}</span>
                                @endif
                             </p>
                        </div>
                    </div>

                    {{-- Tabel Item --}}
                    <div class="table-responsive invoice-body">
                        <table class="table invoice-table">
                            <thead class="table-light">
                                <tr>
                                    <th>Deskripsi</th>
                                    <th class="text-center">Lama Menginap</th>
                                    <th class="text-end">Harga per Malam</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>Pemesanan Kamar {{ $p->transaction->room->type->name }} #{{ $p->transaction->room->no }}</strong><br>
                                        <small class="text-muted">
                                            Check-in: {{ Carbon\Carbon::parse($p->transaction->check_in)->isoformat('D MMM Y') }} |
                                            Check-out: {{ Carbon\Carbon::parse($p->transaction->check_out)->isoformat('D MMM Y') }}
                                        </small>
                                    </td>
                                    <td class="text-center">{{ $p->transaction->check_in->diffInDays($p->transaction->check_out) }} Malam</td>
                                    <td class="text-end">IDR {{ number_format($p->transaction->room->price) }}</td>
                                    <td class="text-end">IDR {{ number_format($p->price) }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td class="text-end"><strong>Subtotal</strong></td>
                                    <td class="text-end">IDR {{ number_format($p->price) }}</td>
                                </tr>
                                <tr class="fs-5 text-success">
                                    <td colspan="2"></td>
                                    <td class="text-end fw-bold">Grand Total</td>
                                    <td class="text-end fw-bold">IDR {{ number_format($p->price) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    {{-- Catatan Kaki --}}
                    <hr>
                    <div class="text-center text-muted">
                        <p>Terima kasih telah memilih Aurora Haven. Kami berharap dapat melayani Anda kembali.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
