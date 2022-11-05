
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  @yield('title')

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/db/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('dashboard.layout.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    @include('dashboard.layout.topbar')
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            @include('dashboard.layout.footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('dashboard.layout.logout')

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/db/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="/db/demo/chart-area-demo.js"></script>
    <script src="/db/demo/chart-pie-demo.js"></script>
    <script src="/bs/js/bootstrap.min.js"></script>
    @include('sweetalert::alert')

</body>
</html>

