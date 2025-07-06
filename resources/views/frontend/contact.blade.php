@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | Kontak Kami</title>
@endsection

@section('content')
<div class="my-5 px-4 text-center">
    <h2 class="fw-bold h-font">HUBUNGI KAMI</h2>
    <div class="h-line bg-dark mx-auto"></div>
    <p class="text-muted mt-3">Kami siap membantu Anda. Jangan ragu untuk menghubungi kami.</p>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-lg-8 col-md-12 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-0">
                    <iframe class="w-100 rounded" height="450" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.221705411551!2d106.827153!3d-6.175392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3f69c4cba93%3A0x9d394700a6044fcb!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1675517872782!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
             <div class="bg-white p-4 rounded shadow-sm">
                <h5 class="mb-4">Informasi Kontak</h5>
                <div class="d-flex align-items-start mb-3">
                    <i class="bi bi-geo-alt-fill fs-4 me-3"></i>
                    <div>
                        <strong>Alamat</strong><br>
                        <a href="#" target="_blank" class="text-decoration-none text-dark">Aurora Haven, Jl. Pegangsaan Timur No.1</a>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-3">
                    <i class="bi bi-telephone-fill fs-4 me-3"></i>
                    <div>
                        <strong>Telepon</strong><br>
                        <a href="tel:+62123" class="text-decoration-none text-dark d-block">+62 123 4567</a>
                         <a href="tel:+62911" class="text-decoration-none text-dark d-block">+62 911 (Darurat)</a>
                    </div>
                </div>
                 <div class="d-flex align-items-start mb-3">
                    <i class="bi bi-envelope-fill fs-4 me-3"></i>
                    <div>
                        <strong>Email</strong><br>
                        <a href="mailto:info@aurorahaven.com" class="text-decoration-none text-dark">info@aurorahaven.com</a>
                    </div>
                </div>
                <hr>
                 <h5 class="mt-4 mb-3">Ikuti Kami</h5>
                <div>
                    <a href="#" class="btn btn-outline-dark btn-sm me-1"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="btn btn-outline-dark btn-sm me-1"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-outline-dark btn-sm"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
