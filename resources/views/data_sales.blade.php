@extends('layouts.app')
@section('title','Data Manpower')

@section('content')

<div class="container">
    <div class="row">
        {{ Auth::user()->dealer }}
        <div class="col-md-6"><h2 class="judul">Data Manpower</h2></div>
        <div class="col-md-6" style="text-align: right;">
            <button class="btn custom-btn padding-btn" data-bs-toggle="modal" data-bs-target="#modalSales">Tambah Manpower</button>
        </div>
    </div>
    <br>
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="table-responsive">
                    <table class="table table-custom" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Dealer</th>
                                <th scope="col">Nama</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @forelse ($data as $a)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$a->dealer_code}}</td>
                                <td>{{$a->dealer_name}}</td>
                                <td>{{$a->nama_sales}}</td>
                                <td><a href="{{ url('sales/'.$a->id.'/edit') }}" class="btn-edit">Edit</a></td>
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
        </div>
    </div>
</div>

<!--modal 1-->
<div class="modal fade modalData" id="modalSales" tabindex="-1" aria-labelledby="modalSalesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSalesLabel">Tambah Manpower</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('sales.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col">
                            <input type="text" class="form-control custom-input" placeholder="Nama" aria-label="Nama" name="nama" autocomplete="off" required>
                        </div>
                        @if(Auth::user()->dealer == 'group')
                        <div class="col">
                            <select class="form-select custom-select" aria-label="Default select example" name="dealer" required>
                                <option selected>Pilih Dealer</option>
                                @foreach($dealer as $o)
                                <option value="{{ $o->id }}">{{ $o->dealer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                            @foreach($dealer as $o)
                            <div class="col">
                                <input type="text" class="form-control custom-input" placeholder="Dealer" aria-label="Dealer" name="dealer" autocomplete="off" value="{{ $o->dealer_name }}" required>
                            </div>
                            <input type="hidden" name="dealer" value="{{ $o->id }}">
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn custom-btn">Reset</button>
                    <button type="submit" class="btn custom-btn padding-btn">
                        <img src="{{ asset('img/save.png') }}">&nbsp;Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--modal1-->

@endsection
