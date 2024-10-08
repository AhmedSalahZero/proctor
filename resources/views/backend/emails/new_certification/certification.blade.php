
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@300&display=swap" rel="stylesheet">

<style>
body{
    background: transparent;
}
    #certification{
         width: 1000px; height:707;
        @if(isset($download))
        background:  url("{{public_path('certifications/new/images/back.png')}}");
       @else
               background-image: url("{{asset('certifications/new/images/back.png')}}");

        @endif
        background-repeat: no-repeat;
        background-size: contain;
        margin:auto;
        font-family: source-serif-pro, serif; font-style: normal; font-weight: 200;padding: 1px}
         #certContentt{

        background-size:cover;
         }
    #certContentt{ margin-top: 130px; float: left; width: 100%; text-align: center;  }
    h1,h2{ margin: 0 0 20px 0; padding: 0; }
    #certContentt h1{ font-family: 'Source Serif Pro', serif; font-size: 35px;  text-transform: uppercase; font-weight: normal}
    #certContentt h2{font-family: 'Source Serif Pro', serif; font-size: 25px;font-weight: normal  }
    #certContentLt,#certContentRt{ width: 19%; }
    #certContentCenter{ width: 60%; }
    .certContent{ float: left;}
    .certContent img{ width: 60%; margin: auto; margin-top: 10px;}
    #qr{ width: 100px; }
    #certificationFooter{ margin-top: 50px;  float: left; width: 100%;}
    .certificationFooter{ float: left; width: 33%;  }
    #footerLt{ text-align: left; }
    #certName{ font-size: 30px; margin-top: 40px; font-size:16px !important; }
    .certNameClass{font-size:20px !important;margin-top:40px}
    #certID{ color: #000; }
    #certTitle{text-transform: uppercase;font-size:16px !important;}
    .certCourse{ font-size: 20px;font-size:16px !important; }
    #certContent{     font-size: 20px;
   }
   body{

   }
   html body #text-capitalize{
       text-transform: uppercase !important;
   }

    .copy_links_class{
        text-align: center;
    }
    .course_name_class{
        min-width: 356px
    }

            .title-page
            {
                visibility: hidden;
            }
    #certContent{
    font-size: 16px;
    padding-left: 6rem;
    padding-right: 6rem;
    padding-top: 3rem; }
    #footerCenter{
        padding-top:75px;
    }
    #certificationFooter{
        margin-top: 30px;
    }
    #certificationFooter{
        margin-bottom:15px;

    }
    #color_black_id{
        color:black !important;
    }
    #certificate_end_id{
        font-size:13px !important;
        position: absolute;
        left:0;
        right:0 ;
        width:100% ;

    }
    .td-title
    {
        text-align: right;font-weight: bold;white-space: nowrap
    }
    #booking_no_id{
        white-space: nowrap !important;
    }

    @font-face {
            font-family: 'arialmt';
            font-style: normal;
            font-weight: normal;
            src: url('{{public_path("ceretifications/fonts/arialmt.ttf")}}') format('ttf');
        }

    *{
        font-family: "arialmt" !important ;
    }
    .main_blue_color
    {
        color: #253f8a;
    }
    body{
        background-size: cover ;
        background-position: center center
    }
    .certContent{
        background-size:cover ;
        background-position: center center;
    }
    *{
    }
    *::after , *::before{
    }


</style>



@if(!isset($download))

<style>
    #certContent{
        margin-bottom:15px;
    }
    #certContentt{
        margin-top:190px !important ;
    }
    #footerCenter{
        padding-bottom:20px !important;
    }

    #certificate_end_id{
        position: relative !important;
left:-50%;
padding-bottom: 77px;
top:20px;
transform: translateX(50%);
    }
