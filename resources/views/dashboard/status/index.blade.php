@extends('dashboard.layout.main')

@section('title')
    <title>Dashboard | Status</title>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-4">
                <h1 class="h2 mb-0 text-dark-1000">Status</h1>
                <a href="{{ route('dashboard.statuses.create') }}" class="btn btn-sm shadow border ms-2 mt-1 p-2">
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
        <div class="card border-0 shadow">
            <div class="card-header">
                {{-- Menggunakan $status->total() untuk menampilkan jumlah data --}}
                <h5>Total data {{ $status->total() }}</h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">
                    <table class="table table-sm table-bordered table-responsive" id="myTable">
                        <thead class="table-secondary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Id</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Desc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Menggunakan @forelse untuk menangani data kosong --}}
                            @forelse ($status as $r)
                                <tr>
                                    {{-- Penomoran yang benar untuk paginasi --}}
                                    <td>{{ ($status->currentPage() - 1) * $status->perPage() + $loop->iteration }}</td>
                                    <td>{{ $r->id }}</td>
                                    <td>{{ $r->name }}</td>
                                    <td>{{ $r->code }}</td>
                                    <td>{{ $r->info }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('dashboard.statuses.edit', $r->id) }}" class="me-2 btn btn-success">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form action="{{ route('dashboard.statuses.destroy', $r->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- Memindahkan link paginasi ke bawah tabel --}}
                    <div class="d-flex justify-content-center">
                        {!! $status->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
