@extends('dashboard.layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')
                    <!-- Page Heading -->
                    <div class="container">
                        <div class="col-md-6">
                            <div class="d-sm-flex align-items-center mb-4">
                                <h1 class="h2 mb-0 text-dark-1000">User</h1>
                                <a href="/dashboard/user/create" class="d-none d-sm-inline-block btn btn-sm btn-outline-dark shadow-sm ms-2"><i class="fas fa-plus"></i></a>
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
                                                    <th width="5%">Name</th>
                                                    <th>Username</th>
                                                    <th>Telp</th>
                                                    <th>Birthdate</th>
                                                    <th>Jk</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($user as $u)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $u->id }}</td>
                                                    <td>{{ $u->customer->name }}</td>
                                                    <td>{{ $u->username }}</td>
                                                    <td>{{ $u->telp }}</td>
                                                    <td>{{ $u->customer->birthdate }}</td>
                                                    <td>{{ $u->customer->jk }}</td>
                                                    <td>{{ $u->email }}</td>
                                                    <td>{{ $u->customer->address }}</td>
                                                    <td>
                                                        <a href="/dashboard/user/{{ $u->username }}/edit" class="btn btn-outline-success"><i class="fas fa-pen"></i></a>
                                                        <a class="btn btn-outline-danger me-1" href="#" data-toggle="modal" data-target="#deletemodal">
                                                            <i class="fas fa-trash"></i>
                                                        </a>

                                                        <a href="user/{{$u->no}}" class="btn btn-outline-warning"><i class="fas fa-eye"></i></i></i> </a>

                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this data?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Select "Delete" below if you are ready to delete.</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <form action="/dashboard/data/user/{{ $u->id }}/delete" method="post">
                                                                @csrf
                                                                <button  class="btn btn-danger me-1" type="submit">Delete</button>
                                                            </form>
                                                            {{-- <a class="btn btn-primary" href="/logout">Logout</a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                @endforeach
                                            </tbody>
                                            <tfoot class="table-secondary">
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="5%">Id</th>
                                                    <th width="5%">Name</th>
                                                    <th>Username</th>
                                                    <th>Telp</th>
                                                    <th>Birthdate</th>
                                                    <th>Jk</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                            </div>
                    </div>
                    </div>
                    <script type="text/javascript">
                        function deleteConfirmation(id) {
                            swal({
                                title: "Delete?",
                                text: "Please ensure and then confirm!",
                                type: "warning",
                                showCancelButton: !0,
                                confirmButtonText: "Yes, delete it!",
                                cancelButtonText: "No, cancel!",
                                reverseButtons: !0
                            }).then(function (e) {

                                if (e.value === true) {
                                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                                    $.ajax({
                                        type: 'POST',
                                        url: "{{url('room')}}/" + id,
                                        data: {_token: CSRF_TOKEN},
                                        dataType: 'JSON',
                                        success: function (results) {

                                            if (results.success === true) {
                                                swal("Done!", results.message, "success");
                                            } else {
                                                swal("Error!", results.message, "error");
                                            }
                                        }
                                    });

                                } else {
                                    e.dismiss;
                                }

                            }, function (dismiss) {
                                return false;
                            })
                        }
                    </script>

@endsection
            <!-- End of Main Content -->
