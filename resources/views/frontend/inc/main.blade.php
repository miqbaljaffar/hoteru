<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    @include('frontend.inc.links')
    @stack('styles')
</head>
<body>

    @include('frontend.inc.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.inc.footer')

    @include('frontend.inc.logout')

    @include('vendor.sweetalert.alert')

    @include('frontend.inc.scripts')
    @stack('scripts')

</body>
</html>
