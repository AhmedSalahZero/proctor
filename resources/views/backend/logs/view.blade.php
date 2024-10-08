@extends('backend.layouts.layout')


@section('page_title',('Logs'))
@section('page_left',('Logs'))
@section('page_center',('Logs'))
@section('page_center_link',route('instructor.logs'))
@section('page_right',('Logs'))
@section('page_right_link',route('instructor.logs'))
@push('style')

<link href="{{ asset('backend/assets/css/demo1/custom_fields.css') }}" rel="stylesheet" type="text/css" />




@endpush
@section('content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="alert alert-light alert-elevate" role="alert">
        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
        {{-- <div class="alert-text">--}}
        {{-- @lang('This Section Contains Sensitive Data .. Be Careful')--}}
        {{-- </div>--}}
    </div>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                {{-- <h3 class="kt-portlet__head-title">
                      Current Exams
                    </h3> --}}
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        {{-- <a href="{{route('stacks.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">--}}
                        {{-- <i class="la la-plus"></i>--}}
                        {{-- New Subject--}}
                        {{-- </a>--}}
                    </div>
                </div>
            </div>

        </div>
        <div class="kt-portlet__body">

            {{-- <form action="{{ route('score.search') }}" method="GET">--}}
            {{-- @csrf--}}
            {{-- <div class="col-lg-12">--}}
            {{-- <label>Exam :</label>--}}
            {{-- <select name="exam_id" class="form-control kt-selectpicker custom_input" data-size="4">--}}
            {{-- <option value="0" selected>Choose Exam Type</option>--}}
            {{-- @foreach (\App\Models\Exam::all() as $exam)--}}
            {{-- <option value="{{ $exam->id }}" {{ $exam->id == Request()->query('exam_id') ? 'selected' : '' }}>--}}
            {{-- {{ $exam->title }}</option>--}}
            {{-- @endforeach--}}
            {{-- </select>--}}
            {{-- <button type="submit" class="btn btn-primary custom_search">Search</button>--}}
            {{-- </div>--}}
            {{-- </form>--}}

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="table22">
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Instrtor User Name</th>
                        <th>proctor'sID</th>
                        <th>Attempt Date</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($logs as $key=>$log)
                    <tr>

                        <td>{{++$key}}</td>
                        <td>
                            {{ $log->getInstructorName() }}
                        </td>
                        <td>
                            {{ $log->password }}
                        </td>
                        <td>
                            {{ $log->getCreatedAt() }}
                        </td>

                    </tr>
                    @endforeach
                </tbody>


            </table>

            @include('backend.partials.paginator',[
            'model'=>$logs
            ])

            <!--end: Datatable -->
        </div>

    </div>

</div>



@endsection

@section('js')
<script src="{{ asset('backend/assets/js/demo1/pages/crud/metronic-datatable/advanced/column-width.js') }}" type="text/javascript"></script>


<script>
    // setInterval(() => {
    //     $('#table22').DataTable().ajax.reload(null ,  false);
    // }, 5000);

</script>


@endsection
