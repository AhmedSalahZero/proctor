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
            padding-top:20px;
        }

        * {
            font-family: 'arialmt'
        }

        .advanced_certification_pg {
            text-align: center;
            font-family: 'arialmt', sans-serif;
            padding: 0.1px;
            margin-top: 120px;
            padding-top: 45px;
        }

        #advanced_certification {
            width: 1500px;
            /* width: 1019px; */
            padding: 0.1px;
            margin: auto;

            /* transform: scaleX(1.5); */

        }

        #advanced_certification_content {
            padding: 0.1px
            /* border-right: solid 9px #808184; */
            /* border-left: solid 9px #808184; */
/*
            border-right: solid 14px #808184;
            border-left: solid 14px #808184; */
            /* border-bottom: solid 14px #808184; */
            /* margin-top: -10px; */

            padding: 0 0 20px 0;
            /* padding: 0 80px 20px 80px; */

            /* padding: 0 120px 20px 120px; */

        }

        /* .advanced_item {
            margin-bottom: 20px;
            text-align: left;
        } */
        .advanced_item {
            margin-bottom: 35px;
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
            font-size:1.15rem ;
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
            margin-left: 50px;
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
    </style>
</head>

<body>
    <div id="someHtml" class="advanced_certification_pg">
        <div id="advanced_certification">
            @isset($public_path)
          <table style="width: 100%;margin-top:-50px;text-align:left">
              <tr>
                  <td class="text-align:left;width:100%">
                    <img  src="{{public_path('images/header_no_border2.png')}}" style="width:100%;transform: scale(1.22,1.15);" />
                  </td>
              </tr>
          </table>
            @else
            <img src="{{asset('images/header_no_border2.png')}}" />

            @endisset

            <div id="advanced_certification_content">

                <div class="advanced_item center" style="margin-top: 25px">
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


                <div class="advanced_item col50 ">
                    <span class="advanced_title gray-font-size">{{$certification->getEndDataOnly()}}</span>
                    <hr>
                    <span class="gray gray-font-size">Completion Date</span>
                </div>

                <div class="advanced_item col50 margin-left-two-cells">
                    <span class="advanced_title">{{$certification->getValidationDateOnly()}}</span>
                    <hr>
                    <span class="gray gray-font-size">Expiration Date</span>
                </div>

                <div class="advanced_item col50" style="white-space: nowrap">
                    <span class="advanced_title" style="white-space: nowrap">{{$certification->provider}}</span>
                    <hr>
                    <span class="gray gray-font-size" style="white-space: nowrap">Training Provider</span>
                </div>


                <div class="advanced_item col50 margin-left-two-cells">
                    <span class="">{{$certification->provider_number}}</span>
                    <hr>
                    <span class="gray gray-font-size">ID Number</span>
                </div>

                <div class="clear"></div>

                <div class="advanced_item col50">
                    <span class="advanced_title">{{$certification->telephone_number}}</span>
                    <hr>
                    <span class="gray gray-font-size">Telephone Number</span>
                </div>

                <div class="clear"></div>


                <div class="advanced_item col50">
                    <span class="advanced_title">{{$certification->instructor_name}}</span>
                    <hr>
                    <span class="gray gray-font-size">Instructor Name</span>
                </div>
                <div class="clear" style="height: 10px;"></div>

                <table style="width:100%" >
                    <tr>
                        <td style="text-align: left;width:60%">
                    {!! $qrcode !!}

                        </td>
                        <td style="text-align: right;white-space:nowrap;width:40%">
                            <div class="gray-font-size4" style="display: inline-block"><span class="gray-font-size4">
                                <br> Certificate Number</span> : {{$certification->certification_id}} </div>
                        </td>
                    </tr>
                </table>
                {{-- <div id="qr_section" style="text-align: left">
                  <div class="qrcode_div" style="width: 100px;
                  display: inline-block;">
                    {!! $qrcode !!}
                  </div>
                    <div id="cerID" style="line-height:100px;">
                        <div class="gray-font-size" style="display: inline-block;"><span class="gray gray-font-size"> Certification Number</span> : {{$certification->certification_id}} </div>
                    </div>
                </div> --}}
                <div class="clear"></div>
            </div>
        </div>
        <div id="footer" style="page-break-before: always;">
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
  {{-- <img src="{{asset('images/qr.png')}}" id="footer_qr"> --}}
  <span id="footer_qr" style="display: block">
    {!! $qrcode2 !!}
    {{-- {!! QrCode::size(100)->generate($certification->getAdvancedLink($certification)); !!} --}}
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
                                <td class="table-one-td-2 table-one-special-fs "> {{$certification->course->name}}</td>
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
{{--
                    <div class="rightItem">
                        <b>Trainee Name</b>
                        <span> {{$student->User_Name}}</span>
                    </div>

                    <div class="rightItem">
                        <b>Course Name</b>
                        <span> {{$certification->course->name}}</span>
                    </div>


                    <div class="rightItem">
                        <b>Supplement</b>
                        <span> {{$certification->supplement}}</span>
                    </div>

                    <div class="clear"></div>

                    <div class="rightItem col50">
                        <b>Completion Date</b>
                        <span> {{$certification->getEndDataOnly()}}</span>
                    </div>



                    <div class="rightItem col50">
                        <b>Expiration Date</b>
                        <span> {{$certification->getValidationDateOnly()}}</span>
                    </div>

                    <div class="clear"></div>

                    <div class="rightItem">
                        <b>Provider</b>
                        <span> {{$certification->provider}} </span>
                    </div>


                    <div class="clear"></div>

                    <div class="rightItem col50">
                        <b>Provider</b>
                        <span> {{$certification->provider_number}}</span>
                    </div> --}}
{{--


                    <div class="rightItem col50">
                        <b>Phone</b>
                        <span> {{$certification->telephone_number}}</span>
                    </div>

                    <div class="clear"></div>

                    <div class="rightItem">
                        <b>Instructor Name</b>
                        <span>{{$certification->instructor_name}}</span>
                    </div> --}}
{{--

                    <div class="clear"></div>

                    <div class="rightItem rightCert">
                        <b>Certification Number : </b>
                        <span>{{$certification->certification_id}}</span>
                    </div> --}}

                </div>
            </div>

            {{-- <div class="clear"></div> --}}
        </div>
        <div class="clear"></div>


    </div>


    {{--@if(isset($download))--}}
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>--}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>--}}
    {{-- <script defer>
        --}}
{{--        function getPDF() {--}}
{{--            var imgData;--}}
{{--            html2canvas($("#someHtml"), {--}}
{{--                useCORS: true,--}}
{{--                onrendered: function (canvas) {--}}
{{--                    imgData = canvas.toDataURL(--}}
{{--                        'image/png');--}}
{{--                    var doc = new jsPDF('p', 'pt','a4' );--}}
{{--                    doc.addImage(imgData, 'PNG', 10, 10);--}}
{{--                    doc.save('certification.pdf');--}}

{{--                }--}}
{{--            }).then(function(){--}}
{{--                return  window.location.href = "/admin/certifications" ;--}}
{{--            });--}}

{{--        }--}}
{{--        getPDF();--}}
{{--
   </script>--}}
    {{--@endif--}}

</body>
</html>
