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
        </div>
    </div>
    @include('components.dashfooter')
</main>
@include('components.dashjs')
