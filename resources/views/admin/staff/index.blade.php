@section('title')
 - Staff
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
            <h4 class="page-title">Staff Product</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Staff</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button id="show-create-staff" class="btn btn-primary">New Staff</button>
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
                    <h5 class="card-title">Staff Product</h5>
                </div>
                <div class="card-body">
                    @include('layouts.message')
                    <div class="table-responsive">
                        <table id="default-datatable" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Total Sold</th>
                                    <th>Total due sold</th>
                                    <th>Last Login</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($staffs as $staff)
                                <tr @if($staff->status == 0) style="background-color: #631717" @endif>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->email }}</td>
                                    <td>{{ $staff->invoice->sum('total_price') }}</td>
                                    <td>{{ $staff->invoice->sum('total_price') - $staff->invoice->sum('paid_amount') }}</td>
                                    <td>{{ date('d/m/Y-h:m:s', strtotime($staff->last_login_at)) }}</td>
                                    <td>
                                        <div class="button-list">
                                            <button type="button" id="" onclick="openEditModal({{ $staff->id }})" class="btn btn-round btn-warning"><i class="feather icon-upload"></i></button>
                                            <button type="button" class="btn btn-round btn-danger"><i class="feather icon-trash-2"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Total Sold</th>
                                    <th>Total due sold</th>
                                    <th>Last Login</th>
                                    <th>Action</th>
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
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="add-staff-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-staff-modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="add-staff-modal-body">
                <!--data listing table-->
                <div class="card-body">
                    <input type="hidden" id="editableId" value="" >
                    <form action="{{ route('admin.staff.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3" style="background-color: #752323">Staff Name</span>
                        </div>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3" style="background-color: #752323">Staff Email</span>
                        </div>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3" style="background-color: #752323">Password</span>
                        </div>
                        <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="type">User Type</label>
                        </div>
                        <select class="custom-select" id="type" name="type">
                            <option disabled selected="">Choose...</option>
                            <option value="1">Admin</option>
                            <option value="2">Staff</option>
                        </select>
                    </div>
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <label class="input-group-text" for="type">Account status</label>
                         </div>
                         <select class="custom-select" id="status" name="status">
                             <option disabled selected="">Choose...</option>
                             <option value="1">Admin</option>
                             <option value="2">Staff</option>
                         </select>
                    </div>
                    <div class="input-group mb-3">
                       <lable>*Profile image</lable>
                        <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
                    </div>
                    <button type="submit" id="submit-btn" class="btn btn-success btn-lg btn-block">Add Staff</button>
                    <button type="button" id="update-btn" class="btn btn-warning btn-lg btn-block">Update Now</button>
                    </form>
                </div>
                <!--data listing table-->
            </div>
            <div class="modal-footer" id="add-staff-modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal End-->
<script>
    //Open modal for add.
    document.getElementById('show-create-staff').onclick = function openModal(){
        $('#submit-btn').show();
        $('#update-btn').hide();
        $('#add-staff-modal').modal('show');
        document.getElementById('add-staff-modal-title').innerHTML='Add new staff';
    }
    //Open modal for edit.
     function openEditModal(id){
         $('#submit-btn').hide();
         $('#update-btn').show();

         $.ajax({
             method: 'get',
             url: '/staff/'+id+'/edit',
             //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             //data:  { id: id},
             //dataType: 'JSON',
             success: function (data) {
                 document.getElementById('name').value = data.name
                 document.getElementById('email').value = data.email

                 document.getElementById('editableId').value = data.id
                 if(data.type == 1) {
                     document.getElementById('type').innerHTML =
                         '<option disabled>Choose...</option>\n' +
                         '                            <option value="1" selected style="background-color: #0000cc">Admin</option>\n' +
                         '                            <option value="2">Staff</option>'
                 }else{
                     document.getElementById('type').innerHTML =
                         '<option disabled>Choose...</option>\n' +
                         '                            <option value="1" >Admin</option>\n' +
                         '                            <option value="2" selected style="background-color: #0000cc">Staff</option>'
                 }

                 if(data.status == 1) {
                     document.getElementById('status').innerHTML =
                         '<option disabled>Choose...</option>\n' +
                         '                            <option value="1" selected style="background-color: #00b604">Active</option>\n' +
                         '                            <option value="0">Inactive</option>'
                 }else{
                     document.getElementById('status').innerHTML =
                         '<option disabled>Choose...</option>\n' +
                         '                            <option value="1" >Active</option>\n' +
                         '                            <option value="0" selected style="background-color: #ef0331">Inactive</option>'
                 }
             },
             error: function(data)
             {
                 //console.log(data)
                 Swal.fire({
                     icon: 'error',
                     title: 'Unknown Errors...',
                     footer: '<a href="mailto:support@datatechbd.com?cc=info@datatechbd.com, m.sakirahmed@gmail.com, ismathjahanjhumu@gmail.com&bcc=datatechbdltd@gmail.com&subject=BD-Hike-Plus%20Face-A-Problem&body=I face a problem to using our system. My contact number is: +880 1....">Report a problem</a>'
                 })
             },
         })

         $('#add-staff-modal').modal('show');
         document.getElementById('add-staff-modal-title').innerHTML='Add new staff';
    }

    //New Staff submit
    function getInputs() {
        var name   = document.getElementById('name').value
        var email    = document.getElementById('email').value
        var password          = document.getElementById('password').value
        var type    = document.getElementById('type').value;
        var status    = document.getElementById('status').value;
        var id = document.getElementById('editableId').value;
        return {
            id: id,
            name: name,
            email: email,
            password: password,
            type: type,
            status: status,
        }
    }
    //status-edit staff
    document.getElementById('update-btn').onclick = function(){
        console.log('getInputs()')
        $.ajax({
            method: 'POST',
            url: '/staff-update',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: getInputs(),
            dataType: 'JSON',
            success: function (data) {
                if (data.type == 'success'){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    location.reload();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message,
                    })
                }
            },
            error: function(data)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Unknown Errors...',
                    footer: '<a href="mailto:support@datatechbd.com?cc=info@datatechbd.com, m.sakirahmed@gmail.com, ismathjahanjhumu@gmail.com&bcc=datatechbdltd@gmail.com&subject=BD-Hike-Olus%20Face-A-Problem&body=I face a problem to using our system. \n\n My contact number is: +880 1.... ">Report a problem</a>'
                })
            },
        })
    }
</script>
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
<!-- Custom Switchery js -->
<script src="{{ asset('assets/js/custom/custom-switchery.js') }}"></script>
@endsection
