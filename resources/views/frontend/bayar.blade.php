@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | FORM BUKTI PEMBAYARAN</title>
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0 mb-md-0">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <div class="row">
                            <h4>Detail Pesanan <span>#{{ $pay->invoice }}</span></h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <label for="room_number" class="col-sm-2 col-form-label">Room</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_no" name="room_no" value="{{ $t->room->no }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="room_type" class="col-sm-2 col-form-label">Type</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_type" name="room_type" value="{{ $t->room->type->name }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="room_capacity" class="col-sm-2 col-form-label">Capacity</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_capacity" name="room_capacity" value="{{ $t->room->capacity }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="room_price" class="col-sm-2 col-form-label">Price / Day</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_price" name="room_price" value="IDR {{ number_format($t->room->price) }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="col-sm-12 mt-2">
                            <div class="row mb-3">
                                <label for="check_in" class="col-sm-2 col-form-label">Check In</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="check_in" name="check_in" value="{{ Carbon\Carbon::parse($t->check_in)->isoformat('D MMMM Y') }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="check_out" class="col-sm-2 col-form-label">Check Out</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="check_out" name="check_out" value="{{ Carbon\Carbon::parse($t->check_out)->isoformat('D MMMM Y') }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="how_long" class="col-sm-2 col-form-label">Total Day</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="how_long" name="how_long" value="{{ $t->check_in->diffInDays($t->check_out) }} Day" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="total_price" class="col-sm-2 col-form-label">Total Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="total_price" name="total_price" value="IDR {{ number_format($price) }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="paymentmethod" class="col-sm-2 col-form-label">Payment Method</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="paymentmethod" id="paymentmethod" value="{{ $pay->Methode->nama }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card mb-4 shadow-lg border-0">
                    <div class="container">
                        <div class="card-body">
                            <div class="row">
                                <h4>Kirim Bukti Pembayaran</h4>
                            </div>
                            <hr>
                            <div class="row">
                                <label for="" class="mb-2 form-label">Transfer ke : &nbsp;</label>
                                <h5>{{ $pay->Methode->no_rek }}</h5>
                            </div>
                            <div class="row justify-content-start mt-4">
                                <div class="col-md-12">
                                    <form action="/bayar" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="image" class="mb-2">Upload Bukti <span class="fst-italic">(Max 3mb)</span></label>
                                        <input required type="file" class="form-control mb-3" name="image" id="image">
                                        <input type="hidden" name="id" value="{{ $pay->id }}">
                                        <button class="btn btn-primary" type="submit">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
