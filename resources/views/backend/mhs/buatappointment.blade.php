@extends('backend.partialadmin.layout')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Buat Appointment</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Appointment</a>
                                </li>
                                <li class="breadcrumb-item active">Buat Appointment
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
                            <h2 class="card-title">Buat Appointment</h2>
                        </div>
                        <div class="card-body">
                            <form method="post" action="">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">NIM <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="NIM" required id="nim">
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
                                            <label for="gender">Program Studi:</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="gender">S1 Sistem Informasi</option>
                                                <option value="male">S1 Teknik Komputer</option>
                                                <option value="female">S1 Desain Produk</option>
                                                <option value="notsay">S1 Desain Komunikasi Visual</option>
                                                <option value="notsay">S1 Manajemen</option>
                                                <option value="notsay">S1 Akuntansi</option>
                                                <option value="notsay">D4 Produksi Film dan Televisi</option>
                                                <option value="notsay">D3 Sistem Informasi</option>
                                                <option value="notsay">D3 Administrasi Perkantoran</option>
                                            </select></div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="dob">Tanggal lahir <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="tgl" name="tgl" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="dob">Wali Dosen <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="walidosen" name="walidosen" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="dob">No. Handphone Wali Dosen <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="walidosen" name="walidosen" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">No. Handphone</label>
                                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Masukkan No Hp" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-lg-4 col-md-8">
                                        <div class="form-group">
                                            <label for="service">Keluhan<span class="text-danger">*</span></label>
                                            <select name="service" class="form-control" id="service" required>
                                                <option value="Masalah Pribadi">Masalah Pribadi</option>
                                                <option value="Masalah Sosial">Masalah Sosial</option>
                                                <option value="Masalah Karir">Masalah Karir</option>
                                                <option value="Masalah Keluarga">Masalah Keluarga</option>
                                                <option value="lain-lain">Dan lain-lain</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-8">
                                        <div class="form-group">
                                            <label for="date">Tanggal Appointment <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="date" name="date" required>
                                        </div>
                                    </div> 

                                    <div class="col-lg-4 col-md-8">
                                        <div class="form-group">
                                            <label for="date">Konselor <span class="text-danger">*</span></label>
                                            <select name="counselor" class="form-control" id="service" required>
                                                <option value="dental">Fitriyani P.si</option>
                                                <option value="body">Inez Kristanti</option>
                                                <option value="heart">Jonathan End</option>
                                            </select>
                                        </div>
                                    </div> 
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="symptoms">Ceritakan permasalahan kamu</label>
                                            <textarea name="description" cols="3" rows="3" id="symptoms" class="form-control" placeholder="Tulis disini apa yang kamu alami"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto">
                                    <button type="submit" class="btn btn-outline-success mr-1">Kirim</button> <button type="reset" class="btn btn-outline-danger">Batal</button>
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