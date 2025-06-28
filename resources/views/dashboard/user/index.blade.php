@extends('dashboard.layout.main')

@section('title')
    <title>Dashboard | User</title>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-4">
                <h1 class="h2 mb-0 text-dark-1000">User</h1>
                <a href="/dashboard/user/create" class="btn btn-sm shadow border ms-2 mt-1 p-2">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif
        </div>
    </div>

    <!-- Content Row -->
    <div class="container">
        <div class="card shadow border-0">
            <div class="card-header">
                <h5>Total data {{ $p }}</h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">
                    <table class="table table-responsive table-sm table-bordered" id="myTable">
                        <thead class="table-secondary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Name</th>
                                <th>Username</th>
                                <th>Telp</th>
                                <th>Birthdate</th>
                                <th>Jk</th>
                                <th>Email</th>
                                <th>Nik</th>
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
                                    <td>{{ $u->id }}</td>
                                    <td>{{ $u->Customer->name ?? '-' }}</td>
                                    <td>{{ $u->username ?? '-' }}</td>
                                    <td>{{ $u->telp ?? '-' }}</td>
                                    <td>{{ $u->Customer->birthdate ?? '-' }}</td>
                                    <td>{{ $u->Customer->jk ?? '-' }}</td>
                                    <td>{{ $u->email ?? '-' }}</td>
                                    <td>{{ $u->Customer->nik ?? '-' }}</td>
                                    <td>{{ $u->Customer->address ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/dashboard/user/{{ $u->username }}/edit" class="btn btn-success">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a class="btn btn-danger me-1 ms-1" href="/dashboard/user/{{ $u->id }}/delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-secondary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Name</th>
                                <th>Username</th>
                                <th>Telp</th>
                                <th>Birthdate</th>
                                <th>Jk</th>
                                <th>Email</th>
                                <th>Nik</th>
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
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function(e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('room') }}/" + id,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {
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
            }, function(dismiss) {
                return false;
            });
        }
    </script>
@endsection
