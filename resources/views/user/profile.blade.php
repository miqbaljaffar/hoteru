<!DOCTYPE html>
<html>
<head>
	<title>Hotel Booking Website</title>
	<!-- CSS only -->
@include('frontend.inc.links')

<link rel="stylesheet" type="text/css" href="/css/common.css">
{{-- <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script> --}}
<link rel="stylesheet" href="/bs/css/bootstrap.min.css">

</head>
<body>

@include('frontend.inc.header')

<section style="background-color: #eee;margin-bottom:65px">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="/img/default-user.jpg" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $user->Customer->name }}</h5>
              <p class=" mb-1">@if ($user->Customer->job)
                {{ $user->Customer->job}}
                @else

             @endif</p>
              <p class=" mb-4">@if ($user->Customer->address)
                 {{ $user->Customer->address}}
                 @else

              @endif</p>
              <div class="d-flex justify-content-center mb-2">
                @if ($user->image == null)
                <a href="/myaccount/edit" class="btn btn-primary me-2">Tambah Foto</a>
                @else
                <a href="/myaccount/edit" class="btn btn-primary me-2">Hapus Foto</a>
                @endif

              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
            <form action="/myaccount/{{ $user->id }}/update" method="post">
                @csrf
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Name</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control  mb-0" name="name" id="name" value="{{ $user->Customer->name }}">
                  {{-- <p class=" mb-0">@if ($user->Customer->name)
                    {{ $user->Customer->name }}
                    @else -
                    @endif</p> --}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Username</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control  mb-0" name="username" id="username" value="{{ $user->username }}">
                </div>
              </div>
              <hr>


              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control  mb-0" name="email" id="email" value="{{ $user->email }}">
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control  mb-0" name="telp" id="telp" value="{{ $user->telp }}">
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control  mb-0" name="address" id="address" value="{{ $user->Customer->address }}">
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Gender</p>
                </div>
                <div class="col-sm-9">
                    <div class="d-flex">
                        @if($user->Customer->jk == 'L')
                        <div class="ms-1 form-check">
                            <input class="form-check-input" type="radio" name="jk" value="L" id="jkpria" checked>
                            <label class="form-check-label" for="jkpria">
                              Pria
                            </label>
                          </div>
                          <div class="ms-3 form-check">
                            <input class="form-check-input" type="radio" name="jk" value="P" id="jkwanita">
                            <label class="form-check-label" for="jkwanita">
                              Wanita
                            </label>
                          </div>
                          @else
                           <div class="ms-1 form-check">
                            <input class="form-check-input" type="radio" name="jk" value="L" id="jkpria">
                            <label class="form-check-label" for="jkpria">
                              Pria
                            </label>
                          </div>
                          <div class="ms-3 form-check">
                            <input class="form-check-input" type="radio" name="jk" value="P" id="jkwanita" checked>
                            <label class="form-check-label" for="jkwanita">
                              Wanita
                            </label>
                          </div>
                          @endif
                    </div>
                    {{-- @endif value="{{ $user->Customer->name }}"> --}}
              </div>
              <hr class="mt-2 mb-4">

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Job</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control " name="job" id="job" value="{{ $user->Customer->job }}">
                </div>
              </div>
              <hr class="mt-3">
            </div>
          </div>
          <div class="container mb-4 ">
            <div class="d-flex justify-content-end">

                    <button type="submit" class="btn btn-primary"> Update! </button>
                </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  @include('vendor.sweetalert.alert')


@include('frontend.inc.footer')

</body>
</html>
