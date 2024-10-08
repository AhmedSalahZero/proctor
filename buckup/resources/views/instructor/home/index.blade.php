@extends('instructor.layout')

@section('content')
@include('map.map')

<input type="hidden" id="remove-table-buttons">

<div class="upcoming-container">
    <div class="uppcoming-content upcoming-full">
        <div class="calender-filter-container">
            <div class="calender-filter">
                <div class="calender--filter--header">
                    <div class="section__top__header">{{ __('Ongoing Classes') }}</div>
                    <div class="datatable--filter-select-div  text-center ">
                        <table class="datatable datatable-custom table table-hover">
                            <thead class="datatable-thead">
                                <tr class="datatable-thead-tr">
                                    <th class="datatable-th">class title</th>
                                    <th class="datatable-th">class location</th>
                                    <th class="datatable-th">start date</th>
                                    <th class="datatable-th">end date</th>
                                    <th class="datatable-th">instructor</th>
                                    <th class="datatable-th">language</th>

                                </tr>
                            </thead>
                            <tbody class="datatable-tbody">
                                @foreach($exams['ongoing'] as $exam)
                                <tr data-toggle="modal" data-target="#ongoing_course_{{ $exam->id }}" class="tr_for_ongoing_course clickable-tr " data-exam-id="{{ $exam->id }}">
                                    <td class="td-for-main-datatable">{{ $exam->getExamTitle() }}</td>
                                    <td class="td-for-main-datatable">{{ $exam->getLocation() }}</td>
                                    <td class="td-for-main-datatable"> {{ $exam->getStartDateFormatted(true) }} </td>
                                    <td class="td-for-main-datatable"> {{ $exam->getEndDateFormatted(true) }} </td>
                                    <td class="td-for-main-datatable">{{ $exam->getInstructorName() }}</td>
                                    <td class="td-for-main-datatable">{{ $exam->getLanguage() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @foreach($exams['ongoing'] as $exam)
                          @include('class-dashboard' , [
                         'classType'=>'ongoing'
                     ])

                     @endforeach

                    </div>
                </div>
            </div>


        </div>

        <div class="calender-filter-container">
            <div class="calender-filter">
                <div class="calender--filter--header">
                    <div class="section__top__header">{{ __('Upcoming Classes') }}</div>
                    <div class="datatable--filter-select-div  text-center ">
                        <table class="datatable datatable-custom">
                            <thead class="datatable-thead">
                                <tr class="datatable-thead-tr">
                                    <th class="datatable-th">class title</th>
                                    <th class="datatable-th">class location</th>
                                    <th class="datatable-th">start date</th>
                                    <th class="datatable-th">end date</th>
                                    <th class="datatable-th">instructor</th>
                                    <th class="datatable-th">language</th>
                                </tr>
                            </thead>
                            <tbody class="datatable-tbody">
                                @foreach($exams['upcoming'] as $exam)
                                <tr data-toggle="modal" data-target="#ongoing_course_{{ $exam->id }}" class="tr_for_ongoing_course clickable-tr " data-exam-id="{{ $exam->id }}">
                                    <td class="td-for-main-datatable">{{ $exam->getExamTitle() }}</td>
                                    <td class="td-for-main-datatable">{{ $exam->getLocation() }}</td>
                                    <td class="td-for-main-datatable">{{ $exam->getStartDateFormatted(true) }} </td>
                                    <td class="td-for-main-datatable">{{ $exam->getEndDateFormatted(true) }} </td>
                                    <td class="td-for-main-datatable">{{ $exam->getInstructorName() }}</td>
                                    <td class="td-for-main-datatable">{{ $exam->getLanguage() }}
                                
                                    </td>
                                </tr>

                                
                                @endforeach

                            </tbody>
                        </table>

                         @foreach($exams['upcoming'] as $exam)
                        @include('class-dashboard' , [
                         'classType'=>'upcoming'
                     ])
                     @endforeach


                     

                    </div>
                    

                </div>
            </div>


        </div>


        <div class="calender-filter-container">
            <div class="calender-filter">
                <div class="calender--filter--header">
                    <div class="section__top__header">{{ __('Past Classes') }}</div>
                    <div class="datatable--filter-select-div  text-center ">
                        <table class="datatable datatable-custom">
                            <thead class="datatable-thead">
                                <tr class="datatable-thead-tr">
                                    <th class="datatable-th">class title</th>
                                    <th class="datatable-th">class location</th>
                                    <th class="datatable-th">start date</th>
                                    <th class="datatable-th">end date</th>
                                    <th class="datatable-th">instructor</th>
                                    <th class="datatable-th">language</th>
                                </tr>
                            </thead>
                            <tbody class="datatable-tbody">
                                @foreach($exams['past'] as $exam)
                                <tr data-toggle="modal" data-target="#ongoing_course_{{ $exam->id }}" class="tr_for_ongoing_course clickable-tr " data-exam-id="{{ $exam->id }}">
                                    <td class="td-for-main-datatable">{{ $exam->getExamTitle() }}</td>
                                    <td class="td-for-main-datatable">{{ $exam->getLocation() }}</td>
                                    <td class="td-for-main-datatable">{{ $exam->getStartDateFormatted(true) }} </td>
                                    <td class="td-for-main-datatable">{{ $exam->getEndDateFormatted(true) }} </td>
                                    <td class="td-for-main-datatable">{{ $exam->getInstructorName() }}</td>
                                    <td class="td-for-main-datatable">{{ $exam->getLanguage() }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @foreach($exams['past'] as $exam)
                        @include('class-dashboard' , [
                         'classType'=>'past'
                     ])
                     @endforeach
                </div>
            </div>


        </div>




    </div>
</div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $(function() {
        $('select').selectpicker();
        // $('select[data-live-search="true"]').selectpicker();
    })

</script>




<script>
    $(document).on('click', '.check-proctor-password', function() {
        let exam_id = $(this).data('exam-id');
        $(this).prop('disabled', true);
        let password = $('#proctor-password-for-exam-' + exam_id).val();
        if (password) {
            $.ajax({
                url: "{{ route('check.proctor.password') }}"
                , data: {
                    "_token": "{{ csrf_token() }}"
                    , "exam_id": exam_id
                    , 'password': password
                }
                , type: "post"
                , success: function(result) {
                    $('.check-proctor-password[data-exam-id="' + result.exam_id + '"]').prop('disabled', false);
                    $('#exam-started-successfully-' + result.exam_id).addClass('d-none');
                    if (result.status) {
                        $('#launch-exam-' + result.exam_id).prop('disabled', false);
                        $('#proctor-name-for-exam-' + result.exam_id).removeClass('d-none');
                        $('#proctor-not-found-' + result.exam_id).addClass('d-none');
                    } else {
                        $('#launch-exam-' + result.exam_id).prop('disabled', true);
                        $('#proctor-name-for-exam-' + result.exam_id).addClass('d-none');
                        $('#proctor-not-found-' + result.exam_id).removeClass('d-none');
                    }
                },
                // error:function(result){
                //     $('#launch-exam-'+ result.exam_id).prop('disabled',true);
                // }
            });
        } else {
            alert('Please Enter Proctor ID');

        }

    });

    $(document).on('click', '.launch-exam', function() {
        let exam_id = $(this).data('exam-id');
        $(this).prop('disabled', true);

        $.ajax({
            url: "{{ route('proctors.can.start.exam') }}"
            , data: {
                "exam_id": exam_id
                , "_token": "{{ csrf_token() }}"
            }
            , type: "POST"
            , success: function(result) {
                $('.launch-exam[data-exam-id="' + result.exam_id + '"]').prop('disabled', true);
                $('#proctor-name-for-exam-' + result.exam_id).addClass('d-none');
                $('#proctor-not-found-' + result.exam_id).addClass('d-none');
                // setTimeout(function(){},)
                $('#exam-started-successfully-' + result.exam_id).removeClass('d-none');
                $('.check-proctor-password[data-exam-id="' + result.exam_id + '"]').prop('disabled', true);

                $('.stop-exam-btn[data-exam-id="'+ result.exam_id +'"]').removeClass('d-none');
                $('.start-exam-btn[data-exam-id="'+result.exam_id+'"]').addClass('d-none');
                $('.class-status-icon[data-exam-id="'+result.exam_id+'"]').addClass('fa-color-green');
                $('.start-exam-title[data-exam-id="'+result.exam_id+'"]').html("{{ TEST_OPEN_AND_ACTIVE }}")

            }
        , });
    })

    $(document).on('click','.stop-exam-btn',function(){
        let exam_id = $(this).data('exam-id');
        $.ajax({
            url:'{{ route("proctor.stop.exam") }}',
            data:{
                "_token":"{{ csrf_token() }}",
                "exam_id":exam_id 
            },
            type:"POST",
            success:function(response){
                examid = response.exam_id;
                $('.stop-exam-btn[data-exam-id="'+ examid +'"]').addClass('d-none');
                $('.start-exam-btn[data-exam-id="'+examid+'"]').removeClass('d-none');
                $('.class-status-icon[data-exam-id="'+examid+'"]').removeClass('fa-color-green');
                $('.start-exam-title[data-exam-id="'+examid+'"]').html("{{ TEST_NOT_STARTED }}");
                $('#exam-started-successfully-' + examid).addClass('d-none');
                 $('.launch-exam[data-exam-id="' + examid + '"]').prop('disabled', false);
                $('.check-proctor-password[data-exam-id="' + examid + '"]').prop('disabled', false);

            }
        });
    });

</script>
@endpush
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{ asset('frontend/css/datatable.css') }}">
@endpush
