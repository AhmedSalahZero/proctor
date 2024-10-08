@extends('backend.layouts.layout')


@section('page_title', isset($id) ? 'Edit Certification' : 'Create Certification')


@section('page_left', isset($id) ? 'Edit Certification' : 'Create Certification')
@section('page_center', 'Certifications')
@section('page_center_link', route('certifications.index'))
@section('page_right', isset($id) ? 'Edit Certification' : 'Create Certification')
@section('page_right_link', route('certifications.create'))

@section('content')


    <!-- begin:: Subheader -->


    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">

                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ isset($id) ? 'Edit Certification' : 'Create Certification' }}
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right" method="post" action="{{ $route }}">
                        @csrf
                        @if (isset($id))
                            @method('put')
                        @endif



                        @include('backend.certifications.form', [
                        'student_exist'=>true,
                        'checkbox'=>true
                        ])


                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary">@lang('Save')</button>
                                        <a href="{{ route('certifications.index') }}"
                                            class="btn btn-secondary">@lang('Cancel')</a>
                                    </div>
                                    <div class="col-lg-6 kt-align-right">
                                        <input type="reset" class="btn btn-danger" value="@lang('Reset')">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>




                    <!--end::Form-->
                </div>

                <!--end::Portlet-->



                <!--end::Portlet-->
            </div>
        </div>
    </div>

    <!-- end:: Content -->

@endsection


@section('js')
    <script src="{{ asset('backend/assets/js/demo1/pages/crud/forms/widgets/bootstrap-datetimepicker.js') }}"
        type="text/javascript"></script>

    {{-- <script> --}}



    {{-- const CertificationRuleSelect  = document.getElementById('rule_select_id'); --}}

    {{-- const AccountOptionValue = document.getElementById('account'); --}}

    {{-- const PasswordDivs = document.querySelectorAll('.password_div ');  // NodeList  [To Hide Or Show ] --}}

    {{-- const MediaDivs = document.querySelectorAll('.media_div ');  // NodeList  [To Hide Or Show ] --}}

    {{-- let DefaultDisplayForPasswordDivs = getDefaultDisplay(PasswordDivs); --}}

    {{-- let DefaultDisplayForMediaDiv = getDefaultDisplay(MediaDivs); --}}

    {{-- window.onpageshow = ChangedSelector.bind(null,AccountOptionValue); --}}

    {{-- CertificationRuleSelect.addEventListener('change',function(event){ --}}
    {{-- ChangedSelector(AccountOptionValue) ; --}}

    {{-- }); --}}
    {{-- function ChangedSelector(AccountOption) --}}
    {{-- { --}}
    {{-- const SelectedOptionElement = CertificationRuleSelect.options[CertificationRuleSelect.selectedIndex] ; --}}
    {{-- SelectedOptionElement.getAttribute('data-rule-type') === 'backoffice' ? hideElements(MediaDivs) :ShowElements(MediaDivs,DefaultDisplayForMediaDiv) --}}

    {{-- if(CertificationRuleSelect.value === AccountOption.value) { --}}
    {{-- hideElements(PasswordDivs); // NodeList --}}

    {{-- ResetChildrenInputs(PasswordDivs); --}}
    {{-- } --}}
    {{-- else{ --}}
    {{-- ShowElements(PasswordDivs,DefaultDisplayForPasswordDivs); --}}
    {{-- }} --}}

    {{-- function hideElements(NodeList) --}}
    {{-- { --}}
    {{-- NodeList.forEach(function(element){ --}}
    {{-- element.style.display = 'none'; --}}
    {{-- }); --}}
    {{-- } --}}
    {{-- function ShowElements(NodeList,display) --}}
    {{-- { --}}
    {{-- for(let i = 0 ; i< NodeList.length ; i++) --}}
    {{-- { --}}
    {{-- NodeList[i].style.display = display[i]; --}}
    {{-- } --}}

    {{-- } --}}

    {{-- function ResetChildrenInputs(NodeList) --}}
    {{-- { --}}
    {{-- NodeList.forEach(function(Element){ --}}
    {{-- Array.from(Element.getElementsByTagName('input')).forEach(function(Input){ --}}
    {{-- Input.value = ''; --}}
    {{-- }); --}}
    {{-- }); --}}
    {{-- } --}}

    {{-- function getDefaultDisplay(NodeList) --}}
    {{-- { --}}
    {{-- let DefaultDisplay = []; --}}

    {{-- for(let i = 0 ; i<NodeList.length ; i++) --}}
    {{-- { --}}
    {{-- DefaultDisplay[i] =  getComputedProperty(NodeList[i],'display'); --}}
    {{-- } --}}

    {{-- return DefaultDisplay ; --}}
    {{-- } --}}

    {{-- function getComputedProperty(element,property) --}}
    {{-- { --}}
    {{-- return window.getComputedStyle(element).getPropertyValue(property) --}}
    {{-- } --}}




    {{-- </script> --}}

@endsection
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">


@endpush
@push('js')
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script>
        $('.ui.dropdown')
            .dropdown({
                allowAdditions: true
            });
    </script>

    <script>
        document.addEventListener('keyup', function(event) {

            if (event.target.className === 'search') {


                $.ajax({
                    type: 'post',
                    url: "/admin/filter-students/",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'keyword': event.target.value
                    },
                    success: function(data) {
                        if (data.status) {
                            document.getElementById('select_students_id').innerHTML = ''
                            for (let i = 0; i < data.students.length; i++) {
                                document.getElementById('select_students_id').innerHTML +=
                                    `<option value="${data.students[i].ID}" >${data.students[i].User_Name}</option>`
                                //   data.students[i].User_Name
                            }

                        } else {
                            console.log('no students');
                        }
                    },
                    error: function(reject) {}
                });

            }

        })
    </script>
@endpush
