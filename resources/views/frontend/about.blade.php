@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | Tentang Kami</title>
@endsection

@push('styles')
<style>
    .about-hero {
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/nyoba/images/carousel/hotel_exterior.jpg');
        background-size: cover;
        background-position: center;
        padding: 6rem 0;
        color: white;
    }
    .stat-card {
        transition: transform .2s ease-in-out;
    }
    .stat-card:hover {
        transform: translateY(-10px);
    }
</style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <div class="about-hero text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Tentang Aurora Haven</h1>
            <p class="lead">Menyajikan kenyamanan dan kemewahan sejak 2025.</p>
        </div>
    </div>

    <div class="container my-5">
        {{-- Stat Section --}}
        <div class="row text-center g-4 mb-5">
            <div class="col-lg-4 col-md-4">
                <div class="card border-0 shadow-sm p-4 stat-card">
                    <i class="bi bi-door-open-fill fs-1 text-success"></i>
                    <h3 class="mt-3">{{ $stats['rooms'] }}+</h3>
                    <p class="text-muted mb-0">Kamar Modern</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card border-0 shadow-sm p-4 stat-card">
                    <i class="bi bi-people-fill fs-1 text-success"></i>
                    <h3 class="mt-3">{{ $stats['customers'] }}+</h3>
                    <p class="text-muted mb-0">Pelanggan Puas</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card border-0 shadow-sm p-4 stat-card">
                     <i class="bi bi-wallet2 fs-1 text-success"></i>
                    <h3 class="mt-3">{{ $stats['transactions'] }}+</h3>
                    <p class="text-muted mb-0">Transaksi Berhasil</p>
                </div>
            </div>
        </div>

        {{-- About Text & Images --}}
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2 class="h-font">Kisah Kami</h2>
                <p>
                    Aurora Haven adalah hotel modern yang didirikan pada tahun 2025, menawarkan kenyamanan dan fasilitas lengkap bagi setiap tamu. Mulai dari kamar yang luas dan elegan, hingga layanan terbaik yang membuat pengalaman menginap Anda semakin berkesan.
                </p>
                <p>
                    Kami bangga memiliki lebih dari 20 kamar yang dirancang untuk memberikan kenyamanan maksimal, serta fasilitas unggulan seperti kolam renang pribadi, restoran, gym, spa, dan playground — semuanya untuk memanjakan Anda.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row g-2">
                    <div class="col-6">
                        <img src="/nyoba/images/carousel/hotel_pool.jpg" class="img-fluid rounded shadow w-100" style="height: 200px; object-fit: cover;">
                    </div>
                     <div class="col-6">
                        <img src="/nyoba/images/carousel/gym.jpg" class="img-fluid rounded shadow w-100" style="height: 200px; object-fit: cover;">
                    </div>
                     <div class="col-12">
                        <img src="/nyoba/images/carousel/spa.jpg" class="img-fluid rounded shadow w-100" style="height: 250px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
