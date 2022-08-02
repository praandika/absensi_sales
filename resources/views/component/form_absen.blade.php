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
