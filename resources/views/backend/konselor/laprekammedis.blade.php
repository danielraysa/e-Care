@extends('backend.partialadmin.layout')
@push('js')
<script>
    function getListWaktu(value){
        $.ajax({
            async: false,
            url: "{{ route('get-list-waktu') }}",
            type: "POST",
            data: {waktu: value},
            success: function(result){
                console.log(result);
                $('#filter_tanggal_isi').empty().append('<option selected value="">Pilih opsi</option>');
                $.each(result, function (i, item) {
                    $('#filter_tanggal_isi').append($('<option>', { 
                        value: item.value,
                        text : item.text 
                    }));
                });
                // $('#filter_tanggal_isi').val(value2);
            }
        })
    }

    $('#filter_tanggal').change(function(){
        var value = $(this).val();
        if(value != ""){
            getListWaktu(value);
            /* $.ajax({
                url: "{{ route('get-list-waktu') }}",
                type: "POST",
                data: {waktu: value},
                success: function(result){
                    console.log(result);
                    $('#filter_tanggal_isi').empty().append('<option selected="selected" value="">Pilih opsi</option>');
                    $.each(result, function (i, item) {
                        $('#filter_tanggal_isi').append($('<option>', { 
                            value: item.value,
                            text : item.text 
                        }));
                    });
                }
            }) */
        }
    });
</script>
@if(isset($request))
<script>
    var jenis = "{{ $request->jenis }}";
    var waktu = "{{ $request->waktu }}";
    $('#filter_tanggal').val(jenis);
    getListWaktu(jenis);
    $('#filter_tanggal_isi').val(waktu);
</script>
@endif
@endpush
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Tabel Rekam Medis Mahasiswa</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Laporan</a>
                                </li>
                                <li class="breadcrumb-item active">Rekam Medis Mahasiswa
                                </li>
                            </ol>
                        </div>  
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <!-- List Of All Patients -->
                <section id="patients-list">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <form action="{{ route('rekammedis.index') }}" method="GET">
                                        <div class="row">
                                            <div class="col-3">
                                                <select class="form-control" name="prodi">
                                                    <option value="">Pilih prodi</option>
                                                    @foreach ($prodi as $prod)
                                                    <option @if(isset($request->prodi) && $request->prodi == $prod->kode_prodi) selected @endif value="{{ $prod->kode_prodi }}">{{ $prod->major_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <select class="form-control" name="jenis" id="filter_tanggal">
                                                    <option value="">Pilih jenis waktu</option>
                                                    <option value="bulan">Bulan</option>
                                                    <option value="semester">Semester</option>
                                                    <option value="tahun">Tahun</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <select class="form-control" name="waktu" id="filter_tanggal_isi">
                                                    <option value="">Pilih opsi</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Filter</button>
                                                <a href="{{ route('rekammedis.index') }}" class="btn btn-danger"><i class="fas fa-trash"></i> Reset</a>
                                                <button type="submit" name="export" value="true" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button>
                                            </div>
                                        </div>
                                        </form>
                                </div>
                                <div class="card-body card-dashboard">
                                
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list datatable">

                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama/NIM</th>
                                                    <th>Program Studi</th>
                                                    <th>Dosen Wali</th>
                                                    <th>Tanggal Appointment</th>
                                                    <th>Jenis Bimbingan</th>
                                                    <th>Keluhan</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($appointment as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->mahasiswa->user_role->data_mhs->nama }} ({{ $item->mahasiswa->user_role->nik_nim }})</td>
                                                    <td>{{ $item->mahasiswa->user_role->data_mhs->prodi() }}</td>
                                                    <td>{{ $item->mahasiswa->user_role->data_mhs->dosen_wali->nama }}</td>
                                                    <td>{{ Helper::datetime_indo($item->created_at) }}</td>
                                                    <td>{{ $item->jenis_problem }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>
                                                        @if($item->catatan_medis != null)
                                                        <a href="{{ route('rekammedis.show', $item->id) }}" class="btn btn-primary"><i class="ft-eye"></i></a>
                                                        @else
                                                        <a href="{{ route('tambah-rekam', $item->id) }}" class="btn btn-success"><i class="ft-edit"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->


@endsection