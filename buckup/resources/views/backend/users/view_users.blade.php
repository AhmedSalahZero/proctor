@extends('backend.layouts.layout')


@section('page_title',trans('lang.All Users'))
@section('page_left',trans('lang.All Users'))
@section('page_center',trans('lang.Users'))
@section('page_center_link',route('users.index'))
@section('page_right',trans('lang.Users'))
@section('page_right_link',route('users.index'))

@section('content')

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
{{--        <div class="alert alert-light alert-elevate" role="alert">--}}
{{--            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>--}}
{{--            <div class="alert-text">--}}
{{--          @lang('lang.This Section Contains Sensitive Data .. Be Careful')--}}
{{--           </div>--}}
{{--        </div>--}}
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-user"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        Admins
                    </h3>
                </div>

{{--                <div class="kt-portlet__head-toolbar">--}}
{{--                    <div class="kt-portlet__head-wrapper">--}}
{{--                        <div class="kt-portlet__head-actions">--}}
{{--                            <div class="dropdown dropdown-inline">--}}
{{--                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="la la-filter"></i> Filter By--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <ul class="kt-nav">--}}
{{--                                        <li class="kt-nav__section kt-nav__section--first">--}}
{{--                                            <span class="kt-nav__section-text">@lang('lang.Choose an option')</span>--}}
{{--                                        </li>--}}
{{--                                        <li class="kt-nav__item">--}}
{{--                                            <a  class="kt-nav__link " >--}}
{{--                                                <i class="kt-nav__link-icon la la-users"></i>--}}
{{--                                                <span class="kt-nav__link-text filter_by_link" data-filter_by="all">@lang('lang.All')</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}



{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            &nbsp;--}}
{{--                            <a href="{{route('users.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">--}}
{{--                                <i class="la la-plus"></i>--}}
{{--                                @lang('lang.New Record')--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
            <div class="kt-portlet__body">






                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>Record ID</th>

                            <th>Name</th>
                            <th>Email</th>

{{--                            <th>Call Date</th>--}}
{{--                            <th>Actions</th>--}}
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($users as $key=>$user)
                              <tr >
                                  <td class="dt-right">{{++$key}}</td>



                                  <td>{{$user->name}}</td>
                                  <td>{{$user->email}}</td>

{{--                                  <td>{{$user->call_at}}</td>--}}
{{--                                  <td >--}}
{{--                                      <span style="overflow: visible; position: relative; width: 110px;">--}}
{{--                                          <a  title="Edit details" href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >--}}
{{--                                              <i class="la la-edit"></i>--}}
{{--                                          </a>--}}



{{--                                          <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#edit_user_{{$user->id}}_model">--}}

{{--                                              <i class="la la-trash"></i>--}}
{{--                                          </a>--}}

{{--                                            @include('backend.partials.confirm_modal',[--}}
{{--                                                                                        'operation'=>trans('lang.Delete'),--}}
{{--                                                                                        'operationClass'=>'btn-danger',--}}
{{--                                                                                        'target'=>"edit_user_".$user->id."_model" ,--}}
{{--                                                                                        'title'=>trans('lang.Delete').' '.$user->name . ' '.trans('lang.User') ,--}}
{{--                                                                                         'message'=>trans('lang.Area You Sure To Delete This Record With All Associated Data ? '),--}}
{{--                                                                                          'action'=>route('users.destroy',$user->id)--}}

{{--                                                                                         ])--}}

{{--                                      </span>--}}
{{--                                  </td>--}}

                              </tr>


                          @endforeach
                    </tbody>

                </table>

            <!--end: Datatable -->
            </div>

        </div>

    </div>



@endsection

@section('js')
    <script src="{{ asset('backend/assets/js/demo1/pages/crud/metronic-datatable/advanced/column-width.js') }}" type="text/javascript"></script>



@endsection



































{{--@extends('backend.layouts.layout')--}}


{{--@section('page_title',trans('lang.All Users'))--}}
{{--@section('page_left',trans('lang.All Users'))--}}
{{--@section('page_center',trans('lang.Users'))--}}
{{--@section('page_center_link',route('users.index'))--}}
{{--@section('page_right',trans('lang.Users'))--}}
{{--@section('page_right_link',route('users.index'))--}}

{{--@section('content')--}}

{{--    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">--}}
{{--        <div class="alert alert-light alert-elevate" role="alert">--}}
{{--            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>--}}
{{--            <div class="alert-text">--}}
{{--                @lang('lang.This Section Contains Sensitive Data .. Be Careful')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="kt-portlet kt-portlet--mobile">--}}
{{--            <div class="kt-portlet__head kt-portlet__head--lg">--}}
{{--                <div class="kt-portlet__head-label">--}}
{{--										<span class="kt-portlet__head-icon">--}}
{{--											<i class="kt-font-brand flaticon2-line-chart"></i>--}}
{{--										</span>--}}
{{--                    <h3 class="kt-portlet__head-title">--}}
{{--                        Extended Pagination--}}
{{--                    </h3>--}}
{{--                </div>--}}
{{-- --}}

{{--                <div class="kt-portlet__head-toolbar">--}}
{{--                    <div class="kt-portlet__head-wrapper">--}}
{{--                        <div class="kt-portlet__head-actions">--}}
{{--                            <div class="dropdown dropdown-inline">--}}
{{--                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="la la-filter"></i> Filter By--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <ul class="kt-nav">--}}
{{--                                        <li class="kt-nav__section kt-nav__section--first">--}}
{{--                                            <span class="kt-nav__section-text">@lang('lang.Choose an option')</span>--}}
{{--                                        </li>--}}
{{--                                        <li class="kt-nav__item">--}}
{{--                                            <a  class="kt-nav__link " >--}}
{{--                                                <i class="kt-nav__link-icon la la-users"></i>--}}
{{--                                                <span class="kt-nav__link-text filter_by_link" data-filter_by="all">@lang('lang.All')</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}

{{--                                        @foreach($rules as $rule)--}}

{{--                                            <li class="kt-nav__item">--}}
{{--                                                <a  class="kt-nav__link " >--}}
{{--                                                    <i class="kt-nav__link-icon la @if($rule->type == 'backoffice') la-user-secret @else la-user @endif"></i>--}}
{{--                                                    <span class="kt-nav__link-text filter_by_link" data-filter_by="{{$rule->name[$lang]}}">{{$rule->name[$lang]}}</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}

{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            &nbsp;--}}
{{--                            <a href="{{route('users.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">--}}
{{--                                <i class="la la-plus"></i>--}}
{{--                                @lang('lang.New Record')--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="kt-portlet__body">--}}







{{--            <!--begin: Datatable -->--}}
{{--                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Record ID</th>--}}
{{--                        <th>Rule</th>--}}
{{--                        <th>Name</th>--}}
{{--                        <th>Email</th>--}}
{{--                        <th>Phone</th>--}}
{{--                        <th>Address</th>--}}
{{--                        --}}{{--                            <th>Call Date</th>--}}
{{--                        <th>Actions</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($users as $key=>$user)--}}
{{--                        <tr class="role_{{$user->rule->name['en']}} role_all">--}}
{{--                            <td class="dt-right">{{++$key}}</td>--}}

{{--                            <td><span style="width: 128px;">--}}
{{--                                          <span class="kt-badge  @if($user->isAdmin()  ) kt-badge--danger @else kt-badge--primary @endif kt-badge--inline kt-badge--pill">--}}
{{--                                              {{$user->rule->name[$lang]}}--}}
{{--                                          </span></span>--}}
{{--                            </td>--}}

{{--                            <td>{{$user->name}}</td>--}}
{{--                            <td>{{$user->email}}</td>--}}
{{--                            <td>{{$user->phone}}</td>--}}
{{--                            <td>{{$user->address}}</td>--}}
{{--                            --}}{{--                                  <td>{{$user->call_at}}</td>--}}
{{--                            <td >--}}
{{--                                      <span style="overflow: visible; position: relative; width: 110px;">--}}
{{--                                          <a  title="Edit details" href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >--}}
{{--                                              <i class="la la-edit"></i>--}}
{{--                                          </a>--}}



{{--                                          <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#edit_user_{{$user->id}}_model">--}}

{{--                                              <i class="la la-trash"></i>--}}
{{--                                          </a>--}}

{{--                                            @include('backend.partials.confirm_modal',[--}}
{{--                                                                                        'operation'=>trans('lang.Delete'),--}}
{{--                                                                                        'operationClass'=>'btn-danger',--}}
{{--                                                                                        'target'=>"edit_user_".$user->id."_model" ,--}}
{{--                                                                                        'title'=>trans('lang.Delete').' '.$user->name . ' '.trans('lang.User') ,--}}
{{--                                                                                         'message'=>trans('lang.Area You Sure To Delete This Record With All Associated Data ? '),--}}
{{--                                                                                          'action'=>route('users.destroy',$user->id)--}}

{{--                                                                                         ])--}}

{{--                                      </span>--}}
{{--                            </td>--}}

{{--                        </tr>--}}


{{--                    @endforeach--}}
{{--                    </tbody>--}}

{{--                </table>--}}







{{--                <!--end: Datatable -->--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}



{{--@endsection--}}

{{--@section('js')--}}
{{--    <script src="{{ asset('backend/assets/js/demo1/pages/crud/metronic-datatable/advanced/column-width.js') }}" type="text/javascript"></script>--}}
{{--    <script>--}}
{{--        const userTypesLinks  = document.getElementsByClassName('filter_by_link');--}}
{{--        Array.from(userTypesLinks).forEach(function(userTypeLink){--}}
{{--            userTypeLink.addEventListener('click',function(event){--}}
{{--                const rule = event.target.getAttribute('data-filter_by') ;--}}
{{--                const AllRules = document.getElementsByClassName('role_all');--}}
{{--                Array.from(AllRules).forEach(function(Rule){--}}

{{--                    Rule.style.display ='none';--}}
{{--                });--}}
{{--                const selectedRules = document.getElementsByClassName('role_'+rule) ;--}}
{{--                Array.from(selectedRules).forEach(function(selectedRule){--}}
{{--                    selectedRule.style.display = 'table-row';--}}
{{--                })--}}

{{--            });--}}
{{--        });--}}

{{--    </script>--}}


{{--@endsection--}}
