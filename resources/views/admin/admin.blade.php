@extends('layouts.sidebar')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{Auth::user()->name}}</h3>
                            <h6 class="font-weight-normal mb-0">All systems are running smoothly! </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card tale-bg">
                        <div class="card-people mt-auto">
                            <img src="/images/dashboard/people.svg" alt="people">
                            <div class="weather-info">
                                <div class="d-flex">
                                    @if(isset($weatherData))
                                    <div>
                                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>{{$weatherData['current']['temp_c']}}<sup>°C</sup></h2>
                                    </div>
                                    <div class="ml-2">

                                        <h4 class="location font-weight-normal">{{ $weatherData['location']['name'] }}-Lasfar</h4>
                                        <h6 class="font-weight-normal">Morocco</h6>

                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">Total Zones</p>
                                    <p class="fs-30 mb-2">{{\App\Models\Zones::where('type','1')->count()}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Total Subzones</p>
                                    <!--calculate number of zones of type subzone in database-->
                                    <p class="fs-30 mb-2">{{\App\Models\Zones::where('type','2')->count()}}</p>
                                </div>
                                <div class="col-4 background-icon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Number of users</p>
                                    <p class="fs-30 mb-2">{{\App\Models\User::all()->count()}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Number of Reports</p>
                                    <p class="fs-30 mb-2">{{\App\Models\Reports::all()->count()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">ESLI Details</p>
                            <p class="font-weight-500">Various details about ESLI's production and last data inserted in reports.</p>
                            <div class="d-flex flex-wrap mb-5">
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">Production value</p>
                                    <!-- add last production value from database-->
                                    <h3 class="text-primary fs-30 font-weight-medium">{{\App\Models\Reports::all()->last()->production}}</h3>
                                </div>
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">Electric Consomption</p>
                                    <h3 class="text-primary fs-30 font-weight-medium">{{\App\Models\Reports::all()->last()->consom_elec}}</h3>
                                </div>
                            </div>
                            <canvas id="prod-chart"></canvas>
                        </div>
                    </div>
                    <script>
                        @php
                            // PHP code for retrieving and processing the data
                            $reportData = App\Models\Reports::orderBy('date', 'asc')->get();
                            $labels = $reportData->pluck('date');
                            $productionData = $reportData->pluck('production');
                            $consumptionData = $reportData->pluck('consomation');
                            $consumptionElecData = $reportData->pluck('consom_elec');
                        @endphp
                        var ctx = document.getElementById('prod-chart').getContext('2d');

                        var productionLineChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: @json($labels),
                                datasets: [
                                    {
                                        label: 'Production',
                                        data: @json($productionData),
                                        fill: false, // Do not fill the area under the line
                                        borderColor: 'rgba(0, 0, 255, 1)', // Blue color for production
                                        borderWidth: 2,
                                        pointRadius: 4, // Size of data points
                                        pointBackgroundColor: 'rgba(0, 0, 255, 1)', // Point color
                                    },
                                ],
                            },
                            options: {
                                legend: {display: false},
                                scales: {
                                    xAxes: [{display: false}],
                                    yAxes: [{display:false}],
                                },
                            },
                        });

                    </script>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="card-title">Cumul Report</p>
                            </div>
                            <p class="font-weight-500">The cumul value of the data reports starting from the first date inserted till the last one.</p>
                            <div class="mt-4 mb-2"></div>
                            <canvas id="cumul-chart"></canvas>
                        </div>
                    </div>
                </div>
                <script>
                    @php
                        // PHP code for retrieving and processing the data
                        $reportData = App\Models\Reports::orderBy('date', 'asc')->get();
                        $labels = $reportData->pluck('date');
                        $cumulProductionData = $reportData->pluck('cumul_production');
                        $cumulConsumptionData = $reportData->pluck('cumul_consomation');
                    @endphp
                    var ctx = document.getElementById('cumul-chart').getContext('2d');
                    var doubleBarChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: @json($labels), // Your date labels here
                            datasets: [
                                {
                                    label: 'Cumulative Production',
                                    data: @json($cumulProductionData), // Your cumulative production data here
                                    backgroundColor: 'rgba(54, 162, 235, 0.7)', // Blue color
                                    borderColor: 'rgba(54, 162, 235, 1)', // Border color for the bars
                                    borderWidth: 1, // Border width for the bars
                                },
                                {
                                    label: 'Cumulative Consumption',
                                    data: @json($cumulConsumptionData), // Your cumulative consumption data here
                                    backgroundColor: 'rgba(0, 0, 255, 1)', // Light blue color
                                    borderColor: 'rgba(0, 0, 255, 1)', // Border color for the bars
                                    borderWidth: 1, // Border width for the bars
                                },
                            ],
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true, // Start the y-axis at zero
                                },
                            },
                            plugins: {
                                legend: {
                                    display: true, // Display the legend on top of the chart
                                },
                            },
                        },
                    });
                </script>
            </div>

@endsection




