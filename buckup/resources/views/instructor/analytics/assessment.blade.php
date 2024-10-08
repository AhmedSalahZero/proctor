@extends('instructor.layout')

@section('content')

<div class="section__header mt-4">
    <div class="section__top__header">{{ __('Search Options') }}</div>
    <div class="section__main__header">
        <div class="section__main__header__contianer--one">
            <form action="#" enctype="multipart/form-data" method="post" class="section__main_content-one">
                @csrf
                    <div class="section__main__content__content--one">
                       
                        <div class="form-container two-columns-lg form-inline gap-2 mb-1">
                            <label class="label">{{ __('Courses') }}:</label>
                            <select id="courses_id" multiple data-width="fit" data-style="form-control" data-show-tick="true" data-live-search-normalize="false" data-live-search-placeholder="{{ __('Select Courses') }}" data-live-search="true" placeholder="{{ __('Month') }}" class="form-control form-control-sm" name="date_of_birth">
                                <option value="">All Courses</option>
                                @foreach (getCourses() as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        
                        </div>


                           <div class="form-container two-columns-lg form-inline gap-2 mb-1">
                            <label class="label">{{ __('Roles') }}:</label>
                            <select id="roles_id" multiple data-width="fit" data-style="form-control" data-show-tick="true" data-live-search-normalize="false" data-live-search-placeholder="{{ __('Select Rules') }}" data-live-search="true" placeholder="{{ __('Month') }}" class="form-control form-control-sm" name="date_of_birth">
                                @foreach (getRoles() as $id=>$role)
                                <option value="{{ $id }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        
                        </div>


                        <div class="form-container four-columns-date-range form-inline gap-2 mb-3">
                            <label  class="label">{{__('Date Range')}}:</label>
                             <select id="data-range-changer"  data-width="fit" data-style="form-control sm-fs" data-show-tick="true" data-live-search-normalize="false" data-live-search-placeholder="{{ __('Select Date') }}" data-live-search="true" placeholder="{{ __('Month') }}" class="form-control form-control-sm" name="date_of_birth">
                                @foreach (getDateRanges() as $id=>$dateRange)
                                <option value="{{ $id }}">{{ $dateRange }}</option>
                                @endforeach
                            </select>
                            <input id="date-from" name="from" type="date" placeholder="{{__('From')}}" value="{{old('from')}}" class="form-control form-control-sm input-element datepicker from-to-class">
                            <input id="date-to" name="to" type="date" placeholder="{{__('To')}}" value="{{old('to')}}" class="form-control form-control-sm input-element datepicker from-to-class">
                        </div>

                    


                     

                    </div>


                    
             
                <div class="submit_btn__class text-right">
                    <button id="filter-id" class="btn btn-sm btn-primary text-capitalize" type="submit">
                        <i class="fas fa-search"></i>
                        {{ __('Search') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="text-center d-none mt-5" id="looking-data">
    <p class="d-inline-block py-1 px-2  " style="background-color:whitesmoke;color:darkgray">Loading Data...please wait</p>
</div>
<div id="table--container--id" class="d-none upcoming-container">
    <div class="uppcoming-content upcoming-full">
        <div class="calender-filter-container">
            <div class="calender-filter">
                <div class="calender--filter--header">
                    {{-- <div class="section__top__header">{{ __('Ongoing Classes') }}</div> --}}
                <div class="datatable--filter-select-div  text-center ">
                    <table id="datatable-id" class="datatable datatable-custom">
                        <thead class="datatable-thead">
                            <tr class="datatable-thead-tr">
                                <th class="datatable-th">Assessment</th>
                                <th class="datatable-th">Traniees Assessed</th>
                                <th class="datatable-th"># Passed</th>
                                <th class="datatable-th"># Failed</th>
                                <th class="datatable-th">Passing Rate</th>
                                <th class="datatable-th">Avg Score</th>
                                <th class="datatable-th">Traniees Retaking Exam</th>
                                <th class="datatable-th">Retake Passed</th>
                                <th class="datatable-th">Retake Failed</th>
                                <th class="datatable-th">Retake Passing Rate</th>
                                <th class="datatable-th">Retake Average Score</th>
                            </tr>
                        </thead>
                        <tbody class="datatable-tbody">
                            @foreach($exams as $exam) 
                            @php
                                $examCounts = $exam->getTraineesCountWithAllStatus() ;
                            @endphp
                            <tr>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getCourseName() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $examCounts['all']['count'] }}
                                </td>
                                <td class="td-for-main-datatable text-nowrap">
                                    {{ $examCounts['passed']['count'] }}
                                    </td>
                                <td class="td-for-main-datatable text-uppercase"> {{ $examCounts['failed']['count'] }} </td>
                                <td class="td-for-main-datatable">
                                    {{ $examCounts['passed']['rate'] . ' %' }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $examCounts['all']['avg_score'] }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{-- {{ $exam->Traniees Retaking Exam }} --}}
                                    {{ $exam->getTraineesRetakingExamCount() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getRetakePassedCount() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getRetakeFailedCount() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getRetakePassedRateCount() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $exam->getRetakeAvgScore() }}
                                </td>

                                </tr>
                                @endforeach 

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>




