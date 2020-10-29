@extends('backend.partialadmin.layout')
@push('js')
    <script>
        $('.datatable').on('click', '.btnDetail', function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ url('appointment') }}/"+id,
                type: "get",
                success: function(result){
                    console.log(result);
                    $('#jenis_problem').text(result.jenis_problem);
                    $('#deskripsi').text(result.description);
                }
            })
        });

        $('.datatable').on('click', '.btnTolak', function(){
            var url = $(this).attr('data-url');
            var value = $(this).attr('data-value');
            $('#formTolak').attr('action', url);
            $('#id_appointment').val(value);
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
                    <h3 class="content-header-title">Tabel Permintaan Konseling </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Tabel Konseling</a>
                                </li>
                                <li class="breadcrumb-item active">Tabel Permintaan Konseling
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
                                    <h2 class="card-title font-weight-bold">Form Pendaftaran</h2>
                                    <div class="heading-elements">
                                        <!-- <a href="hospital-add-patient.html" class="btn btn-danger round btn-sm"><i class="la la-plus font-small-2"></i>
                                            Add
                                            Patient</a> -->
                                    </div>
                                </div>
                                <div class="card-body collapse show">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list datatable">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:15%">NIM/Nama</th>
                                                    <th style="width:15%">Tanggal Daftar</th>
                                                    {{-- <th style="width:15%">Jenis Layanan</th> --}}
                                                    <th style="width:15%">Dosen Wali</th>
                                                    <th style="width:20%">Jenis Problem</th>
                                                    <th style="width:10%">Status</th>
                                                    <th style="width:20%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($appointment as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->mahasiswa->user_role->data_mhs->nama }}
                                                    ({{ $item->mahasiswa->user_role->nik_nim }})</td>
                                                    {{-- <td>{{ Helper::tanggal_indo($item->tgl_appointment) }}</td> --}}
                                                    <td>{{ Helper::datetime_indo($item->created_at) }}</td>
                                                    {{-- <td>{{ $item->jenis_layanan }}</td> --}}
                                                    <td>{{ $item->mahasiswa->user_role->data_mhs->dosen_wali->nama}}</td>
                                                    <td>{{ $item->jenis_problem }}</td>
                                                    <td>
                                                        @if($item->status == 'M')
                                                        Menunggu
                                                        @elseif($item->status == 'Y')
                                                        Diterima
                                                        @elseif($item->status == 'T')
                                                        Ditolak
                                                        @else
                                                        Selesai
                                                        @endif 
                                                    </td>
                                                    <td>
                                                    @if($item->status == 'M')
                                                    <form action="{{url('appointment/'.$item->id.'/update')}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{-- method_field('PUT') --}}
                                                        <!-- <a href="#"><i class="ft-edit text-success"></i></a><br> -->
                                                        <!-- <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a> -->
                                                        <button class="btn btn-success" type="submit" value="Y" name="pilihan"> Approve</button>
                                                       
                                                    </form>
                                                    <button class="btn btn-danger btnTolak" type="button" data-toggle="modal" data-target="#modalTolak" data-url="{{url('appointment/'.$item->id.'/update')}}" data-value="T"> Decline</button>
                                                    @else
                                                        <button class="btn btn-success text-white" type="button" disabled> Approve</button>
                                                        <button class="btn btn-danger" type="button" disabled> Decline</button>
                                                    @endif
                                                        <button type="button" class="btn btn-primary btnDetail" data-toggle="modal" data-target="#modalDetail" data-id="{{ $item->id }}"> Detail</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                              
                                            </tbody>
                                            <!-- <tfoot>
                                                <tr>
                                                    <th>NIM</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Program Studi</th>
                                                    <th>Wali Dosen</th>
                                                    <th>Email</th>
                                                    <th>Jenis Layanan</th>
                                                    <th>Keluhan</th>
                                                    <th>Konselor</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot> -->
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title font-weight-bold">List Antrian</h2>
                                </div>
                                <div class="card-body collapse show">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th>Program Studi</th>
                                                    <th>Tanggal Daftar</th>
                                                    <th>Jenis Problem</th>
                                                    <th>Keluhan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($appointment_acc as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->mahasiswa->user_role->nik_nim }}</td>
                                                    <td>{{ $item->mahasiswa->user_role->data_mhs->nama }}</td>
                                                    <td>{{ $item->mahasiswa->user_role->data_mhs->prodi() }}</td>
                                                    <td>{{ Helper::datetime_indo($item->created_at) }}</td>
                                                    <td>{{ $item->jenis_problem }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>{{ $item->status }}</td>
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
    <div class="modal fade" id="modalDetail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Detail
                </div>
                <div class="modal-body">
                    <p><b>Jenis Problem:</b> <span id="jenis_problem"></span></p>
                    <p><b>Deskripsi: </b></p>
                    <p id="deskripsi"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTolak">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formTolak" action="" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                   Alasan ditolak
                </div>
                <div class="modal-body">
                   <textarea class="form-control" name="deskripsitolak" placeholder="Tulis alasan penolakan"></textarea>
                   <input type="hidden" name="pilihan" id="id_appointment"> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection