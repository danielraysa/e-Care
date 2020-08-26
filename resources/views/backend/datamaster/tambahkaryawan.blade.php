@extends('backend.partialadmin.layout')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Tambah Karyawan</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Master</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah Karyawan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                {{-- <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
                    </div>
                </div> --}}
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <div class="card-text">
                                           
                                        </div>
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Detail Karyawan</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">NIK</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" name="umur" class="form-control" id="umur">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Nama</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="umur" class="form-control" id="umur">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Jabatan</label>
                                                    <div class="col-md-9 mx-auto">
                                                    <select name="role" class="form-control" id="service" required>
                                                        @foreach( $roles as $role )
                                                        <option value="{{ $role->id}}">{{$role->role_name}}</option>
                                                        @endforeach
                                                      
                                                     </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Alamat</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="umur" class="form-control" id="umur">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">No. Hp</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" name="umur" class="form-control" id="umur">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Email</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="email" name="umur" class="form-control" id="umur">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Pendidikan Terakhir</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="umur" class="form-control" id="umur">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Institusi</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="umur" class="form-control" id="umur">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Pengalaman Bekerja</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="comment" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Password</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="umur" class="form-control" id="umur">
                                                    </div>
                                                </div>

                                              

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection