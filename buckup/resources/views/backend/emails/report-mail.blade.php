{{-- <html>
<head>
    <title>Score Report </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <style>
    .container
    {
        width: 790px;

    }
    .logo
    {
        margin: 0 20px;
    }
    .logo .title
    {
        display: inline-block;
        width: 35%;
    }
    .logo img
    {
        width: 200px;
        display: inline-block;
    }
    .data
    {
        margin: 20px;
    }
    .data h5
    {
        text-align: left;
        margin: 0;

    }
    .data h5 span
    {
        display: inline-block;
        font-weight: normal;
        width: 30%;
    }
    .data > div
    {
        display: inline-block;

    }
    .data > div.left
    {
        width: 35%;
        font-weight: bold;


    }
    .instruction .instruct-title
    {
        font-weight: bold;
    }
    .instruction .instruct-body
    {
        font-size: 14px;
    }
    .topic-to-review-title
    {
        margin-bottom: 10px;
    }
    .topic-to-review
    {
        margin-top: 10px;
        font-weight: bold;
    }
    .inside_title
    {
        font-weight: bold;
        padding-top: 5px;
        padding-left: 34px;
    }
    .ul_details
    {
        margin-left: 10px;
        margin: 0;
        font-weight: normal;
        list-style-type: circle;
        list-style-position: inside;
    }
    .li_details
    {
        text-decoration: underline;
        font-weight: normal;
        font-size: 14px;
    }
    .li_details2
    {
        margin-left: 20px;
        list-style-type: square;
        text-decoration: none;

    }
</style>


</head>


<body>

<div id="someHtml" class="container " >
    <div class="logo">
        <div class="title">
            <h3>Score Report</h3>
        </div>
            <img src="https://iadc.wellsharp.org/images/iadcLogoHeader.png" alt="logo" >
    </div>

    <div class="data">
        <div class="left">
            Name:<br>
            Assessment:<br>
            Stack:<br>
            Assessment Data:<br>
            Score : <br>
        </div>

        <div class="right">
            {{$student->User_Name}}<br>
            {{$certification->course->name}}<br>
            {{$certification->course->stack}} <br>
            {{$certification->getEndData()}} <br>
            {{$certification->score() == 0 ? 0 : $certification->score() . ' %'}}

        </div>
    </div>

    <div class="instruction">
        <div class="instruct-title">Instructions</div>
        <div class="instruct-body">
            Thank you for completing t he ! ADC Well Contro l Knowledge Assessment for t he course. You scored 85 percent on this knowledge assessment and, therefore, passed the course. If you passed your skills assessment you will be given your Cert ifi cate of Complet ion by your
            instruct or, who will also review your missed quest ions wit h you. <br><br>
            Aft er your instruct or reviews your exam results with you, you may choose to ret urn to your computer to review each t est quest ion you missed on t oday's  exam. To launch t he review feat ure, log in using the same code you used at t he beginning of t he exam.
            <br>  <br> Once you complete your review and you have received your Cert ifi cat e, you are to log out of the test ing system and may leave t he testing center.
            <br> <br> Your company will be not ifi ed of your test result s and be sent a copy of your Cert ifi cate of Complet ion

        </div>
    </div>

    <div class="topic-to-review">
        <div class="instruct-title topic-to-review-title">Topics For Reviewing</div>
        <div class="topic-to-review-body">
            <div class="inside_title">
                Barriers :
            </div>
            <ul class="ul_details">
                <li class="li_details">Barriers</li>
                <li class="li_details li_details2"> Explain positive pressure and negative pressure barrier t ests .</li>
            </ul>
        </div>


        <div class="topic-to-review-body">
            <div class="inside_title">
                Equipment :
            </div>
            <ul class="ul_details">
                <li class="li_details">Diverters</li>
                <li class="li_details li_details2">Explain the purpose of the diverter in well control operations both for surface
                    and subsea
                </li>
            </ul>
        </div>


        <div class="topic-to-review-body">
            <div class="inside_title">
                Post Shutl n Monitoring & Activities :
            </div>
            <ul class="ul_details">
                <li class="li_details">Analysis of Shut -I n Condit ions</li>
                <li class="li_details li_details2">Explain Shut -I n Drillpipe Pressure (SIDPP) and Shut -I n Casing Pressure (SI CP).</li>
            </ul>
        </div>


        <div class="topic-to-review-body">
            <div class="inside_title">
                Pre- Recorded Data :
            </div>
            <ul class="ul_details">
                <li class="li_details">Slow Circulat ing Rates</li>
                <li class="li_details li_details2">Explain why an SCR is taken (for example, to calculate the Initial Circulating Pressure [ICP} or Final Circulating Pressure [FCP]; to detect potential leaks in the syst em) </li>
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
                <li class="li_details li_details2">Demonstrate how to shut -in the well (for example, surface or subsea [including hang-off} the correct line-up for drilling; the hang-off capability of rams).</li>
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
        </div>


    </div>



</div>


</body>


</html> --}}
