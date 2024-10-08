<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Title </title>

    <style >
        @font-face {
            font-family: 'ArialMT Regular';
            font-style: normal;
            font-weight: normal;
            src: local('ArialMT Regular'), url({{asset('storage/fonts/arialmt.woff')}}) format('woff');
        }
        *
        {
            font-family:'ArialMT Regular','sans-serif';
            box-sizing: border-box;
        }
        body
        {
            background-color: #808286;
        }
        .card
        {
            margin:0 auto;
            background-color:#CD152D;
            padding: 1%;
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
            /*line-height: 111px;*/
        }
        .card-content
        {
            background-color:white;
            border-radius:6px;
            padding:2%;
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
        .gap
        {
            width:100% !important;
        }
        .second-card
        {
            /* display: flex; */
            /* flex-direction: column; */
            /* align-items: center; */
            /* background-color: red; */
            margin: 0 auto;
            /* box-shadow: 0 0 5px; */
            border: 1px solid white;
        }
        .second-container
        {
            margin:0 auto;
        }
        .second-card-logo
        {
            margin-right: auto;
            background: white;
            width: 100%;
            padding: 10px 0 0 0;
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: flex-end; */
        }
        .second-card-content
        {
            /* display: flex; */
            background: #808286;
            color: white;
            width: 100%;
        }
        .second-card-content p
        {
            font-size: 1.2rem;
            color: #fff;
            opacity: 0.9;
            display: inline-block;
            /* width: 55%; */
            text-align: left;
        }
        .second-card-content  img
        {
            width: 100px;
            /* object-fit: contain; */
        }
        .flex-container
        {
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
            display: block;
            width: 100%;
        }
        img
        {
            max-width: 100%;
        }
        .second-card-footer
        {/* display: flex; *//* padding: 1rem; */background: white;/* width: 100%; */justify-content: space-around;align-items: center;padding-left: 0;padding-right: 0;}
        .second-card-footer-content
        {
            /* display: flex; */
            /* justify-content: space-between; */
            align-items: center;
        }

        .second-card-footer .barcode
        {width: 150px !important;display: inline-block;width: 19% !important;}
        .second-card-footer  p
        {margin: 0;font-size: 1.2rem;display: inline-block;width: 80%;text-align: center;}
        .second-container img
        {
            width: 250px;
        }
        .main-content-img
        {
            width: 10% !important;
            display: inline-block;
            text-align: right;
        }


    </style>
</head>
<body>

<div class="card">
    <div class="card-container">
        <div class="card-header">
            <h2 class="card-header-title"> IADC Drilling Industry Traning (Dit) Completing Card </h2>
        </div>
        <div class="card-content">
            <div class="trainne-row">
                <span class="traniee-r1">Traniee Name</span>
                <span class="traniee-r2">
                    {{$certification->user->Full_Name}}
                </span>
            </div>

            <div class="trainne-row">
                <span class="traniee-r1">Course Name</span>
                <span  class="traniee-r2">
                    {{$certification->course->name}}
                </span>
            </div>

            <div class="trainne-row">
                <span class="traniee-r1">Traniee Provider</span>
                <span  class="traniee-r2">
                     @if($certification->provider)
                        {{$certification->provider}}
                    @else
                        None
                    @endif
                </span>
            </div>

            <div class="trainne-row">
                <span class="traniee-r1">Program Id</span>
                <span  class="traniee-r2">{{$certification->program_id}}</span>
            </div>

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

            <div class="trainne-row remove-border">
                <span class="traniee-r1">Certificate Number</span>
                <span  class="traniee-r2">{{$certification->certification_id}}</span>
            </div>


        </div>
    </div>
</div>


<div class="second-card" style="page-break-before: always;overflow: hidden">
    <div class="second-card-logo">
        <div class="second-container">
            @if(isset($public_path))
                <img src="{{public_path('frontend/new/images/iadc_log.png')}}" class="lgoo-img" width="100px" height="100px">
            @else
                <img src="{{asset('frontend/new/images/iadc_log.png')}}" class="lgoo-img"  width="100px" height="100px">

            @endif
        </div>
    </div>
    <div class="second-card-content">
        <div class="second-container flex-container">
            <p>
                This Individual has Successfully Completed  <br> IADC Drilling Industry Traning (Dit) Course At Institution
                Accredited By The International Association Of Drilling Contractors . <br> <br>

                Course Content Not Vetted By IADC As Part of DIT Accreditation <br> <br>

                To Verify Validity , Please Scan The QR Code Or Contact Records@iadc.org
            </p>
            @if(isset($public_path))
                <img class="main-content-img" src="{{public_path('frontend/new/images/user.jpg')}}"  width="100px" height="100px">
            @else
                <img class="main-content-img" src="{{asset('frontend/new/images/user.jpg')}}"  width="100px" height="100px">

            @endif
        </div>
    </div>

    <div class="second-card-footer">
        <div class="second-container second-card-footer-content">
            <div class="barcode" >
                {!! $qrcode !!}
            </div>
            {{--            <img src="{{asset('frontend/new/images/barcode.png')}}" class="barcode">--}}
            <p > Catalizing Imporvide Performance For The Dirling Industry </p>
        </div>

    </div>

</div>

</body>
</html>

