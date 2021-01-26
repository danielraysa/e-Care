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
            <div class="content-header-left col-md-6 col-12">
                <h3 class="content-header-title">Form Pendaftaran Konseling Online</h3><br>
                
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
            @else
            <div class="alert alert-primary alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><u>Sebelum kamu melakukan chatting, <br>kamu harus mengisi form pendaftaran konseling terlebih dahulu! </u></h5>
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
                                        <th>Jumlah Antrian</th>                        
                                        <th>Tanggal Daftar</th>
                                        <th>Jenis Layanan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_appointment as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ Helper::tanggal_indo($item->tgl_appointment) }}</td> --}}
                                        <td>{{ Helper::datetime_indo($item->created_at) }}</td>
                                        <td>{{ $item->jenis_layanan }}</td>
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
                                            value="{{ $mhs->hp != '' ? $mhs->hp : $mhs->no_telp }}" required readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-8">
                                    <div class="form-group">
                                        <label for="service">Keluhan<span class="text-danger">*</span></label>
                                        <select name="jenis_masalah" class="form-control" id="service" required>
                                            <option value="Masalah Pribadi"selected>Masalah Pribadi</option>
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

                        <div class="card-header">
                            <div class="table-responsive">
                                <p>Daftar Antrian Konseling</p> <br>
                                <table class="table table-striped table-bordered patients-list datatable">
                                    <thead>
                                        <tr>
                                            <th>Jumlah Antrian</th>                        
                                            <th>Tanggal Daftar</th>
                                            <th>Jenis Layanan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_appointment as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{ Helper::tanggal_indo($item->tgl_appointment) }}</td> --}}
                                            <td>{{ Helper::datetime_indo($item->created_at) }}</td>
                                            <td>{{ $item->jenis_layanan }}</td>
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
                        </div>
                        @endif
                        
                    </div>

                    
                    
            
                </div>

                
            </section>

          
            <br>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection