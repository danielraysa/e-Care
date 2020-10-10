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
                    $('#jenis_problem').append(result.jenis_problem);
                    $('#deskripsi').text(result.description);
                }
            })
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
                                                    <th>No</th>
                                                    <th>NIM/Nama</th>
                                                    <th>Tanggal Daftar</th>
                                                    <th>Jenis Layanan</th>
                                                    <th>Jenis Problem</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
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
                                                    <td>{{ $item->jenis_layanan }}</td>
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
                                                        <button class="btn btn-danger" type="submit" value="T" name="pilihan"> Decline</button>
                                                    </form>
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
                    <p id="jenis_problem"><b>Jenis Problem:</b> </p>
                    <p><b>Deskripsi: </b></p>
                    <p id="deskripsi"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection