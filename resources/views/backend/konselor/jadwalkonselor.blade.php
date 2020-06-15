@extends('backend.partialadmin.layout')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Doctor Schedule</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Appointment</a>
                                </li>
                                <li class="breadcrumb-item active">Doctor Schedule
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
                <!-- Doctor's Schedule -->
                <section id="doctor-schedule">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Doctor Schedule</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div id='external-events'>
                                                    <h4>Doctor Schedule Events</h4>
                                                    <div class="fc-events-container">
                                                        <div class='fc-event' data-color='#2D95BF'>All Day Event</div>
                                                        <div class='fc-event' data-color='#48CFAE'>Long Event</div>
                                                        <div class='fc-event' data-color='#50C1E9'>Meeting</div>
                                                        <div class='fc-event' data-color='#FB6E52'>Birthday party</div>
                                                        <div class='fc-event' data-color='#ED5564'>Lunch</div>
                                                        <div class='fc-event' data-color='#F8B195'>Conference Meeting</div>
                                                        <div class='fc-event' data-color='#6C5B7B'>Party</div>
                                                        <div class='fc-event' data-color='#355C7D'>Happy Hour</div>
                                                        <div class='fc-event' data-color='#547A8B'>Dance party</div>
                                                        <div class='fc-event' data-color='#3EACAB'>Dinner</div>
                                                        <p>
                                                            <input type='checkbox' id='drop-remove' />
                                                            <label for='drop-remove'>remove after drop</label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div id='fc-external-drag'></div>
                                            </div>
                                        </div>
                                    </div>
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