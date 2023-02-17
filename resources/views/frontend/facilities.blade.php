<!DOCTYPE html>
<html>
<head>
	<title>Hotel Booking Website</title>
	<!-- CSS only -->
@include('frontend.inc.links')
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<link rel="stylesheet" type="text/css" href="css/common.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<style>
  .pop:hover{
    border-top-color: var(--teal) !important;
    transform: scale(1.03);
    transition: all 0.3s;
  }
</style>

</head>
<body>

    @include('frontend.inc.header')


<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>

  <div class="h-line bg-dark"></div>
  {{-- <p class="text-center mt-3">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat.
  </p> --}}
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex justify-content-center mb-2">
            <img src="/frontend/img/fasilitas/1.jpg" width="300px" height="200px">
          {{-- --}}
        </div>
        <div class="d-flex justify-content-center">
          <h5 class="mt-4">Kolam Renang</h5>  </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
            <img src="/frontend/img/fasilitas/2.jpg"  width="300px" height="200px">

        </div>
        <div class="d-flex justify-content-center">
            <h5 class="mt-4">Wifi</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
         <img src="/frontend/img/fasilitas/3.jpg"  width="300px" height="200px">

        </div>
        <div class="d-flex justify-content-center">
            <h5 class="mt-4">Lunch</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
         <img src="/frontend/img/fasilitas/4.jpg"  width="300px" height="200px">

        </div>
        <div class="d-flex justify-content-center">
            <h5 class="mt-4">Hot Water</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
         <img src="/frontend/img/fasilitas/5.jpg"  width="300px" height="200px">

        </div>
        <div class="d-flex justify-content-center">
            <h5 class="mt-4">Breakfast</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
         <img src="/frontend/img/fasilitas/ball.jpg"  width="300px" height="200px">

        </div>
        <div class="d-flex justify-content-center">
            <h5 class="mt-4">8 Ball Pool</h5>
        </div>
      </div>
    </div>
  </div>
</div>
@include('vendor.sweetalert.alert')
@include('frontend.inc.footer')

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>
</html>