</div>
    <div id="chartdiv" class="d-none"></div>


@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $(function() {
        $('select').selectpicker();
    })

    $(document).on('click', '.change__password_toggler', function(e) {
        e.preventDefault();
        $(this).addClass('d-none')
        $('.change__password__container').removeClass('d-none')
    })
    $(document).on('click', '.close--change--password', function(e) {
        e.preventDefault();
        $('.change__password_toggler').removeClass('d-none')
        $('.change__password__container').addClass('d-none')
    })
    $('.datepicket').datepicker();


</script>
<script src="{{ asset('frontend/js/index.js') }}"></script>
<script src="{{ asset('frontend/js/xy.js') }}"></script>
<script src="{{ asset('frontend/js/Animated.js') }}"></script>
<script>
am5.ready(function() {

var root = am5.Root.new("chartdiv");


root.setThemes([
  am5themes_Animated.new(root)
]);


var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: false,
  panY: false,
  wheelX: "none",
  wheelY: "none",
  layout: root.verticalLayout
}));
// Add legend
// https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
var legend = chart.children.push(am5.Legend.new(root, {
  centerX: am5.p50,
  x: am5.p50,
  rotate:-60
}));
// var chart = root.container.children.push(am5xy.XYChart.new(root, {
//   panX: false,
//   panY: false,
//   wheelX: "none",
//   wheelY: "none",
//   layout: root.verticalLayout,
//   pinchZoomX:false,
//   ZoomControl :false
// }));


// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
// var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
//   behavior: "none"
// }));
// cursor.lineY.set("visible", false);

// The data
var data = [{}];


// $.ajax()
// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
// var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
//   categoryField: "course",
//   startLocation: 0.5,
//   endLocation: 0.5,
//   renderer: am5xy.AxisRendererX.new(root, {}),
//   tooltip: am5.Tooltip.new(root, {})
// }));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/



// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
xRenderer.labels.template.setAll({
  rotation: -45,
  centerY: am5.p50,
    fontSize: 10, // labels font-size
  centerX: am5.p100,
  paddingRight: 15
});

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  categoryField: "course",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root, {})
}));
window['chartOneXAxis'] = xAxis;

xAxis.data.setAll(data);


var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  min: 0,
  renderer: am5xy.AxisRendererY.new(root, {})
}));




// var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
//   min: 0,
//   max: 100,
//   calculateTotals: true,
//   numberFormat: "#'%'",
//   renderer: am5xy.AxisRendererY.new(root, {})
// }));

// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
// function createSeries(name, field) {
//   var series = chart.series.push(am5xy.LineSeries.new(root, {
//     name: name,
//     stacked: true,
//     xAxis: xAxis,
//     yAxis: yAxis,
//     valueYField: field,
//     categoryXField: "course",
//     valueYShow: "valueYTotalPercent",
//     legendValueText: "{valueY}",
//     tooltip: am5.Tooltip.new(root, {
//       pointerOrientation: "horizontal",
//       labelText: "[bold]{name}[/]\n{categoryX}: {valueYTotalPercent.formatNumber('#.0')}% ({valueY})"
//     })
//   }));

//   series.fills.template.setAll({
//     fillOpacity: 0.5,
//     visible: true
//   });

//   series.data.setAll(data);
//   series.appear(1000);
// }

// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
function makeSeries(name, fieldName, stacked , color) {
  var series = chart.series.push(am5xy.ColumnSeries.new(root, {
    stacked: stacked,
    name: name,
    xAxis: xAxis,
    yAxis: yAxis,
    valueYField: fieldName,
    categoryXField: "course" ,
    fill:color,

  }));

  series.columns.template.setAll({
    tooltipText: "{name}, {categoryX}:{valueY}",
    width: am5.percent(90),
    tooltipY: am5.percent(10)
  });
  series.data.setAll(data);
window['chartOneSeries'+fieldName] = series;

  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  series.appear();

  series.bullets.push(function () {
    return am5.Bullet.new(root, {
      locationY: 0.5,
      sprite: am5.Label.new(root, {
        text: "{valueY}",
        fill: root.interfaceColors.get("alternativeText"),
        centerY: am5.percent(50),
        centerX: am5.percent(50),
        populateText: true,
      })
    });
  });

  legend.data.push(series);
}

let allowedCategories = [
    ['Passed' ,'passed' , true , '#008000'],
    ['Failed' ,'failed' , true , '#DC143C'],
];
window['allowedCategories'] = allowedCategories ;

for(value of allowedCategories)
{
    // console.log(value);
    makeSeries(value[0], value[1],value[2],value[3]);
}

chart.appear(1000, 100);

// chart.set("scrollbarX", am5.Scrollbar.new(root, {
//   orientation: "horizontal"
// }));


// Add legend
// https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
// var legend = chart.children.push(am5.Legend.new(root, {
//   centerX: am5.p50,
//   x: am5.p50
// }));

// legend.data.setAll(chart.series.values);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
// chart.appear(1000, 100);

}); // end am5.ready()
</script>
<script>
    $(function(){
        $('#data-range-changer').on('change',function(){
            if($(this).val() == 0)
            {
                $('.from-to-class').removeClass('d-none');
            } 
            else{
                $('.from-to-class').addClass('d-none');
                $('#date-from').val(0).trigger('change')
                $('#date-to').val(0).trigger('change')
            }
        })
    }).trigger('change');

    $('#filter-id').on('click',function(e){
        e.preventDefault();
        let courses_id = $('#courses_id').val();
        let roles_id = $('#roles_id').val();
        let date_range_type = $('#data-range-changer').val();
        let date_from = $('#date-from').val();
        let date_to = $('#date-to').val();
        $('#filter-id').prop('disabled',true);
                $('#looking-data').removeClass('d-none');

        $.ajax({
            url:"{{ route('instructor.analytics.assessment.index') }}",
            data:{
                "courses_id":courses_id ,
                "roles_id":roles_id ,
                "date_range_type":date_range_type ,
                "date_from":date_from,
                "date_to":date_to 
            },
            type:"GET",
            success:function(response){
                $('#looking-data').addClass('d-none');
                $('#table--container--id').removeClass('d-none')
                $('#chartdiv').removeClass('d-none')
            $('#filter-id').prop('disabled',false);

                let table = $('#datatable-id').DataTable();
                table.clear().destroy();
                $('.datatable:not(.no-pagination):not(.no-search):not(.no-info)').DataTable({
             lengthChange:true,
            dom: 'lBfrtip',
            lengthMenu: [ 10, 25, 50, 75, 100 ],
            paging:true,
            paginate:true,
        buttons: [
             'excel', 'print'
        ]
        });
        for(index in response.exams)
        {
            exam = response.exams[index];
             table.row.add(
            [
                // "course_namee":
                exam.course_name,
            //    "count_all":
                exam.exam_all_count,
                exam.exam_passed_count,
                // "count_failed":
                exam.exam_failed_count,
                // "count_passed_rate":
                exam.exam_passed_rate,
                // "count_avg_score":
                exam.exam_all_avg_score,
                // "count_retake_count":
                exam.exam_retake_all_count,
                // "count_retake_passed":
                exam.exam_retake_passed_count,
                // "count_retake_failed":
                exam.exam_retake_failed_count,
                // "count_retake_rate_count":
                exam.exam_retake_passed_rate_count,
                // "retake_avg_score":
                exam.exam_retake_avg_score_count,
            ]
                ) .draw()
                  .node();
        }
                 
        // response.exams.forEach(function(exam){
        //     // console.log(exam);
           

        // });
        // console.log(response);
        // 

        window['chartOneXAxis'].data.setAll(response.chartData);
        // if added new category add it here
        window['allowedCategories'] = allowedCategories ;

for(value of allowedCategories)
{
            window['chartOneSeries'+value[1]].data.setAll(response.chartData);

}
            },
        });
    });
</script>
@endpush
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{ asset('frontend/css/datatable.css') }}">
<style>
    .main__content__container{
        padding:0;
    }
</style>
<style>
    #chartdiv {
  width: 100%;
  height: 500px;
}

</style>
@endpush
