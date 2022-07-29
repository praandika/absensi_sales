@extends('layouts.app')
@section('title','Absen')

@section('content')

<div class="container">
    @include('component.tab')
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
            tabindex="0">

            @include('component.form_absen')

            <div class="row justify-content-center">
                <div class="col-md-12 container-table-custom">
                    <table class="table table-custom" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @forelse ($data as $a)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$a->nama_sales}}</td>
                                <td>{{$a->tanggal}}</td>
                                <td>{{$a->waktu}}</td>
                                <td>{{$a->keterangan}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">No data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Absen Masuk --}}
        </div>


        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">

            {{-- Absen OFF --}}
            <form class="row g-3 form-custom" action="{{ route('absen.off') }}" method="post">
                @csrf

                <div class="form-group form-floating-label">
                    <input type="hidden" id="sales_id3" name="sales_id3" value="{{ old('sales_id3') }}" required>
                    <input id="nama_sales3" type="text" class="form-control input-border-bottom custom-input"
                        name="nama_sales3" value="{{ old('nama_sales3') }}" data-bs-toggle="modal"
                        data-bs-target="#exampleModal3" style="text-transform: uppercase;" placeholder="Nama Salesman"
                        required>
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
    </div>
</div>

@include('component.modal1')
@include('component.modal2')
@include('component.modal3')


@push('script')
<script>
    $(document).on('click', '.klik', function (e) {
        $('#sales_id').val($(this).attr('data-id'));
        $('#nama_sales').val($(this).attr('data-nama'));
        $('#exampleModal').modal('hide');
    });

</script>

<script>
    $(document).on('click', '.klik2', function (e) {
        $('#sales_id2').val($(this).attr('data-id2'));
        $('#nama_sales2').val($(this).attr('data-nama2'));
        $('#exampleModal2').modal('hide');
    });

</script>

<script>
    $(document).on('click', '.klik3', function (e) {
        $('#sales_id3').val($(this).attr('data-id3'));
        $('#nama_sales3').val($(this).attr('data-nama3'));
        $('#exampleModal3').modal('hide');
    });

</script>

<script>
    $(document).ready(function () {
        $('.tableSales').DataTable();
    });

</script>
@endpush


@endsection
