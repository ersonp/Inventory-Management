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
        <!-- <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/datatables-jquerry.js') }}" ></script>
        <!-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/datatables-bootstrap.js') }}" ></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/select2.js') }}" ></script>
        <!-- <script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/sum.js') }}" ></script>
        <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/responsive.js') }}" ></script>


        <link rel="stylesheet" href="{{ URL::asset('css/minimilsitic.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/select2.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/datatable.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/sidebar.css') }}" />
    </head>
    <body>
        <div id="wrapper">
            @include('Extra.sidebar')
            <h1 class="header" id="menu-toggle">&#x2744; BILLING &#x2744;</h1>
            <div class="container-fluid ">
                <div class="row">
                    <!-- <form id="billingForm" >    -->
                        <div class="form-group col-md-1">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-group has-float-label" >
                              {!! Form::text('c_name', null, ['id' => 'c_name', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'CUSTOMER NAME' , 'class' => 'capitalize']) !!}
                              <span>CUSTOMER NAME</span>
                            </label>
                        </div>
                        <div class="form-group col-md-4">
                                <select class="itemName below-border form-control" style="width:100%; left: 10px" name="itemName" id="uid-search" onkeydown="uidSearch()"></select>
                                <!-- {!! Form::select('status',  array('class' => 'form-control itemName below-border', 'id' => 'uid-search' , 'name' => 'itemName' , 'style' => 'width:500px; left: 10px')) !!} -->
                        </div>
                        <div class="form-group col-md-1">
                                    <label class="form-group has-float-label" >
                                      {!! Form::text('p_quantity', null, ['id' => 'p_quantity', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'QUANTITY' , 'class' => 'bill' ,'onkeypress' => 'return isNumberKey(event)']) !!}
                                      <span>QUANTITY</span>
                                    </label>
                        </div>
                        <div class="form-group col-md-1">
                            <input id="submit" type="submit" class="bill bill-margin" onclick="Add()" value="ADD">
                        </div>
                        <div class="form-group col-md-1">
                        </div>
                                
                    <!-- </form> -->
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="datatable row-border hover" id="billTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Urban Id</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Cost</th>
                                    <th class="text-center">Rate</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="page-footer font-small blue pt-4 padding-footer">

                <!-- Footer Links -->
                <div class="container-fluid text-center text-md-left padding-container-footer">

                  <!-- Grid row -->
                  <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-3 mt-md-0 mt-3">

                        <h5 class="text-uppercase ">T QUANTITY</h5>
                        <span  class="text-center" id="total-quantity">0</span>

                    </div>
                    <div class="col-md-4 mb-md-0 mb-3 ">

                        <label class="form-group has-float-label show-number" style="display: none;">
                          {!! Form::text('p_number', null, ['id' => 'p_number', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'PHONE NUMBER' , 'class' => 'capitalize ' ,'onkeypress' => 'return isNumberKey(event)']) !!}
                          <span>PHONE NUMBER</span>
                        </label>

                    </div>

                    <hr class="clearfix w-100 d-md-none pb-3">
                    <div class="col-md-1 mb-md-0 mb-3">

                        <h5 class="text-uppercase">TOTAL</h5>
                        &nbsp &#x20B9;&nbsp<span  class="text-center" id="total-price">0</span>

                    </div>

                    <div class="col-md-1 mb-md-0 mb-3">
                            
                        <label class="form-group has-float-label" >
                          {!! Form::text('p_discount', null, ['id' => 'p_discount', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'DISCOUNT' , 'class' => 'bill' ,'onkeypress' => 'return isNumberKey(event)','onkeyup' => 'totalPrice()']) !!}
                          <span>DISCOUNT</span>
                        </label>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-1 mb-md-0 mb-3">

                        <!-- Links -->
                        <h5 class="text-uppercase">G TOTAL</h5>

                        &nbsp &#x20B9;&nbsp<span  class="text-center" id="grand-total-price">0</span>

                    </div>
                    <div class="col-md-2 mb-md-0 mb-3">

                        <input id="submit" type="submit" class="bill-confirm bill-margin" onclick="confirmBill()" value="CONFIRM">

                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </div>
                <!-- Footer Links -->

                <!-- Copyright -->
                <!-- <div class="footer-copyright text-center py-3">© 2018 Copyright: -->
                  <!-- <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a> -->
                <!-- </div> -->
                <!-- Copyright -->

            </footer>
            <!-- Footer -->
        </div>

        <!-- CONFIRM MODAL START -->

        <div class="modal fade" id="confirmBillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-easein="slideDownIn">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title white " id="exampleModalLongTitle">CONFIRM BILL</h5><span  class="text-center white mobile-modal" style="display: none;" id="mobile-modal">0</span>
                    </div>
                    <div class="container-fluid top-padding ">
                        <div class="row ">
                            <div class="col-md-12">
                                <table class="datatable row-border hover second-table-imp" id="confirmBillTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center ">#</th>
                                            <th class="text-center ">Urban Id</th>
                                            <th class="text-center ">Product Name</th>
                                            <th class="text-center ">Quantity</th>
                                            <th class="text-center ">Rate</th>
                                            <th class="text-center ">Price</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="container-fluid text-center text-md-left">
                            <div class="row">
                                <div class="col-md-1 mt-md-0 mt-3 white">
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_money', null, ['id' => 'p_money', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'MONEY' , 'class' => 'bill bill-color' ,'onkeypress' => 'return isNumberKey(event)','onkeyup' => 'moneyReturn()']) !!}
                                      <span>MONEY</span>
                                    </label>
                                </div>
                                <div class="col-md-2 mt-md-0 mt-3 white">
                                    <h5 class="white-size">RETURN</h5>
                                    <span  class="text-center" id="return-money-modal">0</span>
                                </div>
                                <hr class="clearfix w-100 d-md-none pb-3">
                                <div class="col-md-1 mb-md-0 mb-3 white">
                                    <h5 class="white-size">T QUANTITY</h5>
                                    <span  class="text-center" id="total-quantity-modal">0</span>
                                </div>
                                <div class="col-md-1 mb-md-0 mb-3 white">
                                    <h5 class="white-size">TOTAL</h5>
                                    <span  class="text-center" id="total-price-modal">0</span>
                                </div>
                                <div class="col-md-1 mb-md-0 mb-3 white">
                                    <h5 class="white-size">DISCOUNT</h5>
                                    <span  class="text-center" id="total-discount-modal">0</span>
                                </div>
                                <div class="col-md-1 mb-md-0 mb-3 white">
                                    <h5 class="white-size">G TOTAL</h5>
                                    <span  class="text-center " id="grand-total-price-modal">0</span>
                                </div>
                                <div class="col-md-2 mb-md-0 mb-3">
                                    <input id="submit1" type="submit" class="bill-confirm bill-confirm-modal bill-margin dis"  onclick="realConfirmBill(1)" value="DONE & PRINT">
                                </div>
                                <div class="col-md-2 mb-md-0 mb-3">
                                    <input id="submit2" type="submit" class="bill-confirm bill-confirm-modal bill-margin dis" onclick="realConfirmBill(0)" value="DONE">
                                </div>
                                <div class="col-md-1 mb-md-0 mb-3">
                                    <input type="submit" class="close-buttons bill-margin" data-dismiss="modal" value="CLOSE">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONFIRM MODAL END -->
        @include('Extra.bootstrapjs')
    </body>
    <script>
        $('#billTable').DataTable({
            "dom": '<"top">rt<"bottom"ilp><"clear">',
            processing: true,
            // serverSide: true,
            paging: false,
            bInfo: false,
            bFilter: false,
            columns: [
                {render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },responsivePriority: 1
                },
                {data: 'uid', name: 'uid',searchable: false,responsivePriority: 2},
                {data: 'name', name: 'name',searchable: false},
                {data: 'quantity', name: 'quantity',searchable: false,responsivePriority: 3},
                {data: 'cost', name: 'price',searchable: false,visible: false},
                {data: 'rate', name: 'price',searchable: false,responsivePriority: 5},
                {data: 'price', name: 'price',searchable: false,responsivePriority: 4},
                {data: 'delete', name: 'delete',searchable: false},
            ],
            createdRow: function( row, data, dataIndex ) {
                $( row ).attr('id',data['uid']);
            },
            "columnDefs": [
                            {"className": "dt-center ","targets": "_all"},
            ],
            "ordering": false,
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "iScrollLoadGap": 10,
            "responsive": true,
        });
        function Delete(data){
            var table = $('#billTable').DataTable();
                
            var s = data.getAttribute("data-uid");
            table.rows().nodes().each(function(a,b) {
                if($(a).children().eq(1).text() == s){
                   table.rows(a).remove();
                 }
            } );
            table.rows().invalidate();
            table.draw();
            totalPrice();
        }
        function Add(){
            var table = $('#billTable').DataTable();
            var data = $('#uid-search :selected').val();
            if(data == null || data == ''){
                alert("Please Select Product");
                return false;
            }

            var myarr = data.split(",");
            var s_price = myarr[2];
            var c_price = myarr[3];
            var quantity = $('#p_quantity').val();

            if(quantity == null || quantity == '' || quantity == 0){
                quantity = 1;
            }
            if (table.rows('[id='+myarr[0]+']').any()) {
                table.rows().nodes().each(function(a,b) {
                    if($(a).children().eq(1).text() == myarr[0]){
                        window.old_quantity = a.cells[3].innerHTML;
                        table.rows(a).remove();
                    }
                } );
                table.rows().invalidate();
                table.draw();
                var quantity = +window.old_quantity + +quantity;
            }

            var price = s_price * quantity; 
            var rate = s_price;
            var cost = c_price * quantity;

            table.rows.add( [ {
                "uid":       myarr[0],
                "name":       myarr[1],
                "quantity":   quantity,
                "cost":     cost,
                "rate":     rate,
                "price":     price,
                "delete": "<input type='submit' value='X' class='delete-button' onclick='Delete(this)' data-uid=\"" +  myarr[0] + "\">",
            } ] ).draw();

            $("#uid-search").empty().trigger('change');
            $('#uid-search').select2('data', null);
            $('#p_quantity').val('');
            // $('#billTable tr').find('td:eq(4),th:eq(4)').hide();
            totalPrice();
        };
        function totalPrice(){
            var table = $('#billTable').DataTable();
            var selling = parseInt(table.column( 6 ).data().sum());
            var quantity = parseInt(table.column( 3 ).data().sum());
            var discount = $('#p_discount').val();
            document.getElementById("total-quantity").innerHTML = quantity;
            document.getElementById("total-price").innerHTML = selling;
            document.getElementById("grand-total-price").innerHTML = selling;
            if(selling < discount){
                alert("invalid discount");
                $('#p_discount').val('');
                return false;
            }
            // document.getElementById("grand-total-profit").innerHTML = selling - cost;
            if(discount != 0 || discount != null || discount != '' ){
                var grand_total = selling - discount;
                document.getElementById("grand-total-price").innerHTML = grand_total;
            }
            //giveaway
            if(selling > 3000){
                $('.show-number').show();
            }else{
                $('.show-number').hide();
            }
        }
        $("#billingForm").submit(function(e) {
            e.preventDefault();
        });
        $('.itemName').select2();
        $('.itemName').select2({
            placeholder: 'SELECT PRODUCT',
            minimumInputLength: 1,
            ajax: {
                type:'POST',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'get-data-product-search',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.urbane_id+' - '+item.product_name,
                                id: item.urbane_id+','+item.product_name+','+item.selling_price+','+item.cost_price,
                            }
                        })
                    };
                },
                cache: true
            }
        });
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        function confirmBill(){
            var table = $('#billTable').DataTable();
            if(! table.data().any()){
                alert("Please Select a Product");
                return false;
            }
            var selling = parseInt(table.column( 6 ).data().sum());
            if( selling > 3000){

                var name = $('#c_name').val();
                var number = $('#p_number').val();
                $('.mobile-modal').show();
                if(name == null || name == '' || number == null || number == ''){
                    alert("Please add Name And Number For Giveaway");
                    return false;
                }
                if(number.length != 10){
                    alert("Please add Proper Number For Giveaway");
                    return false;
                }
            }
            $('#confirmBillModal').modal('show');
            if (selling > 3000) {console.log(number);
                $('#mobile-modal').text(number);
            }
            $("#confirmBillModal").css({ 'padding-right' : ''});
            $(".modal-header").css('border-bottom','0px'); 
            $(".modal-footer").css('border-top','0px'); 

            var source = document.getElementById('billTable');
            var destination = document.getElementById('confirmBillTable');
            var copy = source.cloneNode(true);
            copy.setAttribute('id', 'confirmBillTable');
            destination.parentNode.replaceChild(copy, destination);
            $('#confirmBillTable tr').find('td:eq(6),th:eq(6)').remove();
            $('#confirmBillTable tr').addClass('second-table');
            $('#total-price-modal').text($('#total-price').text());
            $('#total-quantity-modal').text($('#total-quantity').text());
            $('#grand-total-price-modal').text($('#grand-total-price').text());
            var dis = $('#p_discount').val();
            if(dis == '' || dis == null){
                dis = 0;
            }
            $('#total-discount-modal').text(dis);
        }
        // $('#confirmBillTable').DataTable({
        //     "dom": '<"top">rt<"bottom"ilp><"clear">',
        //     processing: true,
        //     // serverSide: true,
        //     paging: false,
        //     bInfo: false,
        //     bFilter: false,
        //     columns: [
        //         {render: function (data, type, row, meta) {
        //                 return meta.row + meta.settings._iDisplayStart + 1;
        //             }
        //         },
        //         {data: 'uid', name: 'uid',searchable: false},
        //         {data: 'name', name: 'name',searchable: false},
        //         {data: 'quantity', name: 'quantity',searchable: false},
        //         {data: 'c_price', name: 'price',searchable: false,visible: false},
        //         {data: 's_price', name: 'price',searchable: false},
        //     ],
        //     "columnDefs": [
        //                     {"className": "dt-center","targets": "_all"}
        //     ],
        //     "ordering": false,
        //     "bScrollInfinite": true,
        //     "bScrollCollapse": true,
        //     "iScrollLoadGap": 10,
        // });
        function realConfirmBill(print){
            $('.dis').attr('disabled', 'disabled');
            var table = $('#billTable').DataTable();
            var cost = parseInt(table.column( 4 ).data().sum());
            var selling = parseInt(table.column( 6 ).data().sum());
            var datatable = table.rows( { search: 'applied' } ).data().toArray();
            var discount = $('#p_discount').val();
            var quantity = parseInt(table.column( 3 ).data().sum());
            var name = $('#c_name').val();
            var number = $('#p_number').val();
            $.ajax({
                type:'POST',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/add-bill-data',
                // contentType: false,
                // processData: false,
                cache : false,
                dataType: 'json',
                data: {
                        datatable : datatable,
                        discount : discount,
                        quantity : quantity,
                        selling : selling,
                        cost : cost,
                        name : name,
                        number : number,
                        print : print
                },
                success:function(data){
                    // $('#c_name').val('');
                    // $('#p_discount').val('');
                    // $('#grand-total-price').text('0');
                    // $('#total-price').text('0');
                    if(print == 1){
                        // window.open = ('make-pdf');
                        window.open('make-pdf?xxSDd='+data['message'], '_blank');
                        // window.location.href = "make-pdf?xxSDd="+data['message'];
                        // window.open('http://google.com');
                    }
                    // location.reload();
                    window.setTimeout(function(){location.reload()},3000)
                    // $('#confirmBillModal').modal('hide');
                    // $('#billTable').DataTable().clear().draw();
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        function moneyReturn(){
            var gt = $('#grand-total-price-modal').text();
            var money = $('#p_money').val();
            document.getElementById("return-money-modal").innerHTML = +money - +gt;
        }
        $('#confirmBillModal').on('hidden.bs.modal', function () {
            document.getElementById("return-money-modal").innerHTML = 0;
            $('#p_money').val('');
        })
    </script>
</html>
