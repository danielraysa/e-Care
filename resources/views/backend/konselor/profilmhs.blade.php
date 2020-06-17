@extends('backend.partialadmin.layout')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Patient Profile</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Patients</a>
                                </li>
                                <li class="breadcrumb-item active">Patient Profile
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="patient-profile">
                    <div class="row match-height">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 d-flex justify-content-around">
                                            <div class="patient-img-name text-center">
                                                <img src="assets/backend/app-assets/images/portrait/small/avatar-s-18.png" alt="" class="card-img-top mb-1 patient-img img-fluid rounded-circle">
                                                <h4>Sarah lance</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 d-flex justify-content-around">
                                            <div class="patient-info">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <div class="patient-info-heading">Birth:</div> 20th Jan, 1992
                                                    </li>
                                                    <li>
                                                        <div class="patient-info-heading">Email: </div> sarahlance@gmail.com
                                                    </li>
                                                    <li>
                                                        <div class="patient-info-heading">Contact:</div> 5544332211
                                                    </li>
                                                    <li>
                                                        <div class="patient-info-heading">Address:</div> 55th street, Queen City
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card bg-gradient-y-info">
                                <div class="card-body">
                                    <ul class="list-unstyled text-white patient-info-card">
                                        <li><span class="patient-info-heading">Blood Type :</span> AB+</li>
                                        <li><span class="patient-info-heading">Allergies :</span> Milk, Pineapple, Kiwi</li>
                                        <li><span class="patient-info-heading">Disease :</span> Daibetes</li>
                                        <li><span class="patient-info-heading">Last Visit :</span> 10th Oct, 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card bg-gradient-y-warning">
                                <div class="card-header">
                                    <h5 class="card-title text-white">Regular Checkups</h5>
                                </div>
                                <div class="card-content mx-2">
                                    <ul class="list-unstyled text-white">
                                        <li>Dr. Phil Gray <span class="float-right">Dentist</span></li>
                                        <li>Dr. Irene Baker <span class="float-right">Dermatologist</span></li>
                                        <li>Dr. Diane Page <span class="float-right">ID Physician</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">Medical History</h2>
                                    <div class="table-responsive">
                                        <table class="table patient-wrapper">
                                            <tbody>
                                                <tr>
                                                    <td class=" border-top-0 align-middle">
                                                        <img src="assets/backend/app-assets/images/portrait/small/avatar-s-1.png" alt="" class="rounded-circle doctor-img">
                                                    </td>
                                                    <td class="align-middle border-top-0">Dr. Phil Gray</td>
                                                    <td class="align-middle border-top-0">Dentist</td>
                                                    <td class="align-middle border-top-0">
                                                        <i class="la la-calendar-check-o"></i> 15/10/18
                                                    </td>
                                                    <td class="align-middle border-top-0">
                                                        <i class="la la-map-marker"></i> 58th Street, Manhattan, NYC
                                                    </td>
                                                    <td class="align-middle border-top-0">
                                                        <i class="la la-circle text-danger"></i> Hospital Visit
                                                    </td>
                                                    <td class="align-middle border-top-0">
                                                        <div class="action">
                                                            <a href="#"><i class="ft-edit text-success"></i></a>
                                                            <a href="#"><i class="ft-trash-2 text-warning"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">
                                                        <img src="assets/backend/app-assets/images/portrait/small/avatar-s-2.png" alt="" class="rounded-circle doctor-img">
                                                    </td>
                                                    <td class="align-middle">Dr. Irene Baker</td>
                                                    <td class="align-middle">Dermatologist</td>
                                                    <td class="align-middle">
                                                        <i class="la la-calendar-check-o"></i> 20/10/18
                                                    </td>
                                                    <td class="align-middle">
                                                        <i class="la la-map-marker"></i> 58th Street, Manhattan, NYC
                                                    </td>
                                                    <td class="align-middle">
                                                        <i class="la la-circle text-primary"></i> Medical Consultion
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="action">
                                                            <a href="#"><i class="ft-edit text-success"></i></a>
                                                            <a href="#"><i class="ft-trash-2 text-warning"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle border-bottom-0">
                                                        <img src="assets/backend/app-assets/images/portrait/small/avatar-s-10.png" alt="" class="rounded-circle doctor-img">
                                                    </td>
                                                    <td class="align-middle border-bottom-0">Dr. Diane Paige</td>
                                                    <td class="align-middle border-bottom-0">ID Physician</td>
                                                    <td class="align-middle border-bottom-0">
                                                        <i class="la la-calendar-check-o"></i> 25/10/18
                                                    </td>
                                                    <td class="align-middle border-bottom-0">
                                                        <i class="la la-map-marker"></i> 58th Street, Manhattan, NYC
                                                    </td>
                                                    <td class="align-middle border-bottom-0">
                                                        <i class="la la-circle text-danger"></i> Hospital Visit
                                                    </td>
                                                    <td class="align-middle border-bottom-0">
                                                        <div class="action">
                                                            <a href="#"><i class="ft-edit text-success"></i></a>
                                                            <a href="#"><i class="ft-trash-2 text-warning"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card pull-up">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-7 text-left">
                                                        <h5 class="mb-0">Blood Pressure</h5>
                                                        <small class="text-light">120/89 mm/hg</small>
                                                    </div>
                                                    <div class="col-5 ">
                                                        <div>
                                                            <canvas id="patient-blood-pressure" class="height-75"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card pull-up">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-7  text-left">
                                                        <h5 class="mb-0">Heart Rate</h5>
                                                        <small class="text-light">102 Beats Per Min</small>
                                                    </div>
                                                    <div class="col-5 ">
                                                        <div>
                                                            <canvas id="patient-heart-rate" class="height-75"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card pull-up">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-7 text-left">
                                                        <h5 class="mb-0">Glucose</h5>
                                                        <small class="text-light">97 mg/dl</small>
                                                    </div>
                                                    <div class="col-5">
                                                        <div>
                                                            <canvas id="patient-glucose" class="height-75"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card pull-up">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-7 text-left">
                                                        <h5 class="mb-0">Cholestrol</h5>
                                                        <small class="text-light">85 mg/dl</small>
                                                    </div>
                                                    <div class="col-5">
                                                        <div>
                                                            <canvas id="patient-cholestrol" class="height-75"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title font-medium-3">Symptoms</h2>
                                </div>
                                <div class="card-body">
                                    <p class="card-text font-medium-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Doloribus, excepturi voluptatem! Ab iste pariatur quos. Architecto quasi dolores deserunt
                                        saepe! Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, corporis! </p>
                                    <span class="badge badge-sm diesase-badge badge-primary">Dental</span><span class="badge badge-sm badge-warning">Hair
                                        Fall</span>
                                    <span class="badge badge-sm diesase-badge
                        diesase-bad diesase-badge badge-info">Headache</span><span class="badge badge-sm badge-danger">Skin</span>
                                    <span class="badge badge-sm badge-primary">Back Pain</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection