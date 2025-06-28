@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | KONTAK KAMI</title>
@endsection

@section('content')
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
    </div>

    <div class="container mb-5">
        <div class="bg-white rounded shadow p-4" style="margin-bottom:140px">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Map Section -->
                    <div class="col-lg-8 col-md-6 mb-5 px-4">
                        <iframe class="w-100 rounded" height="320px" 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.221705411551!2d106.827153!3d-6.175392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3f69c4cba93%3A0x9d394700a6044fcb!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1675517872782!5m2!1sid!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map">
                        </iframe>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="col-lg-4">
                        <!-- Address Section -->
                        <h5>Address</h5>
                        <a href="https://goo.gl/maps/jy8CDHNPpsyBHVHYA" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                            <i class="bi bi-geo-alt-fill"></i> Aurora Haven jl. pegangsaan timur no.1
                        </a>

                        <!-- Phone Section -->
                        <h5 class="mt-4">Call us</h5>
                        <a href="tel:+62123" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i> +62 123
                        </a>
                        <br>
                        <a href="tel:+62911" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i> +62 911
                        </a>

                        <!-- Email Section -->
                        <h5 class="mt-4">Email</h5>
                        <a href="mailto:aurorahaven@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-envelope-fill"></i> aurorahaven@gmail.com
                        </a>

                        <!-- Social Media Section -->
                        <h5 class="mt-4">Follow us</h5>
                        <a href="#" class="d-inline-block text-dark fs-5 me-2">
                            <i class="bi bi-twitter me-1"></i>
                        </a>
                        <a href="#" class="d-inline-block text-dark fs-5 me-2">
                            <i class="bi bi-facebook me-1"></i>
                        </a>
                        <a href="#" class="d-inline-block text-dark fs-5">
                            <i class="bi bi-instagram me-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
