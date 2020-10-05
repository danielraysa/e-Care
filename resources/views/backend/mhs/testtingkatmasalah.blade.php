@extends('backend.partialadmin.layout')
@push('js')
<script>
    $('.form').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "{{url('testtingkat')}}",
            type: "POST",
            data: new FormData(this),
            // dataType: "JSON",
            //cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                //$("#overlay").show();
            },
            success: function (hasil) {
                console.log(hasil);
                // alert(hasil.nilai);
                $('#hasil_test').text(hasil.nilai);
                $('#keterangan').text(hasil.keterangan);
            }
        });
    });
</script>
@endpush
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
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
                                            <p>Kecemasan yang dialami seseorang memiliki tingkatan tersendiri, yaitu ringan, sedang, dan berat. Terkadang kecemasan meningkat lebih parah dikarenakan tidak adanya penanganan dengan segera. Sehingga penting untuk mengetahui tingkat kecemasan yang dialami seseorang agar dapat segera diatasi. Berikut ini pertanyaan untuk mengetahui tingkat kecemasan yang kamu alami:</p>
                                        </div>

                                        <form class="form" method="POST">
                                        {{ csrf_field() }}
                                            <div class="form-body">
                                                @foreach ($pertanyaan as $item)
                                                <div class="form-group">
                                                    <label>{{ $loop->iteration }}. {{ $item->description }}</label>
                                                    <div class="input-group">
                                                    <input type="hidden" name="id_pertanyaan[]" value="{{ $item->id }}" />
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="pertanyaan_{{ $item->id }}" class="custom-control-input" value="yes" id="yes_{{ $item->id }}">
                                                            <label class="custom-control-label" for="yes_{{ $item->id }}">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="pertanyaan_{{ $item->id }}" class="custom-control-input" value="no" id="no_{{ $item->id }}">
                                                            <label class="custom-control-label" for="no_{{ $item->id }}">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                            </div>

                                            <div class="form-actions center">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Batal
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#iconModal">
                                                    <i class="la la-check-square-o"></i> Lihat Hasil
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        
                                        <!-- Modal -->
                                        <div class="modal fade text-left" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel2"><i class="la la-road2"></i> Hasil Test Tingkat Kecemasan</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5><i class="la la-arrow-right"></i> Hasil Test Tingkat Kecemasan:  <b><span id="hasil_test"></b></span></h5>
                                                        <div class="alert alert-success" role="alert">
                                                            <p id="keterangan"></p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-outline-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
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

@endsection