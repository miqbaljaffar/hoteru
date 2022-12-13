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
            <div class="card-body" style="margin-bottom:100px">
                <form action="/dashboard/room/{{ $room->no }}/store-image" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-md-7">
        <div class="card" style="margin-top: 28px">
            <div class="card-header">
                <h5>Data foto kamar {{ $room->no }}</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
<thead>
    <Tr>
        <th>#</th>
        <th>Image</th>
    </Tr>
</thead>
<tbody>
    @foreach ($cts as $c)
    <tr>
        <td>{{ $c->id }}</td>
        <td>
            <a href="" data-bs-toggle="modal" data-bs-target="#modal{{ $loop->iteration }}">
                {{ $c->image }}</a>
             </td>
               <div class="modal" tabindex="-1" id="modal{{ $loop->iteration }}">
                   <div class="modal-dialog modal-lg modal-dialog-centered">
 <div class="modal-content">
   <div class="modal-header">
     <h5 class="modal-title">Image #{{ $loop->iteration }}</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <div class="d-flex justify-content-center">
        <img src="{{asset('storage/' . $c->image)}}" style="width:600px;height:500px;">
    </div>
</div>
   <div class="modal-footer">
 </div>
                   </div>
                 </div></td>
    </tr>
    @endforeach
</tbody>
                </table>
           </div>
        </div>
    </div>
            <div class="col-md-1">
<label for="room_id" class="form-label">ID Room </label>
<input type="text" class="form-control" disabled value="{{ $room->id }}"  id="room_id"  placeholder="ex 10A">
                </div>
             <div class="col-md-4">
                 <label for="image" class="form-label">Tambah Foto Kamar </label>
                 <input class="form-control" name="image" type="file" id="image">
                 <input type="text" name="room_id" hidden value="{{ $room->id }}">
                 <button class="btn btn-dark mt-4 ms-auto" type="submit"> SUBMIT </button>
              </div>

</div>

            </div>
        </div>
</div>
</div>
</div>
@endsection
            <!-- End of Main Content -->
