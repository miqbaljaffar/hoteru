@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | Fasilitas Hotel Kami</title>
@endsection

@push('styles')
<style>
    .facility-card {
        transition: transform .2s ease-in-out, box-shadow .2s ease-in-out;
        border: none;
    }
    .facility-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.1)!important;
    }
</style>
@endpush

@section('content')
<div class="my-5 px-4 text-center">
  <h2 class="fw-bold h-font">FASILITAS KAMI</h2>
  <div class="h-line bg-dark mx-auto"></div>
  <p class="text-muted mt-3">Nikmati berbagai fasilitas premium yang kami sediakan untuk kenyamanan Anda.</p>
</div>

<div class="container mb-5">
  <div class="row g-4">
    {{-- Contoh data fasilitas, idealnya ini dari database --}}
    @php
        $facilities = [
            ['name' => 'Kolam Renang', 'image' => '/frontend/img/fasilitas/hotel_pool.jpg', 'desc' => 'Kolam renang luas untuk dewasa dan anak-anak.'],
            ['name' => 'Restoran', 'image' => '/frontend/img/fasilitas/restaurant.jpg', 'desc' => 'Sajian kuliner lokal dan internasional.'],
            ['name' => 'Spa & Wellness', 'image' => '/frontend/img/fasilitas/spa.jpg', 'desc' => 'Relaksasi total dengan terapis profesional kami.'],
            ['name' => 'Gym', 'image' => '/frontend/img/fasilitas/gym.jpg', 'desc' => 'Pusat kebugaran dengan peralatan modern.'],
            ['name' => 'Billiard', 'image' => '/frontend/img/fasilitas/biliard.jpg', 'desc' => 'Area permainan untuk hiburan santai.'],
            ['name' => 'Playground', 'image' => '/frontend/img/fasilitas/playground.jpg', 'desc' => 'Area bermain yang aman dan menyenangkan untuk anak-anak.'],
        ];
    @endphp

    @foreach ($facilities as $facility)
    <div class="col-lg-4 col-md-6">
      <div class="card shadow-sm facility-card h-100">
        <img src="{{ $facility['image'] }}" class="card-img-top" style="height: 200px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">{{ $facility['name'] }}</h5>
          <p class="card-text">{{ $facility['desc'] }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
