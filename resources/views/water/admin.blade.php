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
                            <h4 class="card-title">Irrigation Report</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Season</th>
                                        <th>Crop</th>
                                        <th>Amount</th>
                                        <th>Irrigation Type</th>
                                        <th>Irrigation Frequency</th>
                                        <th>Cost</th>
                                        <th>Registered date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($waters as $water)
                                        <tr>
                                            <td>{{ $water->id }}</td>
                                            <td>{{ $water->season->name }}</td>
                                            <td>{{ $water->crop->crop_type }}</td>
                                            <td>{{ $water->amount }}</td>
                                            <td>{{ $water->irrigation_type }}</td>
                                            <td>{{ $water->irrigation_frequency }}</td>
                                            <td>{{ $water->cost }}</td>
                                            <td>{{ $water->created_at }}</td>
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
