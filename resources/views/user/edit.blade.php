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
              <p class="text-muted mb-1">@if ($user->Customer->job)
                {{ $user->Customer->job}}
                @else

             @endif</p>
              <p class="text-muted mb-4">@if ($user->Customer->address)
                 {{ $user->Customer->address}}
                 @else

              @endif</p>
              <div class="d-flex justify-content-center mb-2">
                @if ($user->image == null)
                <a href="/myaccount/edit" class="btn btn-danger me-2">Tambah Foto</a>
                @else
                <a href="/myaccount/edit" class="btn btn-danger me-2">Hapus Foto</a>
                @endif
                <a href="/myaccount/edit" class="btn btn-primary">Edit</a>

              </div>
            </div>
          </div>

        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">@if ($user->Customer->name)
                    {{ $user->Customer->name }}
                    @else -
                    @endif</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Username</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> @if ($user->username)
                    {{ $user->username }}
                    @else -
                    @endif</p>
                </div>
              </div>
              <hr>


              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> @if ($user->email)
                    {{ $user->email }}
                    @else -
                    @endif</p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">+ @if ($user->telp)
                    {{ $user->telp }}
                    @else -
                    @endif</p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                   @if ($user->Customer->address)
                   {{ $user->Customer->address }}
                   @else -
                   @endif </p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Gender</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">@if ($user->Customer->jk == "L")
                    <i class="bi bi-gender-male btn disabled btn-primary"></i>
                    @elseif($user->Customer->jk == "P")
                    <i class="bi bi-gender-female btn disabled btn-danger"></i>
                    @else
                    -
                  @endif</p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Job</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">@if ($user->Customer->job)
                    {{ $user->Customer->job }}
                    @else -
                    @endif</p>
                </div>
              </div>
              <hr>

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
