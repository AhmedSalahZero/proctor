<div class="kt-portlet__body">
    <div class="form-group row">

        <div class="col-lg-6">
            <label>Course Date:</label>
            <input type="date" name="course_date" class="form-control @error('course_date') is-invalid @enderror " value="@if(old('course_date') ){{old('course_date')}}@elseif(isset($certification)){{$certification->course_date}}@endif" placeholder="Enter Course Date" required>
            <span class="form-text text-muted">Please Enter Course Date</span>
        </div>


        <div class="col-lg-6">
            <label>completion Date:</label>
            <input type="date" name="completed_date" class="form-control @error('completed_date') is-invalid @enderror " value="@if(old('completed_date') ){{old('completed_date')}}@elseif(isset($certification)){{$certification->completed_date}}@endif" placeholder="Enter Certification Completion Date" required>
            <span class="form-text text-muted">Please Enter Certification Completion Date</span>
        </div>
        @if(!isset($hideCourseType))
        <div class="col-lg-6">
            <label>Course Type:</label>
            <select id="rule_select_id" name="course_type" class="form-control kt-selectpicker" data-size="4">
                <option value="0" selected>Select Course Type</option>
                @foreach ($course_types as $courseType)
                <option value="{{ $courseType->id }}" @if (isset($id) && $course_type===$courseType->id) selected @endif>{{ $courseType->name }}</option>
                @endforeach
            </select>
            <span class="form-text text-muted">Please Select Course Type</span>
        </div>
        @endif

        <div class="col-lg-6">
            <label>Supplement:</label>
            <input type="text" name="supplement" class="form-control @error('supplement') is-invalid @enderror " value=" @if(old('supplement') ){{old('supplement')}}@elseif(isset($certification)){{$certification->supplement}}@endif" placeholder="Enter Supplement Name">
            <span class="form-text text-muted">Please Enter Supplement Name</span>
        </div>

        <div class="col-lg-6">
            <label>Provider:</label>
            <input type="text" name="provider" class="form-control @error('provider') is-invalid @enderror " value="@if(old('provider') ){{old('provider')}}@elseif(isset($certification)){{$certification->provider}}@endif" placeholder="Enter Provider Name">
            <span class="form-text text-muted">Please Enter Provider Name</span>
        </div>

        <div class="col-lg-6">
            <label>ID Number:</label>
            <input type="text" name="provider_number" class="form-control @error('provider_number') is-invalid @enderror " value="@if(old('provider_number') ){{old('provider_number')}}@elseif(isset($certification)){{$certification->provider_number}}@endif" placeholder="Enter ID Number" required>
            <span class="form-text text-muted">Please Enter ID Number</span>
        </div>


        <div class="col-lg-6">
            <label>Telephone Number:</label>
            <input type="text" name="telephone_number" class="form-control @error('telephone_number') is-invalid @enderror " value="@if(old('telephone_number') ){{old('telephone_number')}}@elseif(isset($certification)){{$certification->telephone_number}}@endif" placeholder="Enter Telephone Number" required>
            <span class="form-text text-muted">Please Enter Telephone Number</span>
        </div>

        <div class="col-lg-6">
            <label>Skill Score:</label>
            <input type="text" name="skill_score" class="form-control @error('skill_score') is-invalid @enderror " value="@if(old('skill_score') ){{old('skill_score')}}@elseif(isset($certification)){{$certification->skill_score}}@endif" placeholder="Enter Skill Score" required>
            <span class="form-text text-muted">Please Enter Skill Score For all Students</span>
        </div>




        @isset($student_exist)

        <div class="col-lg-6">
            <label> Student</label>

            <select id="select_students_id" name="student_id" class="ui fluid search dropdown">
                @foreach (\App\Models\Student::all() as $student)
                <option value="{{ $student->ID }}" @if (isset($id) && $student_id===$student->ID) selected @endif>
                    {{ $student->User_Name }}</option>
                @endforeach

            </select>
            <span class="form-text text-muted">Please Select Student </span>

        </div>

        {{-- <div class="col-lg-6"> --}}
        {{-- <label>Select Student</label> --}}
        {{-- <select id="student_id" name="student_id" class="form-control kt-selectpicker" data-size="4"> --}}
        {{-- <option value="0"  selected>Select Student</option> --}}

        {{-- @foreach (\App\Models\Student::all() as $student) --}}

        {{-- <option value="{{$student->ID}}" @if (isset($id) && $student_id === $student->ID) selected @endif>{{$student->User_Name}}</option> --}}
        {{-- @endforeach --}}

        {{-- </select> --}}
        {{-- <span class="form-text text-muted">Please Select Student</span> --}}

        {{-- </div> --}}
        @endisset
        @isset($checkbox)

        <div class="col-lg-6">
            <label>Score:</label> <br>
            <input style="display: inline-block;width: 70%;margin-right: 10px" type="number" step="0.1" name="score" class="form-control @error('score') is-invalid @enderror " value="@if(old('score') ){{old('score')}}@elseif(isset($certification)){{$certification->score}}@endif" placeholder="Enter Exam Score" required>
            <label style="display: inline-block">Passed:</label>
            <input style="display: inline-block;font-size: 110%;" type="checkbox" name="passed" class="custom-checkbox @error('score') is-invalid @enderror " @if (isset($id) && (bool) $passed) checked @else {{ old('score') ? 'checked' : '' }} @endif>

        </div>

        @endisset


        {{-- <div class="col-lg-6 call_at_div"> --}}
        {{-- <label>@lang('Came From'):</label> --}}

        {{-- <input autocomplete="off"  name="call_at" type="text" class="form-control" placeholder="@lang('Select Call Time')" id="kt_datetimepicker_5" value="{{$call_at}}"/> --}}
        {{-- --}}{{-- <div class="input-group-append"> --}}
        {{-- --}}{{-- <span class="input-group-text"> --}}
        {{-- --}}{{-- <i class="la la-calendar glyphicon-th"></i> --}}
        {{-- --}}{{-- </span> --}}
        {{-- --}}{{-- </div> --}}
        {{-- <span class="form-text text-muted">@lang('Please Enter Call Date')</span> --}}
        {{-- </div> --}}


        {{-- @if (isset($id)) --}}

        {{-- <input type="hidden" name="certification_id" value="{{$id}}"> --}}

        {{-- @endif --}}

    </div>


</div>
