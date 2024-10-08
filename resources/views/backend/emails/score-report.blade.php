<html>

<head>
    <title>Score Report </title>
    <style>


        .logo .title {
            display: inline-block;
            width: 35%;
        }

        .logo img {
            width: 200px;
            display: inline-block;


        }

        .data {
            margin: 20px;
        }

        .data h5 {
            text-align: left;
            margin: 0;

        }

        .data h5 span {
            display: inline-block;
            font-weight: normal;
            width: 30%;
        }

        .data div {
            display: inline-block;

        }

        .data div.left , .td_td{
            width: 35%;
            font-weight: bold;
        }

        .instruction .instruct-title {
            font-weight: bold;
        }

        .instruction .instruct-body {
            font-size: 14px;
        }

        .topic-to-review-title {
            margin-bottom: 10px;
        }

        .topic-to-review {
            margin-top: 10px;
            font-weight: bold;
        }

        .inside_title {
            font-weight: bold;
            padding-top: 5px;
            padding-left: 34px;
        }

        .ul_details {
            margin-left: 10px;
            margin: 0;
            font-weight: normal;
            list-style-type: circle;
            list-style-position: inside;
        }

        .li_details {
            text-decoration: underline;
            font-weight: normal;
            font-size: 14px;
        }

        .li_details2 {
            margin-left: 20px;
            list-style-type: square;
            text-decoration: none;

        }

    </style>
</head>


<body>

    <div id="someHtml" class="container ">
        <div class="logo">
            <div class="title" style="float: left">
                <h3>Score Report</h3>
            </div>
            @if(isset($download))
            <img src="{{ public_path('images/logo.png') }}" style="float: right;width:200px">
            @else
            <img src="{{ asset('images/logo.png') }}" style="float: right">

            @endif
            <div class="" style="clear: both"></div>
        </div>

        <div class="" style="clear: both"></div>
@if(! isset($download))
        <div class="data">
            <div class="left" >
                Name:<br>
                Assessment:<br>
                Stack:<br>
                Assessment Data:<br>
                Score : <br>
            </div>

            <div class="right" >
                {{ $student->Full_Name }}<br>
                {{ $certification->course->name }}<br>
                {{$student->exams()->get()->last()->stack  }} <br>
{{--                12:00 Am--}}
                {{ date_create($student->exams()->get()->last()->pivot->Finished_At)->format('M d , Y g:i A') }}
                <br>
{{--                Carbon::make($this->completed_date)->format('M d , Y g:i A')--}}
{{--                {{ $certification->getEndData() }} <br>--}}
                {{ $student->getFormattedExamPercentage() }}

            </div>
        </div>

        @else

        <table style="width:100%">
            <tbody class="tbody_tbody">
                <tr class="tr_tr">
                    <td class="td_td">Name:</td>
                    <td class="td_td2">{{ $student->Full_Name }}</td>
                </tr>
                <tr class="tr_tr">
                    <td class="td_td">Assessment:</td>
                    <td class="td_td2">{{ $certification->course->name }}</td>
                </tr>
                <tr class="tr_tr">
                    <td class="td_td">Stack:</td>
                    <td class="td_td2">{{$student->exams()->get()->last()->stack  }}</td>
                </tr>
                <tr class="tr_tr">
                    <td class="td_td">Assessment Data:</td>
                    <td class="td_td2">
                        {{ date_create($student->exams()->get()->last()->pivot->Finished_At)->format('M d , Y g:i A') }}
                    </td>
                </tr>
                <tr class="tr_tr">
                    <td class="td_td">Score :</td>
                    <td class="td_td2"> {{ $student->getFormattedExamPercentage() }}</td>
                </tr>

            </tbody>
        </table>

        @endif

        <div class="instruction" style="margin-top:20px">
            <div class="instruct-title">Instructions</div>
            <div class="instruct-body">
                Thank you for completing the IADC Well Control Knowledge Assessment for the course. You scored {{ $student->getFormattedExamPercentage() }}
                percent on this knowledge assessment and, therefore, {{ $student->PassedExam() }} the course. If you passed your skills
                assessment you will be given your Certificate of Completion by your
                instructor, who will also review your missed questions with you. <br><br>
                After your instructor reviews your exam results with you, you may choose to return to your computer
                to review each test question you missed on today's exam. To launch the review feature, login using
                the same code you used at the beginning of the exam.
                <br> <br> Once you complete your review and you have received your Certificate, you are to logout of
                the testing system and may leave the testing center.
                <br> <br> Your company will be notified of your test results and be sent a copy of your Certificate
                of Completion

            </div>
        </div>

        <div class="topic-to-review">
            <div class="instruct-title topic-to-review-title">Topics For Reviewing</div>
            @foreach($student->getCertificationTopics() as $mainTitle=>$details )



            <div class="topic-to-review-body">




                <div class="inside_title">
                    {{-- Barriers : --}}
                    {{ trim($mainTitle,':').':' }}
                </div>
                <ul class="ul_details">
                    @foreach($details as $title=>$val)

                    <li class="li_details">{{ $title }}</li>
                    <li class="li_details li_details2"> {{ $val }}
                    </li>

                    @endforeach
                </ul>
            </div>

            @endforeach

            @if($wrongAnswers && count($wrongAnswers))

            <div class="" style="margin-top: 20px;margin-bottom:20px ;page-break-before: always" >
                Missed Questions
            </div>

            <table style="border-collapse: separate;border-spacing: 0;">
                @foreach ($wrongAnswers  as  $key=>$wrongAnswer)
                <tr>
                    <td style="padding-bottom:20px">Q{{ ++$key }} : {!! $wrongAnswer['question'] !!} </td>
                </tr>
                <tr >
                    <td style="color: red; padding-bottom:20px"><u>Your Answer :</u> {!! $wrongAnswer['studentWrongAnswer'] !!}</td>
                </tr>
                <tr >
                    <td style="color: green ;border-bottom: 1px solid gray;padding-bottom:20px"><u>Correct Answer :</u> {!! $wrongAnswer['correctAnswer'] !!}</td>
                </tr>

                @endforeach

            </table>

            {{-- <table style="width:100%;border-collapse: separate;border-spacing: 20px">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Your Answer</th>
                        <th>Correct Answer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wrongAnswers  as  $key=>$wrongAnswer)
                    <tr style="border-bottom: 1px solid red ">
                            <td>{{ ++$key }}</td>
                            <td >{!! $wrongAnswer['question'] !!}</td>
                            <td >{!! $wrongAnswer['studentWrongAnswer'] !!}</td>
                            <td >{!! $wrongAnswer['correctAnswer'] !!}</td>


                    </tr>

                    @endforeach

                </tbody>
            </table> --}}



            @endif

