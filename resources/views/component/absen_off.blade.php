<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">

    {{-- Absen OFF --}}
    <form class="row g-3 form-custom" action="{{ route('absen.off') }}" method="post">
        @csrf

        <div class="form-group form-floating-label">
            <input type="hidden" id="sales_id3" name="sales_id3" value="{{ old('sales_id3') }}" required>
            <input id="nama_sales3" type="text" class="form-control input-border-bottom custom-input" name="nama_sales3"
                value="{{ old('nama_sales3') }}" data-bs-toggle="modal" data-bs-target="#exampleModal3"
                style="text-transform: uppercase;" placeholder="Nama Salesman" required>
        </div>

        <div class="form-group form-floating-label col-lg-3">
            <input id="tanggal" type="date" class="form-control input-border-bottom custom-input" name="tanggal"
                value="{{ old('tanggal') }}" data-bs-toggle="modal" style="text-transform: uppercase;" required>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn mb-3 custom-btn padding-btn">
                <img src="{{ asset('img/save.png') }}">&nbsp;ABSEN YUK
            </button>
        </div>
    </form>

    {{-- Absen OFF --}}
</div>
