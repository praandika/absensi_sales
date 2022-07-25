@extends('layouts.app')

@section('content')

<div class="container">
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Absen Masuk</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Absen OFF</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
    
    <!--Absen Masuk-->
    <form class="row g-3 mt-2" action="{{ route('absen.store') }}" method="post" >
      @csrf
      
       <div class="form-group form-floating-label">
           <input type="hidden" id="sales_id" name="sales_id" value="{{ old('sales_id') }}" required>
           <input id="nama_sales" type="text" class="form-control input-border-bottom"
               name="nama_sales" value="{{ old('nama_sales') }}" data-bs-toggle="modal" 
               data-bs-target="#exampleModal" style="text-transform: uppercase;" required>
       </div>
   
       <div class="col-auto">
         <button type="submit" class="btn btn-danger mb-3">Absen !</button>
       </div>
     </form>

     <hr/>

     <!--pilih tanggal-->
     <form class="row g-3" action="{{ route('absen.show') }}" method="post" >
       @csrf

       <div class="form-group form-floating-label col-lg-3">
         <input type="hidden" id="sales_id2" name="sales_id2" value="{{ old('sales_id2') }}" required>
         <input id="nama_sales2" type="text" class="form-control input-border-bottom"
             name="nama_sales2" value="{{ old('nama_sales2') }}" data-bs-toggle="modal" 
             data-bs-target="#exampleModal2" style="text-transform: uppercase;" required>
     </div>
       
        <div class="form-group form-floating-label col-lg-3">
            <input id="tanggal_awal" type="date" class="form-control input-border-bottom"
                name="tanggal_awal" value="{{ old('tanggal_awal') }}" data-bs-toggle="modal" style="text-transform: uppercase;" required>
        </div>

        <div class="form-group form-floating-label col-lg-3">      
         <input id="tanggal_akhir" type="date" class="form-control input-border-bottom"
             name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" data-bs-toggle="modal" style="text-transform: uppercase;" required>
         </div>

        <div class="form-group form-floating-label col-lg-3">
          <button type="submit" class="btn btn-primary mb-3">Cari</button>
        </div>
      </form>
      <!--pilih tanggal-->

      <form class="row g-3" action="{{ route('absen.export_excel') }}" method="post" >
        @csrf
 
        {{-- <div class="form-group form-floating-label col-lg-3">
          <input type="hidden" id="sales_id2" name="sales_id2" value="{{ old('sales_id2') }}" required>
          <input id="nama_sales2" type="text" class="form-control input-border-bottom"
              name="nama_sales2" value="{{ old('nama_sales2') }}" data-bs-toggle="modal" 
              data-bs-target="#exampleModal2" style="text-transform: uppercase;" required>
      </div> --}}
        
         <div class="form-group form-floating-label col-lg-3">
             <input id="tanggal_awal" type="date" class="form-control input-border-bottom"
                 name="tanggal_awal" value="{{ old('tanggal_awal') }}" data-bs-toggle="modal" style="text-transform: uppercase;" required>
         </div>
 
         <div class="form-group form-floating-label col-lg-3">      
          <input id="tanggal_akhir" type="date" class="form-control input-border-bottom"
              name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" data-bs-toggle="modal" style="text-transform: uppercase;" required>
          </div>
 
         <div class="form-group form-floating-label col-lg-3">
           <button type="submit" class="btn btn-primary mb-3">export excel</button>
         </div>
       </form>
      <a href="" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>

     <div class="row justify-content-center">
       <div class="col-md-12">
           <div class="card">
               <table class="table">
                   <thead>
                     <tr>
                       <th scope="col">#</th>
                       <th scope="col">nama</th>
                       <th scope="col">tanggal</th>
                       <th scope="col">waktu</th>
                       <th scope="col">keterangan</th>
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
                       <td colspan="4" style="text-align: center;">No data available</td>
                       </tr>
                   @endforelse

                   </tbody>
                      
                 </table>
           </div>
       </div>
   </div>
    {{-- Absen Masuk --}}
  </div>


<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
    
{{-- Absen OFF --}}
<form class="row g-3 mt-2" action="{{ route('absen.off') }}" method="post" >
  @csrf
  
   <div class="form-group form-floating-label">
       <input type="hidden" id="sales_id3" name="sales_id3" value="{{ old('sales_id3') }}" required>
       <input id="nama_sales3" type="text" class="form-control input-border-bottom"
           name="nama_sales3" value="{{ old('nama_sales3') }}" data-bs-toggle="modal" 
           data-bs-target="#exampleModal3" style="text-transform: uppercase;" required>
   </div>

   <div class="form-group form-floating-label col-lg-3">
    <input id="tanggal" type="date" class="form-control input-border-bottom"
        name="tanggal" value="{{ old('tanggal') }}" data-bs-toggle="modal" style="text-transform: uppercase;" required>
    </div>

   <div class="col-auto">
     <button type="submit" class="btn btn-danger mb-3">Absen !</button>
   </div>
 </form>

{{-- Absen OFF --}}
  </div>
</div>
</div>

<!--modal 1-->
<div class="modal fade modalData" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="modal-filter-select" class="display table table-striped table-hover" width="100%">
          <thead>
            <tr>
                <th>Nama Sales</th>
            </tr>
        </thead>
        <tbody>
          @forelse($sale as $o)
          <tr data-id="{{ $o->id}}" data-nama="{{ $o->nama_sales }}" class="klik">
              <td>{{ $o->nama_sales }}</td>
          </tr>
          @empty
          <tr>
              <td colspan="6" style="text-align: center;">No data available</td>
          </tr>
          @endforelse
      </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--modal1-->

<!--modal 2-->
<div class="modal fade modalData" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="modal-filter-select" class="display table table-striped table-hover" width="100%">
          <thead>
            <tr>
                <th>Nama Sales</th>
            </tr>
        </thead>
        <tbody>
          @forelse($sale as $o)
          <tr data-id2="{{ $o->id}}" data-nama2="{{ $o->nama_sales }}" class="klik2">
              <td>{{ $o->nama_sales }}</td>
          </tr>
          @empty
          <tr>
              <td colspan="6" style="text-align: center;">No data available</td>
          </tr>
          @endforelse
      </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--modal2-->

<!--modal 3-->
<div class="modal fade modalData" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="modal-filter-select" class="display table table-striped table-hover" width="100%">
          <thead>
            <tr>
                <th>Nama Sales</th>
            </tr>
        </thead>
        <tbody>
          @forelse($sale as $o)
          <tr data-id3="{{ $o->id}}" data-nama3="{{ $o->nama_sales }}" class="klik3">
              <td>{{ $o->nama_sales }}</td>
          </tr>
          @empty
          <tr>
              <td colspan="6" style="text-align: center;">No data available</td>
          </tr>
          @endforelse
      </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--modal3-->

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
@endpush


@endsection
