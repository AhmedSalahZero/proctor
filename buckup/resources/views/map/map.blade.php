<div class="class-map-container position-relative">
    <div class="section__top__header text-center">{{ __('Class Map') }}</div>
    <div id="map_canvas" style="height: 510px;width: 100%"></div>
    <div class="map--select--div">
        <div class="map-select-content">
            <div class="">
                <span class="time-frame">Report Type :</span>
                
                <select id="report-type" name="map_filter_type" class="update-google-map-class">
                    <option data-next="Next" value="add classes">Scheduled Classes </option>
                    <option data-next="Previous" value="sub classes">Class History </option>
                    <option data-next="Previous" value="add exams">Exams (Past) </option>
                    <option data-next="Next" value="sub exams">Exams (Future) </option>
                </select>
            </div>
            <div class="">
                <span class="time-frame">Time Frame :</span>
                <select id="time-frame" class="update-google-map-class">
                    <option value="1 Weeks" data-text="1 Week"> Next 1 Week</option>
                    <option value="2 Weeks" data-text="2 Weeks"> Next 2 Weeks</option>
                    <option value="3 Weeks" data-text="3 Weeks"> Next 3 Weeks</option>
                    <option value="1 Months" data-text="1 Months"> Next 1 Months</option>
                    <option value="2 Months" data-text="2 Months"> Next 2 Months</option>
                    <option value="3 Months" data-text="3 Months"> Next 3 Months</option>
                    <option value="6 Months" data-text="6 Months"> Next 6 Months</option>
                    <option value="1 Years" data-text="1 Year"> Next 1 Year</option>
                    <option value="200 Years">All Times</option>
                    {{-- <option value="">Scheduled Classes </option> --}}
                </select>
            </div>
            
        </div>
    </div>
</div>

@push('js')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyD1pzxgf9AUfrWE2pLVQanO6Ti9a5lZDGo&libraries=places&region=eg&language=en"></script>
<script>
    $(document).ready(function() {
        var locations = @json($locations);
        getLocations(locations);
    });

    function getLocations(locations) {

        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 6
            , mapTypeId: google.maps.MapTypeId.ROADMAP
            , center: new google.maps.LatLng(30.0444, 31.2357)
        , });

        window.google_map = map ;

        var infowindow = new google.maps.InfoWindow();

        var marker, i ;
        window.markers = []
        for (i = 0; i < locations.length; i++) {

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2])
                , map: map
                , icon: {
                    url: "{{ url('frontend/1.png') }}"
                    , scaledSize: new google.maps.Size(25, 35), // scaled size
                }
            });
            window.markers[i] = marker ; 

            marker.addListener('click', function() {

                // infowindow.open(map, marker);
            });

        }
    }

</script>
<script>
    $('#report-type').on('change',function(){
        let nextOrPrevious = $(this).find('option:selected').data('next');
        $('#time-frame option[data-text]').each(function(index,item){
            $(item).html(nextOrPrevious + ' ' + $(this).data('text'));
        });
        $('#time-frame').trigger('change');
    })
</script>
<script>
    $(document).on('change','.update-google-map-class',function(){
        let timeFrame = $('#time-frame').val();
        let reportType = $('#report-type').val();
        $.ajax({
            url:"{{ route('update.google.map') }}",
            data:{
                timeFrame:timeFrame ,
                reportType:reportType
            },
            type:"get",
            success:function(res){
                //remove old markers 

                for(let i = 0 ; i< window.markers.length ; i++)
                {
                    window.markers[i].setMap(null);
                }
                // remove old markers from global array 
                window.markers = [];
                // add new markers
                for(i = 0 ; i<res.locations.length ; i++)
                {
                     marker = new google.maps.Marker({
                    position: { lat: parseFloat(res.locations[i]['lat']), lng: parseFloat(res.locations[i]['lng']) },
                    map: window.google_map
                    , icon: {
                                    url: "{{ url('frontend/1.png') }}"
                                    , scaledSize: new google.maps.Size(25, 35), // scaled size
                                }
                });
                     window.markers[i] = marker ;  
                }
                 

               

                


                
            }
        });
    })

</script>
<script>
    $('#filter-calendar').on('change',function(){
        window['currentCalendar'].refetchEvents();
    })
</script>


@endpush