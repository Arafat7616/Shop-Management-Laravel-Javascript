@section('title')
    Dashboard
@endsection
@extends('layouts.main')
@section('style')
    <!-- jvectormap css -->
    <link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Datepicker css -->
    <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Dashboard</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overall information</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <button class="btn btn-primary">Add Widget</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-md-6 col-lg-6 col-xl-2">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title text-white mb-0">Staff</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="dash-social-icon"><i class="feather icon-user"></i></p>
                                <h3 class="text-white mb-4">{{ \App\User::where('type', '2')->count() }}</h3>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-12">
                                <p class="text-white text-center mb-0">Total Staff</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-md-6 col-lg-6 col-xl-2">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title text-white mb-0">Item</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="dash-social-icon"><i class="feather icon-plus"></i></p>
                                <h3 class="text-white mb-4">{{ \App\Item::sum('quantity') }}</h3>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-12">
                                <p class="text-white text-center mb-0">Stock Item</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h5 class="card-title mb-0">Today</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center pb-0 px-0">
                        <div class="row align-items-center">
                            <div class="col-md-4"><p>Items: {{ \App\Sale::whereDate('created_at', \Carbon\Carbon::today())->sum('quantity') }}</p></div>
                            <div class="col-md-4"><h3>{{ \App\Item::sum('buy_price') }}৳</h3></div>
                            <div class="col-md-4"><p><span class="badge badge-success-inverse font-16"> Sell: {{ \App\Invoice::whereDate('created_at', \Carbon\Carbon::today())->sum('total_price') }}৳<i class="feather icon-arrow-up-right"></i></span></p></div>
                        </div>
                        <canvas height="150" id="chartjs-boundary-area-chart" class="chartjs-chart mt-4"></canvas>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">Performance</h5>
                            </div>
                            <div class="col-6">
                                <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item mr-0 font-12">Referrals</li>
                                    <li class="list-inline-item"><input type="checkbox" class="js-switch-performance" checked /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center pb-0 px-0">
                        <div class="row align-items-center">
                            <div class="col-md-4"><p>Sessions</p></div>
                            <div class="col-md-4"><h3>2589</h3></div>
                            <div class="col-md-4"><p><span class="badge badge-danger-inverse font-16">25%<i class="feather icon-arrow-down-right"></i></span></p></div>
                        </div>
                        <canvas height="150" id="chartjs-bar-chart" class="chartjs-chart mt-4"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('script')
    <!-- Chart js -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.js/chart-bundle.min.js') }}"></script>
    <!-- Piety Chart js -->
    <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <!-- Vector Maps js -->
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Custom Dashboard Social js -->
    <script src="{{ asset('assets/js/custom/custom-dashboard-social.js') }}"></script>
@endsection
