<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <style type="text/css">

            page[size="A5"] {
              width: 14.8cm;
              height: 21cm;
            }
            @font-face {
              font-family: 'Lato';
              font-style: normal;
              font-weight: 100;
              src: local('Lato Hairline'), local('Lato-Hairline'), url(https://fonts.gstatic.com/s/lato/v14/S6u8w4BMUTPHh30AUi-qJCY.woff2) format('woff2');
              unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20B9, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: 'Lato';
              font-style: normal;
              font-weight: 100;
              src: local('Lato Hairline'), local('Lato-Hairline'), url(https://fonts.gstatic.com/s/lato/v14/S6u8w4BMUTPHh30AXC-q.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+20B9, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
            /* latin-ext */
            @font-face {
              font-family: 'Lato';
              font-style: normal;
              font-weight: 300;
              src: local('Lato Light'), local('Lato-Light'), url(https://fonts.gstatic.com/s/lato/v14/S6u9w4BMUTPHh7USSwaPGR_p.woff2) format('woff2');
              unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+20B9, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: 'Lato';
              font-style: normal;
              font-weight: 300;
              src: local('Lato Light'), local('Lato-Light'), url(https://fonts.gstatic.com/s/lato/v14/S6u9w4BMUTPHh7USSwiPGQ.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+20B9, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
            /* latin-ext */
            @font-face {
              font-family: 'Lato';
              font-style: normal;
              font-weight: 400;
              src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v14/S6uyw4BMUTPHjxAwXjeu.woff2) format('woff2');
              unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+20B9, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: 'Lato';
              font-style: normal;
              font-weight: 400;
              src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v14/S6uyw4BMUTPHjx4wXg.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC,  U+2000-206F, U+2074, U+20B9, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
            @page {
                margin: 0px;
            }
            body {
                margin: 0px;
            }
            * {
               font-family: 'Lato', sans-serif;
            }
            a {
                color: #fff;
                text-decoration: none;
            }
            table {
                font-size: x-small;
            }
            tfoot tr td {
                font-weight: bold;
                font-size: x-small;
            }
            .footer-border {
                /*padding: 8px;*/
                /*text-align: left;*/
                /*margin-bottom: 500px;*/
                padding: 3px 0;
                text-align: center;
                font-weight: lighter !important;
                font-size: x-small;
                border-bottom: 1px solid #000 !important;
            }
            .header-head {
                font-weight: lighter !important;
                border-bottom: 0.01em solid #000 !important;
                font-size: xx-small !important;
            }
            .header-body {
                /*font-weight: lighter !important;*/
                text-align: center;
                font-size: small !important;
                font-weight: 100 !important;
                padding-top: 5px;
                padding-bottom: : 50px;
            }
            .border {
                border-bottom: 0.01em solid #000 !important;
                margin-left: 1.4%;
                margin-right: 1.4%;
            }
            .footer-border-left {
                text-align: left;
                width: 50%;
                padding-top: 5px;
                padding-bottom: : 50px;
                padding-left: 5%;
            }
            .footer-border-right {
                text-align: right;
                width: 50%;
                padding-top: 5px;
                padding-bottom: : 50px;
                padding-right: 5%;
            }
            .center {
                text-align: center;
            }
            .invoice table {
                margin-right: 15px;
                margin-left: 10px;
            }
            .invoice h3 {
                margin-left: 15px;
            }
            .information {
                z-index:5;
                background-color: #fff;
                color: #000;
            }
            .information .logo {
                margin: 5px;
            }
            .information table {
                padding: 10px;
            }
            #background{
                position:absolute;
                z-index:0;
                background:white;
                display:block;
                min-height:100%; 
                min-width:100%;
                color:yellow;
            }

            /*#content{
                position:absolute;
                z-index:1;
            }*/

            #bg-text
            {
                color:black;
                font-size:30px;
                /*opacity:0.3;*/
                /*padding-left: 45px;*/
                /*transform:rotate(300deg);*/
                /*-webkit-transform:rotate(300deg);*/
            }
        </style>

    </head>
    <body>

    <div class="information">
        <table width="100%" >
            <tr>
                <td align="left" style="width: 30%;">
                    <!-- <pre> -->
                    <h3>{{ $customer }}</h3>
                    Date: {{ $date }}<br>
                    Time: {{ $time }}<br>
                    Bill Id: #{{ $bill_id }}<br>
                    Total Quantity: {{ $total_quantity }}<br>
                    <br><p></p>
                    <!-- </pre> -->
                </td>
                <td align="center" style="width: 40%;">
                    
                    <p id="bg-text">STORE<b>URBANE</b></p>
                </td>
                <td align="right" style="width: 30%;">

                    <h3>ADDRESS</h3>
                    <pre>
                        'Emanuel Towers' 
                        Opp Bangli Hospital
                        Bangli- Bhabhola Rd
                        Vasai (W)
                    </pre>
                </td>
            </tr>

        </table>
    </div>


    <br/>

    <div class="invoice">
        <!-- <h3>Invoice specification #123</h3> -->
        <table width="100%">
            <thead class="center header-head">
                <tr>
                    <th style="width: 10%;">Sr. No</th>
                    <th style="width: 10%;">UID</th>
                    <th style="width: 37%;">PRODUCT NAME</th>
                    <th style="width: 20%;">RATE</th>
                    <th style="width: 10%;">QUANTITY</th>
                    <th style="width: 13%;">PRICE</th>
                </tr>
            </thead>
            <tbody class="center header-body">
                @foreach($table_content as $content => $value)
                <tr>
                  <td>{{$content+1}}</td>
                  <td>{{$value->urbane_id}}</td>
                  <td>{{$value->product_name}}</td>
                  <td><img src="{{ $rupee_white }}" style="width: 60%;height: 60%;"> {{$value->rate}}</td>
                  <td>{{$value->quantity_sold}}</td>
                  <td><img src="{{ $rupee_white }}" style="width: 60%;height: 60%;"> {{$value->price}}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <!-- <div id="background">
        <p id="bg-text">STORE<b>URBANE</b></p>
    </div> -->
    <div class="information " style="position: absolute; bottom: 0;">
        <table width="100%">
            <thead class="footer-border">
                <tr>
                    <th class="footer-border-left" >Sub Total</th>
                    <th class="footer-border-right" ><img src="{{ $rupee_white }}" style="width: 100%;height: 100%;">{{ $subtotal }}</th>
                </tr>
                @if($discount != 0)
                    <tr>
                        <th class="footer-border-left" >Discount</th>
                        <th class="footer-border-right" ><img src="{{ $rupee_white }}" style="width: 100%;height: 100%;">{{ $discount }}</th>
                    </tr>
                @endif
            </thead>
            <tbody class="center">
                <tr>
                    <td class="footer-border-left" style="font-size: xx-large; padding-top: 15px;">Grand Total</td>
                    <td class="footer-border-right" style="font-size: xx-large; padding-top: 15px;"> <img src="{{ $rupee_white }}" style="width: 270%;height: 270%;"> {{ $grand_total }}</td>
                </tr>
            </tbody>
        </table>
        <div class="border"></div>
        <table width="100%">
            <tr>
                <td align="left" style="width: 15%;">
                    <img src="{{ $heart_black }}" style="width: 1000%;height: 150%; margin-top: 7px; margin-left: -2px; align="middle">Thank You!
                </td>
                <td align="center" style="width: 70%; font-size: 60%;">
                    @if($giveaway == 1)
                         Congratulations! You've been selected for the Urbane Lucky Draw. An online draw will be conducted on 25th of December, and the winner will win a Surprise Christmas Goodie.
                    @endif
                </td>
                <td align="right" style="width: 15%;">
                    @storeurbane8 <img src="{{ $instagram_black }}" style="width: 600%;height: 100%; margin-top: 3px; margin-right: 2px; align="middle">
                </td>
            </tr>

        </table>
    </div>
    </body>
</html>