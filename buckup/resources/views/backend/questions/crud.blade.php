@extends('backend.layouts.layout')


@section('page_title', isset($questions) ? 'Edit Questions' : 'Create Questions')


@section('page_left', isset($questions) ? 'Edit Questions' : 'Create Questions')
@section('page_center', 'Questions')
@section('page_center_link', route('questions.index'))
@section('page_right', isset($questions) ? 'Edit Questions' : 'Create Questions')
@section('page_right_link', route('questions.create'))
    @push('style')

        <link href="{{ asset('backend/assets/css/demo1/custom.css') }}" rel="stylesheet" type="text/css">
    @endpush
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
                                {{ isset($questions) ? 'Edit Questions' : 'Create Questions' }}
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right repeater_parent_class" method="post"
                        action="{{ $route }}">
                        @csrf
                        @if (isset($questions))
                            @method('put')
                        @endif






                        <div class="kt-portlet__body">


                            <div class="form-group row ">

                                {{-- <button id="add_another">Add Another</button> --}}

                                {{-- <div class="col-lg-6">
                                    <textarea id="content_en"></textarea>
                                </div> --}}
                                {{-- <div id="append" class="col-lg-6"> --}}

                                {{-- </div> --}}

                                <div class="col-lg-6">
                                    <label>Course Type</label>


                                    <select required name="exam_id" class="form-control kt-selectpicker" data-size="4" required @if (isset($questions) || Request()->query('exam_id')) disabled @endif>
                                        {{-- <option selected disabled>Choose Course Type </option> --}}

                                        @foreach ($course_types as $course_type)
                                            <option value="{{ $course_type->id }}"> {{ $course_type->name }} </option>
                                        @endforeach
                                    </select>

                                    @if (isset($questions))
                                        <input type="hidden" value="{{ $currentExam->id }}" name="exam_id">
                                    @elseif(Request()->query('exam_id'))
                                        <input type="hidden" value="{{ Request()->query('exam_id') }}" name="exam_id">
                                    @endif

                                </div>


                            </div>


                        </div>

                        @if (isset($questions))
                            @foreach ($questions as $order => $question)
                                <div class="kt-portlet__body repeater repeater_number_{{ $order + 1 }}"
                                    data-order="{{ $order + 1 }}">
                                    <div class="form-group row">
                                        <div class="col-lg-6 question_div">

                                            <label id="question_label_id_{{ $order + 1 }}">Question
                                                {{ $order + 1 }}:</label>
                                            <textarea type="text" name="questions[{{ $order + 1 }}]"
                                                class="form-control @error('Question') is-invalid @enderror custom_input"
                                                {{-- value="" --}}
                                                placeholder="Enter Question {{ $order + 1 }}" required>{{ $question->Question }}</textarea>
                                           
                                        </div>

                                        <div class="col-lg-6 degree_div">
                                            <label>Degree :</label>
                                            <input type="number" name="degree[{{ $order + 1 }}]"
                                                class="form-control @error('degree1') is-invalid @enderror custom_input degree_input"
                                                value="{{ $question->Degree }}" placeholder="" required>
                                            <button class="btn btn-danger btn_remove"
                                                id="btn_remove_id_{{ $order + 1 }}"
                                                data-order="{{ $order + 1 }}">×</button>

                                        </div>


                                    </div>

                                    <div class="form-group row ">
                                        @for ($i = 1; $i <= \App\Models\Answer::NUMBEROFANSWERS; $i++)

                                            <div class="col-lg-6 custom_input_div @if ($i % 2 !=0) margin-right @endif">
                                                <label>Answer {{ $i }}</label> <br>
                                                <input type="text"
                                                    name="answers[{{ $order + 1 }}][{{ $i }}]"
                                                    class="form-control @error('zoom_link') is-invalid @enderror custom_input_a answer_input"
                                                    value="{{ $question->answers[$i - 1]->Answer }}"
                                                    placeholder="Enter Answer {{ $i }}" required>

                                                {{-- <input type="hidden"  name="no_questions" value="1" class="form-control @error('zoom_link') is-invalid @enderror custom_input_a"  placeholder="Enter Zoom Link" > --}}

                                                <label class="kt-checkbox kt-checkbox--brand check_div">
                                                    <input id="correct_id_{{ $order + 1 }}_{{ $i }}"
                                                        type="checkbox" name="correct[{{ $order + 1 }}]"
                                                        value="{{ $i }}"
                                                        {{ $question->answers[$i - 1]->Is_Right ? 'checked' : '' }}>
                                                    Correct
                                                    <span></span>
                                                </label>
                                                <span class="form-text text-muted">Please Enter Answer
                                                    {{ $i }}</span>
                                            </div>
                                        @endfor
                                    </div>

                                </div>

                            @endforeach
                        @else


                            <div class="kt-portlet__body repeater repeater_number_1" data-order="1">
                                <div class="form-group row">
                                    <div class="col-lg-6 question_div">
                                        <label id="question_label_id_1">Question 1:</label>
                                        <textarea id="content_en" type="text" name="questions[1]"
                                            class="form-control @error('Question') is-invalid @enderror custom_input"
                                             placeholder="Enter Question 1" required> {{ old('questions.1') }} </textarea>
                                        {{-- <span class="form-text text-muted">Please Enter The Question 1 </span> --}}
                                    </div>

                                    <div class="col-lg-6 degree_div">
                                        <label>Degree :</label>
                                        <input type="number" name="degree[1]"
                                            class="form-control @error('degree1') is-invalid @enderror custom_input degree_input"
                                            value="{{ old('questions.1') }}" placeholder="" required>

                                        <button class="btn btn-danger btn_remove" id="btn_remove_id_1"
                                            data-order="1">×</button>


                                    </div>


                                </div>

                                <div class="form-group row ">
                                    @for ($i = 1; $i <= \App\Models\Answer::NUMBEROFANSWERS; $i++)


                                        <div class="col-lg-6 custom_input_div @if ($i % 2 !=0) margin-right @endif">
                                            <label>Answer {{ $i }}</label> <br>
                                            <input id="answer_input_1_{{ $i }}" type="text"
                                                name="answers[1][{{ $i }}]"
                                                class="form-control @error('zoom_link') is-invalid @enderror custom_input_a answer_input"
                                                value="{{ @$zoom_link }}" placeholder="Enter Answer {{ $i }}"
                                                required>

                                            {{-- <input type="hidden"  name="no_questions" value="1" class="form-control @error('zoom_link') is-invalid @enderror custom_input_a"  placeholder="Enter Zoom Link" > --}}

                                            <label class="kt-checkbox kt-checkbox--brand check_div">
                                                <input id="correct_id_1_{{ $i }}" type="checkbox"
                                                    name="correct[1]" value="{{ $i }}"
                                                    {{ $i == 1 ? 'checked' : '' }}> Correct
                                                <span></span>
                                            </label>
                                            <span class="form-text text-muted">Please Enter Answer
                                                {{ $i }}</span>

                                        </div>


                                    @endfor
                                </div>


                            </div>

                        @endif
                        <button class="btn btn-info btn_plus" id="btn_plus_id">+</button>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary">@lang('Save')</button>
                                        <a href="{{ route('questions.index') }}"
                                            class="btn btn-secondary">@lang('Cancel')</a>
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


