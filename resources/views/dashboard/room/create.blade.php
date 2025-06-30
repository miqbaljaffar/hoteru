@extends('dashboard.layout.main')

@section('title')
    <title>Dashboard | Buat Room</title>
@endsection

@section('content')
<div class="row">

    <!-- Content Row -->
    <div class="col-lg-12">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data Kamar</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.rooms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label for="no" class="form-label">Room Number <span style="font-style: italic;">(required)</span></label>
                                <input type="text" class="form-control" id="no" name="no" required placeholder="ex 10A">
                            </div>
                            <div class="col-md-4">
                                <label for="status_id" class="form-label">Status Room <span style="font-style: italic;">(required)</span></label>
                                <select name="status_id" id="status_id" class="form-select">
                                    @foreach ($status as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="type_id" class="form-label">Type Rooms <span style="font-style: italic;">(required)</span></label>
                                <select class="form-select" name="type_id" id="type_id">
                                    @foreach ($type as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 mt-3">
                                <label for="capacity" class="form-label">Capacity <span style="font-style: italic;">(required)</span></label>
                                <input type="number" class="form-control" id="capacity" name="capacity" required>
                            </div>
                            <div class="col-md-5 mt-3">
                                <label for="price" class="form-label">Price / Day <span style="font-style: italic;">(required)</span></label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 mt-3">
                                <label for="info" class="form-label">Description <span style="font-style: italic;">(required)</span></label>
                                <textarea placeholder="Beach view" name="info" id="info" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 mt-3">
                                <label for="image" class="form-label">Room Image <span style="font-style: italic;">(required)</span></label>
                                <input type="file" class="form-control" id="image" name="image" required>
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
