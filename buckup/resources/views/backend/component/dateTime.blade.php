@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/css/bootstrap-datetimepicker.min.css"
          integrity="sha512-m9g5oqvMhf2FsilNZqftBnOR1GW+dJpb1a8RN+R3Aw1dVI2AeDfpSOa9Sm48xMacONC1vJlM2iIadPy4uLEC4Q==" crossorigin="anonymous" />

@endpush
<input @if($required) required @endif readonly type="text" id="{{ @$id }}" name="{{ $name }}"

 class="form-control custom_input date_time_class" value="{{old_field_array('dateTime',$i ?? null , isset($reminder) ? $reminder : null)}} @if(isset($val)) {{$val}} @endif "
>
{{--date_time_class  Is Important For Initializtion --}}



@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/js/bootstrap-datetimepicker.min.js"
            integrity="sha512-4lTnmq2kNbykTiOPulgEvxRgqegB5/YMhMqaBWvxji/9wRgR9W/TSGF51/mIG1hQ6janxTojpr41y5/gaW9LRA==" crossorigin="anonymous"></script>

    @if($lang === 'ar')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/js/locales/bootstrap-datetimepicker.ar.js"
                integrity="sha512-iSeS6D8Htf5SmSp/5BVEEISwrBFfOqg6huHB1gBtx0ca4WMXamt/2WlNHxFdWSv2y497xRzlGu7WI36eBpLq5Q==" crossorigin="anonymous"
                charset="UTF-8"></script>
    @endif

    <script>
        $(() => {
            $('.date_time_class').datetimepicker(

            );
        })
    </script>
@endpush




