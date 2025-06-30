@extends('dashboard.layout.main')

@section('title')
    <title>Dashboard | Type</title>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-4">
                <h1 class="h2 mb-0 text-dark-1000">Type</h1>
                <a href="{{ route('dashboard.types.create') }}" class="btn btn-sm shadow border ms-2 mt-1 p-2">
                    <i class="fas fa-plus"></i>
                </a>
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

    <!-- Content Row -->
    <div class="container">
        <div class="card shadow border-0">
            <div class="card-header">
                {{-- Menggunakan $type->total() untuk menampilkan jumlah data --}}
                <h5>Total data {{ $type->total() }}</h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">
                    <table class="table table-sm table-bordered table-responsive" id="myTable">
                        <thead class="table-secondary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Id</th>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Menggunakan @forelse untuk menangani data kosong --}}
                            @forelse ($type as $r)
                                <tr>
                                    {{-- Penomoran yang benar untuk paginasi --}}
                                    <td>{{ ($type->currentPage() - 1) * $type->perPage() + $loop->iteration }}</td>
                                    <td>{{ $r->id }}</td>
                                    <td>{{ $r->name }}</td>
                                    <td>{{ $r->info }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('dashboard.types.edit', $r->id) }}" class="btn btn-success">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form action="{{ route('dashboard.types.destroy', $r->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="ms-2 btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- Memindahkan link paginasi ke bawah tabel --}}
                    <div class="d-flex justify-content-center">
                        {!! $type->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
