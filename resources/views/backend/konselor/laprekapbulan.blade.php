@extends('backend.partialadmin.layout')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Laporan Rekap Perbulan</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Laporan</a>
                                </li>
                                <li class="breadcrumb-item active">Rekap Perbulan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <!-- List Of All Patients -->

                <section id="patients-list">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list datatable">

                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Uraian</th>
                                                    <th>Jenis Layanan</th>
                                                    <th>Jenis Bimbingan</th>
                                                    <th>Penyelesaian</th>
                                                    <th>Tindak Lanjut</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rekam as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ Helper::tanggal_indo($item->tgl) }}</td>
                                                    <td>{{ $item->data_appointment->description }}</td>
                                                    <td>{{ $item->data_appointment->jenis_layanan }}</td>
                                                    <td>{{ $item->data_appointment->jenis_problem }}</td>
                                                    <td>{{ $item->prospek }}</td>
                                                    <td>$item->tindak_lanjut</td>
                                                </tr>
                                                @endforeach
                                              
                                            </tbody>
                                        </table>
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