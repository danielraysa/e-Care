@extends('backend.partialadmin.layout')
@push('js')
<script>
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#chart-dashboard");
    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
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
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Jumlah'
                }
            }]
        },
        title: {
            display: false,
            text: 'Chart.js Combo Bar Line Chart'
        }
    };

    $.ajax({
        url: "{{ route('get-chart') }}",
        type: "GET",
        success: function(result){
            // alert(result);
            var data_label = [];
            var data_jml = [];
            console.log(result);
            for(i in result){
                data_label.push(result[i].bulan);
                data_jml.push(result[i].jumlah_data);
            }
            // Chart Data
            var chartData = {
                labels: data_label,
                datasets: [
                {
                    type: 'bar',
                    label: "Appointment",
                    data: data_jml,
                    backgroundColor: "#00A5A8",
                    borderColor: "transparent",
                    borderWidth: 2
                }
                /* , {
                    type: 'bar',
                    label: "My Third dataset - No bezier",
                    data: [45, 25, 16, 36, 67, 18, 76],
                    backgroundColor: "#F25E75",
                    borderColor: "transparent",
                    borderWidth: 2
                } */
                ]
            };

            var config = {
                type: 'bar',
                // Chart Options
                options : chartOptions,
                data : chartData
            };
            // Create the chart
            var lineChart = new Chart(ctx, config);
        }
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
            <!-- Hospital Info cards Ends -->

            <!-- Appointment Bar Line Chart -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Grafik</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body chartjs">
                                <canvas id="chart-dashboard" height="400"></canvas>
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