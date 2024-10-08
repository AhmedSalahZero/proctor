@extends('instructor.layout')

@section('content')
@include('map.map')

<div class="upcoming-container">
    <div class="uppcoming-content grid">
        <div class="upcoming-tables">
            <div class="section__top__header text-center">{{ __('Ongoing/ Upcoming Classes') }}</div>
            <table class="table">
                <thead class="table-upcoming-thead">
                    <tr class="table-upcoming-thead-tr  ">
                        <th class="table-head-th text-center">{{ __('Test Status') }}</th>
                        <th class="table-head-th text-center">{{ __('Course Dates') }}</th>
                        <th class="table-head-th text-center">{{ __('Location') }}</th>
                    </tr>
                </thead>
                <tbody class="table-upcoming-tbody">
                    @foreach(array_merge($exams['upcoming'] , $exams['ongoing']) as $exam)
                    <tr class="table-upcoming-tbody-tr tr_for_ongoing_course clickable-tr" data-exam-id="{{ $exam->id }}" data-toggle="modal" data-target="#ongoing_course_{{ $exam->id }}">
                        <td class="table-upcomming-tbody-td ">

                           @if(!$exam->display && $exam->end)
						    <i class="fas fa-circle fa-xs fa-color-gray">
                            </i>
                            <span class="table-td-text">{{ TEST_ENDED }}</span>
						    @elseif($exam->display)
                            <i class="fas fa-circle fa-xs fa-color-blue fa-color-green">
                            </i>
                            <span class="table-td-text">Test Open And Active</span>
                            @else
                            <i class="fas fa-circle fa-xs fa-color-blue">
                            </i>
                            <span class="table-td-text">test not started</span>

                            @endif
                        </td>
                        <td class="table-upcomming-tbody-td "> <span class="table-td-text">
                                {{ $exam->getCourseDate() }}
                            </span> </td>
                        <td class="table-upcomming-tbody-td "> <span class="table-td-text">
                                {{ $exam->getLocation() }}
                            </span> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @foreach(array_merge($exams['upcoming'] , $exams['ongoing'] , $exams['past']) as $exam)
            @include('class-dashboard' , [
            'classType'=>$exam->getClassType()
            ])
            @endforeach



        </div>
        <div class="calender-filter-container">
            <div class="calender-filter">
                <div class="calender--filter--header">
                    <div class="section__top__header">{{ __('Calendar Filters') }}</div>
                    <div class="calender--filter-select-div text-center ">
                        <select id="filter-calendar" multiple data-width="fit" data-style="form-control" data-show-tick="true" data-live-search-normalize="false" data-live-search-placeholder="{{ __('Select Courses') }}" data-live-search="true" placeholder="{{ __('Month') }}" class="form-control form-control-sm " name="date_of_birth">
                            <option value="" selected>{{ __('All Course') }}</option>
                            @foreach (getCourses() as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <a href="#" class="custom__links text-white mr-auto"> {{ __('Filter') }}</a>
                    </div>
                </div>
            </div>

            <div class="calender-schdule--container mt-3">
                <div class="section__top__header">{{ __('Calendar Schedule') }}</div>
                <div class="calender--container">
                    <div id='calendar'></div>
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

@endpush
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush
