<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">KAMAR KAMI</h2>
<div class="container">
    <div class="row">
        @foreach ($rooms as $r)
            <div class="col-lg-4 col-md-6 my-3">
                <a href="/rooms/{{ $r->no }}" class="text-decoration-none text-dark">
                    <div class="card border-0 shadow-sm h-100 room-card">
                        @if ($r->images->count() > 0)
                            <img src="{{ asset('storage/' . $r->images[0]->image) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Gambar {{ $r->type->name }}">
                        @else
                            <img src="/nyoba/images/rooms/1.jpg" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Gambar Default">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $r->type->name }} #{{ $r->no }}</h5>
                            <h6 class="mb-3 text-success">IDR {{ number_format($r->price) }}/malam</h6>
                            <div class="features mb-3">
                                <h6 class="mb-1">Kapasitas</h6>
                                <span class="badge bg-light text-dark text-wrap">{{ $r->capacity }} Orang</span>
                            </div>
                            <div class="mt-auto text-end">
                                <span class="btn btn-dark btn-sm">Lihat Detail</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-5">
        <a href="/rooms" class="btn btn-outline-dark fw-bold shadow-none">Lihat Semua Kamar &raquo;</a>
    </div>
</div>

<style>
    .room-card {
        transition: transform .2s ease-in-out, box-shadow .2s ease-in-out;
    }
    .room-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
</style>
