@extends('backend.partialadmin.layout')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/pages/user-feed.min.css') }}">
@endpush
@section('content')
   <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Forum Diskusi</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Forum </a>
                                </li>
                                <li class="breadcrumb-item active">Forum Diskusi
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <!-- User Feed -->
                <section id="user-feed">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="card shadow-none">
                                <div class="catd-body">
                                    <div class="row p-2">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-lg-4 col-3">
                                                    <img src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-8.png') }}" alt="" class="img-fluid rounded-circle width-50">
                                                </div>
                                                <div class="col-lg-8 col-7 p-0">
                                                    <h5 class="m-0">{{ $forum->post_user->sensor_nama() }}</h5>
                                                    <p>{{ $forum->created_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="ft-more-vertical pull-right"></i>
                                        </div>
                                    </div>
                                    <div class="write-post">
                                        <div class="col-sm-12 px-2">
                                            <p>{{ $forum->deskripsi_forum }}</p>
                                        </div>
                                        <hr class="m-0">
                                        <div class="row p-1">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-4 pr-0">
                                                        {{-- <span><i class="ft-heart h4 align-middle danger"></i> 120</span> --}}
                                                    </div>
                                                    <div class="col-8 pl-0">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="pull-right">
                                                    <span class="pr-1"><i class="ft-message-square h4 align-middle"></i> {{ $forum->komentar_forum->count() }}</span>
                                                    <span class="pr-1"><i class="ft-corner-up-right h4 align-middle"></i> 23</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-3">
                                            <div class="col-lg-12">
                                                @foreach ($forum->komentar_forum as $item)
                                                    <p><b>{{ $item->komentar_user->sensor_nama() }}</b>: {{ $item->komentar }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <form action="{{ route('forum-group.komentar', $forum) }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row px-3 pb-2">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea name="komentar" rows="4" class="form-control"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary float-right">Post Komentar</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                       
                    </div>
                </section>
                <!--/ User Feed -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @endsection