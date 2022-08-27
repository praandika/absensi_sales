<!--pilih tanggal-->
<form class="row g-3 form-custom" action="{{ route('absen.search') }}">
    <div class="form-group form-floating-label col-lg-3">
        <input type="hidden" id="dealer_code" name="dealer_code" value="{{ old('dealer_code') }}" required>
        <input type="hidden" id="sales_id2" name="sales_id2" value="{{ old('sales_id2') }}" required>
        <input id="nama_sales2" type="text" class="form-control input-border-bottom custom-input" name="nama_sales2"
            value="{{ old('nama_sales2') }}" data-bs-toggle="modal" data-bs-target="#exampleModal2"
            style="text-transform: uppercase;" placeholder="Nama Manpower" required>
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