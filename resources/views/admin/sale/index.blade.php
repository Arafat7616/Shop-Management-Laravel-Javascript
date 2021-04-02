@section('title')
 - Sales
@endsection
@extends('layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Sold Product</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sold Product</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('invoice.index') }}" class="btn btn-primary">New Sale</a>
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
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Sold Product</h5>
                </div>
                <div class="card-body">
                    @include('layouts.message')
                    <div class="table-responsive">
                        <table id="default-datatable" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sold No.</th>
                                    <th>Dress</th>
                                    <th>Quantity</th>
                                    <th>Sold/Piece</th>
                                    <th>Sold-Total</th>
                                    <th>Profit-Total</th>
                                    <th>Salesman</th>
                                    <th>Sold Time</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                @foreach($invoice->sale as $sale)
                                    <tr>
                                        <td>{{ $invoice->id }}</td>
                                        <td>{{ $sale->item->name }}</td>
                                        <td>{{ $sale->quantity }}</td>
                                        <td>{{ $sale->price / $sale->quantity }}</td>
                                        <td>{{ $sale->price }}</td>
                                        <td>{{ $sale->price - ($sale->item->buy_price * $sale->quantity) }}</td>
                                        <td>{{ $invoice->staff->name }}</td>
                                        <td>{{ date('d/m/Y-h:i:sa', strtotime($invoice->date)) }}</td>

                                    </tr>
                                @endforeach
                            @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sold No.</th>
                                    <th>Dress</th>
                                    <th>Quantity</th>
                                    <th>Sold/Piece</th>
                                    <th>Sold-Total</th>
                                    <th>Profit-Total</th>
                                    <th>Salesman</th>
                                    <th>Sold Time</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
@section('script')
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-table-datatable.js') }}"></script>
@endsection
