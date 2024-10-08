<!DOCTYPE html>
<html>

<head>
    <title></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <style type="text/css">
        @font-face {
            font-family: 'arialmt';
            font-style: normal;
            font-weight: normal;
            src: url('{{public_path('storage/fonts/arialmt.ttf')}}') format('ttf');
        }

        body {
            margin: 0px;
            width: 100%;
        }

        * {
            font-family: 'arialmt'
        }

        .advanced_certification_pg {
            text-align: center;
            font-family: 'arialmt', sans-serif;
            padding: 0.1px;
            padding-top: 35px;
            
        }

        #advanced_certification {
            width: 1500px;
            /* width: 1019px; */
            padding: 0.1px;
            margin: auto;

        }

        #advanced_certification_content {
            padding: 0.1px;
            padding: 0 0 20px 0;

        }
        .advanced_item {
            margin-bottom: 30px;
            text-align: left;
        }
      
        hr {
            padding: 0px;
            margin: 0px;
        }

        .center {
            text-align: center;
        }

        .gray {
            color: #808184;
        }
        .gray-font-size  {
            font-size: 1.091rem;
        }

        .col50 {
            width: 48%;
            margin-right: 2%;
            float: left;
        }
     

        .clear {
            clear: both;
            width: 100%;
        }

        .advanced_title {
            /* font-weight: bold; */
            font-size: 1.091rem;

        }
        .gray-font-size4
        {
            font-size:0.85rem ;
            /* font-size:1.15rem ; */
        }
        .advanced_title2 {
            /* font-weight: bold; */
            font-size: 1.46rem;

        }
        .floatleft {
            float: left;
        }

        #cerID {
            float: right;
        }

        #qr_section {
            margin-top: 70px;
        }

        #footer {
            margin-top: 50px;
            /* background: #eaebed; */
            width: 750px;
            margin: auto;
            margin-top: 100px;
        }

        .footer_lt {
            /* float: left; */
            font-size: 12px;
            text-align: left;
             width: 50%;
             margin:auto;
            /* width: 43%; */
            /* border-right: dashed #7b7a77 2px; */
            border-right: dashed #7b7a77 2px;

        }

        #footer_logo {
            background: #fff;
            width: 100%;
            float: right;
        }

        #footer_qr {
            margin: 50px 10px;
        }

        .footer_lt_text {
            float: left;
            line-height: 20px;
            padding: 0 20px;
            font-size: 10px;
        }

        .whiteSpace {
            height: 50px;
            background: #fff;
        }

        #redTitle {
            background: #d1102b;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        #footer_rt {
            width: 49.5%;
            /* width: 56.5%; */
            float: right;
            text-align: left;
            font-size: 10px;
        }

        #footer_rt .col50 {
            width: 49%;
            margin-right: 1%;
            float: left;
        }
        #footer_rt_inner
        {
            overflow: hidden
        }

        .rightItem {
            margin-bottom: 5px;
            white-space: nowrap
        }

        .rightItem b {
            padding: 10px;
        }

        .rightItem span {
            width: 100%;
            font-size: 12px;
            border-bottom: solid 1px black;
            width: 100%;
            display: inline-block;

        }

        /* Salah Style */
        #qr_section {
            margin-top: -10px;
        }
        .margin-left-two-cells
        {
            margin-left: 30px;
        }
        .table-one
        {
            width: 100%;
            padding-left: 20px;
        }
        .table-one-tr
        {
            white-space: nowrap;
        }
        .table-one-td-1
        {
            width: max-content;
            white-space: nowrap;
        }
        .table-one-td-2
        {
            width: 100%;
            border-bottom: 1px solid black
        }


        .table-two
        {
            width: 100%;
            padding-left: 58px;
        }
        .table-two-tr
        {
            white-space: nowrap;
        }
        .table-two-td-1,
        .table-two-td-3

        {
            width: max-content;
            white-space: nowrap;
        }
        .table-two-td-2,
        .table-two-td-4
        {
            width: 100%;
            border-bottom: 1px solid black;
            white-space: nowrap;
        }
        .table-one-special-fs
        {
            /*3*/
            /* font-size:0.89rem; */
             font-size:0.923rem;

        }
        .table-one-special-fs2
        {
            /* font-size:0.967rem; */
            font-size:1.015rem;

        }
        .table-one-special-fs3
        {
            /* font-size:0.90rem; */
            font-size:0.923rem;

        }
        .table-one-special-fs4
        {
            font-size:0.858rem;
        }
        .table-one-special-fs5
        {
            font-size:0.960rem;

        }
        .table-one-special-fs6
        {
            font-size:0.640rem;
        }

        .table-two-special-fs
        {
            font-size:2.20rem;

        }
        .table-two-special-fs2{
            font-size:1.97rem;

        }
        .table-left-padding {
            padding-left: 20px;
        }
        .first-b
        {
            font-size: 11px;
            padding-left: 5px;
        }
        .first-b-tr
        {
            font-size: 11px;
            padding-left: 5px;

        }
        .first-b-td
        {
            font-size: 11px;
            padding-left: 5px;

        }
        .col_plus{width:60% !important;}
        .col_minus{width:35% !important;}
    </style>
</head>

<body>
    
    <div  id="someHtml" class="advanced_certification_pg" >
       
        <div id="footer" 
        >
            <div class="footer_lt">
                <div class="whiteSpace"></div>
                <div id="footer_logo">
                    @isset($public_path)
                    <img src="{{public_path('images/iadc.png')}}">
                    @else
                    <img src="{{asset('images/iadc.png')}}">
                    @endisset
                </div>
                <div class="clear"></div>

                <table style="width:100%">
                    <tr>
                        <td style="text-align: left">
                            <div class="footer_lt_text ">
                                <table class="first-b">
                                   <tr class="first-b-tr">
                                       <td class="first-b-td">
                                        This individual has successfully completed a well  control course at and institution accredited by the international
                                        Association of Drilling Contractors
                                       </td>
                                   </tr>
                                </table>
                                <table class="first-b">
                                    <tr class="first-b-tr">
                                        <td class="first-b-td">
                                            For Scheduling training or replacement of lost  card,please call training
                                    provider with information provided on this completion card
                                        </td>
                                    </tr>
                                </table>
                            <table class="first-b">
                               <tr class="first-b-tr">
                                   <td class="first-b-tr">
                                    To verify validity, please visit the IADC website:<br>
                                    <center>www.iadc.org/wellsharp</center>
                                   </td>
                               </tr>
                            </table>
                            </div>
                        </td>
                        <td style="text-align: center">
                            <span id="footer_qr" style="display: block">
                                {!! $qrcode2 !!}
                            </span>
                        </td>
                    </tr>
                </table>




            </div>

        </div>
        <div class="clear"></div>


    </div>
</body>
</html>
