<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <br>

    <div class="container">
        <!-- Content Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Earnings (Monthly) Card Example -->
            <div class="bg-white border border-primary shadow-md rounded-lg p-4">
                <div class="flex items-center justify-between mb-2">
                    <div class="text-primary uppercase font-bold text-xs">Earnings (Monthly)</div>
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                <div class="text-gray-800 text-xl font-bold">${{ $earningsMonthly }}</div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="bg-white border border-success shadow-md rounded-lg p-4">
                <div class="flex items-center justify-between mb-2">
                    <div class="text-success uppercase font-bold text-xs">Earnings (Annual)</div>
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
                <div class="text-gray-800 text-xl font-bold">${{ $earningsAnnual }}</div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="bg-white border border-warning shadow-md rounded-lg p-4">
                <div class="flex items-center justify-between mb-2">
                    <div class="text-warning uppercase font-bold text-xs">Pending Requests</div>
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
                <div class="text-gray-800 text-xl font-bold">{{ $pendingRequests }}</div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-4">

            <!-- Bar Chart -->
            <div class="bg-white border border-primary shadow-md rounded-lg p-4 mt-4">
                <h6 class="font-bold text-primary">Bar Chart</h6>
                <div class="chart-bar mt-3" style="display: flex; justify-content: center; padding-top: 2rem;">
                    <canvas id="myBarChart"></canvas>
                </div>
                <hr class="my-2">
                <p class="text-xs">
                    Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
                </p>
            </div>


            <!-- Pie Chart -->
            <!-- Donut Chart -->
            <div class="bg-white border border-primary shadow-md rounded-lg p-4 mt-4">
                <h6 class="font-bold text-primary">Donut Chart</h6>
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center text-xs">
                    @foreach ($pieChartData as $data)
                    <span class="mr-2">
                        <i class="fas fa-circle {{ $data['color'] }}"></i> {{ $data['label'] }}
                    </span>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <!-- Area Chart -->
        <div class="bg-white border border-primary shadow-md rounded-lg p-4 mt-4">
            <div class="flex items-center justify-between mb-2">
                <h6 class="font-bold text-primary">Area Chart</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>


    </div>

    <br>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var barChartData = @json($barChartData); // Convert PHP array to JavaScript object
            var ctx = document.getElementById('myBarChart').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: barChartData.map(data => data.label),
                    datasets: [{
                        label: 'Value',
                        data: barChartData.map(data => data.value),
                        backgroundColor: 'rgba(0, 123, 255, 0.5)',
                        borderColor: 'rgba(0, 123, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            var pieChartData = @json($pieChartData); // Convert PHP array to JavaScript object
            var ctxPie = document.getElementById('myPieChart').getContext('2d');
            var myPieChart = new Chart(ctxPie, {
                type: 'doughnut',
                data: {
                    labels: pieChartData.map(data => data.label),
                    datasets: [{
                        data: pieChartData.map(data => data.value),
                        backgroundColor: pieChartData.map(data => data.color),
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            var areaChartData = @json($areaChartData); // Convert PHP array to JavaScript object
            var ctxArea = document.getElementById('myAreaChart').getContext('2d');
            var myAreaChart = new Chart(ctxArea, {
                type: 'line', // Use 'line' for area chart
                data: {
                    labels: areaChartData.map(data => data.month),
                    datasets: [{
                        label: 'Value',
                        data: areaChartData.map(data => data.value),
                        fill: true, // Fill the area under the line
                        borderColor: 'rgba(0, 123, 255, 1)',
                        backgroundColor: 'rgba(0, 123, 255, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        });
    </script>
</x-app-layout>