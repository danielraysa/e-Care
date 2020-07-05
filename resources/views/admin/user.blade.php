@extends('backend.partialadmin.layout')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">User</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">User</a>
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
                <!-- Book Appointment -->
                <section id="book-appointment">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Link Data User</h2>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">NIK/NIM<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="NIK/NIM" required id="nim">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Nama Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Nama Lengkap" id="namalengkap" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Data Tabel:</label>
                                            <select name="data_tabel" id="gender" class="form-control">
                                            @foreach ($mahasiswa as $mhs)
                                                @if($kary->role_mhs != "")
                                                <option value="{{ $mhs->nim }}">{{ $mhs->nama }}</option>
                                                @endif
                                            @endforeach
                                            @foreach ($karyawan as $kary)
                                                @if($kary->role_kary != "")
                                                <option value="{{ $kary->nik }}">{{ $kary->nama }}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="dob">User Role <span class="text-danger">*</span></label>
                                            <select name="data_tabel" id="gender" class="form-control">
                                                @foreach ($role as $rl)
                                                    <option value="{{ $rl->id }}">{{ $rl->role_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-footer ml-auto">
                                    <button type="submit" class="btn btn-outline-success mr-1">Kirim</button> <button type="submit" class="btn btn-outline-danger">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection