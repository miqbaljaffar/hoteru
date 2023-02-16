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
<div class="container " style="margin-top:30px">
    <div class="d-flex justify-content-center">
        {{-- <table class="table"> --}}
            {{-- <div class="col-lg-"></div> --}}
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="container">
                        <div class="card-body">
                          <div class="d-flex">
                              <h4>Kirim Bukti Pembayaran</h4>
                          </div>
                          <hr>
                          <div class="d-flex justify-content-start">
                            <div class="col-md-12">
                                <form action="" method="post"  enctype="multipart/form-data"> @csrf
                                    <label for="bukti" class="mb-2">Upload Bukti <span class="fst-italic">(Max 3mb)</span></label>
                                    <input type="file" class="form-control mb-3" name="" id="">
                                    <button class="btn btn-primary justify-content-end" type="submit">Kirim</button>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

              </div>


</div>
</div>


@include('frontend.inc.footer')
@include('vendor.sweetalert.alert')

</body>
</html>
