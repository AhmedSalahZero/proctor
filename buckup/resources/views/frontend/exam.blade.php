<!DOCTYPE html>
<!-- saved from url=(0033)http://wellsharpin.com/site/home -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Wellsharp</title>
    <link rel="stylesheet" href="{{asset('frontend/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    <link href="{{asset('frontend/all.css')}}" rel="stylesheet">
    <link rel="icon" href="http://wellsharpin.com/assets/img/logo.png">
    <style type="text/css" id="bf765179-05fa-4725-a46c-6b4627eb1ee7">.da570a26-4e6f-4512-80f7-84d2898686d8 { position: relative !important; border-radius: 0.2em !important; padding: 0px !important; margin: 0px !important; }

        .f320477e-cc4c-4304-931d-c0245645aac4 .ssh-close { position: absolute; left: -8px; top: -8px; width: 16px; height: 16px; z-index: 999; border: none; background: url("data:image/png;base64,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") no-repeat border-box; animation-duration: 275ms; animation-timing-function: ease-out; box-shadow: none; animation-name: a39bd928-de14-41fc-b09e-218157634468; }

        .f320477e-cc4c-4304-931d-c0245645aac4 .ssh-close:hover, .f320477e-cc4c-4304-931d-c0245645aac4 .ssh-close:focus { background-image: url("data:image/png;base64,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"); }

        @media print {
            .f320477e-cc4c-4304-931d-c0245645aac4 { box-shadow: unset !important; -webkit-print-color-adjust: exact !important; }
        }

        @keyframes a39bd928-de14-41fc-b09e-218157634468 {
            0% { opacity: 0; transform: scale(0.6); }
            100% { opacity: 1; transform: scale(1); }
        }

        @keyframes a532530c-565c-4b1f-b3d8-8e7f4ce4b4f6 {
            100% { opacity: 0; transform: scale(0.3); }
        }

        .f320477e-cc4c-4304-931d-c0245645aac4 { background-color: rgba(238, 238, 238, 0.8); color: rgb(170, 170, 170); font: inherit; box-shadow: rgb(238, 238, 238) 0px 0px 0.35em; text-shadow: none !important; }

        .default-red-aa94e3d5-ab2f-4205-b74e-18ce31c7c0ce { box-shadow: rgb(255, 128, 128) 0px 0px 0.35em; background-color: rgba(255, 128, 128, 0.8) !important; color: rgb(0, 0, 0) !important; }

        .default-orange-da01945e-1964-4d27-8a6c-3331e1fe7f14 { box-shadow: rgb(255, 210, 170) 0px 0px 0.35em; background-color: rgba(255, 210, 170, 0.8) !important; color: rgb(0, 0, 0) !important; }

        .default-yellow-aaddcf5c-0e41-4f83-8a64-58c91f7c6250 { box-shadow: rgb(255, 255, 170) 0px 0px 0.35em; background-color: rgba(255, 255, 170, 0.8) !important; color: rgb(0, 0, 0) !important; }

        .default-green-c4d41e0a-e40f-4c3f-91ad-2d66481614c2 { box-shadow: rgb(170, 255, 170) 0px 0px 0.35em; background-color: rgba(170, 255, 170, 0.8) !important; color: rgb(0, 0, 0) !important; }

        .default-cyan-f88e8827-e652-4d79-a9d9-f6c8b8ec9e2b { box-shadow: rgb(170, 255, 255) 0px 0px 0.35em; background-color: rgba(170, 255, 255, 0.8) !important; color: rgb(0, 0, 0) !important; }

        .default-purple-c472dcdb-f2b8-41ab-bb1e-2fb293df172a { box-shadow: rgb(255, 170, 255) 0px 0px 0.35em; background-color: rgba(255, 170, 255, 0.8) !important; color: rgb(0, 0, 0) !important; }

        .default-grey-da7cb902-89c6-46fe-b0e7-d3b35aaf237a { box-shadow: rgb(119, 119, 119) 0px 0px 0.35em; background-color: rgba(119, 119, 119, 0.8) !important; color: rgb(255, 255, 255) !important; }</style></head>

