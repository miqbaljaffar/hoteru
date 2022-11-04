@extends('dashboard.layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')
                    <!-- Page Heading -->
                    <div class="container">
                        <div class="col-md-6">
                            <div class="d-sm-flex align-items-center mb-4">
                                <a href="room/create" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm me-2"><i
                                        class="fas fa-download fa-sm ms-1 me-1"></i></a>
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
                                <h5>Total data : {{$p }}</h5>
                            </div>
                                <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id</th>
                                            <th>No</th>
                                            <th>Type</th>
                                            <th>Capacity</th>
                                            <th>Price/day</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($room as $r)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $r->id }}</td>
                                            <td>{{ $r->no }}</td>
                                            <td>{{ $r->type }}</td>
                                            <td>{{ $r->capacity }}</td>
                                            <td>{{ $r->price }}</td>
                                            <td>{{ $r->status }}</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-success"><i class="fas fa-pen"></i></a>
                                                <a href="#" class="btn btn-outline-danger"><i class="fas fa-trash"></i></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Id</th>
                                            <th>No</th>
                                            <th>Type</th>
                                            <th>Capacity</th>
                                            <th>Price/day</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                    </div>
                    </div>
@endsection
            <!-- End of Main Content -->
