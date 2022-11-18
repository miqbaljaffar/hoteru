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
                                        <div class="col-md-4">
                                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                  <div class="carousel-item active">
                                                  <img alt="image" class="bd-placeholder-img overflow-hidden bd-placeholder-img-lg featurette-image img-fluid mx-auto" style="width:360px;height:380px" src="/foto1.jpg">
                                                  </div>
                                                  <div class="carousel-item">
                                                    <img alt="image" class="bd-placeholder-img overflow-hidden bd-placeholder-img-lg featurette-image img-fluid mx-auto" style="width:360px;height:380px"  src="/gallery2.jpg">
                                                  </div>
                                                  <div class="carousel-item">
                                                  <img alt="image" class="bd-placeholder-img overflow-hidden bd-placeholder-img-lg featurette-image img-fluid mx-auto" style="width:360px;height:380px" src="/gallery3.jpg">
                                                  </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Next</span>
                                                </button>
                                              </div>

                                        </div>
                                        <div class="col-md-8">
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
@endsection
            <!-- End of Main Content -->
