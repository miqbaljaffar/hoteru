@extends('frontend.inc.main')
@section('title') <title>DONQUIXOTE | TENTANG KAMI</title> @endsection

@section('content')

<div class="container mt-5 mb-5" style="margin-bottom:100px">
    <div class="row d-flex justify-content-center">
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="/nyoba/images/about/hotel.svg" width="70px">
        <h4 class="mt-3">{{$r }}+ ROOMS</h4>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="/nyoba/images/about/customers.svg" width="70px">
        <h4 class="mt-3">{{$c}}+ CUSTOMERS</h4>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="/nyoba/images/about/t.png" width="70px">
            <h4 class="mt-3">{{ $t }}+ TRANSACTIONS</h4>
        </div>
    </div>

</div>
</div>


<div class="container mt-5 mb-5" style="margin-bottom:100px">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-5 mb-4 justify order-lg-1 order-md-1 order-2 text-center mt-4 mt-lg-0 mt-md-0">
        <h3 class="mb-3 ">About us</h3>
        <p>
          Perusahaan Donquixote telah berdiri sejak tahun 2022, Dimulai dari satu bangunan hotel yang tidak terlalu besar dan hanya menyewakan beberapa kamar.
          Namun kini Perusahaan Donquixote telah mempunyai Kamar lebih dari 20 Kamar. Fasilitas yang ada di Perusahaan Donquixote diantara lain adalah Kolam renang pribadi, Ruangan Merokok, Gratis Wifi, Sarapan, dan Makan Siang.
        </p>
      </div>
      <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
        <img src="/nyoba/images/carousel/1.png" class="w-100 d-block">
        <img src="/nyoba/images/carousel/2.png" class="w-100 d-block">
        <img src="/nyoba/images/carousel/3.png" class="w-100 d-block">
      </div>
    </div>
  </div>


@endsection
