<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekap Laporan - {{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <style type="text/css" media="all">
        /* @page {
            size: 210mm 160mm;
        } */
        /* @page { margin: 10px; } */

        body {
            font-family: "Times New Roman", Times, serif !important;
            font-size: 14px;
            color: black;
            background-color: white;
        }
        .bg-warning {
            background-color: #ffed4a !important;
        }
        .text-center {
            text-align: center !important;
        }
        .align-middle {
            vertical-align: middle !important;
        }
        .datatable {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .datatable th, .datatable td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>

    <center><img src="{{ asset('logo_dinamika.png') }}" class="w-50" width="200px"/></center>
    <br/>
    <center style="font-size: 24px; font-weight: bold">Laporan Konseling</center>
    {{-- <center style="font-size: 16px; font-weight: bold">Periode {{ Helper::tanggal_indo($start_date) }} - {{ Helper::tanggal_indo($end_date) }}</center> --}}
    <br/>
    <br/>
    <center>
    <table class="datatable">
        <tr class="text-center bg-warning">
            <th>No</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Jenis Layanan</th>
            <th>Jenis Bimbingan</th>
            <th>Penyelesaian</th>
            <th>Tindak Lanjut</th>
        </tr>
        @foreach ($rekam as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ Helper::datetime_indo($item->tgl) }}</td>
            <td>{{ $item->data_appointment->description }}</td>
            <td>{{ $item->data_appointment->jenis_layanan }}</td>
            <td>{{ $item->data_appointment->jenis_problem }}</td>
            <td>{{ $item->penyelesaian }}</td>
            <td>{{ $item->prospek }}</td>
        </tr>
        @endforeach
          
    </table>
    </center>

</body>
</html>