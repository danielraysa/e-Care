@extends('front.layout')
@section('home')

   <!-- breadcrumb start-->
   <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Konselor Terpilih</h2>
                            <p>Home<span>/</span>Konselor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::review_part start::-->
    <section class="special_cource padding_top"><br><br>
        <div class="container">
            <div class="row justify-content-center">
               
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{asset('assets/img/special_cource_1.png')}}" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href="{{url('login')}}" class="btn_4">Mulai Konseling!</a>
                            <!-- <h4>$130.00</h4> -->
                            <a href="course-details.html"><h3>Nur Fitriyah</h3></a>
                            <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                           
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{asset('assets/img/special_cource_2.png')}}" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href="{{url('login')}}" class="btn_4">Mulai Konseling!</a>
                            <!-- <h4>$160.00</h4> -->
                            <a href="course-details.html"> <h3>Inez Kristanti</h3></a>
                            <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{asset('assets/img/special_cource_3.png')}}" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href="{{url('login')}}" class="btn_4">Mulai Konseling!</a>
                            <!-- <h4>$140.00</h4> -->
                            <a href="course-details.html">  <h3>Jonathan End</h3> </a> 
                            <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->



@endsection('home')