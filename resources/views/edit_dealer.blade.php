@extends('layouts.app')
@section('title','Edit Dealer')

@section('content')
@foreach($data as $o)
<div class="container">
    <div class="card card-custom">
        <form action="{{ route('dealer.update') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $o->id }}" name="id">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label custom-label">Nama Dealer</label>
                <input type="text" class="form-control custom-input" id="formGroupExampleInput" placeholder="Nama Dealer"
                    value="{{ $o->dealer_name }}" name="dealer_name">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label custom-label">Kode Dealer</label>
                <input type="text" class="form-control custom-input" id="formGroupExampleInput" placeholder="Kode Dealer"
                    value="{{ $o->dealer_code }}" name="dealer_code">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <button type="reset" class="btn custom-btn">Reset</button>
                </div>
                <div class="col-md-6" style="text-align: right;">
                    <button type="submit" class="btn custom-btn padding-btn">
                        <img src="{{ asset('img/save.png') }}">&nbsp;Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection
