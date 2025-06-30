@extends('dashboard.layout.main')

@section('title')
    <title>Dashboard | Edit Type {{ $type->name }}</title>
@endsection

@section('content')
    <div class="row">
        <!-- Content Row -->
        <div class="col-lg-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Type kamar {{ $type->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-auto">
                            <form action="{{ route('dashboard.types.update', $type->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="name" class="form-label">Name <span style="font-style: italic;">(required)</span></label>
                                        <input type="text" class="form-control" value="{{ $type->name }}" id="name" name="name" placeholder="Vacant">
                                    </div>
                                    {{-- <div class="col-md-5">
                                        <label for="code" class="form-label">Code <span style="font-style: italic;">(required)</span></label>
                                        <input type="text" class="form-control" value="{{ $type->code }}" id="code" name="code" placeholder="V">
                                    </div> --}}
                                </div>

                                <div class="row">
                                    <div class="col-md-10 mt-3">
                                        <label for="info" class="form-label">Description <span style="font-style: italic;">(required)</span></label>
                                        <textarea placeholder="Sebutan bagi kamar yang kosong" name="info" id="info" rows="3" class="form-control">{{ $type->info }}</textarea>
                                    </div>
                                </div>

                                <button class="btn btn-dark mt-4" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- End of Main Content -->
