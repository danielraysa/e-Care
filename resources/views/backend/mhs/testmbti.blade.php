@extends('backend.partialadmin.layout')
@section('content')
<div class="app-content content">
<div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">

            @if (session('status'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('status') }}
                </div>
            @endif
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form-center">Tes Tingkat Kecemasan</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                             
                                
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                    
                                        <div class="card-text">
                                            <p>Kecemasan yang dialami seseorang memiliki tingkatan tersendiri, yaitu ringan, sedang, dan berat. Terkadang kecemasan meningkat lebih parah dikarenakan tidak adanya penanganan dengan segera. Sehingga penting untuk mengetahui tingkat kecemasan yang dialami seseorang agar dapat segera diatasi. Berikut ini pertanyaan untuk mengetahui tingkat kecemasan yang kamu alami: 
                                            <a href="https://www.16personalities.com/id/tes-kepribadian" target="_blank"> Klik disini</a>
                                            </p>
                                        </div>
                                         <!-- ISI KONTEN DISINI  -->

                                         <form class="form" action="{{ route('mbti.simpantest') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Hasil Test</h4>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="state">Hasil Test MBTI</label>
                                                                <select id="mbti" name="testmbti" class="form-control">
                                                                    @foreach($mbti as $mbt)
                                                                    <option value="{{$mbt->id}}">{{$mbt->mbti_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success">Simpan</button>
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

@endsection