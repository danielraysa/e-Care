@extends('backend.partialadmin.layout')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Daftar Konselor</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Konselor</a>
                                </li>
                                <li class="breadcrumb-item active">Semua Konselor
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
                    </div>
                </div> -->
            </div>
            <div class="content-body">
                <div id="doctors-list">

                    <div class="row match-height">
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-1.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Phil Gray</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0">Dentist</p>
                                    <p class="font-small-3 mb-2 text-center">(D.D.S)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Oral surgery specialist</p>

                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="{{url('buatappointment')}}" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp; Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-2.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Irene Baker</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0">Dermatologist</p>
                                    <p class="font-small-3 mb-2 text-center">(M.D.)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Dermatopathology
                                        specialist</p>
                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="hospital-book-appointment.html" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp;Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-3.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Evan White</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0">Surgeon</p>
                                    <p class="font-small-3 mb-2 text-center">(D.O.)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Neurosurgery
                                        specialist</p>
                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="hospital-book-appointment.html" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp;Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-4.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Sonia Clark</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0">Psychiatrist</p>
                                    <p class="font-small-3 mb-2 text-center">(Behavioral science)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Psychoanalysis
                                        specialist</p>
                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="hospital-book-appointment.html" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp;Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-5.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Colin Welch</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0">Pediatrician</p>
                                    <p class="font-small-3 mb-2 text-center">(Human Anatomy)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Adolescent Medicine specialist</p>

                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="hospital-book-appointment.html" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp;Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-6.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Zoe Duncan</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0">Allergist</p>
                                    <p class="font-small-3 mb-2 text-center">(Allergy-Immunology)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Allergic Reactions specialist</p>
                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="hospital-book-appointment.html" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp;Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-7.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Phil Short</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0">Audiologist</p>
                                    <p class="font-small-3 mb-2 text-center">(C.C.C.-A)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Human Hearing specialist</p>
                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="hospital-book-appointment.html" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp;Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-8.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Jane Smith</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0">Family Physician</p>
                                    <p class="font-small-3 mb-2 text-center">(A.B.F.M.)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Family Physics specialist</p>
                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="hospital-book-appointment.html" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp;Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-9.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Max Taylor</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0">Gastroenterologist</p>
                                    <p class="font-small-3 mb-2 text-center">(F.A.C.G)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Digestive Organs specialist</p>

                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="hospital-book-appointment.html" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp;Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-10.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Diane Paige</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0"> ID physician</p>
                                    <p class="font-small-3 mb-2 text-center">(Internal medicine)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Infectious Disease Specialists</p>
                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="hospital-book-appointment.html" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp;Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-11.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Liam Morgan</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0">Oncologists</p>
                                    <p class="font-small-3 mb-2 text-center">(Radiation oncology)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Cancer specialist</p>
                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="hospital-book-appointment.html" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp;Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-12.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 class="card-title font-large-1 mb-0 text-center">Maria Bower</h6>
                                    <p class="card-text card font-medium-1 text-center mb-0">Nephrologist</p>
                                    <p class="font-small-3 mb-2 text-center">(Internal Medicine)</p>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> Kidney specialist</p>
                                </div>
                                <div class="card-footer mx-auto">
                                    <a href="hospital-book-appointment.html" class="btn btn-outline-danger btn-sm">Buat Appointment</a> <br><br> <a href="hospital-book-appointment.html"  class="btn btn-outline-danger btn-sm"> &nbsp; &nbsp;Mulai Chatting &nbsp; &nbsp;  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
