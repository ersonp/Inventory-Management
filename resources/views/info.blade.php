<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

       
        <script type="text/javascript" src="{{ URL::asset('js/jQuerry.js') }}" ></script>

        <script type="text/javascript" src="{{ URL::asset('js/jquery-2.js') }}" ></script>
        <script type="text/javascript" src="{{ URL::asset('js/datatables-jquerry.js') }}" ></script>
        <script type="text/javascript" src="{{ URL::asset('js/datatables-bootstrap.js') }}" ></script>
        <script type="text/javascript" src="{{ URL::asset('js/sum.js') }}" ></script>
        <script type="text/javascript" src="{{ URL::asset('js/responsive.js') }}" ></script>

        
        <link rel="stylesheet" href="{{ URL::asset('css/datatable.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/minimilsitic.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/sidebar.css') }}" />
    </head>
    <body>
        <div id="wrapper">
            @include('Extra.sidebar')
            <h1 class="header" id="menu-toggle">INFO</h1>

            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left padding-container-header">

                <!-- Grid row -->
                <div class="row" style="text-align: center!important;">

                    <!-- Grid column -->

                    <div class="col-md-3 mb-md-0 mb-3">
                        <div >
                            <h5 class="text-uppercase">TOTAL ORIG. CP</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-cost">{{$cost_price}}</span>
                        </div>
                        <div >
                            <h5 class="text-uppercase">TOTAL SOLD CP</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-cost">{{$s_cost_price}}</span>
                        </div>
                        <div >
                            <h5 class="text-uppercase">TOTAL REM. CP</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-cost">{{$r_cost_price}}</span>
                        </div>
                    </div>
                    <div class="col-md-3 mb-md-0 mb-3">
                        <div >
                            <h5 class="text-uppercase">TOTAL ORIG. SP</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-cost">{{$selling_price}}</span>
                        </div>
                        <div >
                            <h5 class="text-uppercase">TOTAL SOLD SP</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-cost">{{$s_selling_price}}</span>
                        </div>
                        <div >
                            <h5 class="text-uppercase">TOTAL REM. SP</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-cost">{{$r_selling_price}}</span>
                        </div>
                    </div>
                    <div class="col-md-3 mt-md-0 mt-3">
                        <div >
                            <h5 class="text-uppercase">TOTAL ORIG. PROFIT</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-profit">{{$selling_price - $cost_price}}</span>
                        </div>
                        <div >
                            <h5 class="text-uppercase">TOTAL SOLD. PROFIT</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-profit">{{$s_selling_price - $s_cost_price}}</span>
                        </div>
                        <div >
                            <h5 class="text-uppercase">TOTAL REM. PROFIT</h5>
                            &nbsp &#x20B9;&nbsp<span  class="text-center " id="total-profit">{{$r_selling_price - $r_cost_price}}</span>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none pb-3">


                    <div class="col-md-3 mb-md-0 mb-3">
                        <div >
                            <h5 class="text-uppercase">TOTAL ORIG. QUANTITY</h5>
                            <span  class="text-center " id="total-profit">{{$total_quantity}}</span>
                        </div>
                        <div >
                            <h5 class="text-uppercase">TOTAL SOLD QUANTITY</h5>
                            <span  class="text-center " id="total-profit">{{$s_total_quantity}}</span>
                        </div>
                        <div >
                            <h5 class="text-uppercase">TOTAL REM. QUANTITY</h5>
                            <span  class="text-center " id="total-profit">{{$r_total_quantity}}</span>
                        </div>
                    </div>
                        

                </div>
                <!-- Grid row -->

            </div>

        </div>

        @include('Extra.bootstrapjs')
        <script type="text/javascript">
            
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </body>
</html>
