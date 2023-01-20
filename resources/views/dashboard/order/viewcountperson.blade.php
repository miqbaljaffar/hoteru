@extends('dashboard.layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')
                    <!-- Page Heading -->
                    <div class="container">
                            <div class="mb-3">
                                <link rel="stylesheet" href="/style/progress-indication.css">
                             @include('dashboard.order.progressbar')
                            </div>

                    </div>

                    <!-- Content Row -->
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h5> view count </h5>
                            </div>
                                <div class="card-body">
                                    <div class="col-md-auto">
                                        <form action="{{ route('chooseroom') }}" method="post">
                                        @csrf
                                            <input type="text" name="c_id" id="c_id" hidden value="{{ $c_id }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <label for="count" class="form-label">How many Person? </label>
                                                <input type="text" class="form-control" id="count" name ='count' required">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <label for="from" class="form-label">From </label>
                                                    <input type="date" class="form-control" id="from" name ='from' required">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <label for="to" class="form-label">To </label>
                                                    <input type="date" class="form-control" id="to" name ='to' required">
                                                </div>
                                            </div>
                                            <button class="ms-auto btn btn-dark mt-4" type="submit">Submit</button>
                                            {{-- <a href="/dashboard/order/chooseroom" >NEXT</a> --}}
                                        </form>
                                    </div>
                            </div>
                    </div>
                </div>

@endsection
            <!-- End of Main Content -->
