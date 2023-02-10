@extends('dashboard.layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')

                    <!-- Content Row -->
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h5> Data History Payment </h5>
                            </div>
                                <div class="card-body">
                                    <div class="col-md-auto">

                                        <table class="table table-striped table-bordered table-responsive" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th width="4%">#</th>
                                                    {{-- <th class="text-center">ID</th> --}}
                                                    <th class="text-center">Customer</th>
                                                    <th class="text-center">Kamar</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pay as $p)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    {{-- <td class="text-center">{{ $p->id }}</td> --}}
                                                    <td class="text-center">{{ $p->Customer->name }}</td>
                                                    <td class="text-center">{{ $p->Transaction->Room->no }}</td>
                                                    <td class="text-center">IDR {{ number_format($p->price) }}</td>
                                                    <td class="text-center">{{ $p->created_at->isoformat('D MMMM Y') }}</td>
                                                    <td class="text-center">{{ $p->status }}</td>
                                                    <td class="text-center"> <a href="/dashboard/order/history-pay/{{ $p->id }}"><i class="fas fa-file-invoice"></i></a> </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th width="4%">#</th>
                                                    {{-- <th class="text-center">ID</th> --}}
                                                    <th class="text-center">Customer</th>
                                                    <th class="text-center">Kamar</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                            </div>
                    </div>


                </div>

@endsection
            <!-- End of Main Content -->
