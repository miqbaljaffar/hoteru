@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | Akun Saya</title>
@endsection

@push('styles')
<style>
    .profile-header {
        background: linear-gradient(to right, #6a82fb, #fc5c7d);
        padding: 2rem;
        color: white;
        border-radius: .5rem .5rem 0 0;
    }
    .profile-avatar {
        width: 120px;
        height: 120px;
        border: 4px solid white;
        margin-top: -60px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .nav-pills .nav-link {
        color: #6c757d;
    }
    .nav-pills .nav-link.active {
        background-color: #343a40;
        color: white;
    }
</style>
@endpush

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-4 col-md-12 mb-4">
            {{-- Kartu Profil Pengguna --}}
            <div class="card border-0 shadow-sm text-center">
                <div class="profile-header"></div>
                <div class="card-body pt-0">
                    <img src="{{ $user->image ? asset('storage/' . $user->image) : '/img/default-user.jpg' }}"
                         alt="avatar"
                         class="rounded-circle img-fluid profile-avatar">
                    <h4 class="mt-3 mb-0">{{ $user->Customer->name }}</h4>
                    <p class="text-muted">{{ '@' . $user->username }}</p>
                    <a href="{{ route('myaccount.edit') }}" class="btn btn-dark btn-sm">
                        <i class="bi bi-pencil-square me-1"></i> {{ $user->image ? 'Ubah Foto' : 'Tambah Foto' }}
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    {{-- Navigasi Tab --}}
                    <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Edit Profil</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-password-tab" data-bs-toggle="pill" data-bs-target="#pills-password" type="button" role="tab" aria-controls="pills-password" aria-selected="false">Ubah Password</button>
                        </li>
                    </ul>

                    {{-- Konten Tab --}}
                    <div class="tab-content" id="pills-tabContent">
                        {{-- Tab Edit Profil --}}
                        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <h5 class="mb-3">Informasi Akun</h5>
                            <form action="/myaccount/{{ $user->id }}/update" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" value="{{ $user->Customer->name }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Telepon</label>
                                        <input type="text" class="form-control" name="telp" value="{{ $user->telp }}">
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        <label class="form-label">NIK</label>
                                        <input type="text" class="form-control" name="nik" value="{{ $user->Customer->nik }}" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>

                        {{-- Tab Ubah Password --}}
                        <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
                            <h5 class="mb-3">Ubah Password</h5>
                            <form action="/myaccount/{{ $user->id }}/update-password" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" name="newpassword" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" name="confirmation" required>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-danger">Ubah Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