</style>
@endif 
</head>
<body style="display: grid
">
@if(isset($download))
    @foreach([0, 5 , 10 , 15 , 20 , 25 , 30 , 35 , 40 , 45 , 50 , 55 , 60 , 65 , 70 , 75 , 80 , 85 , 90 , 95 , 100] as $top)
   <div style="position:absolute;top:{{ $top }}%;left:0">
      @if(isset($download))
    <img  src="{{public_path('certifications/watermark.png',null)}}" style="width:150px">
    @else 
    <img  src="{{asset('certifications/watermark.png',null)}}" style="width:150px">
    @endif 

    </div>
    <div 
    style="position:absolute;top:{{ $top }}%;left:20%">
          @if(isset($download))
    <img  src="{{public_path('certifications/watermark.png',null)}}" style="width:150px">
    @else 
    <img  src="{{asset('certifications/watermark.png',null)}}" style="width:150px">
    @endif 

    </div>
      <div style="position:absolute;top:{{ $top }}%;left:40%">
      @if(isset($download))
    <img  src="{{public_path('certifications/watermark.png',null)}}" style="width:150px">
    @else 
    <img  src="{{asset('certifications/watermark.png',null)}}" style="width:150px">
    @endif 
    </div>
    <div style="position:absolute;top:{{ $top }}%;left:60%">
      @if(isset($download))
    <img  src="{{public_path('certifications/watermark.png',null)}}" style="width:150px">
    @else 
    <img  src="{{asset('certifications/watermark.png',null)}}" style="width:150px">
    @endif 

    </div>

       <div style="position:absolute;top:{{ $top }}%;left:80%">
     @if(isset($download))
    <img  src="{{public_path('certifications/watermark.png',null)}}" style="width:150px">
    @else 
    <img  src="{{asset('certifications/watermark.png',null)}}" style="width:150px">
    @endif 

    </div>
    @endforeach

    @endif











<div id="certification"  >
    <div id="certContentt"  >


        <h1 class="main_blue_color">Certificate of Completion</h1>
        <h2  class="main_blue_color">Is hereby granted to</h2>
        @if(isset($download))

            <div id="certContentLt" class="certContent ">
                <img style="display: block;width:70%;margin-bottom:32px"  src="{{public_path('certifications/new/images/1.png')}}">
                <img style="display: block;width:70%;margin-bottom:32px"  src="{{public_path('certifications/new/images/4.png')}}">
                <img style="display: block;width:70%;margin-bottom:10px" src="{{public_path('certifications/new/images/9.jpg')}}">
                <img style="display: block;width:70%;margin-bottom:0px" src="{{public_path('certifications/logs/2.jpg')}}">
            </div>
        @else
            <div id="certContentLt" class="certContent">
                <img src="{{asset('certifications/new/images/1.png')}}">
                <img src="{{asset('certifications/new/images/3.png')}}">
                <img src="{{asset('certifications/new/images/4.png')}}">
                <img  src="{{asset('certifications/new/images/9.jpg')}}">
                <img  src="{{asset('certifications/logs/2.jpg')}}">
            </div>

        @endif
        <div id="certContentCenter" class="certContent" >

            <div id="" class="certNameClass">
                <span id="color_black_id" style="color:black !important;font-weight: bold">
                Name: </span>
                <span id="text-capitalize" style="color:#040584
;font-weight: bold

                ">
                    <span style="color:#040584" style="text-transform: uppercase;">{{$certification->getUserName()}}</span>


                </span>
            </div>
{{-- 
            @if($certification->person_type == 'company')
            <div id="" class="certNameClass"><span id="color_black_id" style="font-weight: bold">Company: </span>
                <span style="color:#040584;font-weight: bold;text-transform: capitalize">
          {{ $certification->company_name }}

                </span>
            </div>
            @else --}}
