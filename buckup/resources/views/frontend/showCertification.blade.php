<!DOCTYPE html>
<html>
<head>
    <title>IADC Certification</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/main.css')}}">


</head>
<body>
<div id="main">
    <header><img src="{{asset('frontend/images/logo.png')}}" width="200" id="logo"></header>
    <div id="Content">
        <h1>IADC Certificate Search</h1>
        <h2>Please enter the certificate ID. </h2>
        <div class="clear"></div>
        <div class="clear"></div>
        <form method="get" action="{{route('search.certification')}}" >
            <span class="red">*</span>ID: <input type="text" name="id"  value="{{$certification->certification_id}}">
            <div class="clear"></div>
            <input type="submit">
        </form>
        <div class="clear"></div>
        <table border="1" cellpadding="0" cellspacing="0" class="hidden2">
            <tr>
                <td>Certificate ID :</td>
                <td>{{$certification->certification_id}}</td>
            </tr>
            <tr>
                <td>Name :</td>
                <td>{{$certification->user->UserName}}</td>
            </tr>
            <tr>
                <td>Complete :</td>
                <td>{{$certification->completed_date}}</td>
            </tr>
            <tr>
                <td>Course :</td>
                <td>{{$certification->course->name}}</td>
            </tr>
            <tr>
                <td>Supplement :</td>
                <td>
                    @if($certification->supplement)
                        {{$certification->supplement}}

                        @else

                        None
                    @endif
                </td>
            </tr>
            <tr>
                <td>Provider :</td>
                <td>
                    @if($certification->provider)
                        {{$certification->provider}}
                        @else
                        None
                    @endif
                </td>
            </tr>
            <tr>
                <td><strong>Status :</strong></td>
                <td><strong>{{$certification->isValid()}}</strong></td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
