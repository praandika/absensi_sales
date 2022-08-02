@extends('layouts.app')
@section('title','Data Dealer')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6"><h2 class="judul">Data Dealer</h2></div>
        <div class="col-md-6" style="text-align: right;">
            <button class="btn custom-btn padding-btn" data-bs-toggle="modal" data-bs-target="#modalDealer">Tambah Dealer</button>
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
                                <th scope="col">Dealer Code</th>
                                <th scope="col">Dealer Name</th>
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
                                <td><a href="{{ url('dealer/'.$a->id.'/edit') }}" class="btn-edit">Edit</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" style="text-align: center;">No data available</td>
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
<div class="modal fade modalData" id="modalDealer" tabindex="-1" aria-labelledby="modalDealerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDealerLabel">Tambah Dealer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dealer.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col">
                            <input type="text" class="form-control custom-input" placeholder="Kode Dealer" aria-label="Kode Dealer" name="dealer_code" autocomplete="off" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control custom-input" placeholder="Nama Dealer" aria-label="Nama Dealer" name="dealer_name" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn custom-btn">Reset</button>
                    <button type="submit" class="btn custom-btn padding-btn">
                        <img src="{{ asset('img/save.png') }}">&nbsp;Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--modal1-->

@endsection
