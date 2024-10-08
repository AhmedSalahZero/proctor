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
                                    <td class="td-for-main-datatable start-date-exam-class" data-exam-id="{{ $exam->id }}"> {{ $exam->getStartDateFormatted(true) }} </td>
                                    <td class="td-for-main-datatable end-date-exam-class" data-exam-id="{{ $exam->id }}"> {{ $exam->getEndDateFormatted(true) }} </td>
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
                                    <td class="td-for-main-datatable end-date-exam-class" data-exam-id="{{ $exam->id }}">{{ $exam->getStartDateFormatted(true) }} </td>
                                    <td class="td-for-main-datatable end-date-exam-class" data-exam-id="{{ $exam->id }}">{{ $exam->getEndDateFormatted(true) }} </td>
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
                                    <td class="td-for-main-datatable start-date-exam-class" data-exam-id="{{ $exam->id }}">{{ $exam->getStartDateFormatted() }} </td>
                                    <td class="td-for-main-datatable end-date-exam-class" data-exam-id="{{ $exam->id }}">{{ $exam->getEndDateFormatted(true) }} </td>
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





@include('backend.exams.js')
<script src="{{ asset('custom/updateRemaingTime.js') }}"></script>

@endpush
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{ asset('frontend/css/datatable.css') }}">
@endpush
