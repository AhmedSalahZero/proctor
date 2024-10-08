@extends('backend.layouts.layout')


@section('page_title',('All Users'))
@section('page_left',('All Users'))
@section('page_center',('Users'))
@section('page_center_link',route('students.index'))
@section('page_right',('Users'))
@section('page_right_link',route('students.index'))
@push('style')
    <style>
        .custom_input
        {
            display: inline-block;
            width: 50%;

        }
        .custom_span
        {
            display: block;
        }
        .custom_search
        {
            margin-left: 43px;

        }
    </style>
@endpush
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="alert alert-light alert-elevate" role="alert">
            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
            <div class="alert-text">
          @lang('This Section Contains Sensitive Data .. Be Careful')
           </div>
        </div>
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        All Users
                    </h3>
                </div>
{{--                <div class="kt-portlet__head-toolbar">--}}
{{--                    <div class="kt-portlet__head-wrapper">--}}
{{--                        <div class="kt-portlet__head-actions">--}}
{{--                            <div class="dropdown dropdown-inline">--}}
{{--                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="la la-download"></i> Export--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <ul class="kt-nav">--}}
{{--                                        <li class="kt-nav__section kt-nav__section--first">--}}
{{--                                            <span class="kt-nav__section-text">Choose an option</span>--}}
{{--                                        </li>--}}
{{--                                        <li class="kt-nav__item">--}}
{{--                                            <a href="#" class="kt-nav__link">--}}
{{--                                                <i class="kt-nav__link-icon la la-print"></i>--}}
{{--                                                <span class="kt-nav__link-text">Print</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="kt-nav__item">--}}
{{--                                            <a href="#" class="kt-nav__link">--}}
{{--                                                <i class="kt-nav__link-icon la la-copy"></i>--}}
{{--                                                <span class="kt-nav__link-text">Copy</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="kt-nav__item">--}}
{{--                                            <a href="#" class="kt-nav__link">--}}
{{--                                                <i class="kt-nav__link-icon la la-file-excel-o"></i>--}}
{{--                                                <span class="kt-nav__link-text">Excel</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="kt-nav__item">--}}
{{--                                            <a href="#" class="kt-nav__link">--}}
{{--                                                <i class="kt-nav__link-icon la la-file-text-o"></i>--}}
{{--                                                <span class="kt-nav__link-text">CSV</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="kt-nav__item">--}}
{{--                                            <a href="#" class="kt-nav__link">--}}
{{--                                                <i class="kt-nav__link-icon la la-file-pdf-o"></i>--}}
{{--                                                <span class="kt-nav__link-text">PDF</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            &nbsp;--}}
{{--                            <a href="{{route('Students.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">--}}
{{--                                <i class="la la-plus"></i>--}}
{{--                                @lang('New Record')--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
{{--                            <div class="dropdown dropdown-inline">--}}
{{--                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="la la-filter"></i> Filter By--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <ul class="kt-nav">--}}
{{--                                        <li class="kt-nav__section kt-nav__section--first">--}}
{{--                                            <span class="kt-nav__section-text">@lang('Choose an option')</span>--}}
{{--                                        </li>--}}
{{--                                        <li class="kt-nav__item">--}}
{{--                                            <a  class="kt-nav__link " >--}}
{{--                                                <i class="kt-nav__link-icon la la-Students"></i>--}}
{{--                                                <span class="kt-nav__link-text filter_by_link" data-filter_by="all">@lang('All')</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}



{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            &nbsp;--}}
                            <a href="{{route('students.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                              New User
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="kt-portlet__body">

                <form action="{{route('search.students')}}" >
                    <div class="col-lg-12">
                        <label>Search :</label>
                        <input type="text"  name="search" class="form-control @error('search') is-invalid @enderror custom_input" value="{{Request()->query('search') ?? old('search') }}" placeholder="Enter User Id , Email , Phone , Address , User Name Or Type" required>
                        <button type="submit" class="btn btn-primary custom_search">Search</button>

                    </div>


                </form>

                <br>


                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>UserName</th>
                        <th>FullName</th>
                        <th>Default Email</th>
                        <th>Second Email</th>
                        <th>Type</th>
                        {{-- <th>Phone</th> --}}
                        <th>Password</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $key=>$student)
                        <tr >
                            <td >{{++$key}}</td>
                            <td>{{$student->User_Name}}</td>
                            <td>{{$student->Full_Name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->alt_email}}</td>
                            <td>{{$student->type}}
                            </td>
                            {{-- <td>{{$student->phone}}</td> --}}
                            <td>{{$student->Password}}</td>

                            <td style="border-right: transparent"></td>

                            <td colspan="2">

                                <a title="Assign Exam" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#assign_exam{{$student->ID}}_model">

                                    <i class="la la-clipboard"></i>
                                </a>

                                @include('backend.partials.confirm_modal',[
                                                                                      'operation'=>('Assign'),
                                                                                      'operationClass'=>'btn-info',
                                                                                      'target'=>"assign_exam".$student->ID."_model" ,
                                                                                      'title'=>('Assign Exam To ').$student->User_Name ,
                                                                                       'message'=>null,
                                                                                        'action'=>route('user.assign.exam',$student->ID),
                                                                                        'method'=>'POST' ,
                                                                                        'assign_to_exam'=>true ,
                                                                                        'userExams'=>$student->exams ,
                                                                                        'student'=>$student
                                                                                       ])

{{-- @if($student->certifications->count()) --}}
@if($student->hasCertifications())




                                    <a style="color: #93a2dd" type="button" data-toggle="modal" data-target="#modal_certification_{{$student->ID}}">
                                    <i class="fa fa-book-reader" aria-hidden="true"></i>
                                </a>

                                <div class="modal fade" id="modal_certification_{{$student->ID}}" tabindex="-1" role="dialog" aria-labelledby="modal_certification_{{$student->ID}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{$student->User_Name . ' Certifications' }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                                    <thead>
                                                    <tr>

                                                        <th>Course Type</th>
                                                        <th>Completed Date</th>
                                                        <th>Valid To</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($student->certifications as $certification)
                                                    <tr >



                                                            <td>{{$certification->course->name}}</td>
                                                            <td>{{$certification->completed_date}}</td>
                                                            <td>{{$certification->valid_to}}</td>



                                                        <td>
                                      <span style="overflow: visible; position: relative; width: 110px;">
                                          <a  title="Edit Certification" href="{{route('certifications.edit',$certification->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >
                                              <i class="la la-edit"></i>

                                          </a>

                                              <a  title="@if($certification->isDisplayed()) Hide @else Show @endif Certification" href="{{route('student.toggle.certification',[$student->ID,$certification->id,$certification->display])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >

                                            @if($certification->isDisplayed())

                                                      <i class="la la-unlock-alt"></i>

                                                  @else
                                                      <i class="la la-unlock"></i>

                                                  @endif
                                                </a>


{{--                                          Report--}}
                                             <a  target="_blank" title="View Report" href="{{route('view.single.report',[$certification->id])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >
                                              <i class="la la-certificate"></i>
                                          </a>

                                           <a   title="Download Report" href="{{route('download.single.report',[ $certification->id])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >
                                              <i class="la la-download"></i>
                                          </a>

                                            <a   title="Send Report" href="{{route('send.single.report',[ $certification->id])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >
                                              <i class="la la-mail-forward"></i>
                                          </a>




{{--                                          Advanced Certification--}}




                                              <a  target="_blank" title="View Certification" href="{{route('view.single.certification',[ $certification->id])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >
                                              <i class="la la-certificate"></i>
                                          </a>

                                           <a   title="Download Certification" href="{{route('download.single.certification',[$certification->id])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >
                                              <i class="la la-download"></i>
                                          </a>

                                            <a   title="Send Certification" href="{{route('send.single.certification',[ $certification->id])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >
                                              <i class="la la-mail-forward"></i>
                                          </a>




{{--                                          <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#edit_certification_{{$exam->certification->id}}_model">--}}

                                          {{--                                              <i class="la la-trash"></i>--}}
                                          {{--                                          </a>--}}

                                          {{--                                            @include('backend.partials.confirm_modal',[--}}
                                          {{--                                                                                        'operation'=>('Delete'),--}}
                                          {{--                                                                                        'operationClass'=>'btn-danger',--}}
                                          {{--                                                                                        'target'=>"edit_certification_".$exam->certification->id."_model" ,--}}
                                          {{--                                                                                        'title'=>('Delete').' '.$exam->certification->name . ' '.('Certification') ,--}}
                                          {{--                                                                                         'message'=>('Area You Sure To Delete This Record With All Associated Data ? '),--}}
                                          {{--                                                                                          'action'=>route('certifications.destroy',$exam->certification->id)--}}

                                          {{--                                                                                         ])--}}

                                      </span>
                                                        </td>


                                                    </tr>
                                                    @endforeach


                                                    </tbody>


                                                </table>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                {{--                                                <button type="button" class="btn btn-primary">Save changes</button>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endif

                            @if($student->exams->count())
                                <a title="Send Mail" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#send_mail_{{$student->id}}_model">

                                    <i class="la la-print"></i>
                                </a>
                                @include('backend.partials.confirm_modal',[
                                                                                      'operation'=>('Send Mail'),
                                                                                      'operationClass'=>'btn-info',
                                                                                      'target'=>"send_mail_".$student->id."_model" ,
                                                                                      'title'=>('Send Mail To ').$student->User_Name ,
                                                                                       'message'=>null,
                                                                                        'action'=>route('user.exam.mail',$student->ID),
                                                                                        'method'=>'POST' ,
                                                                                        'student_exams'=>$student->exams
                                                                                       ])
                                @endif
                                      <span style="overflow: visible; position: relative; width: 110px;">
                                          <a  title="Edit details" href="{{route('students.edit',$student->ID)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >
                                              <i class="la la-edit"></i>
                                          </a>



                                          <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#edit_student_{{$student->ID}}_model">

                                              <i class="la la-trash"></i>
                                          </a>

                                            @include('backend.partials.confirm_modal',[
                                                                                        'operation'=>('Delete'),
                                                                                        'operationClass'=>'btn-danger',
                                                                                        'target'=>"edit_student_".$student->ID."_model" ,
                                                                                        'title'=>('Delete').' '.$student->User_Name . ' '.('User') ,
                                                                                         'message'=>('Area You Sure To Delete This Record With All Associated Data ? '),
                                                                                          'action'=>route('students.destroy',$student->ID)

                                                                                         ])

                                      </span>
                            </td>
                            <td></td>

                        </tr>


                    @endforeach
                    </tbody>


                </table>
               


                @include('backend.partials.paginator',[
                    'model'=>$students
                ])

                <!--end: Datatable -->
            </div>
          
        </div>
        
    </div>

    

@endsection

@section('js')
    <script src="{{ asset('backend/assets/js/demo1/pages/crud/metronic-datatable/advanced/column-width.js') }}" type="text/javascript"></script>



@endsection
