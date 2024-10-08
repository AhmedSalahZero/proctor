@extends('instructor.layout')

@section('content')

<input type="hidden" id="hide-datatable-search">

<div class="section__header mt-4">
    <div class="section__top__header">{{ __('Search Options') }}</div>
    <div class="section__main__header">
        <div class="section__main__header__contianer">
            <form action="{{ route('instructor.certificate.lookup') }}" enctype="multipart/form-data"  class="section__main_content">
                <div class="section__main_content__l">
                    <div class="section__main__content__content">
                        <div class="form-container three-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('name')}}:</label>
                            <input name="first" type="text" placeholder="{{__('First')}}" value="{{ Request()->query('first') }}" class="form-control form-control-sm input-element">
                            <input name="last" type="text" placeholder="{{__('Last')}}" value="{{ Request()->query('last') }}" class="form-control form-control-sm input-element">
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('email')}}:</label>
                            <input name="email" type="text" placeholder="{{__('Email')}}" value="{{old('email')?:Request()->query('email')}}" class="form-control form-control-sm input-element">
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('Certificate Id')}}:</label>
                            <input name="certification_id" type="text" placeholder="{{__('Certificate Id')?:Request()->query('certification_id')}}" value="{{old('certification_id')?:Request()->query('certification_id')}}" class="form-control form-control-sm input-element">
                        </div>

                        <div class="form-container four-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('Date Filter')}}:</label>
                            <input name="from" type="date" placeholder="{{__('From')}}" value="{{old('from')?: Request()->query('from')}}" class="form-control form-control-sm input-element datepicker ">
                            {{__('To')}}
                            <input name="to" type="date" placeholder="{{__('To')}}" value="{{old('to')?: Request()->query('to')}}" class="form-control form-control-sm input-element datepicker ">

                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('Class Id')}}:</label>
                            <input name="class_id" type="text" placeholder="{{__('Class Id')}}" value="{{Request()->query('class_id')}}" class="form-control form-control-sm input-element">
                        </div>



                    </div>
                </div>
                <div class="section__main_content__r">
                    <div class="section__main__content__content">
                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Provider') }}:</label>
                            <select placeholder="{{ __('Provider') }}" name="provider" data-width="fit" data-show-tick="true" data-live-search-placeholder="{{ __('Select Provider') }}" data-style="form-control" data-live-search="true" class="form-control form-control-sm">
                                <option value="">{{ 'All' }}</option>
                                @foreach (getProviders() as $provider)
                                <option value="{{ $provider }}" @if(Request()->query('provider') == $provider ) selected @endif  >{{ $provider }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Instructor') }}:</label>
                            <select placeholder="{{ __('Instructor') }}" data-live-search-placeholder="{{ __('Select Instructor') }}" name="instructor" data-width="fit" data-show-tick="true" data-style="form-control" data-live-search="true" class="form-control form-control-sm">
                                <option value="">{{ 'All' }}</option>
                                @foreach (getInstructors() as $instructor)
                                <option @if($instructor->ID == Request()->query('instructor') ) selected @endif  value="{{ $instructor->ID }}">{{ $instructor->getFullName() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Course Level') }}:</label>
                            <select placeholder="{{ __('Course Level') }}" data-live-search-placeholder="{{ __('Select Course Level') }}" name="course_level" data-width="fit" data-show-tick="true" data-style="form-control" data-live-search="true" class="form-control form-control-sm">
                                <option value=""  >All Courses</option>
                                @foreach (getCourses() as $courseLevel)
                                <option value="{{ $courseLevel->id }}" @if(Request()->query('course_level') == $courseLevel->id ) selected @endif >{{ $courseLevel->name }}</option>
                                @endforeach
                            </select>

                        </div>


                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Supplement') }}:</label>
                            <select placeholder="{{ __('Supplement') }}" data-live-search-placeholder="{{ __('Select Supplement') }}" name="supplement" data-width="fit" data-show-tick="true" data-style="form-control" data-live-search="true" class="form-control form-control-sm">
                                <option value="">{{ 'All '}}</option>
                                @foreach (getSupplements() as $supplment)
                                <option @if($supplment == Request()->query('supplement')) selected  @endif  value="{{ $supplment }}">{{ $supplment }}</option>
                                @endforeach
                            </select>

                        </div>





                    </div>
                </div>

                <div class="submit_btn__class text-right mt-4">
                    <button class="btn btn-sm btn-primary sm-btn text-capitalize" type="submit">
                        <i class="fas fa-search"></i>
                        <span>{{ __('Search Certificate') }}</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="upcoming-container">
    <div class="uppcoming-content upcoming-full">
        <div class="calender-filter-container">
            <div class="calender-filter">
                <div class="calender--filter--header">
                    {{-- <div class="section__top__header">{{ __('Ongoing Classes') }}</div> --}}
                <div class="datatable--filter-select-div  text-center ">
                    <table class="datatable datatable-custom table table-hover">
                        <thead class="datatable-thead">
                            <tr class="datatable-thead-tr">
                                <th class="datatable-th">name</th>
                                <th class="datatable-th">date issued</th>
                                <th class="datatable-th">provider</th>
                                <th class="datatable-th">instructor</th>
                                <th class="datatable-th">course</th>
                                <th class="datatable-th">email</th>
                                <th class="datatable-th">options</th>
                            </tr>
                        </thead>
                        <tbody class="datatable-tbody">
                            @foreach($certifications as $certification)
                             <tr class="clickable-tr view-certification-class" 
                              @if(optional($certification->user)->ID)
                             data-url="{{ route('view.single.certification',$certification->id) }}"
                             @endif 
                             >
                                <td class="td-for-main-datatable">
                                    {{$certification->getName()}}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $certification->completed_date }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $certification->provider }}
                                </td>
                                <td class="td-for-main-datatable"> 
                                    {{ $certification->instructor_name }}
                                     </td>
                                <td class="td-for-main-datatable">
                                    {{ $certification->getCourseName() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    {{ $certification->getStudentEmail() }}
                                </td>
                                <td class="td-for-main-datatable">
                                    <select  style="width: 100%" placeholder="{{ __('Select An Action') }}" name="provider" data-width="fit" data-show-tick="true"  data-style="form-control" data-live-search="true" class="form-control form-control-sm action-handler">
                                        <option   value="" selected> {{ __('Select An Action') }} </option>
                                        @if(optional($certification->user)->ID)
                                        @foreach (getDatatableActions($certification) as $link=>$action)
                                        <option value="{{ $link}}"> {{ $action }} </option>
                                        @endforeach
                                        @endif
                                    </select>


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
</div>
@endsection
@push('js')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyD1pzxgf9AUfrWE2pLVQanO6Ti9a5lZDGo&libraries=places&region=eg&language=en"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $(function() {
        $('select').selectpicker();
        // $('select[data-live-search="true"]').selectpicker();
    })

