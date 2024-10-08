<form action="{{$action}}" method="post">

<div class="modal fade" id="{{$target}}" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$message}}
                {{-- Model Body Here --}}


                    @csrf
                    @method($method??'DELETE')

                    @isset($student_exams)
                        <div class="col-lg-6">
                            <br>
                            <label>Please Select Exam</label>
                            <select name="exam_id" class="form-control kt-selectpicker" data-size="4">
                                @foreach($student_exams as $exam)
                                    <option value="{{$exam->id}}" >{{ucfirst($exam->title)}}</option>
                                @endforeach
                            </select>

                        </div>
                    @endisset

                    @isset($card_domain)
                        <div class="col-lg-12">
                            <br>
                            <label>Please Enter Card Domain</label>
                            <input type="text" class="form-control" name="card_domain" value="{{ \App\Models\Setting::where('type',3)->first() ?\App\Models\Setting::where('type',3)->first()->Msg : ''  }}">
                        </div>
                    @endisset

                     @isset($certification_domain)
                        <div class="col-lg-12">
                            <br>
                            <label>Please Enter Certification Domain</label>
                            <input type="text" class="form-control" name="certification_domain" value="{{ \App\Models\Setting::where('type',4)->first() ?\App\Models\Setting::where('type',4)->first()->Msg : ''  }}">
                        </div>
                    @endisset

                @isset($assign_to_exam)
                    <div class="col-lg-6">
                        <br>
                        <label>Please Select Exam</label>
                        <select name="exam_id" class="form-control kt-selectpicker" data-size="4">
                            @foreach(App()->make('allExams') as $exam)
                                @if(!($student->exams->contains($exam)))
                                <option value="{{$exam->id}}" >{{ucfirst($exam->title)}}</option>
                                @endif
                            @endforeach
                        </select>
                        {{--                            <span class="form-text text-muted"> </span>--}}

                    </div>

                @endisset




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.Close')</button>
                {{--                                              btn btn-primary--}}
                <button
{{--                    @isset($ajax)--}}
{{--                    data-certification = {{$certification->id}}--}}
{{--                        type="button"--}}
{{--                    @else--}}
                    type="submit"
{{--                    @endisset--}}
                     class="btn {{$operationClass}}">{{$operation}}</button>

            </div>
        </div>
    </div>
</div>
</form>


