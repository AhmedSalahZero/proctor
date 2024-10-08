{{--@extends('backend.layouts.layout')--}}


{{--@section('page_title',isset($id) ? ('Edit Subject') : ('Create Subject'))--}}


{{--@section('page_left',isset($id) ? ('Edit Subject') : ('Create Subject'))--}}
{{--@section('page_center',('Subjects'))--}}
{{--@section('page_center_link',route('stacks.index'))--}}
{{--@section('page_right',isset($id) ? ('Edit Subject'):('Create Subject'))--}}
{{--@section('page_right_link',route('stacks.create'))--}}

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
{{--                                    {{ (isset($id) ? ('Edit Subject') :('Create Subject') )  }}--}}
{{--                                </h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!--begin::Form-->--}}
{{--                        <form class="kt-form kt-form--label-right" method="post" action="{{$route}}">--}}
{{--                            @csrf--}}
{{--                            @if(isset($id))--}}
{{--                                @method('put')--}}
{{--                            @endif--}}



{{--                            @include('backend.subject.form')--}}



{{--                            <div class="kt-portlet__foot">--}}
{{--                                <div class="kt-form__actions">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-6">--}}
{{--                                            <button type="submit" class="btn btn-primary">@lang('Save')</button>--}}
{{--                                            <a href="{{route('stacks.index')}}"  class="btn btn-secondary">@lang('Cancel')</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-6 kt-align-right">--}}
{{--                                            <input type="reset" class="btn btn-danger" value="@lang('Reset')">--}}
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
{{--@endsection--}}




