@extends('dashboard.layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')
                    <!-- Page Heading -->
                    <div class="container">
                        <div class="col-md-6">
                            <div class="d-sm-flex align-items-center mb-3">
                                <a class="d-none d-sm-inline-block btn btn-sm btn-white" href="#" data-toggle="modal" data-target="#tambahmodal">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a href="order/history" class="d-none d-sm-inline-block btn btn-sm btn-white ms-2 "><i class="fa fa-history"></i></a>
                            </div>
                        </div>

                        <div class="modal fade" id="tambahmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Have any account?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-sm btn-primary m-1"
                                            href="/dashboard/order/create-identity">No, create
                                            new account!</a>
                                        <a class="btn btn-sm btn-success m-1"
                                            href="">Yes, use
                                            their account!</a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                    <!-- Content Row -->
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h5> Active </h5>
                            </div>
                                <div class="card-body">
                                    <div class="col-md-auto">

                                        <table class="table table-striped table-bordered table-responsive" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th width="4%">#</th>
                                                    <th>Customer</th>
                                                    <th>Room</th>
                                                    <th>Check in</th>
                                                    <th>Check out</th>
                                                    <th>Days</th>
                                                    <th>Total Price</th>
                                                    <th>Paid Off</th>
                                                    <th>Debt</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transaction as $t)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $t->Customer->name }}</td>
                                                    <td>{{ $t->Room->no}}</td>
                                                    <td>{{ $t->check_in->isoFormat('D MMM Y') }}</td>
                                                    <td>{{ $t->check_out->isoFormat('D MMM Y') }}</td>
                                                    <td>{{ $t->check_in->diffindays($t->check_out) }} Day</td>
                                                    <td>Rp.{{ number_format($t->Room->price) }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Customer</th>
                                                    <th>Room</th>
                                                    <th>Check in</th>
                                                    <th>Check out</th>
                                                    <th>Days</th>
                                                    <th>Total Price</th>
                                                    <th>Paid Off</th>
                                                    <th>Debt</th>
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
