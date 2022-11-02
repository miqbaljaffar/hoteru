<html lang="en">
<head>
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="/db/dashboard.css">
    <link href="/fa/css/fontawesome.css" rel="stylesheet">
    <link href="/fa/css/brands.css" rel="stylesheet">
    <link href="/fa/css/solid.css" rel="stylesheet">
    @yield('css')
    @yield('title')
</head>
<body id="body-pd">
   @include('dashboard.layout.header')
   @include('dashboard.layout.navbar')
    <!--Container Main start-->
    <div class="height-100 bg-light">
      @yield('content')
    </div>
    <!--Container Main end-->

        <script src="/bs/js/bootstrap.bundle.min.js"></script>
        <script src="/db/js.js"></script>
        @yield('script')
</body>
</html>
