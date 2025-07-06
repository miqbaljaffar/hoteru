<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurora Haven | Registrasi Akun</title>
    {{-- Memuat Bootstrap 5 dari CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Memuat ikon dari Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f0f2f5; /* Warna latar belakang yang lembut */
        }
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }
        .register-card {
            width: 100%;
            max-width: 450px;
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>

    <div class="container register-container">
        <div class="card register-card">
            <div class="card-body p-4 p-sm-5">
                <div class="text-center mb-4">
                    <img src="/loginn/img/logo_hotel.png" alt="Logo Hotel" style="height: 60px;">
                    <h3 class="mt-3 mb-0">Buat Akun Baru</h3>
                    <p class="text-muted">Daftar untuk mulai memesan kamar impian Anda.</p>
                </div>

                <form action="/register" method="POST">
                    @csrf
                    {{-- Input Nama Lengkap --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Lengkap" required value="{{ old('name') }}">
                        <label for="name"><i class="fas fa-user-circle me-2"></i>Nama Lengkap</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input Username --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" required value="{{ old('username') }}">
                        <label for="username"><i class="fas fa-user me-2"></i>Username</label>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input Email (POSISI YANG BENAR) --}}
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" required value="{{ old('email') }}">
                        <label for="email"><i class="fas fa-envelope me-2"></i>Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Input Password --}}
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                        <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                         @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input Konfirmasi Password --}}
                     <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="confirmation_password" id="confirmation_password" placeholder="Konfirmasi Password" required>
                        <label for="confirmation_password"><i class="fas fa-lock me-2"></i>Konfirmasi Password</label>
                    </div>

                    {{-- Tombol Registrasi --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark btn-lg">Register</button>
                    </div>

                    {{-- Link Login --}}
                    <div class="text-center mt-4">
                        <p class="mb-0 text-muted">Sudah punya akun? <a href="/login" class="fw-bold text-decoration-none">Login di sini</a></p>
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
