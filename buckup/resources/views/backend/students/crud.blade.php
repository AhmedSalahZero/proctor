@extends('backend.layouts.layout')


@section('page_title',isset($ID) ? ('Edit User') : ('Create User'))


@section('page_left',isset($ID) ? ('Edit User') : ('Create User'))
@section('page_center',('Users'))
@section('page_center_link',route('students.index'))
@section('page_right',isset($ID) ? ('Edit User'):('Create User'))
@section('page_right_link',route('students.create'))

@section('content')
<style>
    .form-inline--items{
        display:flex; 
        flex-direction:column;
    }
    .form-inline--items .form-inline-items
    {
        display:flex;
    }
    .form-inline-items> .form--inline--item{
        flex: 1 1 0;
        
    }
</style>

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
                                    {{ (isset($ID) ? ('Edit User') :('Create User') )  }}
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right" method="post" action="{{$route}}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($ID))
                                @method('put')
                            @endif



                            <div class="kt-portlet__body">
                                <div class="form-group row">
                   

                                    <div class="col-lg-6">
                                        <label>User Full Name:</label>
                                        <input type="text"  name="Full_Name" class="form-control @error('Full_Name') is-invalid @enderror " value="{{$Full_Name}}" placeholder="Enter User Full Name" required>
                                        <span class="form-text text-muted">Please Enter User Full Name</span>
                                    </div>   <div class="col-lg-6">
                                        <label>User User Name:</label>
                                        <input type="text"  name="User_Name" class="form-control @error('User_Name') is-invalid @enderror " value="{{$User_Name}}" placeholder="Enter User User Name" >
                                        <span class="form-text text-muted">Please Enter User Name</span>
                                    </div>


                                    <div class="col-lg-6">
                                        <label>User Company:</label>
                                        <input type="text"  name="company" class="form-control @error('company') is-invalid @enderror " value="{{$company}}" placeholder="Enter User User Name" >
                                        <span class="form-text text-muted">Please Enter User Company</span>
                                    </div>


                                     <div class="col-lg-6 ">
                                                <label >Address:</label>
                                            <textarea rows="1" type="text" name="address"
                                                class="form-control @error('address') is-invalid @enderror "
                                                
                                                placeholder="Enter Exam Address" >{{ old('address') ?: (isset($certification) ? $certification->address : '')}}
                                        </textarea>
                                </div>


                                    <div class="col-lg-6">
                                        <label>User Type:</label>
                                        <select data-live-search="true" name="Type_ID" class="form-control kt-selectpicker" data-size="4">
                                            {{-- <option value="0"  >Select User Type</option> --}}
                                            <option value="1" selected  @if(isset($ID) && '1' === $Type_ID) selected @endif >Student</option>
                                            <option value="3"   @if(isset($ID) && '3' === $Type_ID) selected @endif>Proctor</option>
                                            <option value="2"   @if(isset($ID) && '2' === $Type_ID) selected @endif>Admin</option>
                                            <option value="4"   @if(isset($ID) && '4' === $Type_ID) selected @endif>Instructor</option>
                                        </select>
                                        <span class="form-text text-muted">Please Select User Type</span>

                                    </div>
                                    <div class="col-lg-6">
                                        <label>Default Email</label>
                                        <input type="text"  name="Email" class="form-control @error('Email') is-invalid @enderror " value="{{$Email}}" placeholder="Enter Default User Email" required>
                                        <span class="form-text text-muted">Please Enter Default User Email</span>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Alternative Email:</label>
                                        <input type="text"  name="alt_email" class="form-control @error('alt_email') is-invalid @enderror " value="{{$alt_email}}" placeholder="Enter Alternative User Email" >
                                        <span class="form-text text-muted">Please Enter Alternative User Email</span>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Phone:</label>
                                        <input type="number"  name="Phone" class="form-control @error('Phone') is-invalid @enderror " value="{{$Phone}}" placeholder="Enter User Phone" required>
                                        <span class="form-text text-muted">Please Enter User Phone</span>
                                    </div>


                                    <div class="col-lg-6">
                                        <label>Number Of Questions:</label>
                                        <input type="number"  name="questions_num" class="form-control @error('questions_num') is-invalid @enderror " value="{{$questions_num}}" placeholder="Enter Number Of Questions" required>
                                        <span class="form-text text-muted">Please Enter Questions Number </span>
                                    </div>


                                       <div class="col-lg-6 form-inline--items">
                                        <div class="form--inline--label">
                                            <label class="label">{{ __('Date Of Birth') }}:</label>
                                        </div>
                                    <div class="form-inline-items">
                                        <div class="form--inline--item">
                                            <select data-live-search="true" name="month_of_birth"  placeholder="{{ __('Month') }}" class="form-control" >
                                            @foreach (getMonths() as $month)
                                            <option @if(trim($month) == trim($month_of_birth)) selected @endif value="{{ trim($month) }}">{{ $month }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                        <div class="form--inline--item">
                                            <select data-live-search="true"  class="form-control form-control-sm" name="day_of_birth">
                                            @for($i = 1 ; $i<= 31 ; $i++) <option @if($i == $day_of_birth) selected @endif value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                        </select>

                                        </div>

                                    </div>
                                    </div>

                                @if(isset($ID))
                                    <div class="col-lg-6 password_div" >
                                        <label>Password:</label>
                                        <input type="text"  name="Password" class="form-control @error('Password') is-invalid @enderror password_field" value="{{$Password}}" placeholder="Enter User Password">
                                        <span class="form-text text-muted">Please Enter User Password</span>
                                    </div>

                                    @endif

                                    <div class="col-lg-6">
                                        <label>Course Type:</label>
                                        <select data-live-search="true" id="rule_select_id" name="course_type" class="form-control kt-selectpicker" data-size="4">
                                            {{-- <option value="0" selected>Select Course Type</option> --}}

                                            @foreach (\App\Models\CourseType::all() as $courseType)

                                                <option value="{{ $courseType->id }}" @if (isset($ID) && $ExamType == $courseType->id) selected @endif>{{ $courseType->name }}</option>
                                            @endforeach

                                        </select>
                                        <span class="form-text text-muted">Please Select Course Type</span>

                                    </div>



                                    <div class="col-lg-6">
                                        <label> Country </label>
                                        <select data-live-search="true" name="country" class="form-control kt-selectpicker" data-size="4">
                                            {{-- <option value="" selected>Select  Country </option> --}}

                                                                   @foreach (getAllCountries() as $c)

                                                <option value="{{$c}}" @if($country == $c) selected @endif>{{ $c}}</option>
                                            @endforeach

                                        </select>
                                        <span class="form-text text-muted">Please Select  Country</span>

                                    </div>

                                        <div class="col-lg-6">
                                        <label>City:</label>
                                        <input type="text"  name="city" class="form-control @error('city') is-invalid @enderror " value="{{$city}}" placeholder="Enter User User City" >
                                        <span class="form-text text-muted">Please Enter User City</span>
                                    </div>

                                    
                                        <div class="col-lg-6">
                                            <label>Postal Code:</label>
                                            <input type="text"  name="postal_code" class="form-control @error('postal_code') is-invalid @enderror " value="{{$postal_code}}" placeholder="Enter User Postal Code" >
                                            <span class="form-text text-muted">Please Enter User Postal Code</span>
                                       </div>


                                         <div class="col-lg-6">
                                            <label>Employee Id:</label>
                                            <input type="text"  name="employee_id" class="form-control @error('employee_id') is-invalid @enderror " value="{{$employee_id}}" placeholder="Enter User Employee Id" >
                                            <span class="form-text text-muted">Please Enter Employee Id</span>
                                       </div>


                                           <div class="col-lg-6">
                                        <label> Position </label>
                                        <select data-live-search="true" name="position" class="form-control kt-selectpicker" data-size="4">
                                            {{-- <option value="" selected>Select  position </option> --}}

                                                                   @foreach (getPositions() as $p)

                                                <option value="{{$p}}" @if($position == $p) selected @endif>{{ $p}}</option>
                                            @endforeach

                                        </select>
                                        <span class="form-text text-muted">Please Select  Position</span>

                                    </div>


                                      {{-- <div class="col-lg-6">
                                            <label>Postal Code:</label>
                                            <input type="text"  name="postal_code" class="form-control @error('postal_code') is-invalid @enderror " value="{{$postal_code}}" placeholder="Enter Student Postal Code" >
                                            <span class="form-text text-muted">Please Enter Student Postal Code</span>
                                       </div> --}}


                                       <div class="col-lg-6">
                                            <label>Image:</label>
                                            <input type="file"  name="image" class="form-control @error('image') is-invalid @enderror " value="{{$image}}" placeholder="Enter User Image" >
                                            <span class="form-text text-muted">Please Enter User Image</span>
                                       </div>







                                       





                                    @isset($ID)
                                        <input type="hidden" name="ID" value="{{$ID}}">

                                        @endisset




                                </div>


                            </div>




                            <div class="container-fluid when-instructor">
                                  <div class="form-group row">
                                   <div class="col-12 ">
                                   <h3>Instructor Certification </h3>
                                        <div class="row form-group">
                                             <div class="col-lg-6 ">
                                                <label >Description:</label>
                                            <textarea rows="5" type="text" name="description"
                                                class="form-control @error('description') is-invalid @enderror "
                                                
                                                placeholder="Enter Certification Description" required>{{ old('description') ?: (isset($certification) ? $certification->description : 
                                                
                                                getCertificationDescription())
                                                
                                                 }}
                                        </textarea>
                                </div>
                                 <div class="col-lg-6">
                                        <label>Courses:</label>
                                        <select data-live-search="true" multiple name="courses[]" class="form-control kt-selectpicker" data-size="4">
                                            {{-- <option value="0" selected>Select Courses</option> --}}

                                            @foreach (\App\Models\CourseType::all() as $courseType)

                                                <option value="{{ $courseType->id }}" @if (isset($certification) && in_array($courseType->id ,@($certification->courses? $certification->courses->pluck('id')->toArray() :[] )) ) selected @endif>{{ $courseType->name }}</option>
                                            @endforeach

                                        </select>
                                        <span class="form-text text-muted">Please Select Certification Courses </span>

                                    </div>

                                        </div>


                                  <div class="row form-group">
                                        <div class="col-lg-6">
                                            <label>Stack:</label>
                                            <input type="text"  name="stack" class="form-control @error('stack') is-invalid @enderror " value="{{old('stack') ?: (isset($certification) ? $certification->stack : null)}}" placeholder="Enter Certification Stack" >
                                            <span class="form-text text-muted">Please Enter Certification Stack</span>
                                       </div>


                                          <div class="col-lg-6">
                                            <label>Supplement:</label>
                                            <input type="text"  name="supplement" class="form-control @error('supplement') is-invalid @enderror " value="{{old('supplement')?:(isset($certification) ? $certification->supplement : null)}}" placeholder="Enter Certification Supplement" >
                                            <span class="form-text text-muted">Please Enter Certification Supplement</span>
                                       </div>


                                  </div>

                                     <div class="row form-group">
                                            <div class="col-lg-6">
                                            <label>Instructor Number:</label>
                                            <input type="text"  name="instructor_number" class="form-control @error('instructor_number') is-invalid @enderror " value="{{old('$certification->instructor_number') ?: (isset($certification) ? $certification->instructor_number : null)}}" placeholder="Enter Certification Instructor Number" >
                                            <span class="form-text text-muted">Please Enter instructor number</span>
                                       </div>

                                        <div class="col-lg-6">
                                            <label>Issued By:</label>
                                            <input type="text"  name="issued_by" class="form-control @error('issued_by') is-invalid @enderror " value="{{old('issued_by') ?: (isset($certification) ? $certification->issued_by:'') }}" placeholder="Enter Certification Issued By" >
                                            <span class="form-text text-muted">Please Enter Certification Issued By</span>
                                       </div>
                                     </div>
                                 <div class="row form-group">
                                           <div class="col-lg-6">
                                            <label>Certification Date:</label>
                                            <input type="date"  name="certificate_date" class="form-control @error('certificate_date') is-invalid @enderror " value="{{old('certificate_date') ?: (isset($certification) ? $certification->certificate_date  : '') }}" placeholder="Enter Certification Date" >
                                            <span class="form-text text-muted">Please Enter Certification Date</span>
                                       </div>

                                        <div class="col-lg-6">
                                            <label>Expiration Date:</label>
                                            <input type="date"  name="expiration_date" class="form-control @error('expiration_date') is-invalid @enderror " value="{{old('certificate_date' ) ?: (isset($certification) ? $certification->expiration_date : old('expiration_date'))  }}" placeholder="Enter Certification Expiration Date" >
                                            <span class="form-text text-muted">Please Enter Expiration Date</span>
                                       </div>
                                       
                                     </div>
                                       <div class="col-lg-6">
                                            <label>issuer position:</label>
                                            <input type="text"  name="issued_by_position" class="form-control @error('issued_by_position') is-invalid @enderror " value="{{old('issued_by_position') ?: (isset($certification) ? $certification->issued_by_position:'') }}" placeholder="Enter Certification issuer position" >
                                            <span class="form-text text-muted">Please Enter Certification issuer position</span>
                                       </div>
                                     



                                   

                                    </div>


                            </div>

                              </div>

                              
                              
                            </div>

                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-primary">@lang('Save')</button>
                                            <a href="{{route('students.index')}}"  class="btn btn-secondary">@lang('Cancel')</a>
                                        </div>
                                        <div class="col-lg-6 kt-align-right">
                                            <input type="reset" class="btn btn-danger" value="@lang('Reset')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>




                    <!--end::Form-->

                    <!--end::Portlet-->



                    <!--end::Portlet-->
                </div>
            </div>
        </div>

        <!-- end:: Content -->

@endsection


@section('js')
    <script src="{{asset('backend/assets/js/demo1/pages/crud/forms/widgets/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
    <script>
        $(function(){
            $('select[name="Type_ID"]').on('change', function(){
                let val = $(this).val();
                if(val == 4)
                {
                   $('.when-instructor').removeClass('d-none');
                }
                else{
                   $('.when-instructor').addClass('d-none');

                }
            }).trigger('change');
        })
    </script>
    <script>
          $(function() {
        $('select').selectpicker();
    })

    </script>

@endsection




