@extends('dashboard.layout.main')
@section('title')
    <title>Dashboard | Buat User</title>
@endsection

@section('content')
<div class="row">

    <!-- Content Row -->
    <div class="col-lg-12">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data User</h4>
                </div>
                <div class="card-body">
                    <form action="/dashboard/user/post" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name <span style="font-style: italic;">(required)</span></label>
                                <input type="text" class="form-control" id="name" name="name" required placeholder="ex: Jamal Kurniawan">
                            </div>
                            <div class="col-md-4">
                                <label for="username" class="form-label">Username <span style="font-style: italic;">(required)</span></label>
                                <input type="text" class="form-control" id="username" name="username" required placeholder="ex: Jamal30">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email <span style="font-style: italic;">(required)</span></label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="ex: Jamal@gmail.com">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="password" class="form-label">Password <span style="font-style: italic;">(required)</span></label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="***********">
                            </div>
                            <div class="col-md-4">
                                <label for="job" class="form-label">Job</label>
                                <input type="text" class="form-control" id="job" name="job" placeholder="ex: IT SOFTWARE">
                            </div>
                            <div class="col-md-4">
                                <label for="birthdate" class="form-label">Birthdate</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-7">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="ex: Grand Kahuripan">
                            </div>
                            <div class="col-md-5">
                                <label for="telp" class="form-label">Telp</label>
                                <input type="tel" class="form-control" id="telp" name="telp" placeholder="ex: 0998213">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jk" id="jk">
                                    <option selected value="?">Pilih Jenis Kelamin</option>
                                    <option value="L">Pria</option>
                                    <option value="P">Wanita</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="is_admin" class="form-label">Is Admin <span style="font-style: italic;">(required)</span></label>
                                <select class="form-select" name="is_admin" id="is_admin">
                                    <option selected value="0">False</option>
                                    <option value="1">True</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-10">
                                <label for="formFile" class="form-label">Default File Input</label>
                                <input class="form-control" name="image" type="file" id="formFile">
                            </div>
                        </div>

                        <button class="btn btn-dark mt-4" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
