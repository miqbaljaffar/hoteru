@extends('dashboard.layout.main')

@section('title')
<title>Dashboard | Buat Type Room</title>
@endsection

@section('content')
<div class="row">
    <!-- Content Row -->
    <div class="col-lg-12">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Type Kamar</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-auto">
                        <form action="/dashboard/data/type/post" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="#" class="form-label">#</label>
                                    <input type="text" class="form-control" id="#" disabled value="{{ $p+1 }}">
                                </div>
                                <div class="col-md-5">
                                    <label for="name" class="form-label">Name <span style="font-style: italic;">(required)</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Connecting Room">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10 mt-3">
                                    <label for="info" class="form-label">Description <span style="font-style: italic;">(required)</span></label>
                                    <textarea placeholder="Tipe kamar hotel dengan Connecting Room ini cocok untuk kamu yang pergi bersama keluarga besar atau rombongan tetapi ingin memiliki kamar tidur masing-masing." 
                                              name="info" id="info" rows="3" class="form-control"></textarea>
                                </div>
                            </div>

                            <button class="btn btn-dark mt-4" type="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
