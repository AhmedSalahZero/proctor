<!DOCTYPE html>
<html>
<head>
    <title>IADC Certification</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/main.css')}}">
    <link href="{{ asset('backend/assets/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />


</head>
<body>
<div id="main">
    <script src="{{ asset('backend/assets/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>

    <script src="{{ asset('backend/assets/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>

    @include('backend.partials.toaster')
    <header><img src="{{asset('frontend/images/logo.png')}}" width="200" id="logo"></header>
    <div id="Content">
        <h1>IADC Certificate Search</h1>
        <h2>Please enter the certificate ID. </h2>
        <div class="clear"></div>
        <div class="clear"></div>
        <form method="get" action="{{route('search.certification')}}" >
            <span class="red">*</span>ID: <input type="text" name="id" autocomplete="off" >
            <div class="clear"></div>
            <input type="submit">
        </form>
        <div class="clear"></div>
    </div>
</div>

</body>
</html>