</script>



<script>
   

    $(document).on('change', '#date, #source_id, #government_id', function(e) {
        let date = $('#date').val();
        let sourceId = $('#source_id').val();
        let governmentId = $('#government_id').val();
        // filter(date, sourceId, governmentId);
    })

    function filter(date = null, sourceId = null, governmentId = null) {
        $.ajax({
            url: "{{ route('ajax.projects.filter') }}"
            , type: "GET"
            , data: {
                _token: "{{ csrf_token() }}"
                , date: date
                , source_id: sourceId
                , government_id: governmentId
            , }
            , dataType: "json"
            , success: function(locations) {
                getLocations(locations)
            }
        })
    }

    function getLocations(locations) {
if(document.getElementById('map_canvas'))
{
 var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 6
            , mapTypeId: google.maps.MapTypeId.ROADMAP
            , center: new google.maps.LatLng(30.0444, 31.2357)
        , });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;
        for (i = 0; i < locations.length; i++) {

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2])
                , map: map
                , icon: {
                    url: "{{ url('frontend/1.png') }}"
                    , scaledSize: new google.maps.Size(25, 35), // scaled size
                }
            });

            marker.addListener('click', function() {

                infowindow.open(map, marker);
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    let latitude = locations[i][1];
                    let longitude = locations[i][2];

                    $.ajax({
                        type: 'get'
                        , url: "{{route('filterProjectsBasedOnLatitudeAndLongitude')}}"
                        , data: {
                            '_token': "{{csrf_token()}}"
                            , "longitude": longitude
                            , 'latitude': latitude
                        }
                        , success: function(data) {
                            if (data.status) {
                                $('#project_name').text(data.project.name);
                                document.getElementById('project_link').href = "/projects/" + data.project.id;
                                infowindow.setContent($('.project_content_modal')[0])


                                // $('#myModal').modal('show')
                            }
                        }
                        , error: function(reject) {}
                    });
                    // infowindow.open(map, marker);
                }
            })(marker, i));
        }
}
       
    }

  

</script>
<script>
    $(function(){
        $('.action-handler').on('change',function(){
            let URL = $(this).val();
            if(URL)
            {
                window.open(URL, '_blank').focus()
                // window.location.href=val;
            }
        });
    })

    $(function(){
        $('.view-certification-class td:not(:last-of-type)').on('click',function(){
            let certificationUrl = $(this).closest('tr').data('url');
            if(certificationUrl){
            window.open(certificationUrl, '_blank').focus();
            }
        });
    })
</script>
@endpush
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{ asset('frontend/css/datatable.css') }}">
@endpush
