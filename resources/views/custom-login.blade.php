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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <link rel="stylesheet" href="{{ URL::asset('css/minimilsitic.css') }}" />

        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    </head>
    <body>
        <div id="wrapper">
            <h1 class="header" id="menu-toggle">LOGIN</h1>
            <div class="container">
                <div class="col-md-12">
                    <!-- FORM START -->

                    <form id="loginForm" class="topBefore"> 
                        <label class="form-group has-float-label" >
                          {!! Form::text('user_name', null, ['id' => 'user_name', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'USER NAME' , 'class' => 'capitalize' , 'onkeypress' => 'return alphabetOnly(event)']) !!}
                          <span>USER NAME</span>
                        </label>
                        <label class="form-group has-float-label" >
                          {!! Form::password('password', ['id' => 'password', 'size' => '30x5', 'style' => 'resize:none', 'placeholder' => 'PASSWORD' , 'class' => '']) !!}

                          <span>PASSWORD</span>
                        </label>
                        <input id="submit" type="submit" onclick="submitButton()" value="GO!">
                    </form>

                    <!-- FORM END -->
                </div>
            </div>
        </div>
        @include('Extra.bootstrapjs')
    </body>
    <script>
        $("#loginForm").submit(function(e) {
            e.preventDefault();
        });
        function submitButton(){

            user_name = $('#user_name').val();
            password = $('#password').val();
            if(user_name == '' || user_name == null || password == '' || password == null){
                alert("Please Fill All Fields");
                return false;
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
                        document.getElementById("productForm").reset();
                        $('#confirmModal').modal('hide');
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
        function alphabetOnly(event) {
            var key = event.keyCode;
            // return ((key >= 65 && key <= 90) || key == 8);
            return ( (key>64 && key<91) || (key>96 && key<123));
        };
    </script>
</html>
