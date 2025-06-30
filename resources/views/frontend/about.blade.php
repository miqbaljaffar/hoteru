@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | TENTANG KAMI</title>
@endsection

@section('content')

<div class="container mt-5 mb-5" style="margin-bottom: 100px;">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="/nyoba/images/about/room.png" width="70px">
                <h4 class="mt-3">{{ $stats['rooms'] }}+ ROOMS</h4>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="/nyoba/images/about/service.png" width="70px">
                <h4 class="mt-3">{{ $stats['customers'] }}+ CUSTOMERS</h4>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="/nyoba/images/about/transaction.png" width="70px">
                <h4 class="mt-3">{{ $stats['transactions'] }}+ TRANSACTIONS</h4>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5" style="margin-bottom: 100px;">
    <div class="row justify-content-between align-items-center">
        <div class="col-12 mb-4 text-center">
            <h3 class="mb-3">Tentang Kami</h3>
            <p>
                Aurora Haven adalah hotel modern yang didirikan pada tahun 2025,
                menawarkan kenyamanan dan fasilitas lengkap bagi setiap tamu.
                Mulai dari kamar yang luas dan elegan, hingga layanan terbaik
                yang membuat pengalaman menginap Anda semakin berkesan.
                Kami bangga memiliki lebih dari 20 kamar yang dirancang untuk
                memberikan kenyamanan maksimal, serta fasilitas unggulan seperti
                kolam renang pribadi, restaurant gym, spa, playground, semuanya untuk memanjakan Anda.
            </p>
        </div>

        <div class="col-12 d-flex justify-content-center gap-3 flex-wrap">
            <div class="about-img-box">
                <img src="/nyoba/images/carousel/hotel_pool.jpg" class="img-fluid rounded shadow" style="max-width: 300px;">
            </div>
            <div class="about-img-box">
                <img src="/nyoba/images/carousel/gym.jpg" class="img-fluid rounded shadow" style="max-width: 300px;">
            </div>
            <div class="about-img-box">
                <img src="/nyoba/images/carousel/spa.jpg" class="img-fluid rounded shadow" style="max-width: 300px;">
            </div>
        </div>
    </div>
</div>

@endsection
