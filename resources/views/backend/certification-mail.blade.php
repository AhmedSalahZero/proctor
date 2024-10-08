<!DOCTYPE html>
<html>
<head>
    <title></title>

{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">--}}

    <style type="text/css">
        body{margin: 0px; width: 100%;}
        #advanced_certification_pg{ text-align: center; font-family: 'Cairo', sans-serif; }
        #advanced_certification{ width:1019px; margin: auto; }
        #advanced_certification_content{border-right:  solid 14px #808184;border-left:  solid 14px #808184;border-bottom:  solid 14px #808184; margin-top: -10px; padding: 0 120px 20px 120px;  }
        .advanced_item{ margin-bottom: 20px; text-align: left; }
        hr{ padding: 0px; margin: 0px;   }
        .center{ text-align: center; }
        .gray{ color: #808184; }
        .col50{ width: 45%; margin-right: 5%; float: left; }
        .clear{ clear: both; width: 100%; }
        .advanced_title{ font-weight: bold; font-size: 18px; }
        .floatleft { float: left; }
        #cerID{ float: right;  }
        #qr_section{ margin-top: 70px; }

        #footer{ margin-top: 50px; background: #eaebed; width:750px; margin: auto; margin-top: 100px;  }
        .footer_lt { float: left; font-size: 12px; text-align: left; width: 50%; border-right: dashed #7b7a77  2px;      }
        #footer_logo{ background: #fff; width: 100%; float: right; }
        #footer_qr{margin: 50px 10px;}
        .footer_lt_text{ float: left; line-height: 20px; padding: 0 20px; font-size: 10px; }
        .whiteSpace{ height: 50px; background: #fff;  }
        #redTitle{ background: #d1102b; color: #fff; text-align: center; padding: 10pxx; }
        #footer_rt{ width: 49.5%; float: right; text-align: left; font-size: 10px; }
        #footer_rt .col50{ width: 49%; margin-right: 1%; float: left;  }
        .rightItem{border-bottom: solid 1px #ccc;}
        .rightItem b{ padding: 10px;}
        .rightItem span{  width: 100%; font-size: 12px;  }
    </style>
</head>
<body>
<div id="advanced_certification_pg">
    <div id="advanced_certification">
{{--        <img src="{{asset('images/header.png')}}" />--}}
        <div id="advanced_certification_content">

            <div class="advanced_item center">
                <span class="advanced_title">{{$student->getFullName()}}</span>
                <hr>
                <span class="gray">Trainee Name</span>
            </div>


            <div class="advanced_item">
                <span class="advanced_title">{{$certification->course->name}}</span>
                <hr>
                <span class="gray">Course Name</span>
            </div>


            <div class="advanced_item ">
                <span class="advanced_title">{{$certification->supplement}}</span>
                <hr>
                <span class="gray">Supplement Name</span>
            </div>


            <div class="advanced_item col50">
                <span class="advanced_title">{{$certification->getEndDataOnly()}}</span>
                <hr>
                <span class="gray">Completion Date</span>
            </div>

            <div class="advanced_item col50">
                <span class="advanced_title">{{$certification->getValidationDateOnly()}}</span>
                <hr>
                <span class="gray">Expiration Date</span>
            </div>

            <div class="advanced_item col50">
                <span class="advanced_title">{{$certification->provider}}</span>
                <hr>
                <span class="gray">Training Provider</span>
            </div>


            <div class="advanced_item col50">
                <span class="">{{$certification->provider_number}}</span>
                <hr>
                <span class="gray">ID Number</span>
            </div>

            <div class="clear"></div>

            <div class="advanced_item col50">
                <span class="advanced_title">{{$certification->telephone_number}}</span>
                <hr>
                <span class="gray">Telephone Number</span>
            </div>

            <div class="clear"></div>


            <div class="advanced_item col50">
                <span class="advanced_title">{{$certification->instructor_name}}</span>
                <hr>
                <span class="gray">Instructor Name</span>
            </div>

            <div class="clear"></div>

            <div id="qr_section">
                <img src="{{asset('images/qr.png')}}" class="floatleft">
                <div id="cerID">
                    <div><span class="gray"> Certification Number</span> : {{$certification->certification_id}} </div>
                </div>
            </div>
            <div class="clear"></div>


        </div>
    </div>


    <div id="footer">
        <div class="footer_lt">
            <div class="whiteSpace"></div>
            <div id="footer_logo">
                <img src="{{asset('images/iadc.png')}}">
            </div>
            <div class="clear"></div>
            <div class="footer_lt_text">
                This indivual has sucessfully completed a well <br> control course at and institution accredited by the <br> international Association of Drilling Contractors<br> <br> For Scheduling training or replacement of lost <br> card,please call training provider with<br> information provided on this completion card <br><br> To verify validity, please visit the IADC website:<br>
                <center>wellsharpin.com</center>
            </div>
            <img src="{{asset('images/qr.png')}}" id="footer_qr">
        </div>




        <div id="footer_rt">
            <div class="whiteSpace"></div>
            <div id="footer_rt_inner">
                <div id="redTitle">IADC Wellsharp Course Completion Card</div>
                <div class="clear"></div>

                <div class="rightItem">
                    <b>Trainee Name</b>
                    <span> {{$student->getFullName()}}</span>
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
                </div>



                <div class="rightItem col50">
                    <b>Phone</b>
                    <span> {{$certification->telephone_number}}</span>
                </div>

                <div class="clear"></div>

                <div class="rightItem">
                    <b>Instructor Name</b>
                    <span>{{$certification->instructor_name}}</span>
                </div>


                <div class="clear"></div>

                <div class="rightItem rightCert">
                    <b>Certification Number : </b>
                    <span>{{$certification->certification_id}}</span>
                </div>



            </div>
        </div>

        <div class="clear"></div>
    </div>
    <div class="clear"></div>

</div>
</body>
</html>

