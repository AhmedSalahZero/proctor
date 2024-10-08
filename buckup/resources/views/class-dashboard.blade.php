   <div class="modal fade" id="ongoing_course_{{$exam->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="row align-items-center  justify-content-between flex-grow-1 py-1 px-3   ">
                                            <h5 class="pl-5 fs-large">Class Dashboard</h5>
                                            <img src="{{ asset('frontend/images/logo2.png') }}" class="logo--header pr-3">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home{{$exam->id}}" role="tab" aria-controls="nav-home" aria-selected="true">Class Details</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile{{ $exam->id }}" role="tab" aria-controls="nav-profile" aria-selected="false">Scores & Reports </a>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home{{ $exam->id }}" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="mt-3 d-flex ">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Class ID</p>
                                                            <p class="table-first-value">
                                                                {{ $exam->getClassId() }}
                                                            </p>
                                                        </div>

                                                        <div class="tabl-item-class row mb-1">
                                                            <p class="table-first-key ">Class Title Or <br> ID</p>
                                                            <p class="table-first-value">
                                                                {{ $exam->getClassTitle() }}
                                                            </p>
                                                        </div>
                                                     
                                                        <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Class Status  </p>
                                                            <p class="table-first-value">
                                                                <i data-exam-id="{{ $exam->id }}" class="class-status-icon fas fa-circle fa-xs fa-color-blue 
                                                                @if( $classType != 'upcoming' && ($classType !='ongoing' || ($classType =='ongoing' && ! $exam->display )) ) fa-color-gray @elseif($classType =='ongoing' && $exam->display) fa-color-green  @endif "></i>
                                                                <span class="start-exam-title" data-exam-id="{{ $exam->id }}">
                                                                @if($classType == 'ongoing' && $exam->display)
                                                                {{ TEST_OPEN_AND_ACTIVE }}
                                                                @elseif($classType == 'ongoing')
                                                                {{ TEST_NOT_STARTED }}
                                                                @elseif($classType == 'upcoming')
                                                                {{ TEST_NOT_STARTED }}
                                                                @else
                                                                Test Ended

                                                                @endif
                                                                </span> 
                                                                @if($classType == 'ongoing' || $classType=='upcoming')
                                                                
                                                                <button class="start-exam-btn btn sm-btn sm-btn-text btn-border-radius btn-primary text-white text-capitalize @if($exam->display) d-none @endif " data-toggle="modal" data-target="#start_exam_{{$exam->id}}" data-exam-id="{{ $exam->id }}"> start exam</button>
                                                                <button class="stop-exam-btn btn sm-btn sm-btn-text btn-border-radius btn-danger text-white text-capitalize @if(!$exam->display) d-none @endif" data-toggle="modal" data-target="#stop_exam_{{$exam->id}}" data-exam-id="{{ $exam->id }}"> Stop Exam</button>
                                                                @endif 
                                                            </p>
                                                        </div>

                                                        <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Class Dates </p>
                                                            <p class="table-first-value">
                                                                {{ $exam->getStartDateFormatted(true) }}
                                                            </p>
                                                        </div>

                                                         <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Exam <br> Date/Time </p>
                                                            <p class="table-first-value">
                                                                {{ $exam->getStartDateFormatted() }}
                                                            </p>
                                                        </div>


                                                        <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Started On </p>
                                                            <p class="table-first-value">
                                                                   @if($classType == 'ongoing' || $classType=='upcoming')
                                                                {{ $exam->getStartedOn() }}
                                                                @else
                                                                {{ $exam->getStartDateFormatted() }}
                                                                @endif
                                                            
                                                            </p>
                                                        </div>

                                                        <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Ended On </p>
                                                            <p class="table-first-value">
                                                                @if($classType == 'ongoing' || $classType=='upcoming')
                                                                {{ $exam->getEndedOn() }}
                                                                @else
                                                                {{ $exam->getEndDateFormatted() }}
                                                                @endif                                                                 
                                                            </p>
                                                        </div>

                                                        <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Address </p>
                                                            <p class="table-first-value">
                                                                {!! $exam->getAddress() !!}
                                                            </p>
                                                        </div>

                                                        <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Course Level </p>
                                                            <p class="table-first-value">
                                                                {{ $exam->getCourseName() }}
                                                            </p>
                                                        </div>


                                                        <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Stack <br> Offered </p>
                                                            <p class="table-first-value">
                                                                {{ $exam->getStackName()  }}
                                                            </p>
                                                        </div>


                                                        <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Supplement <br> Offered </p>
                                                            <p class="table-first-value">
                                                                {{ $exam->getSupplement() }}
                                                            </p>
                                                        </div>


                                                        <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Instructor </p>
                                                            <p class="table-first-value">
                                                                {{ $exam->getInstructorName() }}
                                                            </p>
                                                        </div>

                                                        <div class="tabl-item-class row">
                                                            <p class="table-first-key ">Class <br> Language </p>
                                                            <p class="table-first-value">
                                                                {{ $exam->getLanguage() }}
                                                            </p>
                                                        </div>
{{-- @dd(get_defined_vars()) --}}
{{-- @dd($exam) --}}

                                                    </div>
                                                    <div class="col-12 col-lg-6">

                                                        <table class=" datatable-custom table">
                                                            <thead class="datatable-thead">
                                                                <tr class="datatable-thead-tr">
                                                                    <th class="datatable-th sm-th-text">Name</th>
                                                                    <th class="datatable-th sm-th-text">User Name</th>
                                                                    <th class="datatable-th sm-th-text">Password</th>
                                                                    <th class="datatable-th sm-th-text">Company</th>
                                                                </tr>
                                                            </thead>
                                                            {{-- @if($classType =='past') --}}
                                                            <tbody class="datatable-tbody">
                                                                @foreach($exam->students as $student)
                                                                <tr>
                                                                    <td class="td-for-main-datatable sm-td-text font-weight-bold ">{{ $student->getFullName() }}</td>
                                                                    <td class="td-for-main-datatable sm-td-text ">{{ $student->getUserName() }}</td>
                                                                    <td class="td-for-main-datatable sm-td-text ">{{ $student->getPassword() }} </td>
                                                                    <td class="td-for-main-datatable sm-td-text ">{{ $student->getCompanyName() }} </td>
                                                                </tr>
                                                                @endforeach

                                                            </tbody>
                                                            {{-- @endif --}}
                                                        </table>

                                                        <div class="text-center">
                                                            <a target="_blank" href="{{ route('download.roster',$exam->id) }}" class="btn print-save-code text-capitalize text-dark  ">
                                                         <i class="fas fa-file  "></i>
                                                            Print/Save Codes</a>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile{{ $exam->id }}" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="table--container mt-4 w-75 mx-auto">
                                                    <table class="datatable no-pagination no-search no-info datatable-custom table table-hover border border-1 border-secondary ">
                                                        <thead class="datatable-thead">
                                                            <tr class="datatable-thead-tr">
                                                                <th class="datatable-th text-center">Name</th>
                                                                <th class="datatable-th text-center">Skills Score</th>
                                                                <th class="datatable-th text-center">Knowledge Exam</th>
                                                                <th class="datatable-th text-center">Certificate</th>
                                                            </tr>



                                                        </thead>
                                                        {{-- @if($classType =='past') --}}
                                                        {{-- دي هتكون لما اليوزر يبدا الامتحان وهتجيب اليوزر حل كام من كام وهكذا --}}
                                                        <tbody class="datatable-tbody">

                                                            @foreach($exam->students as $student)
                                                            @php
                                                            $certification = \App\Models\Certification::where('exam_id' , $exam->id)->where('student_id',$student->ID)->first()
                                                            @endphp
                                                            <tr>
                                                                <td class="align-middle td-for-main-datatable font-weight-bold xsm-fs">{{ $student->getFullName() }}</td>
                                                                <td class="align-middle td-for-main-datatable">
                                                                    <span class="mr-3">{{ $student->getSkillScore($certification) }}</span>
                                                                    <i class="fas fa-edit text-secondary fa-lg cursor-pointer" data-toggle="modal" data-target="#edit-skill-score-for-student-{{ $student->ID }}-for-exam-{{ $exam->id }}"></i>
                                                                    <div class="modal fade" id="edit-skill-score-for-student-{{ $student->ID }}-for-exam-{{ $exam->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Skill Score</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>


                                                                                </div>
                                                                                <form class="form" action="{{ route('save.skill.report') }}" method="post">

                                                                                    <div class="modal-body">
                                                                                        <table class="table table-border table-hover">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>#</th>
                                                                                                    <th>Exam</th>
                                                                                                    <th>Student Name</th>
                                                                                                    <th>Score</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>{{ 1 }}</td>
                                                                                                    <td> {{ $exam->title }} </td>
                                                                                                    <td>{{ $student->getFullName() }}</td>
                                                                                                    <td>
                                                                                                        @csrf
                                                                                                        <input @if(! $student->certifications->first())
                                                                                                        disabled
                                                                                                        @endif
                                                                                                        class="form-control" name="skill_scores[{{ $student->ID }}]" value="{{ $student->certifications->first()->skill_score ?? 0 }}">
                                                                                                        <input type="hidden" name="certification_id[{{ $student->ID }}]" value="{{ $student->certifications->first()->id ?? 0  }}">
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-primary">Save Skill Report </button>
                                                                                    </div>
                                                                                </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>






                                                                </td>
                                                                <td class="align-middle td-for-main-datatable text-center">
                                                                     @if($classType == 'ongoing')
                                                                     @php
                                                                         $userExam = \App\Models\User_exam::where('User_ID',$student->ID)->where('exam_id',$exam->id)->first();

                                                                     @endphp
                                                                     @if($userExam)
                                                                                {{ $userExam->remaining_time == 0 ? '0:00' : $userExam->remaining_time }} left | {{ \App\Models\UserAnswer::where('Test_ID',$userExam->ID ?? 0)->whereNotNull('Answer')->count(). '/' . $exam->no_questions . ' Answers' }}

                                                                     @endif 
                                                                     {{-- 3:19 left | 12/95 Answers  --}}
                                                                     @else 
                                                                    <a target="__blank" href="{{ route('view.score.report.by.username' , $student->ID) }}" class="text-center sm-btn btn  text-white text-capitalize bg-primary border-primary rounded mr-3 cursor-pointer small-fs">Score Report</a>
                                                                   
                                                                    <i data-certification-id="{{$certification->id ?? 0}}" data-display="0" class="change-certification-display fas fa-lock-open text-secondary fa-lg cursor-pointer @if(!($certification->display ?? 0)) d-none @endif"></i>
                                                                    <i data-certification-id="{{$certification->id ?? 0}}" data-display="1" class="change-certification-display fas fa-lock text-secondary fa-lg cursor-pointer @if(($certification->display ?? 0)) d-none @endif"></i>
                                                                    @endif 
                                                                </td>
                                                                <td class="align-middle td-for-main-datatable">

                                                                    @if($classType == 'ongoing')
                                                                    -
                                                                    @else 
                                                                    <a href="{{route('download.single.certification',[$certification->id ??0])}}" class="text-center cursor-pointer sm-btn btn-block text-white text-capitalize border-0 bg-success rounded mb-1">download</a>
                                                                    <div class="flex-centered">
                                                                        <a href="{{route('download.single.front.certification',[$certification->id ?? 0])}}" class="sm-btn text-white text-capitalize border-0 bg-success rounded mr-1">
                                                                            <i class="fas fa-image text-white fa-lg fs-sm cursor-pointer small-fs"></i>
                                                                            <span class="text-capitalize text-white ">front</span>
                                                                        </a>

                                                                        <a href="{{route('download.single.back.certification',[$certification->id ?? 0])}}" class="sm-btn text-white text-capitalize border-0 bg-success rounded">
                                                                            <i class="fas fa-image text-white fa-lg fs-sm cursor-pointer small-fs"></i>
                                                                            <span class="text-capitalize text-white ">Back</span>
                                                                        </a>

                                                                    </div>

                                                                    @endif 
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        {{-- @endif --}}
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="start_exam_{{ $exam->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center text-capitalize">
                                            <h6 class="font-weight-bold">Enter Proctor's ID:</h6>
                                            <div class="flex-centered">
                                                <input id="proctor-password-for-exam-{{ $exam->id }}" type="password" name="proctor_id" class="form-control form-control-center mr-3 reset-form-control" placeholder="Proctor's ID">
                                                <button @if($exam->display)
                                                    disabled
                                                    @endif
                                                    class="sm-btn sm-th-text btn btn-success check-proctor-password" data-exam-id="{{ $exam->id }}">Check</button>
                                            </div>
                                            <div class="py-2 text-center bg-success text-white d-none mt-3" id="proctor-name-for-exam-{{ $exam->id }}">
                                                <p class="mb-0">Proctor Found : <span>{{ $exam->getProctorName() }}</span></p>
                                            </div>

                                            <div class="py-2 text-center bg-success text-white mt-3 
                                             @if(! $exam->display)
                                                d-none
                                             @endif 
                                             " id="exam-started-successfully-{{ $exam->id }}">
                                                <p class="mb-0">Exam Started Successfully </p>
                                            </div>


                                            <div class="py-2 text-center bg-danger text-white d-none mt-3" id="proctor-not-found-{{ $exam->id }}">
                                                <p class="mb-0">Invalid Proctor's ID</p>
                                            </div>

                                            <button id="launch-exam-{{ $exam->id }}" class="btn btn-success text-capitalize  my-3 launch-exam" data-exam-id="{{ $exam->id }}" disabled>launch class</button>
                                            <h6 class="text-underline mb-3 font-weight-bold small-fs">Exam Scheduled For : {{ $exam->getStartDateFormatted() }} </h6>
                                            <p class="sm-th-text text-dark custom-padding-text">
                                                if a proctor does not show up by the time the assessment is scheduled to begain , call the <span class="font-weight-bold">emergency proctor</span>
                                                numbers shown below . you will be given an emergenec code for begainning the assessments

                                            </p>
                                            <table class="table table-border">
                                                <thead>
                                                    <tr class="tr-border">
                                                        <th class="lg-td-text text-left">Name</th>
                                                        <th class="lg-td-text text-left">Number(s)</th>
                                                        <th class="lg-td-text text-left">Email</th>
                                                        <th class="lg-td-text text-left">Locations Covered</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach(getEmergencyProctors() as $emergencyProctor)
                                                    <tr class="tr-border">
                                                        <td class="sm-th-text gray-td-color">{{ $emergencyProctor['name'] }}</td>
                                                        <td class="sm-th-text gray-td-color">{{ $emergencyProctor['phone'] }}</td>
                                                        <td class="sm-th-text gray-td-color">
                                                            <a href="mailto:{{ $emergencyProctor['email'] }}" class="text-primary text-underline">{{ $emergencyProctor['email'] }}</a>
                                                        </td>
                                                        <td class="sm-th-text gray-td-color">
                                                            {{ $emergencyProctor['location'] }}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        @push('js')
                        <script>
                            $(function(){
                                $(document).on('click','.change-certification-display',function(){
                                let certification_id = $(this).data('certification-id')
                                let display = $(this).data('display')

                                    $.ajax({
                                    url:'{{ route("proctor.change.certification.display") }}',
                                    data:{
                                        "_token":"{{ csrf_token() }}",
                                        "certification_id":certification_id ,
                                        'display':display 
                                    },
                                    type:"post",
                                    success:function(response){
                                     
                                        $('.change-certification-display[data-display="'+ response.display   +'"][data-certification-id="'+ response.certification_id +'"]').addClass('d-none');
                                        $('.change-certification-display[data-display="'+ (response.display == 1 ? 0 : 1) +'"][data-certification-id="'+ response.certification_id +'"]').removeClass('d-none');
                                        // if()
                                    }
                                });

                                })
                            });
                        </script>
                            
                        @endpush