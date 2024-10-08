@extends('backend.layouts.layout')


@section('page_title',isset($id) ? ('Edit Exam') : ('Create Exam'))


@section('page_left',isset($id) ? ('Edit Exam') : ('Create Exam'))
@section('page_center',('Exams'))
@section('page_center_link',route('exams.index'))
@section('page_right',isset($id) ? ('Edit Exam'):('Create Exam'))
@section('page_right_link',route('exams.create'))

@section('content')


<!-- begin:: Subheader -->


<!-- end:: Subheader -->

<!-- begin:: Content -->


<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ (isset($id) ? ('Edit Exam') :('Create Exam') )  }}
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form kt-form--label-right" method="post" action="{{$route}}">
                    @csrf
                    @if(isset($id))
                    @method('put')
                    @endif



                    <div class="kt-portlet__body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Exam Name:</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " value="{{$title}}" placeholder="Enter Exam Name" required>
                                <span class="form-text text-muted">Please Enter Exam Name</span>
                            </div>

                            <div class="col-lg-6">
                                <label>Success Percentage: ( % )</label>
                                <input step="0.01" type="number" name="pass_percentage" class="form-control @error('pass_percentage') is-invalid @enderror " value="{{$pass_percentage}}" placeholder="Enter Success Percentage" required>
                                <span class="form-text text-muted">Please Enter Success Percentage</span>
                            </div>

                            <div class="col-lg-6">
                                <label>Zoom Link</label>
                                <input type="text" name="zoom_link" class="form-control @error('zoom_link') is-invalid @enderror " value="{{$zoom_link}}" placeholder="Enter Zoom Link" required>
                                <span class="form-text text-muted">Please Enter Success Percentage</span>
                            </div>

                         

                            



                              <div class="col-lg-6">
                                <label>Domain</label>
                                <input type="text" name="domain" class="form-control @error('domain') is-invalid @enderror " value="{{$domain ?? getCardDomain()}}" placeholder="For Example (www.example.com)" required>
                                <span class="form-text text-muted">Please Enter Domain</span>
                            </div>

                            <div class="col-lg-6">
                                <label>Stack</label>
                                <input type="text" name="stack" class="form-control @error('stack') is-invalid @enderror " value="{{$stack}}" placeholder="Enter Stack" required>
                                <span class="form-text text-muted">Please Enter Stack</span>
                            </div>


                            <div class="col-lg-6">
                                <label>Questions Number:</label>
                                <input type="number" name="no_questions" class="form-control @error('no_questions') is-invalid @enderror " value="{{$no_questions}}" placeholder="Enter Questions Number" required>
                                <span class="form-text text-muted">Please Enter Questions Number</span>
                            </div>

                            <div class="col-lg-6">
                                <label>Duration: ( Min )</label>
                                <input min="1" type="number" name="duration" class="form-control @error('duration') is-invalid @enderror " value="{{$duration}}" placeholder="Enter Duration " required>
                                <span class="form-text text-muted">Please Enter Duration</span>
                            </div>

                            <div class="col-lg-6">
                                <label>Exam Type:</label>
                                <select name="type" class="form-control kt-selectpicker" data-size="4">
                                    <option value="0" selected>Choose Exam Type</option>
                                    @foreach ($types as $data)
                                    <option value="{{$data}}" @if($type==$data || $type==null) selected @endif>{{ucfirst($data)}}</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Please Choose Exam Type</span>
                            </div>

                             <div class="col-lg-6">
                                <label>Delpoyment:</label>
                                <select name="deployment" class="form-control kt-selectpicker" data-size="4">
                                    <option value="0" selected>Choose Deployment</option>
                                    @foreach (getDeployments() as $examDeployment)
                                    <option value="{{$examDeployment}}" @if($examDeployment==$deployment || $deployment==null) selected @endif>{{ucfirst($examDeployment)}}</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Please Choose Deplyment</span>
                            </div>

                            <div class="col-lg-6">
                                <label>Proctor:</label>
                                <select name="proctor" class="form-control kt-selectpicker" data-size="4">
                                    <option value="0" selected>Choose Proctor </option>
                                    @foreach (\App\Models\Student::where('Type_ID',\App\Models\Student::PROCTOR)->get() as $proct)
                                    <option value="{{$proct->ID}}" @if($proctor==$proct->ID || $proct==null) selected @endif>{{ucfirst($proct->Full_Name)}}</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Please Choose Exam Proctor</span>
                            </div>


                            <div class="col-lg-6">
                                <label>Instructor:</label>
                                <select name="instructor_id" class="form-control kt-selectpicker" data-size="4">
                                    <option value="0" selected>Choose Instructor </option>
                                    @foreach (\App\Models\Student::where('Type_ID',\App\Models\Student::INSTRUCTOR)->get() as $instructor)
                                    <option value="{{$instructor->ID}}" @if($instructor_id==$instructor->ID || $instructor==null) selected @endif>{{ucfirst($instructor->Full_Name)}}</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Please Choose Exam Instructor</span>
                            </div>


                              <div class="col-lg-6">
                                <label>Country:</label>
                                <select name="country_id" class="form-control kt-selectpicker" data-size="4">
                                    {{-- <option value="" selected>Choose Instructor </option> --}}
                                    @foreach (\App\Models\Country::all() as $country)
                                    <option value="{{$country->id}}" @if($country_id==$country->id || !$country_id && $country->name =='Egypt' ) selected @endif>{{ucfirst($country->name)}}</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Please Choose Exam Instructor</span>
                            </div>



                            @include('backend.components.date-time-picker',[
                            'lang'=>App()->getLocale() ,
                            'required'=>true ,
                            'label'=>'Exam Date' ,
                            'name'=>'start_date',
                            'val'=>isset($exam)?$exam->start_date:old('start_date'),
                            ])

                             <div class="col-lg-6">
                                <label>Course Start Date :</label>
                            <input class="form-control" type="date" value="{{ old('course_start_date') ?: $course_start_date }}" name="course_start_date">
                               
                                <span class="form-text text-muted">Please Choose Course Start Date</span>
                            </div>

                             <div class="col-lg-6">
                                <label>Course End Date :</label>
                            <input class="form-control" type="date" value="{{ old('course_end_date') ?: $course_end_date }}" name="course_end_date">
                               
                                <span class="form-text text-muted">Please Choose Course End Date</span>
                            </div>

                            
                            <div class="col-lg-6 col-sm-12 margin_bottom_class ">
                                <div class="section_permission_name">Display</div>



                                <span class="kt-switch kt-switch--sm">
                                    <label>
                                        <input style="display: none" type="checkbox" name="display" @if(isset($exam) && $exam->display) checked @endif>
                                        <span></span>
                                    </label>
                                </span>

                            </div>

                            <div class="col-lg-12">
                                <label> Students </label>

                                <select id="select_students_id" name="students[]" multiple="" class="ui fluid search dropdown">
                                    @foreach(\App\Models\Student::all() as $student)
                                    <option value="{{$student->ID}}" @if(isset($exam) && $exam->students &&
                                        $exam->students->pluck('ID')->contains($student->ID) || ((old('students')) &&
                                        in_array(($student->ID),old('students') ) )) selected
                                        @endif>{{$student->Full_Name}}</option>
                                    @endforeach

                                </select>
                                <span class="form-text text-muted">Please Select Students </span>

                            </div>


                        </div>


                    </div>

                      <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ (isset($id) ? ('Edit Class Informations') :('Class Informations') )  }}
                            </h3>
                        </div>
                    </div>



                     <div class="kt-portlet__body">
                        <div class="form-group row">
                            {{-- <div class="col-lg-6">
                                <label>Exam Name:</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " value="{{$title}}" placeholder="Enter Exam Name" required>
                                <span class="form-text text-muted">Please Enter Exam Name</span>
                            </div>

                            <div class="col-lg-6">
                                <label>Success Percentage: ( % )</label>
                                <input step="0.01" type="number" name="pass_percentage" class="form-control @error('pass_percentage') is-invalid @enderror " value="{{$pass_percentage}}" placeholder="Enter Success Percentage" required>
                                <span class="form-text text-muted">Please Enter Success Percentage</span>
                            </div>

                            <div class="col-lg-6">
                                <label>Zoom Link</label>
                                <input type="text" name="zoom_link" class="form-control @error('zoom_link') is-invalid @enderror " value="{{$zoom_link}}" placeholder="Enter Zoom Link" required>
                                <span class="form-text text-muted">Please Enter Success Percentage</span>
                            </div> --}}

                            <div class="col-lg-6">
                                <label>Location</label>
                                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror " value="{{$location}}" placeholder="Enter Location" required>
                                <span class="form-text text-muted">Please Enter Location</span>
                            </div>

                              <div class="col-lg-6">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror " value="{{$address}}" placeholder="Enter Address" required>
                                <span class="form-text text-muted">Please Enter Address</span>
                            </div>

                            {{-- <div class="col-lg-6">
                                <label>Title </label>
                                <input type="text" name="class_title" class="form-control @error('class_title') is-invalid @enderror " value="{{$class_title}}" placeholder="Enter Class Title" required>
                                <span class="form-text text-muted">Please Enter Class Title</span>
                            </div> --}}

                              {{-- <div class="col-lg-6">
                                        <label>Latitude</label>
                                        <input type="text"  name="latitude" class="form-control @error('latitude') is-invalid @enderror " value="{{$latitude}}" placeholder="Enter Latitude" required>
                                        <span class="form-text text-muted">Please Enter Exam Latitude</span>
                            </div>

                                    <div class="col-lg-6">
                                        <label>Longitude</label>
                                        <input type="text"  name="longitude" class="form-control @error('longitude') is-invalid @enderror " value="{{$longitude}}" placeholder="Enter Longitude" required>
                                        <span class="form-text text-muted">Please Enter Exam Longitude</span>
                                    </div> --}}

                        </div>


                    </div>



                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ (isset($id) ? ('Edit Certification') :('Create Certification') )  }}
                            </h3>
                        </div>
                    </div>

                    @include('backend.certifications.form',[
                    'completed_date'=>isset($exam) ? optional($exam->certifications->first())->completed_date :
                    old('completed_date') ,
                    'supplement'=>isset($exam) ? optional($exam->certifications->first())->supplement : old('supplement') ,
                    'provider'=>isset($exam) ? optional($exam->certifications->first())->provider : old('provider')
                    , 'name'=>isset($exam) ? optional($exam->certifications->first())->name : old('name') ,
                    'course_type'=>isset($exam)?optional($exam->certifications->first())->course_type :'' ,
                    'provider_number'=>isset($exam)?optional($exam->certifications->first())->provider_number :'' ,
                    // 'instructor_name'=>isset($exam)?optional($exam->certifications->first())->instructor_name :'' ,
                    'telephone_number'=>isset($exam)?optional($exam->certifications->first())->telephone_number :'' ,
                    'skill_score'=>isset($exam)?optional($exam->certifications->first())->skill_score :0 ,
                    'course_date'=>isset($exam)?optional($exam->certifications->first())->course_date : null ,

                    ])
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('Save')</button>
                                    <a href="{{route('exams.index')}}" class="btn btn-secondary">@lang('Cancel')</a>
                                </div>
                                <div class="col-lg-6 kt-align-right">
                                    <input type="reset" class="btn btn-danger" value="@lang('Reset')">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <!--end::Form-->
            </div>

            <!--end::Portlet-->



            <!--end::Portlet-->
        </div>
    </div>
