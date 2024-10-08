
<div class="image_container " data-order="{{$image_no}}" >
    <label class="image_label" for="image_{{$instance_no}}_{{$image_no}}" >
        <i class="fas fa-pen edit_image_icon"></i>
    </label>                            <a class="remove_image "  href="#" style="

">
        <i class="fas fa-times remove_image_icon"></i>
    </a>
    <img
        style="height:100% ; width:100%"
        class="" alt="img" src="{{isset($image) && $image->path ? ($type == 'image' ? asset('storage/'.$image->path) : $image->getFileImage()) : asset('image.png') }} ">
        {{-- class="" alt="img" src="{{isset($image) ? ($type == 'image' ? asset('storage/'.$image->path) : $image->getFileImage()) : asset('image.png') }} "> --}}
    <input type="hidden"  name="old_image_name" class="old_image_name" value="{{isset($image) ? $image->getName() : __('Please Select Image')}}">

    
    <input name="{{$name}}"   type="file" id="image_{{$instance_no}}_{{$image_no}}" class="image_prev"
{{--           accept="images/*"--}}
           style="
visibility: hidden;

">
    <input  type="hidden" name="old_image_prev" class="old_image_preview">
    <input  type="hidden" name="images_not_to_delete[{{$type}}][]" class="images_not_to_delete" value="{{isset($image) ? $image->id : 0}}">

</div>