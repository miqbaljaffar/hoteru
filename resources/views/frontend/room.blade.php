@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | {{ $room->type->name }} #{{ $room->no }}</title>
@endsection

@push('styles')
<style>
    .room-gallery .swiper-slide img {
        height: 55vh;
        object-fit: cover;
    }
    .booking-card {
        top: 100px; /* Sesuaikan dengan tinggi header Anda */
    }
    .list-group-item i {
        width: 25px;
    }
</style>
@endpush

@section('content')
<div class="container my-5">
    <div class="row g-4">
        {{-- Kolom Kiri: Galeri & Detail Kamar --}}
        <div class="col-lg-8">
            {{-- Galeri Gambar --}}
            <div class="swiper swiper-container room-gallery mb-4 rounded shadow">
                <div class="swiper-wrapper">
                    @if ($room->images->count() > 0)
                        @foreach ($room->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $image->image) }}" class="w-100 d-block">
                            </div>
                        @endforeach
                    @else
                        <div class="swiper-slide">
                            <img src="/img/default_room.jpg" class="w-100 d-block">
                        </div>
                    @endif
                </div>
                <div class="swiper-pagination"></div>
            </div>

            {{-- Informasi Detail --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="h-font">{{ $room->type->name }} #{{ $room->no }}</h2>
                    <p class="text-muted">{{ $room->info }}</p>

                    <hr>

                    <h5 class="mb-3">Fasilitas Kamar</h5>
                    <div class="row">
                        {{-- Contoh data fasilitas --}}
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0"><i class="bi bi-wifi text-success"></i> Wifi Kecepatan Tinggi</li>
                                <li class="list-group-item border-0"><i class="bi bi-tv-fill text-success"></i> TV Layar Datar 42"</li>
                                <li class="list-group-item border-0"><i class="bi bi-snow text-success"></i> Air Conditioner</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                             <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0"><i class="bi bi-cup-hot-fill text-success"></i> Pemanas Air</li>
                                <li class="list-group-item border-0"><i class="bi bi-safe-fill text-success"></i> Brankas Pribadi</li>
                                <li class="list-group-item border-0"><i class="bi bi-person-fill text-success"></i> Kapasitas: {{ $room->capacity }} Orang</li>
                            </ul>
                        </div>
                    </div>

                    <hr>

                    <h5 class="mb-3">Kebijakan Akomodasi</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0"><i class="bi bi-box-arrow-in-right text-success"></i> <strong>Check-in:</strong> Setelah 14:00</li>
                        <li class="list-group-item border-0"><i class="bi bi-box-arrow-left text-success"></i> <strong>Check-out:</strong> Sebelum 12:00</li>
                        <li class="list-group-item border-0"><i class="bi bi-slash-circle-fill text-danger"></i> <strong>Merokok:</strong> Dilarang di dalam kamar</li>
                        <li class="list-group-item border-0"><i class="bi bi-currency-dollar text-danger"></i> <strong>Denda Keterlambatan:</strong> Rp 100.000/jam</li>
                    </ul>

                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Kartu Pemesanan --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm sticky-top booking-card">
                <div class="card-body">
                    <h5 class="card-title text-success fw-bold">IDR {{ number_format($room->price) }} <span class="text-muted fw-normal">/ malam</span></h5>
                    <hr>
                    <form action="/order" method="POST">
                        @csrf
                        <input type="hidden" name="room" value="{{ $room->id }}">
                        {{-- Jika user login, customer id akan terisi otomatis --}}
                        @auth
                            <input type="hidden" name="customer" value="{{ auth()->user()->customer->id }}">
                        @endauth

                        <div class="mb-3">
                            <label class="form-label">Check-in</label>
                            <input type="date" class="form-control shadow-none" name="from" value="{{ $request->from ?? '' }}" required>
                        </div>
                         <div class="mb-3">
                            <label class="form-label">Check-out</label>
                            <input type="date" class="form-control shadow-none" name="to" value="{{ $request->to ?? '' }}" required>
                        </div>
                        <div class="d-grid">
                            @auth
                                <button type="submit" class="btn btn-dark btn-lg">Pesan Sekarang</button>
                            @else
                                <a href="/login" class="btn btn-dark btn-lg">Login untuk Memesan</a>
                            @endauth
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