</div>

<!-- end:: Content -->




@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">


@endpush

@section('js')
<script src="{{asset('backend/assets/js/demo1/pages/crud/forms/widgets/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>

<script src="{{ asset('js/semantic.min.js') }}"></script>
<script>
    $('.ui.dropdown')
        .dropdown({
            allowAdditions: true
        });

</script>

@endsection

@push('js')

<script>



</script>
{{-- <script>--}}

{{-- document.addEventListener('keyup',function(event){--}}

{{-- if(event.target.className === 'search'){--}}


{{-- $.ajax({--}}
{{-- type: 'post',--}}
{{-- url: "/admin/filter-students/",--}}
{{-- data: {--}}
{{-- '_token':"{{csrf_token()}}",--}}
{{-- 'keyword':event.target.value--}}
{{-- },--}}
{{-- success: function (data) {--}}
{{-- if(data.status)--}}
{{-- {--}}
{{-- document.getElementById('select_students_id').innerHTML=''--}}
{{-- for(let i = 0 ; i<data.students.length ; i++)--}}
{{-- {--}}
{{-- document.getElementById('select_students_id').innerHTML +=`<option value="${data.students[i].ID}" >${data.students[i].User_Name}</option>`--}}
{{-- //   data.students[i].User_Name--}}
{{-- }--}}

{{-- }--}}
{{-- else{--}}
{{-- console.log('no students');--}}
{{-- }--}}
{{-- }, error: function (reject) {--}}
{{-- }--}}
{{-- });--}}

{{-- }--}}

{{-- })--}}
{{-- </script>--}}

@endpush
