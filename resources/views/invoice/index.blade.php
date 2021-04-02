@section('title')
    Theta - Invoice
@endsection
@extends('layouts.main')
@section('style')

    <style>
        .product-items {
            cursor: pointer;
        }

        .product-items .card-body:hover {
            background-color: #e9a9a9;
        }

    </style>

@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar" style="margin-top: 50px">
        <!-- End row -->

        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-md-7 col-lg-7 col-xl-7">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h5 class="card-title mb-0">Products</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center pb-0 px-0">
                        <div class="row align-items-center product-items">
                            @foreach($items as $item)
                                <div class="col-md-3 col-lg-3 col-xl-3 product-items">
                                    <div class="card m-b-30" onclick="addItem({{ $item->id }})">
                                        <img class="card-img-top" src="{{ asset('uploads/images/'.$item->image) }}" alt="Card image cap">
                                        <div class="card-body btn btn-info" >
                                            <h5 class="card-title font-18" id="item-name-id-{{ $item->id }}">{{ $item->name }}</h5>
                                            <span class="badge badge-pill badge-success" id="item-quantity-id-{{ $item->id }}"></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-md-5 col-lg-5 col-xl-5">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">Sale items</h5>
                            </div>
                            <div class="col-6">
                                <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item mr-0 font-12">Referrals</li>
                                    <li class="list-inline-item"><input type="checkbox" class="js-switch-performance" checked /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pb-0 px-0">
                        <div class="">
                            <div class="table-responsive m-b-30">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>QTY</th>
                                        <th>Action</th>
                                        <th>DESCRIPTION</th>
                                        <th>PRICE</th>
                                        <th>৳</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table-body">

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">Total</th>
                                        <th scope="col" id="total-price">00৳</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <hr>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3" style="background-color: #752323">Paid Amount</span>
                                        </div>
                                        <input type="text" class="form-control" id="paid_amount" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Name</span>
                                        </div>
                                        <input type="text" class="form-control" id="customer" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Phone</span>
                                        </div>
                                        <input type="text" class="form-control" id="phone" aria-describedby="basic-addon3">
                                    </div>
                                    <button type="button" id="" onclick="storeInvoice()" class="btn btn-success btn-lg btn-block">Confirm Sell</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
        <!-- End row -->
    </div>
    <!-- End Contentbar -->

    <script>
        //Add selected items in table for calculation
        function addItem(id){
            getQuantity(); //* Check latest quantity
            if (parseInt(document.getElementById('item-quantity-id-'+id).innerHTML) > 0){
                if($("#table-item-id-"+id).length > 0)
                {
                    if (parseInt(document.getElementById('item-quantity-id-'+id).innerHTML) > parseInt(document.getElementById('table-item-id-qty-'+id).innerHTML)){
                        document.getElementById('table-item-id-qty-'+id).innerHTML = parseInt(document.getElementById('table-item-id-qty-'+id).innerHTML) + 1;
                        // Auto update price with incease quantity
                        document.getElementById("table-item-id-price-"+id).innerHTML =
                            parseInt(document.getElementById('item-id-unit-price-'+id).value)
                            *
                            parseInt(document.getElementById('table-item-id-qty-'+id).innerHTML);
                        //Total calculate with increase
                       totalPrice()

                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'There is no enough products!',
                            footer: 'Please collect this item first.'
                        })
                    }
                }
                else
                {
                    //jQuery append row in table
                    $('#table-body').append('' +
                        '' +
                        '<tr  id="table-item-id-'+id+'">\n' +
                        '                                        <td id="table-item-id-qty-'+id+'" style="text-align:center; vertical-align: middle">1</td>\n' +
                        '                                        <td scope="row" id="table-item-id-qty-btn-'+id+'">' +
                        '<button type="button" class="btn btn-round btn-outline-success" onclick="addItem('+id+')"><i class="feather icon-plus"></i></button>' +
                        '<button type="button" class="btn btn-round btn-outline-danger" onclick="removeItem('+id+')"><i class="feather icon-minus"></i></button>' +
                        '</td>\n' +
                        '                                        <td id="table-item-id-name-'+id+'"> <input id="ids" type="hidden" value="'+ id +'">'+ document.getElementById('item-name-id-'+id).innerHTML +'</td>\n' +
                        '                                        <td id="table-item-id-unit-price-'+id+'"><input required min="1" id="item-id-unit-price-'+id+'" value="" onclick="change('+ id +')" type="text" id="pin" name="pin" maxlength="5" size="5"></td>\n' +
                        '                                        <td id="table-item-id-price-'+id+'">00</td>\n' +
                        '                                    </tr>'+
                        '' +
                        '');
                }
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Stock Empty!',
                    footer: 'Please collect this item first.'
                })
            }
        }
        //Remove Item from table
        function removeItem(id){
            if($("#table-item-id-"+id).length > 0)
            {
                if (parseInt(document.getElementById('table-item-id-qty-'+id).innerHTML) <= 1){
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to remove this item !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, remove it!'
                    }).then((result) => {
                        if (result.value) {
                            var row = document.getElementById('table-item-id-'+id+'');
                            row.parentNode.removeChild(row);
                            //Update total ptice
                            totalPrice()
                            Swal.fire(
                                'Removed!',
                                'Your item has been removed.',
                                'success'
                            )
                        }
                    })

                }else{
                    //Decrease quantity
                    document.getElementById('table-item-id-qty-'+id).innerHTML = parseInt(document.getElementById('table-item-id-qty-'+id).innerHTML) - 1;
                    // Auto update price with descrease quantity
                    document.getElementById("table-item-id-price-"+id).innerHTML =
                        parseInt(document.getElementById('item-id-unit-price-'+id).value)
                        *
                        parseInt(document.getElementById('table-item-id-qty-'+id).innerHTML);
                    //Total calculate with descrease
                    totalPrice()
                }
            }
        }

        //Get Quantity Of Items
        function getQuantity() {
            $.getJSON('{{ url('/get-quantity') }}', function (data) {
                //console.log(data)
                data.forEach(function(item){
                    $("#item-quantity-id-"+item.id).html(item.quantity)
                })
            })
        }
        getQuantity();

        //Change
        function change(id){
            $("#item-id-unit-price-"+id ).autocomplete({
                source: function(request, response) {
                    unit_ptice = parseFloat(request.term);
                    document.getElementById("table-item-id-price-"+id).innerHTML = unit_ptice * parseInt(document.getElementById('table-item-id-qty-'+id).innerHTML);
                    //Total calculate with change
                   totalPrice()
                },
            });
        }

        //Auto total Calculation
        function totalPrice(){
            var records = document.getElementById('table-body').rows, i, total = 0, quantity, price;
            for (i = 0; i < records.length; i++) {
                price = parseFloat(records[i].cells[4].innerHTML);
                total += price;
            }
            total = total.toFixed(2);
            document.getElementById('total-price').innerHTML = total;
        }

        //Invoice submit get data
        function getInputs() {
            var qty = [], ids = [], price = [], total_price, customer, phone;
            var allId = document.querySelectorAll('#ids')
            for (var i = 0; i < allId.length; i++) {
                if (allId[i].value != 'null'){
                    ids.push(allId[i].value)
                }
            }

            var records = document.getElementById('table-body').rows, i;
            for (i = 0; i < records.length; i++) {

                if (parseInt(records[i].cells[0].innerHTML) != 'null'){
                    qty.push(parseInt(records[i].cells[0].innerHTML))
                }
                if (parseFloat(records[i].cells[4].innerHTML) != 'null'){
                    price.push(parseFloat(records[i].cells[4].innerHTML))
                }
            }

             //console.log(ids)
            var total_price     = parseFloat(document.getElementById("total-price").innerHTML)
            var customer        = document.getElementById("customer").value
            var phone           = document.getElementById("phone").value
            var paid_amount           = document.getElementById("paid_amount").value

            return {
                qty: qty,
                ids: ids,
                price: price,
                total_price: total_price,
                paid_amount: paid_amount,
                customer: customer,
                phone: phone,
            }
        }

        //makeInvoice
        function storeInvoice(){
            console.log(getInputs());
            $.ajax({
                method: 'POST',
                url: '/invoice/store',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: getInputs(),
                dataType: 'JSON',
                success: function (data) {
                    //here in data only contain invoice id
                    if (data.type == 'success'){
                        getQuantity(); //* Check latest quantity
                        document.getElementById('table-body').innerHTML="";
                        document.getElementById('total-price').innerHTML="";
                        document.getElementById('paid_amount').value="";
                        document.getElementById('customer').value="";
                        document.getElementById('phone').value="";
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: data.message,
                        })
                    }
                },
                error: function(data)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message,
                        footer: 'SOMETHING WRONG '
                    })
                },

            })

        }
    </script>
@endsection
@section('script')

@endsection
