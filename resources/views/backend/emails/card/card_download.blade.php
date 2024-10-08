<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Title </title>

    <style >

        *{
            font-family: 'dejavusans';
        }

        @page                                                                                                                                {
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
        body
        {margin: 0;padding: 0;}
        .cards
        {width: 400px;margin: 0 auto;}
        .first-card
        {background: #CF152B;color: white;font-size: 12px;padding-top: 1px;padding-bottom: 9px;}

        .container
        {width: 95%;margin: 0 auto;}
        .first-card-title
        {margin-bottom: 10px;font-weight:bold ; }
        .first-card-p
        {
            margin: 0;
            font-size: 9.5px;
            /*font-weight: bold;*/
            white-space: nowrap;
            padding-top: 10px;
            padding-left: 10px;
        }
        td{
            font-weight: normal;
        }
        .first-card-content
        {background: white;color: black;border-radius: 5px;padding: 2px;overflow: hidden;}
        .first-table
        {
            width: 100% ;
        }
        table
        {
            border-collapse: separate;
            border-spacing: 5px;
        }
        .first-card-item
        {margin-bottom: 1px;font-size: 12px;white-space: nowrap;}
        .left-item
        {width: max-content;white-space: nowrap}
        .last-item
        {border-bottom: 0.1px solid black;width: 100%;}

        .cert-number
        {

        }
        .cnumber
        {font-size: 12px;}
        .cert-n{font-size: 12px;}

        .second-card
        {

        }
        .header
        {/* background: red; */padding-left: 5px;padding-bottom: 5px}
        .header > img
        {

        }
        .second-card
        {
            /*padding-top: 100px;*/
        }
        .second-card-content{padding-left: 5px;color: white;background: #808286;}
        .second-card-content  p
        {max-width: 240px;color: white}
        .second-card-content  img
        {vertical-align: top;color: white}
        .second-card-footer
        {
            padding-top: 5px;
        }
        .second-card-footer
        {

        }
        .footer-tr
        {

        }
        .footer-td-first
        {

        }
        .footer-td-second
        {
            padding:5px;

        }
        .table_center tr
        {
            padding: 5px;
        }
        .table_center tr td.first
        {
            width: 60%;
            margin-left: auto;
            font-size: 12px;
            color: white !important;
            line-height: 1.3;
            /*line-height: 1.6;*/
        }
        .table_center tr td.second-td
        {
            width: 30%;
            text-align: center;

        }
        .font-size-6px
        {
            font-size: 10px !important;
        } .font-size-14px
        {
            font-size: 8px !important;
        }
          .special-font
          {
              font-size: 29px !important;
              white-space: nowrap;

          }
          .shore{
            border: 1px solid black;

          }
          .red_color
          {
              color: #CF152B;

          }
        /*.on_shore*/
        /*{*/
        /*    display: inline-block;*/
        /*    height: 25px;*/
        /*    width: 25px;*/
        /*    border: 2px solid black;*/
        /*    vertical-align: middle;*/
        /*    font-size: 30px;*/
        /*    text-align: center;*/
        /*    line-height: 25px;*/
        /*    margin-right: 5px;*/
        /*}*/

    </style>
</head>
<body>
<div class="cards">
    <div class="first-card">
        <div class="container">
            <div class="first-card-title">
                <p class="first-card-p ">
                    {!! $certification->getCardTitle() !!}
                </p>
            </div>
            <div class="first-card-content">
                <div class="first-card-item" >
                    <table class="first-table">
                        <tr>
                            <td class="left-item font-size-14px">Trainee Name</td>
                            <td class="last-item font-size-6px">{{$certification->user->Full_Name}}</td>
                        </tr>
                    </table>
                </div>
                <div class="first-card-item">
                    <table class="first-table">
                        <tr>
                            @if($certification->isRigpass())
                            <td class="left-item font-size-14px">Provider</td>
                            <td class="last-item font-size-6px" >
                                @if($certification->provider)
                                    {{$certification->provider}}
                                @else
                                    None
                                @endif
                            </td>
                                @else
                                <td class="left-item font-size-14px">Course Name</td>
                                <td class="last-item font-size-6px" >{{$certification->course->name}}</td>

                            @endif

                        </tr>
                    </table>
                    {{--                    <span class="left-item">Course Name</span>--}}
                    {{--                    <span class="last-item">Rig Inspection And Maintenance</span>--}}
                </div>

                @if($certification->isRigpass())
                    <div class="date-card-item">
                        <table class="first-table" style="margin-bottom: 1px">
                            <tr>
                                <td class="left-item special-font" >Program ID </td>
                                <td class="last-item special-font" >{{$certification->program_id}} </td>

                                <td class="left-item special-font" >Completion Date</td>
                                <td class="last-item special-font" >{{$certification->getEndDataOnly()}}</td>
                            </tr>
                        </table>
                    </div>
                    @else

                    <div class="first-card-item">
                        <table class="first-table">
                            <tr>

                                <td class="left-item font-size-14px">Program ID</td>
                                <td class="last-item font-size-6px">{{$certification->program_id}}</td>

                            </tr>
                        </table>

                    </div>

                    @endif
                @if($certification->isRigpass())
                    <div class="first-card-item">
                        <table class="first-table">
                            <tr>

                                <td class="left-item font-size-14px">Instructor Name</td>
                                <td class="last-item font-size-6px">
                                    {{$certification->instructor_name}}
                                </td>

                            </tr>
                        </table>

                    </div>

                @else
                    <div class="first-card-item">
                        <table class="first-table">
                            <tr>

                                <td class="left-item font-size-14px">Trainee Provider</td>
                                <td class="last-item font-size-6px">
                                    @if($certification->provider)
                                        {{$certification->provider}}
                                    @else
                                        None
                                    @endif

                                </td>

                            </tr>
                        </table>

                    </div>

                    @endif


               @if($certification->isRigpass())
                    <div class="first-card-item">
                        <table class="first-table">
                            <tr>

                                <td class="left-item font-size-14px">
                                    onshore <span class="shore">{!!  $certification->isOnShoreOrBoth() ? 'X' : '&nbsp;'!!}</span> offshore <span class="shore">{!!  $certification->isOffShoreOrBoth() ? 'X' : '&nbsp;'!!}</span>

                                </td>

                            </tr>
                        </table>

                    </div>
                   @else

                    <div class="date-card-item">

                        <table class="first-table" style="margin-bottom: 1px">
                            <tr>

                                <td class="left-item special-font" >Completion Date</td>
                                <td class="last-item special-font" >{{$certification->getEndDataOnly()}}</td>


                                <td class="left-item special-font" >Expiration ID</td>
                                <td class="last-item special-font" >{{$certification->getValidationDateOnly()}}</td>
                            </tr>
                        </table>
                    </div>

                   @endif
                <div class="cert-number" style="padding-top: 4px;">
                    <span class="cnumber " style="font-size: 9px">Certificate Number:</span>
                    <span class="cert-n " style="font-size: 10px">{{$certification->certification_id}}</span>
                    <span></span>
                </div>

            </div>
        </div>
    </div>

    <div class="second-card" style="page-break-before: always">
        <div class="header">
            <img src="{{$certification->getLogo(true)}}" width="50px" height="25px">
        </div>
        <div class="second-card-content">
            <table class="table_center">
                <tr>
                    <td class="first"> <p style="margin: 0;padding: 0;font-size: 8px">
                            {!! $certification->getCardParagraph() !!}
{{--                            This Individual has Successfully Completed  <br> IADC Drilling Industry Traning (Dit) Course At Institution--}}
{{--                            Accredited By The International Association Of Drilling Contractors . <br> <br>--}}

{{--                            Course Content Not Vetted By IADC As Part of DIT Accreditation <br> <br>--}}

{{--                            To Verify Validity , Please Scan The QR Code Or Contact Records@iadc.org--}}
                        </p></td>
                    <td class="second-td">
                        <img src="{{public_path('storage/'.$certification->user->image)}}" alt="" width="80" height="90" style="object-fit: contain">

                    </td>
                </tr>

            </table>

            <div class="clear"></div>
        </div>
        <table class="second-card-footer">
            <tr class="footer-tr">
                <th class="footer-td-first">
                    {!! $qrcode !!}
                </th>
                <th class="footer-td-second @if($certification->isRigpass()) red_color  @endif " style="font-size: 8px;white-space: nowrap"  >
                    Catalyzing Improved Performance For The Drilling Industry
                </th>
            </tr>
        </table>

    </div>
</div>
</body>
</html>


