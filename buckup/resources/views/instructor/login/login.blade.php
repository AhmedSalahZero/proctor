<!DOCTYPE html>
<html lang="{{ getLang() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ getPageTitle() }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    <link href="{{ asset('backend/assets/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{asset('frontend/all.css')}}" rel="stylesheet">
        <link rel="icon" href="http://wellsharpin.com/assets/img/logo.png">
         <link rel="stylesheet" href="{{ asset('frontend/css/sweetalert.css') }}">
</head>
<body class="body-bg" style="background-image:url('{{ getMainLoginBackgroundColor() }}')">

   <div class="main__container__flex">
          <div class="main__login__container text-center">
          <div class="top_item ">
               <img src="{{asset('frontend/images/logo.png')}}" class="login__img">
          </div>
          <div class="middle_item">
               <img src="{{ asset('frontend/images/earth.jpg') }}" class="earth_bg">
               <form method="POST" action="{{ route('instructor.login') }}" class="middle_form">
                    @csrf 
                    <input  type="text" name="User_Name" value="{{ old('User_Name') }}" placeholder="{{ __('WellSharp® ID') }}" class="form-control custom__input__text">
                    <input  type="password" name="password" class="form-control custom__input__text" placeholder="{{ __('Password') }}">
                    <button class="btn btn--danger text-white text-capitalize ">{{ __('Login') }}</button>
                    <a href="#" class="custom__links transparent-gray"> {{ __('Forget Your Password ?') }}</a>
               </form>
          </div>
          <div class="footer__item   ">
              <div class="l_footer">
                   <a href="#" class="custom__links transparent-gray"> {{ __('Database/Program Assistance?') }}</a>
                   <a href="#" class="custom__links transparent-gray"> {{ __('Requirements') }}</a>
                   <a href="#" class="custom__links transparent-gray"> {{ __('Proctor Assistance?') }}</a>
              </div>
              <div class="r_footer">
                    <img src="{{ asset('frontend/images/powered_by.png') }}" class="powered_by">

              </div>
          </div>
     </div>
          <p class="login__copyright"> SkillSTICK® v3.0 © 2022 Indaptive Technologies Inc. </p>


   </div>

     <script src="{{asset('frontend/js/jquery-3.5.1.js')}}"></script>
     <script src="{{asset('frontend/js/popper.js')}}"></script>
     <script src="{{asset('frontend/js/bootstrap-4.6.2.js')}}"></script>
     <script src="{{asset('frontend/js/sweetalert.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
   
@if(session()->has('fail') || session()->has('errors'))
    <script>
        $(document).ready(function(){

            toastr.error("{{session()->has('fail') ? session()->get('fail') : session()->get('errors')->first() }}", ''  ,{
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "500",
                "hideDuration": "500",
                "timeOut": "2500",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"

            })

        })
    </script>



@endif
     
</body>
</html>