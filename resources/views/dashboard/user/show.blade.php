@extends('dashboard.layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')
                    <!-- Page Heading -->
                    <div class="container">
                        <div class="col-md-6">
                            <div class="d-sm-flex align-items-center mb-4">
                                <h1 class="h2 mb-0 text-dark-1000">Room</h1>
                                <a href="room/create" class="d-none d-sm-inline-block btn btn-sm btn-outline-dark shadow-sm ms-2"><i class="fas fa-plus"></i></a>
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
                                <h5>Total data</h5>
                            </div>
                                <div class="card-body">
                                    <div class="col-md-auto">

                                        <table class="table table-sm table-bordered" id="myTable">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="5%">Id</th>
                                                    <th>No</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th>Capacity</th>
                                                    <th>Price/day</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp

                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $room->id }}</td>
                                                    <td>{{ $room->no }}</td>
                                                    <td>{{ $room->type->name }}</td>
                                                    <td>{{ $room->status->name }}</td>
                                                    <td>{{ $room->capacity }}</td>
                                                    <td>Rp.{{ number_format($room->price) }}</td>
                                                    {{-- <td>
                                                        <a href="room/{{ $room->id }}/edit" class="btn btn-outline-success"><i class="fas fa-pen"></i></a>
                                                        <a href="room/{{ $room->id }}/delete" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                                        <a href="#" class="btn btn-outline-warning"><i class="fas fa-eye"></i></i></i> </a>

                                                    </td> --}}
                                                </tr>

                                            </tbody>
                                            <tfoot class="table-secondary">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Id</th>
                                                    <th>No</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th>Capacity</th>
                                                    <th>Price/day</th>

                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                            </div>
                    </div>
                    </div>
@endsection
            <!-- End of Main Content -->
