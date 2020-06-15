@extends('backend.partialadmin.layout')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Doctor's Profile</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Doctors</a>
                                </li>
                                <li class="breadcrumb-item active">Doctor Profile
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
                <!-- Doctor's Profile -->

                <section id="doctor-profile">
                    <div class="row match-height">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    <img src="../../../app-assets/images/portrait/small/avatar-s-2.png" alt="" class="card-img-top mb-1 img-fluid w-25 rounded-circle">
                                    <h1 class="card-title mb-1">Irene Baker</h1>
                                    <h6 class="text-light">Dermatologist</h6>
                                </div>
                                <div class="card-body">
                                    <h6 class="text-bold-500">Email:</h6>
                                    <p>irenebaker@gmail.com</p>

                                    <h6 class="text-bold-500">Age:</h6>
                                    <p>35 Years Old</p>


                                    <h6 class="text-bold-500">Degree:</h6>
                                    <p>M.D</p>

                                    <h6 class="text-bold-500">Speciality:</h6>
                                    <p>Skin Problems</p>

                                    <h6 class="text-bold-500">Consultation Fee:</h6>
                                    <p>$100.00</p>

                                    <h6 class="text-bold-500">Location:</h6>
                                    <p>Manhattan</p>
                                    <hr class="my-2">
                                    <div id="maps-leaflet-user-location" class="height-250"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Book An Appointment</h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Select Date From calender to book an appointment</p>
                                    <div id="clndr-multiday" class="overflow-hidden bg-grey bg-lighten-3"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mt-2">
                                                <label for="symptoms">Symptoms: <span class="text-danger">*</span></label>
                                                <input type="text" id="symptoms" class="form-control" name="symptoms" placeholder="Enter Your Problems Here" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="firstname">First Name: <span class="text-danger">*</span></label>
                                                <input type="text" id="firstname" class="form-control" name="firstname" placeholder="Enter Your First Name Here" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="lastname">Last Name: <span class="text-danger">*</span></label>
                                                <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Enter Your Last Name Here" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="gender">Gender <span class="text-danger">*</span></label>
                                                <select name="gender" id="gender" class="form-control" required>
                                                    <option value="">Select Your Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="notsay">Rather Not Say</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="age">Age: <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="age" name="age" placeholder="Enter Your Age Here" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-danger float-right">Book Appointment</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="clndr" class="clearfix">
                        <script type="text/template" id="clndr-template">
                            <div class="clndr-controls">
                <div class="clndr-previous-button">&lt;</div>
                <div class="clndr-next-button">&gt;</div>
                <div class="current-month">
                    <%= month %>
                    <%= year %>
                </div>

            </div>
            <div class="clndr-grid">
                <div class="days-of-the-week clearfix">
                    <% _.each(daysOfTheWeek, function(day) { %>
                        <div class="header-day">
                            <%= day %>
                        </div>
                    <% }); %>
                </div>
                <div class="days">
                    <% _.each(days, function(day) { %>
                        <div class="<%= day.classes %>" id="<%= day.id %>"><span class="day-number"><%= day.day %></span></div>
                    <% }); %>
                </div>
            </div>
            <div class="event-listing">
                <div class="event-listing-title">Appointments this month</div>
                <% _.each(eventsThisMonth, function(event) { %>
                    <div class="event-item font-small-3">
                        <div class="event-item-day font-small-2">
                            <%= event.date %>
                        </div>
                        <div class="event-item-name text-bold-600">
                            <%= event.title %>
                        </div>
                        <div class="event-item-location">
                            <%= event.location %>
                        </div>
                    </div>
                <% }); %>
            </div>
        </script>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


@endsection