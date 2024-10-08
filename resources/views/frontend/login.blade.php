

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0026)http://iadc.wellsharp.org/ -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" style="height:93%;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Wellsharp</title>
    <base href="http://wellsharp.org.in/" />

    <style>
        .mobileOnly {
            display:none
        }
        .styledBox {
            font-size: 15px;
            width:250px;
            padding: 3px 3px 3px 13px;
            box-sizing: border-box;
            font-family:'Open Sans';
            text-align: center;
            box-shadow: 0px 0px 5px 0px rgba(123, 123, 123, 0.75);
        }
        .newHREF2 {
            background-color: #B9B9B9;
            color: #000000;
            border: 1px solid #8A8A8A;
            padding: 1px 8px;
            border-radius: 10px;
            font-size: 10px;
            text-decoration: none;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.33);
        }
        body * {
            font-family: 'Open Sans';
        }
    </style>
    <link rel="icon" href="http://wellsharp.org.in/assets/img/logo.png">
</head>
<body style="background: url({{ asset('assets/images/bkg.jpg') }}); height:100%; position:relative; padding-top: 50px;box-sizing: border-box;">
{{-- <body style="background: url(http://wellsharp.org.in/assets/images/bkg.jpg); height:100%; position:relative; padding-top: 50px;box-sizing: border-box;"> --}}
<link href="{{ asset('backend/assets/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />

<script src="{{ asset('backend/assets/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>

@include('backend.partials.toaster')
<form name="form1" method="post" action="{{route('front.login')}}">
    @csrf
    <input type="hidden" id="userid" name="userid">
    <input type="hidden" id="logparam" name="logparam">
    <center>
        <div style="width:540px;border-radius:20px; -webkit-box-shadow: 0px 0px 14px -1px rgba(0,0,0,0.75);-moz-box-shadow: 0px 0px 14px -1px rgba(0,0,0,0.75);box-shadow: 0px 0px 20px -1px rgba(0, 0, 0, 0.95);">
            <div style="width:100%;padding-bottom:5px;padding-top:10px; background-color:white; border-top-left-radius:20px; border-top-right-radius:20px;-webkit-box-shadow: inset 0px 0px 40px -7px rgba(0,0,0,0.28);-moz-box-shadow: inset 0px 0px 40px -7px rgba(0,0,0,0.28);box-shadow: inset 0px 0px 40px -7px rgba(0,0,0,0.28);">
                <center>
                    <img id="logoimage" style="display: block;margin-left: 10px;width: 220px;" src="{{ url('assets/img/newlogo.png') }}">
                </center>
            </div>
            <div style="display: block; width: 100%; box-sizing: border-box; border-top: 1px solid rgb(95, 0, 0); border-bottom: 1px solid rgb(88, 0, 0); color: rgb(255, 255, 255); text-align: center; padding: 4pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: bold; font-stretch: normal; font-size: 12px; line-height: normal; font-family: &quot;Open Sans&quot;, verdana; background-image: url({{ asset('assets/images/transpRed.png') }});" id="errMsg" name="errMsg">Please enter your Wellsharp ID and password.</div>
            <div style="width:100%; position:relative;">
                <table width="250px" style="-webkit-box-shadow: 0px 0px 14px -1px rgba(0,0,0,0.75);-moz-box-shadow: 0px 0px 14px -1px rgba(0,0,0,0.75);box-shadow: 0px 0px 14px -1px rgba(0,0,0,0.75);margin-top: 7px;margin-right: 6px;width: 250px;position: absolute;left: 50%;margin-left: -138px;padding: 10px;background-image: url({{ asset('assets/images/lighttransp.png') }});    background-color: rgba(255, 255, 255, 0.48);border-radius: 10px;" border="0">
                    <tbody><tr>
                        <td width="1">
                            <input value="" type="text" id="loginid" name="id" class="styledBox" placeholder="WellSharp® ID">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input value="" type="password" id="pwd" name="password" class="styledBox" placeholder="Password">
                        </td>
                    </tr>
                    <tr>
                        <td style="display:none;">Pilot providers:  we are currently peforming a system update. please try back in a few minutes</td>
                        <td>
                            <button type="submit" style="width: 250px;background-color: #D27010;border: none;cursor: pointer;color: white;border-radius: 5px;font-size: 17px;padding-top: 3px;padding-bottom: 3px;text-align:center;    background-color: #960909; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.78);">Login</button>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <div style="margin-top: 9px;margin-bottom:-5px;"><a class="newHREF2">Forgot your password?</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                    </tr>
                    </tbody></table>
                <img style="width: 100%;  border-top: 1px solid #820000;" src="{{ url('assets/Wellsharp_files/login_imageZo.jpg') }}">
            </div>
            <div class="footerContainerLogin" style="background-color:white !important; width:100%;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:1px;box-sizing: border-box;border-top:1px solid #820000">
                <table width="100%" border="0" style="height:45px;margin-bottom: 10px;">
                    <tbody>
                    <tr>
                        <td class="techSupport" align="center"><a target="_blank" class="newHREF2">Need Assistance?</a></td>
                        <td class="techSupport" align="center"><a class="newHREF2" target="_blank">Requirements</a></td>
                        <!--<td nowrap="nowrap" align="right" class="appInfo" style="font-size: 11px;">SkillSTICK&reg; (USB)  &copy; 2017 Indaptive Technologies Inc.</td>-->
                        <td align="right"><img src="{{ url('assets/Wellsharp_files/ws-login_SG-Logo.png')}}"></td>
                    </tr>
                    <tr>
                        <td class="techSupport" align="center">
                            <a target="_blank" href="mailto:abdelrahmana643@gmail.com" class="newHREF2">Proctor Assistance?</a>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="text-align:right;width:540px;padding-top:5px;color:lightgray;font-size: 11px;">
            SkillSTICK® (USB)  © 2017 Indaptive Technologies Inc.					<!--<img style="float:right" src="images/SG-Platform_small.png"/>-->
        </div>
    </center>
</form>


</body></html>
