@extends('backend.partialadmin.layout')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Profil Konselor</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Konselor</a>
                                </li>
                                <li class="breadcrumb-item active">Profile Konselor
                                </li>
                            </ol>
                        </div>
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
                                    <img src="assets/backend/app-assets/images/portrait/small/avatar-s-2.png" alt="" class="card-img-top mb-1 img-fluid w-25 rounded-circle">
                                    <h1 class="card-title mb-1">Irene Baker</h1>
                                    <h6 class="text-light">Psikolog</h6>
                                </div>
                                <div class="card-body">
                                    <h6 class="text-bold-500">Email:</h6>
                                    <p>irenebaker@gmail.com</p>

                                    <h6 class="text-bold-500">Tanggal Lahir:</h6>
                                    <p>21 Juni 1997</p>


                                    <h6 class="text-bold-500">Pendidikan Terakhir:</h6>
                                    <p>S1 Psikologi</p>

                                    <h6 class="text-bold-500">Nama Institusi:</h6>
                                    <p>Universitas Dinamika</p>

                                    <h6 class="text-bold-500">Pengalaman Bekerja:</h6>
                                    <p>Rumah Sakit Surabaya</p>

                                    <h6 class="text-bold-500">Prestasi:</h6>
                                    <p>Rumah Sakit Surabaya</p>

                                    <h6 class="text-bold-500">Spesialis:</h6>
                                    <p>Konseling </p>

                                    <h6 class="text-bold-500">Alamat:</h6>
                                    <p>Surabaya</p>
                                    <hr class="my-2">
                                    <div id="maps-leaflet-user-location" class="height-250"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">

                        <!-- Book Appointment -->
                        <section id="book-appointment">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">Buat Appointment</h2>
                                </div>
                                <div class="card-body">
                                    <form>
                              
                                        <div class="row">
                                        <div class="col-lg-4 col-md-8">
                                                <div class="form-group">
                                                    <label for="service">Keluhan<span class="text-danger">*</span></label>
                                                    <select name="Service" class="form-control" id="service" required>
                                                        <option value="dental">Masalah Pribadi</option>
                                                        <option value="body">Masalah Sosial</option>
                                                        <option value="heart">Masalah Karir</option>
                                                        <option value="ent">Masalah Keluarga</option>
                                                        <option value="ent">Dan lain-lain</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-8">
                                                <div class="form-group">
                                                    <label for="date">Tanggal Appointment <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="date" name="date" required>
                                                </div>
                                            </div> 

                                            <div class="col-lg-4 col-md-8">
                                                <div class="form-group">
                                                    <label for="date">Konselor <span class="text-danger">*</span></label>
                                                    <select name="Service" class="form-control" id="service" required>
                                                        <option value="dental">Fitriyani P.si</option>
                                                        <option value="body">Inez Kristanti</option>
                                                        <option value="heart">Jonathan End</option>
                                                    </select>
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="symptoms">Ceritakan permasalahan kamu</label>
                                                    <textarea cols="3" rows="3" id="symptoms" class="form-control" placeholder="Tulis disini apa yang kamu alami"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer ml-auto">
                                            <button type="submit" class="btn btn-outline-success mr-1">Buat Appointment</button> <button type="submit" class="btn btn-outline-danger">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
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