@extends('layout.main')
@section('title')
<title>
    Pesan | Cakra
</title>
<style>
    *{
        left: 0;
        top: 0;
    }
</style>
@endsection
@section('content')
<section class="hero aligns-center" style="overflow:hidden" id="home">

    <main class="container" style="width: 70%">

        <div class="">
            <div style="margin-bottom:50px">
                <link rel="stylesheet" href="/style/progress-indication.css">
             @include('dashboard.order.progressbar')
            </div>
        </div>

        <div class="card" style="margin-bottom:150px">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name <span style="font-style: italic;">(required)</span></label>
                                <input type="text" class="form-control" id="name" name ='name' required placeholder="ex Jamal Kurniawan">
                            </div>
                            <div class="col-md-4">
                                <label for="username" class="form-label">Username <span style="font-style: italic;">(required)</span></label>
                                <input type="text" class="form-control" id="username" name="username" required placeholder="ex Jamal30">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email <span style="font-style: italic;">(required)</span></label>
                                <input type="text" class="form-control" id="email" name ='email' required placeholder="ex Jamal@gmail.com">
                            </div>
                    </div>
                </div>
                <form action="">
                    @csrf
                </form>
            </div>
        </div>
    </main>
</section>
<!--hero section end-->
@endsection

@section('script')
 <!--feather icon-->
 <script>
    feather.replace()
  </script>

    <!--javascipt ane -->

    <script src="/vendor/jquery/jquery.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="/bs/js/bootstrap.bundle.min.js"></script>
    <script src="/frontend/js/script.js"></script>
@endsection
