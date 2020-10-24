@extends('backend.partialadmin.layout')
@push('js')
<script>
    $('#filter_tanggal').change(function(){
        var value = $(this).val();
        if(value != ""){
            $.ajax({
                url: "{{ route('get-list-waktu') }}",
                type: "POST",
                data: {waktu: value},
                success: function(result){
                    console.log(result);
                    $('#filter_tanggal_isi').empty().append('<option selected="selected" value="">Pilih opsi</option>');
                    $.each(result, function (i, item) {
                        $('#filter_tanggal_isi').append($('<option>', { 
                            value: item.year,
                            text : item.text 
                        }));
                    });
                }
            })
        }
    });
</script>
@endpush
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Laporan Rekap Perbulan</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Laporan</a>
                                </li>
                                <li class="breadcrumb-item active">Rekap Perbulan
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
                                    <form action="{{ route('rekapbulanan.index') }}" method="GET">
                                    <div class="row">
                                        <div class="col-4">
                                            <select class="form-control" name="prodi">
                                                <option value="">Pilih prodi</option>
                                                @foreach ($prodi as $prod)
                                                <option value="{{ $prod->kode_prodi }}">{{ $prod->major_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-control" name="jenis" id="filter_tanggal">
                                                <option value="">Pilih jenis waktu</option>
                                                <option value="bulan">Bulan</option>
                                                {{-- <option value="semester">Semester</option> --}}
                                                <option value="tahun">Tahun</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-control" name="waktu" id="filter_tanggal_isi">
                                                <option value="">Pilih opsi</option>
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Filter</button>
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
                                                    <th>Tanggal</th>
                                                    <th>Uraian</th>
                                                    <th>Jenis Layanan</th>
                                                    <th>Jenis Bimbingan</th>
                                                    <th>Penyelesaian</th>
                                                    <th>Tindak Lanjut</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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