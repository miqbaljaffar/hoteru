@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | FASILITAS HOTEL KAMI</title>
@endsection

@section('content')
<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
  <div class="h-line bg-dark"></div>
</div>

<div class="container">
  <div class="row">
    <!-- Kolam Renang -->
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex justify-content-center mb-2">
            <img src="/frontend/img/fasilitas/hotel_pool.jpg" width="300px" height="200px">
        </div>
        <div class="d-flex justify-content-center">
          <h5 class="mt-4">Kolam Renang</h5>
        </div>
      </div>
    </div>

    <!-- Wifi -->
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex justify-content-center mb-2">
            <img src="/frontend/img/fasilitas/restaurant.jpg" width="300px" height="200px">
        </div>
        <div class="d-flex justify-content-center">
            <h5 class="mt-4">Restaurant</h5>
        </div>
      </div>
    </div>

    <!-- Lunch -->
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex justify-content-center mb-2">
            <img src="/frontend/img/fasilitas/spa.jpg" width="300px" height="200px">
        </div>
        <div class="d-flex justify-content-center">
            <h5 class="mt-4">Spa</h5>
        </div>
      </div>
    </div>

    <!-- Hot Water -->
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex justify-content-center mb-2">
            <img src="/frontend/img/fasilitas/gym.jpg" width="300px" height="200px">
        </div>
        <div class="d-flex justify-content-center">
            <h5 class="mt-4">Gym</h5>
        </div>
      </div>
    </div>

    <!-- Breakfast -->
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex justify-content-center mb-2">
            <img src="/frontend/img/fasilitas/biliard.jpg" width="300px" height="200px">
        </div>
        <div class="d-flex justify-content-center">
            <h5 class="mt-4">Billiard</h5>
        </div>
      </div>
    </div>

    <!-- 8 Ball Pool -->
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex justify-content-center mb-2">
            <img src="/frontend/img/fasilitas/playground.jpg" width="300px" height="200px">
        </div>
        <div class="d-flex justify-content-center">
            <h5 class="mt-4">Playground</h5>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
