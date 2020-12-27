@extends('backend.partialadmin.layout')
@push('js')
<script>
    var bgColor = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#ec5858', '#34626c', '#5c6e91'];
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#chart-bulan");
    var ctx_prodi = $("#chart-prodi");
    var ctx_tingkat = $("#chart-tingkat");
    var ctx_mbti = $("#chart-online");
    var bulanChart,prodiChart,tingkatChart,onlineChart;
    // Chart Options
    var chartLineOptions = {
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
                    color: "#ffffff",
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Bulan'
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                },
                gridLines: {
                    color: "#ffffff",
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Jumlah Appointment'
                }
            }]
        }
    };

    $.ajax({
        url:"{{ route('chart-konselor') }}",
        type: "GET",
        data: {pie: true},
        success: function(result){
            console.log(result);
            bulanChart = new Chart(ctx, {
                type: 'bar',
                options: chartLineOptions,
                data: {
                    labels: result.data_kasus.labels,
                    datasets: result.data_kasus.dataset
                }
            });
            prodiChart = new Chart(ctx_prodi, {
                type: 'pie',
                // options: chartBarOptions,
                data: {
                    labels: result.data_prodi.label,
                    datasets: [{
                        label: 'Jumlah',
                        data: result.data_prodi.data,
                        backgroundColor: result.data_prodi.backgroundColor,
                        // borderColor: "transparent",
                        // borderWidth: 2
                    }]
                }
            });
            
            tingkatChart = new Chart(ctx_tingkat, {
                type: 'bar',
                data: {
                    labels: result.data_tingkat.labels,
                    datasets: result.data_tingkat.dataset
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
                }
            });
        }
    });
    $('#pilih_tahun').change(function(){
        var value = $(this).val();
        $.ajax({
            url:"{{ route('chart-konselor') }}",
            type: "GET",
            data: {filter_tahun: value, pie: true},
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
                        labels: result.data_kasus.labels,
                        datasets: result.data_kasus.dataset
                    }
                });
                prodiChart = new Chart(ctx_prodi, {
                    type: 'pie',
                    // options: chartBarOptions,
                    data: {
                        labels: result.data_prodi.label,
                        datasets: [{
                            label: 'Jumlah',
                            data: result.data_prodi.data,
                            backgroundColor: result.data_prodi.backgroundColor,
                            // borderColor: "transparent",
                            // borderWidth: 2
                        }]
                    }
                });
                
                tingkatChart = new Chart(ctx_tingkat, {
                    type: 'bar',
                    data: {
                        labels: result.data_tingkat.labels,
                        datasets: result.data_tingkat.dataset
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
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
            {{-- <h4>{{dd(Auth::guard('konselor_guard'))}}</h4> --}}
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
                                        <h5 class="text-muted text-bold-500">Permintaan Chat</h5>
                                        <h3 class="text-bold-600">{{ $permintaan->count() }}</h3>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="la la-stethoscope font-large-2 warning"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h5 class="text-muted text-bold-500">Konseling</h5>
                                        <h3 class="text-bold-600">{{ $konseling->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="la la-calendar-check-o font-large-2 info"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h5 class="text-muted text-bold-500">Total Rekam Medis</h5>
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
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                            <h4 class="card-title">Grafik</h4>
                            <select name="pilih_tahun" id="pilih_tahun" style="width: 100px" class="form-control input-sm float-right">
                                @foreach ($tahun_appointment as $item)
                                    <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8 col-sm-12">
                                        <p class="font-weight-bold">Appointment per Bulan</p>
                                        <div class="chartjs">
                                            <canvas id="chart-bulan" height="300"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <canvas id="chart-prodi" height="300"></canvas>
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