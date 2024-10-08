@extends('instructor.layout')

@section('content')



<div class="section__header mt-4">
    <div class="section__top__header">{{ __('Search Options') }}</div>
    <div class="section__main__header">
        <div class="section__main__header__contianer">
            <form action="{{ route('instructor.browse.classes.index') }}" enctype="multipart/form-data" method="get" class="section__main_content">
                <div class="section__main_content__l">
                    <div class="section__main__content__content">

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('Class Title or ID')}}:</label>
                            <input name="class_title" type="text" placeholder="{{__('Class Title or ID')}}" value="{{old('class_title') ?: Request()->query('class_title')}}" class="form-control form-control-sm input-element">
                        </div>

                        <div class="form-container four-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('Date Filter')}}:</label>
                            <input name="from" type="date" placeholder="{{__('From')}}" value="{{old('from')?: Request()->query('from')}}" class="form-control form-control-sm input-element datepicker ">
                            {{__('To')}}
                            <input name="to" type="date" placeholder="{{__('To')}}" value="{{old('email')?: Request()->query('to')}}" class="form-control form-control-sm input-element datepicker ">

                        </div>

                         <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('Exam Date')}}:</label>
                            <input name="exam_date" type="date" placeholder="{{__('Exam Date')}}" value="{{old('exam_date')?: Request()->query('exam_date')}}" class="form-control form-control-sm input-element datepicker ">
                        </div>

                           <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('City')}}:</label>
                            <input name="city" type="text" placeholder="{{__('City')}}" value="{{old('city')?: Request()->query('city')}}" class="form-control form-control-sm input-element">
                        </div>

                        <div class="form-container three-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Country') }}:</label>
                            <select data-width="fit" data-show-tick="true" data-live-search-placeholder="{{ __('Select Country') }}" data-style="form-control" data-live-search="true" id="country_select" placeholder="{{ __('Country') }}" class="form-control form-control-sm" name="country">
                                <option value="{{ 0 }}">{{ 'All Countries' }}</option>
                                @foreach (getAllCountries() as $country)
                             
                                <option @if(Request()->query('country') == $country) selected @endif value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-container three-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('State') }}:</label>
                            <select data-live-search-placeholder="{{ __('Select State') }}" placeholder="{{ __('State') }}" name="state" data-width="fit" data-show-tick="true"  data-style="form-control" data-live-search="true"   class="form-control form-control-sm" >
                                @foreach (getStates() as $state)
                                <option value="{{ $state }}">{{ $state }}</option>
                                @endforeach
                            </select>
                        </div> --}}





                    </div>
                </div>
                <div class="section__main_content__r">
                    <div class="section__main__content__content">
                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Course') }}:</label>
                            <select placeholder="{{ __('Courses') }}" name="course" data-width="fit" data-show-tick="true" data-live-search-placeholder="{{ __('Select Course') }}" data-style="form-control" data-live-search="true" class="form-control form-control-sm">
                                <option value="">{{ __('All Courses') }}</option>
                                @foreach (getCourses() as $course)
                                <option  @if(Request()->query('course') == $course->id) selected @endif value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Instructors') }}:</label>
                            <select placeholder="{{ __('Instructors') }}" name="instructor" data-width="fit" data-show-tick="true" data-live-search-placeholder="{{ __('Select Instructors') }}" data-style="form-control" data-live-search="true" class="form-control form-control-sm">
                                <option value="">{{ __('All Instructors') }}</option>
                                @foreach (getInstructors() as $instructor)
                                <option @if(Request()->query('instructor') == $instructor->ID) selected @endif value="{{ $instructor->ID }}">{{ $instructor->getFullName() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Retakes') }}:</label>
                            <select placeholder="{{ __('Retakes') }}" data-live-search-placeholder="{{ __('Select Retakes') }}" name="retake" data-width="fit" data-show-tick="true" data-style="form-control" data-live-search="true" class="form-control form-control-sm">
                                @foreach (getRetaks() as $id=>$retake)
                                <option value="{{ $id }}">{{ $retake }}</option>
                                @endforeach
                            </select>
                        </div>


                          <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Deployment') }}:</label>
                            <select placeholder="{{ __('Deployment') }}" data-live-search-placeholder="{{ __('Select Deployment') }}" name="deployment" data-width="fit" data-show-tick="true" data-style="form-control" data-live-search="true" class="form-control form-control-sm">
                                @foreach (getDeployments() as $deployment)
                                <option @if(Request()->query('deployment') == $deployment) selected @endif value="{{ $deployment }}">{{ $deployment }}</option>
                                @endforeach
                            </select>
                        </div>





                    </div>
                </div>

                <div class="submit_btn__class text-right mt-4">
                    <button class="btn btn-sm btn-primary sm-btn text-capitalize" type="submit">
                        <i class="fas fa-search"></i>
                        <span>{{ __('Search Classes') }}</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="upcoming-container">
    <div class="uppcoming-content upcoming-full">
        <div class="calender-filter-container">
            <div class="calender-filter">
                <div class="calender--filter--header">
                    {{-- <div class="section__top__header">{{ __('Ongoing Classes') }}</div> --}}
                <div class="datatable--filter-select-div  text-center ">
                    <table class="datatable datatable-custom">
                        <thead class="datatable-thead">
                            <tr class="datatable-thead-tr">
                                <th class="datatable-th">class id</th>
                                <th class="datatable-th">title</th>
                                <th class="datatable-th">class status</th>
                                <th class="datatable-th">provider</th>
                                <th class="datatable-th">instructor</th>
                                <th class="datatable-th">location</th>
                                <th class="datatable-th">course</th>
                                <th class="datatable-th">exam date</th>
                                <th class="datatable-th">course date</th>
                                <th class="datatable-th">user</th>
                                <th class="datatable-th">retake</th>
                                <th class="datatable-th">duration</th>
                                <th class="datatable-th">deployment</th>
                                <th class="datatable-th">proctor</th>
                            </tr>
                        </thead>
                        <tbody class="datatable-tbody">
                            @foreach($exams as $exam) 
                            
                            <tr>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getClassId() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getClassTitle() }}
                                </td>
                                <td class="td-for-main-datatable text-nowrap">
                                    <i class="fas fa-circle fa-xs fa-color-blue
                                    @if($exam->getClassType() == 'past')
                                    fa-color-gray
                                    @endif 
                                    "></i>
                                    {{ $exam->getClassType() == 'past' ? 'Class Ended' : $exam->getClassType() }}
                                    </td>
                                <td class="td-for-main-datatable text-uppercase"> {{ $exam->getProviderName() }} </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getInstructorName() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getLocation() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getCourseName() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getStartDateFormatted() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getCourseDate() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->students->count() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getRetakeCount() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getDuration() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getDeployment() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getProctorName() }}
                                </td>
                                </tr>
                                @endforeach 

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>




</div>


</div>
@endsection
@push('js')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyD1pzxgf9AUfrWE2pLVQanO6Ti9a5lZDGo&libraries=places&region=eg&language=en"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $(function() {
        $('select').selectpicker();
    })

</script>



<script>
    

  

</script>

@endpush
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{ asset('frontend/css/datatable.css') }}">
@endpush
