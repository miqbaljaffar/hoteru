@extends('p')

@section('title')
    <title>Cakra | </title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="hero" id="home">
    <main class="content">
            <h1>Mari Nginep Di<span>hotel Kami</span></h1>
            <p>Mau cari hotel yang Murah? Ada lo</p>
            <a href="/pesan" class="cta">Pesan Sekarang!</a>
    </main>
</section>
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container" style="margin-top: 70px">

              <!-- Marketing messaging and featurettes
              ================================================== -->
              <!-- Wrap the rest of the page in another container to center all the content. -->
                <hr class="featurette-divider">
                <div class="row featurette">
                  <div class="col-md-7">
                    <a style="text-decoration:none;color:black" href="/products/ apts1->slug ">
                    <h2 class="featurette-heading"> apts1->nm_products . <span class="text-muted">Barang pertama dan terlaris!</span></h2></a>


                  </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                  <div class="col-md-7 order-md-2">
                    <a style="text-decoration:none;color:black" href="/products/ apts2->slug "><h2 class="featurette-heading"> apts2->nm_products. <span class="text-muted">Barang terbaru.</span></h2></a>

                  </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                  <div class="col-md-7">
                    <h2 class="featurette-heading">Coming soon! <span class="text-muted">Blue Calming Mask Moisturizer</span></h2>
                    <p class="lead">Menenangkan kulit, bantu perbaiki skin barrier, mempercepat penyembuhan jerawat dan bekas jerawat. memberikan kelembaban ekstra untuk kulit wajah yang kenyal dan kencang.</p>
                  </div>
                  <div class="col-md-5">
                    <img class="bd-placeholder-img overflow-hidden bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="/img/comingsoon.jpg">

                  </div>
                </div>

                <hr class="featurette-divider">

                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">



                    <div class="carousel-inner">

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>







              </div><!-- /.container -->






          <!-- Small boxes (Stat box) -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        -- <i class="fas fa-globe mr-1"></i> --
                        Kategori
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                    <div class="row ms-1">

                    </div>
                </div>
            </div>
            <hr class="featurette-divider">

            -- </div> --

        <!--     <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                  <h1 class="fw-light">Album example</h1>
                  <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                  <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                  </p>
                </div>
              </div>
            </section -->


            -- product album --

            <div class="album py-5 bg-light">
              <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                </div>
                <div class="d-flex justify-content-center mt-5 mb-5">
                  --  aproducts->links()  --
                  <h4> <a href="/products" class="nav-link"> See other products</a>
                  </h4> </div>
            </div>
              </div>
            </div>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
@endsection
