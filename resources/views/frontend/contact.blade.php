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


</head>
<body>
    @include('frontend.inc.header')


<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">CONTACT US</h2>
{{--
  <div class="h-line bg-dark"></div> --}}
  {{-- <p class="text-center mt-3">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat.
  </p> --}}
</div>

<div class="container mb-5">
    <div class="bg-white rounded shadow p-4">
              <div class="col-lg-12">
                  <div class="row">
          <div class="col-lg-8 col-md-6 mb-5 px-4">
              <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9060098636683!2d106.96529953804958!3d-6.406108795364871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6995d20156e367%3A0x5b7cd089c3c57813!2sSMK%20Bina%20Mandiri%20Multimedia%20Cileungsi!5e0!3m2!1sid!2sid!4v1675517872782!5m2!1sid!2sid"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
          </div>
          <div class="col-lg-4">
              <h5>Address</h5>
              <a href="https://goo.gl/maps/jy8CDHNPpsyBHVHYA" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                <i class="bi bi-geo-alt-fill"></i> Hotel Kami
              </a>
              <h5 class="mt-4">Call us</h5>
              <a href="tel: +94768799665" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +94 768799665</a>
              <br>
              <a href="tel: +94768799665" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +94 768799665</a>
              <h5 class="mt-4">Email</h5>
              <a href="mailto: dineshslweb@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-envelope-fill"></i> dineshslweb@gmail.com</a>

              <h5 class="mt-4">Follow us</h5>
              <a href="#" class="d-inline-block text-dark fs-5 me-2">
                  <i class="bi bi-twitter me-1"></i>
              </a>

              <a href="#" class="d-inline-block text-dark fs-5 me-2">
                  <i class="bi bi-facebook me-1"></i>
              </a>

              <a href="#" class="d-inline-block text-dark fs-5">
                  <i class="bi bi-instagram me-1"></i>

              </a>
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