<body id="exam_body"
    data-user_exam_id = "{{$user_exam_id}}"
      data-user_token = "{{csrf_token()}}"

    style="background: url(http://wellsharpin.com/assets/img/aaa.jpg); padding-left: 20px; padding-right: 20px; overflow: hidden;">






<div class="test-page">

    <div class="container start-exam" style=" width: 100%; border-radius: 10px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.6) 0px 0px 15px; margin-top: 10px;padding-left: 0px; padding-right: 0px;border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;">
        <div class="col-md-12" style="background-color: #ffff;border-bottom: 2px solid #AC041B !important; padding-top: 18px; padding-bottom: 18px;">
            <div class="col-md-6"><img src="{{asset('frontend/newlogo.png')}}" class="img-responsive" style="width: 325px;height: 100px;"> </div>
            <div class="col-md-3 col-md-offset-3" style="padding-left: 74px;">
                <br>						<p>
                    <b> {{ Auth('students')->user()->Full_Name }}</b>
                    <a href="{{route('front.logout')}}" style="color: black;">
                        <button style="padding-bottom: 0px; padding-top: 0px; border: none; background-color: #f1eded; border-radius: 6px;font-size: 13px; margin-bottom: 0px; "> sign out
                        </button>
                    </a>
                </p>

                <p style="margin: 0px; color:#429de2;"><i class="fas fa-plus-square"></i> Database/Program Assistance?</p>
                <p style="margin: 0px; color:#429de2;"><i class="fas fa-plus-square"></i> Proctor Assistance?</p>
            </div>
        </div>

        <div class="col-md-2" style="width: 15%;padding-right: 0px;padding-left: 0px;">
            <div class="list-group">
                <a href="{{route('confirm.info')}}" class="list-group-item " style="border-radius: 0px; background-color: #eaeaea;border-color: #00000069; border-bottom-color: #00000069; border-top-color: #00000069;color: black;"><b>1</b> Confirm Info</a>
                <a href="{{route('survey')}}" class="list-group-item " style="border-radius: 0px; background-color: #eaeaea;border-color: #00000069; border-bottom-color: #00000069; border-top-color: #00000069;background-color: #eaeaea;color: black;"><b>2</b> Survey</a>
                <a href="{{route('start.exam')}}" class="list-group-item disabled " style="border-radius: 0px; background-color: #e5241f;border-color: #00000069; border-bottom-color: #00000069; border-top-color: #00000069;color: #ffff;"><b>3</b> Start Exam</a>
            </div>
        </div>
        <div style="background-color: #ffff; width: 85%; float: right;padding-left: 20px; padding-right: 20px;">
            <div class="col-md-12" style="margin-top: 16px;     box-shadow: 11px 0px 9px 0px rgba(50, 50, 50, 0.49); border-top-right-radius: 10px; border-top-left-radius: 10px; padding-left: 0px; padding-right: 0px;     margin-bottom: 10px; ">
                <div class="col-md-12 text-center" style="background-color: #4E4D4F;font-size: 14px; font-weight: bold;color: white;padding-top: 1px; padding-bottom: 1px; border-top-right-radius: 10px; border-top-left-radius: 10px;">Course Feedback</div>
                <div class="col-md-12" style="padding-right: 0px; padding-left: 0px;">
                    <div class="sectionContent col-md-12" style="background-color: #FFF;box-shadow: 2px 1px 9px rgba(237, 237, 237, 0.42), 0px 0px 40px rgba(196, 196, 196, 0.5) inset;border-bottom: 2px solid gray; border-right: 1px solid lightgray; border-left: 1px solid lightgray; box-sizing: border-box; ">
                        <center>
                            <div style="width:90%; /*min-width:740px;*/  font-family: 'Open Sans';color: #1A1A1A;">
                                <div style="font-size: 14px;color:#1A1A1A; margin-bottom: 14px; text-align:left; padding-top:10px">
                                    <div class="col-md-8 col-md-offset-2" style="">
                                        <h1> Trainee Course feedback </h1>
                                        <p> By using IADC WellSharp Knowledge Assessment database and exams, you agree to release. indemnify, defend  and hold harmless  IADC , Its officers , employees and volunteers, against any and claims or causes of action you may have arising out of or in connection with your use of the testing database , exams or other use of the WellSharp Knowledge Assessment. </p>
                                    </div>
                                </div>
                            </div>

                        </center>
                    </div>


                </div>

            </div>

            <div class="col-md-12" style="margin-top: 16px;     box-shadow: 11px 0px 9px 0px rgba(50, 50, 50, 0.49); border-top-right-radius: 10px; border-top-left-radius: 10px; padding-left: 0px; padding-right: 0px;   margin-bottom: 10px; ">
                <div class="col-md-12 text-center" style="background-color: #4E4D4F;font-size: 14px; font-weight: bold;color: white;padding-top: 1px; padding-bottom: 1px; border-top-right-radius: 10px; border-top-left-radius: 10px;"> Survey Questions</div>
                <div class="col-md-12" style="padding-right: 0px; padding-left: 0px;">
                    <div class="sectionContent col-md-12" style="background-color: #FFF;box-shadow: 2px 1px 9px rgba(237, 237, 237, 0.42), 0px 0px 40px rgba(196, 196, 196, 0.5) inset;border-bottom: 2px solid gray; border-right: 1px solid lightgray; border-left: 1px solid lightgray; box-sizing: border-box;">
                        <center>
                            <div style="width:90%; /*min-width:740px;*/ font-family: 'Open Sans';color: #1A1A1A;">
                                <div style="font-size: 14px;color:#1A1A1A; margin-bottom: 14px; text-align:left; padding-top:10px">
                                    <table id="questions-table" class="table table-striped table-bordered" data-number-of-questions="{{$questions->count()}}">
                                        <tbody>

                                        @foreach($questions as $question)

                                         <tr><td>{{$question->Question}}</td>
                                            <td>
                                                <select>
                                                    @foreach($question->answers as $answer)
                                                    <option 
                                                     

                                                    
                                                    >{!! $answer->Answer !!}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                          
                                       

                                         @endforeach







                                        </tbody></table>
                                </div>
                            </div>

                        </center>
                        <div class="clearfix"></div>
                        <!-- <div class="col-md-2 col-md-offset-6"> -->
                        <a href="{{route('start.exam')}}" class="col-md-2 col-md-offset-5">
                            <div id="startExamBtn" class="col-md-offset-3" style="font-size:15px; margin-top:0px; /*margin-left:15px;*/ margin-bottom:15px;background-color:green;padding: 4px 8px; font-weight: 600; border-radius: 7px; display: inline-block; color: white; cursor: pointer;">Proceed</div>
                        </a>


                    </div>


                </div>

            </div>

        </div>





        <!-- <h1 class="colored main-title">Welcome</h1>
        <p>Please select the Start Exam button below to begin.</p>
        <a href="http://wellsharpin.com/site/home/startExam" class="btn btn-info blue">Start Exam</a> -->
    </div>
    <div class="col-md-12" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;border-top: 1px solid #1A1A1A; margin-top: 0em; padding: 3pt; background-color: #D9D9D9; background: linear-gradient(#A8A8A8, #D9D9D9);margin-bottom: 15px;">
        <div class="col-md-10">
            <div class="col-md-12">
                <a href="http://wellsharpin.com/site/support.php" target="_blank" class="newHREF">Technical Support</a>
            </div>
            <div class="col-md-12">SkillSTICK® (USB)  | Version 2.2.1 | © 2017 Indaptive Technologies Inc.</div>
        </div>
        <div class="col-md-2">
            <img src="{{asset('frontend/footer_logo.png')}}">
        </div>
    </div>
