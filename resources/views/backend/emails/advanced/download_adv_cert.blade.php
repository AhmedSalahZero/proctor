<!DOCTYPE html>
<html>
<head>
    <title></title>


{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">--}}
    <style type="text/css">
        @font-face {
            font-family: 'arialmt';
            font-style: normal;
            font-weight: normal;
            src: url('{{public_path('storage/fonts/arialmt.ttf')}}') format('ttf');
        }
        body{margin: 0px; width: 100%;}
        @page                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                {
            margin:0 ; padding: 0;
        }
        img
        {
            max-width: 100%;
        }

        p , h1 , h2 ,h3 ,h4 , h5 ,h6
        {
            margin: 0;
        }
        body, html {
            height: 100%;
        }
        *{
            /* font-size: 20px ; */
            font-family: 'arialmt', sans-serif;
        }
        th
        {
            font-weight: normal;
        }
        body
        {margin: 0;padding: 0;}
        .advanced_certification_pg{ text-align: center;  }
        #advanced_certification{ width:1019px; margin: auto; }
        #advanced_certification_content{border-right: solid 17px #4C4D4F;border-left: solid 16px #4C4D4F;border-bottom: solid 14px #4C4D4F;margin-top: -10px;padding: 0 50px 20px 50px;}

        .advanced_item{margin-bottom: 35px;text-align: left;padding: 0.1px;}

        @if( $certification->isRigpass())
        .advanced_item{margin-bottom: 35px}
        @endif
        hr{ padding: 0.1px; margin: 0px;   }
        .gray{ color: #808184; }
        .advanced_title{ font-size: 16px; }
        #footer_rt .col50{ width: 49%; margin-right: 1%; float: left;  }
        .rightItem b{ padding: 10px;}
        .rightItem span{  width: 100%; font-size:18px;  }
        img {max-width: 100%;}
        .table-two-cal
        {width: 100%;margin-bottom: 35px;border-collapse: collapse;}
        @if( $certification->isRigpass())
        .table-two-cal{
            margin-bottom:35px;
        }
        @endif
        .table-two-cal .table-row
        {width: 100%;}
        .table-two-cal .table-row  .first-th
        {text-align: left;padding-right: 100px;}
        .table-two-cal .table-row  .second-th
        {text-align: left;}
        .width-35 {width:30%;}
        #last-table
        {
            margin-bottom:150px;
        }
        .width-70 {width:70% ;}
        .width-35 {width:35%;}
        width-50 {width: 50%;}
        .padding-right-100 {padding-right:14%;}
        .text-left{text-align: left}
        .footer-table {width:100%;padding-left: 17.5%}
        .footer-td{color: grey;font-size: 18px}
        table
        {
            /* border-collapse:separate; */
            /* border-spacing: 0em 10.1em; */
        }
        .text-center
        {
            text-align: center;
        }
        .full-width
        {
            width: 100%;
        }
        .no-wrap
        {
            white-space: nowrap
        }
        .font-size-12px
        {
            /* 12px out = 16 input in this pdf package  */
            font-size:16px
        }
        .font-size-12px-tables
        {
            font-size:1.1465rem;
        }
        .font-size-12px-tables-three-columns
        {
            font-size:1.248rem;
        }
        .font-size-12px-tables-three-columns2
        {
            font-size:1.1468rem;
        }
        .font-size-12px-tables-one-item
        {
            font-size:1.0908rem;
        }
        .font-size-12px-tables-last-2
        {
            font-size:1.2805rem;
        }
    </style>
</head>
<body>
<div id="someHtml" class="advanced_certification_pg" >
    <div id="advanced_certification">
        @isset($public_path)
            <img src="{{$certification->getHeaderImage(true)}}" />
        @else
            <img class="print_image hide_on_print" src="{{$certification->getHeaderImage()}}" />

        @endisset
        <div id="advanced_certification_content">

            <div class="advanced_item ">
                <span class="advanced_title">{{$student->Full_Name}}</span>
                <hr>
                <span class="gray font-size-12px">Trainee Name</span>
            </div>

            @if($certification->isRigpass())


                <table class="table-two-cal">
                    <tr class="table-row">
                        <th class="text-left first-th width-70 padding-right-100 font-size-12px-tables" >
                            <span class="text-left advanced_title font-size-12px-tables">{{$certification->provider}}</span>
                            <hr>
                            <span class="text-left gray font-size-12px-tables">Training Provider</span>
                        </th>
                        <th class="second-th width-35 font-size-12px-tables">
                            <span class="text-left advanced_title font-size-12px-tables">{{$certification->provider_id}}</span>
                            <hr>
                            <span class="text-left gray font-size-12px-tables">Provider ID Number</span>
                        </th>
                    </tr>
                </table>

            @else

                <div class="advanced_item font-size-12px-tables-one-item">
                    <span class="advanced_title font-size-12px-tables-one-item">{{$certification->course->name}}</span>
                    <hr>
                    <span class="gray font-size-12px-tables-one-item">Course Name</span>
                </div>

            @endif

            @if($certification->isRigpass())
                <table class="table-two-cal">
                    <tr class="table-row ">
                        <th class="first-th width-35 padding-right-100 font-size-12px-tables-three-columns">
                            <span class="advanced_title font-size-12px-tables-three-columns ">{{$certification->delivery_method}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables-three-columns">Delivery Type</span>
                        </th>
                        <th class="second-th width-35 padding-right-100 no-wrap font-size-12px-tables-three-columns" >
                            <span class="advanced_title font-size-12px-tables-three-columns">{{$certification->shore}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables-three-columns">Onshore and/or offshore</span>
                        </th>

                        <th class="second-th width-35 font-size-12px-tables-three-columns">
                            <span class="advanced_title font-size-12px-tables-three-columns">{{$certification->industry_endorsement}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables-three-columns">Industry Endorsement</span>
                        </th>

                    </tr>
                </table>

            @else
                <table class="table-two-cal">
                    <tr class="table-row">
                        <th class="first-th width-70 padding-right-100 font-size-12px-tables">
                            <span class="advanced_title font-size-12px-tables">{{$certification->provider}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables">Training Provider</span>
                        </th>
                        <th class="second-th width-35 font-size-12px-tables">
                            <span class="advanced_title font-size-12px-tables">{{$certification->provider_id}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables">Provider ID Number</span>
                        </th>
                    </tr>
                </table>


            @endif




            @if($certification->isRigpass())
                <table class="table-two-cal">
                    <tr class="table-row">
                        <th class="first-th width-70 padding-right-100 font-size-12px-tables">
                            <span class="advanced_title font-size-12px-tables">{{$certification->instructor_name}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables">Instructor Name</span>
                        </th>
                        <th class="second-th width-35 font-size-12px-tables">
                            <span class="advanced_title font-size-12px-tables">{{$certification->getEndDataOnly()}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables">Completion Date</span>
                        </th>
                    </tr>
                </table>
            @else

                <table class="table-two-cal">
                    <tr class="table-row" style="white-space: nowrap">
                        <th class="first-th width-35 padding-right-100 font-size-12px-tables-three-columns2" style="white-space: nowrap">
                            <span class="advanced_title font-size-12px-tables-three-columns2" style="white-space: nowrap">{{$certification->getEndDataOnly()}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables-three-columns2" style="white-space: nowrap">Completion Date</span>
                        </th>
                        <th class="second-th width-35 padding-right-100 font-size-12px-tables-three-columns2" style="white-space: nowrap">
                            <span class="advanced_title font-size-12px-tables-three-columns2" style="white-space: nowrap">{{$certification->getValidationDateOnly()}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables-three-columns2" style="white-space: nowrap">Expiration Date</span>
                        </th>

                        <th class="second-th width-35 font-size-12px-tables-three-columns2" style="white-space: nowrap">
                            <span class="advanced_title font-size-12px-tables-three-columns2" style="white-space: nowrap">{{$certification->delivery_method}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables-three-columns2" style="white-space: nowrap">Delivery Method</span>
                        </th>

                    </tr>
                </table>


            @endif
            @if($certification->isRigpass())
                <table class="table-two-cal " id="last-table">
                    <tr class="table-row">
                        <th class="second-th width-35 font-size-12px-tables-one-item">
                            <span class="advanced_title font-size-12px-tables-one-item">{{$certification->provider_phone}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables-one-item">Training Provider Telephone Number</span>
                        </th>

                        <th class="second-th width-35 font-size-12px-tables-one-item" style="opacity: 0">
                            <span class="advanced_title font-size-12px-tables-one-item"></span>
                            <span class="gray font-size-12px-tables-one-item"></span>
                        </th>

                    </tr>
                </table>
            @else
                <table class="table-two-cal" id="last-table">
                    <tr class="table-row font-size-12px-tables">
                        <th class="first-th width-70 padding-right-100 font-size-12px-tables-last-2">
                            <span class="advanced_title font-size-12px-tables-last-2" style="text-align: left">{{$certification->instructor_name}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables-last-2" style="text-align: left">Instructor Name</span>
                        </th>
                        <th class="second-th width-35 font-size-12px-tables-last-2 no-wrap">
                            <span class="advanced_title font-size-12px-tables-last-2">{{$certification->provider_phone}}</span>
                            <hr>
                            <span class="gray font-size-12px-tables-last-2 no-wrap">Training Provider Telephone Number</span>
                        </th>
                    </tr>
                </table>

            @endif
            {{--                <div class="advanced_item col50">--}}

            {{--                </div>--}}

            {{--                <div class="advanced_item col50">--}}
            {{--                    <span class="advanced_title">{{$certification->getValidationDateOnly()}}</span>--}}
            {{--                    <hr>--}}
            {{--                    <span class="gray">Expiration Date</span>--}}
            {{--                </div>--}}

            {{--            <div class="advanced_item col50">--}}
            {{--                <span class="advanced_title">{{$certification->getEndDataOnly()}}</span>--}}
            {{--                <hr>--}}
            {{--                <span class="gray">Completion Date</span>--}}
            {{--            </div>--}}

            {{--            <div class="advanced_item col50">--}}
            {{--                <span class="advanced_title">{{$certification->getValidationDateOnly()}}</span>--}}
            {{--                <hr>--}}
            {{--                <span class="gray">Expiration Date</span>--}}
            {{--            </div>--}}

            {{--            <div class="advanced_item col50">--}}
            {{--                <span class="advanced_title">{{$certification->provider}}</span>--}}
            {{--                <hr>--}}
            {{--                <span class="gray">Training Provider</span>--}}
            {{--            </div>--}}


            {{--            <div class="advanced_item col50">--}}
            {{--                <span class="">{{$certification->provider_number}}</span>--}}
            {{--                <hr>--}}
            {{--                <span class="gray">ID Number</span>--}}
            {{--            </div>--}}

            {{--            <div class="clear"></div>--}}

            {{--            <div class="advanced_item col50">--}}
            {{--                <span class="advanced_title">{{$certification->telephone_number}}</span>--}}
            {{--                <hr>--}}
            {{--                <span class="gray">Telephone Number</span>--}}
            {{--            </div>--}}

            {{--            <div class="clear"></div>--}}


            {{--            <div class="advanced_item col50">--}}
            {{--                <span class="advanced_title">{{$certification->instructor_name}}</span>--}}
            {{--                <hr>--}}
            {{--                <span class="gray">Instructor Name</span>--}}
            {{--            </div>--}}
            {{--            <div class="clear"></div>--}}

            <table class="table-two-cal">
                <tr class="table-row">
                    <th class="first-th width-50 padding-right-100">
                            <span class="advanced_title">
                                {!! $qrcode !!}
                            </span>

                    </th>
                    <th class="second-th width-50">
                        <span class="advanced_title"><span class="gray">Certificate Number :</span> {{$certification->certification_id}}</span>
                    </th>
                </tr>
            </table>
            @if(! $certification->isRigpass())
            <table class="text-center full-width">
                <tr class="text-center ">
                    <td class="text-center footer-td">Course content not vetted by IADC as part of DIT Accreditation</td>
                </tr>
            </table>
            @endif

            {{--            <div id="qr_section">--}}
            {{--                {!! QrCode::size(100)->generate($certification->getAdvancedLink($certification)); !!}--}}
            {{--                <div id="cerID">--}}
            {{--                    <div><span class="gray"> Certification Number</span> : {{$certification->certification_id}} </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="clear"></div>--}}
        </div>
    </div>

    <div class="clear"></div>

</div>




{{--<div id="someHtml" class="advanced_certification_pg">--}}
{{--    <div id="advanced_certification">--}}
{{--        @isset($public_path)--}}
{{--            <img src="{{$certification->getHeaderImage(true)}}" />--}}
{{--        @else--}}
{{--            <img src="{{$certification->getHeaderImage()}}" />--}}

{{--        @endisset--}}

{{--        <div id="advanced_certification_content">--}}

{{--            <div class="advanced_item">--}}
{{--                <span class="advanced_title">{{$student->Full_Name}}</span>--}}
{{--                <hr>--}}
{{--                <span class="gray">Trainee Name</span>--}}
{{--            </div>--}}

{{--            <div class="advanced_item">--}}
{{--                <span class="advanced_title">{{$certification->course->name}}</span>--}}
{{--                <hr>--}}
{{--                <span class="gray">Course Name</span>--}}
{{--            </div>--}}


{{--            <table class="table-two-cal">--}}
{{--                <tr class="table-row">--}}
{{--                    <th class="text-left first-th width-70 padding-right-100" >--}}
{{--                        <span class="advanced_title" >{{$certification->provider}}</span>--}}
{{--                        <hr>--}}
{{--                        <span class="gray" >Training Provider</span>--}}
{{--                    </th>--}}
{{--                    <th class="text-left second-th width-35" >--}}
{{--                        <span class="advanced_title" >{{$certification->provider_id}}</span>--}}
{{--                        <hr>--}}
{{--                        <span class="gray" >Provider ID Number</span>--}}
{{--                    </th>--}}
{{--                </tr>--}}
{{--            </table>--}}

{{--            <table class="table-two-cal">--}}
{{--                <tr class="table-row">--}}
{{--                    <th class="text-left first-th width-35 padding-right-100">--}}
{{--                        <span class="advanced_title">{{$certification->getEndDataOnly()}}</span>--}}
{{--                        <hr>--}}
{{--                        <span class="gray">Completion Date</span>--}}
{{--                    </th>--}}
{{--                    <th class="text-left second-th width-35 padding-right-100">--}}
{{--                        <span class="advanced_title">{{$certification->getValidationDateOnly()}}</span>--}}
{{--                        <hr>--}}
{{--                        <span class="gray">Expiration Date</span>--}}
{{--                    </th>--}}

{{--                    <th class="text-left second-th width-35">--}}
{{--                        <span class="advanced_title">{{$certification->delivery_method}}</span>--}}
{{--                        <hr>--}}
{{--                        <span class="gray">Delivery Method</span>--}}
{{--                    </th>--}}

{{--                </tr>--}}
{{--            </table>--}}

{{--            <table class="table-two-cal">--}}
{{--                <tr class="table-row">--}}
{{--                    <th class="text-left first-th width-70 padding-right-100">--}}
{{--                        <span class="advanced_title">{{$certification->instructor_name}}</span>--}}
{{--                        <hr>--}}
{{--                        <span class="gray">Instructor Name</span>--}}
{{--                    </th>--}}
{{--                    <th class="text-left second-th width-35">--}}
{{--                        <span class="advanced_title">{{$certification->provider_phone}}</span>--}}
{{--                        <hr>--}}
{{--                        <span class="gray">Training Provider Phone Number</span>--}}
{{--                    </th>--}}
{{--                </tr>--}}
{{--            </table>--}}


{{--            <table class="table-two-cal">--}}
{{--                <tr class="table-row">--}}
{{--                    <td class="first-th width-50 padding-right-100" >--}}
{{--                            <span class="advanced_title" style="display: inline-block">--}}
{{--                                {!! $qrcode !!}--}}

{{--                            </span>--}}

{{--                    </td>--}}
{{--                    <td class="second-th width-50 " >--}}

{{--                        <span class="advanced_title"><span class="gray">Certificate Number:</span> {{$certification->certification_id}}</span>--}}

{{--                    </td>--}}
{{--                </tr>--}}
{{--            </table>--}}

{{--            <table class="footer-table">--}}
{{--                <tr>--}}
{{--                    <td class="footer-td">Course content not vetted by IADC as part of DIT Accreditation</td>--}}
{{--                </tr>--}}
{{--            </table>--}}


{{--        </div>--}}
{{--    </div>--}}



{{--</div>--}}


</body>
</html>
