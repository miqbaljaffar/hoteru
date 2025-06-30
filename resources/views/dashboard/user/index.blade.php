@extends('dashboard.layout.main')

@section('title')
    <title>Dashboard | User</title>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-4">
                <h1 class="h2 mb-0 text-dark-1000">User</h1>
                <a href="/dashboard/user/create" class="btn btn-sm shadow border ms-2 mt-1 p-2">
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
                {{-- Menggunakan $user->total() untuk menampilkan jumlah data pengguna yang dipaginasi --}}
                <h5>Total data {{ $user->total() }}</h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">
                    <table class="table table-responsive table-sm table-bordered" id="myTable">
                        <thead class="table-secondary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Name</th>
                                <th>Username</th>
                                <th>Telp</th>
                                <th>Birthdate</th>
                                <th>Jk</th>
                                <th>Email</th>
                                <th>Nik</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Memeriksa apakah koleksi $user kosong --}}
                            @forelse ($user as $u)
                                <tr>
                                    {{-- Penomoran yang benar untuk paginasi --}}
                                    <td>{{ ($user->currentPage() - 1) * $user->perPage() + $loop->iteration }}</td>
                                    <td>{{ $u->Customer->name ?? '-' }}</td>
                                    <td>{{ $u->username ?? '-' }}</td>
                                    <td>{{ $u->telp ?? '-' }}</td>
                                    <td>{{ $u->Customer->birthdate ?? '-' }}</td>
                                    <td>{{ $u->Customer->jk ?? '-' }}</td>
                                    <td>{{ $u->email ?? '-' }}</td>
                                    <td>{{ $u->Customer->nik ?? '-' }}</td>
                                    <td>{{ $u->Customer->address ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/dashboard/user/{{ $u->username }}/edit" class="btn btn-success">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            {{-- Form ini sudah berfungsi dengan `onclick` confirm --}}
                                            <form action="{{ route('dashboard.users.destroy', $u->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger me-1 ms-1" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="table-secondary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Name</th>
                                <th>Username</th>
                                <th>Telp</th>
                                <th>Birthdate</th>
                                <th>Jk</th>
                                <th>Email</th>
                                <th>Nik</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{-- Menempatkan link paginasi di bawah tabel --}}
                    <div class="d-flex justify-content-center">
                        {!! $user->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script `deleteConfirmation` telah dihapus karena tidak digunakan dan mengandung error --}}
@endsection
