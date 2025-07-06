<div class="bg-light py-5">
    <div class="container">
        <h2 class="mb-5 text-center fw-bold h-font">FASILITAS KAMI</h2>
        <div class="row justify-content-center g-4">
            @php
                // Data fasilitas ini sekarang disamakan dengan yang ada di halaman fasilitas
                $facilities = [
                    ['name' => 'Kolam Renang', 'image' => '/frontend/img/fasilitas/hotel_pool.jpg'],
                    ['name' => 'Restoran', 'image' => '/frontend/img/fasilitas/restaurant.jpg'],
                    ['name' => 'Spa & Wellness', 'image' => '/frontend/img/fasilitas/spa.jpg'],
                    ['name' => 'Gym', 'image' => '/frontend/img/fasilitas/gym.jpg'],
                    ['name' => 'Billiard', 'image' => '/frontend/img/fasilitas/biliard.jpg'],
                    ['name' => 'Playground', 'image' => '/frontend/img/fasilitas/playground.jpg'],
                ];
            @endphp

            @foreach ($facilities as $facility)
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="text-center bg-white rounded shadow-sm p-4 facility-item">
                        {{-- Path gambar diubah menjadi seperti ini --}}
                        <img src="{{ $facility['image'] }}" width="60px" alt="{{ $facility['name'] }}">
                        <h6 class="mt-3">{{ $facility['name'] }}</h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .facility-item {
        transition: transform .2s ease-in-out, background-color .2s ease-in-out;
        border-top: 4px solid transparent;
    }
    .facility-item:hover {
        transform: translateY(-5px);
        border-top-color: var(--teal); /* Ganti dengan warna tema Anda */
    }
</style>
