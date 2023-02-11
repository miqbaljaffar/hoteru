@extends('layout.main')
@section('title')
<title>
    Pesan | Cakra
</title>
@endsection
@section('content')
<section class="hero" id="home">
    <main class="content">
            <h1>Mari Nginep Di<span>hotel Kami</span></h1>
            <p>Mau cari hotel yang Murah? Ada lo</p>
            <a href="/pesan" class="cta">Pesan Sekarang!</a>
    </main>
</section>
<!--hero section end-->

<!--About Section ya dek -->


<section id="about" style="margin-bottom: 80px" class="about">
    <h2><span>Tentang</span> Kami</h2>
    <div class="rows">
        <div class="about-img"><img src="/frontend/img/tentang-kami.jpg" alt="Tentang Kami">
        </div>
        <div class="content">
            <h3>Kenapa Memili hotel Kami</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est eligendi maiores, eveniet quas omnis dolorum.</p>
            <p>Mau cari hotel yang Murah? Di kenangan senja aja</p>
        </div>
    </div>
</section>


<!--About Section end ya noob-->


<!--Fasilitas Section strat ya deck-->

<section id="fasilitas" style="background-color: rgb(02, 50, 24)" class="menus">
<h2><span>Fasilitas</span>Kami</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium rerum commodi ipsa cum sit expedita.</p>
<div class="rows">
    <div class="menus-card">
        <img src="/frontend/img/fasilitas/1.jpg" alt="renang" class="menus-card-img">
        <h3 class="menus-card-title">-Kolam Renang</h3>
        <p class="menus-card-price">GRATIS</p>
    </div>
    <div class="menus-card">
        <img src="/frontend/img/fasilitas/2.jpg" alt="renang" class="menus-card-img">
        <h3 class="menus-card-title">-Free Wifi-</h3>
        <p class="menus-card-price">GRATIS</p>
    </div>
    <div class="menus-card">
        <img src="/frontend/img/fasilitas/3.jpg" alt="renang" class="menus-card-img">
        <h3 class="menus-card-title">-Sarapan Pagi-</h3>
        <p class="menus-card-price">GRATIS</p>
    </div>
    <div class="menus-card">
        <img src="/frontend/img/fasilitas/4.jpg" alt="renang" class="menus-card-img">
        <h3 class="menus-card-title">-Bathup-</h3>
        <p class="menus-card-price">GRATIS</p>
    </div>
    <div class="menus-card">
        <img src="/frontend/img/fasilitas/5.jpg" alt="renang" class="menus-card-img">
        <h3 class="menus-card-title">-Makan Siang</h3>
        <p class="menus-card-price">GRATIS</p>
    </div>
</div>

</section>
<!--Fasilitas section end ya noob-->

<!--Kontak Section Start ya deck-->
<section id="contact" class="contact container">
<h2><span>Kontak</span>Kami</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium rerum commodi ipsa cum sit expedita.</p>
<div class="row">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9060098636683!2d106.96529953804958!3d-6.406108795364871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6995d20156e367%3A0x5b7cd089c3c57813!2sSMK%20Bina%20Mandiri%20Multimedia%20Cileungsi!5e0!3m2!1sid!2sid!4v1675517872782!5m2!1sid!2sid"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

</div>
</section>

<section id="a" style="background-color: rgb(02, 50, 24)" class="menus">
    <h2><span>Fasilitas</span>Kami</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium rerum commodi ipsa cum sit expedita.</p>
    <div class="rows">
        <div class="menus-card">
            <img src="/frontend/img/fasilitas/1.jpg" alt="renang" class="menus-card-img">
            <h3 class="menus-card-title">-Kolam Renang</h3>
            <p class="menus-card-price">GRATIS</p>
        </div>
        <div class="menus-card">
            <img src="/frontend/img/fasilitas/2.jpg" alt="renang" class="menus-card-img">
            <h3 class="menus-card-title">-Free Wifi-</h3>
            <p class="menus-card-price">GRATIS</p>
        </div>
        <div class="menus-card">
            <img src="/frontend/img/fasilitas/3.jpg" alt="renang" class="menus-card-img">
            <h3 class="menus-card-title">-Sarapan Pagi-</h3>
            <p class="menus-card-price">GRATIS</p>
        </div>
        <div class="menus-card">
            <img src="/frontend/img/fasilitas/4.jpg" alt="renang" class="menus-card-img">
            <h3 class="menus-card-title">-Bathup-</h3>
            <p class="menus-card-price">GRATIS</p>
        </div>
        <div class="menus-card">
            <img src="/frontend/img/fasilitas/5.jpg" alt="renang" class="menus-card-img">
            <h3 class="menus-card-title">-Makan Siang</h3>
            <p class="menus-card-price">GRATIS</p>
        </div>
    </div>

    </section>

@endsection

@section('footer')
<footer style="background-color:#010101">
    <div class="socials">
        <a href="https://www.instagram.com/ozanrevol123/"><i data-feather="instagram"></i></a>
        <a href="https://twitter.com/FGusdani"><i data-feather="twitter"></i></a>
        <a href="https://www.facebook.com/whoami.clay.50767"><i data-feather="facebook"></i></a>
    </div>

    <div class="links">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="fasilitas">Fasilitas Kami</a>
        <a href="#contact">Kontak</a>
    </div>
    <div class="credit">
        <p>Created By <a href="">Fauzan Gusdani</a>. | &copy; 2023.</p>
    </div>
</footer>

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
