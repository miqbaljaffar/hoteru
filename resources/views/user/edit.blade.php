@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | Edit Foto Profil</title>
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <img src="{{ $user->image ? asset('storage/' . $user->image) : '/img/default-user.jpg' }}"
                             alt="avatar"
                             class="rounded-circle img-fluid"
                             style="width: 150px; height: 150px; object-fit: cover;">
                        <h4 class="mt-3">{{ $user->Customer->name }}</h4>
                    </div>

                    <h5 class="mb-3">
                        @if ($user->image)
                            Ubah Foto Profil
                        @else
                            Tambah Foto Profil
                        @endif
                    </h5>

                    <form action="{{ route('myaccount.photo.change') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="mb-3">
                            <label for="image" class="form-label">Pilih file gambar (maks: 5MB)</label>
                            <input class="form-control" type="file" name="image" id="image" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/myaccount') }}" class="btn btn-secondary">Kembali ke Profil</a>
                            <div>
                                @if ($user->image)
                                    <a href="/myaccount/{{$user->id}}/delete-foto" class="btn btn-outline-danger">Hapus Foto</a>
                                @endif
                                <button type="submit" class="btn btn-dark">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
