@extends('backend.partialadmin.layout')
@section('content')

   <!-- BEGIN: Content-->
   <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Tabel Form Pendaftaran</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Appointment</a>
                                </li>
                                <li class="breadcrumb-item active">Tabel Form Pendaftaran
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
                                    <h2 class="card-title">Form Pendaftaram</h2>
                                    <div class="heading-elements">
                                        <!-- <a href="hospital-add-patient.html" class="btn btn-danger round btn-sm"><i class="la la-plus font-small-2"></i>
                                            Add
                                            Patient</a> -->
                                    </div>
                                </div>
                                <div class="card-body collapse show">
                                    <div class="card-body card-dashboard">
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th>Program Studi</th>
                                                    <th>Tanggal Appointment</th>
                                                    <th>Jenis Layanan</th>
                                                    <th>Keluhan</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($appointment as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->mahasiswa->user_role->nik_nim }}</td>
                                                    <td>{{ $item->mahasiswa->user_role->data_mhs->nama }}</td>
                                                    <td>S1 Sistem Informasi</td>
                                                    <td>{{ $item->tgl_appointment }}</td>
                                                    <td>Appointment</td>
                                                    <td>{{ $item->jenis_problem }}</td>
                                                    <td>{{ $item->status }}</td>
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
                                                        <button class="btn btn-success" type="button" disabled> Approve</button>
                                                        <button class="btn btn-danger" type="button" disabled> Decline</button>
                                                    @endif
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
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection