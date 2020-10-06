@extends('backend.partialadmin.layout')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Tambah Rekam Medis</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Laporan Rekam Medis</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah Rekam Medis
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
                                        <form action="{{ route('simpan-rekam', $id) }}" method="POST" class="form form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Detail Konseling</h4>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput1">Kode</label>
                                                    <div class="col-md-9 mx-auto">
                                                         <input type="text" name="kode" class="form-control required" id="kode" name="kode" @if(isset($appointment)) value="{{ $appointment->id }}" readonly @endif/>   
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput2">Tanggal</label>
                                                    <div class="col-md-9 mx-auto">
                                                         <input type="date" name="tanggal" class="form-control" id="tanggal" @if(isset($appointment)) value="{{ $appointment->tgl_appointment  }}" @endif>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput3">Pertemuan Ke</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" name="pertemuanke" class="form-control required" id="pertemuanke" name="pertemuanke">
                                                    </div>
                                                </div>


                                                <h4 class="form-section"><i class="ft-clipboard"></i> Identitas Pribadi </h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Nama</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="nama" class="form-control" id="nama" @if(isset($appointment)) value="{{ $appointment->mahasiswa->user_role->data_mhs->nama }}" @endif>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">NIM</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" name="nim" class="form-control" id="nim" @if(isset($appointment)) value="{{$appointment->mahasiswa->user_role->nik_nim }}" @endif >
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput6">Jenis Kelamin</label>
                                                    <div class="col-md-9 mx-auto">
                                                            <select id="state" name="jkel" class="form-control">
                                                                        <option value="pr">Perempuan</option>
                                                                        <option value="lk">Laki-laki</option>
                                                                    </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Tanggal Lahir</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir" @if(isset($appointment)) value="{{$appointment->mahasiswa->user_role->data_mhs->tgl_lahir }}" @endif>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">No Hp</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" name="nohp" class="form-control" id="nohp" @if(isset($appointment)) value="{{$appointment->mahasiswa->user_role->data_mhs->telp }}" @endif>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput6">Program Studi</label>
                                                    <div class="col-md-9 mx-auto">
                                                         <select id="state" name="prodi" class="form-control">
                                                                        <option value="pr">S1 Sistem Informasi</option>
                                                                        <option value="lk">S1 Teknik Informatika</option>
                                                                    </select>
                                                    </div>
                                                </div>

                                                <h4 class="form-section"><i class="ft-clipboard"></i> Masalah Klien </h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput7">Umum</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select id="projectinput7" name="umum" class="form-control">
                                                            <option value="0" selected="" disabled="">Umum</option>
                                                            <option value="JDK">JDK</option>
                                                            <option value="DPI">DPI</option>
                                                            <option value="HSO">HSO</option>
                                                            <option value="EDK">EDK</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput7">Belajar</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select id="projectinput7" name="belajar" class="form-control">
                                                            <option value="0" selected="" disabled="">Belajar</option>
                                                            <option value="P">P</option>
                                                            <option value="T">T</option>
                                                            <option value="S">S</option>
                                                            <option value="D">D</option>
                                                            <option value="L">L</option>
                                                        </select>
                                                    </div>
                                                </div>
<!-- 
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Select File</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <label id="projectinput8" class="file center-block">
                                                            <input type="file" id="file">
                                                            <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                </div> -->

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Spesifikasi</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="spesifikasi" placeholder="" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Deskripsi Masalah</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="deskripsi" placeholder="">@if(isset($appointment)) {{$appointment->description }} @endif</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="form-section"><i class="ft-clipboard"></i> Gejala MASIDU </h4>
                                            <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Rasa Aman</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="rasaaman" placeholder=""></textarea>
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput7">Kompetensi</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select id="projectinput7" name="kompetensi" class="form-control">
                                                            <option value="0" selected="" disabled="">Kompetensi</option>
                                                            <option value="W">W</option>
                                                            <option value="P">P</option>
                                                            <option value="K">K</option>
                                                            <option value="N">N</option>
                                                            <option value="S">S</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Aspirasi</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="aspirasi" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Semangat</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="semangat" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Kesempatan</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="kesempatan" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                        <h4 class="form-section"><i class="ft-clipboard"></i> Pembinaan </h4>
                                        <h6><i class="step-icon font-medium-3"></i> --- Langsung</h6>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Ram. Pembinaan</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="rampembinaan" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Ram. Teknik</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="ramteknik" class="form-control" id="ramteknik">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Kom. Pembinaan</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="kompembinaan" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Kom. Teknik</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="komteknik" class="form-control" id="komteknik">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Asp. Pembinaan</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="asppembinaan" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Asp. Teknik</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="aspteknik" class="form-control" id="aspteknik">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Sem. Pembinaan</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="sempembinaan" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Sem. Teknik</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="semteknik" class="form-control" id="semteknik">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Kes. Pembinaan</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="kespembinaan" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Kes. Teknik</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="kesteknik" class="form-control" id="kesteknik">
                                                    </div>
                                                </div>

                                                <h6><i class="step-icon font-medium-3"></i> --- Tidak Langsung</h6>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Giz. Pembinaan</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="gizpembinaan" placeholder=""></textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Pend. Pembinaan</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="pendpembinaan" placeholder=""></textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">PSO. Pembinaan</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="psopembinaan" placeholder=""></textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Bud. Pembinaan</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="budpembinaan" placeholder=""></textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Koin. Pembinaan</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="koinpembinaan" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                        <h4 class="form-section"><i class="ft-clipboard"></i> Penilaian/Prospek</h4>
                                        <h6><i class="step-icon font-medium-3"></i> --- Penilaian: P3</h6>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">P1</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="p1" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">P2</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="p2" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">P3</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="p3" placeholder=""></textarea>
                                                    </div>
                                                </div>

                                                <h6><i class="step-icon font-medium-3"></i> --- Prospek</h6>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Prospek</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="prospek" placeholder=""></textarea>
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