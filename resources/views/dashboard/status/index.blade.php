@extends('dashboard.layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')
                    <!-- Page Heading -->
                    <div class="container">
                        <div class="col-md-6">
                            <div class="d-sm-flex align-items-center mb-4">
                                <h1 class="h2 mb-0 text-dark-1000">Status</h1>
                                <a href="status/create" class="d-none d-sm-inline-block btn btn-sm btn-outline-dark shadow-sm ms-2"><i class="fas fa-plus"></i></a>
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
                                <h5>Total data {{$p }}</h5>
                            </div>
                                <div class="card-body">
                                    <div class="col-md-auto">
                                        <table class="table table-sm table-bordered table-responsive" id="myTable">
                                            <thead class="table-secondary">
                                                {{-- <thead> --}}
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="5%">Id</th>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Desc</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($status as $r)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $r->id }}</td>
                                                    <td>{{ $r->name }}</td>
                                                    <td>{{ $r->code }}</td>
                                                    <td>{{ $r->info }}</td>
                                                    <td>
                                                        <a href="status/{{ $r->id }}/edit" class="btn btn-outline-success"><i class="fas fa-pen"></i></a>
                                                        {{-- <a href="status/delete" class="btn btn-outline-danger"></i> </a> --}}
                                                        <a href="status/{{ $r->id }}/delete" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                                        <a href="#" class="btn btn-outline-warning"><i class="fas fa-eye"></i></i></i> </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot class="table-secondary">
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="5%">Id</th>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th width="48%">Desc</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                            </div>
                    </div>
                    </div>
@endsection
            <!-- End of Main Content -->
