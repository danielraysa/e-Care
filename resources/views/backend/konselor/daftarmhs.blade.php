@extends('backend.partialadmin.layout')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Patients List</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Patients</a>
                                </li>
                                <li class="breadcrumb-item active">All Patients
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
                                    <h2 class="card-title">Daftar Mahasiswa</h2>
                                    
                                </div>
                                {{-- <div class="card-body collapse show"> --}}
                                    <div class="card-body card-dashboard">
                                    {{-- </div> --}}
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list datatable">
                                            <thead>
                                                <tr>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($mahasiswa as $mhs)    
                                                <tr>
                                                    <td>{{ $mhs->nim }}</td>
                                                    <td>{{ $mhs->nama }}</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
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