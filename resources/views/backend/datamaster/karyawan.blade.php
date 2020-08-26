@extends('backend.partialadmin.layout')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Tabel Karyawan</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Master</a>
                                </li>
                                <li class="breadcrumb-item active">Tabel Karyawan
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
                                
                                </div>
                                <div class="card-header">
                                    <button type="button" class="btn btn-success" style="margin-left:820px;"><a href="{{('tambahkaryawan')}}">Tambah Karyawan</a></button>
                                </div>
                                {{-- <div class="card-body collapse show"> --}}
                                    <div class="card-body card-dashboard">
                                    
                                    {{-- </div> --}}
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list datatable">

                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Jabatan</th>
                                                    <!-- <th>Alamat</th>
                                                    <th>No Hp</th>
                                                    <th>Email</th>
                                                    <th>Pendidikan Terakhir</th>
                                                    <th>Institusi</th>
                                                    <th>Pengalaman</th> 
                                                    <th>Password</th> -->
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ( $employees as $employee )
                                              
                                                <tr>
                                                    <td>{{$employee->nik}}</td>
                                                    <td>{{$employee->namalengkap}}</td>
                                                    <td>{{$employee->jabatan}}</td>
                                                    <!-- <td>Keputih</td>
                                                    <td>08364737232</td>
                                                    <td>fitriyah@dinamika.ac.id</td>
                                                    <td>S1 Psikologi</td>
                                                    <td>Hang Tuah</td>
                                                    <td>4324234</td> -->
                                                    <td><a href="{{('tambahkaryawan')}}"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
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