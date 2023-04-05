@include('components.dashcss')
@include('admin.components.aside')
<main class="main-content">
    <div class="position-relative ">
        <!--Nav Start-->
        @include('components.dasheader')
        <!--Nav End-->
    </div>
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-5 gap-3">
            <div class="d-flex flex-column">
                <h3>Hello , {{ Auth::user()->name }}</h3>
                <p class="mb-0">Analytics Dashboard</p>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-8 col-xl-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-block card-stretch card-height">
                            <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                                <div class="header-title">
                                    <h4>Sales Stastics</h4>
                                </div>
                                <div class="d-flex">
                                    <div class="mx-3">
                                        <p class="mb-0"><svg class="text-primary" width="10" height="10"
                                                viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="5" cy="5" r="5"
                                                    fill="currentColor" />
                                            </svg> Total Sales </p>
                                    </div>
                                    <div class="mx-3">
                                        <p class="mb-0"><svg class="text-secondary" width="10" height="10"
                                                viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="5" cy="5" r="5"
                                                    fill="currentColor" />
                                            </svg> Total Expense</p>
                                    </div>
                                    <div class="">
                                        <p class="mb-0"><svg class="text-tertiray" width="10" height="10"
                                                viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="5" cy="5" r="5"
                                                    fill="currentColor" />
                                            </svg> Total Profit</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="sales-chart-02" class="sales-chart-02"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card card-block card-stretch card-height">
                    <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4>Sales Anylsis</h4>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton29"
                                data-bs-toggle="dropdown" aria-expanded="false">All Tasks</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton29"
                                style="">
                                <li><a class="dropdown-item" href="#">This Week</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sales-chart-04" class="sales-chart-04"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('components.dashfooter')
</main>
@include('components.dashjs')