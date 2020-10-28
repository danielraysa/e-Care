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
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">User</a>
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
                @if (session('status'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Book Appointment -->
                <section id="book-appointment">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Link Data User</h2>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('user.store') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">NIK/NIM<span class="text-danger">*</span></label>
                                            <input type="text" name="nim" class="form-control" placeholder="NIK/NIM" required id="nim" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Nama Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" id="namalengkap" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Data Tabel:</label>
                                            <select name="data_tabel" id="data_tabel" class="form-control select2">
                                                <option selected disabled>Pilih nama</option>
                                            @foreach ($mahasiswa as $mhs)
                                                {{-- @if($mhs->role_mhs != "") --}}
                                                <option value="{{ $mhs->NIM }}">{{ $mhs->NAMA }} ({{ $mhs->nim }})</option>
                                                {{-- @endif --}}
                                            @endforeach
                                            @foreach ($karyawan as $kary)
                                                {{-- @if($kary->role_kary != "") --}}
                                                <option value="{{ $kary->NIK }}">{{ $kary->NAMA }} ({{ $kary->nik }})</option>
                                                {{-- @endif --}}
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="dob">User Role <span class="text-danger">*</span></label>
                                            <select name="user_role" id="user_role" class="form-control">
                                                @foreach ($role as $rl)
                                                    <option value="{{ $rl->id }}">{{ $rl->role_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-footer ml-auto">
                                    <button type="submit" class="btn btn-outline-success mr-1">Kirim</button> <button type="submit" class="btn btn-outline-danger">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Data User</h2>
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($user as $usr)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $usr->name }}</td>
                                    <td>{{ $usr->email }}</td>
                                    <td>{{ $usr->role_id }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@push('js')
<script>
    $('#data_tabel').change(function(){
        var nim = $(this).find(":selected").val();
        var nama = $(this).find(":selected").text();
        // alert(nama);
        var nama_only = nama.replace(' ('+nim+')','');
        $('#namalengkap').val(nama_only);
        $('#nim').val(nim);
    });
</script>
@endpush