@extends('dashboard.layout.main')

@section('title')
<title>Dashboard | Edit Room {{ $room->no }}</title>
@endsection

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Edit data Kamar No {{ $room->no }} #{{$room->id}}</h4>
                </div>
                <div class="card-body">
                    {{-- Gunakan helper route() untuk URL yang lebih dinamis --}}
                    <form action="{{ route('dashboard.rooms.update', $room->no) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT') {{-- Tambahkan method PUT untuk update resource --}}
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label for="no" class="form-label">Room Number <span style="font-style: italic;">(required)</span></label>
                                <input type="text" class="form-control" id="no" name="no" required value="{{ $room->no }}">
                            </div>
                            <div class="col-md-4">
                                <label for="status_id" class="form-label">Status Room <span style="font-style: italic;">(required)</span></label>
                                <select name="status_id" id="status_id" class="form-select">
                                    <option value="{{ $room->status_id }}" selected>{{ $room->status->name }}</option>
                                    @foreach ($statuses as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="type_id" class="form-label">Type Rooms <span style="font-style: italic;">(required)</span></label>
                                <select class="form-select" name="type_id" id="type_id">
                                    <option value="{{ $room->type_id }}" selected>{{ $room->type->name }}</option>
                                    @foreach ($types as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mt-3">
                                <label for="capacity" class="form-label">Capacity <span style="font-style: italic;">(required)</span></label>
                                <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $room->capacity }}" required>
                            </div>
                            <div class="col-md-5 mt-3">
                                <label for="price" class="form-label">Price / day <span style="font-style: italic;">(required)</span></label>
                                <input type="number" class="form-control" id="price" name="price" required value="{{ $room->price }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 mt-3">
                                <label for="info" class="form-label">Description <span style="font-style: italic;">(required)</span></label>
                                <textarea placeholder="Beach view" name="info" id="info" rows="4" class="form-control">{{ $room->info }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 mt-3">
                                <label for="image" class="form-label">Room Image</label>
                                <input type="file" class="form-control" id="image" name="image">
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
