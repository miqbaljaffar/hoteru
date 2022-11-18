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
                                  <h4>Tambah foto kamar {{ $room->no }} #{{ $room->id }}</h4>
                                </div>
                                <div class="card-body" style="margin-bottom:250px">
                                    <form action="/dashboard/room/{{ $room->no }}/store-image" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                                    <div class="col-md-2">
                                                            <label for="room_id" class="form-label">ID Room </label>
                                                            <input type="text" class="form-control" disabled value="{{ $room->id }}"  id="room_id"  placeholder="ex 10A">
                                                        </div>
                                                     <div class="col-md-4">
                                                         {{-- <div> --}}
                                                             <label for="image" class="form-label">Tambah Foto Kamar </label>
                                                             <input class="form-control" name="image" type="file" id="image">
                                                             <input type="text" name="room_id" hidden value="{{ $room->id }}">
                                                             <button class="btn btn-dark mt-4" type="submit"> SUBMIT </button>
                                                        {{-- </div> --}}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card" style="margin-top: 28px">
                                                            <div class="card-body">
                                                                @foreach ($room->images as $ri)
                                                                <img src="{{ asset('/storage/' . $ri->image ) }}" style="max-height: 400px;max-width:360px" alt="ImageRoomNo{{ $ri->room->no }} #{{ $ri->id }}">

                                                                @endforeach
                                                            {{-- <h6>{{ $room->images->image }}</h6> --}}
                                                            </div>
                                                        </div>
                                                    </div>

                                        </div>

                                </div>
                            </div>
                    </div>
                    </div>
</div>
@endsection
            <!-- End of Main Content -->
