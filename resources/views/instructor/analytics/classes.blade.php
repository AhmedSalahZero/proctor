@extends('instructor.layout')

@section('content')

<div class="section__header mt-4">
    {{-- <div class="section__top__header">{{ __('Search Options') }}</div> --}}
<div class="form-inline-item-top-container">
    <div class="form--container">
        <form action="#" enctype="multipart/form-data" method="post" class="form-inline-containers flex-wrap justify-content-center">
            @csrf
            <div class="form-container two-columns-lg form-inline gap-2 mb-1 ">
                <label class="label">{{ __('Courses') }}:</label>
                <select id="courses_id" multiple data-width="fit" data-style="form-control" data-show-tick="true" data-live-search-normalize="false" data-live-search-placeholder="{{ __('Select Courses') }}" data-live-search="true" placeholder="{{ __('Month') }}" class="form-control form-control-sm" name="date_of_birth">
                    <option value="">All Courses</option>
                    @foreach (getCourses() as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-container two-columns-lg form-inline gap-2 mb-1">
                <label class="label">{{ __('Time Period') }}:</label>
                <select id="time-period-id"  data-width="fit" data-style="form-control" data-show-tick="true" data-live-search-normalize="false" data-live-search-placeholder="{{ __('Select Time Period') }}" data-live-search="true" placeholder="{{ __('Period') }}" class="form-control form-control-sm" name="time-period">
                    @foreach (getTimePeriod() as $period)
                    <option @if($period == 'By Week') selected  @endif value="{{ $period }}">{{ $period }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-inline-item ">
                <label class="label">{{ __('Roles') }}:</label>
                <select id="roles_id" multiple data-width="fit" data-style="form-control border-dashed" data-show-tick="true" data-live-search-normalize="false" data-live-search-placeholder="{{ __('Select Rules') }}" data-live-search="true" placeholder="{{ __('Month') }}" class="form-control form-control-sm" name="date_of_birth">
                    @foreach (getRoles() as $id=>$role)
                    <option value="{{ $id }}">{{ $role }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-inline-item">
                <label class="label">{{__('Date Range')}}:</label>
                <select id="date-range" data-width="fit" data-style="form-control border-dashed sm-fs" data-show-tick="true" data-live-search-normalize="false" data-live-search-placeholder="{{ __('Select Date') }}" data-live-search="true" placeholder="{{ __('Month') }}" class="form-control form-control-sm" name="date_of_birth">
                    @foreach (getDateRanges() as $id=>$dateRange)
                    <option value="{{ $id }}">{{ $dateRange }}</option>
                    @endforeach
                </select>
                <input jd="date-from" name="from" type="date" placeholder="{{__('From')}}" value="{{old('from')}}" class="form-control form-control-sm input-element datepicker from-to-class d-none">
                <input id="date-to" name="to" type="date" placeholder="{{__('To')}}" value="{{old('email')}}" class="form-control form-control-sm input-element datepicker from-to-class d-none">

            </div>



            









    </div>

    <div class="submit_btn__class- text-center">
        <button id="filter-id" class="btn btn-sm btn-primary text-capitalize sm-btn" type="submit">
            <i class="fas fa-search"></i>
            {{ __('Search') }}</button>
    </div>

    </form>
    <div class="custom-hr">
        <div class="tooltio-btn ">
            <button class="btn btn-sm btn-tootip">{{ __('overview') }}</button>
        </div>
    </div>
</div>


</div>


<div class="text-center d-none mt-5" id="looking-data">
    <p class="d-inline-block py-1 px-2  " style="background-color:whitesmoke;color:darkgray">
    Please wait while the system generates your report..
    </p>
</div>

<div id="chart-statisics-container" class="d-none chart-statisics-container">
    <div class="chart-statisics">
        <div class="chart-statisic">
            <span id="total-classes" class="staticis-number">19</span>
            <span class="staticis-desc">total classes</span>
        </div>

         <div class="chart-statisic">
            <span id="avg-class-size" class="staticis-number">9.1 </span>
            <span class="staticis-desc">Average Class Size</span>
        </div>


         <div class="chart-statisic">
            <span id="classes-per-week" class="staticis-number">0</span>
            <span class="staticis-desc">Classes per Week</span>
        </div>

         <div class="chart-statisic">
            <span id="classes-per-month" class="staticis-number">0.2</span>
            <span class="staticis-desc">Classes per Month</span>
        </div>
    </div>
    <h3 class="text-center mt-3">Classes Over Time</h3>
</div>

<div id="chartdiv" class="d-none"></div>



</div>











@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $(function() {
        $('select').selectpicker();
        // $('select[data-live-search="true"]').selectpicker();
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
    $('#date-range').on('change', function() {
        let dateRange = $(this).val();
        if (dateRange == 0) {
            $('.from-to-class').removeClass('d-none')
        } else {
            $('.from-to-class').addClass('d-none')
        }
    });
    $('#date-range').trigger('change');

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
            panX: false
            , panY: false
            , wheelX: "none"
            , wheelY: "none"
            , layout: root.verticalLayout
        }));
        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(am5.Legend.new(root, {
            centerX: am5.p50
            , x: am5.p50
        }));
       
        var data = [{}];


        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 30
        });
        xRenderer.labels.template.setAll({
            rotation: -45
            , centerY: am5.p50
            , fontSize: 10, // labels font-size
            centerX: am5.p100
            , paddingRight: 15
        });

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "date"
            , renderer: xRenderer
            , tooltip: am5.Tooltip.new(root, {})
        }));

        window['chartOneXAxis'] = xAxis;

        xAxis.data.setAll(data);


        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            min: 0
            , renderer: am5xy.AxisRendererY.new(root, {})
        }));




        function makeSeries(name, fieldName, stacked, color) {
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                stacked: stacked
                , name: name
                , xAxis: xAxis
                , yAxis: yAxis
                , valueYField: fieldName
                , categoryXField: "date"
                , fill: color
            , }));

            series.columns.template.setAll({
                tooltipText: "{name}, {categoryX}:{valueY}"
                , width: am5.percent(3)
                , tooltipY: am5.percent(10)
            });
            series.data.setAll(data);
            window['chartOneSeries' + fieldName] = series;

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear();

            series.bullets.push(function() {
                return am5.Bullet.new(root, {
                    locationY: 0.5
                    , sprite: am5.Label.new(root, {
                        text: "{valueY}"
                        , fill: root.interfaceColors.get("alternativeText")
                        , centerY: am5.percent(50)
                        , centerX: am5.percent(50)
                        , populateText: true
                    })
                });
            });

            legend.data.push(series);
        }

        let allowedCategories = [
            ['Classes', 'classes', true, '#9CCDF6']
        , ];
        window['allowedCategories'] = allowedCategories;

        for (value of allowedCategories) {
            // console.log(value);
            makeSeries(value[0], value[1], value[2], value[3]);
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
    $(function() {
        $('#data-range-changer').on('change', function() {
            if ($(this).val() == 0) {
                $('.from-to-class').removeClass('d-none');
            } else {
                $('.from-to-class').addClass('d-none');
                $('#date-from').val(0).trigger('change')
                $('#date-to').val(0).trigger('change')
            }
        })
    }).trigger('change');

    $('#filter-id').on('click', function(e) {
        e.preventDefault();
        let courses_id = $('#courses_id').val();
        let roles_id = $('#roles_id').val();
        // let date_range_type = $('#data-range-changer').val();
        let date_from = $('#date-from').val();
        let date_to = $('#date-to').val();
        let timePeriod = $('#time-period-id').val();
        $('#filter-id').prop('disabled', true);
        $('#looking-data').removeClass('d-none');
    

          $.ajax({
            url:"{{ route('instructor.analytics.classes.index') }}",
            data:{
                "courses_id":courses_id ,
                "roles_id":roles_id ,
                "time_period":timePeriod ,
                "date_from":date_from,
                "date_to":date_to 
            },
            type:"GET",
            success:function(response){
                for(id in response.statistics)
                {
                    $('#'+id).html(response.statistics[id]);
                }
                $('#chart-statisics-container').removeClass('d-none');
                $('#looking-data').addClass('d-none');
                $('#table--container--id').removeClass('d-none')
                $('#chartdiv').removeClass('d-none')
            $('#filter-id').prop('disabled',false);

             
  
                 
      

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
        #chartdiv {
  width: 100%;
  height: 500px;
}

</style>
@endpush
