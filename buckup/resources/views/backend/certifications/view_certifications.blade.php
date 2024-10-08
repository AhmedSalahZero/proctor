@extends('backend.layouts.layout')


@section('page_title', 'All Certifications')
@section('page_left', 'All Certifications')
@section('page_center', 'Certifications')
@section('page_center_link', route('certifications.index'))
@section('page_right', 'Certifications')
@section('page_right_link', route('certifications.index'))
    @push('style')

            <link href="{{ asset('backend/assets/css/demo1/custom_fields.css') }}" rel="stylesheet" type="text/css" />




    @endpush

@section('content')
@php
    
    
@endphp
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="alert alert-light alert-elevate" role="alert">
            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
            <div class="alert-text " >
                <span>@lang('This Section Contains Sensitive Data .. Be Careful')</span>
            </div>
            <button class="btn btn-success" data-toggle="modal" data-target="#card_model">Qrcode Domain</button>
            <button class="btn btn-success" data-toggle="modal" data-target="#certification_model" style="margin-left: 10px;">Certification Domain</button>
        </div>
        @include('backend.partials.confirm_modal',[
                                                                                      'operation'=>('Save'),
                                                                                      'operationClass'=>'btn-info',
                                                                                      'target'=>"card_model" ,
                                                                                      'title'=>'Card Domain' ,
                                                                                       'message'=>null,
                                                                                        'action'=>route('settings.card.domain'),
                                                                                        'method'=>'POST' ,
                                                                                        'card_domain'=>true ,
                                                                                       
                                                                                       ])

                                                                                        @include('backend.partials.confirm_modal',[
                                                                                      'operation'=>('Save'),
                                                                                      'operationClass'=>'btn-info',
                                                                                      'target'=>"certification_model" ,
                                                                                      'title'=>'Certification Domain' ,
                                                                                       'message'=>null,
                                                                                        'action'=>route('settings.certification.domain'),
                                                                                        'method'=>'POST' ,
                                                                                        'certification_domain'=>true ,
                                                                                       
                                                                                       ])
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        All Certifications
                    </h3>
                </div>
                {{-- <div class="kt-portlet__head-toolbar"> --}}
                {{-- <div class="kt-portlet__head-wrapper"> --}}
                {{-- <div class="kt-portlet__head-actions"> --}}
                {{-- <div class="dropdown dropdown-inline"> --}}
                {{-- <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
                {{-- <i class="la la-download"></i> Export --}}
                {{-- </button> --}}
                {{-- <div class="dropdown-menu dropdown-menu-right"> --}}
                {{-- <ul class="kt-nav"> --}}
                {{-- <li class="kt-nav__section kt-nav__section--first"> --}}
                {{-- <span class="kt-nav__section-text">Choose an option</span> --}}
                {{-- </li> --}}
                {{-- <li class="kt-nav__item"> --}}
                {{-- <a href="#" class="kt-nav__link"> --}}
                {{-- <i class="kt-nav__link-icon la la-print"></i> --}}
                {{-- <span class="kt-nav__link-text">Print</span> --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="kt-nav__item"> --}}
                {{-- <a href="#" class="kt-nav__link"> --}}
                {{-- <i class="kt-nav__link-icon la la-copy"></i> --}}
                {{-- <span class="kt-nav__link-text">Copy</span> --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="kt-nav__item"> --}}
                {{-- <a href="#" class="kt-nav__link"> --}}
                {{-- <i class="kt-nav__link-icon la la-file-excel-o"></i> --}}
                {{-- <span class="kt-nav__link-text">Excel</span> --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="kt-nav__item"> --}}
                {{-- <a href="#" class="kt-nav__link"> --}}
                {{-- <i class="kt-nav__link-icon la la-file-text-o"></i> --}}
                {{-- <span class="kt-nav__link-text">CSV</span> --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="kt-nav__item"> --}}
                {{-- <a href="#" class="kt-nav__link"> --}}
                {{-- <i class="kt-nav__link-icon la la-file-pdf-o"></i> --}}
                {{-- <span class="kt-nav__link-text">PDF</span> --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- </ul> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- &nbsp; --}}
                {{-- <a href="{{route('Certifications.create')}}" class="btn btn-brand btn-elevate btn-icon-sm"> --}}
                {{-- <i class="la la-plus"></i> --}}
                {{-- @lang('New Record') --}}
                {{-- </a> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}

                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            {{-- <div class="dropdown dropdown-inline"> --}}
                            {{-- <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
                            {{-- <i class="la la-filter"></i> Filter By --}}
                            {{-- </button> --}}
                            {{-- <div class="dropdown-menu dropdown-menu-right"> --}}
                            {{-- <ul class="kt-nav"> --}}
                            {{-- <li class="kt-nav__section kt-nav__section--first"> --}}
                            {{-- <span class="kt-nav__section-text">@lang('Choose an option')</span> --}}
                            {{-- </li> --}}
                            {{-- <li class="kt-nav__item"> --}}
                            {{-- <a  class="kt-nav__link " > --}}
                            {{-- <i class="kt-nav__link-icon la la-Certifications"></i> --}}
                            {{-- <span class="kt-nav__link-text filter_by_link" data-filter_by="all">@lang('All')</span> --}}
                            {{-- </a> --}}
                            {{-- </li> --}}



                            {{-- </ul> --}}
                            {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- &nbsp; --}}
                            <a href="{{ route('certifications.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New Certification
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="kt-portlet__body">

                <form action="{{ route('certifications.search') }}" method="GET">
                    @csrf
                    <div class="col-lg-12 row" style="display: flex;justify-content: center;align-items: center
;

@if(in_array('search',Request()->segments()) )
margin-top:60px !important;


                        @endif
">
                        <div class="col-lg-3">
                            <label>Exam :</label>
                            <select style="width:67%" name="exam_id" class="form-control kt-selectpicker custom_input" data-size="4">
                                <option value="0" selected>Choose Exam Type</option>
                                @foreach ($exams as $exam)
                                    <option value="{{ $exam->id }}" {{ $exam->id == Request('exam_id') ? 'selected' : '' }}>
                                        {{ $exam->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3">
                            <label>Course :</label>
                            <select style="width:67%" name="course_type" class="form-control kt-selectpicker custom_input" data-size="4">
                                <option value="0" selected>Choose Course</option>
                                @foreach (\App\Models\CourseType::all() as $course)
                                    <option value="{{ $course->id }}" {{ $course->id == Request('course_type') ? 'selected' : '' }}>
                                        {{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3" >
                            <label>From :</label>

                            @include('backend.component.date',

                    [
                    'required'=>false ,
                    'name'=>'from',
                    'filtered'=>true ,
                    'val'=>Request('from')??null
                    ])

                        </div>

                        <div class="col-sm-3 " >
                            <label style="">To</label>

                            @include('backend.component.date',[
                    'required'=>false ,
                    'name'=>'to',
                    'val'=>Request('to')??null
                                ]
                    )


                        </div>


                        <button style="margin-top: 25px;" type="submit" class="btn btn-primary custom_search">Search</button>
                    </div>
                </form>




                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>Student Name</th>
                            <th>Course Type</th>
                            <th>Completed Date</th>
                            <th>Valid To</th>
                            <th>QR CODE</th>
                            <th>Certification Id</th>
                            <th>Basic Cr</th>
                            <th>Score report </th>
                            <th>certificate</th>
                            {{-- <th>Link</th> --}}
                            <th>Actions</th>
                            <th style="position:relative;left: 100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certifications as $key => $certification)

                            <tr>

                                <td>{{ ++$key }}</td>
                                <td>{{ optional($certification->user)->UserName }}</td>
                                <td>{{ $certification->course->name }}</td>
                                <td>{{ $certification->completed_date }}</td>
                                <td>{{ $certification->valid_to }}</td>
                                <td>
                                    @if ($certification->link)
                                        <?php $certificationlink= getCardDomainFor($certification) . "?ID=".$certification->certification_id;?>
                                        {!! QrCode::size(100)->generate(@$certificationlink) !!}
                                    @else
                                        None
                                    @endif
                                </td>

                                <td>{{ $certification->certification_id }}</td>
                                <td>
                                    @if (optional($certification->user)->ID)

                                        <button data-clipboard-text="{{ $certification->getOuterUrl() }}"
                                        {{-- <button data-clipboard-text="{{ $certification->link }}" --}}
                                            class="btn btn-success copied_btn_class copied_btn_class_basic"
                                            id="copied_btn_{{ $certification->id }}_basic" data-type="basic">
                                            <i style="" class="fa fa-cut"></i>
                                        </button>
                                        <br>

                                        <a target="_blank" title="View Basic" href="{{ $certification->getOuterUrl() }}"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">
                                            <i class="la la-certificate"></i>
                                        </a>

                                        {{-- <a   title="Download Report" href="{{route('download.single.report',[ $certification->id])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  > --}}
                                        {{-- <i class="la la-download"></i> --}}
                                        {{-- </a> --}}

                                        {{-- <a   title="Send Report" href="{{route('send.single.report',[$certification->id])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  > --}}
                                        {{-- <i class="la la-mail-forward"></i> --}}
                                        {{-- </a> --}}
                                    @endif
                                </td>
                                <td>
                                    @if (optional($certification->user)->ID && $certification->canBeViewedAfterExamEnd())
                                        <button
                                            data-clipboard-text="{{ $certification->getStandardLink($certification) }}"
                                            class="btn btn-success copied_btn_class copied_btn_class_standard"
                                            id="copied_btn_{{ $certification->id }}_standard" data-type="standard">
                                            <i style="" class="fa fa-cut"></i>
                                        </button>
                                        <br>

                                        <a target="_blank" title="View Report"
                                            href="{{ route('view.single.report', [$certification->id]) }}"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">
                                            <i class="la la-certificate"></i>
                                        </a>

                                        <a title="Download Report"
                                            href="{{ route('download.single.report', [$certification->id]) }}"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">
                                            <i class="la la-download"></i>
                                        </a>

                                        <a title="Send Report"
                                            href="{{ route('send.single.report', [$certification->id]) }}"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">
                                            <i class="la la-mail-forward"></i>
                                        </a>

                                    @endif

                                </td>
                                <td>

{{--                                    @if($certification->student->isPassed())--}}
                                    @if (optional($certification->user)->ID && $certification->canBeViewedAfterSuccess())
                                        <button
                                            data-clipboard-text="{{ $certification->getAdvancedLink($certification) }}"
                                            class="btn btn-success copied_btn_class copied_btn_class_advanced"
                                            id="copied_btn_{{ $certification->id }}_advanced" data-type="advanced">
                                            <i style="" class="fa fa-cut"></i>
                                        </button>
                                        <br>

                                        <a target="_blank" title="View Certification"
                                            href="{{ route('view.single.certification', [$certification->id]) }}"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">
                                            <i class="la la-certificate"></i>
                                        </a>

                                        <a target="_blank" title="Download Certification"
                                            href="{{ route('download.single.certification', [$certification->id]) }}"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">
                                            <i class="la la-download"></i>
                                        </a>

                                        <a title="Send Certification"
                                            href="{{ route('send.single.certification', [$certification->id]) }}"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">
                                            <i class="la la-mail-forward"></i>
                                        </a>

                                    @endif
{{--                                        @endif--}}
                                </td>


                                <td>
                                    <span style="overflow: visible; position: relative; width: 110px;">


 <a title="{{$certification->display ? 'Hide' : 'Show'}}" class="btn btn-sm btn-clean btn-icon btn-icon-md"
    data-toggle="modal"
    data-target="#toggle_certification_{{ $certification->id }}_model">

                                            <i class="la  la-cog"></i>
                                        </a>

                                        @include('backend.partials.confirm_modal',[
                                        'operation'=>($certification->display ? 'Hide' : 'Show' ) ,
                                        'operationClass'=>'btn-info certification',
                                        'target'=>"toggle_certification_".$certification->id."_model" ,
                                        'title'=>($certification->display ? 'Hide' : 'Show' ) . ' Certification ' . $certification->certification_id ,
                                        'message'=>'Are You Sure To '.($certification->display ? 'Hide' : 'Show' ) . ' Certification Number ' . $certification->certification_id ,
                                        'action'=>route('toggle.certification',$certification->id),
                                        'method'=>'POST',
                                       'ajax'=>true
                                        ])


                                        <a title="Edit details"
                                            href="{{ route('certifications.edit', $certification->id) }}"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button">
                                            <i class="la la-edit"></i>
                                        </a>
                                        {{-- @unless($certification->exam) --}}
                                        <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                            data-toggle="modal"
                                            data-target="#edit_certification_{{ $certification->id }}_model">

                                            <i class="la la-trash"></i>
                                        </a>

                                        @include('backend.partials.confirm_modal',[
                                        'operation'=>('Delete'),
                                        'operationClass'=>'btn-danger',
                                        'target'=>"edit_certification_".$certification->id."_model" ,
                                        'title'=>('Delete').' '.$certification->name . ' '.('Certification') ,
                                        'message'=>('Area You Sure To Delete This Record With All Associated Data ? '),
                                        'action'=>route('certifications.destroy',$certification->id),
                                        '$certification'=>$certification
                                        ])
                                        {{-- @endunless --}}
                                    </span>
                                </td>
                                <td></td>

                            </tr>


                        @endforeach
                    </tbody>


                </table>

                @include('backend.partials.paginator',['model'=>$certifications])





                <!--end: Datatable -->
            </div>


        </div>

    </div>



@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script type="text/javascript">
        var clipboard = new ClipboardJS('.btn');
        var message = "{{ __('The Code Copied Into Your Clipboard') }}"
        clipboard.on('success', function(event) {
            // alert(message);

            let copied = " {{ __('Copied') }}";
            let type = $(event.trigger).data('type')


            $('.copied_btn_class').each(function(index, element) {
                $(element).empty().append(`<i  class="fa fa-cut"></i>`);

            })


            $(`#${event.trigger.id }`).empty().append(`<b> ${copied} </b>`);

        });



    </script>

{{--    @push('js')--}}
{{--        <script type="text/javascript">--}}
{{--            $(document).on('click','.certification',(event)=>{--}}
{{--                event.preventDefault();--}}
{{--                console.log($(event.target).data('certification'))--}}
{{--            })--}}
{{--            $.ajax({--}}
{{--                type: 'post',--}}
{{--                url: "/admin/toggle-certification/"+{{$certification->id}},--}}
{{--                data: {--}}
{{--                    '_token':"{{csrf_token()}}",--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    if(data.status)--}}
{{--                    {--}}
{{--                        window.location.reload();--}}
{{--                    }--}}
{{--                }, error: function (reject) {--}}
{{--                }--}}
{{--            });--}}
{{--        </script>--}}
{{--    @endpush--}}

    <script src="{{ asset('backend/assets/js/demo1/pages/crud/metronic-datatable/advanced/column-width.js') }}"
        type="text/javascript"></script>
    {{-- <script> --}}
    {{-- const certificationTypesLinks  = document.getElementsByClassName('filter_by_link'); --}}
    {{-- Array.from(certificationTypesLinks).forEach(function(certificationTypeLink){ --}}
    {{-- certificationTypeLink.addEventListener('click',function(event){ --}}
    {{-- const rule = event.target.getAttribute('data-filter_by') ; --}}
    {{-- const AllRules = document.getElementsByClassName('role_all'); --}}
    {{-- Array.from(AllRules).forEach(function(Rule){ --}}

    {{-- Rule.style.display ='none'; --}}
    {{-- }); --}}
    {{-- const selectedRules = document.getElementsByClassName('role_'+rule) ; --}}
    {{-- Array.from(selectedRules).forEach(function(selectedRule){ --}}
    {{-- selectedRule.style.display = 'table-row'; --}}
    {{-- }) --}}

    {{-- }); --}}
    {{-- }); --}}

    {{-- </script> --}}


@endsection
