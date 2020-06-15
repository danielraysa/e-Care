@extends('front.layout')
@section('home')

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Tes & Kuis</h2>
                            <p>Home<span>/<span>Tes & Kuis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    <!-- learning part start-->
    <section class="advance_feature learning_part">
        <div class="container">
            <div class="row align-items-sm-center align-items-xl-stretch">
                <div class="col-md-6 col-lg-6">
                    <div class="learning_member_text">
                        <h5>Advance feature</h5>
                        <h2>Our Advance Educator
                            Learning System</h2>
                        <p>Fifth saying upon divide divide rule for deep their female all hath brind mid Days
                            and beast greater grass signs abundantly have greater also use over face earth
                            days years under brought moveth she star</p>
                        <div class="row">
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <div class="learning_member_text_iner">
                                    <span class="ti-pencil-alt"></span>
                                    <h4>Test MBTI </h4>
                                    <p>Myers-Briggs Type Indicator berguna membantu untuk mengenali 
                                        rangkaian pilihan atau preferensi. Pilihan-pilihan perilaku ini memberi 
                                        pemahaman mendalam tentang gaya kepemimpinan, gaya kerja, dan gaya 
                                        komunikasi serta kepribadian seseorang</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <div class="learning_member_text_iner">
                                    <span class="ti-stamp"></span>
                                    <h4>Test Tingkat Masalah</h4>
                                    <p>Setiap orang memiliki tingkat permasalahan yang berbeda dengan yang lain. Test ingkat permasalahan ini akan membantu kamu untuk menentukan apakah kamu harus melakukan konseling online atau harus bertatap muka dengan konselor. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="learning_img">
                        <img src="{{asset('assets/img/advance_feature_img.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    

@endsection