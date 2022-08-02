<table class="table">
    <thead>
        <tr>
            <th colspan="5" style="font-size: 20px; font-weight: bold; text-align: center;">Absensi Salesman Bisma
            </th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>Nama</th>
            @forelse ($nama as $o)
            <th>: {{ $o->nama_sales }}</th>
            @empty
            <th style="color: red;">Unable to get sales name</th>
            @endforelse
        </tr>

        <tr>
            <th>Dealer</th>
            @forelse ($dealer as $o)
            <th>: {{ $o->dealer_name }}</th>
            @empty
            <th style="color: red;">Unable to get dealer name</th>
            @endforelse
        </tr>

        <tr>
            <th></th>
        </tr>

        <tr>
            <th scope="col"
                style="background-color: #007acc; color: #ffffff; font-weight: bold; border: 1px solid #92abf6; text-align :center;">
                No</th>
            <th scope="col"
                style="background-color: #007acc; color: #ffffff; font-weight: bold; border: 1px solid #92abf6;">
                Hari</th>
            <th scope="col"
                style="background-color: #007acc; color: #ffffff; font-weight: bold; border: 1px solid #92abf6;">
                Tanggal</th>
            <th scope="col"
                style="background-color: #007acc; color: #ffffff; font-weight: bold; border: 1px solid #92abf6;">
                Waktu</th>
            <th scope="col"
                style="background-color: #007acc; color: #ffffff; font-weight: bold; border: 1px solid #92abf6;">
                Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @php($no = 1)
        @forelse ($data as $a)
        <tr>
            <td style="width: 50px; text-align: center; border: 1px solid #92abf6;">{{$no++}}</td>
            <td style="width: 115px; border: 1px solid #92abf6;">
                {{ Carbon\Carbon::parse($a->tanggal)->translatedFormat('l') }}</td>
            <td style="width: 150px; border: 1px solid #92abf6;">{{$a->tanggal}}</td>
            <td style="width: 150px; border: 1px solid #92abf6;">{{$a->waktu}}</td>
            <td style="width: 150px; border: 1px solid #92abf6;">{{$a->keterangan}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align: center;">No data available</td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td
                style="border: 1px solid #121418; text-align: center; background-color: #121418; font-weight: bold; color: #ffffff;">
                Kerja</td>
            <td
                style="border: 1px solid #121418; text-align: center; background-color: #121418; font-weight: bold; color: #ffffff;">
                Terlambat</td>
            <td
                style="border: 1px solid #121418; text-align: center; background-color: #121418; font-weight: bold; color: #ffffff;">
                Libur</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid #121418; text-align: center; font-size: 15px; font-weight: bold;">
                {{ $kerja }} &nbsp; <span style="font-size: 10px;">Hari</span></td>
            <td style="border: 1px solid #121418; text-align: center; font-size: 15px; font-weight: bold;">
                {{ $terlambat }} &nbsp; <span style="font-size: 10px;">Hari</span></td>
            <td style="border: 1px solid #121418; text-align: center; font-size: 15px; font-weight: bold;">
                {{ $libur }} &nbsp; <span style="font-size: 10px;">Hari</span></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2" style="text-align: center;">Denpasar,
                {{ Carbon\Carbon::parse($today)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2" rowspan="4"></td>
        </tr>

        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            @forelse ($nama as $o)
            <td colspan="2" style="text-align: center;">( {{ $o->nama_sales }} )</td>
            @empty
            <td colspan="2" style="color: red; text-align: center;">( Unable to get sales name )</td>
            @endforelse
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th style="color: red; font-size: 10px; text-align: center;" colspan="5">*Sumber data ini dari database
                sistem dan dijamin keasliannya</th>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;">
                &copy;2022 sibisma | Sistem Informasi Bisma
            </td>
        </tr>
        <tr>
            <td colspan="5" style="font-size: 8px; text-align: center;">printed from server at
                {{ Carbon\Carbon::parse($today)->translatedFormat('d-F-Y H:i:s') }}</td>
        </tr>
    </tfoot>
    <tr>
        <td>

        </td>
    </tr>
</table>