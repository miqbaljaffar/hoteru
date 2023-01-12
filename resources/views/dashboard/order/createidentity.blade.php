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
                                <h5> Create IDENTITIT </h5>
                            </div>
                                <div class="card-body">
                                    <div class="col-md-auto">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum optio pariatur quaerat unde quos nemo illo numquam exercitationem. Commodi placeat maxime aut ratione dolore sunt fugit iure soluta temporibus qui expedita et impedit earum eum debitis aperiam sequi natus architecto, facilis nam reprehenderit quaerat, pariatur sit! Aliquid dolore illo explicabo error repellendus. Ratione ab mollitia, animi explicabo ducimus odit vel eos similique, deleniti distinctio fuga vero! Repudiandae odio inventore a. Temporibus vel dolorum quasi dolor odit iusto. Officia eaque veritatis eligendi expedita voluptas sed provident nobis, dolorum minima eius officiis. Suscipit ex distinctio eum nihil excepturi expedita corporis quaerat labore!</p>
                                        <a href="/dashboard/order/viewcountperson" class="btn btn-secondary">NEXT</a>
                                    </div>
                            </div>
                    </div>


                </div>

@endsection
            <!-- End of Main Content -->
