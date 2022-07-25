
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
