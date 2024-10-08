@extends('backend.layouts.layout')


@section('page_title',('All Scores'))
@section('page_left',('All Scores'))
@section('page_center',('Scores'))
@section('page_center_link',route('students-scores'))
@section('page_right',('Students Score'))
@section('page_right_link',route('students-scores'))
@push('style')

    <link href="{{ asset('backend/assets/css/demo1/custom_fields.css') }}" rel="stylesheet" type="text/css" />




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
                        All Students Scores
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">

{{--                            <a href="{{route('stacks.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">--}}
{{--                                <i class="la la-plus"></i>--}}
{{--                              New Subject--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="kt-portlet__body">
{{--Disabled Temporary--}}
{{--                <form action="{{ route('score.search') }}" method="GET">--}}
{{--                    @csrf--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <label>Exam :</label>--}}
{{--                        <select name="exam_id" class="form-control kt-selectpicker custom_input" data-size="4">--}}
{{--                            <option value="0" selected>Choose Exam Type</option>--}}
{{--                            @foreach (\App\Models\Exam::all() as $exam)--}}
{{--                                <option value="{{ $exam->id }}" {{ $exam->id == Request()->query('exam_id') ? 'selected' : '' }}>--}}
{{--                                    {{ $exam->title }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        <button type="submit" class="btn btn-primary custom_search">Search</button>--}}
{{--                    </div>--}}
{{--                </form>--}}

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>Student Name</th>
                            <th>Student Email</th>

                            <th> Started At </th>
                            <th>Finished At</th>
                            <th > Score </th>



                            <th hidden> Actions </th>
                            <th style="position: absolute;right: -5px" >  </th>
                            <th style="position: absolute;right: -5px"  colspan="4"></th>

                        </tr>
                    </thead>
                    <tbody>

                          @foreach($results as $key=>$result)

                              <tr >
                                  <td >{{++$key}}</td>
                                  <td>{{$result->student->UserName}}</td>
                                  <td>{{$result->student->email}}</td>
{{--                                  <td  >--}}
{{--                                        {{$exam->title}}--}}
{{--                                  </td>--}}

                                  <td >

                                      {{\Carbon\Carbon::make($result->Started_At)->format('M d , Y g:i A')}}
{{--                                      @if($exam->end_date)--}}
{{--                                      {{\Carbon\Carbon::make($exam->end_date)->format('M d , Y  g:i A')}}--}}
{{--                                  @endif--}}
                                  </td>

                                  <td
                                      {{--                                      id="passed_{{ $certification->id }}"--}}

                                  >
                                      {{\Carbon\Carbon::make($result->Finished_At)->format('M d , Y g:i A')}}
                                      {{--                                      @if($certification->hasPassed())--}}

                                      {{--                                          Passed--}}

                                      {{--                                      @else--}}

                                      {{--                                          Fail--}}

                                      {{--                                      @endif--}}

                                      {{--                                      <span style="overflow: visible; position: relative; width: 110px;">--}}

                                      {{--                                          @unless($stack->exam)--}}
                                      {{--                                          <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#edit_stack_{{$stack->id}}_model">--}}

                                      {{--                                              <i class="la la-trash"></i>--}}
                                      {{--                                          </a>--}}

                                      {{--                                            @include('backend.partials.confirm_modal',[--}}
                                      {{--                                                                                        'operation'=>('Delete'),--}}
                                      {{--                                                                                        'operationClass'=>'btn-danger',--}}
                                      {{--                                                                                        'target'=>"edit_stack_".$stack->id."_model" ,--}}
                                      {{--                                                                                        'title'=>('Delete').' '.$stack->name . ' '.('Stack') ,--}}
                                      {{--                                                                                         'message'=>('Area You Sure To Delete This Record With All Associated Data ? '),--}}
                                      {{--                                                                                          'action'=>route('stacks.destroy',$stack->id)--}}
                                      {{--                                                                                         ])--}}
                                      {{--                                          @endunless--}}
                                      {{--                                      </span>--}}
                                  </td>


                                  <td
{{--                                      contenteditable=""--}}
{{--                                      id="score_{{ $student->ID }}_{{ $exam->id }}"--}}
{{--                                      class="score_class"--}}
{{--                                      data-student="{{ $student->ID }}"--}}
{{--                                      data-exam="{{ $exam->id }}"--}}
                                  >

                                      {{ $result->Result . ' %' }}
                                  </td>



                                 <td style="position: absolute;right: -5px">
{{--                                     <a  title="Edit details" data-toggle="modal" data-target="#edit_certification_number_{{$certification->id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >--}}
{{--                                         <i class="la la-edit"></i>--}}
{{--                                     </a>--}}
{{--                                     <form method="post" action="{{route('update.score')}}" class="form_score_{{$certification->id}}">--}}
{{--                                     <div class="modal fade" id="edit_certification_number_{{$certification->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--                                         <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                                             <div class="modal-content">--}}
{{--                                                 <div class="modal-header">--}}
{{--                                                     <h5 class="modal-title" id="exampleModalLongTitle">Edit Certification Score {{$certification->id}}</h5>--}}
{{--                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                         <span aria-hidden="true">&times;</span>--}}
{{--                                                     </button>--}}
{{--                                                 </div>--}}
{{--                                                 <div class="modal-body">--}}

{{--                                                         @csrf--}}

{{--                                                         <div class="col-lg-12">--}}
{{--                                                             <label>Score:</label> <br>--}}
{{--                                                             <input style="display: inline-block;width: 70%;margin-right: 10px" type="number" step="0.1" name="score"--}}
{{--                                                                    class="form-control @error('score') is-invalid @enderror " value="{{ $certification->score() }}"--}}
{{--                                                                    placeholder="Enter Exam Score" required>--}}
{{--                                                             <input type="hidden" value="has_exam" name="type">--}}
{{--                                                             <input type="hidden" value="{{$certification->id}}" name="certification_id">--}}
{{--                                                             <input type="hidden" value="{{$certification->student_id}}" name="student_id">--}}
{{--                                                         @unless($certification->exam_id)--}}
{{--                                                                 <input type="hidden" value="without_exam" name="type">--}}
{{--                                                             <label style="display: inline-block">Passed:</label>--}}
{{--                                                             <input style="display: inline-block;font-size: 110%;" type="checkbox" name="passed"--}}
{{--                                                                    class="custom-checkbox @error('score') is-invalid @enderror "  @if($certification->hasPassed()) checked @else {{ old('score') ? 'checked' : '' }} @endif>--}}
{{--                                                             @else--}}
{{--                                                                 <input type="hidden" value="{{$certification->exam_id}}" name="exam_id">--}}

{{--                                                             @endunless--}}
{{--                                                             @if($certification->exam_id)--}}

{{--                                                                 @endif--}}
{{--                                                         </div>--}}


{{--                                                 </div>--}}
{{--                                                 <div class="modal-footer">--}}
{{--                                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                     <button data-certification="{{$certification->id}}" type="submit" class="submit_score btn btn-primary">Save </button>--}}
{{--                                                 </div>--}}
{{--                                             </div>--}}
{{--                                         </div>--}}
{{--                                     </div>--}}
{{--                                     </form>--}}
                                 </td>


                                  <td style="position: absolute;right: -5px" ></td>
                                  <td style="position: absolute;right: -5px" ></td>
                                  <td style="position: absolute;right: -5px" ></td>
                              </tr>

                          @endforeach
                    </tbody>


                </table>

                @include('backend.partials.paginator',['model'=>$results])


            <!--end: Datatable -->
            </div>

        </div>

    </div>



@endsection

@section('js')
    <script src="{{ asset('backend/assets/js/demo1/pages/crud/metronic-datatable/advanced/column-width.js') }}" type="text/javascript"></script>

    {{--    <script>--}}
{{--        const stackTypesLinks  = document.getElementsByClassName('filter_by_link');--}}
{{--        Array.from(stackTypesLinks).forEach(function(stackTypeLink){--}}
{{--            stackTypeLink.addEventListener('click',function(event){--}}
{{--                const rule = event.target.getAttribute('data-filter_by') ;--}}
{{--                const AllRules = document.getElementsByClassName('role_all');--}}
{{--                Array.from(AllRules).forEach(function(Rule){--}}

{{--                   Rule.style.display ='none';--}}
{{--                });--}}
{{--                const selectedRules = document.getElementsByClassName('role_'+rule) ;--}}
{{--                Array.from(selectedRules).forEach(function(selectedRule){--}}
{{--                    selectedRule.style.display = 'table-row';--}}
{{--                })--}}

{{--            });--}}
{{--        });--}}

{{--    </script>--}}

<script>


    $(document).on('focus', '.score_class', function(event) {
        let exam = $(event.target).attr('data-exam');
        let student = $(event.target).attr('data-student');
        //     let score = event.target.innerText ;
        document.getElementById(`score_${student}_${exam}`).innerText = ''
    });

    $(document).on('focusout', '.score_class', function(event) {
      //  console.log('lost fouces')
        let exam = $(event.target).attr('data-exam');
        let student = $(event.target).attr('data-student');
        let score = event.target.innerText;


        if ((isNaN(score)) || event.target.innerText == '') {

        } else {

            $.ajax({
                type: 'post',
                url: "/admin/set-score/" + student + "/" + exam,
                data: {
                    '_token': "{{ csrf_token() }}",
                    'score': score
                },
                success: function(data) {
                    if (data.status) {

                        document.getElementById(`score_${student}_${exam}`).innerText = data.score
                    }


                },
                error: function(reject) {}
            });
        }


        $.ajax({
            type: 'post',
            url: "/admin/has-score/" + student + "/" + exam,
            data: {
                '_token': "{{ csrf_token() }}",
                'score': score
            },
            success: function(data) {
                if (data.HasScore) {
                    document.getElementById(`score_${student}_${exam}`).innerText = data.score +
                        ' %' ;
                    document.getElementById(`passed_${student}_${exam}`).innerText = data.passed ? 'Passed' : 'Fail';

                } else {
                    document.getElementById(`score_${student}_${exam}`).innerText =
                        'No Score Yet ( Click To Edit )'
                }
            },
            error: function(reject) {}
        });
    });

    {{--$(document).on('click keyup', '.score_class', function(event) {--}}
    {{--    let exam = $(event.target).attr('data-exam');--}}
    {{--    let student = $(event.target).attr('data-student');--}}
    {{--    let score = event.target.innerText;--}}
    {{--    if ((isNaN(score)) || event.target.innerText == '') {--}}

    {{--    } else {--}}

    {{--        $.ajax({--}}
    {{--            type: 'post',--}}
    {{--            url: "/admin/set-score-all/" + student + "/" + exam,--}}
    {{--            data: {--}}
    {{--                '_token': "{{ csrf_token() }}",--}}
    {{--                'score': score--}}
    {{--            },--}}
    {{--            success: function(data) {--}}
    {{--                if (data.status) {--}}

    {{--                    document.getElementById(`score_${student}_${exam}`).innerText = data.score--}}
    {{--                }--}}


    {{--            },--}}
    {{--            error: function(reject) {}--}}
    {{--        });--}}
    {{--    }--}}
    {{--});--}}

    {{--$(document).on('focus', '.score_class', function(event) {--}}
    {{--    let exam = $(event.target).attr('data-exam');--}}
    {{--    let student = $(event.target).attr('data-student');--}}
    {{--    document.getElementById(`score_${student}_${exam}`).innerText = ''--}}
    {{--});--}}

    {{--$(document).on('focusout', '.score_class', function(event) {--}}
    {{--    let exam = $(event.target).attr('data-exam');--}}
    {{--    let student = $(event.target).attr('data-student');--}}
    {{--    let score = event.target.innerText;--}}
    {{--    $.ajax({--}}
    {{--        type: 'post',--}}
    {{--        url: "/admin/has-score-all/" + student + "/" + exam,--}}
    {{--        data: {--}}
    {{--            '_token': "{{ csrf_token() }}",--}}
    {{--            'score': score--}}
    {{--        },--}}
    {{--        success: function(data) {--}}
    {{--            if (data.HasScore) {--}}
    {{--                document.getElementById(`score_${student}_${exam}`).innerText = data.score +--}}
    {{--                    ' %'--}}
    {{--            } else {--}}
    {{--                document.getElementById(`score_${student}_${exam}`).innerText =--}}
    {{--                    'No Score Yet ( Click To Edit )'--}}
    {{--            }--}}
    {{--        },--}}
    {{--        error: function(reject) {}--}}
    {{--    });--}}
    {{--});--}}
</script>
@endsection