{{--
            <div class="topic-to-review-body">
                <div class="inside_title">
                    Equipment :
                </div>
                <ul class="ul_details">
                    <li class="li_details">Diverters</li>
                    <li class="li_details li_details2">Explain the purpose of the diverter in well control operations
                        both for surface
                        and subsea
                    </li>
                </ul>
            </div>


            <div class="topic-to-review-body">
                <div class="inside_title">
                    Post Shutln Monitoring & Activities :
                </div>
                <ul class="ul_details">
                    <li class="li_details">Analysis of Shut -I n Conditions</li>
                    <li class="li_details li_details2">Explain Shut -I n Drillpipe Pressure (SIDPP) and Shut -I n Casing
                        Pressure (SI CP).</li>
                </ul>
            </div>


            <div class="topic-to-review-body">
                <div class="inside_title">
                    Pre- Recorded Data :
                </div>
                <ul class="ul_details">
                    <li class="li_details">Slow Circulat ing Rates</li>
                    <li class="li_details li_details2">Explain why an SCR is taken (for example, to calculate the
                        Initial Circulating Pressure [ICP} or Final Circulating Pressure [FCP]; to detect potential
                        leaks in the syst em) </li>
                </ul>
            </div>


            <div class="topic-to-review-body">
                <div class="inside_title">
                    Shut- I n Proced ures & Verifica tion:
                </div>
                <ul class="ul_details">
                    <li class="li_details">Blind & Blind Shear Rams</li>
                    <li class="li_details li_details2"> Explain why blind and blind/shear rams are used .</li>
                </ul>

                <ul class="ul_details">
                    <li class="li_details">Drilling</li>
                    <li class="li_details li_details2">Demonstrate how to shut -in the well (for example, surface or
                        subsea [including hang-off} the correct line-up for drilling; the hang-off capability of rams).
                    </li>
                </ul>

            </div>

            <div class="topic-to-review-body">
                <div class="inside_title">
                    Well Control Concepts:
                </div>
                <ul class="ul_details">
                    <li class="li_details">Pump Pressure</li>
                    <li class="li_details li_details2"> Explain pump pressure</li>
                </ul>
            </div>


            <div class="topic-to-review-body">
                <div class="inside_title">
                    Well Control Concepts:
                </div>
                <ul class="ul_details">
                    <li class="li_details">Principle of U-Tube</li>
                    <li class="li_details li_details2">Explain the principle of a u-tube.</li>
                </ul>
            </div> --}}


        </div>



    </div>

    {{-- @if (isset($download))
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
        <script defer>
            function getPDF() {
                var imgData;
                html2canvas($("#someHtml"), {
                    useCORS: true,
                    onrendered: function(canvas) {

                        imgData = canvas.toDataURL(
                            'image/png');
                        var doc = new jsPDF('l', 'px', [parseInt($("#someHtml").width()) - 250, parseInt($(
                            '#someHtml').height()) - 350]);
                        doc.addImage(imgData, 'PNG', 10, 10);
                        doc.save('certification.pdf');

                    }
                }).then(function() {
                    return window.location.href = "/admin/certifications";
                });

            }

            function back() {}


            getPDF();
            back();
        </script>

    @endif --}}

</body>


</html>
