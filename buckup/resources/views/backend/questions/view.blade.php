@extends('backend.layouts.layout')


@section('page_title', 'All Questions')
@section('page_left', 'All Questions')
@section('page_center', 'Questions')
@section('page_center_link', route('questions.index'))
@section('page_right', 'Questions')
@section('page_right_link', route('questions.index'))
    @push('style')

        <link href="{{ asset('backend/assets/css/demo1/custom.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/demo1/custom_modal.css') }}" rel="stylesheet" type="text/css">

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
                        All Questions
                    </h3>
                </div>


                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">

                            <a href="{{ route('questions.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New Questions
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="kt-portlet__body">

                <div class="col-12">

                    <form style="display: flex;align-items:center;" action="{{ route('search.questions') }}">

                        <input style="display: inline-block!important;width:60%;margin-right:5px" type="text"

                        id="search_input" name="search"  class="form-control" placeholder="Search Here ...."
                        value="{{ urldecode(Request()->get('search')) }}"
                         required>
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-search"></i>
                        </button>

                    </form>
                </div>






                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>Question</th>
                            <th>Degree</th>
                            <th>Answers</th>
                            <th>Exam</th>
                            {{-- <th>Type</th> --}}
                            {{-- <th>Percentage</th> --}}
                            {{-- <th>Certification</th> --}}
                            <th colspan="8">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $key => $question)
                            <tr>

                                <td>{{ $question->ID}}</td>
                                <td >
                                    <div class="" style="max-height:500px;max-width:500px;overflow:hidden;">
                                        {!! $question->Question !!}
                                    </div>
                                </td>
                                <td>{{ $question->Degree }}</td>
                                <td>
                                    <div class="modal fade " id="modal_question_{{ $question->ID }}" tabindex="-1"
                                        role="dialog" aria-labelledby="modal_question_{{ $question->ID }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="questionpleModalLabel">
                                                        {{ $question->title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table
                                                        class="table table-striped- table-bordered table-hover table-checkable"
                                                        id="kt_table_1">
                                                        <thead>
                                                            <tr>
                                                                @for ($i = 0; $i < count($question->answers); $i++)
                                                                    <th style="color: @if ($question->
                                                                    answers[$i]->Is_Right) green @else
                                                                        red @endif">Answer {{ $i + 1 }}
                                                                    </th>

                                                                @endfor
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                @foreach ($question->answers as $answer)
                                                                    <td>{!! $answer->Answer !!}</td>
                                                                @endforeach
                                                            </tr>

                                                        </tbody>

                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button title="Answers" type="button" class="btn " data-toggle="modal"
                                        data-target="#modal_question_{{ $question->ID }}">
                                        <i class="la la-book" aria-hidden="true"></i>
                                    </button>



                                </td>


                                <td>
                                    {{ optional($question->course_type)->name }}
                                    {{-- @foreach ($question->answers as $answer) --}}
                                    {{-- {!! $answer->Answer !!} --}}
                                    {{-- @endforeach --}}
                                </td>



                                <td>
                                    <span style="overflow: visible; position: relative; width: 110px;">

                                        {{-- <a title="Send Mail" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#send_mail_{{$question->ID}}_model"> --}}

                                        {{-- <i class="la la-print"></i> --}}
                                        {{-- </a> --}}



                                        <a title="Edit Question" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                            data-toggle="modal" data-target="#edit_question_{{ $question->ID }}">

                                            <i class="la la-edit"></i>
                                        </a>
                                        <form action="{{ route('questions.update', $question->ID) }}" method="POST">
                                            @method('put')
                                            @csrf
                                            <!-- Modal -->
                                            <div class="modal fade" id="edit_question_{{ $question->ID }}" tabindex="-1"
                                                role="dialog" aria-labelledby="edit_question_{{ $question->ID }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="max-width:200px;max-height:200px;overflow:hidden" class="modal-title" id="exampleModalLabel">Edit Question
                                                                {!! $question->Question !!}
                                                                
                                                                </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="kt-portlet__body repeater repeater_number_{{ $question->ID }}"
                                                                data-order="1">
                                                                <div class="form-group row">
                                                                    <div class="col-lg-6 question_div">
                                                                        <label id="question_label_id_1">Question 1:</label>
                                                                        <textarea id="question_{{ $question->ID }}" type="text"
                                                                            name="questions[{{ $question->ID }}]"
                                                                            class="form-control @error('Question') is-invalid @enderror custom_input"
                                                                          
                                                                            placeholder="Enter Question 1" required> {!! ($question->Question) !!} </textarea>
                                                                        {{-- <span class="form-text text-muted">Please Enter The
                                                                            Question 1 </span> --}}
                                                                    </div>

                                                                    <div class="col-lg-6 degree_div">
                                                                        <label>Degree :</label>
                                                                        <input type="number"
                                                                            name="degree[{{ $question->ID }}]"
                                                                            class="form-control @error('degree1') is-invalid @enderror custom_input degree_input"
                                                                            value="{{ $question->Degree }}" required>

                                                                    </div>


                                                                </div>

                                                                <div class="form-group row ">
                                                                    @foreach ($question->answers as $key => $answer)
                                                                        <div class="col-lg-6 custom_input_div @if ($key + (1 % 2) !=0) margin-right @endif">
                                                                            <label>Answer {{ $key + 1 }}</label> <br>
                                                                            <input
                                                                                id="answer_input_{{ $question->ID }}_{{ $key + 1 }}"
                                                                                type="text"
                                                                                name="answers[{{ $question->ID }}][{{ $key + 1 }}]"
                                                                                class="form-control custom_input_a answer_input"
                                                                                value="{!! $answer->Answer !!}"
                                                                                placeholder="Enter Answer {{ $key + 1 }}"
                                                                                required>

                                                                            {{-- <input type="hidden"  name="no_questions" value="1" class="form-control @error('zoom_link') is-invalid @enderror custom_input_a"  placeholder="Enter Zoom Link" > --}}

                                                                            <label
                                                                                class="kt-checkbox kt-checkbox--brand check_div">
                                                                                <input
                                                                                    id="correct_id_{{ $question->ID }}_{{ $key + 1 }}"
                                                                                    type="checkbox"
                                                                                    name="correct[{{ $question->ID }}]"
                                                                                    value="{{ $key + 1 }}"
                                                                                    {{ $answer->Is_Right ? 'checked' : '' }}>
                                                                                Correct
                                                                                <span></span>
                                                                            </label>
                                                                            <span class="form-text text-muted">Please Enter
                                                                                Answer {{ $key + 1 }}</span>

                                                                        </div>
                                                                    @endforeach
                                                                </div>


                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Edit
                                                                Question</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                            data-toggle="modal"
                                            data-target="#edit_certification_{{ $question->ID }}_model">

                                            <i class="la la-trash"></i>
                                        </a>

                                        @include('backend.partials.confirm_modal',[
                                        'operation'=>('Delete'),
                                        'operationClass'=>'btn-danger',
                                        'target'=>"edit_certification_".$question->ID."_model" ,
                                        'title'=>('Delete').' '.$question->name . ' '.('Question') ,
                                        'message'=>('Area You Sure To Delete This Record With All Associated Answers ? '),
                                        'action'=>route('questions.destroy',$question->ID)
                                        ])

                                    </span>
                                </td>
                                <td style="position: absolute;right: -5px"></td>
                                <td style="position: absolute;right: -5px"></td>
                                <td style="position: absolute;right: -5px"></td>
                                <td style="position: absolute;right: -5px"></td>
                            </tr>


                        @endforeach
                    </tbody>


                </table>
@include('backend.partials.paginator',['model'=>$questions])
            </div>

        </div>

    </div>



@endsection

@push('js')


    <script src="{{ asset('backend/assets/js/demo1/pages/crud/metronic-datatable/advanced/column-width.js') }}"
        type="text/javascript"></script>


@endpush
@push('js')
    <script type="text/javascript" defer>
        $(document).on('change', 'input[type="checkbox"]', function() {
            $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        });

        //       Array.from(document.getElementsByClassName('first_empty')).forEach(function(element){
        // //          element.style.setProperty('display','none','important') ;
        //
        //       });
        //
        //       $('#hide_thos').css({
        //           display:"none",
        //
        //
        //       })
    </script>
    <script src="{{url('ckeditor/ckeditor.js')}}" type="text/javascript"></script>
      @foreach ($questions as $key => $question)
    <script>

           CKEDITOR.replace('question_{{ $question->ID }}' , {
                height: 300,
                filebrowserUploadUrl: "{{Route('upload.image',['_token'=>csrf_token()])}}",
                
            });

    </script>
    @endforeach 
@endpush
