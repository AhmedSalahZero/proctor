@extends('instructor.layout')

@section('content')
<div class="section__header">
    <div class="section__top__header">{{ __('welcome to your account') }}</div>
    <div class="section__main__header">
        <div class="section__main__header__contianer">
            <img src="{{ asset('frontend/images/logo2.png') }}" class="logo__img">
            <div class="section__main__header__desc">
                <h2 class="h2__title"> {{ __('Welcome to your IADC WellSharp Testing Portal') }} </h2>
                <p class="p__desc"> Please keep your name and contact information up to date so that we have accurate records for scheduling and reporting purposes. </p>
            </div>
        </div>
    </div>
</div>



<div class="section__header mt-4">
    <div class="section__top__header">{{ __('Update Your Profile') }}</div>
    <div class="section__main__header">
        <div class="section__main__header__contianer">
            <form action="{{ route('store.instuctor.profile') }}" enctype="multipart/form-data" method="post" class="section__main_content">
                @csrf

                <div class="section__main_content__l">
                    <div class="section__main__content__content">
                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('Full Name')}}:</label>
                            <input name="Full_Name" type="text" placeholder="{{__('Full Name')}}" value="{{ old('Full_Name') ?: $user->getFullName() }}" class="form-control form-control-sm input-element">
                            {{-- <input type="text" placeholder="{{__('Last')}}" class="form-control form-control-sm input-element"> --}}
                        </div>
                        <div class="form-container three-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Date Of Birth') }}:</label>
                            <select name="month_of_birth" data-width="fit" data-style="form-control" data-show-tick="true" data-live-search-normalize="false" data-live-search-placeholder="{{ __('Select Month') }}" data-live-search="true" placeholder="{{ __('Month') }}" class="form-control form-control-sm" >
                                @foreach (getMonths() as $month)
                                <option @if($month == $user->getBirthDayMonth()) selected @endif value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                            <select data-width="fit" data-style="form-control" data-show-tick="true" data-live-search-placeholder="{{ __('Select Day') }}" class="form-control form-control-sm" name="day_of_birth">
                                @for($i = 1 ; $i<= 31 ; $i++) <option @if($i == $user->getBirthDayDay()) selected @endif value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('email')}}:</label>
                            <input name="Email" type="text" placeholder="{{__('Email')}}" value="{{old('Email') ?: $user->getEmail()}}" class="form-control form-control-sm input-element">
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('Phone Number')}}:</label>
                            <input name="Phone" type="text" placeholder="{{__('Phone Number')}}" value="{{old('Phone') ?: $user->getPhone()}}" class="form-control form-control-sm input-element">
                        </div>


                        <div class="form-container three-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Country') }}:</label>
                            <select data-width="fit" data-show-tick="true" data-live-search-placeholder="{{ __('Select Country') }}" data-style="form-control" data-live-search="true" id="country_select" placeholder="{{ __('Country') }}" class="form-control form-control-sm" name="country">
                                @foreach (getAllCountries() as $country)
                                <option @if($country == $user->getCountry()) selected @endif value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('City')}}:</label>
                            <input  name="city" type="text" placeholder="{{__('City')}}" value="{{old('city')?:$user->getCity()}}" class="form-control form-control-sm input-element">
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('Postal Code')}}:</label>
                            <input  name="postal_code" type="text" placeholder="{{__('Postal Code')}}" value="{{old('postal_code')?:$user->getPostalCode()}}" class="form-control form-control-sm input-element">
                        </div>

                    </div>
                </div>
                <div class="section__main_content__r">
                    <div class="section__main__content__content">
                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('Company')}}:</label>
                            <input name="company" type="text" placeholder="{{__('Company')}}" value="{{old('company')?:$user->getCompany()}}" class="form-control form-control-sm input-element">
                        </div>


                        <div class="form-container three-columns form-inline gap-2 mb-1">
                            <label class="label">{{ __('Position') }}:</label>
                            <select data-width="fit" data-show-tick="true" data-live-search-placeholder="{{ __('Select Position') }}" data-style="form-control" data-live-search="true" placeholder="{{ __('Position') }}" class="form-control form-control-sm" name="position">
                                @foreach (getPositions() as $position)
                                <option @if($position == $user->getPosition() )  selected @endif  value="{{ $position }}">{{ $position }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">{{__('Employee Id')}}:</label>
                            <input name="employee_id" type="text" placeholder="{{__('Emplyee Id')}}" value="{{old('employee_id') ?: $user->getEmployeeId()  }}" class="form-control form-control-sm input-element">
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1 ">
                            <label class="label">{{__('Password')}}:</label>
                            <div class="text-left change__password_toggler"><a href="#" class="custom__links"> {{ __('change password') }}</a></div>

                            <div class="change__password__container pt-2 px-2  border-dashed d-none">
                                <div class="password--item form-inline form-container two-columns-small">
                                    <label class="custom-label">{{ __('new password') }}</label>
                                    <input id="password" type="text" class="form-control" name="password">
                                </div>

                                <div class="password--item  form-inline form-container two-columns-small mb-3">
                                    <label class="custom-label">{{ __('Retype New Password:') }}</label>
                                    <input id="confirm_password" type="text" class="form-control" name="password_confirmation">
                                </div>
                                <div class="submit__password mb-3">
                                    <button id="update-password" class="btn btn-success btn-sm text-white small-btn">{{ __('update password') }}</button>
                                    <button id="cancel-password" class="btn btn-info btn-sm text-black small-btn close--change--password">{{ __('cancel') }}</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label class="label">
                            </label>
                            <x-form.image-preview :image="getImagePathObject($user->image)" :model="$user" :name="'image'" :instance_no="1" :type="'image'" :label="''" :relation="'image'"></x-form.image-preview>
                        </div>

                        <div class="form-container two-columns form-inline gap-2 mb-1">
                            <label></label>
                            <a href="{{ route('download.instructor.certification' ) }}" class="btn btn-primary btn-sm btn-bg" style="width:max-content">
                                <i class="fas fa-download"></i>
                                <span>{{ __('Download Certificate') }}</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="submit_btn__class text-right">
                    <button id="save-profile-id" class="btn btn-sm btn-success text-capitalize" type="submit">{{ __('save profile') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

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
    $(document).on('click','#update-password',function(e){
        e.preventDefault();
        let password = $('#password').val();
        let confirmPassword = $('#confirm_password').val();
        if(! password){
            Swal.fire({
                icon:"error",
                title:"Oops...",
                text:"Please Enter Password"
            });
            return ; 
        }
        if(password !== confirmPassword){
            Swal.fire({
                icon:"error",
                title:"Oops...",
                text:"Password Not Confirmed Confirmed"
            });
            return ;
        }
        $.ajax({
            url:"{{ route('instructor.change.password') }}",
            data:{
                "_token":"{{ csrf_token() }}",
                "password":password
            },
            type:"POST",
            success:function(response){
                Swal.fire({
                    icon:"success",
                    title:"Done",
                    text:"Password Has Been Changed Successfully"
                });
                $('#password').val('');
                $('#confirm_password').val('');
                $('#cancel-password').trigger('click');
            }
        });
        

    });

</script>
<script>
    $(document).on('keypress' , function(e){
        e.preventDefault();
        let key = e.which ;
        console.log(key == 13);
        if(key == 13){
            $('#save-profile-id').trigger('click');
        }
    });
</script>
@endpush
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush
