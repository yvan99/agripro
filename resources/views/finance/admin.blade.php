@include('components.dashcss')
@include('admin.components.aside')
<main class="main-content">
    <div class="position-relative ">
        <!--Nav Start-->
        @include('components.dasheader')
        <!--Nav End-->
    </div>
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Finance Data</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Season</th>
                                        <th>Production Cost</th>
                                        <th>Income</th>
                                        <th>Gross Margin</th>
                                        <th>Labor Cost</th>
                                        <th>Fertilizer Cost</th>
                                        <th>Pesticide Cost</th>
                                        <th>Irrigation Cost</th>
                                        <th>Net Profit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finances as $finance)
                                        <tr>
                                            <td>{{ $finance->id }}</td>
                                            <td>{{ $finance->season->name }}</td>
                                            <td>{{ $finance->production_cost }}</td>
                                            <td>{{ $finance->income }}</td>
                                            <td>{{ $finance->gross_margin }}</td>
                                            <td>{{ $finance->labor_cost }}</td>
                                            <td>{{ $finance->fertilizer_cost }}</td>
                                            <td>{{ $finance->pesticide_cost }}</td>
                                            <td>{{ $finance->irrigation_cost }}</td>
                                            <td>{{ $finance->net_profit }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Finance Analysis</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Create a canvas element for the chart -->
                        <canvas id="finance-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.dashfooter')
</main>
@include('components.dashjs')

<script>
    // Retrieve finance data from backend
    let financeData = @json($financeJson);
    // Extract labels and datasets for the chart
    let labels = financeData.original.map(data => data.name);
    let datasets = [{
            label: 'Production Cost',
            data: financeData.original.map(data => data.production_cost),
            borderColor: 'rgb(255, 99, 132)',
            fill: false
        },
        {
            label: 'Income',
            data: financeData.original.map(data => data.income),
            borderColor: 'rgb(54, 162, 235)',
            fill: false
        },
        {
            label: 'Gross Margin',
            data: financeData.original.map(data => data.gross_margin),
            borderColor: 'rgb(255, 205, 86)',
            fill: false
        },
        {
            label: 'Labor Cost',
            data: financeData.original.map(data => data.labor_cost),
            borderColor: 'rgb(75, 192, 192)',
            fill: false
        },
        {
            label: 'Fertilizer Cost',
            data: financeData.original.map(data => data.fertilizer_cost),
            borderColor: 'rgb(153, 102, 255)',
            fill: false
        },
        {
            label: 'Pesticide Cost',
            data: financeData.original.map(data => data.pesticide_cost),
            borderColor: 'rgb(255, 159, 64)',
            fill: false
        },
        {
            label: 'Irrigation Cost',
            data: financeData.original.map(data => data.irrigation_cost),
            borderColor: 'rgb(0, 204, 204)',
            fill: false
        },
        {
            label: 'Net Profit',
            data: financeData.original.map(data => data.net_profit),
            borderColor: 'rgb(220, 53, 69)',
            fill: false
        }
    ];

    // Create the chart
    let ctx = document.getElementById('finance-chart').getContext('2d');
    let chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
