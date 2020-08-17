@extends('backend.partialadmin.layout')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Profil Mahasiswa</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Mahasiswa</a>
                                </li>
                                <li class="breadcrumb-item active">Profil Mahasiswa
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <section id="patient-profile">
                    <div class="row match-height">
                        <div class="col-lg-12 col-md-8 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-8 d-flex justify-content-around">
                                            <div class="patient-img-name text-center">
                                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-18.png" alt="" class="card-img-top mb-1 patient-img img-fluid rounded-circle">
                                                <h4>Alleci A</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-8 ">
                                            <div class="patient-info">
                                                <ul class="list-unstyled">
                                                     <li>
                                                        <div class="patient-info-heading"><b>NIM :</b> 1541010023</div> 
                                                    </li>
                                                    <li>
                                                        <div class="patient-info-heading"><b>Program Studi :</b>S1 Sistem Informasi</div> 
                                                    </li>
                                                    <li>
                                                        <div class="patient-info-heading"><b>Alamat :</b>Sidoarjo</div> 
                                                    </li>
                                                    <li>
                                                        <div class="patient-info-heading"><b>No Hp :</b>0856773237842</div>
                                                    </li>
                                                    <li>
                                                        <div class="patient-info-heading"><b>Email : </b>allecia@gmail.com</div> 
                                                    </li>
                                                    <li>
                                                        <div class="patient-info-heading"><b>Wali Dosen :</b>Bambang Hariadi</div> 
                                                    </li>
                                                    <li>
                                                        <div class="patient-info-heading"><b>No Hp Wali Dosen :</b>08123546237</div>
                                                    <li>
                                                        <div class="patient-info-heading"><b>Password : </b> 67362173</div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
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