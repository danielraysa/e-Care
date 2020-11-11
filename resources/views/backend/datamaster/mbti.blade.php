@extends('backend.partialadmin.layout')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Tabel MBTI</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Master</a>
                                </li>
                                <li class="breadcrumb-item active">Tabel MBTI
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                
                @if (session('status'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('status') }}
                    </div>
                @endif
                <!-- List Of All Patients -->

                <section id="patients-list">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                              
                                <div class="card-header">
                                    <a href="{{url('/formmbti')}}" class="btn btn-success pull-right" style="margin-left:900px;">Tambah</a>
                                </div>
                                {{-- <div class="card-body collapse show"> --}}
                                    <div class="card-body card-dashboard">  
                                    {{-- </div> --}}
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Kepribadian/MBTI</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ( $mbti as $mbt )
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $mbt->mbti_name}}</td>
                                                    <td>
                                                        <form action="{{ route('mbti.destroy', $mbt->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                                                        {{-- <a href="{{url('mbti/'.$mbt->id.'/edit')}}"><i class="ft-edit text-success"></i></a> --}}
                                                        <a class="btn btn-sm btn-transparent" href="{{url('mbti/'.$mbt->id.'/edit')}}"><i class="ft-edit text-success"></i></a>
                                                        {{-- <a href="{{ url('mbti/'.$mbt->id.'/destroy') }}" onclick="return confirm('Anda yakin ingin menghapus data ini?');" ><i class="ft-trash-2 ml-1 text-warning"></i></a> --}}
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-sm btn-transparent"><i class="ft-trash-2 text-warning"></i></button>
                                                        </form>
                                                       
                                                    </td>
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