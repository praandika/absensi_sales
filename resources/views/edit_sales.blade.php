@extends('layouts.app')
@section('title','Edit Sales')

@section('content')
@foreach($data as $o)
<div class="container">
    <div class="card card-custom">
        <form action="{{ route('sales.update') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $o->id }}" name="id">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label custom-label">Nama</label>
                <input type="text" class="form-control custom-input" id="formGroupExampleInput" placeholder="Nama"
                    value="{{ $o->nama_sales }}" name="nama">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label custom-label">Dealer</label>
                <select class="form-select custom-select" aria-label="Default select example" name="dealer" required>
                    <option value="{{ $o->dealer_id }}" selected>{{ $o->dealer_name }}</option>
                    <option disabled><hr></option>
                    @foreach($dealer as $a)
                    <option value="{{ $a->id }}">{{ $a->dealer_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <button type="reset" class="btn custom-btn">Reset</button>
                </div>
                <div class="col-md-6" style="text-align: right;">
                    <button type="button" class="btn custom-btn padding-btn">
                        <img src="{{ asset('img/save.png') }}">&nbsp;Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection
