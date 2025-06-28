@extends('dashboard.layout.main')
@section('title')
    <title>Dashboard</title>
@endsection
@section('content')
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #print * {
                visibility: visible;
                zoom: 100%;
            }

            #print {
                position: absolute;
                left: 0;
                top: 0;
            }
        }

        /* Warna-warna Jepang */
        .text-primary {
            color: #1e3a8a; /* Biru (Aoi) */
        }

        .text-success {
            color: #4CAF50; /* Hijau (Midori) */
        }

        .text-warning {
            color: #FF5722; /* Merah (Aka) */
        }

        .text-info {
            color: #2196F3; /* Biru Muda (Ao) */
        }

        .card.border-left-primary {
            border-left: 5px solid #1e3a8a; /* Biru */
        }

        .card.border-left-success {
            border-left: 5px solid #4CAF50; /* Hijau */
        }

        .card.border-left-info {
            border-left: 5px solid #2196F3; /* Biru Muda */
        }

        .card.border-left-warning {
            border-left: 5px solid #FF5722; /* Merah */
        }

        /* Styling untuk tombol Generate Report */
        .btn-primary {
            background-color: #1e3a8a; /* Biru */
            border-color: #1e3a8a; /* Biru */
        }

        .btn-primary:hover {
            background-color: #1e40af; /* Biru Tua */
            border-color: #1e40af; /* Biru Tua */
        }

        .dropdown-menu {
            background-color: #f7fafc; /* Putih Muda */
        }

        .dropdown-item {
            color: #1e3a8a; /* Biru */
        }

        .dropdown-item:hover {
            background-color: #e2e8f0; /* Abu-abu Muda */
        }
    </style>

    <div class="print" id="print">
        <div class="container">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-primary">Dashboard</h1>
                <a href="#" onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Earnings {{ Carbon\Carbon::now()->isoformat('MMMM') }} (Monthly)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">IDR {{ number_format($monthCount) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (All Time) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Earnings (All Time)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">IDR
                                        {{ number_format($totalAmount) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profit Compared Last Month -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Profit Compared Last
                                        Month
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-2 font-weight-bold text-gray-800">{{ $percentage }}%
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                @if ($percentage > 10)
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: {{ $kiri }}%"
                                                        aria-valuenow="{{ $kiri }}" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        @if ($percentage > 100)
                                                            100
                                                        @endif
                                                    </div>
                                                    @if ($percentage > 100)
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: {{ $kanan }}%"
                                                            aria-valuenow="{{ $kanan }}" aria-valuemin="0"
                                                            aria-valuemax="100">{{ $percentage - 100 }}</div>
                                                    @endif
                                                @else
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: {{ $percentage }}%"
                                                        aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        @if ($percentage > 100)
                                                            100
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Transaction Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Transaction</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transactionCount }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">

                            <div class="chart-area">
                                <canvas id="myChart" style="max-height: 100%;max-width:100%"></canvas>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4">
                                <canvas id="myChart2" style="max-height: 100%;max-width:100%"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                    'Dec'
                ],
                datasets: [{
                    label: 'Earnings A Month',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: JSON.parse('{!! json_encode($count) !!}'),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        const labels2 = JSON.parse('{!! json_encode($months) !!}');
        const data = {
            labels: labels2,
            datasets: [{
                data: JSON.parse('{!! json_encode($qty) !!}'),
                backgroundColor: ['rgb(255, 61, 61)', 'rgb(255, 245, 61)', 'rgb(61, 64, 255)',
                    'rgb(139, 255, 61)', 'rgb(1, 200, 255)', 'rgb(255, 132, 61)', 'rgb(102, 204, 204)',
                    'rgb(255, 171, 171)', 'rgb(102, 153, 255)', 'rgb(102, 102, 102)', 'rgb(197, 163, 255)',
                    'rgb(231, 255, 172)',
                ],
            }]
        };
        const config = {
            type: 'doughnut',
            data: data,
        };
        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config
        )
    </script>
@endsection
