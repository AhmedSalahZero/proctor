@extends('backend.layouts.layout')


@section('page_title', 'All Exams')
@section('page_left', 'All Exams')
@section('page_center', 'Exams')
@section('page_center_link', route('exams.index'))
@section('page_right', 'Exams')
@section('page_right_link', route('exams.index'))

@push('style')
<style>
    .custom_input {
        display: inline-block;
        width: 50%;

    }

    .custom_span {
        display: block;
    }

    .custom_search {
        margin-left: 43px;

    }

    .score_class {
        min-width: 213px;
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
                    All Exams
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        <a href="{{ route('exams.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            New Exam
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="kt-portlet__body">

            <form action="{{ route('search.exams') }}">
                <div class="col-lg-12">
                    <label>Search :</label>
                    <input type="text" name="search" class="form-control @error('search') is-invalid @enderror custom_input" value="{{ Request()->query('search') ?? old('search') }}" placeholder="Enter Exam Id Or Name" required>
                    <button type="submit" class="btn btn-primary custom_search">Search</button>

                    <span class="form-text text-muted custom_span">Search Using Exam Id Or Exam Name</span>

                </div>


            </form>


            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Title</th>
                        <th>NO Questions</th>
                        <th>Duration</th>
                        <th>Start Date</th>
                        <th>Display</th>
                        <th hidden>Zoom Link</th>
                        <th>Type</th>
                        <th>Percentage</th>
                        <th>Mails</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($exams as $key => $exam)
                    <tr>

                        <td>{{ ++$key }}</td>
                        <td>{{ $exam->title }}</td>
                        <td>{{ $exam->no_questions }}</td>
                        <td>{{ $exam->duration . ' Min' }}</td>
                        <td>{{ format_date_time($exam->start_date) }}</td>
                        <td>

                            @if($exam->display)
                            <a data-exam="{{$exam->id}}" data-status="{{$exam->display}}" id="display_exam_{{$exam->id}}" title="Absence" href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md display_exam_class" type="button">
                                <i data-exam="{{$exam->id}}" data-status="{{$exam->display}}" id="exam_on_id_{{$exam->id}}" class="la la-toggle-on  display_exam_class" style="font-size: 2.0rem;"></i>
                            </a>
                            @else
                            <a data-exam="{{$exam->id}}" data-status="{{$exam->display}}" id="display_exam_{{$exam->id}}" title="Absence" href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md display_exam_class" type="button">
                                <i data-exam="{{$exam->id}}" data-status="{{$exam->display}}" id="exam_off_id_{{$exam->id}}" class="la la-toggle-off display_exam_class " style="font-size: 2.0rem; "></i>
                            </a>
                            @endif

                            {{-- {{$exam->display}}--}}
                        </td>
                        <td>
                            {{ $exam->type }}
                        </td>
                        <td>{{ $exam->pass_percentage . ' %' }}</td>

                        <td>

                            <button style="white-space: nowrap" type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#skill_score_{{ $exam->id }}_model">
                                Skill Score
                            </button>

                            <button style="white-space: nowrap" type="button" class="btn btn-primary" data-toggle="modal" data-target="#send_mail_{{ $exam->id }}_model">
                                Send Mail
                            </button>

                            <div class="modal fade" id="skill_score_{{ $exam->id }}_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Skill Score</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>


                                        </div>
                                        <form class="form" action="{{ route('save.skill.report') }}" method="post">

                                            <div class="modal-body">
                                                <table class="table table-border table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Exam</th>
                                                            <th>Student Name</th>
                                                            <th>Score</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($exam->students as $key=>$student)
                                                        <tr>
                                                            <td>{{ ++ $key }}</td>
                                                            <td> {{ $exam->title }} </td>
                                                            <td>{{ $student->getFullName() }}</td>
                                                            <td>
                                                                @csrf
                                                                <input @if(! $student->certifications->first())
                                                                disabled
                                                                @endif
                                                                class="form-control" name="skill_scores[{{ $student->ID }}]" value="{{ $student->certifications->first()->skill_score ?? 0 }}">
                                                                <input type="hidden" name="certification_id[{{ $student->ID }}]" value="{{ $student->certifications->first()->id ?? 0  }}">
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Skill Report </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            @include('backend.partials.confirm_modal',[
                            'operation'=>('Send Mail'),
                            'operationClass'=>'btn-info',
                            'target'=>"send_mail_".$exam->id."_model" ,
                            'title'=>('Send Mail To All Users Of').' '.$exam->title . ' '.('Exam') ,
                            'message'=>('Area You Sure To Send Mail This All Users Of ' . $exam->title . ' Exam ?'
                            ),
                            'action'=>route('exams.mail',$exam->id),
                            'method'=>'POST'
                            ])



                        </td>



                        <td>
                            <span style="overflow: visible; position: relative; width: 110px;">

                                @if ($exam->students->count())

                                <a title="Users" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#exam_users_{{ $exam->id }}">

                                    <i class="la la-users"></i>
                                </a>


                                <div class="modal fade" id="exam_users_{{ $exam->id }}" tabindex="-1" role="dialog" aria-labelledby="exam_users_{{ $exam->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exam_users_{{ $exam->id }}Title">
                                                    {{ $exam->title }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Absence</th>
                                                            <th>Score</th>

                                                            {{-- <th>Valid To</th> --}}
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($exam->students as $student)
                                                        <tr>


                                                            <td>{{ $student->getFullName() }}</td>
                                                            <td>{{ $student->email }}</td>
                                                            <td id="mark_{{ $student->ID }}_{{ $exam->id }}">
                                                                @if ($student->HasAbsenceExam())
                                                                <i class="la la-check"></i>
                                                                @else
                                                                <i class="la la-close"></i>

                                                                @endif
                                                            </td>
                                                            <td contenteditable="" id="score_{{ $student->ID }}_{{ $exam->id }}" class="score_class" data-student="{{ $student->ID }}" data-exam="{{ $exam->id }}">
                                                                {{ $student->getExamScore() }}
                                                            </td>
                                                            {{-- <td>{{$student->valid_to}}</td> --}}




                        <td>
                            <span style="overflow: visible; position: relative; width: 110px;">
                                <a title="Edit Student" href="{{ route('students.edit', $student->ID) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">
                                    <i class="la la-edit"></i>

                                </a>
                                <a title="Delete User" href="{{ route('exam.detach.user', [$student->ID, $exam->id]) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">

                                    <i class="la la-remove"></i>
                                </a>
                                <a data-student="{{ $student->ID }}" data-exam="{{ $exam->id }}" data-status="{{ (int) $student->HasAbsenceExam() }}" id="absence_{{ $student->ID }}_{{ $exam->id }}" title="Absence" href="{{ route('student.toggle.absence', [$student->ID, $exam->id]) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md absence_class" type="button">
                                    @if ($student->absenceExam($exam->id))
                                    <i data-student="{{ $student->ID }}" data-exam="{{ $exam->id }}" data-status="{{ (int) $student->HasAbsenceExam() }}" id="on_id" class="la la-toggle-on absence_class"></i>
                                    @else
                                    <i data-student="{{ $student->ID }}" data-exam="{{ $exam->id }}" data-status="{{ (int) $student->HasAbsenceExam() }}" id="off_id" class="la la-toggle-off absence_class"></i>
                                    @endif
                                </a>



                            </span>
                        </td>


                    </tr>
                    @endforeach


                </tbody>


            </table>



        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
    </div>
</div>
</div>
@endif



{{-- <a title="Send Mail" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#send_mail_{{$exam->id}}_model"> --}}

{{-- <i class="la la-print"></i> --}}
{{-- </a> --}}





{{-- <a title="@if ($exam->hasQuestions()) Edit @else
                                            Create @endif Questions"
                                            href="{{ route('exams.questions.' . ($exam->hasQuestions() ? 'edit' : 'create'), $exam->hasQuestions() ? [$exam->id, 1] : [$exam->id, 'exam_id' => $exam->id]) }}"
class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button" >
<i class="la la-question"></i>
</a> --}}

@if(Auth('admins')->check() || ! Auth('students')->user()->isProctor())
<a title="Edit Exam" href="{{ route('exams.edit', $exam->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">
    <i class="la la-edit"></i>
</a>

@if($exam->students->first() && $exam->students->first()->certifications->last())

<a title="Download Roster" href="{{ route('download.roster', $exam->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">
    <i class="la la-sticky-note"></i>
</a>
@endif

<a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#edit_certification_{{ $exam->id }}_model">

    <i class="la la-trash"></i>
</a>

@include('backend.partials.confirm_modal',[
'operation'=>('Delete'),
'operationClass'=>'btn-danger',
'target'=>"edit_certification_".$exam->id."_model" ,
'title'=>('Delete').' '.$exam->name . ' '.('Exam') ,
'message'=>('Area You Sure To Delete This Record With All Associated Data ? '),
'action'=>route('exams.destroy',$exam->id)

])
@endif
</span>
</td>
<td></td>

</tr>


@endforeach
</tbody>


</table>

@include('backend.partials.paginator',[
'model'=>$exams
])


<!--end: Datatable -->
</div>

</div>

</div>



@endsection

@section('js')
<script src="{{ asset('backend/assets/js/demo1/pages/crud/metronic-datatable/advanced/column-width.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    document.addEventListener('click', function(event) {
        let targetClass = event.target.className;

        console.log(targetClass);


        if (targetClass.includes('absence')) {
            event.preventDefault();

            let Absence = event.target.getAttribute('data-status');
            let Exam = event.target.getAttribute('data-exam');
            let Student = event.target.getAttribute('data-student');



            $.ajax({
                type: 'post'
                , url: "/admin/absence-students/" + Student + "/" + Exam + "/" + Absence
                , data: {
                    '_token': "{{ csrf_token() }}"
                , }
                , success: function(data) {
                    if (data.status) {
                        //      console.log(data.absence)
                        if (data.absence) {
                            document.getElementById(`mark_${Student}_${Exam}`).innerHTML =
                                `         <i class="la la-check"></i>`;

                            document.getElementById(`absence_${Student}_${Exam}`).setAttribute(
                                'data-status', data.absence)
                            document.getElementById(`absence_${Student}_${Exam}`).innerHTML =
                                `<i data-student="${Student}" data-exam="${Exam}" data-status="1" id="on_id" class="la la-toggle-on absence_class"></i>`


                        } else {
                            document.getElementById(`mark_${Student}_${Exam}`).innerHTML =
                                `         <i class="la la-close"></i>`;
                            document.getElementById(`absence_${Student}_${Exam}`).setAttribute(
                                'data-status', data.absence)
                            document.getElementById(`absence_${Student}_${Exam}`).innerHTML =
                                `<i data-student="${Student}" data-exam="${Exam}" data-status="0" id="off_id" class="la la-toggle-off absence_class"></i>`


                        }
                    }


                }
                , error: function(reject) {}
            });

        } else if (targetClass.includes('display_exam_class')) {
            event.preventDefault();

            let display = event.target.getAttribute('data-status');
            let Exam = event.target.getAttribute('data-exam');




            $.ajax({
                type: 'post'
                , url: "/admin/display-exam/" + Exam + "/" + display
                , data: {
                    '_token': "{{ csrf_token() }}"
                , }
                , success: function(data) {
                    if (data.status) {

                        if (data.display) {


                            document.getElementById(`display_exam_${Exam}`).setAttribute(
                                'data-status', data.display)
                            document.getElementById(`display_exam_${Exam}`).innerHTML =
                                `<i  data-exam="${Exam}" data-status="1" id="exam_on_id_${Exam}" class="la la-toggle-on display_exam_class"></i>`


                        } else {

                            document.getElementById(`display_exam_${Exam}`).setAttribute(
                                'data-status', data.display)
                            document.getElementById(`display_exam_${Exam}`).innerHTML =
                                `<i  data-exam="${Exam}" data-status="0" id="exam_off_id_${Exam}" class="la la-toggle-off display_exam_class "></i>`


                        }
                    }


                }
                , error: function(reject) {}
            });

        }

    });

    $(document).on('focus', '.score_class', function(event) {
        let exam = $(event.target).attr('data-exam');
        let student = $(event.target).attr('data-student');
        //     let score = event.target.innerText ;
        document.getElementById(`score_${student}_${exam}`).innerText = ''
    });

    $(document).on('focusout', '.score_class', function(event) {
        console.log('lost fouces')
        let exam = $(event.target).attr('data-exam');
        let student = $(event.target).attr('data-student');
        let score = event.target.innerText;


        if ((isNaN(score)) || event.target.innerText == '') {

        } else {

            $.ajax({
                type: 'post'
                , url: "/admin/set-score/" + student + "/" + exam
                , data: {
                    '_token': "{{ csrf_token() }}"
                    , 'score': score
                }
                , success: function(data) {
                    if (data.status) {

                        document.getElementById(`score_${student}_${exam}`).innerText = data.score
                    }


                }
                , error: function(reject) {}
            });
        }


        $.ajax({
            type: 'post'
            , url: "/admin/has-score/" + student + "/" + exam
            , data: {
                '_token': "{{ csrf_token() }}"
                , 'score': score
            }
            , success: function(data) {
                if (data.HasScore) {
                    document.getElementById(`score_${student}_${exam}`).innerText = data.score +
                        ' %'
                } else {
                    document.getElementById(`score_${student}_${exam}`).innerText =
                        'No Score Yet ( Click To Edit )'
                }
            }
            , error: function(reject) {}
        });
    });





    {
        {
            --old--
        }
    }

    {
        {
            --$(document).on('click keyup', '.score_class', function(event) {
                    --
                }
            } {
                {
                    --
                    let exam = $(event.target).attr('data-exam');
                    --
                }
            } {
                {
                    --
                    let student = $(event.target).attr('data-student');
                    --
                }
            } {
                {
                    --
                    let score = event.target.innerText;
                    --
                }
            } {
                {
                    --
                    if ((isNaN(score)) || event.target.innerText == '') {
                        --
                    }
                }

                {
                    {
                        --
                    } else {
                        --
                    }
                }

                {
                    {
                        --$.ajax({
                                --
                            }
                        } {
                            {
                                --type: 'post', --
                            }
                        } {
                            {
                                --url: "/admin/set-score/" + student + "/" + exam, --
                            }
                        } {
                            {
                                --data: {
                                    --
                                }
                            } {
                                {
                                    --'_token': "{{ csrf_token() }}", --
                                }
                            } {
                                {
                                    --'score': score--
                                }
                            } {
                                {
                                    --
                                }, --
                            }
                        } {
                            {
                                --success: function(data) {
                                    --
                                }
                            } {
                                {
                                    --
                                    if (data.status) {
                                        --
                                    }
                                }

                                {
                                    {
                                        --document.getElementById(`score_${student}_${exam}`).innerText = data.score--
                                    }
                                } {
                                    {
                                        --
                                    }--
                                }
                            }


                            {
                                {
                                    --
                                }, --
                            }
                        } {
                            {
                                --error: function(reject) {}--
                            }
                        } {
                            {
                                --
                            });
                        --
                    }
                } {
                    {
                        --
                    }--
                }
            } {
                {
                    --
                });
            --
        }
    }

    {
        {
            --$(document).on('focus', '.score_class', function(event) {
                    --
                }
            } {
                {
                    --
                    let exam = $(event.target).attr('data-exam');
                    --
                }
            } {
                {
                    --
                    let student = $(event.target).attr('data-student');
                    --
                }
            } {
                {
                    -- //     let score = event.target.innerText ;--}}
                    {
                        {
                            --document.getElementById(`score_${student}_${exam}`).innerText = ''--
                        }
                    } {
                        {
                            --
                        });
                    --
                }
            }

            {
                {
                    --$(document).on('focusout', '.score_class', function(event) {
                            --
                        }
                    } {
                        {
                            --
                            let exam = $(event.target).attr('data-exam');
                            --
                        }
                    } {
                        {
                            --
                            let student = $(event.target).attr('data-student');
                            --
                        }
                    } {
                        {
                            --
                            let score = event.target.innerText;
                            --
                        }
                    } {
                        {
                            --$.ajax({
                                    --
                                }
                            } {
                                {
                                    --type: 'post', --
                                }
                            } {
                                {
                                    --url: "/admin/has-score/" + student + "/" + exam, --
                                }
                            } {
                                {
                                    --data: {
                                        --
                                    }
                                } {
                                    {
                                        --'_token': "{{ csrf_token() }}", --
                                    }
                                } {
                                    {
                                        --'score': score--
                                    }
                                } {
                                    {
                                        --
                                    }, --
                                }
                            } {
                                {
                                    --success: function(data) {
                                        --
                                    }
                                } {
                                    {
                                        --
                                        if (data.HasScore) {
                                            --
                                        }
                                    } {
                                        {
                                            --document.getElementById(`score_${student}_${exam}`).innerText = data.score + --
                                        }
                                    } {
                                        {
                                            --' %'--
                                        }
                                    } {
                                        {
                                            --
                                        } else {
                                            --
                                        }
                                    } {
                                        {
                                            --document.getElementById(`score_${student}_${exam}`).innerText = --
                                        }
                                    } {
                                        {
                                            --'No Score Yet ( Click To Edit )'--
                                        }
                                    } {
                                        {
                                            --
                                        }--
                                    }
                                } {
                                    {
                                        --
                                    }, --
                                }
                            } {
                                {
                                    --error: function(reject) {}--
                                }
                            } {
                                {
                                    --
                                });
                            --
                        }
                    } {
                        {
                            --
                        });
                    --
                }
            }

</script>

@endsection
