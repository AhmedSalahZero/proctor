@extends('backend.layouts.layout')


@section('page_title',('Current Exams'))
@section('page_left',('Current Exams'))
@section('page_center',('Current Exams'))
@section('page_center_link',route('current.exams'))
@section('page_right',('Current Exams'))
@section('page_right_link',route('current.exams'))
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
                <h3 class="kt-portlet__head-title">
                    Current Exams
                </h3>
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
                        <th>Student Name</th>
                        <th>Start At</th>
                        <th> No Questions</th>
                        <th> Solved Questions</th>
                        <th> Subject </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>


            </table>






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
                        if (data.absence) {

                            document.getElementById(`absence_${Student}_${Exam}`).setAttribute(
                                'data-status', data.absence)
                            document.getElementById(`absence_${Student}_${Exam}`).innerHTML =
                                `<i data-student="${Student}" data-exam="${Exam}" data-status="1" id="on_id" class="la la-toggle-on absence_class"></i>`


                        } else {
                            // document.getElementById(`mark_${Student}_${Exam}`).innerHTML =
                            //     `         <i class="la la-close"></i>`;
                            document.getElementById(`absence_${Student}_${Exam}`).setAttribute(
                                'data-status', data.absence)
                            document.getElementById(`absence_${Student}_${Exam}`).innerHTML =
                                `<i data-student="${Student}" data-exam="${Exam}" data-status="0" id="off_id" class="la la-toggle-off absence_class"></i>`


                        }
                    }


                }
                , error: function(reject) {}
            });

        }

    });

</script>

<script type="text/javascript">
    document.addEventListener('click', function(event) {
        let targetClass = event.target.className;

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
                            // document.getElementById(`mark_${Student}_${Exam}`).innerHTML =
                            //     `         <i class="la la-check"></i>`;

                            document.getElementById(`absence_${Student}_${Exam}`).setAttribute(
                                'data-status', data.absence)
                            document.getElementById(`absence_${Student}_${Exam}`).innerHTML =
                                `<i data-student="${Student}" data-exam="${Exam}" data-status="1" id="on_id" class="la la-toggle-on absence_class"></i>`


                        } else {
                            // document.getElementById(`mark_${Student}_${Exam}`).innerHTML =
                            //     `         <i class="la la-close"></i>`;
                            document.getElementById(`absence_${Student}_${Exam}`).setAttribute(
                                'data-status', data.absence)
                            document.getElementById(`absence_${Student}_${Exam}`).innerHTML =
                                `<i data-student="${Student}" data-exam="${Exam}" data-status="0" id="off_id" class="la la-toggle-off absence_class"></i>`


                        }
                    }


                }
                , error: function(reject) {}
            });

        }

    });


    $('#table22').dataTable({
        // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "ajax": {
            "url": "{{route('get.users.exams')}}"
            , "type": "GET"
            , "dataSrc": "data", // they key in the jsom response from the server where we will get our data
            "data": function(d) {
                d.search_input = $('#search_input').val();
            }

        }
        , "processing": false
        , "ordering": false
        , "paging": true
        , "searching": false
        , "info": false
        , "lengthChange": false
        , "serverSide": true
        , "pageLength": 10
        , "columns": [{
                render: function(a, b, row) {
                    return row['order'];
                }
            }
            , {
                render: function(a, b, row) {
                    return row['studentName'];
                }
            }
            , {
                render: function(a, b, row) {
                    return row['entered_at'];
                }
            }
            , {
                render: function(a, b, row) {
                    return row['no_questions'];
                }
            }
            , {
                render: function(a, b, row) {
                    return row['no_answers'];
                }
            }
            , {
                render: function(a, b, row) {
                    return row['subject'];
                }
            }

        ]
        , columnDefs: [{
                targets: 1
                , className: 'red reset-table-width'
            },




        ]
        , createdRow: function(row, data, dataIndex, cells) {
            // $(row).addClass('text-start  fw-bolder fs-7 text-uppercase gs-0');
            // $(row).closest('tbody').addClass(' fw-bold');
        }
        , drawCallback: function() {



            // 

        },


    });

</script>

<script>
    setInterval(() => {
        $('#table22').DataTable().ajax.reload(null, false);
    }, 5000);

</script>


@endsection
