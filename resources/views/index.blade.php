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
<link rel="stylesheet" type="text/css" href="/nyoba/css/common.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<style type="text/css">

	.availability-form{
		margin-top: -50px;
		z-index: 2;
		position: relative;
	}

	@media screen and (max-width: 575px) {
	.availability-form{
		margin-top: 25px;
		padding: 0 35px;
	}

	}
</style>
</head>
<body>

@include('frontend.inc.header')
<!-- Swiper Carousal-->
 <div class="container-fluid px-lg-4 mt-4">
 	 <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="/nyoba/images/carousel/1.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="/nyoba/images/carousel/2.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="/nyoba/images/carousel/3.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="/nyoba/images/carousel/4.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="/nyoba/images/carousel/5.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="/nyoba/images/carousel/6.png" class="w-100 d-block" />
        </div>

      </div>

    </div>
 </div>

 <!-- check avilability form-->
 <div class="container availability-form">
 	<div class="row">
 		<div class="col-lg-12 bg-white shadow p-4 rounded">
 			<h5 class="col-lg-3">Check Booking Availability</h5>
 			<form method="get" action="/rooms">
                @csrf
 				<div class="row align-items-end">
 					<div class="col-lg-4 mb-3">
 						<label class="form-label" style="font-weight: 500;">Check-in</label>
 						<input type="date" name="from" id="from" class="form-control shadow-none">
 					</div>
 					<div class="col-lg-4 mb-3">
 						<label class="form-label" style="font-weight: 500;">Check-in</label>
 						<input type="date" name="to" id="to" class="form-control shadow-none">
 					</div>
 					<div class="col-lg-3 mb-3">
 					<label class="form-label" style="font-weight: 500;">Person</label>
 					<input type="number" name="count" class="form-control shadow-none" id="count" value="1">
 					</div>
 					<div class="col-lg-1 mb-lg-3 mt-2">
 						<button type="submit" class="btn shadow-none border">Submit</button>
 					</div>

 				</div>
 			</form>
 		</div>
 	</div>
 </div>

 <!-- Our Rooms -->
 <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
 <div class="container">
 	<div class="row">

        @foreach ($room as $r)
        {{-- @php
            $r->capacty > 10
        @endphp --}}
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                @if ($r->image)
                <img src="/nyoba/images/rooms/1.jpg" class="card-img-top" alt="...">
                @else
                <img src="/img/default-room.png" alt="...">
                @endif
             <div class="card-body">
               <h5 class="card-title">{{ $r->type->name }} #{{ $r->no }}</h5>
               <h6 class="mb-3 text-success">IDR {{ number_format($r->price) }} </h6>
               <div class="guests mb-2">
                <h6 class="mb-1">Guests</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                   {{$r->capacity}}
                </span>
               </div>
               <div class="features mb-4">
                {{-- <div class="features mb-4"> --}}
                    <h6 class="mb-1">Features</h6>
                    @if ($r->capacity <= 5)
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            2 Rooms
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            1 Bathroom
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            1 Balcony
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            2 Sofa
                        </span>
                         </div>
                        <div class="Facilities mb-3">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Wifi
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Television
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            AC
                        </span>
                      {{-- <span class="badge rounded-pill bg-light text-dark text-wrap">
                        Room Heater
                      </span> --}}
                      @elseif ($r->capacity <=10)
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            3 Rooms
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            2 Bathroom
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            2 Balcony
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            4 Sofa
                        </span>
                        </div>
                        <div class="Facilities mb-3">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Wifi
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Television
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            AC
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Room Heater
                        </span>

                        @else
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            4 Rooms
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            2 Bathroom
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            2 Balcony
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            6 Sofa
                        </span>
                        {{-- <span class="badge rounded-pill bg-light text-dark text-wrap">
                            6 Sofa
                        </span> --}}
                        </div>
                        <div class="Facilities mb-3">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Wifi
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Television
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            AC
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Room Heater
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Smooke Room
                        </span>
                      @endif

               </div>
                   <div class="d-flex justify-content-evenly mb-2">
                       <a href="/rooms/{{ $r->no }}" class="btn btn-sm border border-black btn- shadow-none">Book Now</a>
                       <a href="/rooms/{{ $r->no }}" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                   </div>
             </div>
           </div>
        </div>

        @endforeach


        <div class="col-lg-12 text-center mt-5">
            <a href="/rooms" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms</a>
        </div>
    </div>
 		</div>
 	</div>
 {{-- </div> --}}

 <!-- Our Facilities-->

 <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>

 <div class="container">
 	<div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
 		<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
 			<img src="/frontend/img/fasilitas/1.jpg" width="80px">
 			<h5 class="mt-3">Swimming Pool</h5>
 		</div>
 		<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
 			<img src="/frontend/img/fasilitas/2.jpg" width="80px">
 			<h5 class="mt-3">Wifi</h5>
 		</div>
 		<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
 			<img src="/frontend/img/fasilitas/3.jpg" width="80px">
 			<h5 class="mt-3">Breakfast</h5>
 		</div>
 		<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
 			<img src="/frontend/img/fasilitas/4.jpg" width="80px">
 			<h5 class="mt-3">Warm Water</h5>
 		</div>
 		<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
 			<img src="/frontend/img/fasilitas/5.jpg" width="80px">
 			<h5 class="mt-3">Lunch</h5>
 		</div>
 		{{-- <div class="col-lg-12 text-center mt-5">
 			<a href="#" class="btn btn-sm btn-outline-dark rounded rounded-0 fw-bold shadow-none">More Facilities >>></a>
 		</div> --}}
 	</div>
 </div>


 <!-- REach us-->

 <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Contact</h2>

 <div class="container">
 	<div class="row">
 		<div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
            <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9060098636683!2d106.96529953804958!3d-6.406108795364871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6995d20156e367%3A0x5b7cd089c3c57813!2sSMK%20Bina%20Mandiri%20Multimedia%20Cileungsi!5e0!3m2!1sid!2sid!4v1675517872782!5m2!1sid!2sid"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
 		{{-- <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63225.996807740055!2d80.97815907936754!3d7.934196847392783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afb456e05e5a4c9%3A0x72cd1cfea9d4d0a9!2sPolonnaruwa%20Ancient%20City!5e0!3m2!1sen!2slk!4v1659525623039!5m2!1sen!2slk" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
 		</div>
 		<div class="col-lg-4 col-md-4 ">
 			<div class="bg-white p-4 rounded">
 				<h5>Call us</h5>
 				<a href="tel: +94768799665" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +62 85773674231</a>
 				<br>
 				<a href="tel: +94768799665" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +62 85773674231</a>
 			</div>
 			<div class="bg-white p-4 rounded">
 				<h5>Follow us</h5>
 				<a href="#" class="d-inline-block mb-3">
 					<span class="badge bg-light text-dark fs-6 p-2">
 						<i class="bi bi-twitter me-1"></i>Twitter
 					</span>
 				</a>
 				<br>
 				<a href="#" class="d-inline-block mb-3">
 					<span class="badge bg-light text-dark fs-6 p-2">
 						<i class="bi bi-facebook me-1"></i>Facebook
 					</span>
 				</a>
 				<br>
 				<a href="#" class="d-inline-block">
 					<span class="badge bg-light text-dark fs-6 p-2">
 						<i class="bi bi-instagram me-1"></i>Instagram
 					</span>
 				</a>
 			</div>
 		</div>
 	</div>
 </div>
<hr>@include('frontend.inc.footer')
@include('vendor.sweetalert.alert')
<!-- JavaScript Bundle with Popper -->

{{--
 {{-- <!-- Swiper JS --> --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

 <!-- Initialize Swiper -->
 <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
          delay: 3500,
          disableOnInteraction: false,
      }
    });

    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
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
              slidesPerView: 2,
          },
          1024: {
              slidesPerView: 3,
          },
      }
    });
  </script>
</body>
</html>


