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

        <script type="text/javascript" src="{{ URL::asset('js/jQuerry.js') }}" ></script>
        <link rel="stylesheet" href="{{ URL::asset('css/minimilsitic.css') }}" />

        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/sidebar.css') }}" />
    </head>
    <body>
        <div id="wrapper">
            @include('Extra.sidebar')
            <h1 class="header" id="menu-toggle">ADD PRODUCTS</h1>
            <h4 style="text-align: center;">LAST URBANE ID : {{ $last_uid }}</h4>
            <div class="container">
                <div class="col-md-12">
                    <!-- FORM START -->

                    <form id="productForm" class="topBefore"> 
                        <label class="form-group has-float-label" >
                          {!! Form::text('p_name', null, ['id' => 'p_name', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'PRODUCT NAME' , 'class' => 'capitalize']) !!}
                          <span>PRODUCT NAME</span>
                        </label> 
                        <label class="form-group has-float-label" >
                          {!! Form::text('p_description', null, ['id' => 'p_description', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'DESCRIPTION' , 'class' => '' ]) !!}
                          <span>DESCRIPTION</span>
                        </label>
                        <label class="form-group has-float-label" >
                          {!! Form::text('p_bought', null, ['id' => 'p_bought', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'BOUGHT FROM' , 'class' => 'capitalize']) !!}
                          <span>BOUGHT FROM</span>
                        </label>
                        <label class="form-group has-float-label" >
                          {!! Form::text('p_cost_price', null, ['id' => 'p_cost_price', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'COST PRICE' ,'onkeypress' => 'return isNumberKey(event)' ]) !!}
                          <span>COST PRICE</span>
                        </label>
                        <label class="form-group has-float-label" >
                          {!! Form::text('p_selling_price', null, ['id' => 'p_selling_price', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'SELLING PRICE' ,'onkeypress' => 'return isNumberKey(event)' ]) !!}
                          <span>SELLING PRICE</span>
                        </label>
                        <label class="form-group has-float-label" >
                          {!! Form::text('p_quantity', null, ['id' => 'p_quantity', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'QUANTITY' , 'class' => '' ,'onkeypress' => 'return isNumberKey(event)']) !!}
                          <span>QUANTITY</span>
                        </label>
                        <input id="submit" type="submit" onclick="confirmButton()" value="GO!">
                    </form>

                    <!-- FORM END -->
                </div>
            </div>
        </div>
       

        <!-- CONFIRM MODAL START -->

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-easein="slideDownIn">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title white " id="exampleModalLongTitle">CONFIRM</h5>
                    </div>
                    <div class="modal-body white container">
                        <div class="row">   
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-1"></div>

                                <div class="col-md-4">
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_name', null, ['id' => 'p_name_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'PRODUCT NAME' , 'class' => 'modal-inputs capitalize' ,'disabled' => 'disabled']) !!}
                                      <span>PRODUCT NAME</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_description', null, ['id' => 'p_description_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'DESCRIPTION' , 'class' => 'modal-inputs' ,'disabled' => 'disabled']) !!}
                                      <span>DESCRIPTION</span>
                                    </label>
                                    <label class="form-group-modal has-float-label-modal" >
                                      {!! Form::text('p_bought', null, ['id' => 'p_bought_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'BOUGHT FROM' , 'class' => 'modal-inputs capitalize','disabled' => 'disabled']) !!}
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
                                      {!! Form::text('p_quantity', null, ['id' => 'p_quantity_modal', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'QUANTITY' , 'class' => 'below-border' ,'onkeypress' => 'return isNumberKey(event)' ,'class' => 'modal-inputs-below','disabled' => 'disabled']) !!}
                                      <span>QUANTITY</span>
                                    </label>
                                </div>

                                <div class="col-md-1"></div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="save-buttons dis" onclick="submitButton(1)" value="SAVE & STAY">
                        <input type="submit" class="save-buttons dis" onclick="submitButton(0)" value="SAVE & LEAVE">
                        <input type="submit" class="close-buttons" data-dismiss="modal" value="CLOSE">
                    </div>
                </div>
            </div>
        </div>

        <!-- CONFIRM MODAL END -->

        @include('Extra.bootstrapjs')
    </body>
    <script>
        $("#productForm").submit(function(e) {
            e.preventDefault();
        });
        function confirmButton(){
            var a = '';
            var b = '';
            var c = '';
            var d = '';
            var e = '';
            // a = $('#p_uid').val();
            b = $('#p_name').val();
            c = $('#p_cost_price').val();
            d = $('#p_selling_price').val();
            e = $('#p_quantity').val();

            if(+d < +c){
                alert("Cost price is more than Selling price");
                return false;
            }
            if (b==null || b=="",c==null || c=="",d==null || d=="" , e==null || e=="")
            {
                alert("Please Fill All Fields");
                return false;
            }
            getDataOnModal();
            $('#confirmModal').modal('show');
            $(".modal-header").css('border-bottom','0px'); 
            $(".modal-footer").css('border-top','0px'); 
            $("#confirmModal").css({ 'padding-right' : ''});
        }
        function getDataOnModal(){
            $('#p_name_modal').val($('#p_name').val());
            $('#p_bought_modal').val($('#p_bought').val());
            $('#p_cost_price_modal').val($('#p_cost_price').val());
            $('#p_selling_price_modal').val($('#p_selling_price').val());
            $('#p_quantity_modal').val($('#p_quantity').val());
            $('#p_description_modal').val($('#p_description').val());
        }
        function submitButton(stay){

            $('.dis').attr('disabled', 'disabled');
            data = new FormData();
            var form = $("#productForm").serializeArray();
            for(var i=0; i<form.length; i++){
                // console.log(form[i]['name']);
                // console.log(form[i]['value']);
            }
            $.ajax({
                type:'POST',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/add-products-data',
                // contentType: false,
                // processData: false,
                cache : false,
                dataType: 'json',
                data: {formData : form},
                success:function(data){console.log(data);
                    if(data['message'] == 'Unique id Already Present'){
                        $('#confirmModal').modal('hide');
                        alert("Unique id Already Present");
                        return false;
                    }else if (stay == 1) {
                        // document.getElementById("productForm").reset();
                        // $('#confirmModal').modal('hide');
                        location.reload();
                    }else{
                        document.getElementById("productForm").reset();
                        window.location.href = 'list-products';
                    }
                },
                error:function(data){
                    console.log('error :'+data);
                }
            });
        }
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        function alphaOnly(event) {
            var key = event.keyCode;
            // return ((key >= 65 && key <= 90) || key == 8);
            return ((key>47 && key<58) || (key>64 && key<91) || (key>96 && key<123));
        };
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</html>
