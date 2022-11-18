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
                                <h5>Total data {{$p }}</h5>
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
                                                    <td>{{ $r->type->name }}</td>
                                                    <td>{{ $r->status->name }}</td>
                                                    <td>{{ $r->capacity }}</td>
                                                    <td>Rp.{{ number_format($r->price) }}</td>
                                                    <td class="d-flex">
                                                        <a href="room/{{ $r->id }}/edit" class="btn btn-outline-success me-1"><i class="fas fa-pen"></i></a>
                                                        <form action="/dashboard/room/{{ $r->id }}/delete" method="post">
                                                            @csrf
                                                            <button  class="btn btn-outline-danger me-1" type="submit" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                        <a href="/dashboard/room/{{$r->no}}" class="btn btn-outline-warning me-1"><i class="fas fa-eye"></i></i></i> </a>

                                                    </td>
                                                </tr>
                                                @endforeach
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
                                                    <th width="14%">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                            </div>
                    </div>
                    </div>
                    {{-- <script type="text/javascript">
                        function deleteConfirmation(id) {
                            swal({
                                title: "Delete?",
                                text: "Apakah kamu yakin ingin menghapus?",
                                type: "warning",
                                showCancelButton: !0,
                                confirmButtonText: "Yes, delete it!",
                                cancelButtonText: "No, cancel!",
                                reverseButtons: !0
                            }).then(function (e) {

                                if (e.value === true) {
                                    return true;
                                    // var CSRF_TOKEN = $('input[name="_token"]')[0].value;
                                    // $.ajax({
                                    //     type: 'DELETE',
                                    //     url: "{{url('dashboard/room')}}/" + id,
                                    //     data: {_token: CSRF_TOKEN},
                                    //     dataType: 'JSON',
                                    //     success: function (results) {

                                    //         if (results.success === true) {
                                    //             swal("Done!", results.message, "success");
                                    //         } else {
                                    //             swal("Error!", results.message, "error");
                                    //         }
                                    //     }
                                    // });

                                } else {
                                    e.dismiss;
                                    return false;
                                }

                            }, function (dismiss) {
                                return false;
                            })
                        }
                    </script> --}}

@endsection
            <!-- End of Main Content -->
