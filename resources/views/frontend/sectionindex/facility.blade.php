<h2 class="mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
<div class="container">
    <div class="row justify-content-center g-4">
        {{--
          Looping data fasilitas secara dinamis dari database.
          Variabel $facilities ini dikirim dari Controller.
        --}}
        @foreach ($facilities as $facility)
            <div class="col-lg-2 col-md-3 col-6 text-center bg-white rounded shadow py-4">
                {{-- Mengambil path gambar dari kolom 'icon' di database --}}
                <img src="{{ asset('storage/' . $facility->icon) }}" class="img-fluid facility-img" alt="{{ $facility->name }}">

                {{-- Mengambil nama fasilitas dari kolom 'name' di database --}}
                <h5 class="mt-3">{{ $facility->name }}</h5>
            </div>
        @endforeach
    </div>
</div>
