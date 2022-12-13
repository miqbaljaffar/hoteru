@extends('dashboard.layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="col-md-6">
            <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h2 mb-0 text-dark-1000">Kamar {{ $room->no }}</h1>
            </div>
        </div>

        <div class="col-md-6">
            @if (session()->has('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>

            @endif
        </div>

    </div>

    <!-- Content Row -->
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="">#{{ $room->id }} Status <h5 class="ms-1 me-5" @if ($room->status->code == 'V')
                    style="color: green;"
                    @else style="color: red" @endif> {{ $room->status->name }}</h5></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <div class="col-md-5">

                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">

                              @php
                                  $nob = 1;
                                  $pp = 2;
                              @endphp

                              @foreach ($foto as $c)
                              @if ($c->id == 1)
                              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                              @else
                              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $nob++ }}" aria-label="Slide {{$pp++ }}"></button>
                              @endif
                              @endforeach
                              </div>

                            <div class="carousel-inner">
                             @foreach ($foto as $cp)
                              @if ($cp->id == 1)
                              <div class="carousel-item active">

                                          <img src="{{asset('storage/' . $cts->image)}}"
                                          class="bd-placeholder-img" alt="foto {{ $cts->room->no }} #{{ $loop->iteration }}" width="100%" fill="#777" focusable="false" aria-hidden="true" height="225">


                                  <div class="container">
                                    <div class="carousel-caption text-start">
                                      <h1>{{ $cts->nm_category }}</h1>
                                      <p>Some representative placeholder content for the first slide of the carousel.</p>
                                      <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                                    </div>
                                  </div>
                                </div>
                                @else
                                <div class="carousel-item">
                                    @if ($cp->image)
                                    <img src="{{asset('storage/' . $cp->image)}}"
                                    class="bd-placeholder-img" alt="{{ $cp->nm_category }}" width="100%" fill="#777" focusable="false" aria-hidden="true" height="225">
                                    @else
                                    <img src="https://source.unsplash.com/1000x1000?{{ $cp->nm_category }}"
                                    class="bd-placeholder-img" alt="{{ $cp->nm_category }}" width="100%" fill="#777" focusable="false" aria-hidden="true" height="225">
                                    @endif

                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>{{ $cp->nm_category }}</h1>
                                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>







                    </div>
                    <div class="col-md-6">
                    <table class="table table-sm table-bordered">
                        <thead class="table-secondary">
                            <tr>
                                <th>Capacity</th>
                                <th>Price/day</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $room->capacity }}</td>
                                <td>Rp.{{ number_format($room->price) }}</td>
                                <td>{{ $room->type->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h5><a href="/dashboard/room/{{ $room->no }}/add-image">Tambahkan foto</a></h5>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
            <!-- End of Main Content -->
