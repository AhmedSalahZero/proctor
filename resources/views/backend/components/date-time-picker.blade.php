<div class="col-lg-6">
<label for="{{ $name }}" class="text-dark" >
    {{ $label }} <span class="text-danger">*</span>
</label>

    {{-- Input Date --}}
    <input @if($required) required @endif readonly type="text" id="{{ $name }}" name="{{ $name }}" class="form-control" value="{{$val}}">

</div>

{{-- Add plugin initialization and configuration code --}}

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
            $('#{{ $name }}').datetimepicker(  );
        })

    </script>
@endpush


@once
    @push('style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/css/bootstrap-datetimepicker.min.css"
              integrity="sha512-m9g5oqvMhf2FsilNZqftBnOR1GW+dJpb1a8RN+R3Aw1dVI2AeDfpSOa9Sm48xMacONC1vJlM2iIadPy4uLEC4Q==" crossorigin="anonymous" />
    @endpush
@endonce
