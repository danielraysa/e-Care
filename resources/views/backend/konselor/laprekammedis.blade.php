@extends('backend.partialadmin.layout')
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
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{url('profilmhs')}}">Laporan</a>
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
                                    <button type="button" class="btn btn-success" style="margin-left:825px;"><a href="{{url('tambahrekammedis')}}">Tambah data</a></button>
                                </div>
                                
                                <div>
                               
                                </div>
                                {{-- <div class="card-body collapse show"> --}}
                                    <div class="card-body card-dashboard">
                                    
                                    {{-- </div> --}}
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list datatable">

                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th>Program Studi</th>
                                                    <th>Tanggal Appointment</th>
                                                    <th>Jenis Layanan</th>
                                                    <th>Keluhan</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                {{-- <tr>
                                                    <td>1</td>
                                                    <td>16410100115</td>
                                                    <td>Gusti Adistriani</td>
                                                    <td><a href="{{url('profilkonselor')}}"><i class="ft-edit text-success"></i></a>
                                                        <a href=""><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr> --}}
                                              @foreach ($appointment as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->mahasiswa->user_role->nik_nim }}</td>
                                                    <td>{{ $item->mahasiswa->user_role->data_mhs->nama }}</td>
                                                    <td>S1 Sistem Informasi</td>
                                                    <td>{{ $item->tgl_appointment }}</td>
                                                    <td>{{ $item->jenis_problem }}</td>
                                                    <td><a href="{{url('profilkonselor')}}"><i class="ft-edit text-success"></i></a>
                                                        <a href=""><i class="ft-trash-2 ml-1 text-warning"></i></a>
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