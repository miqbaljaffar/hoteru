@extends('dashboard.layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')
<div class="row">

                    <!-- Content Row -->
                    <div class="col-lg-12">
                        <div class="container">
                        <div class="card">
                                <div class="card-header">
                                  <h4>Tambah data Kamar</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/dashboard/room/post" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            {{-- <div class="col-lg-12"> --}}
                                                <div class="col-md-2">
                                                    <label class="form-label"> Id </label>
                                                    <input type="text" class="form-control" value="{{ $p + 1 }}"disabled>
                                                </div>
                                                <div class="col-md-2">

                                                </div>
                                                <div class="col-md-6">
                                                <label for="no" class="form-label">Room Number<span style="font-style: italic;">(required)</span></label>
                                                    <input type="text" class="form-control" id="no" name ='no' required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mt-3">
                                                    <label for="status" class="form-label">Status<span style="font-style: italic;">(required)</span></label>
                                                    <input type="text" class="form-control" id="status" name ='status' required>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label for="type" class="form-label">Type<span style="font-style: italic;">(required)</span></label>
                                                    <input type="text" class="form-control" id="type" name ='type' required>
                                                </div>
                                            {{-- </div> --}}
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mt-3">
                                                <label for="capacity" class="form-label"> Capacity <span style="font-style: italic;">(required)</span></label>
                                                <input type="number" class="form-control" id="capacity" name ='capacity' required>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label for="price" class="form-label"> Price / day <span style="font-style: italic;">(required)</span></label>
                                                <input type="number" class="form-control" id="price" name ='price' required>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-10 mt-3">
                                                <label for="desc" class="form-label"> Description <span style="font-style: italic;">(required)</span></label>
                                                <textarea placeholder="Beach view" name="desc" id="desc"rows="3" class="form-control"></textarea>
                                                {{-- <input type="number" class="form-control" id="price" name ='price' required> --}}
                                            </div>
                                        </div>

                                        <button class="btn btn-outline-dark mt-4" type="submit"> SUBMIT </button>
                                    </form>
                                </div>
                            </div>
                    </div>
                    </div>
</div>
@endsection
            <!-- End of Main Content -->
