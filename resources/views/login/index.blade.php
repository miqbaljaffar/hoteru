<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurora Haven | Login</title>
    {{-- Memuat Bootstrap 5 dari CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Memuat ikon dari Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f0f2f5; /* Warna latar belakang yang lembut */
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .alert-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
        }
    </style>
</head>
<body>

    {{-- Container untuk notifikasi/alert --}}
    <div class="alert-container">
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="container login-container">
        <div class="login-card">
            <div class="card-body p-4 p-sm-5">
                <div class="text-center mb-4">
                    <img src="/loginn/img/logo_hotel.png" alt="Logo Hotel" style="height: 60px;">
                    <h3 class="mt-3 mb-0">Selamat Datang Kembali</h3>
                    <p class="text-muted">Silakan login untuk melanjutkan</p>
                </div>

                <form action="/login" method="post">
                    @csrf
                    {{-- Input Username --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus value="{{ Cookie::get('username') ?? '' }}">
                        <label for="username"><i class="fas fa-user me-2"></i>Username</label>
                    </div>

                    {{-- Input Password --}}
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required value="{{ Cookie::get('password') ?? '' }}">
                        <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                    </div>

                    {{-- Remember Me & Lupa Password --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" @if(Cookie::has('username')) checked @endif>
                            <label class="form-check-label" for="remember">
                                Ingat Saya
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="small text-decoration-none">Lupa password?</a>
                    </div>

                    {{-- Tombol Login --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark btn-lg">Login</button>
                    </div>

                    {{-- Link Registrasi --}}
                    <div class="text-center mt-4">
                        <p class="mb-0 text-muted">Belum punya akun? <a href="/register" class="fw-bold text-decoration-none">Daftar di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Memuat JS Bootstrap dari CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @include('sweetalert::alert')
</body>
</html>
