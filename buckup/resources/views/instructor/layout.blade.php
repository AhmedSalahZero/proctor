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
    {{-- <link href="{{asset('frontend/all.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('fontawesome5/css/all.css')}}" rel="stylesheet">
    <link rel="icon" href="http://wellsharpin.com/assets/img/logo.png">
    <link rel="stylesheet" href="{{ asset('frontend/css/sweetalert.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
    <link href='{{ asset('frontend/css/full-calender.css') }}' rel='stylesheet' />
    <style>
    </style>

    @stack('css')
</head>
<body class="body-bg" style="background-image:url('{{ getMainLoginBackgroundColor() }}')">
    <div class="main__container">
        <div class="main-header">
            <div class="l__header">
                <img src="{{ asset('frontend/images/logo2.png') }}" class="logo--header">
            </div>
            <div class="r__header">
                <div class="r_header__top">
                    <p class="student__name">{{ Auth('students')->user()->getFullName() }}</p>
                    <a class="sign__out" href="{{ route('users.logout') }}">{{ __('sign out') }}</a>
                    {{-- <a class="sign__out" href="{{ route('instructor.sign-out') }}">{{ __('sign out') }}</a> --}}
                </div>
                <div class="r__header__middle">
                    <a class="link__item" href="#">
                        <i class="far fa-life-ring"></i>
                        {{ __('Database/Program Assistance?') }}
                    </a>

                    <a class="link__item" href="#">
                        <i class="far fa-life-ring"></i>
                        {{ __('Proctor Assistance?') }}
                    </a>
                </div>
            </div>
        </div>


        <div class="content__section">
            <div class="side__bar">
                <div class="side__bar__content">
                    {{-- @dd() --}}
                    <div class="nav__item">
                        <a href="{{ route('instructor.home.index') }}" class="nav__item__title  @if(RouteName() == 'instructor.home.index') active__nav @endif">
                            <i class="fas fa-home"></i>
                            {{ __('Home') }}
                        </a>

                    </div>



                    <div class="nav__item">
                        <a href="{{ route('instructor.profile.index') }}" class="nav__item__title  @if(RouteName() == 'instructor.profile.index') active__nav @endif ">
                            <i class="fas fa-home"></i>
                            {{ __('My Profile') }}
                        </a>

                    </div>



                    <div class="nav__item">
                        <a href="{{ route('instructor.analytics.assessment.index') }}" class="nav__item__title  @if(RouteName() == 'instructor.analytics.assessment.index' || RouteName() == 'instructor.analytics.classes.index')) active__nav @endif ">
                            <i class="fas fa-home"></i>
                            {{ __('Analytics') }}
                        </a>
                        <ul class="sub__item__ul hideit">
                            <li class="sub__item__li">
                                <a href="{{ route('instructor.analytics.assessment.index') }}" class="sub__item__a ">
                                    <i class="fas fa-home"></i>
                                    {{ __('Assessment') }}
                                </a>
                            </li>
                            <li class="sub__item__li">
                                <a href="{{ route('instructor.analytics.classes.index') }}" class="sub__item__a nav__click ">
                                    <i class="fas fa-home"></i>
                                    {{ __('Classes') }}
                                </a>
                            </li>
                        </ul>
                    </div>


                    <div class="nav__item">
                        <a href="{{ route('instructor.classes.index') }}" class="nav__item__title @if(RouteName() == 'instructor.classes.index') active__nav @endif  ">
                            <i class="fas fa-home"></i>
                            {{ __('Classess') }}
                        </a>

                    </div>

                    <div class="nav__item">
                        <a href="{{ route('instructor.browse.classes.index') }}" class="nav__item__title  @if(RouteName() == 'instructor.browse.classes.index') active__nav @endif ">
                            <i class="fas fa-home"></i>
                            {{ __('Browse Classess') }}
                        </a>

                    </div>

                    <div class="nav__item">
                        <a href="{{ route('instructor.certificate.lookup') }}" class="nav__item__title  @if(RouteName() == 'instructor.certificate.lookup') active__nav @endif ">
                            <i class="fas fa-home"></i>
                            {{ __('Certificate Lookup') }}
                        </a>

                    </div>








                    {{-- <div class="nav__item">
                        <h4 class="nav__item__title  @if($page == 'home') active__nav @endif">
                            <i class="fas fa-home"></i>
                            {{ $page }}
                    </h4>

                </div> --}}
            </div>

            
        </div>
        <div class="main__contain">
            <div class="main__content__container">
                @yield('content')

           
            </div>
        </div>


             <div class="footer py-2 px-1">
                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6">
                                <div class="d-flex flex-column">
                                    <a href="#" class="footer-link">Technical Support</a>
                                    <span>SkillGRID® (online) | Version 3.0 | © 2022 Indaptive Technologies Inc.</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-right">
                                <img  width="250px" src="{{ asset('frontend/images/ws-login_SG-Logo.png') }}">
                            </div>
                        </div>
                </div>

    </div>



    </div>




    <script src="{{asset('frontend/js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('frontend/js/popper.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap-4.6.2.js')}}"></script>
    <script src="{{asset('frontend/js/sweetalert.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/js/datatable-full.js') }}"></script>
    <script src="{{ asset('frontend/js/full-calender.js') }}"></script>
    


    <script>
        $('.nav__item__title').on('click , mouseover', function(e) {
            let height = $(this).closest('.nav__item').find('.sub__item__ul')[0] ? $(this).closest('.nav__item').find('.sub__item__ul')[0].scrollHeight : '0';
            $('.sub__item__ul').css('height', '0px');
            let item = $(this).closest('.nav__item').find('.sub__item__ul').css('height', height + 'px');
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            if (calendarEl) {
                let calendarEvents = @json($calendarEvents ?? []);
                console.log('before');
                console.log(calendarEvents);
                // console.log(calendarEvents);
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    timeZone: 'UTC'
                    , headerToolbar: {
                        // left: 'prev,next today'
                        // , center: 'title'
                        // , right: 'month,agendaWeek,agendaDay'
                        // ,
                        right: 'timeGridDay,prev,next'
                    }
                    , editable: false
                    , events: function(info, successCallback, failCallback) {
                        $.ajax({
                            url: "{{ route('proctor.filters.calendar') }}"
                            , data: {
                                '_token': "{{ csrf_token() }}"
                                , 'courses_id': $('#filter-calendar').val()
                            }
                            , type: "POST"
                            , success: function(response) {
                                // console.log(response);
                                // console.log('after');
                                console.log(response.fullCalendarEvents);
                                successCallback(response.fullCalendarEvents)
                            }
                        })
                    }
                    , selectable: true
                    , selectHelper: true
                    , eventClick: function(info) {
                        let exam_id = info.event._def.extendedProps.exam_id;
                        if (exam_id) {
                            $('#ongoing_course_' + exam_id).modal('show');
                        }
                    }

                });
                calendar.render();
                window['currentCalendar'] = calendar;
            }
        });

    </script>

    @stack('js')
    <script>
        $(document).ready(function() {
            let buttonsData = [];
            if(!$('#remove-table-buttons').length){
                buttonsData = ['excel'];
            }
            let searchable = true ;
            if(('#hide-datatable-search').length){
                searchable = false ;
            }
            $('.datatable:not(.no-pagination):not(.no-search):not(.no-info)').DataTable({
                lengthChange: true
                , dom: 'lBfrtip'
                , lengthMenu: [10, 25, 50, 75, 100]
                , paging: true
                , paginate: true
                , buttons:buttonsData,
                searching:searchable 
            });
            $('.datatable.no-pagination.no-search.no-info').DataTable({
                searching: false
                , info: false
                , paginate: false
                , lengthChange: true
                , lengthMenu: [10, 25, 50, 75, 100],

                dom: 'lBfrtip'
                , buttons: buttonsData
            });
        });

    </script>
    <script>
        $(function() {
            setTimeout(() => {
                // console.log(calendar.getEventSources());
                // console.log(calendar);
                // var calendarEl = document.getElementById('calendar');
                // calendar.destroy()

            }, 3000);
        })

    </script>

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
