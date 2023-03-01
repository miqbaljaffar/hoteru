<!DOCTYPE html>
<html>
<head>
	<title>DONQUIXOTE | About</title>
	<!-- CSS only -->
@include('frontend.inc.links')
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<link rel="stylesheet" type="text/css" href="css/common.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<style>
  .box{
    border-top-color: var(--teal) !important;
  }
</style>

</head>
<body>

    @include('frontend.inc.header')
    @include('frontend.inc.logout')

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
      <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
        <h3 class="mb-3">About us</h3>
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


{{-- <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

<div class="container px-4">
   <div class="swiper mySwiper">
      <div class="swiper-wrapper mb-5">
        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="/nyoba/images/about/about.jpg" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div>
        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="/nyoba/images/about/about.jpg" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div>
        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="/nyoba/images/about/about.jpg" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div>
        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="/nyoba/images/about/about.jpg" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div>
        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="/nyoba/images/about/about.jpg" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div>

        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="/nyoba/images/about/about.jpg" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div>
        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="/nyoba/images/about/about.jpg" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
</div> --}}
@include('frontend.inc.footer')
@include('vendor.sweetalert.alert')

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> --}}

 <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 40,
        pagination: {
          el: ".swiper-pagination",
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 3,
          },
          1024: {
            slidesPerView: 3,
          },
        }
      });
    </script>
</body>
</html>
