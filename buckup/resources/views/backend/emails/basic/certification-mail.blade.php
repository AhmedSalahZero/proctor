<!DOCTYPE html>
<html>
<head>
    <title></title>

{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">--}}

    <style type="text/css">
        body, html {
            height: 100%;
        }

        .card-container.card {
            max-width: 350px;
            padding: 40px 40px;
        }

        .btn {
            font-weight: 700;
            height: 36px;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: default;
        }

        /*
         * Card component
         */
        .card {
            background-color: #F7F7F7;
            /* just in case there no content*/
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            margin-top: 50px;
            /* shadows and rounded borders */
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .profile-img-card {
            margin: 0 auto 10px;
            display: block;
        }

        /*
         * Form styles
         */
        .profile-name-card {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0 0;
            min-height: 1em;
        }

        .reauth-email {
            display: block;
            color: #404040;
            line-height: 2;
            margin-bottom: 10px;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin #certificteid,

        .form-main input[type=text],
        .form-main button {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            z-index: 1;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-main .form-control:focus {
            border-color: rgb(104, 145, 162);
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
        }

        .btn.btn-signin {
            background-color: #7c001f;
            padding: 0px;
            font-weight: 700;
            font-size: 14px;
            height: 36px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            border: none;
            -o-transition: all 0.218s;
            -moz-transition: all 0.218s;
            -webkit-transition: all 0.218s;
            transition: all 0.218s;
            padding-top: 9px;

        }


        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="card card-container" id="certresult">
    <img id="profile-img" class="profile-img-card" src="{{public_path('frontend/new/images/logo.png')}}">
    <p id="profile-name" class="profile-name-card"></p>
    <table class="table table-hover">
        <thead>

        </thead>
        <tbody>
        <tr>
            <td>Certificate ID:</td>
            <td id="certid_val">{{$certification->certification_id}}</td>
        </tr>
        <tr>
            <td>Name:</td>
            <td>{{$student->Full_Name}}</td>
        </tr>
        <tr>
            <td>Completed On:</td>
            <td>{{$certification->getEndDataOnly()}}</td>
        </tr>
        <tr>
            <td>Expires On:</td>
            <td>{{$certification->getValidationDateOnly()}}</td>
        </tr>
        <tr>
            <td>Program:</td>

            <td>
                @if(! $certification->isRigpass())
                {{$certification->course->name}}
                @else
                    {{$certification->getRigProgram()}}
                @endif

            </td>

        </tr>
{{--        <tr id="supp_row">--}}
{{--            <td>Supplement:</td>--}}
{{--            <td id="supp_val">{{$certification->supplement}}</td>--}}
{{--        </tr>--}}
        <tr>
            <td>Provider:</td>
            <td id="provider_val"> @if($certification->provider)
                    {{$certification->provider}}
                @else
                    None
                @endif
            </td>
        </tr>
        <tr id="status_row">
            <td>Status:</td>
            <td id="status_val">{{$certification->isValid()}}</td>
        </tr>
        </tbody>
    </table>

</div>

</body>
</html>

