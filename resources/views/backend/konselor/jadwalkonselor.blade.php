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
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Appointment</a>
                                </li>
                                <li class="breadcrumb-item active">Tabel Form Pendaftaran
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
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
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>16410100115</td>
                                                    <td>Gusti Adistriani</td>
                                                    <td>S1 Sistem Informasi</td>
                                                    <td>Ayouvi</td>
                                                    <td>115@dinamika.ac.id</td>
                                                    <td>Appointment</td>
                                                    <td>Masalah Pribadi</td>
                                                    <td>Inez Kristanti</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a><br>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                              
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