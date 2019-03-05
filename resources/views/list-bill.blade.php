<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

        <script type="text/javascript" src="{{ URL::asset('js/jQuerry.js') }}" ></script>

        <!-- <script src="//code.jquery.com/jquery-1.12.3.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/jquery-2.js') }}" ></script>
        <!-- <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/datatables-jquerry.js') }}" ></script>
        <!-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/datatables-bootstrap.js') }}" ></script>
        <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/responsive.js') }}" ></script>
        <!-- <script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/sum.js') }}" ></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/datepicker.js') }}" ></script>

        
        <link rel="stylesheet" href="{{ URL::asset('css/datatable.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/minimilsitic.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/sidebar.css') }}" />
        <link href="{{ URL::asset('css/datepicker.css') }}" rel="stylesheet">

    </head>
        
    <body>
        <!-- <div id="page-content-wrapper"> -->

        <div id="wrapper">
            @include('Extra.sidebar')
            <!-- Sidebar -->
            <h1 class="header" id="menu-toggle">&#x2744; BILLING &#x2744;</h1>
            
                <!-- header Links -->
                <div class="container-fluid text-center text-md-left padding-container-header">

                  <!-- Grid row -->
                  <div class="row">

                    <!-- Grid column -->

                    <div class="col-md-1 mb-md-0 mb-3">

                        <input id="submit" type="submit" class="bill-confirm more bill-margin" onclick="moreDetails()" value="MORE" id="more-info">

                        <input id="submit" type="submit" style="display: none;" class="bill-confirm less bill-margin" onclick="lessDetails()" value="LESS" id="less-info">

                    </div>
                    <div class="col-md-2 mb-md-0 mb-3">
                        <div class="less" style="display: none;">
                            
                            <h5 class="text-uppercase">TOTAL PROFIT</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-profit">0</span>
                        </div>

                    </div>
                    <div class="col-md-2 mt-md-0 mt-3">
                        <div class="less" style="display: none;">
                            
                            <h5 class="text-uppercase">TOTAL DISCOUNT</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center" id="total-discount">0</span>
                        </div>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none pb-3">

                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">
                        
                        <div class="less" style="display: none;">
                            
                            <h5 class="text-uppercase">TOTAL SELLING</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center" id="total-amount">0</span>
                        </div>
                    </div>

                    <div class="col-md-1 mb-md-0 mb-3">
                        <label class="form-group has-float-label" >
                          <input class="" placeholder="BILL ID" type="text" id="search-bill">
                          <span>BILL ID</span>
                        </label>            
                    </div>

                    <div class="col-md-2 mb-md-0 mb-3">
                            
                        <label class="form-group has-float-label" >
                          <input class="date " placeholder="DATE" type="text" id="datepicker-date">
                          <span>DATE</span>
                        </label>

                    </div>
                    <div class="col-md-1 mb-md-0 mb-3">
                        <input id="submit" type="submit" class="bill-confirm bill-margin" onclick="searchBill()" value="SEARCH">

                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </div>
                <!-- Footer Links -->

            <div class="container-fluid top-padding ">
                <div class="row">
                    <div class="col-md-12">
                        <table class="datatable row-border hover" id="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Products</th>
                                    <th class="text-center">Bill Id</th>
                                    <th class="text-center">Date & Time</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Cost Price</th>
                                    <th class="text-center">Selling Price</th>
                                    <th class="text-center">Discount</th>
                                    <th class="text-center">Profit</th>
                                    <th class="text-center">Total Quantity</th>
                                    <th class="text-center">User</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <!-- /#sidebar-wrapper -->

        <!-- DELETE MODAL START -->

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-easein="slideDownIn">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title white " id="exampleModalLongTitle">DELETE</h5>
                    </div>
                    <div class="modal-body white container">
                        <div class="row">   
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-1"></div>

                                <div class="col-md-4">
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('b_date_time', null, ['id' => 'b_date_time_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'DATE & TIME' , 'class' => 'modal-inputs ' ,'disabled' => 'disabled']) !!}
                                      <span>DATE & TIME</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('c_name', null, ['id' => 'c_name_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'NAME' ,'onkeypress' => 'return isNumberKey(event)' ,'class' => 'modal-inputs','disabled' => 'disabled']) !!}
                                      <span>NAME</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('b_cost_price', null, ['id' => 'b_cost_price_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'COST PRICE' ,'onkeypress' => 'return isNumberKey(event)' ,'class' => 'modal-inputs' ,'disabled' => 'disabled']) !!}
                                      <span>COST PRICE</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('b_selling_price', null, ['id' => 'b_selling_price_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'SELLING PRICE' ,'onkeypress' => 'return isNumberKey(event)' ,'class' => 'modal-inputs','disabled' => 'disabled']) !!}
                                      <span>SELLING PRICE</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('b_discount', null, ['id' => 'b_discount_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'DISCOUNT' ,'onkeypress' => 'return isNumberKey(event)' ,'class' => 'modal-inputs','disabled' => 'disabled']) !!}
                                      <span>DISCOUNT</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('b_profit', null, ['id' => 'b_profit_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'PROFIT' ,'onkeypress' => 'return alphaOnly(event)' , 'class' => 'uppercase modal-inputs' ,'disabled' => 'disabled' ]) !!}
                                      <span>PROFIT</span>
                                    </label> 
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('b_quantity', null, ['id' => 'b_quantity_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'TOTAL QUANTITY' ,'onkeypress' => 'return alphaOnly(event)' , 'class' => 'uppercase modal-inputs-below' ,'disabled' => 'disabled' ]) !!}
                                      <span>TOTAL QUANTITY</span>
                                    </label> 
                                </div>

                                <div class="col-md-1"></div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="save-buttons" onclick="deleteBillData(window.bill_id)" value="CONFIRM">
                        <input type="submit" class="close-buttons" data-dismiss="modal" value="CLOSE">
                    </div>
                </div>
            </div>
        </div>

        <!-- DELETE MODAL END -->
        @include('Extra.bootstrapjs')
    </body>
    <script>
        loadData(2);
        function loadData(date){
            if(date == 2){
                date = "";
            }

            var bill_id = $('#search-bill').val();
            $('#table').DataTable({
                "dom": '<"top">rt<"bottom"ilp><"clear">',
                processing: true,
                serverSide: true,
                // searching: false,
                paging: false,
                bInfo: false,
                bFilter: false,
                ajax: ({
                    type:'POST',
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    data: {
                            date : date,
                            bill_id : bill_id,
                    },
                    url:'list-bill-data',
                }),
                columns: [
                    {render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        "className":      'details-control dt-center',
                        render: function (data, type, row, meta) {
                            return "<input type='submit' value='▼' id='moreInfo"+ row.bill_id + "' class='delete-button'  data-bill_product_data=\"" + row.bill_product_data + "\" data-bill_id=\"" + row.bill_id + "\">";
                        }
                    },
                    {data: 'bill_id', name: 'bill_id',searchable: false},
                    {data: 'bill_date_time', name: 'bill_date_time',searchable: false},
                    {data: 'c_name', name: 'c_name',searchable: false},
                    {data: 'cost_price', name: 'cost_price',searchable: false, visible: false},
                    {data: 'selling_price', name: 'selling_price',searchable: false},
                    {data: 'discount', name: 'discount',searchable: false},
                    {data: 'profit', name: 'profit',searchable: false, visible: false},
                    {data: 'total_quantity', name: 'total_quantity',searchable: false},
                    {data: 'user', name: 'user',searchable: false},
                    {render: function (data, type, row, meta) {
                            return "<a href='list-pdf-data?SDfs="+ row.bill_id_encoded + "' target='_blank'><input type='submit' value='P' class='delete-button' ></a> <input type='submit' value='X' class='delete-button' onclick='deleteBillModal(this)' data-b_date_time=\"" + row.bill_date_time + "\" data-c_name=\"" + row.c_name + "\" data-cost_price=\"" + row.cost_price + "\" data-selling_price=\"" + row.selling_price + "\" data-b_discount=\"" + row.discount + "\" data-b_profit=\"" + row.profit + "\" data-bill_id=\"" + row.bill_id + "\" data-b_quantity=\"" + row.total_quantity + "\">";
                        }
                    },
                ],
                "columnDefs": [
                            {"className": "dt-center","targets": "_all"}
                ],
                "ordering": false,
                "bScrollInfinite": true,
                "bScrollCollapse": true,
                "iScrollLoadGap": 10,
                "responsive": true,
                "drawCallback": function( settings ) {
                    drawProfit();
                }
            });
        }

        function moreDetails(){
            var table = $('#table').DataTable();
            table.column( 8 ).visible( true );
            table.column( 5 ).visible( true );
            $('.more').hide();
            $('.less').show();
            table.columns.adjust().draw();
            // var profit = table.column( 6 ).data().sum();
            // document.getElementById("total-profit").innerHTML = profit;
            // var cost = table.column( 4 ).data().sum();
            // document.getElementById("total-cost").innerHTML = cost;
        }
        function lessDetails(){
            var table = $('#table').DataTable();
            table.column( 8 ).visible( false );
            table.column( 5 ).visible( false );
            $('.less').hide();
            $('.more').show();
            table.columns.adjust().draw();
        }
        function drawProfit(){
            var table = $('#table').DataTable();
            var profit = table.column( 8 ).data().sum();
            document.getElementById("total-profit").innerHTML = profit;
            var discount = table.column( 7 ).data().sum();
            var amount = table.column( 6 ).data().sum();
            document.getElementById("total-discount").innerHTML = discount;
            document.getElementById("total-amount").innerHTML = amount;
        }
        function format ( d ) {
            // `d` is the original data object for the row<table class="datatable row-border hover" id="table" style="width:100%">
            return '<table id="insideTable'+window.bill_id+'" cellpadding="5" cellspacing="0" border="0" style="width:100%" >'+
                '<thead >'+
                    '<tr class="second-table">'+
                        '<th class="text-center ">#</th>'+
                        '<th class="text-center ">Urbane Id</th>'+
                        '<th class="text-center ">Product Name</th>'+
                        '<th class="text-center ">Cost</th>'+
                        '<th class="text-center ">Quantity</th>'+
                        '<th class="text-center ">Rate</th>'+
                        '<th class="text-center ">Price</th>'+
                    '</tr>'+
                '</thead>'+
            '</table>';
        }
        // function detailRow(data){
        //     window.bill_product_data = [];
        //     window.bill_product_data = data.getAttribute("data-bill_product_data");
        //     window.bill_id = data.getAttribute("data-bill_id");
        // }
        $('#table tbody').on('click', 'td.details-control', function () {
            var data = $(this).html();
            var table = $('#table').DataTable();
            window.bill_product_data = this.getElementsByTagName("input")[0].getAttribute("data-bill_product_data");
            window.bill_id = this.getElementsByTagName("input")[0].getAttribute("data-bill_id");
            var tr = $(this).closest('tr');
            var row = table.row( tr );
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
                $('#insideTable'+window.bill_id).DataTable().destroy();
                $('#moreInfo'+window.bill_id).val('▼');
                $("#moreInfo"+window.bill_id).removeClass("delete-button-hover");
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
                // $('#insideTable'+window.bill_id).DataTable();
                detailRowTable(window.bill_product_data);
                $('#moreInfo'+window.bill_id).val('▲');
                $("#moreInfo"+window.bill_id).addClass("delete-button-hover");
            }
        } );
        function detailRowTable(data){
            datatableInit();
            var table2 = $('#insideTable'+window.bill_id).DataTable();
            var arr = data.split("||");
            // console.log(arr);
            $.each(arr, function( index, value ) {
                // console.log(index);
                // console.log(value);
                var arr3 = value.split(",");//0:bill_to_product_id,1:bill_id,2:urbane_id,3:product_name,4:cost,5:price,6:rate,7:quantity_sold
                table2.rows.add( [ {
                    "urbane_id":       arr3[2],
                    "name":       arr3[3],
                    "cost_price":   arr3[4],
                    "quantity_sold":     arr3[7],
                    "rate":     arr3[6],
                    "selling_price":     arr3[5],
                } ] ).draw();
            });
        }
        function searchBill(){
            $('#table').DataTable().destroy();
            var date = $('#datepicker-date').val();
            loadData(date);
        }
        function datatableInit(){

            $('#insideTable'+window.bill_id).DataTable({
                "dom": '<"top">rt<"bottom"ilp><"clear">',
                processing: true,
                // serverSide: true,
                // searching: false,
                paging: false,
                bInfo: false,
                bFilter: false,
                columns: [
                    {render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {data: 'urbane_id', name: 'urbane_id',searchable: false},
                    {data: 'name', name: 'name',searchable: false},
                    {data: 'cost_price', name: 'cost_price',searchable: false, visible: false},
                    {data: 'quantity_sold', name: 'quantity_sold',searchable: false},
                    {data: 'rate', name: 'rate',searchable: false},
                    {data: 'selling_price', name: 'selling_price',searchable: false},
                ],
                "columnDefs": [
                            {"className": "dt-center second-table","targets": "_all"}
                ],
                // "pagingType": "bootstrap_extended",
                "ordering": false,
                "bScrollInfinite": true,
                "bScrollCollapse": true,
                "iScrollLoadGap": 10,
            });
        }
        function deleteBillModal(data){
            window.bill_id = data.getAttribute("data-bill_id");
            // console.log(data.getAttribute("data-bill_id"));
            $('#b_date_time_modal').val(data.getAttribute("data-b_date_time").replace('<br>', '    '));
            $('#c_name_modal').val(data.getAttribute("data-c_name"));
            $('#b_cost_price_modal').val(data.getAttribute("data-cost_price"));
            $('#b_selling_price_modal').val(data.getAttribute("data-selling_price"));
            $('#b_discount_modal').val(data.getAttribute("data-b_discount"));
            $('#b_profit_modal').val(data.getAttribute("data-b_profit"));
            $('#b_quantity_modal').val(data.getAttribute("data-b_quantity"));
            $('#deleteModal').modal('show');
            $(".modal-header").css('border-bottom','0px'); 
            $(".modal-footer").css('border-top','0px'); 
            $("#deleteModal").css({ 'padding-right' : ''});
        }
        function deleteBillData(bill_id){
            $.ajax({
                type:'POST',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'delete-bill-data',
                // contentType: false,
                // processData: false,
                cache : false,
                dataType: 'json',
                data: {bill_id : bill_id},
                success:function(data){
                    $('#table').DataTable().ajax.reload();
                    $('#deleteModal').modal('hide');
                },
                error:function(data){

                }
            });
        }
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $('.date').datepicker({  

           format: 'D dd M \'yy',
           // useCurrent:true,
           autoclose: true,
           clearBtn: true,
           multidate: 2,

        }).datepicker("setDate",'now');
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
</html>
