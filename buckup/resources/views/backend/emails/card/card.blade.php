<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
{{--    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">--}}

    <style >
        body{margin: 0px; width: 100%;}
  *
        {
            font-family:  sans-serif;
            box-sizing: border-box;
        }
        body
        {
            background-color: #808286;
        }
        .card
        {
            margin:0 auto;
            width: 1050px;
            background-color:#CD152D;
            padding: 1%;
            height: 600px;
            padding-top: 0;
            padding-bottom: 0;
        }
        .card-header
        {
            margin-left:3%;
        }

        .card-header-title
        {
            color:#fff;
            font-size: .8rem;
            letter-spacing:1.4px;
            margin: 0;
            height: 111px;
            line-height: 111px;
            font-weight:800 ; 
            
        }
        .card-content
        {
            background-color:white;
            border-radius:6px;
            padding:2%;
            height: 470px;
        }
        .trainne-row
        {
            display:flex;
            align-items:center;
            margin-bottom: 50px;
        }
        .traniee-r1
        {
            font-size: 0.9rem;
            margin-right:1%;
        }
        .traniee-r2
        {
            flex:1;
            border-bottom:1px solid black;
            font-size: 0.9rem;
            font-weight:500;
        }
        .traniee-content
        {
            display:flex;

        }
        .traniee-r2
        {
            flex:1;
        }
        .multi-column
        {
            display:flex ;

        }
        .tranniee-multi-content
        {
            flex:1;

        }
        .remove-border > .traniee-r2
        {
            border:none;

        }
        .red_color
        {
            color: #CF152B;
        }
        .gap
        {
            height: 10px;
            width:100% !important;
        }
        .second-card
        {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* background-color: red; */
            margin: 0 auto;
            /* box-shadow: 0 0 5px; */
            border: 1px solid white;
            width: 1050px;
            height: 600px;

        }
        .second-container
        {
            width: 86%;
            margin:0 auto;
        }
        .second-card-logo
        {
            margin-right: auto;
            background: white;
            width: 100%;
            padding: 10px 0 0 0;
            height: 165px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }
        .second-card-content
        {
            display: flex;
            background: #808286;
            color: white;
            width: 100%;
            height: 285px;
        }
        .second-card-content p
        {
            flex: 1;
            font-size: 1.2rem;
            color: #fff;
            opacity: 0.9;
            height: 60%;
            line-height: 1.5rem;
            align-self: stretch;
        }
        .second-card-content  img
        {
            width: 100px;
            height: 90%;
            /* object-fit: contain; */
        }
        .flex-container
        {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        img
        {
            max-width: 100%;
            height: 71px;
        }
        .second-card-footer
        {

            display: flex;

            /* padding: 1rem; */

            background: white;

            width: 100%;

            justify-content: space-around;

            align-items: center;

            padding-left: 0;

            padding-right: 0;

            height: 155px;
        }
        .second-card-footer-content
        {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .second-card-footer .barcode
        {

            width: 150px !important;

            height: 130px !important;
        }
        .second-card-footer  p
        {

            margin: 0;

            font-size: 1.2rem;
        }
        .second-container img
        {
            height: 100px;
            width: 250px;
        }
        .main-content-img
        {
            width: 270px !important;
            height: 250px !important;
        }

        @media (max-width:480px)
        {
            .card
            {
                width: 500px;

            }
            .second-card
            {
                width: 500px;
            }
            .main-content-img
            {
                width: 120px !important;
                height: 150px !important;

            }
            .second-card-content
            {
                height: auto;

            }
            .second-container img
            {
                height: 50px;
                width: 150px;
            }
            .second-card-footer .barcode
            {
                width: 75px !important;
                height: 70px !important;
            }
            .second-card-footer p
            {
                font-size: 0.7rem;
            }
            .barcode svg
            {
                height: 100% !important;
                width: 100% !important;
            }

        }
        .on_shore
        {
            display: inline-block;
            height: 25px;
            width: 25px;
            border: 2px solid black;
            vertical-align: middle;
            font-size: 30px;
            text-align: center;
            line-height: 25px;
            margin-right: 5px;
        }




    </style>
</head>
<body>

<div class="card">
    <div class="card-container">
        <div class="card-header">
            <h2 class="card-header-title"> {!! $certification->getCardTitle() !!} </h2>
        </div>
        <div class="card-content">
            <div class="trainne-row">
                <span class="traniee-r1">Trainee Name</span>
                <span class="traniee-r2">
                    {{$certification->user->Full_Name}}
                </span>
            </div>

            @if($certification->isRigpass())
                <div class="trainne-row">
                    <span class="traniee-r1">Provider</span>
                    <span  class="traniee-r2">
                   @if($certification->provider)
                            {{$certification->provider}}
                        @else
                            None
                        @endif
                </span>
                </div>

                @else

                <div class="trainne-row">
                    <span class="traniee-r1">Course Name</span>
                    <span  class="traniee-r2">
                    {{$certification->course->name}}
                </span>
                </div>
                @endif

           @if($certification->isRigpass())
                <div class="trainne-row multi-column">
                    <div class="traniee-content tranniee-multi-content">
                        <span class="traniee-r1">Program ID </span>
                        <span  class="traniee-r2">{{$certification->program_id}} </span>
                    </div>

                    <div class="traniee-content tranniee-multi-content">
                        <span class="traniee-r1 ">Completion Date</span>
                        <span  class="traniee-r2">{{$certification->getEndDataOnly()}} </span>
                    </div>
                </div>
               @else

                <div class="trainne-row">
                    <span class="traniee-r1">Program Id</span>
                    <span  class="traniee-r2">{{$certification->program_id}}</span>
                </div>



            @endif


@if($certification->isRigpass())
                <div class="trainne-row">
                    <span class="traniee-r1">Instructor Name</span>
                    <span class="traniee-r2">
                        {{$certification->instructor_name}}
                </span>
                </div>
    @else
                <div class="trainne-row">
                    <span class="traniee-r1">Trainee Provider</span>
                    <span  class="traniee-r2">
                     @if($certification->provider)
                            {{$certification->provider}}
                        @else
                            None
                        @endif
                </span>
                </div>


            @endif

                @if($certification->isRigpass())
<div class="trainne-row">
    onshore <span class="on_shore">{{$certification->isOnShoreOrBoth() ? '×' : ''}}</span>
    offshore <span class="on_shore">{{$certification->isOffShoreOrBoth() ? '×' : ''}}</span>
</div>

                    @else

                <div class="trainne-row multi-column">
                    <div class="traniee-content tranniee-multi-content">
                        <span class="traniee-r1">Completion Date</span>
                        <span  class="traniee-r2">{{$certification->getEndDataOnly()}} </span>
                    </div>

                    <div class="traniee-content tranniee-multi-content">
                        <span class="traniee-r1 ">Expiration Date</span>
                        <span  class="traniee-r2">{{$certification->getValidationDateOnly()}} </span>
                    </div>


                </div>

            @endif


            <div class="trainne-row remove-border">
                <span class="traniee-r1">Certificate Number</span>
                <span  class="traniee-r2">{{$certification->certification_id}}</span>
            </div>


        </div>
    </div>
</div>
@if(! isset($public_path))
<div class="gap" ></div>
@endif
<div class="second-card" style="page-break-before: always;">
    <div class="second-card-logo">
        <div class="second-container">
            @if(isset($public_path))
            <img src="{{$certification->getLogo(true)}}" class="lgoo-img">
                @else
                <img src="{{$certification->getLogo()}}" class="lgoo-img">
            @endif
        </div>
    </div>
    <div class="second-card-content">
        <div class="second-container flex-container">
            <p>
              {!! $certification->getCardParagraph() !!}
            </p>
            @if(isset($public_path))
            <img class="main-content-img" src="{{public_path('storage/'.$certification->user->image)}}">
                @else
                <img class="main-content-img" src="{{asset('storage/'.$certification->user->image)}}">
            @endif
        </div>
    </div>

    <div class="second-card-footer">
        <div class="second-container second-card-footer-content">
            <div class="barcode" >
                {!! $qrcode !!}
            </div>
            {{--            <img src="{{asset('frontend/new/images/barcode.png')}}" class="barcode">--}}

            <p class="   @if($certification->isRigpass()) red_color  @endif"> Catalyzing Improved Performance For The Drilling Industry </p>
        </div>

    </div>

</div>


</body>
</html>

