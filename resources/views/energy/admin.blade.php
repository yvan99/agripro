@include('components.dashcss')
@include('farmer.components.aside')
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
                            <h4 class="card-title">Energy Usage Report</h4>

                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addEnergyModal">
                            Declare Energy Usage
                        </button>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Crop Type</th>
                                        <th>Season Name</th>
                                        <th>Energy Type</th>
                                        <th>Cost</th>
                                        <th>Declared At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($energies as $energy)
                                        <tr>
                                            <th scope="row">{{ $energy->id }}</th>
                                            <td>{{ $energy->crop->crop_type }}</td>
                                            <td>{{ $energy->season->name }}</td>
                                            <td>{{ $energy->energy_type }}</td>
                                            <td>{{ $energy->cost }}</td>
                                            <td>{{ $energy->created_at }}</td>
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
