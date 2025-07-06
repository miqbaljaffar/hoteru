@extends('frontend.inc.main')

@section('title')
    <title>Aurora Haven | Hotel Modern dan Nyaman</title>
@endsection

@section('content')
    {{-- Swiper Image & Form Pencarian --}}
    {{-- Bagian ini digabungkan agar form bisa "tumpang tindih" dengan swiper untuk efek modern --}}
    <div style="position: relative;">
        @include('frontend.sectionindex.swiper')
        @include('frontend.sectionindex.form')
    </div>

    {{-- Bagian Kamar Unggulan --}}
    <section class="container my-5 py-5">
        @include('frontend.sectionindex.kamar')
    </section>

    {{-- Bagian Fasilitas --}}
    {{-- Diberi latar belakang berbeda untuk memisahkan section secara visual --}}
    <section class="bg-light py-5">
        <div class="container">
            @include('frontend.sectionindex.facility')
        </div>
    </section>

    {{-- Bagian Kontak & Peta --}}
    <section class="container my-5 py-5">
        @include('frontend.sectionindex.contact')
    </section>
@endsection
