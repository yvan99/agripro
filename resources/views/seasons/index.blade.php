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
                            <h4 class="card-title">Crops seasons List</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>Year</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($seasons as $season)
                                        <tr>
                                            <td>{{ $season->year }}</td>
                                            <td>{{ $season->name }}</td>
                                            <td>{{ $season->created_at }}</td>
                                            <td>{{ $season->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Modal -->
                            <div class="modal fade" id="createSeasonModal" tabindex="-1" role="dialog"
                                aria-labelledby="createSeasonModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createSeasonModalLabel">Create Season</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Add your form here -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.dashfooter')
</main>
@include('components.dashjs')
