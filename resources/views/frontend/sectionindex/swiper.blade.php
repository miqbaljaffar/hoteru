<div class="container-fluid px-0">
    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
            @php
                $slides = [
                    ['image' => 'hotel_exterior.jpg', 'title' => 'Selamat Datang di Aurora Haven', 'subtitle' => 'Pengalaman menginap yang tak terlupakan menanti Anda.'],
                    ['image' => 'presidential_room.jpg', 'title' => 'Kamar Presidensial', 'subtitle' => 'Kemewahan dan kenyamanan di tingkat tertinggi.'],
                    ['image' => 'hotel_pool.jpg', 'title' => 'Fasilitas Terbaik', 'subtitle' => 'Nikmati kolam renang dan fasilitas modern lainnya.'],
                ];
            @endphp

            @foreach ($slides as $slide)
                <div class="swiper-slide">
                    {{-- Overlay Gelap --}}
                    <div class="swiper-overlay"></div>
                    <img src="/nyoba/images/carousel/{{ $slide['image'] }}" class="w-100 d-block" style="height: 60vh; object-fit: cover;" alt="{{ $slide['title'] }}" loading="lazy">
                    {{-- Teks di atas Gambar --}}
                    <div class="swiper-caption text-center text-white">
                        <h1 class="fw-bold">{{ $slide['title'] }}</h1>
                        <p class="d-none d-sm-block">{{ $slide['subtitle'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<style>
    .swiper-slide {
        position: relative; /* Diperlukan agar caption bisa diposisikan absolut */
    }
    .swiper-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4); /* Overlay gelap transparan */
        z-index: 1;
    }
    .swiper-caption {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        width: 80%;
    }
</style>
