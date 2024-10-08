{{--@extends('backend.layouts.layout')--}}


{{--@section('page_title',isset($id) ? trans('lang.Edit User') : trans('lang.Create User'))--}}


{{--@section('page_left',isset($id) ? trans('lang.Edit User') : trans('lang.Create User'))--}}
{{--@section('page_center',trans('lang.Users'))--}}
{{--@section('page_center_link',route('users.index'))--}}
{{--@section('page_right',isset($id) ? trans('lang.Edit User'):trans('lang.Create User'))--}}
{{--@section('page_right_link',route('users.create'))--}}

{{--@section('content')--}}


{{--        <!-- begin:: Subheader -->--}}


{{--        <!-- end:: Subheader -->--}}

{{--        <!-- begin:: Content -->--}}
{{--        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}

{{--                    <!--begin::Portlet-->--}}
{{--                    <div class="kt-portlet">--}}
{{--                        <div class="kt-portlet__head">--}}
{{--                            <div class="kt-portlet__head-label">--}}
{{--                                <h3 class="kt-portlet__head-title">--}}
{{--                                    {{ (isset($id) ? trans('lang.Edit User') :trans('lang.Create User') )  }}--}}
{{--                                </h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!--begin::Form-->--}}
{{--                        <form class="kt-form kt-form--label-right" method="post" action="{{$route}}">--}}
{{--                            @csrf--}}
{{--                            @if(isset($id))--}}
{{--                                @method('put')--}}
{{--                            @endif--}}



{{--                            <div class="kt-portlet__body">--}}
{{--                                <div class="form-group row">--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <label>@lang('lang.User Name'):</label>--}}
{{--                                        <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror " value="{{$name}}" placeholder="@lang('lang.Enter User Name')">--}}
{{--                                        <span class="form-text text-muted">@lang('lang.Please Enter User Name')</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-6">--}}
{{--                                        <label>@lang('lang.User Email'):</label>--}}
{{--                                        <input type="email"  name="email" class="form-control @error('email') is-invalid @enderror " value="{{$email}}" placeholder="@lang('lang.Enter User Email')">--}}
{{--                                        <span class="form-text text-muted">@lang('lang.Please Enter User Email')</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-6">--}}
{{--                                        <label>@lang('lang.User Phone'):</label>--}}
{{--                                        <input type="text"  name="phone" class="form-control @error('phone') is-invalid @enderror " value="{{$phone}}" placeholder="@lang('lang.Enter User Phone')">--}}
{{--                                        <span class="form-text text-muted">@lang('lang.Please Enter User Phone')</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-6">--}}
{{--                                        <label>@lang('lang.User Address'):</label>--}}
{{--                                        <input type="text"  name="address" class="form-control @error('address') is-invalid @enderror " value="{{$address}}" placeholder="@lang('lang.Enter User Address')">--}}
{{--                                        <span class="form-text text-muted">@lang('lang.Please Enter User Address')</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-6">--}}
{{--                                        <label>@lang('lang.User Rule'):</label>--}}
{{--                                        <select id="rule_select_id" name="rule_id" class="form-control kt-selectpicker" data-size="4">--}}

{{--                                             @foreach($rules as $rule)--}}

{{--                                                <option id="{{$rule->slug}}" data-rule-type="{{$rule->type}}" value="{{$rule->id}}" @if(isset($id) && $rule_id === $rule->id) selected @endif>{{$rule->name[$lang]}}</option>--}}
{{--                                            @endforeach--}}

{{--                                        </select>--}}
{{--                                        <span class="form-text text-muted">@lang('lang.Please Select User Rule')</span>--}}

{{--                                    </div>--}}

{{--                                    <div class="col-lg-6 media_div">--}}
{{--                                        <label>@lang('lang.User Media'):</label>--}}
{{--                                        <select id="media_id" name="media_id" class="form-control kt-selectpicker" data-size="4">--}}

{{--                                            @foreach($medias as $media)--}}
{{--                                                <option id="{{$media->name[$lang]}}" value="{{$media->id}}" @if(isset($id) && $media_id === $media->id) selected @endif>{{$media->name[$lang]}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                        <span class="form-text text-muted">@lang('lang.Please Select Where User Came From')</span>--}}


{{--                                    </div>--}}


{{--                                    <div class="col-lg-6 call_at_div">--}}
{{--                                        <label>@lang('lang.Came From'):</label>--}}

{{--                                        <input autocomplete="off"  name="call_at" type="text" class="form-control" placeholder="@lang('lang.Select Call Time')" id="kt_datetimepicker_5" value="{{$call_at}}"/>--}}
{{--                                        --}}{{----}}{{--                <div class="input-group-append">--}}
{{--                                        --}}{{----}}{{--														<span class="input-group-text">--}}
{{--                                        --}}{{----}}{{--															<i class="la la-calendar glyphicon-th"></i>--}}
{{--                                        --}}{{----}}{{--														</span>--}}
{{--                                        --}}{{----}}{{--                </div>--}}
{{--                                        <span class="form-text text-muted">@lang('lang.Please Enter Call Date')</span>--}}
{{--                                    </div>--}}


{{--                                    <div class="col-lg-6 password_div" >--}}
{{--                                        <label>@lang('lang.Password'):</label>--}}
{{--                                        <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror password_field" value="" placeholder="@lang('lang.Enter User Password')">--}}
{{--                                        <span class="form-text text-muted">@lang('lang.Please Enter User Password')</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-6 password_div" >--}}
{{--                                        <label>@lang('lang.Confirm Password'):</label>--}}
{{--                                        <input type="password"  name="confirm_password" class="form-control @error('password') is-invalid @enderror password_field" value="" placeholder="@lang('lang.Confirm User Password')">--}}
{{--                                        <span class="form-text text-muted">@lang('lang.Please Confirm Password')</span>--}}
{{--                                    </div>--}}

{{--                                    @if(isset($id))--}}

{{--                                        <input type="hidden" name="user_id" value="{{$id}}">--}}

{{--                                    @endif--}}



{{--                                </div>--}}


{{--                            </div>--}}
{{--                            <div class="kt-portlet__foot">--}}
{{--                                <div class="kt-form__actions">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-6">--}}
{{--                                            <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>--}}
{{--                                            <a href="{{route('users.index')}}"  class="btn btn-secondary">@lang('lang.Cancel')</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-6 kt-align-right">--}}
{{--                                            <input type="reset" class="btn btn-danger" value="@lang('lang.Reset')">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}




{{--                    <!--end::Form-->--}}
{{--                    </div>--}}

{{--                    <!--end::Portlet-->--}}



{{--                    <!--end::Portlet-->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- end:: Content -->--}}

{{--@endsection--}}


{{--@section('js')--}}
{{--    <script src="{{asset('backend/assets/js/demo1/pages/crud/forms/widgets/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>--}}

{{--    <script>--}}



{{--        const UserRuleSelect  = document.getElementById('rule_select_id');--}}

{{--        const AccountOptionValue = document.getElementById('account');--}}

{{--        const PasswordDivs = document.querySelectorAll('.password_div ');  // NodeList  [To Hide Or Show ]--}}

{{--        const MediaDivs = document.querySelectorAll('.media_div ');  // NodeList  [To Hide Or Show ]--}}

{{--        let DefaultDisplayForPasswordDivs = getDefaultDisplay(PasswordDivs);--}}

{{--        let DefaultDisplayForMediaDiv = getDefaultDisplay(MediaDivs);--}}

{{--        window.onpageshow = ChangedSelector.bind(null,AccountOptionValue);--}}

{{--        UserRuleSelect.addEventListener('change',function(event){--}}
{{--            ChangedSelector(AccountOptionValue) ;--}}

{{--        });--}}
{{--        function ChangedSelector(AccountOption)--}}
{{--        {--}}
{{--            const SelectedOptionElement = UserRuleSelect.options[UserRuleSelect.selectedIndex] ;--}}
{{--            SelectedOptionElement.getAttribute('data-rule-type') === 'backoffice' ? hideElements(MediaDivs) :ShowElements(MediaDivs,DefaultDisplayForMediaDiv)--}}

{{--            if(UserRuleSelect.value === AccountOption.value) {--}}
{{--                hideElements(PasswordDivs); // NodeList--}}

{{--                ResetChildrenInputs(PasswordDivs);--}}
{{--            }--}}
{{--            else{--}}
{{--                ShowElements(PasswordDivs,DefaultDisplayForPasswordDivs);--}}
{{--            }}--}}

{{--        function hideElements(NodeList)--}}
{{--        {--}}
{{--            NodeList.forEach(function(element){--}}
{{--                element.style.display = 'none';--}}
{{--            });--}}
{{--        }--}}
{{--        function ShowElements(NodeList,display)--}}
{{--        {--}}
{{--            for(let i = 0 ; i< NodeList.length ; i++)--}}
{{--            {--}}
{{--                 NodeList[i].style.display = display[i];--}}
{{--            }--}}

{{--        }--}}

{{--        function ResetChildrenInputs(NodeList)--}}
{{--        {--}}
{{--            NodeList.forEach(function(Element){--}}
{{--                Array.from(Element.getElementsByTagName('input')).forEach(function(Input){--}}
{{--                    Input.value = '';--}}
{{--                });--}}
{{--            });--}}
{{--        }--}}

{{--        function getDefaultDisplay(NodeList)--}}
{{--        {--}}
{{--            let DefaultDisplay = [];--}}

{{--            for(let i = 0 ; i<NodeList.length ; i++)--}}
{{--            {--}}
{{--                DefaultDisplay[i] =  getComputedProperty(NodeList[i],'display');--}}
{{--            }--}}

{{--            return DefaultDisplay ;--}}
{{--        }--}}

{{--        function getComputedProperty(element,property)--}}
{{--        {--}}
{{--            return window.getComputedStyle(element).getPropertyValue(property)--}}
{{--        }--}}




{{--    </script>--}}

{{--@endsection--}}




