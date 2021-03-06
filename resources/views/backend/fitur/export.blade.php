<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekap Medis - {{ config('app.name', 'Laravel') }}</title>
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
    <center style="font-size: 24px; font-weight: bold">Rekap Rekam Medis</center>
    <br/>
    <br/>
    <center>
    <table class="datatable">
        <tr class="text-center bg-warning">
            <th>No</th>
            <th>Nama/NIM</th>
            <th>Program Studi</th>
            <th>Dosen Wali</th>
            <th>Tanggal Appointment</th>
            <th>Jenis Bimbingan</th>
            <th>Keluhan</th>
        </tr>
        @foreach ($appointment as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->mahasiswa->user_role->data_mhs->nama }} ({{ $item->mahasiswa->user_role->nik_nim }})</td>
            <td>{{ $item->mahasiswa->user_role->data_mhs->prodi() }}</td>
            <td>{{ $item->mahasiswa->user_role->data_mhs->dosen_wali->nama }}</td>
            <td>{{ Helper::datetime_indo($item->created_at) }}</td>
            <td>{{ $item->jenis_problem }}</td>
            <td>{{ $item->description }}</td>
        </tr>
        @endforeach
          
    </table>
    </center>

</body>
</html>