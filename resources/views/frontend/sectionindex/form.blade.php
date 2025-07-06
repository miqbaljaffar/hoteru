<div class="container availability-form" style="margin-top: -60px; z-index: 2; position: relative;">
    <div class="row">
        <div class="col-lg-12 bg-white shadow-lg p-4 rounded">
            <h5 class="mb-4">Cek Ketersediaan Kamar</h5>
            <form action="/rooms" method="GET">
                <div class="row align-items-end g-3">
                    <div class="col-lg-4 col-md-12">
                        <label class="form-label">Check-in</label>
                        <input type="date" name="from" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <label class="form-label">Check-out</label>
                        <input type="date" name="to" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <label class="form-label">Jumlah Tamu</label>
                        <input type="number" name="count" class="form-control shadow-none" min="1" value="1">
                    </div>
                    <div class="col-lg-1 col-md-12">
                        <button type="submit" class="btn btn-dark w-100 shadow-none">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
