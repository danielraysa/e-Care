@extends('backend.partialadmin.layout')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Tambah Program Studi</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Master</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah Program Studi
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
                                    
                                    <div class="form-body">

                                        @if(isset($major))
                                        <form class="form form-horizontal" action=" {{ route('prodi.update', $major) }}" method="post">
                                        {{ method_field('PUT') }}
                                        @else
                                        <form class="form form-horizontal" action="{{ route('prodi.store') }}" method="post">
                                        @endif
                                         {{ csrf_field() }} 
                                           
    
                                                <h4 class="form-section"><i class="ft-user"></i> Detail Program Studi</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Kode Prodi</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" name="kode_prodi" class="form-control" id="kode_prodi" @if(isset($major)) value="{{$major->kode_prodi}}" @endif>
                                                   
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput5">Program Studi</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" name="major_name" class="form-control" id="major_name" @if(isset($major)) value="{{$major->major_name}}" @endif>
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
                    </div>


                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection