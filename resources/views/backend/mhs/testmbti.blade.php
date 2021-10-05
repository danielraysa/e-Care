@extends('backend.partialadmin.layout')
@push('css')
<style>
    #deskripsi_mbti {
        white-space: pre-line;
    }
</style>
@endpush
@push('js')
<script>
    $('#mbti').change(function(){
        var id = $(this).val();
        $.ajax({
            url: "{{ route('mbti.index') }}/"+id,
            type: "GET",
            beforeSend: function() {
                $('#deskripsi_mbti').text('Fetching..');
            },
            success: function(result){
                console.log(result);
                $('#deskripsi_mbti').text(result.deskripsi_mbti);
            }
        })
    });
</script>
@endpush
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
                                <h4 class="card-title font-weight-bold" id="basic-layout-form-center">Tes Kepribadian MBTI</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <p> Setiap orang memiliki kepribadian yang berbeda-beda. Kepribadian ini dapat membantu mengetahui dan mengenal diri sendiri secara lebih dalam, termasuk kelebihan dan kelemahan diri sendiri. Untuk mengetahui hal tersebut, terdapat test MBTI yang dapat menjawab apa kepribadian yang kamu miliki, test ini memiliki 16 tipe kepribadian seseorang. Jika kamu ingin mengetahui bagamana kepribadianmu, silakan lakukan test MBTI di link yang telah disediakan: 
                                        <a href="https://www.16personalities.com/id/tes-kepribadian" target="_blank" style="color: red"> Klik disini</a>
                                        </p>
                                    </div>

                                    <div>
                                        <p>Jika kamu telah melakukan test MBTI dan sudah mengetahui hasil test kepribadiannmu, silahkan untuk kembali ke halaman ini dan mengisi jawaban dari hasil test tersebut.</p>
                                    </div>
                                    <!-- ISI KONTEN DISINI  -->
                                    <form class="form" action="{{ route('testmbti.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i> Hasil Test</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="state">Hasil Test MBTI</label>
                                                    <select id="mbti" name="testmbti" class="form-control">
                                                        @foreach($mbti as $mbt)
                                                        <option value="{{$mbt->id}}">{{$mbt->mbti_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="state">Deskripsi</label>
                                                    <p id="deskripsi_mbti">-</p>
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