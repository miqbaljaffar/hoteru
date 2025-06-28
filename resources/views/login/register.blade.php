<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aurora Haven | REGISTER</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="/loginn/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <!-- Wave Image -->
    <img class="wave" src="/loginn/img/wave.png">

    <!-- Main Container -->
    <div class="container">
        <div class="img">
            <img src="/loginn/img/logo_hotel.png" alt="Background Image">
        </div>

        <!-- Login Form -->
        <div class="login-content">
            <form action="/register" method="POST">
                @csrf
                <img src="/loginn/img/avatar.svg" alt="Avatar">
                <h2 class="title">Register</h2>

                <!-- Name Input -->
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" name="name" id="name" class="input" placeholder="Name" required autofocus value="{{ old('name') }}">
                    </div>
                </div>

                <!-- Username Input -->
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" name="username" id="username" class="input" placeholder="Username" required autofocus value="{{ old('username') }}">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" name="password" id="password" class="input" placeholder="Password" required>
                    </div>
                </div>

                <!-- Confirmation Password Input -->
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" name="confirmation_password" id="confirmation_password" class="input" placeholder="Confirm Password" required>
                    </div>
                </div>

                <!-- Links and Submit Button -->
                <a href="/login" class="nav-link">Login</a>
                <input type="submit" class="btn" value="Register">
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="/loginn/js/main.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert -->
    @include('sweetalert::alert')
</body>
</html>
