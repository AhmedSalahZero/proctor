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
            background: #eaebed;
            width: 750px;
            margin: auto;
            margin-top: 100px;
        }

        .footer_lt {
            float: left;
            font-size: 12px;
            text-align: left;
             width: 50%;
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
        <div style="border:9px solid #818285;border-left-width:10px;" id="advanced_certification">
            @isset($public_path)
          <table  style="width: 100%;margin-top:-50px;text-align:left;">
              <tr>
                  <td class="text-align:left;width:100%" >
                    <img  src="{{public_path('images/header.png')}}" 
                    style="width:100%;transform:scale(1.0369,1)"
                     />
                  </td>
              </tr>
          </table>
            @else
            <img src="{{asset('images/header.png')}}" />

            @endisset
            <div id="advanced_certification_content" style="padding-left:65px;padding-right:65px;">
                <div class="advanced_item center" style="margin-top: 25px;">
                    <span class="advanced_title2">{{$student->Full_Name}}</span>
                    <hr>
                    <span class="gray gray-font-size">Trainee Name</span>
                </div>

                <div class="advanced_item">
                    <span class="advanced_title">{{$certification->course->name}}</span>
                    <hr>
                    <span class="gray gray-font-size">Course Name</span>
                </div>

                <div class="advanced_item ">
                    <span class="advanced_title">{{$certification->supplement}}</span>
                    {{-- <hr> --}}
                    <span class="gray gray-font-size">Supplement Name</span>
                </div>


                <div class="advanced_item col50 col_plus">
                    <span class="advanced_title gray-font-size">{{$certification->getEndDataOnly()}}</span>
                    <hr>
                    <span class="gray gray-font-size">Completion Date</span>
                </div>

                <div class="advanced_item col50 margin-left-two-cells col_minus">
                    <span class="advanced_title">{{$certification->getValidationDateOnly()}}</span>
                    <hr>
                    <span class="gray gray-font-size">Expiration Date</span>
                </div>
                <div class="advanced_item col50 col_plus" style="white-space: nowrap">
                    <span class="advanced_title" style="white-space: nowrap">{{$certification->provider}}</span>
                    <hr>
                    <span class="gray gray-font-size" style="white-space: nowrap">Training Provider</span>
                </div>


                <div class="advanced_item col50 margin-left-two-cells col_minus">
                    <span class="">{{$certification->provider_number}}</span>
                    <hr>
                    <span class="gray gray-font-size">ID Number</span>
                </div>

                <div class="clear"></div>

                <div class="advanced_item col50 col_plus">
                    <span class="advanced_title">{{$certification->telephone_number}}</span>
                    <hr>
                    <span class="gray gray-font-size">Telephone Number</span>
                </div>

                <div class="clear"></div>


                <div class="advanced_item col50 col_plus ">
                    <span class="advanced_title">{{$certification->instructor_name}}</span>
                    <hr>
                    <span class="gray gray-font-size">Instructor Name</span>
                </div>
                <div class="clear" style="height: 1px;"></div>
                <table style="width:100%" style="margin-top:30px;margin-bottom:-10px;">
                    <tr>
                        <td style="text-align: left;width:60%">
                    {!! $qrcode !!}

                        </td>
                        <td style="text-align: right;white-space:nowrap;width:40%;" >
                            <div class="gray-font-size4" style="display: inline-block;" style="text-align: right"><span style="text-align: right" class="gray-font-size4">
                                <br> Certificate Number</span> : {{$certification->certification_id}} </div>
                        </td>
                    </tr>
                </table>
                
                <table style="width:100%" style="margin-top:60px;margin-bottom:-10px;">
                    <tr>
                        <td style="text-align: left;width:60%">

                        </td>
                        <td style="text-align: right;white-space:nowrap;width:40%;" >
                    <div style="height:130px"></div>
                        </td>
                    </tr>
                </table>
           
                <div class="clear"></div>
            </div>
        </div>
        <div id="footer" 
        {{-- style="page-break-before: always;" --}}
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


            <div id="footer_rt">
                <div class="whiteSpace"></div>
                <div id="footer_rt_inner">
                    <div id="redTitle" style="font-weight: bold">IADC Wellsharp Course Completion Card</div>
                    <div class="clear"></div>

                    <table class="table-one">
                        <tr class="table-one-tr">
                            <td class="table-one-td-1 table-one-special-fs3 ">Trainee Name</td>
                            <td class="table-one-td-2 table-one-special-fs3 ">{{$student->Full_Name}}</td>
                        </tr>
                    </table>

                   <table class="table-one">
                        <tr class="table-one-tr">
                                <td class="table-one-td-1 table-one-special-fs ">Course Name</td>
                                <td class="table-one-td-2 table-one-special-fs " @if($certification->course_type==7) style="font-size: 13px;" @endif> {{$certification->course->name}}</td>
                        </tr>
                    </table>
                    <table class="table-one" style="padding-left: 23px">
                        <tr class="table-one-tr">
                                <td class="table-one-td-1 table-one-special-fs2 ">Supplement Name</td>
                                <td class="table-one-td-2 table-one-special-fs2 " > {{$certification->supplement}}</td>
                        </tr>
                    </table>
                    <table class="table-two">
                        <tr class="table-two-tr">
                                <td class="table-two-td-1 table-two-special-fs">Completion Date</td>
                                <td class="table-two-td-2 table-two-special-fs"> {{$certification->getEndDataOnly()}}</td>

                                <td class="table-two-td-3 table-two-special-fs">Expiration Date</td>
                                <td class="table-two-td-4 table-two-special-fs"> {{$certification->getValidationDateOnly()}}</td>
                        </tr>


                    </table>
                     <table class="table-one">
                        <tr class="table-one-tr">
                                <td class="table-one-td-1 table-one-special-fs4 ">Provider </td>
                                <td class="table-one-td-2 table-one-special-fs4 "> {{$certification->provider}} </td>
                        </tr>
                     </table>

                        <table class="table-two" style="padding-left:48px">
                            <tr class="table-two-tr">
                                    <td class="table-two-td-1 table-two-special-fs2 ">Provider#</td>
                                    <td class="table-two-td-2 table-two-special-fs2"> {{$certification->provider_number}}</td>

                                    <td class="table-two-td-3 table-two-special-fs2">Phone#</td>
                                    <td class="table-two-td-4 table-two-special-fs2"> {{$certification->telephone_number}}</td>
                            </tr>
                        </table>
                        <table class="table-one " style="padding-left: 24px">
                            <tr class="table-one-tr">
                                    <td class="table-one-td-1 table-one-special-fs5 ">Instructor Name</td>
                                    <td class="table-one-td-2 table-one-special-fs5"> {{$certification->instructor_name}}</td>
                            </tr>
                        </table>
                       <table class="table-one">
                        <tr class="table-one-tr">

                                <td class="table-one-td-2 table-one-special-fs6"
                                style="text-align: right;border:none;padding-right:20px"
                                >
                                    Certificate Number:
                                    {{$certification->certification_id}}</td>
                        </tr>
                       </table>


                </div>
            </div>
        </div>
        <div class="clear"></div>


    </div>
</body>
</html>
