@extends('dashboard.layout.main')

@section('title')
    <title>Dashboard | Kamar {{ $room->no }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-6">
            <div class="d-sm-flex align-items-center mb-4">
                <h1 class="h2 mb-0 text-dark-1000">Kamar {{ $room->no }}</h1>
            </div>
        </div>

        <div class="col-md-6">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 me-3">#{{ $room->id }} Status:</h5>
                    <h5 class="mb-0"
                        @if ($room->status->code == 'V')
                            style="color: green;"
                        @else
                            style="color: red;"
                        @endif>
                        {{ $room->status->name }}
                    </h5>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-12 mb-sm-4">
                        {{-- FIX: Menggunakan $room->images->first() untuk menampilkan gambar pertama --}}
                        @if ($room->images->count() > 0)
                            <img src="{{ asset('storage/' . $room->images->first()->image) }}"
                                 class="img-fluid rounded"
                                 alt="Foto kamar {{ $room->no }}"
                                 style="object-fit:cover; width:100%; height:225px;">
                        @else
                            <div class="d-flex justify-content-center align-items-center bg-light rounded" style="width:100%; height:225px;">
                                <p class="text-muted">Tidak ada gambar untuk kamar ini</p>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-7 col-lg-7 col-12">
                        <table class="table table-sm table-bordered">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Kapasitas</th>
                                    <th>Harga/Hari</th>
                                    <th>Tipe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $room->capacity }} Orang</td>
                                    <td>Rp.{{ number_format($room->price) }}</td>
                                    <td>{{ $room->type->name }}</td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- BAGIAN YANG DIHAPUS --}}
                        {{-- Tombol 'Tambahkan foto' sudah dihapus dari sini --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