</div>
<form onsubmit="return confirm1();" action="{{route('front.logout')}}"

{{--      method="post"--}}
method="GET"
>
    <div class="col-md-12 " style="background:rgba(0, 0, 0, 0.57); height:1206px; position: absolute; top: 0px; z-index: 999;">

        <div class="col-md-8 col-md-offset-2" style=" height: 800px; top: 50px; padding:0px;">
            <div class="" style="width: 100%; border-radius: 12px;height: 103px;  background-color: rgb(236, 236, 236);border-bottom: 2px solid #9e9e9e">
                <img class="col-md-3" src="{{asset('frontend/newlogo.png')}}" style=" width: 255px; margin-left: 25px; margin-top: 24px; ">
                <div class="col-md-6  text-right" style="padding-left: 123px; float: right;direction: rtl;">
                    <style>
                        p.surve{width: 155px;
                            margin-top: 8px;
                            direction: rtl;}
                        b.time{font-size: 10px;}
                    </style>

                    <p class="surve" style="margin-bottom: 0px;">
                        <b class="control"> {{Auth('students')->user()->Full_Name}} </b> <br>
                        <!-- <b class="time time-remaning on" data-alert=""> 03:30:00 Remaining (0/61 Answered) </b>  -->
                    </p><div class="time-remaning on" data-alert="" style="direction: ltr;"> <span id="rem_time">
                            {{$remaining_time}}
{{--                        00:00:05--}}
                        </span> <b>Remaining (<span class="answered_num">
                            {{ getTotalAnsweredQuestion($user_exam_id) }}                            
                            {{-- 0 --}}






                            
                            </span>/{{$questions->count()}} Answered)</b></div>
                    <p></p>
                    <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Launch demo modal
                    </button> -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="startExamBtn" style=" margin-top:0px; /*margin-left:15px;*/ margin-bottom:15px;background-color:green;padding: 4px 8px;width: 112px; font-weight: 600; border-radius: 7px; display: inline-block; color: white; cursor: pointer;">
                        Submit Exam
                    </button>
                    <!-- <button type="submit" name="finish" id="startExamBtn" class="col-md-offset-3" style=" margin-top:0px; /*margin-left:15px;*/ margin-bottom:15px;background-color:green;padding: 4px 8px;width: 112px; font-weight: 600; border-radius: 7px; display: inline-block; color: white; cursor: pointer;">
                        Submit Exam
                    </button> -->
                    <!-- <a href="javascript:void(0);" onclick="confirm1()" class="col-md-offset-3" style="margin-top:0px; /*margin-left:15px;*/ margin-bottom:15px;background-color:green;padding: 4px 8px;width: 112px; font-weight: 600; border-radius: 7px; display: inline-block; color: white; cursor: pointer;">
                        Submit Exam
                    </a> -->


                </div>

            </div>
            <div class="clearfix"></div>
            <div style=" background-color: #ffff;     height: 517px; overflow-y:scroll; margin-left: 7px;  margin-right: 7px; ">

                <div class="container working-test" style="width: 100%;" data-question="" data-type="" data-num="">
                    @foreach($questions as $key=>$question)
                    <div class="question-text" style="border:0px;">
                        <h3 style="font-size: 19px;">{{$key+1}}) {!! $question->Question !!}</h3>
                        <div class="answer-points"><span>{{$question->Degree}}</span> Point(s)</div>
                        <div class="answers-holder" style="font-size: 12px;">
                        {{-- @dd($exam->getRemainingTime()) --}}
                            @foreach($question->answers as $Answer)
                            <label>
                                <input class="{{$question->ID}}" data-answernum="0" onclick="save_answer( '{{Request()->root().'/'}}','{{$exam->id}}','{{$question->ID}}','{{$Answer->ID}}')" type="radio" name="answer[{{$question->ID}}][]" value="{{$answer->ID}}" 
                                
                                 @foreach (getCurrentAnsweredQuestion($user_exam_id) as $userAnswer)
                                                        @if($userAnswer->Answer == $Answer->ID)
                                                            checked 
                                                        @endif 
                                                        @endforeach
                                
                                > 
                                {{-- Wellbore pressures, rig-up height, and length of string 												</label> --}}
                                
                                {!! $Answer->Answer !!}
                                
                                
                                @endforeach
                        </div>
                    </div>
                 @endforeach
                    <div class="form-group">
                        <input type="hidden" name="finish" value="1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="startExamBtn" style=" margin-top:0px; /*margin-left:15px;*/ margin-bottom:15px;background-color:green;padding: 4px 8px;width: 112px; font-weight: 600; border-radius: 7px; display: inline-block; color: white; cursor: pointer;">
                            Submit Exam
                        </button>

                        <!-- <button class="btn btn-info blue " type="submit" name="finish">Finish Exam</button> -->
                    </div>

                    <!-- <button class="btn btn-danger finish"><span class="glyphicon glyphicon-ok"></span> Finish Assessment</button> -->
                </div>
                <!-- Modal -->


            </div>
        </div>
        <style>
            .modal-backdrop.in {
                opacity: 0;
                z-index: 1;
            }
        </style>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="margin-right: 557px;">

                <div class="modal-content" style="text-align: center; width: 980px; border-radius: 10px;">

                    <div class="modal-header" style="background-color: #4694d7; height: 53px;border-radius: 7px;">
                        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-weight: bold; font-size: 20px;
    							color: #fff;">Confirm Submission</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="    border: solid 2px;
								 border-radius: 50% ; padding: 7px;  margin-top: -63px; margin-right: -30px;width:42px;color: #ece9e9;
								  background-color: #4e4747" ;="">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <br>
                    <h7 style="font-size: 18px; font-weight: bold;margin-left: 28px;">	Are you sure you would like to submit your exam for grading ? </h7> <br>
                    <h8 style="font-size: 15px; font-weight:bold;opacity:0 "> <span class="answered_num" style="opacity: 0">0</span>/{{$questions->count()}} Questions Answered </h8>	 <br><br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #f5f5f5; color: #a9a9ba;font-weight: bold;">Close</button>
                    <button type="submit" name="finish" id="startExamBtn" class="col-md-offset-3 exam_finished_btn" style=" margin-top:0px; margin-left:15px; margin-bottom:15px;background-color:green;padding: 5px 8px;width: 112px; font-weight: 600; border-radius: 5px; display: inline-block; color: white; cursor: pointer; height: 36px;">
                        Submit Exam
                    </button>



                </div>
            </div>
        </div>







        <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h1>Warning</h1>
                        <div class="cont">

                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <script>var BASE='{{Request()->root()}}/';</script>

        <script src="{{asset('frontend/jquery.min.js')}}"></script>
        <script src="{{asset('frontend/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/main.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {

                $('.answered_num').html({{ getTotalAnsweredQuestion($user_exam_id) }});

            });

            function confirm1(){
                // confirm('are you ready?');
                var loader = '<p class="text-center"><img src="'+base_url+'assets_admin/images/ajax-loader-4.gif" /></p>';
                $('#popup-doctorModal .modal-doctorbody').html(loader);
                $('#popup-doctorModal').modal({show:true});
            }

            function save_answer(base_url,test_id,question_id,answer_id) {
                var current_minutes = $("#rem_time").html();
                var number_of_questions = parseInt($('#questions-table').data('number-of-questions')) ;



                 var remaining_minutes=current_minutes;
            //    console.log('x')
                $.ajax({
                    type: "POST",
                    url: base_url+'save_answer',
                    data: {'test_id':test_id,'question_id':question_id,'answer_id':answer_id,'remaining_minutes':remaining_minutes , "_token":"{{csrf_token()}}" },
                    cache: false,
                    success: function(result)
                    {
                        // alert(77);
                        // alert(Number($('.answered_num').html())+1);
                        // alert($("."+question_id).data("answernum"));
                        // $(".answer_id").attr("data-answernum");
                        if ( number_of_questions >= Number($('.answered_num').html())+1) {
                            if ($("."+question_id).data("answernum")<1) {
                                $('.answered_num').html(Number($('.answered_num').html())+1);
                                $("."+question_id).data("answernum","1");
                            }

                        }else{

                        }


                        //alert(result);
                        //rating function calling

                    }
                });
            }


        </script>

        <script>
            document.getElementsByClassName('exam_finished_btn')[0].addEventListener('click',function(event){
                event.preventDefault();

                let user_exam_id = document.getElementById('exam_body').getAttribute('data-user_exam_id');
                let token = document.getElementById('exam_body').getAttribute('data-user_token');


                $.ajax({
                    type: 'post',
                    url: "/finish_exam/"+user_exam_id,
                    data: {
                        '_token':token,
                        // 'no_answered_questions':$('.answered_num').html(Number($('.answered_num').html()))
                    },
                    success: function (data) {
                        if(data.status)
                        {
                            window.location=BASE+'result' ;
                        }
                    }, error: function (reject) {
                    }
                });
            });
        </script>


    </div></form></body></html>
