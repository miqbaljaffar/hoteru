@extends('dashboard.layout.main')

@section('title')
    <title>Dashboard | Kamar</title>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 mb-0 text-dark-1000">Room Data</h1>
            <a href="{{ route('dashboard.rooms.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Kamar
            </a>
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
                <h5>Total data {{ $rooms->total() }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered" id="myTable">
                        <thead class="table-secondary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Id</th>
                                <th>No</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Capacity</th>
                                <th>Price/day</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $index => $r)
                                <tr>
                                    <td>{{ $rooms->firstItem() + $index }}</td>
                                    <td>{{ $r->id }}</td>
                                    <td>{{ $r->no }}</td>
                                    <td>{{ $r->type->name }}</td>
                                    <td>{{ $r->status->name }}</td>
                                    <td>{{ $r->capacity }}</td>
                                    <td>Rp.{{ number_format($r->price) }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.rooms.show', $r->no) }}" class="btn btn-warning btn-sm text-light me-1" title="Show">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('dashboard.rooms.edit', $r->no) }}" class="btn btn-success btn-sm me-1" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        {{-- Tombol untuk memicu modal hapus --}}
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-room-no="{{ $r->no }}" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- Tambahkan link paginasi jika ada --}}
                <div class="d-flex justify-content-center">
                    {{ $rooms->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus data kamar ini? Tindakan ini tidak dapat dibatalkan.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            {{-- Form ini akan diisi oleh JavaScript --}}
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
<script>
    // Pastikan script ini dieksekusi setelah DOM siap
    $(document).ready(function() {
        console.log('Document is ready. jQuery is loaded.'); // Pesan 1: Konfirmasi jQuery berjalan

        // Menambahkan event listener ke modal
        $('#deleteModal').on('show.bs.modal', function (event) {
            console.log('Delete modal is triggered.'); // Pesan 2: Konfirmasi modal terbuka

            var button = $(event.relatedTarget);
            var roomNo = button.data('room-no');
            console.log('Room number to delete:', roomNo); // Pesan 3: Menampilkan nomor kamar

            var modal = $(this);
            var deleteForm = modal.find('#deleteForm');
            var actionUrl = "{{ url('dashboard/rooms') }}/" + roomNo;

            console.log('Setting form action to:', actionUrl); // Pesan 4: Menampilkan URL action yang akan di-set

            deleteForm.attr('action', actionUrl);
        });
    });
</script>
@endpush
