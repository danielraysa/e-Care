@extends('backend.partialadmin.layout')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Tambah Konselor</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Konselor</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah Konselor
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
                <!-- Add Doctors Form Wizard -->
                <section id="add-doctors">
                    <div class="icon-tabs">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    {{-- <div class="card-header">
                                        <h4 class="card-title">Tambah Konselor</h4>
                                        <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    </div> --}}
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <form action="{{ route('counselor.store') }}" method="post" class="add-doctors-tabs icons-tab-steps steps-validation wizard-notification">
                                                {{ csrf_field() }}
                                                <!-- step 1 => Personal Details -->
                                                <h6><i class="step-icon la la-user font-medium-3"></i> Detail Profil</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="firstName">Nama Lengkap<span class="danger">*</span></label>
                                                                <input type="text" name="nama" class="form-control required" id="firstName" name="firstname" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lastName">Tanggal Lahir<span class="danger">*</span></label>
                                                                <input type="text" name="tgl_lahir" class="form-control required" id="lastName" name="lastname" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="address">Alamat</label>
                                                                <input type="text" name="alamat" class="form-control" id="address">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="city">Kota</label>
                                                                <select id="city" name="kota" class="form-control">
                                                                    <option value="manhattan">Manhattan</option>
                                                                    <option value="seattle">Seattle</option>
                                                                    <option value="kingsville">Kingsville</option>
                                                                    <option value="losangeles">Los Angeles</option>
                                                                    <option value="florida">Florida</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="state">Provinsi</label>
                                                                <select id="state" name="provinsi" class="form-control">
                                                                    <option value="washingtondc">Washington DC</option>
                                                                    <option value="newyork">New York</option>
                                                                    <option value="texas">Texas</option>
                                                                    <option value="california">California</option>
                                                                    <option value="miami">Miami</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="contact">No. Handphone<span class="danger">*</span></label>
                                                                <input type="number" name="no_hp" class="form-control required" id="contact" name="contact">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="state">Email<span class="danger">*</span></label>
                                                                <input type="email" name="email" class="form-control required" id="contact" name="contact">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="contact">Password<span class="danger">*</span></label>
                                                                <input type="password" name="password" class="form-control required" id="contact" name="contact">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <!-- Step 2 => Education Details-->

                                                <h6><i class="step-icon la la-book font-medium-3"></i> Detail Pendidikan</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="school">Pendidikan Terakhir</label>
                                                                <input type="text" name="pendidikan_terakhir" class="form-control" id="school">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="degree">Nama Institusi<span class="danger">*</span></label>
                                                                <input type="text" name="nama_institusi" class="form-control required" id="degree" name="degree">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="license">Lisensi<span class="danger">*</span></label>
                                                                <input type="text" name="lisensi" class="form-control required" id="license" name="license">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="hons">Penghargaan/Prestasi</label>
                                                                <input type="text" name="penghargaan" class="form-control" id="hons">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="experties">Bidang Keahlian<span class="danger">*</span></label>
                                                                <input type="text" name="bidang_keahlian" class="form-control required" id="experties" name="expert">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="research">Topik Penelitian</label>
                                                            <textarea id="research" name="topik_penelitian" cols="5" rows="1" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <!-- Step 3 => Experience -->

                                                <h6><i class="step-icon font-medium-3 la la-building"></i> Pengalaman Kerja</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="previousCompany">Perusahaan Terakhir</label>
                                                                <input type="text" name="perusahaan_terakhir" class="form-control" id="previousCompany">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="previousJobTitle">Jabatan</label>
                                                                <input type="text" name="jabatan" class="form-control" id="previousJobTitle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="training">Lama Bekerja: <span class="danger">*</span></label>
                                                                <input type="text" name="lama_bekerja" class="form-control" id="training" name="training" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="internship">Pelatihan/Workshop</label>
                                                                <input type="text" name="pelatihan" class="form-control" id="internship">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <!-- Step 4 => Social Media -->

                                                <h6><i class="step-icon ft-monitor font-medium-3"></i> Media Sosial</h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="email">Email:</label>
                                                                <input type="email" class="form-control required" id="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="fb">Facebook:</label>
                                                                <input type="url" name="facebook" class="form-control" id="fb">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="ig">Instagram:</label>
                                                                <input type="url" name="instagram" class="form-control" id="ig">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </form>
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