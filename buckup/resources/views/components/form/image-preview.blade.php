
@push('css')
    @once
    <style>
        .no-padding{padding:0 !important}
        .images_container{
            display:flex;flex-wrap:wrap;padding:0 !important;
        }
        .image_container
        {
            width: 125px;
            height: 125px;
            border: 4px solid white;
            position: relative;
            box-shadow: 0 .5rem 1.5rem .5rem rgba(0,0,0,.075);
            margin-left:15px;
            margin-bottom:30px;
        }
        .image_label
        {
            position: absolute;
            top: -10px;
            left: -10px;
            background-color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
        }
        .edit_image_icon
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50% , -50%);
            color: #646363;
            cursor: pointer;
        }
        .remove_image
        {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
        }
        .remove_image_icon
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50% , -50%);
            color: #646363;
            cursor: pointer;
        }
        .add-image-btn
        {
            background: #EDEDED;
            color: black;
            border-radius: 20px;

        }
        .image_label_name
        {
            font-size:13px;
            text-overflow: ellipsis;
            overflow: hidden;
            display: block;
            direction:ltr;
            visibility: hidden;
        }
    </style>
    @endonce
    @endpush


{{--<div class="col-1">--}}
{{----}}
{{--</div>--}}

    <div class="col-6 align-items-center d-flex flex-wrap no-padding">

        <button
       

         class="btn  btn-small add-image-btn col-3">
         {{-- {{$label}} --}} 
         </button>
        <div class="images_container col-11" data-name="{{$name}}" data-instance-number="{{$instanceNo}}" data-type="{{$type}}">

            @isset($model)
                {{-- @foreach($model->{$relation} as $key=>$image) --}}
                   @include('components.form.image-item' , [
                    'image_no'=>1,
                    'image'=>$image ,
                    'instance_no'=>$instanceNo ,
                    'type'=>$type,
                            ])
                {{-- @endforeach --}}


            @else
                        @include('components.form.image-item' , [
                          'image_no'=>1,
                          'instance_no'=>$instanceNo,
                                      'type'=>$type

                      ])
            @endisset

    </div>
</div>


@push('js')
    @once

        <script>
            $(document).on('change','.image_prev',function(event){

                let file = this.files[0]
                var imageType = /image.*/;
                // console.log('file type is');
                // console.log(file.type);
                let type = '';
                let extension = null ;
                let previewImageForFile = {};
                if(file){
                    if (file.type.match(imageType)) {
                    // return ;
                    type = 'image';
                }
                else {

                    type = 'file';
                    extension = file.name.split('.')[file.name.split('.').length - 1];
                    let supportedFiles = @json(\App\Models\Documentation::allowed);

                    if(supportedFiles.includes(extension))
                    {
                        previewImageForFile = @json(\App\Models\Documentation::getExtensionsImage())


                    }
                    else {
                        // alert('')
                        let fileNotSupportedMessage = 'الملف غير مدعوم .. الملفات المدعومه هي';
                        for(let i = 0 ; i < supportedFiles.length ; i ++)
                        {
                            fileNotSupportedMessage+= supportedFiles[i] + ' | ';
                        }
                        alert(fileNotSupportedMessage.trim());
                    }

                }
                var img=$(this).siblings('img')[0];

                let hidden_image_input = $(this).siblings('input.old_image_preview')[0] ;
                let images_no_to_delete = $(this).siblings('input.images_not_to_delete')[0] ;
                let imageLabelName = $(this).siblings('label.image_label_name')[0];
                let old_image_name = $(this).siblings('input.old_image_name')[0] ;

                var reader = new FileReader();

                reader.readAsDataURL(file);
                reader.onload = function(e) {

                    img.src = type === 'image' ? e.target.result : previewImageForFile[extension] ;
                    hidden_image_input.value =type === 'image' ? e.target.result : previewImageForFile[extension] ; // this to fix firefox problem with old data when reload
                    images_no_to_delete.value = null  ; // this to handle state when we upload an image that does not change
                    imageLabelName.innerText = file.name;
                    old_image_name.value = file.name ;
                }
                }


            })
            $(document).on('click','.remove_image',function(e){
                e.preventDefault();
                let numberOfInstances = $(this).closest('.images_container').length ;

                $(this.closest('div.image_container')).fadeOut(500,function(){
                    $(this.closest('div.image_container')).remove();

                    if(numberOfInstances==1)
                {
                    $('.add-image-btn').trigger('click');
                }


                });

                


            });
            $(function(){
                $('.image_prev').each(function(index ,image_prev ){
                    let old_image_src = $(image_prev).siblings('input.old_image_preview')[0].value;
                    let old_image_name = $(image_prev).siblings('input.old_image_name')[0].value;
                    if(old_image_src) {

                        $(image_prev).siblings('img')[0].src = old_image_src;
                        $(image_prev).siblings('input.images_not_to_delete')[0].value = null ;
                        $(image_prev).siblings('label.image_label_name')[0].innerText = old_image_name ;
                        $(image_prev).siblings('input.old_image_name')[0].value = old_image_name ;

                    }
                })
            })
            $(document).on('click','.add-image-btn',function(e){
                e.preventDefault();
                   let numberOfInstances = $(this).next('div.images_container').find('div.image_container').length ;
                //    remove this code for supporting multi instance
                   if(numberOfInstances == 1)
                   {
                    //    alert('no_to_add')
                       return ;
                   }



                let latestImageContainer = $(this).next('div.images_container').find('div.image_container:last-of-type')[0] ;
                let images_no = 0 ;
                if(latestImageContainer) {

                     images_no =latestImageContainer.getAttribute('data-order');

                }

                let new_image_no = images_no + 1 ;
                let inputName = $(this).next('div.images_container')[0].getAttribute('data-name');
                let instanceNumber = $(this).next('div.images_container')[0].getAttribute('data-instance-number') ;
                let type = $(this).next('div.images_container')[0].getAttribute('data-type') ;
                var lang = $('body').data('lang');
                 var trans = {
                     "pleaseSelect":{
                         "en":"pleaseSelect",
                         "ar":"برجاء اختيار"
                     },
                     "type_trans":{
                         "en": type == 'image' ? "Image" :"File" ,
                         "ar": type == 'image'  ? "صوره" : "ملف" ,
                     }
                };



                $(this).next('div.images_container').append(
                    `
<div class="image_container " data-order="${new_image_no}" >
    <label class="image_label" for="image_${instanceNumber}_${new_image_no}" >
        <i class="fas fa-pen edit_image_icon"></i>
    </label>

         <a class="remove_image "  href="#" style="

">
        <i class="fas fa-times remove_image_icon" ></i>
    </a>

    <img
        style="height:100% ; width:100%"

        id="" class="" alt="img" src="{{asset('image.png')}}">

        <label class="image_label_name" > ${trans.pleaseSelect[lang]} ${trans.type_trans[lang]} </label>

        <input type="hidden" name="old_image_name" class="old_image_name" value=" برجاء اختيار صوره">

    <input name="${inputName}" type="file" id="image_${instanceNumber}_${new_image_no}" class="image_prev"  style="
visibility: hidden;

">
    <input  type="hidden" name="old_image_prev" class="old_image_preview">
     <input  type="hidden" name="images_not_to_delete[${type}][]" class="images_not_to_delete" value="">


</div>
`
                );
            });
        </script>
        <script>

        </script>
        @endonce


@endpush
