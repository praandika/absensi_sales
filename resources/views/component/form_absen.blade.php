<!--Absen Masuk-->
<form class="row g-3 form-custom" action="{{ route('absen.store') }}" method="post">
    @csrf

    <div class="form-group form-floating-label">
        <input type="hidden" id="sales_id" name="sales_id" value="{{ old('sales_id') }}" required>
        <input id="nama_sales" type="text" class="form-control input-border-bottom custom-input" name="nama_sales"
            value="{{ old('nama_sales') }}" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="text-transform: uppercase;" placeholder="Nama Salesman" required>
    </div>

    <div class="col-auto">
        <button type="submit" class="btn mb-3 custom-btn padding-btn">
            <img src="{{ asset('img/save.png') }}">&nbsp;ABSEN YUK
        </button>
    </div>
    <hr class="hr"/>
</form>

<!--pilih tanggal-->
<form class="row g-3 form-custom" action="{{ route('absen.search') }}">
    <div class="form-group form-floating-label col-lg-3">
        <input type="hidden" id="sales_id2" name="sales_id2" value="{{ old('sales_id2') }}" required>
        <input id="nama_sales2" type="text" class="form-control input-border-bottom custom-input" name="nama_sales2"
            value="{{ old('nama_sales2') }}" data-bs-toggle="modal" data-bs-target="#exampleModal2"
            style="text-transform: uppercase;" placeholder="Nama Salesman" required>
    </div>

    <div class="form-group form-floating-label col-lg-3">
        <input id="tanggal_awal" type="date" class="form-control input-border-bottom custom-input" name="tanggal_awal"
            value="{{ old('tanggal_awal') }}" data-bs-toggle="modal" style="text-transform: uppercase;" required>
    </div>

    <div class="form-group form-floating-label col-lg-3">
        <input id="tanggal_akhir" type="date" class="form-control input-border-bottom custom-input" name="tanggal_akhir"
            value="{{ old('tanggal_akhir') }}" data-bs-toggle="modal" style="text-transform: uppercase;" required>
    </div>

    <div class="form-group form-floating-label col-lg-3">
        <button type="submit" class="btn mb-3 custom-btn padding-btn">
            <img src="{{ asset('img/search.png') }}">&nbsp;CARI
        </button>
    </div>
</form>
<!--pilih tanggal-->