@section('js')
    <script src="{{ asset('backend/assets/js/demo1/pages/crud/forms/widgets/bootstrap-datetimepicker.js') }}"
        type="text/javascript"></script>


    <script>
        $(document).on('change', 'input[type="checkbox"]', function() {
            $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        });
        let buttonPlus = document.getElementById('btn_plus_id');

        buttonPlus.addEventListener('click', function(event) {
            event.preventDefault();
            let LatestRepeater = getLatestRepeater();
            let LatestRepeaterOrder = parseInt(LatestRepeater.getAttribute('data-order'));
            // console.log(LatestRepeaterOrder)
            insertNewRepeaterAfter(`repeater_number_${LatestRepeaterOrder}`, LatestRepeaterOrder);

        });

        function getLatestRepeater() {
            let repeaters = document.getElementsByClassName('repeater')
            return repeaters[repeaters.length - 1]; //Latest Element In The Array
        }

        function insertNewRepeaterAfter(parentClass, LatestRepeaterOrder) {

            $('.' + parentClass).after(GetNewRepeaterDiv(LatestRepeaterOrder + 1));
            reinitalizeCkEditor(LatestRepeaterOrder + 1);
            //      document.getElementsByClassName(parentClass)[0].append();



        }

        function reinitalizeCkEditor(newOrder)
        {

                CKEDITOR.replace('textarea_' + newOrder  , {
                                height: 300,
                                filebrowserUploadUrl: "{{Route('upload.image',['_token'=>csrf_token()])}}",
                            });
                            CKEDITOR.config.extraPlugins = "imageresize";
                                 CKEDITOR.config.imageResize.maxWidth = 100;
                                      CKEDITOR.config.imageResize.maxHeight = 100;

        }

        function GetNewRepeaterDiv(newOrder) {
            // console.log(newOrder)
            let newRepeater = `<div class="kt-portlet__body repeater repeater_number_${newOrder}" data-order="${newOrder}">
                <div class="form-group row">
                    <div class="col-lg-6 question_div">
                        <label id="question_label_id_${newOrder}">Question ${newOrder}:</label>
                        <textarea id="textarea_${newOrder}"  name="questions[${newOrder}]" class="form-control @error('Question') is-invalid @enderror custom_input" required> </textarea>
                          
                    </div>

                    <div class="col-lg-6 degree_div">
                                        <label>Degree :</label>
                                        <input type="number"  name="degree[${newOrder}]" class="form-control @error('degree') is-invalid @enderror custom_input degree_input" value="" placeholder="" required>
                                                                                  <button class="btn btn-danger btn_remove" id="btn_remove_id_${newOrder}" data-order="${newOrder}">×</button>

                                    </div>

                </div>

                <div class="form-group row " >`;

            for (let i = 1; i <= {{ \App\Models\Answer::NUMBEROFANSWERS }}; i++) {

                newRepeater += ` <div class="col-lg-6 custom_input_div`;
                newRepeater += (i % 2 !== 0) ? ' margin-right' : ' ';
                newRepeater += `">
                    <label>Answer ${i} </label> <br>
                        <input id="answer_input_${newOrder}_${i}" type="text"  name="answers[${newOrder}][${i}]" class="form-control  custom_input_a answer_input" value="" placeholder="Enter Answer ${i}" required>

                            <label class="kt-checkbox kt-checkbox--brand check_div">
                                <input id="correct_id_${newOrder}_${i}" type="checkbox"  name="correct[${newOrder}]" value="${i}" ${i===1 ? 'checked' :''}> Correct
                                    <span></span>
                            </label>
                            <span class="form-text text-muted">Please Enter Answer ${i}</span>

                    </div> `
            }
            newRepeater += `</div> </div>`;

            //  console.log(newRepeater)

            return newRepeater;


        }

        function removeRepeater() {

            document.addEventListener('click', function(event) {

                if (event.target.className.includes('btn_remove')) {

                    event.preventDefault();


                    let removingElementOrder = parseInt(event.target.getAttribute('data-order'));

                    let removingRepeater = document.getElementsByClassName(
                        `repeater_number_${removingElementOrder}`)[0];

                    removingRepeater.parentElement.removeChild(removingRepeater);


                    let repeatersAfterRemovedOne = Array.from(document.querySelectorAll('.repeater')).filter(
                        function(element) {

                            return parseInt(element.getAttribute('data-order')) > removingElementOrder;
                        })

                    let CurrentElementIndex = removingElementOrder + 1; //3

                    repeatersAfterRemovedOne.forEach(function(repeaterAfter) {


                        repeaterAfter.classList.remove('repeater_number_' + CurrentElementIndex);
                        repeaterAfter.classList.add('repeater_number_' + (CurrentElementIndex - 1));
                        repeaterAfter.setAttribute('data-order', CurrentElementIndex - 1);
                        document.getElementById(`question_label_id_${CurrentElementIndex}`).innerText =
                            `Question ${CurrentElementIndex-1}`
                        document.getElementById(`question_label_id_${CurrentElementIndex}`).id =
                            `question_label_id_${CurrentElementIndex-1}`
                        repeaterAfter.getElementsByClassName('custom_input')[0].name =
                            `questions[${CurrentElementIndex-1}]`;
                        repeaterAfter.getElementsByClassName('custom_input')[0].placeholder =
                            `Enter Question ${CurrentElementIndex -1}`;
                        repeaterAfter.getElementsByClassName('degree_input')[0].name =
                            `degree[${CurrentElementIndex-1}]`;
                        repeaterAfter.getElementsByClassName('btn_remove')[0].id =
                            `btn_remove_id_${CurrentElementIndex-1}`;
                        repeaterAfter.getElementsByClassName('btn_remove')[0].setAttribute('data-order',
                            CurrentElementIndex - 1);
                        for (let i = 1; i <= {{ \App\Models\Answer::NUMBEROFANSWERS }}; i++) {
                            document.getElementById(`correct_id_${CurrentElementIndex}_${i}`).name =
                                `correct[${CurrentElementIndex-1}]`;
                            document.getElementById(`correct_id_${CurrentElementIndex}_${i}`).id =
                                `correct_id_${CurrentElementIndex-1}_${i}`;
                            document.getElementById(`answer_input_${CurrentElementIndex}_${i}`).name =
                                `answers[${CurrentElementIndex-1}][${i}]`;
                            document.getElementById(`answer_input_${CurrentElementIndex}_${i}`).id =
                                `answer_input_${CurrentElementIndex-1}_${i}`;
                        }

                        CurrentElementIndex++;

                    });

                    // console.log(repeatersAfterRemovedOne)

                }

                // 2- remove this element
                // 3- get All Element After It And Decrease Order By !
            });
        }

        removeRepeater();


      
           
            
    </script>
<script src="{{url('ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script>
      CKEDITOR.replace('content_en', {
                height: 300,
                filebrowserUploadUrl: "{{Route('upload.image',['_token'=>csrf_token()])}}",
                
            });

</script>

@endsection
