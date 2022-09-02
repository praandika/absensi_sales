<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate PDF</title>
    <style>
        body {
            font-family: 'Calibri', sans-serif;
        }
    </style>
</head>

<body>
    <table class="table">
        <tr>
            <th colspan="5" style="font-size: 20px; font-weight: bold; text-align: center;">Absensi Manpower Bisma
            </th>
        </tr>
        <br>
        <tr>
            <th style="text-align: left;">Nama</th>
            @forelse ($nama as $o)
            <th style="text-align: left;" colspan="4">: {{ $o->nama_sales }}</th>
            @empty
            <th style="text-align: left; color: red;" colspan="4">Unable to get sales name</th>
            @endforelse
        </tr>

        <tr style="text-align: left;">
            <th style="text-align: left;">Dealer</th>
            @forelse ($dealer as $o)
            <th style="text-align: left;" colspan="4">: {{ $o->dealer_name }}</th>
            @empty
            <th style="text-align: left; color: red;" colspan="4">Unable to get dealer name</th>
            @endforelse
        </tr>

        <br>

        <thead>
            <tr>
                <th scope="col"
                    style="background-color: #007acc; color: #ffffff; font-weight: bold; border: 1px solid #007acc; text-align :center;">
                    No</th>
                <th scope="col"
                    style="background-color: #007acc; color: #ffffff; font-weight: bold; border: 1px solid #007acc;">
                    Hari</th>
                <th scope="col"
                    style="background-color: #007acc; color: #ffffff; font-weight: bold; border: 1px solid #007acc;">
                    Tanggal</th>
                <th scope="col"
                    style="background-color: #007acc; color: #ffffff; font-weight: bold; border: 1px solid #007acc;">
                    Waktu</th>
                <th scope="col"
                    style="background-color: #007acc; color: #ffffff; font-weight: bold; border: 1px solid #007acc;">
                    Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php($no = 1)
            @forelse ($absen as $a)
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
                <td colspan="5" style="text-align: center; border: 1px solid #92abf6;">No data available</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <br>
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

            <br>

            <tr>
                <td>
                {!! QrCode::size(300)->generate('localhost/original/'.$code) !!}
                </td>
                <td></td>
                <td></td>
                <td colspan="2" style="text-align: center;">Denpasar,
                    {{ Carbon\Carbon::parse($today)->translatedFormat('d F Y') }}</td>
            </tr>

            <br><br><br><br>

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

            <br>

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
</body>

</html>
