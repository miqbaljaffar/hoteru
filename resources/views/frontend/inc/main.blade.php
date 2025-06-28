<!DOCTYPE html>
<html>
<head>
    @yield('title')

    <!-- CSS only -->
    @include('frontend.inc.links')
    @yield('link')
    @yield('css')
    {{-- <link rel="shortcut icon" href="/img/logo.png"> --}}

    <style type="text/css">
        :root {
            --sakura-pink: #fbd4d4;
            --matcha-green: #a8c686;
            --indigo: #264653;
            --japanese-red: #b44c43;
            --accent-color: var(--matcha-green);
        }

        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        .bg-custom,
        .btn-custom {
            background-color: var(--accent-color);
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #8db36a;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: center;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }

            .swiper-slide img {
                height: 50vh;
            }
        }

        .pop:hover {
            border-top-color: var(--matcha-green) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }

        .navbar {
            background-color: rgba(168, 198, 134, 1); /* matcha green */
            transition: background-color 0.3s ease;
        }

        .navbar.scrolled {
            background-color: rgba(168, 198, 134, 0.8);
        }

        .box {
            border-top-color: var(--matcha-green) !important;
        }
    </style>
</head>

<body>

    @include('frontend.inc.header')

    <!-- Swiper Carousel -->
    @include('frontend.inc.logout')

    @yield('content')

    <hr class="mt-4">

    <section class="bg-custom footer-index" id="footer-index">
        @include('frontend.inc.footer')
    </section>

    @include('vendor.sweetalert.alert')

    <section class="script" id="script">
        @include('frontend.inc.scripts')
    </section>

</body>
</html>
