@extends('backend.partialadmin.layout')
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

                                        <form class="form">
                                            <div class="form-body">

                                            <div class="form-group">
                                                    <label>1. Kamu merasa mudah marah dan emosi tinggi, baik ke diri sendiri maupun orang lain? </label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer1" class="custom-control-input" value="yes" id="yes1">
                                                            <label class="custom-control-label" for="yes1">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer1" class="custom-control-input" value="no" id="no1">
                                                            <label class="custom-control-label" for="no1">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>2. Kamu mengalami perubahan nafsu makan baik itu penurunan atau peningkatan?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-2">
                                                            <input type="radio" name="customer2" class="custom-control-input" value="yes" id="yes2">
                                                            <label class="custom-control-label" for="yes2">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer2" class="custom-control-input" value="no" id="no2">
                                                            <label class="custom-control-label" for="no2">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>3. Kamu Sering merasa lelah dan lemas, bahkan tidak dapat melakukan aktivitas?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer3" class="custom-control-input" value="yes" id="yes3">
                                                            <label class="custom-control-label" for="yes3">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer3" class="custom-control-input" value="no" id="no3">
                                                            <label class="custom-control-label" for="no3">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>4. Kamu mengalami kesulitan untuk tidur/insomnia?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer4" class="custom-control-input" value="yes" id="yes4">
                                                            <label class="custom-control-label" for="yes4">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer4" class="custom-control-input" no="no" id="no4">
                                                            <label class="custom-control-label" for="no4">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>5. Kamu merasa sulit untuk berkonsentrasi dalam mengerjakan sesuatu?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer5" class="custom-control-input" value="yes" id="yes5">
                                                            <label class="custom-control-label" for="yes5">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer5" class="custom-control-input" value="no" id="no5">
                                                            <label class="custom-control-label" for="no5">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>6. Kamu sering merenung dan murung?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer6" class="custom-control-input" value="yes" id="yes6">
                                                            <label class="custom-control-label" for="yes6">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer6" class="custom-control-input" value="no" id="no6">
                                                            <label class="custom-control-label" for="no6">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>7. Kamu sering merasa cemas, khawatir akan suatu masalah yang belum terjadi?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer7" class="custom-control-input" value="yes" id="yes7">
                                                            <label class="custom-control-label" for="yes7">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer7" class="custom-control-input" value="no" id="no7">
                                                            <label class="custom-control-label" for="no7">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>8. Kamu merasa sedih yang terus-menerus?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer8" class="custom-control-input" value="yes" id="yes8">
                                                            <label class="custom-control-label" for="yes8">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer8" class="custom-control-input" value="no" id="no8">
                                                            <label class="custom-control-label" for="no8">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>9. Kamu mudah berprasangka buruk dengan orang lain?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer9" class="custom-control-input" value="yes" id="yes9">
                                                            <label class="custom-control-label" for="yes9">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer9" class="custom-control-input" value="no" id="no9">
                                                            <label class="custom-control-label" for="no9">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>10. Kamu merasa hilang ketertarikan/semangat dengan kegiatan yang biasa kamu lakukan?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer10" class="custom-control-input" value="yes" id="yes10">
                                                            <label class="custom-control-label" for="yes10">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer10" class="custom-control-input" value="no" id="no10">
                                                            <label class="custom-control-label" for="no10">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>11. Kamu sering merasa putus asa dan pesimis dengan apa yang kamu hadapi? </label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer11" class="custom-control-input" value="yes" id="yes11">
                                                            <label class="custom-control-label" for="yes11">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer11" class="custom-control-input" value="yes" id="no11">
                                                            <label class="custom-control-label" for="no11">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>12. Kamu sering mengalami sakit kepala?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer12" class="custom-control-input" value="yes" id="yes12">
                                                            <label class="custom-control-label" for="yes12">Yes</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer12" class="custom-control-input" value="no" id="no12">
                                                            <label class="custom-control-label" for="no12">No</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>13. Kamu sulit untuk membuat keputusan?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer13" class="custom-control-input" value="yes" id="yes13">
                                                            <label class="custom-control-label" for="yes13">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer13" class="custom-control-input" value="no" id="no13">
                                                            <label class="custom-control-label" for="no13">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
         

                                                <div class="form-group">
                                                    <label>14. Kamu memilih untuk menyendiri dan menghindari keramaian atau teman-teman yang lain?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer14" class="custom-control-input" value="yes" id="yes14">
                                                            <label class="custom-control-label" for="yes14">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer14" class="custom-control-input" value="no" id="no14">
                                                            <label class="custom-control-label" for="no14">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>15. Kamu merasa tertekan dengan apa yang kamu rasakan?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer15" class="custom-control-input" value="yes" id="yes15">
                                                            <label class="custom-control-label" for="yes15">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer15" class="custom-control-input" value="no" id="no15">
                                                            <label class="custom-control-label" for="no15">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>16. Kamu sering merasa tidak berharga atau merasa menjadi orang yang gagal?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer16" class="custom-control-input" value="yes" id="yes16">
                                                            <label class="custom-control-label" for="yes16">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer16" class="custom-control-input" value="no" id="no16">
                                                            <label class="custom-control-label" for="no16">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>17. Kamu mulai ada keinginan untuk menyakiti diri sendiri?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer17" class="custom-control-input" value="yes" id="yes17">
                                                            <label class="custom-control-label" for="yes17">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer17" class="custom-control-input" yes="yes" id="no17">
                                                            <label class="custom-control-label" for="no17">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>18. Kamu selalu dipenuhi pikiran untuk mengakhiri hidup?</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="customer18" class="custom-control-input" id="yes18">
                                                            <label class="custom-control-label" for="yes18">Ya</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="customer18" class="custom-control-input" id="no18">
                                                            <label class="custom-control-label" for="no18">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions center">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Batal
                                                </button>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#iconModal">
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
                                                                    <h4 class="modal-title" id="myModalLabel2"><i class="la la-road2"></i> Basic Modal</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5><i class="la la-arrow-right"></i> Check First Paragraph</h5>
                                                                    <p>Oat cake ice cream candy chocolate cake chocolate cake cotton candy dragée apple pie. Brownie carrot
                                                                        cake candy canes bonbon fruitcake topping halvah. Cake sweet roll cake cheesecake cookie chocolate cake
                                                                        liquorice. Apple pie sugar plum powder donut soufflé.</p>
                                                                    <p>Sweet roll biscuit donut cake gingerbread. Chocolate cupcake chocolate bar ice cream. Danish candy
                                                                        cake.</p>
                                                                    <hr>
                                                                    <h5><i class="la la-lightbulb-o"></i> Some More Text</h5>
                                                                    <p>Cupcake sugar plum dessert tart powder chocolate fruitcake jelly. Tootsie roll bonbon toffee danish.
                                                                        Biscuit sweet cake gummies danish. Tootsie roll cotton candy tiramisu lollipop candy cookie biscuit pie.</p>
                                                                    <div class="alert alert-success" role="alert">
                                                                        <span class="text-bold-600">Well done!</span> You successfully read this important alert message.
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