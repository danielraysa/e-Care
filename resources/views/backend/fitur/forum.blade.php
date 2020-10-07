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
                            <!-- Write Post -->
                            <div class="card shadow-none">
                                <div class="catd-body">
                                    <div class="feed-tabs">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link px-1 py-1 px-sm-1 active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="ft-activity mr-50"></i>
                                                    Tulis Pertanyaan</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
                                        </div>
                                    </div>
                                    <form action="{{ route('forum-group.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="write-post">
                                        <div class="form-group">
                                            <textarea placeholder="Share what you are thinking here..." class="form-control border-0" id="exampleFormControlTextarea1" name="deskripsi_forum" rows="5"></textarea>
                                        </div>
                                        <hr class="m-0">
                                        <div class="row px-1">
                                            <div class="col-6 pt-2">
                                                <i class="ft-image ml-1 mr-2 mr-sm-0 h3"></i> 
                                            </div>
                                            <div class="col-6 pt-1">
                                                <button type="submit" class="btn btn-primary btn-min-width btn-glow mr-1 mb-1 pull-right">Post</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            @foreach ($forum as $item)
                            <div class="card shadow-none">
                                <div class="catd-body">
                                    <div class="row p-2">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-lg-4 col-3">
                                                    <img src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-8.png') }}" alt="" class="img-fluid rounded-circle width-50">
                                                </div>
                                                @php
                                                // $nama_post = substr($item->post_user->name, 0, 1) . preg_replace('/[^@]/', '*', substr($item->post_user->name, 1));
                                                @endphp
                                                <div class="col-lg-8 col-7 p-0">
                                                    <h5 class="m-0">{{ $item->post_user->sensor_nama() }}</h5>
                                                    <p>{{ $item->created_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="dropdown">
                                                <i class="ft-more-vertical pull-right" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @if($item->user_id == Auth::user()->id)
                                                    <a class="dropdown-item" href="{{ route('forum-group.edit', $item->id) }}"><i class="ft-edit"></i> Edit</a>
                                                    @endif
                                                    @if($item->user_id == Auth::user()->id || Auth::user()->role_id == 4)
                                                    <form action="{{ route('forum-group.destroy', $item->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="dropdown-item" type="submit"><i class="ft-trash"></i> Hapus</button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="write-post">
                                        <div class="col-sm-12 px-2">
                                            <p>{{ $item->deskripsi_forum }}</p>
                                        </div>
                                        <hr class="m-0">
                                        <div class="row p-1">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-4 pr-0">
                                                        {{-- <span><i class="ft-heart h4 align-middle danger"></i> 120</span> --}}
                                                    </div>
                                                    <div class="col-8 pl-0">
                                                        {{-- <ul class="list-unstyled users-list m-0">
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-19.png') }}" alt="Avatar">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Katherine Nichols" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-18.png') }}" alt="Avatar">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joseph Weaver" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-17.png') }}" alt="Avatar">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <span class="badge badge-info">+4 more</span>
                                                            </li>
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="pull-right">
                                                    <a href="{{ route('forum-group.show', $item) }}"<span class="pr-1"><i class="ft-message-square h4 align-middle"></i> {{ $item->komentar_forum->count() }}</span></a>
                                                    <span class="pr-1"><i class="ft-corner-up-right h4 align-middle"></i> 23</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- User Post 1 -->
                            {{-- <div class="card shadow-none">
                                <div class="catd-body">
                                    <div class="row p-2">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-lg-4 col-3">
                                                    <img src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-8.png') }}" alt="" class="img-fluid rounded-circle width-50">
                                                </div>
                                                <div class="col-lg-8 col-7 p-0">
                                                    <h5 class="m-0">Elaine Dreyfuss</h5>
                                                    <p>2 hours ago</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="ft-more-vertical pull-right"></i>
                                        </div>
                                    </div>
                                    <div class="write-post">
                                        <div class="col-sm-12 px-2">
                                            <p>When searching for videos of a different singer, Scooter Braun, a former marketing
                                                executive of So So Def Recordings, clicked on one of Bieber's 2007 videos by</p>
                                        </div>
                                        <hr class="m-0">
                                        <div class="row p-1">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-4 pr-0">
                                                        <span><i class="ft-heart h4 align-middle danger"></i> 120</span>
                                                    </div>
                                                    <div class="col-8 pl-0">
                                                        <ul class="list-unstyled users-list m-0">
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-19.png') }}" alt="Avatar">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Katherine Nichols" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-18.png') }}" alt="Avatar">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joseph Weaver" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-17.png') }}" alt="Avatar">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <span class="badge badge-info">+4 more</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="pull-right">
                                                    <span class="pr-1"><i class="ft-message-square h4 align-middle"></i> 44</span>
                                                    <span class="pr-1"><i class="ft-corner-up-right h4 align-middle"></i> 23</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- User Post 2 -->
                            {{-- <div class="card shadow-none">
                                <div class="catd-body">
                                    <div class="row p-2">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-lg-4 col-3">
                                                    <img src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-9.png') }}" alt="" class="img-fluid rounded-circle width-50">
                                                </div>
                                                <div class="col-lg-8 col-7 p-0">
                                                    <h5 class="m-0">Elaine Dreyfuss</h5>
                                                    <p>4 hours ago</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <i class="ft-more-vertical pull-right"></i>
                                        </div>
                                    </div>
                                    <div class="write-post">
                                        <div class="col-sm-12 px-2">
                                            <p>When searching for videos of a different singer, Scooter Braun, a former marketing
                                                executive of So So Def Recordings, clicked on one of Bieber's 2007 videos by</p>
                                        </div>
                                        <hr class="m-0">
                                        <div class="row p-1">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-sm-4 col-3 pr-0">
                                                        <span><i class="ft-heart h4 align-middle danger"></i> 120</span>
                                                    </div>
                                                    <div class="col-sm-8 col-7 pl-0">
                                                        <ul class="list-unstyled users-list m-0">
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-19.png') }}" alt="Avatar">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Katherine Nichols" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-18.png') }}" alt="Avatar">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joseph Weaver" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-17.png') }}" alt="Avatar">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <span class="badge badge-info">+4 more</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="pull-right">
                                                    <span class="pr-1"><i class="ft-message-square h4 align-middle"></i> 44</span>
                                                    <span class="pr-1"><i class="ft-corner-up-right h4 align-middle"></i> 23</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- User Post 3 -->
                            {{-- <div class="card shadow-none">
                                <div class="catd-body">
                                    <div class="row p-2">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-lg-4 col-3">
                                                    <img src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-8.png') }}" alt="" class="img-fluid rounded-circle width-50">
                                                </div>
                                                <div class="col-lg-8 col-7 p-0">
                                                    <h5 class="m-0">Elaine Dreyfuss</h5>
                                                    <p>2 hours ago</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="ft-more-vertical pull-right"></i>
                                        </div>
                                    </div>
                                    <div class="write-post">
                                        <div class="col-sm-12 px-2 pb-2">
                                            <img src="{{ asset('assets/backend/app-assets/images/gallery/party-flyer.jpg') }}" alt="" class="img-fluid">
                                        </div>
                                        <hr class="m-0">
                                        <div class="row p-1">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-lg-4 col-3 pr-0">
                                                        <span><i class="ft-heart h4 align-middle danger"></i> 120</span>
                                                    </div>
                                                    <div class="col-lg-8 col-7 pl-0">
                                                        <ul class="list-unstyled users-list m-0">
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-19.png') }}" alt="Avatar">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Katherine Nichols" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-18.png') }}" alt="Avatar">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joseph Weaver" class="avatar avatar-sm pull-up">
                                                                <img class="media-object rounded-circle" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-17.png') }}" alt="Avatar">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <span class="badge badge-info">+4 more</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="pull-right">
                                                    <span class="pr-1"><i class="ft-message-square h4 align-middle"></i> 44</span>
                                                    <span class="pr-1"><i class="ft-corner-up-right h4 align-middle"></i> 23</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                       
                    </div>
                </section>
                <!--/ User Feed -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @endsection