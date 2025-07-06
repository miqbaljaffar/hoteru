@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | Cari Kamar</title>
@endsection

@section('content')
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">KAMAR KAMI</h2>
        <p class="h5 mt-3 text-center text-muted">{{ $roomsCount }} Kamar Tersedia</p>
    </div>

    <div class="container-fluid">
        <div class="row">

            {{-- Kolom Filter --}}
            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow sticky-top" style="top: 80px;">
                    <div class="container-fluid flex-lg-column align-items-stretch p-3">
                        <h4 class="mt-2 d-none d-lg-block">Filter</h4>
                        {{-- Tombol untuk Tampilan Mobile --}}
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="filterDropdown" aria-expanded="false" aria-label="Toggle navigation">
                           <span>FILTER PENCARIAN</span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <form action="/rooms" method="GET">
                                {{-- Filter Ketersediaan --}}
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-3" style="font-size: 18px;">Ketersediaan</h5>
                                    <label class="form-label" style="font-weight: 500;">Check-in</label>
                                    <input type="date" name="from" class="form-control shadow-none mb-3" value="{{ $request->from ?? '' }}">
                                    <label class="form-label" style="font-weight: 500;">Check-out</label>
                                    <input type="date" name="to" class="form-control shadow-none" value="{{ $request->to ?? '' }}">
                                </div>
                                {{-- Filter Jumlah Tamu --}}
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-3" style="font-size: 18px;">Jumlah Tamu</h5>
                                    <div class="me-2">
                                        <label class="form-label" style="font-weight: 500;">Orang</label>
                                        <input type="number" name="count" class="form-control shadow-none" min="1" value="{{ $request->count ?? 1 }}">
                                    </div>
                                </div>
                                <button class="btn btn-dark w-100 shadow-none" type="submit">Cari</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>

            {{-- Kolom Daftar Kamar --}}
            <div class="col-lg-9 col-md-12">
                @forelse ($rooms as $r)
                    <div class="card mb-4 border-0 shadow-sm room-card-hover">
                        <div class="row g-0">
                            {{-- Gambar Kamar --}}
                            <div class="col-md-4">
                                @if ($r->images->count() > 0)
                                    <img src="{{ asset('storage/' . $r->images[0]->image) }}" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Gambar {{ $r->type->name }}">
                                @else
                                    <img src="/img/default_room.jpg" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Gambar Default">
                                @endif
                            </div>
                            {{-- Detail Kamar --}}
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column h-100">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">{{ $r->type->name }} #{{ $r->no }}</h5>
                                        <h6 class="text-success fw-bold">IDR {{ number_format($r->price) }}/malam</h6>
                                    </div>

                                    <div class="d-flex flex-wrap my-2">
                                        <span class="badge bg-light text-dark text-wrap me-2 mb-2">Kapasitas: {{ $r->capacity }} orang</span>
                                    </div>

                                    <h6 class="mt-2">Fasilitas Utama</h6>
                                    <div class="d-flex flex-wrap mb-3">
                                        <span class="badge rounded-pill bg-light text-dark text-wrap me-2 mb-2">Wifi</span>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap me-2 mb-2">AC</span>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap me-2 mb-2">TV</span>
                                        @if ($r->capacity > 10)
                                            <span class="badge rounded-pill bg-light text-dark text-wrap me-2 mb-2">Pemanas Ruangan</span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap me-2 mb-2">Ruang Merokok</span>
                                        @endif
                                    </div>

                                    {{-- Tombol Aksi --}}
                                    <div class="mt-auto d-flex justify-content-end align-items-center">
                                         @if ($request->from)
                                            <form action="/order" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="room" value="{{ $r->id }}">
                                                <input type="hidden" name="from" value="{{ $request->from }}">
                                                <input type="hidden" name="to" value="{{ $request->to }}">
                                                <button class="btn btn-dark shadow-none">Pesan Sekarang</button>
                                            </form>
                                        @else
                                            <a href="/rooms/{{ $r->no }}" class="btn btn-dark shadow-none">Pesan Sekarang</a>
                                        @endif
                                        <a href="/rooms/{{ $r->no }}" class="btn btn-outline-dark shadow-none ms-2">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning text-center" role="alert">
                      Tidak ada kamar yang tersedia dengan filter tersebut.
                    </div>
                @endforelse

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {!! $rooms->appends(request()->except('page'))->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<style>
    .room-card-hover {
        transition: transform .2s ease-in-out, box-shadow .2s ease-in-out;
    }
    .room-card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
</style>
@endpush
