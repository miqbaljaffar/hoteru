<!DOCTYPE html>
<html lang="en">
<head>
    @yield('title')
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/frontend/css/style.css">
    @yield('css')
</head>
<body>
<!-- Top bar ------------------------------->
    @include('layout.topbar')
    <!--navbart end-->
    @yield('content')

<!--Kontak section end ya noob-->

<!--footer Start ya deck-->

@yield('footer')

@yield('script')

</body>
</html>
