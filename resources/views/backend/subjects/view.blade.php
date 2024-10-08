@extends('backend.layouts.layout')


@section('page_title',('All Subjects'))
@section('page_left',('All Subjects'))
@section('page_center',('Subjects'))
@section('page_center_link',route('stacks.index'))
@section('page_right',('Subjects'))
@section('page_right_link',route('stacks.index'))

@section('content')

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="alert alert-light alert-elevate" role="alert">
            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
            <div class="alert-text">
          @lang('This Section Contains Sensitive Data .. Be Careful')
           </div>
        </div>
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        All Subjects
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
{{--                            <div class="dropdown dropdown-inline">--}}
{{--                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="la la-filter"></i> Filter By--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <ul class="kt-nav">--}}
{{--                                        <li class="kt-nav__section kt-nav__section--first">--}}
{{--                                            <span class="kt-nav__section-text">@lang('Choose an option')</span>--}}
{{--                                        </li>--}}
{{--                                        <li class="kt-nav__item">--}}
{{--                                            <a  class="kt-nav__link " >--}}
{{--                                                <i class="kt-nav__link-icon la la-Stacks"></i>--}}
{{--                                                <span class="kt-nav__link-text filter_by_link" data-filter_by="all">@lang('All')</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}



{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            &nbsp;--}}
                            <a href="{{route('stacks.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                              New Subject
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="kt-portlet__body">






                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>Name</th>
                            <th>Description</th>



                            <th>Actions</th>

                            <th style="position: absolute;right: -5px"  colspan="4"></th>
                            <th style="position: absolute;right: -5px" ></th>
                            <th style="position: absolute;right: -5px" ></th>
                            <th style="position: absolute;right: -5px" ></th>
                            <th style="position: absolute;right: -5px"></th>

                        </tr>
                    </thead>
                    <tbody>
                          @foreach($stacks as $key=>$stack)
                              <tr >

                                  <td >{{++$key}}</td>
                                  <td>{{$stack->name}}</td>
                                  <td>{{$stack->description}}</td>
{{--                                  <td>{{$stack->courseType->name}}</td>--}}


                                  <td>
                                      <span style="overflow: visible; position: relative; width: 110px;">
                                          <a  title="Edit details" href="{{route('stacks.edit',$stack->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="button"  >
                                              <i class="la la-edit"></i>
                                          </a>
                                          @unless($stack->exam)
                                          <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#edit_stack_{{$stack->id}}_model">

                                              <i class="la la-trash"></i>
                                          </a>

                                            @include('backend.partials.confirm_modal',[
                                                                                        'operation'=>('Delete'),
                                                                                        'operationClass'=>'btn-danger',
                                                                                        'target'=>"edit_stack_".$stack->id."_model" ,
                                                                                        'title'=>('Delete').' '.$stack->name . ' '.('Stack') ,
                                                                                         'message'=>('Area You Sure To Delete This Record With All Associated Data ? '),
                                                                                          'action'=>route('stacks.destroy',$stack->id)
                                                                                         ])
                                          @endunless
                                      </span>
                                  </td>

                                  <td  style="position: absolute;right: -5px"  colspan="5">

                                  </td>
                                  <td style="position: absolute;right: -5px" ></td>
                                  <td style="position: absolute;right: -5px" ></td>
                                  <td style="position: absolute;right: -5px" ></td>
                                  <td style="position: absolute;right: -5px" ></td>
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
{{--    <script>--}}
{{--        const stackTypesLinks  = document.getElementsByClassName('filter_by_link');--}}
{{--        Array.from(stackTypesLinks).forEach(function(stackTypeLink){--}}
{{--            stackTypeLink.addEventListener('click',function(event){--}}
{{--                const rule = event.target.getAttribute('data-filter_by') ;--}}
{{--                const AllRules = document.getElementsByClassName('role_all');--}}
{{--                Array.from(AllRules).forEach(function(Rule){--}}

{{--                   Rule.style.display ='none';--}}
{{--                });--}}
{{--                const selectedRules = document.getElementsByClassName('role_'+rule) ;--}}
{{--                Array.from(selectedRules).forEach(function(selectedRule){--}}
{{--                    selectedRule.style.display = 'table-row';--}}
{{--                })--}}

{{--            });--}}
{{--        });--}}

{{--    </script>--}}


@endsection