<div id="" class="certNameClass"><span id="color_black_id" style="color:black !important;font-weight: bold">ID: </span>
                <span style="color:#040584;font-weight: bold;text-transform: capitalize">
          {{ $certification->getId() }}

                </span>
            </div>
{{-- @endif --}}




            @if($certification->getPassportId())
                <div id="certID"><b>Passport ID:</b> {{$certification->getPassportId()}}</div>
            @endif
            <br><br>

            <div id="certTitle" class="certCourse" style="">To certify has completed to satisfaction OF AN APPROVED COURSE</div>
             <div id="" class="certNameClass"><span id="color_black_id" style="color:black !important;font-weight: bold"></span>
                <span style="color:#040584;font-weight: bold;text-transform: capitalize">
                {{ $certification->getCourseName() }}
                </span>
            </div>
            <div id="certCourse" style="margin-top: 15px" class="certCourse main_blue_color" >
                <br>
                @if($certification->getDescription())<br>
                <span style="font-weight: bold;">
                      {{$certification->getDescription()}}
                </span>
                @endif
            </div>
        </div>
        @if(isset($download))
            <div id="certContentRt" class="certContent">
                <img style="margin-bottom:20px" src="{{public_path('certifications/new/images/2.png')}}">
                <img style="display:block;width:70%;margin-bottom:20px" src="{{public_path('certifications/new/images/5.png')}}">
                <img style="margin-bottom:20px" src="{{public_path('certifications/new/images/7.png')}}">
                <img src="{{public_path('certifications/logs/1.jpg')}}" style="margin-bottom:20px">
                <img src="{{public_path('certifications/logs/3.jpg')}}">
            </div>

            <div id="certContent" class="" style="clear: both;position: absolute;left:0;right:0;width:400px!important;top:-100px;margin-top: -40px;margin-bottom: 25px">
                {!! $certification->getContent() !!}
                 </div>
            <div class="clear"></div>

        @else

            <div id="certContentRt" class="certContent">
                <img src="{{asset('certifications/new/images/2.png')}}">
                <img src="{{asset('certifications/new/images/5.png')}}">
                <img src="{{asset('certifications/new/images/7.png')}}">
                <img src="{{asset('certifications/logs/1.jpg')}}">
                <img src="{{asset('certifications/logs/3.jpg')}}">

            </div>

            <div id="certContent" style="clear: both" >
                {!! $certification->getContent() !!}
                 </div>
            <div class="clear"></div>

        @endif
        <div class="clear"></div>
        <div id="certificationFooter" style="margin-top:-1px;">
            <div id="footerLt" class="certificationFooter" >
                <table>
                    <tr >
                        <td class="td-title">Register number:</td>
                        <td  class="main_blue_color"> 76451</td>
                    </tr>

                    <tr >
                        <td class="td-title">Signed By:</td>
                        <td  class="main_blue_color">STC</td>
                    </tr>

                </table>

                @if(isset($download))

                <div class="stc-brand" style="width: 140px;
                margin-top:35px;
                margin-left: 50px;
                visibility: hidden;
                display: none;
                        ">
                    <img src="
                    
                    {{ public_path('certifications/stc.png') }}
                    
                    " style="max-width: 100%">
                </div>

                @else
                <div class="stc-brand" style="width: 140px;
                padding-top: 32px;
                margin-left: 50px;">
                    <img src="{{ asset('certifications/stc.png') }}" style="max-width: 100%">
                </div>

                @endif

            </div>
            <div id="footerCenter" class="certificationFooter">
                @if(isset($download))
                    {!! $qrcode !!}
                    {{-- {!! $qrcodeAsString !!} --}}

                @else
                    {!! $qrcode !!}
                    {{-- {!! $qrcodeAsString !!} --}}
                @endif

            </div>
            <div id="footerRt" class="certificationFooter">

                <table>
                    <tr >
                        <td class="td-title">Completion Date:</td>
                        <td class="main_blue_color" >{{$certification->getCompletionDate()}}</td>
                    </tr>

                    <tr >
                        <td class="td-title">Valid to:</td>
                        <td  class="main_blue_color"> {{$certification->getValidTo()}}</td>
                    </tr>

                    <tr  >
                        <td style="padding-top: 25px" class="td-title" >Certificate Number:</td>
                        <td style="padding-top: 25px" class="main_blue_color">{{$certification->getCertificationId()}}</td>
                    </tr>


                </table>
            </div>
            <hr
             @if(isset($download))
             style="clear:both"
             @else 
             style="margin-top: 30px;clear:both"
             @endif 
             >
            <div id="certificate_end_id" class="main_blue_color">
                www.stc-eg.com - This is a system Generated Automatically Certificate.To verifiy your Certificate. Scan The QR Code or follow the validation Link {{Request()->root()}}/en/certifications/{{$certification->getId()}} or Send Email to <span id="booking_no_id">Booking@stc-eg.com</span> 5 H/ 6 Al Nasr Street. New Maadi. Maadi. Cairo. Egypt.Telephone No +20100766103 -+201000947155
            </div>
        </div>

    </div>

</div>

</body>



</html>
