@extends('backend.partialadmin.layout')
@push('js')
@if($appointment->catatan_medis != null)
<script>
    $('#umum').val("{{ $appointment->catatan_medis->umum }}");
    $('#belajar').val("{{ $appointment->catatan_medis->belajar }}");
</script>
@endif
@endpush
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">@if($appointment->catatan_medis != null) Detail @else Tambah @endif Rekam Medis</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Laporan Rekam Medis</a>
                                </li>
                                <li class="breadcrumb-item active">@if($appointment->catatan_medis != null) Detail @else Tambah @endif Rekam Medis
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
                                                         <input type="date" name="tanggal" class="form-control" id="tanggal" @if(isset($appointment)) value="{{ $appointment->tgl_appointment  }}" readonly @endif>
                                                    </div>
                                                </div>

                                                <h4 class="form-section"><i class="ft-clipboard"></i> Identitas Pribadi </h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Nama</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="nama" class="form-control" id="nama" @if(isset($appointment)) value="{{ $appointment->mahasiswa->user_role->data_mhs->nama }}" readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">NIM</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" name="nim" class="form-control" id="nim" @if(isset($appointment)) value="{{$appointment->mahasiswa->user_role->nik_nim }}" readonly @endif />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput6">Jenis Kelamin</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="sex" class="form-control" @if(isset($appointment)) value="{{$appointment->mahasiswa->user_role->data_mhs->jenis_kel() }}" readonly @endif >
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Tanggal Lahir</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir" @if(isset($appointment)) value="{{$appointment->mahasiswa->user_role->data_mhs->tgl_lahir }}" readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">No Hp</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" name="nohp" class="form-control" id="nohp" @if(isset($appointment)) value="{{$appointment->mahasiswa->user_role->data_mhs->hp }}" readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput6">Program Studi</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="prodi" class="form-control" @if(isset($appointment)) value="{{$appointment->mahasiswa->user_role->data_mhs->prodi() }}" readonly @endif >
                                                    </div>
                                                </div>

                                                <h4 class="form-section"><i class="ft-clipboard"></i> Masalah Klien </h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput6">Hasil Tes Tingkat</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="hasil_tingkat" class="form-control" @if(isset($appointment)) value="{{$appointment->catatan_medis->hasil_tingkat }}" readonly @endif >
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Deskripsi Masalah</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="deskripsi" placeholder="Deskripsikan masalah yang dimiliki mahasiswa" readonly>@if(isset($appointment)) {{$appointment->description }} @endif</textarea>
                                                    </div>
                                                </div>
                                            
                                                <h4 class="form-section"><i class="ft-clipboard"></i> Pneyelsaian & Tindak Lanjut</h4>
                                                
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Penyelesaian</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="penyelesaian" placeholder="Deskripsikan penyelesaian masalah yang dihadapi mahasiswa">@if($appointment->catatan_medis != null){{ $appointment->catatan_medis->penyelesaian }}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Prospek/Tindak Lanjut</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="prospek" placeholder="Deskripsikan tindak lanjut apa yang harus dilakukan kepada mahasiswa mahasiswa">@if($appointment->catatan_medis != null){{ $appointment->catatan_medis->prospek }}@endif</textarea>
                                                    </div>
                                                </div>

                                                @if($appointment->catatan_medis == null)
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> Save
                                                    </button>
                                                    <button type="button" class="btn btn-warning">
                                                        <i class="ft-x"></i> Cancel
                                                    </button>
                                                </div>
                                                @endif
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