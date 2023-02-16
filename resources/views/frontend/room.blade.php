<!DOCTYPE html>
<html>
<head>
	<title>Hotel Booking Website</title>
	<!-- CSS only -->
@include('frontend.inc.links')

<link rel="stylesheet" type="text/css" href="/css/common.css">
{{-- <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script> --}}


</head>
<body>

@include('frontend.inc.header')

<div class="modal fade" id="checkin" tabindex="-1" aria-labelledby="checkinLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="checkinLabel">Kapan?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="/order">
            @csrf
            <input type="hidden" name="customer" value="{{ $customer }}">
            <input type="hidden" name="room" value="{{ $room->id }}">
            <div class="mb-3">
              <label for="check_in" class="col-form-label">Check in</label>
              <input type="date" class="form-control" id="check_in" name="from">
            </div>
            <div class="mb-3">
              <label for="check_out" class="col-form-label">Check out</label>
             <input type="date" class="form-control" id="check_out" name="to">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"> Cek Tanggal</button>
        </form>
        </div>
      </div>
    </div>
  </div>


<div class="my-5 px-4">
    <div class="h-line bg-dark"></div>
</div>

<div class="container-fluid">
    <img src="/nyoba/images/carousel/1.png" class="w-100 d-block" style="margin-bottom:30px" />
    <div class="container border">
        <div class="d-flex justify-content-between">
            <div class="col-md-6 border">
                <h2 class="fw-bold h-font" >{{ $room->type->name }} {{ $room->no }}</h2>
            </div>
            <div class="col-md-6 border text-end">
                <h4 class="h-font" ><span class="text-success "> IDR {{ number_format($room->price)}}</span><span class="h6">/night
                        </span></h4>
                        <h6 style="font-size:10px">(max. {{ $room->capacity}} Orang) </h6>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            @if ($request->from)
            <form action="/order" method="POST">
                @csrf
                <input type="hidden" name="customer" value="{{ $customer }}">
                <input type="hidden" name="room" value="{{ $room->id }}">
                <input type="hidden" name="from" value="{{ $request->from }}">
                <input type="hidden" name="to" value="{{ $request->to }}">
                <button type="submit" class="btn btn-primary"> Pesan Sekarang </button>
            </form>
                @else
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkin"> Pesan Sekarang </button>
            @endif
            </form>
        </div>
        <div class="col-md-12">
            <hr class="border border-secondary opacity-25 w-100">
        </div>
        {{-- <div class="col-md-12">
            <h4 class="mt-5 mb-4"> Tipe Kamar</h4>
            <div class="d-flex">
                <div class="container">
                    <p>{{ $room->type->name }}</p>
                </div>
            </div>
        </div> --}}
{{--
        <div class="col-md-12">
            <hr class="border border-secondary opacity-25 w-100">
        </div> --}}

        <div class="col-md-12">
            <h4 class="mt-5 mb-4"> Kebijakan Akomodasi</h4>
            <div class="d-flex">
                <div class="col-md-4">
                    <h5>Prosedur Check-in</h5>
                </div>
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem, possimus natus magni adipisci sequi, quos iure hic dolor ducimus quisquam facere molestiae eum quia inventore dignissimos incidunt. Ratione officia est enim culpa totam? Vitae, cumque soluta quas repellat assumenda asperiores provident necessitatibus fuga aut, corporis inventore ab reprehenderit magni eius!</p>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-4 mt-4">
                    <h5>Kebijakan Lainnya</h5>
                </div>
                <div class="col-md-8">
                    <h6 class="mt-4">Merokok</h6>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem, possimus natus magni adipisci sequi, quos iure hic dolor ducimus quisquam facere molestiae eum quia inventore dignissimos incidunt. Ratione officia est enim culpa totam? Vitae, cumque soluta quas repellat assumenda asperiores provident necessitatibus fuga aut, corporis inventore ab reprehenderit magni eius!</p>
                    <h6 class="mt-4">Merokok</h6>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem, possimus natus magni adipisci sequi, quos iure hic dolor ducimus quisquam facere molestiae eum quia inventore dignissimos incidunt. Ratione officia est enim culpa totam? Vitae, cumque soluta quas repellat assumenda asperiores provident necessitatibus fuga aut, corporis inventore ab reprehenderit magni eius!</p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <hr class="border border-secondary opacity-25 w-100">
        </div>

        <div class="col-md-12">
            <h4 class="mt-5 mb-4"> Fasilitas </h4>

        </div>
        <div class="col-md-12">
            <hr class="border border-secondary opacity-25 w-100">
        </div>

        <div class="col-md-12 mb-5 border">
            <div class="d-flex justify-content-between mt-4 mb-3">
                <h4> Lokasi </h4>
                <a href=""> Lihat MAPS</a>
            </div>
            <div class="d-flex">
                <div class="col-md-7">
                    <iframe class="w-100 rounded mt-3" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9060098636683!2d106.96529953804958!3d-6.406108795364871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6995d20156e367%3A0x5b7cd089c3c57813!2sSMK%20Bina%20Mandiri%20Multimedia%20Cileungsi!5e0!3m2!1sid!2sid!4v1675517872782!5m2!1sid!2sid"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
                </div>
                <div class="col-md-5 ms-2">
                    <div class="container">
                        <p class="mt-3 h4">Hotel SMK Bina Mandiri Multimedia</p>
                    </div>
                </div>
            </div>
        </div>


        </div>
        {{-- <hr class="dropdown-divider"> --}}
    </div>
{{-- </div> --}}



@include('vendor.sweetalert.alert')
@include('frontend.inc.footer')

</body>
</html>
