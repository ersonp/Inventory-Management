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
        <!-- <script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/sum.js') }}" ></script>
        <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('js/responsive.js') }}" ></script>

        
        <link rel="stylesheet" href="{{ URL::asset('css/datatable.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/minimilsitic.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/sidebar.css') }}" />
    </head>
    <body>
        <div id="wrapper">
            @include('Extra.sidebar')
            <h1 class="header" id="menu-toggle">LIST PRODUCTS</h1>

            <!-- Footer Links -->
                <div class="container-fluid text-center text-md-left padding-container-header">

                  <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column -->

                        <div class="col-md-1 mb-md-0 mb-3">
                            <input id="submit" type="submit" class="bill-confirm more bill-margin" onclick="moreDetails()" value="MORE" id="more-info">

                            <input id="submit" type="submit" style="display: none;" class="bill-confirm less bill-margin" onclick="lessDetails()" value="LESS" id="less-info">
                        </div>
                        <div class="col-md-2 mb-md-0 mb-3">
                            <div style="display: none;" class="less">
                                <h5 class="text-uppercase">TOTAL COST</h5>
                                &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-cost">0</span>
                            </div>
                        </div>
                        <div class="col-md-2 mt-md-0 mt-3">
                            <div style="display: none;" class="less">
                                <h5 class="text-uppercase">EXP. TOTAL PROFIT</h5>
                                &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-profit">0</span>
                            </div>
                        </div>
                        <!-- Grid column -->

                        <hr class="clearfix w-100 d-md-none pb-3">

                        <!-- Grid column -->
                        <div class="col-md-3 mb-md-0 mb-3"></div>

                        <div class="col-md-1 mb-md-0 mb-3">
                            <!-- <h5 class="text-uppercase">PROFIT</h5>
                            <span  class="text-center" id="total-profit">0</span>
         -->                </div>

                        <div class="col-md-2 mb-md-0 mb-3">
                                
                            <label class="form-group has-float-label" >
                              <input class="" placeholder="URBANE ID" type="text" id="search-uid">
                              <span>URBANE ID</span>
                            </label>

                        </div>
                        <div class="col-md-1 mb-md-0 mb-3">
                            <input id="submit" type="submit" class="bill-confirm bill-margin" onclick="searchProds()" value="SEARCH">

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
                                    <th class="text-center">Urbane Id</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Bought From</th>
                                    <th class="text-center">Cost Price</th>
                                    <th class="text-center">Selling Price</th>
                                    <th class="text-center">Exp. Profit</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Products Sold</th>
                                    <th class="text-center">Added / Modified By</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

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
                                      {!! Form::text('p_uid', null, ['id' => 'p_uid_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'URBANE ID' , 'class' => 'modal-inputs capitalize' ,'disabled' => 'disabled']) !!}
                                      <span>URBANE ID</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_name', null, ['id' => 'p_name_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'PRODUCT NAME' , 'class' => 'modal-inputs capitalize' ,'disabled' => 'disabled']) !!}
                                      <span>PRODUCT NAME</span>
                                    </label>
                                    <!-- <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_description', null, ['id' => 'p_description_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'DESCRIPTION' , 'class' => 'modal-inputs' ,'disabled' => 'disabled' ]) !!}
                                      <span>DESCRIPTION</span>
                                    </label> -->
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_bought', null, ['id' => 'p_bought_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'BOUGHT FROM' , 'class' => 'modal-inputs','disabled' => 'disabled' ]) !!}
                                      <span>BOUGHT FROM</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_cost_price', null, ['id' => 'p_cost_price_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'COST PRICE' ,'onkeypress' => 'return isNumberKey(event)' ,'class' => 'modal-inputs' ,'disabled' => 'disabled']) !!}
                                      <span>COST PRICE</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_selling_price', null, ['id' => 'p_selling_price_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'SELLING PRICE' ,'onkeypress' => 'return isNumberKey(event)' ,'class' => 'modal-inputs','disabled' => 'disabled']) !!}
                                      <span>SELLING PRICE</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_quantity', null, ['id' => 'p_quantity_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'QUANTITY' ,'onkeypress' => 'return isNumberKey(event)' ,'class' => 'modal-inputs','disabled' => 'disabled']) !!}
                                      <span>QUANTITY</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_quantity_sold', null, ['id' => 'p_quantity_sold_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'URBANE ID' ,'onkeypress' => 'return alphaOnly(event)' , 'class' => 'uppercase modal-inputs' ,'disabled' => 'disabled' ]) !!}
                                      <span>PRODUCTS SOLD</span>
                                    </label> 
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_user', null, ['id' => 'p_user_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'ADDED / MODIFIED BY' ,'onkeypress' => 'return alphaOnly(event)' , 'class' => ' modal-inputs-below' ,'disabled' => 'disabled' ]) !!}
                                      <span>ADDED / MODIFIED BY</span>
                                    </label>  
                                </div>

                                <div class="col-md-1"></div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="save-buttons" onclick="deleteProductData(window.urbane_id)" value="CONFIRM">
                        <input type="submit" class="close-buttons" data-dismiss="modal" value="CLOSE">
                    </div>
                </div>
            </div>
        </div>

        <!-- DELETE MODAL END -->


        <!-- MODIFY MODAL START -->

        <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-easein="slideDownIn">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title white " id="exampleModalLongTitle">MODIFY</h5>
                    </div>
                    <div class="modal-body white container">
                        <div class="row">   
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-1"></div>

                                <div class="col-md-4">
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_uid', null, ['id' => 'p_uid_modify_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'URBANE ID' , 'class' => 'modal-inputs capitalize' ,'disabled' => 'disabled']) !!}
                                      <span>URBANE ID</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_name', null, ['id' => 'p_name_modify_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'PRODUCT NAME' , 'class' => 'modal-inputs capitalize' ]) !!}
                                      <span>PRODUCT NAME</span>
                                    </label>
                                    <!-- <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_description', null, ['id' => 'p_description_modify_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'DESCRIPTION' , 'class' => 'modal-inputs' ]) !!}
                                      <span>DESCRIPTION</span>
                                    </label> -->
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_bought', null, ['id' => 'p_bought_modify_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'BOUGHT FROM' , 'class' => 'modal-inputs' ]) !!}
                                      <span>BOUGHT FROM</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_cost_price', null, ['id' => 'p_cost_price_modify_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'COST PRICE' ,'onkeypress' => 'return isNumberKey(event)' ,'class' => 'modal-inputs' ]) !!}
                                      <span>COST PRICE</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_selling_price', null, ['id' => 'p_selling_price_modify_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'SELLING PRICE' ,'onkeypress' => 'return isNumberKey(event)' ,'class' => 'modal-inputs' ]) !!}
                                      <span>SELLING PRICE</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_quantity', null, ['id' => 'p_quantity_modify_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'QUANTITY' ,'onkeypress' => 'return isNumberKey(event)' ,'class' => 'modal-inputs'  ]) !!}
                                      <span>QUANTITY</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_quantity_sold', null, ['id' => 'p_quantity_sold_modify_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'URBANE ID' ,'onkeypress' => 'return alphaOnly(event)' , 'class' => 'uppercase modal-inputs' ,'disabled' => 'disabled' ]) !!}
                                      <span>PRODUCTS SOLD</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_user', null, ['id' => 'p_user_modify_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'ADDED / MODIFIED BY' ,'onkeypress' => 'return alphaOnly(event)' , 'class' => ' modal-inputs-below' ,'disabled' => 'disabled' ]) !!}
                                      <span>ADDED / MODIFIED BY</span>
                                    </label>  
                                </div>

                                <div class="col-md-1"></div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="save-buttons" onclick="modifyProductData(window.urbane_id)" value="CONFIRM">
                        <input type="submit" class="close-buttons" data-dismiss="modal" value="CLOSE">
                    </div>
                </div>
            </div>
        </div>

        <!-- MODIFY MODAL END -->

        <!-- BOOTSTRAP JS -->
        @include('Extra.bootstrapjs')
    </body>
    <script>
        loadData('load');
        function loadData(uid){
            if (uid == 'load') {
                uid = '';
            }
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
                            uid : uid,
                    },
                    url:'list-products-data',
                }),
                columns: [
                    {render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },responsivePriority: 1
                    },
                    {data: 'uid', name: 'uid',searchable: false ,responsivePriority: 2},
                    {data: 'name', name: 'name',searchable: false,responsivePriority: 4},
                    {data: 'bought', name: 'bought',searchable: false},
                    {data: 'cost_price', name: 'cost_price',searchable: false, visible: false},
                    {data: 'selling_price', name: 'selling_price',searchable: false,responsivePriority: 3},
                    {data: 'profit', name: 'profit',searchable: false , visible: false,responsivePriority: 6},
                    {data: 'original_quantity', name: 'original_quantity',searchable: false,responsivePriority: 5},
                    {data: 'products_sold', name: 'products_sold',searchable: false},
                    {data: 'user_name', name: 'user_name',searchable: false},
                    {render: function (data, type, row, meta) {
                            return "<input type='submit' value='M' class='delete-button' onclick='modifyProductModal(this)' data-uid=\"" + row.uid + "\" data-name=\"" + row.name + "\" data-cost_price=\"" + row.cost_price + "\" data-selling_price=\"" + row.selling_price + "\" data-quantity=\"" + row.quantity + "\" data-products_sold=\"" + row.products_sold_quantity + "\" data-user_name=\"" + row.user_name + "\" data-bought=\"" + row.bought + "\" > <input type='submit' value='X' class='delete-button' onclick='deleteProductModal(this)' data-uid=\"" + row.uid + "\" data-name=\"" + row.name + "\" data-cost_price=\"" + row.cost_price + "\" data-selling_price=\"" + row.selling_price + "\" data-quantity=\"" + row.quantity + "\" data-products_sold=\"" + row.products_sold_quantity + "\" data-user_name=\"" + row.user_name + "\" data-bought=\"" + row.bought + "\" >";
                        }
                    },
                ],
                "columnDefs": [{

                        "className": "dt-center",
                        "targets": "_all",
                }],
                "responsive": true,
                // "pagingType": "bootstrap_extended",
                "ordering": false,
                // "pageLength": 20,
                // "lengthMenu": [20,50,100],
                "bScrollInfinite": true,
                "bScrollCollapse": true,
                // "sScrollY": "200px",
                "iScrollLoadGap": 10
            });
        }
        function searchProds(){
            $('#table').DataTable().destroy();
            var uid = $('#search-uid').val();
            loadData(uid);
            lessDetails();
        }
        function moreDetails(){
            var table = $('#table').DataTable();
            table.column( 6 ).visible( true );
            table.column( 4 ).visible( true );
            $('.more').hide();
            $('.less').show();
            table.columns.adjust().draw();
            var profit = table.column( 6 ).data().sum();
            document.getElementById("total-profit").innerHTML = profit;
            var count = table.data().count();
            var pro = 0;
            for(var i = 0;i<count;i++){

                var cost = table.column( 4 ).data();
                var cost_i = parseInt(cost[i]);
                var quantity = table.column( 7 ).data();
                var quantity_i = parseInt(quantity[i]);
                pro = (cost_i * quantity_i) + pro;
                console.log(quantity_i);
            }
            document.getElementById("total-cost").innerHTML = pro;
        }
        function lessDetails(){
            var table = $('#table').DataTable();
            table.column( 6 ).visible( false );
            table.column( 4 ).visible( false );
            $('.less').hide();
            $('.more').show();
            table.columns.adjust().draw();
        }
        function modifyProductModal(data){
            window.urbane_id = data.getAttribute("data-uid");

            $('#p_uid_modify_modal').val(data.getAttribute("data-uid"));
            var name = data.getAttribute("data-name");
            // var desc = data.getAttribute("data-name").split('-')[1];
            $('#p_name_modify_modal').val(name);
            // $('#p_description_modify_modal').val(desc);
            var bought = data.getAttribute("data-bought");
            if(bought == 'null' || bought == ''){
                $('#p_bought_modify_modal').val();
            }else{
                $('#p_bought_modify_modal').val(bought);
            }
            $('#p_cost_price_modify_modal').val(data.getAttribute("data-cost_price"));
            $('#p_selling_price_modify_modal').val(data.getAttribute("data-selling_price"));
            $('#p_quantity_modify_modal').val(data.getAttribute("data-quantity"));
            $('#p_quantity_sold_modify_modal').val(data.getAttribute("data-products_sold"));
            var name = data.getAttribute("data-user_name");
            var user_name = name.replace("<br>", "");
            $('#p_user_modify_modal').val(user_name);
            $('#modifyModal').modal('show');
            $(".modal-header").css('border-bottom','0px'); 
            $(".modal-footer").css('border-top','0px'); 
            $("#modifyModal").css({ 'padding-right' : ''});
        }
        function deleteProductModal(data){
            window.urbane_id = data.getAttribute("data-uid");

            $('#p_uid_modal').val(data.getAttribute("data-uid"));
            var name = data.getAttribute("data-name");
            // var desc = data.getAttribute("data-name").split('-')[1];
            $('#p_name_modal').val(name);
            // $('#p_description_modal').val(desc);
            var bought = data.getAttribute("data-bought");
            if(bought == 'null' || bought == ''){
                $('#p_bought_modal').val();
            }else{
                $('#p_bought_modal').val(bought);
            }
            $('#p_cost_price_modal').val(data.getAttribute("data-cost_price"));
            $('#p_selling_price_modal').val(data.getAttribute("data-selling_price"));
            $('#p_quantity_modal').val(data.getAttribute("data-quantity"));
            $('#p_quantity_sold_modal').val(data.getAttribute("data-products_sold"));
            var name = data.getAttribute("data-user_name");
            var user_name = name.replace("<br>", "");
            $('#p_user_modal').val(user_name);
            $('#deleteModal').modal('show');
            $(".modal-header").css('border-bottom','0px'); 
            $(".modal-footer").css('border-top','0px'); 
            $("#deleteModal").css({ 'padding-right' : ''});
        }
        function modifyProductData(urbane_id){
            var product_name = $('#p_name_modify_modal').val();
            var product_desc = $('#p_description_modify_modal').val();
            var bought = $('#p_bought_modify_modal').val();
            var cost_price = $('#p_cost_price_modify_modal').val();
            var selling_price = $('#p_selling_price_modify_modal').val();
            var quantity = $('#p_quantity_modify_modal').val();
            var quantity_sold = $('#p_quantity_sold_modify_modal').val();
            if(+cost_price > +selling_price){
                alert("Cost price is more than Selling price");
                return false;
            }
            if(+quantity < +quantity_sold){
                alert("Quantity sold");
                return false;
            }
            $.ajax({
                type:'POST',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'modify-product-data',
                // contentType: false,
                // processData: false,
                cache : false,
                dataType: 'json',
                data: {
                        urbane_id : urbane_id,
                        product_name : product_name,
                        product_desc : product_desc,
                        bought : bought,
                        cost_price : cost_price,
                        selling_price : selling_price,
                        quantity : quantity,
                        quantity_sold : quantity_sold
                },
                success:function(data){
                    $('#table').DataTable().ajax.reload();
                    $('#modifyModal').modal('hide');
                },
                error:function(data){

                }
            });
        }
        function deleteProductData(urbane_id){
            $.ajax({
                type:'POST',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'delete-product-data',
                // contentType: false,
                // processData: false,
                cache : false,
                dataType: 'json',
                data: {urbane_id : urbane_id},
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
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
</html>
