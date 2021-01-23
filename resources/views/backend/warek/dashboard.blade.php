@extends('backend.partialadmin.layout')
@push('js')
<script>
    var bgColor = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#ec5858', '#34626c', '#5c6e91'];
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#chart-bulan");
    var ctx_kasus = $("#chart-kasus");
    var ctx_prodi = $("#chart-prodi");
    var ctx_tingkat = $("#chart-tingkat");
    var ctx_mbti = $("#chart-online");
    var bulanChart, kasusChart, prodiChart, tingkatChart, onlineChart;
    // Chart Options
    var chartLineNoLegend = {
        legend: {
            display: false,
        },
        layout: {
            padding: {
                top: -30
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                    precision: 0
                    // drawBorder: false,
                },
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    precision: 0
                },
                gridLines: {
                    display: false,
                    // drawBorder: false,
                },
            }]
        }
    };
    var chartLineOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            /* xAxes: [{
                gridLines: {
                    color: "#ffffff",
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Bulan'
                }
            }], */
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    precision: 0
                },
                /* gridLines: {
                    color: "#ffffff",
                }, */
                /* scaleLabel: {
                    display: true,
                    labelString: 'Jumlah Appointment'
                } */
            }]
        }
    };

    var yScaleOptions = {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    precision: 0
                }
            }]
    };

    var chartBarOptions = {
        legend: {
            display: false,
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#ffffff",
                    // drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Program Studi'
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                },
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    // drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Jumlah Mahasiswa'
                }
            }]
        }
    };

    $.ajax({
        url:"{{ route('chart-warek') }}",
        type: "GET",
        success: function(result){
            console.log(result);
            kasusChart = new Chart(ctx_kasus, {
                type: 'bar',
                options: chartLineNoLegend,
                data: {
                    labels: result.data_kasus.labels,
                    datasets: result.data_kasus.dataset
                }
            });
            bulanChart = new Chart(ctx, {
                type: 'bar',
                options: chartLineOptions,
                data: {
                    labels: result.data_masalah.labels,
                    datasets: result.data_masalah.dataset
                }
            });
            prodiChart = new Chart(ctx_prodi, {
                type: 'bar',
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: yScaleOptions
                },  
                data: {
                    labels: result.data_prodi.labels,
                    datasets: result.data_prodi.dataset
                }
            });
            tingkatChart = new Chart(ctx_tingkat, {
                type: 'line',
                data: {
                    labels: result.data_tingkat.labels,
                    datasets: result.data_tingkat.dataset
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: yScaleOptions
                }
            });
            onlineChart = new Chart(ctx_mbti, {
                type: 'bar',
                data: {
                    labels: result.data_online.labels,
                    datasets: result.data_online.dataset
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: yScaleOptions
                }
            });
        }
    });

    $('#pilih_tahun').change(function(){
        var value = $(this).val();
        $.ajax({
            url:"{{ route('chart-warek') }}",
            type: "GET",
            data: {filter_tahun: value},
            success: function(result){
                console.log(result);
                bulanChart.destroy();
                prodiChart.destroy();
                tingkatChart.destroy();
                onlineChart.destroy();
                bulanChart = new Chart(ctx, {
                    type: 'bar',
                    options: chartLineOptions,
                    data: {
                        labels: result.data_masalah.labels,
                        datasets: result.data_masalah.dataset
                    }
                });
                prodiChart = new Chart(ctx_prodi, {
                    type: 'bar',
                    data: {
                        labels: result.data_prodi.labels,
                        datasets: result.data_prodi.dataset
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: yScaleOptions
                    }
                });
                tingkatChart = new Chart(ctx_tingkat, {
                    type: 'line',
                    data: {
                        labels: result.data_tingkat.labels,
                        datasets: result.data_tingkat.dataset
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: yScaleOptions
                    }
                });
                onlineChart = new Chart(ctx_mbti, {
                    type: 'bar',
                    data: {
                        labels: result.data_online.labels,
                        datasets: result.data_online.dataset
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: yScaleOptions
                    }
                });
            }
        });
    });
</script>
@endpush
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Hospital Info cards -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="la la-user-md font-large-2 success"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h5 style="font-size: 1rem" class="text-muted text-bold-500">Jumlah Mhs Konseling</h5>
                                        <h3 class="text-bold-600">{{ $konseling->count() }}</h3>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="la la-stethoscope font-large-2 warning"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h5 class="text-muted text-bold-500">Masalah Berat</h5>
                                        <h3 class="text-bold-600">{{ $tingkat_berat->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="la la-calendar-check-o font-large-2 info"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h5 style="font-size: 1rem" class="text-muted text-bold-500">Total Rekap Per Bulan</h5>
                                        <h3 class="text-bold-600">{{ $rekam->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Appointment Bar Line Chart -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                
                            <h4 class="card-title">Grafik Dashboard</h4>
                            {{-- <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div> --}}
                            <select name="pilih_tahun" id="pilih_tahun" style="width: 100px" class="form-control input-sm float-right">
                                @foreach ($tahun_appointment as $tahun)
                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                @endforeach
                                {{-- <option value="2020">2020</option> --}}
                                {{-- <option value="2019">2019</option> --}}
                            </select>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body pt-0">
                                <div class="row mb-2">
                                    <div class="col-lg-12 col-sm-12">
                                        <p class="font-weight-bold mb-0">Jumlah Kasus</p>
                                        <div class="chartjs">
                                            <canvas id="chart-kasus" height="300"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 col-sm-12">
                                        <p class="font-weight-bold">Jenis Masalah</p>
                                        <div class="chartjs">
                                            <canvas id="chart-bulan" height="300"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <p class="font-weight-bold">Konseling per prodi</p>
                                        <div class="chartjs">
                                            <canvas id="chart-prodi" height="300"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <p class="font-weight-bold">Tingkat Masalah</p>
                                        <div class="chartjs">
                                            <canvas id="chart-tingkat" height="250"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <p class="font-weight-bold mb-0">Konseling Online & Offline</p>
                                        <div class="chartjs">
                                            <canvas id="chart-online" height="250"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Appointment Bar Line Chart Ends -->
        </div>
    </div>
</div>

@endsection