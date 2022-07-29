<table class="table">
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
