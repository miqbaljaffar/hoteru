@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | PROFILE EDIT</title>
@endsection

@section('content')
    <section style="background-color: #eee; margin-bottom: 65px;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ $user->image ? asset('storage/' . $user->image) : '/img/default-user.jpg' }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px">
                            <h3 class="mt-2">{{ $user->Customer->name }}</h3>
                            <h5>{{ $user->username }}</h5>
                            <p class="mb-1">{{ $user->Customer->job ?? '' }}</p>
                            <p class="mb-4">{{ $user->Customer->address ?? '' }}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="/myaccount/edit" class="btn btn-primary me-2">{{ $user->image ? 'Edit Foto' : 'Tambah Foto' }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <form action="/myaccount/{{ $user->id }}/update" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card mb-4">
                            <div class="card-body">
                                <!-- Name -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Name <span style="color: red">*</span></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control mb-0" name="name" id="name" value="{{ $user->Customer->name }}">
                                    </div>
                                </div>
                                <hr>

                                <!-- Username -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Username <span style="color: red">*</span></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control mb-0" name="username" required id="username" value="{{ $user->username }}">
                                    </div>
                                </div>
                                <hr>

                                <!-- Email -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email <span style="color: red">*</span></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control mb-0" name="email" required id="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <hr>

                                <!-- NIK -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">NIK <span style="color: red">*</span></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nik" id="nik" required value="{{ $user->Customer->nik }}">
                                    </div>
                                </div>
                                <hr>

                                <!-- Phone -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone <span style="color: red">*</span></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control mb-0" name="telp" id="telp" value="{{ $user->telp }}">
                                    </div>
                                </div>
                                <hr>

                                <!-- Birthday -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Birthday</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="birthdate" id="birthdate" value="{{ $user->Customer->birthdate }}">
                                    </div>
                                </div>
                                <hr>

                                <!-- Address -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control mb-0" name="address" id="address" value="{{ $user->Customer->address }}">
                                    </div>
                                </div>
                                <hr>

                                <!-- Gender -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="d-flex">
                                            <div class="ms-1 form-check">
                                                <input class="form-check-input" type="radio" name="jk" value="L" id="jkpria" {{ $user->Customer->jk == 'L' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="jkpria">Pria</label>
                                            </div>
                                            <div class="ms-3 form-check">
                                                <input class="form-check-input" type="radio" name="jk" value="P" id="jkwanita" {{ $user->Customer->jk == 'P' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="jkwanita">Wanita</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <!-- Job -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Job</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="job" id="job" value="{{ $user->Customer->job }}">
                                    </div>
                                </div>
                                <hr>

                                <!-- Card Number -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Card Number</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="card_number" id="card_number" value="{{ $user->card_number }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Update!</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Change Password -->
                    <div class="row mt-4">
                        <h5>CHANGE PASSWORD</h5>
                        <form action="/myaccount/{{ $user->id }}/update" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <p class="mb-0">New Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <p class="mb-0">Confirmation Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="confirmation" id="confirmation" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-danger">Change Password!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
