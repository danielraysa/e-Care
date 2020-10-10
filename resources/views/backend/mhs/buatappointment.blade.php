@extends('backend.partialadmin.layout')
@push('js')
    <script>
    $('form').submit(function(){
        $('#btnSubmit').attr('disabled', true);
        $('#btnReset').attr('disabled', true);
    });
    </script>
@endpush
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Form Pendaftaran Konseling Online</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Chatting</a>
                            </li>
                            <li class="breadcrumb-item active">Daftar Konseling Online
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
        
            @if(session('status'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('status') }}
            </div>
            @endif
            @if(isset($appointment) && $appointment->status == 'M')
            <div class="alert alert-primary alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Anda sudah membuat appointment, tunggu hingga diapprove oleh konselor
            </div>
            @endif
            <!-- Book Appointment -->
            <section id="book-appointment">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">@if(isset($appointment) && $appointment->status == 'M') List Antrian Konseling @else Daftar Konseling Online @endif</h2>
                    </div>
                    <div class="card-body">
                        @if(isset($appointment) && $appointment->status == 'M')
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered patients-list datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM/Nama</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Jenis Layanan</th>
                                        <th>Jenis Problem</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_appointment as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->mahasiswa->user_role->data_mhs->nama }}
                                        ({{ $item->mahasiswa->user_role->nik_nim }})</td>
                                        {{-- <td>{{ Helper::tanggal_indo($item->tgl_appointment) }}</td> --}}
                                        <td>{{ Helper::datetime_indo($item->created_at) }}</td>
                                        <td>{{ $item->jenis_layanan }}</td>
                                        <td>{{ $item->jenis_problem }}</td>
                                        <td>
                                            @if($item->status == 'M')
                                            Menunggu
                                            @elseif($item->status == 'Y')
                                            Diterima
                                            @elseif($item->status == 'T')
                                            Ditolak
                                            @else
                                            Selesai
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <form method="post" action="{{ route('appointment.store') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">NIM <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="NIM" id="nim"
                                            value="{{ $mhs->nim }}" required readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap"
                                            id="namalengkap" value="{{ $mhs->nama }}" required readonly />
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
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
                                    <input type="date" class="form-control" id="tgl" name="tgl" value="{{ date('Y-m-d', strtotime($user->user_role->data_mhs->tgl_lahir)) }}" required>
                            </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Wali Dosen <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="walidosen" name="walidosen"
                                            value="{{ $user->user_role->data_mhs->dosen_wali->nama }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label for="dob">No. Handphone Wali Dosen <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="walidosen" name="walidosen"
                                            value="{{ $user->user_role->data_mhs->dosen_wali->telp }}" required>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email"
                                            value="{{ $mhs->nim.'@dinamika.ac.id' }}" required readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">No. Handphone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan No Hp"
                                            value="{{ $mhs->telp }}" required readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-8">
                                    <div class="form-group">
                                        <label for="service">Keluhan<span class="text-danger">*</span></label>
                                        <select name="jenis_masalah" class="form-control" id="service" required>
                                            <option value="Masalah Pribadi">Masalah Pribadi</option>
                                            <option value="Masalah Sosial">Masalah Sosial</option>
                                            <option value="Masalah Karir">Masalah Karir</option>
                                            <option value="Masalah Keluarga">Masalah Keluarga</option>
                                            <option value="Lain-lain">Dan lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-8">
                                    <div class="form-group">
                                        <label for="service">Jenis Layanan<span class="text-danger">*</span></label>
                                        <select name="jenis_layanan" class="form-control" id="service" required>
                                            <option value="chatting" selected>Chatting</option>
                                            {{-- <option value="konseling">Konseling Langsung</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-8">
                                    <div class="form-group">
                                        <label for="date">Tanggal Konseling  <span class="text-danger">*</span></label>
                                        <input type="datetime-local" class="form-control" id="date" name="tgl_appointment" value="{{ date('Y-m-d') }}T{{ date('H:i') }}" required readonly>
                                    </div>
                                </div>

                                {{-- <div class="col-lg-4 col-md-8">
                                    <div class="form-group">
                                        <label for="date">Konselor <span class="text-danger">*</span></label>
                                        <select name="counselor" class="form-control" id="service" required>
                                            @foreach ($counselor as $cons)
                                            <option value="{{ $cons->user_id }}">{{ $cons->data_user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="symptoms">Ceritakan permasalahan kamu</label>
                                        <textarea name="description" cols="3" rows="3" id="symptoms" class="form-control" placeholder="Tulis disini apa yang kamu alami"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto @if(isset($appointment) && $appointment->status == 'M') d-none @endif">
                                <button type="submit" id="btnSubmit" class="btn btn-outline-success mr-1">Kirim</button>
                                <button type="reset" id="btnReset" class="btn btn-outline-danger">Batal</button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection