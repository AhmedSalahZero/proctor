
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IADC Management Console</title>
    <!-- *** fontawesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <!-- *** jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- *** bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- bootstrap styling
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- *** bootstrap-select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <!-- *** bootstrap-datepicker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdn.jsdelivr.net/sweetalert/1.1.3/sweetalert.min.js"></script>
    <!-- *** date -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js" type="text/javascript"></script>
    <!-- *** moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js" type="text/javascript"></script>
    <!-- *** dataTables -->
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"><script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script><script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.19/dataRender/datetime.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css">
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">
    <script src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js"></script>

    <!-- *** amcharts -->

{{--    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>--}}
{{--    <script src="https://www.amcharts.com/lib/3/serial.js"></script>--}}
{{--    <script src="https://www.amcharts.com/lib/3/pie.js"></script>--}}
{{--    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>--}}
{{--    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />--}}

    <!--
    <script src="components/AMCharts/amcharts.js"></script>
    <script src="components/AMCharts/serial.js"></script>
    <script src="components/AMCharts/pie.js"></script>
    <script src="components/AMCharts/export/export.min.js"></script>
    <link rel="stylesheet" href="components/AMCharts/export/export.css" type="text/css" media="all" />
    -->

{{--    <script src="components/AMCharts/themes/black.js"></script>--}}
{{--    <script src="components/AMCharts/themes/light.js"></script>--}}
{{--    <script src="components/AMCharts/themes/dark.js"></script>--}}
{{--    <script src="js/console.js"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        window.console.log=function(){};--}}
{{--        window.console.dir=function(){};--}}
{{--    </script>--}}
{{--    <link rel="stylesheet" href="components/awesome-bootstrap-checkbox-master/awesome-bootstrap-checkbox.css?version=1523978043"><link rel="stylesheet" href="components/animate.css-master/animate.min.css?version=1523978043"><script type="text/javascript" src="components/ObjectEditAdaptor/ObjectEditAdaptor.js?version=1523978042"></script><link rel="stylesheet" href="components/ArrayTableView/ArrayTableView.css?version=1523978042"><script type="text/javascript" src="components/ArrayTableView/ArrayTableView.js?version=1523978042"></script><script type="text/javascript" src="components/deepCopy.js?version=1523978043"></script><link rel="stylesheet" href="components/jquery.growl/stylesheets/jquery.growl.css?version=1523978043"><script type="text/javascript" src="components/jquery.growl/javascripts/jquery.growl.js?version=1523978043"></script><link rel="stylesheet" href="components/bootstrap-multiselect-master/dist/css/bootstrap-multiselect.css?version=1571760514"><script type="text/javascript" src="components/bootstrap-multiselect-master/dist/js/bootstrap-multiselect.js?version=1571760514"></script>--}}
{{--    <link rel="stylesheet" href="css/tmi.css?version=1542253179"><script type="text/javascript" src="js/tmi/tmi.js?version=1523978045"></script><script type="text/javascript" src="js/tmi/tmi.Utils.js?version=1581265399"></script><script type="text/javascript" src="js/tmi/tmi.DOM.js?version=1543518447"></script><script type="text/javascript" src="js/tmi/tmi.Ajax.js?version=1621518196"></script><script type="text/javascript" src="js/tmi/tmi.FilterSet.js?version=1543939835"></script><script type="text/javascript" src="js/tmi/tmi.DataTable.js?version=1555522583"></script><script type="text/javascript" src="js/tmi/tmi.Forms.js?version=1537289719"></script><script type="text/javascript" src="js/tmi/tmi.ATV.js?version=1621518196"></script><script type="text/javascript" src="js/iadc/iadc.js?version=1628275003"></script><script type="text/javascript" src="js/iadc/iadc.charts.js?version=1523978045"></script><link rel="stylesheet" href="css/iadc.css?version=1523978043"><script type="text/javascript">--}}

{{--        $(document).ready(function() {--}}
{{--            iadc._session={--}}
{{--                client_id: "iadc",--}}
{{--                user_id: "{system}",--}}
{{--                fname: null,--}}
{{--                lname: null,--}}
{{--                role: null,--}}
{{--                dev: null,--}}
{{--                mode: null		};--}}
{{--        });--}}
{{--    </script>--}}

    <!--FavIcon stuff-->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/fav/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/fav/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/fav/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/fav/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="images/fav/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/fav/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="images/fav/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="images/fav/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="images/fav/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="images/fav/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="images/fav/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="images/fav/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="images/fav/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="images/fav/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="images/fav/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="images/fav/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="images/fav/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="images/fav/mstile-310x310.png" />		<style>
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
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function() {--}}
{{--            $('#certificteid').val('84941b7f');--}}
{{--            process();--}}

{{--            $("form").submit(function(e){--}}
{{--                e.preventDefault();--}}
{{--            });--}}
{{--            $('#certificteid').keyup(function(e) {--}}
{{--                if(e.which == "13") {--}}
{{--                    process();--}}
{{--                }--}}
{{--            });--}}

{{--            $('#backbutt').click(function(e) {--}}
{{--                $('#certpanel').show();--}}
{{--                $("#certresult").hide();--}}

{{--            });--}}
{{--            $("#supp_row").hide();--}}
{{--            $("#status_row").show();--}}
{{--            $("#errMsg").html("");--}}
{{--            $("#certid_val").html("");--}}
{{--            $("#name_val").html("");--}}
{{--            $("#completedon_val").html("");--}}
{{--            $("#program_val").html("");--}}
{{--            //$("#supp_val").html(certificate["supp"]);--}}
{{--            $("#provider_val").html("");--}}
{{--            $("#status_val").html("");--}}
{{--            tmi.DOM.loadingBtn($("button[name='search']"));--}}
{{--        });--}}

{{--        function process(){--}}
{{--            console.log("process()");--}}
{{--            var certificteId=$.trim($('#certificteid').val());--}}
{{--            if((certificteId==0)){--}}
{{--                $("#errMsg").html("Please provide an IADC certificate number.").fadeIn();--}}
{{--                return false;--}}
{{--            }--}}
{{--            var submitBtn=$("button[name='search']");--}}
{{--            submitBtn.prop("disabled",true).html(submitBtn.attr("data-loading"));--}}
{{--            $.ajax({--}}
{{--                url : "ajax.php",--}}
{{--                type: "POST",--}}
{{--                certificteId: certificteId,--}}
{{--                data: {--}}
{{--                    cmd:"getRegistration",--}}
{{--                    data:JSON.stringify({--}}
{{--                        "regcert_id":certificteId--}}
{{--                    })--}}
{{--                },--}}
{{--                submitBtn: submitBtn,--}}
{{--                cache: false--}}
{{--            }).done(function(msg) {--}}
{{--                var responseObj = JSON.parse(msg);--}}
{{--                //console.log(responseObj);--}}
{{--                this.submitBtn.prop("disabled",false).html(this.submitBtn.attr("data-html0"));--}}
{{--                var certificate=null;--}}
{{--                //var certificate = responseObj["registrations"][certificteId];--}}
{{--                for (var propId in responseObj["registrations"]) {--}}
{{--                    var registration=responseObj["registrations"][propId];--}}
{{--                    if(registration.id.toLowerCase()==this.certificteId.toLowerCase()){--}}
{{--                        certificate=registration;--}}
{{--                        break;--}}
{{--                    }--}}
{{--                    if(registration.cert_no.toLowerCase()==this.certificteId.toLowerCase()){--}}
{{--                        certificate=registration;--}}
{{--                        break;--}}
{{--                    }--}}
{{--                }--}}

{{--                if((certificate!=null)&&(certificate["cert_on"]!=null)){--}}
{{--                    $("#certresult").show();--}}
{{--                    $("#certpanel").hide();--}}

{{--                    $("#errMsg").html("");--}}
{{--                    $("#certid_val").html(certificate["cert_no"]);--}}
{{--                    $("#name_val").html(certificate["user"]["fname"]+" "+certificate["user"]["lname"]);--}}
{{--                    $("#completedon_val").html(certificate["cert_on"]);--}}
{{--                    $("#expireson_val").html(certificate["cert_expireson"]);--}}
{{--                    $("#program_val").html(certificate["cert_title"]);--}}
{{--                    $("#provider_val").html(certificate["class"]["client"]["title"]);--}}
{{--                    $("#status_val").html(((certificate["status"]==1)?"Active":"Expired"));--}}

{{--                }else{--}}
{{--                    //check wellsharp--}}
{{--                    if(true){--}}
{{--                        $.ajax({--}}
{{--                            url: "https://iadc.wellsharp.org/iadc_certificate_lookup_ajax.php",--}}
{{--                            type: "POST",--}}
{{--                            data: {"certificateid":certificteId},--}}
{{--                            cache: false--}}
{{--                        }).done(function(msg) {--}}
{{--                            responseObj = JSON.parse(msg);--}}
{{--                            console.log(responseObj);--}}
{{--                            if(responseObj.result==1){--}}
{{--                                $("#certresult").show();--}}
{{--                                $("#certpanel").hide();--}}

{{--                                $("#errMsg").html("");--}}
{{--                                $("#certid_val").html(responseObj.certificateid);--}}
{{--                                $("#name_val").html(responseObj.fullname);--}}
{{--                                $("#completedon_val").html(responseObj.completedon);--}}
{{--                                $("#expireson_val").html(responseObj.expireson);--}}
{{--                                $("#program_val").html(responseObj.courseunit_title);--}}
{{--                                if(responseObj.supplement_title!=null){--}}
{{--                                    $("#supp_row").show();--}}
{{--                                    $("#supp_val").html(responseObj.supplement_title);--}}
{{--                                }else{--}}
{{--                                    $("#supp_row").hide();--}}
{{--                                }--}}

{{--                                $("#provider_val").html(responseObj.client_title);--}}
{{--                                //$("#status_row").hide();--}}
{{--                                $("#status_val").html(((responseObj.expired!=1)?"Active":"Expired"));--}}

{{--                            }else{--}}
{{--                                $("#certresult").hide();--}}
{{--                                $("#errMsg").html("Certificate not found");--}}
{{--                            }--}}
{{--                        });--}}
{{--                    }else{--}}
{{--                        $("#certresult").hide();--}}
{{--                        $("#errMsg").html("Certificate not found");--}}
{{--                    }--}}
{{--                }--}}


{{--                submitBtn.prop("disabled",false);--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="IADC Certificate Manager">
        <meta name="keywords" content="IADC Certificate Manager">
{{--        <link rel="stylesheet" href="css/tmi.css">--}}
        <title>IADC Accredidation Managment System</title>
    </head>
<body style="background-color:#eeeeee">
<div class="container">
{{--    <div class="card card-container" id="certpanel" style="display:block;">--}}
{{--        <img id="profile-img" class="profile-img-card" src="{{asset('frontend/new/images/logo.png')}}" />--}}
{{--        <p id="profile-name" class="profile-name-card"></p>--}}
{{--        <form class="form-main">--}}
{{--            <div style="padding-top:10px;color:#7c001f">Please enter the certificate ID.</div>--}}

{{--            <input type="text" id="certificteid" class="form-control" placeholder="Certificate ID" value="" required autofocus>--}}
{{--            <button name="search" class="btn btn-lg btn-primary btn-block btn-signin" onclick="process();"><i class="fa fa-chevron-right"></i> Search</button>--}}
{{--        </form>--}}

{{--        <div id="errMsg" style="padding-top:10px;color:#7c001f"></div>--}}
{{--    </div>--}}


    <div class="card card-container" id="certresult" >
        <img id="profile-img" class="profile-img-card" src="{{asset('frontend/new/images/logo.png')}}" />
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
                <td>{{$certification->user->Full_Name}}</td>
            </tr>
            <tr>
                <td>Completed On:</td>
                <td >{{$certification->getEndDataOnly()}}</td>
            </tr>
            <tr>
                <td>Expires On:</td>
                <td>{{$certification->getValidationDateOnly()}} </td>
            </tr>
            <tr>
                <td>Program:</td>
                <td >
                    @if(! $certification->isRigpass())
                        {{$certification->course->name}}
                    @else
                        {{$certification->getRigProgram()}}
                    @endif

                </td>
            </tr>
{{--            <tr id="supp_row">--}}
{{--                <td>Supplement:</td>--}}
{{--                <td id="supp_val">{{$certification->supplement}}</td>--}}
{{--            </tr>--}}
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
                <td >Status:</td>
                <td id="status_val">{{$certification->isValid()}}</td>
            </tr>
{{--            @if( $showBackBtn)--}}

         @if(isset(explode('/',url()->previous())[3]) && explode('/',url()->previous())[3] != 'admin')
            <tr >
                <td colspan="2">
                    <a href="{{route('main.certifications')}}" class="btn btn-lg btn-primary btn-block btn-signin" id="backbutt">Go Back</a>
                </td>
            </tr>
            @endif
{{--                @endif--}}
            </tbody>
        </table>

    </div><!-- /card-container -->
</div><!-- /container -->
</body>
</html>
