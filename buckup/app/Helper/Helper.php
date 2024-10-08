<?php

use App\Models\Certification;
use App\Models\CourseType;
use App\Models\Exam;
use App\Models\Image;
use App\Models\Student;
use App\Models\User_exam;
use App\Models\UserAnswer;
use Carbon\Carbon;
const TEST_NOT_STARTED = 'Test Not Started';
const TEST_OPEN_AND_ACTIVE = 'Test Open And Active';
function getCertificationGeneralDomain()
{
    // https://certification.wellsharpin.com
    return \App\Models\Setting::where('type',4)->first( ) ? \App\Models\Setting::where('type',4)->first()->Msg : '' ;
}

function getCardDomain()
{
    return \App\Models\Setting::where('type',3)->first( ) ? \App\Models\Setting::where('type',3)->first()->Msg : '' ;
}

function getCardDomainFor($certification)
{
    $exam   = $certification->exam ;
    if($exam)
    {
    return $exam->domain ?:  getCardDomain();

}
return getCardDomain();
    // return \App\Models\Setting::where('type',3)->first( ) ? \App\Models\Setting::where('type',3)->first()->Msg : '' ;
}

function generateRandomString($firthLength = 8 , $secondLength=6):string
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $rand = '';

    for($i = 0 ; $i < $firthLength ; $i++)
    {
        $rand .= $characters[rand(0,strlen($characters)-1)];
    }

    $rand .= '-';

    for($i = 0 ; $i < $secondLength ; $i++)
    {
        $rand .= $characters[rand(0,strlen($characters)-1)];
    }

    return $rand ;
}
if(!function_exists('format_date_time'))
{
    function format_date_time(string $date):string
    {
        return Carbon::make($date)->format('M d ,Y g:i A');
    }
}
function formatCertificationDate($date)
{
    if($date)
    {
        return Carbon::make($date)->format('d F Y');
    }
    return $date ; 
}
function getCurrentAuthName():string
{
    if(Auth()->guard('admins')->check())
    {
        return Auth()->user()->name;
    }
    return Auth('students')->user()->UserName ;
}
function sendEmail():string
{
   return 'krewsupport@endeavortech.com';
}


if(!function_exists('old_field_array'))
{
    function old_field_array($fieldName , $i  , $model=null)
    {


        return isset($i) && old($fieldName) ? old($fieldName)[$i] : ((($model) ? $model->{$fieldName} : null)) ;
    }
}

function getCurrentAnsweredQuestion($user_exam_id)
{
    $userAnswers = UserAnswer::where('Test_ID',$user_exam_id)->get();
    return $userAnswers ;
    
}

function getTotalAnsweredQuestion($user_exam_id)
{
    return UserAnswer::where('Test_ID',$user_exam_id)->where('Answer','!=',null)->count();
}
function getLang()
{
    return App()->getLocale();
}
function getPageTitle()
{
    return 'wellsharp';
}
function getMainLoginBackgroundColor(){
    return asset('frontend/images/bkg.jpg');
}
function formatExamLocations($locations)
{
    $formattedLocations = [] ;
    foreach($locations as $longitude=>$latitude)
    {
        if($latitude && $longitude)
        {
            $formattedLocations[] = ['1',$longitude , $latitude ,3 ];
        }}
        return $formattedLocations;
}
function getDefaultDateTimeFormat($onlyDate =false )
{
    if($onlyDate){
        return 'd M Y';
    }

        return 'd M Y h:i A';
}

function getMonths()
{
return $months = array(
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July ',
    'August',
    'September',
    'October',
    'November',
    'December',
); 
}

function getAllCountries()
{
    return  array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"); 
}

function getCourses()
{
    return CourseType::all();
}
function getRoles()
{
    return [
        'Trainee','Instructor'
    ];
}
function getDateRanges()
{
    return [
        'Custom Date Range',
        'All Time'
    ];
}
function getTimePeriod()
{
    return [
        'By Day' , 'By Week' , 'By Month'
    ];
    
}
function getStates()
{
    return [];
}
function getInstructors()
{
    return Student::where('Type_ID' , Student::INSTRUCTOR)->get();
}
function getRetaks()
{
    return [
        'All' ,'Has New Registrations' ,'Retakes Only'
    ];
}
function getDeployments()
{
    return [
        'online','offline'
    ];
}
function getProviders()
{
    return Certification::pluck('provider','provider');
}

function getSupplements()
{
    return Certification::pluck('supplement','supplement');
}
function getDatatableActions($certification)
{
    return [route('view.single.certification',$certification->id)=>'Preview Certificate' , route('download.single.certification',$certification->id)=>'Download Certificate' , route('send.single.certification',$certification->id)=>'Email To Trainee'];
}

function generateUniqueClassId($length):string
{
    $classId = generateRandomString($length);
   
    $isExist = Exam::where('class_id',$classId)->first();
    if (! $isExist) {
        return $classId;
    }

    return  generateRandomString($length);
}
function getEmergencyProctors()
{
    return [
        ['name'=>'Micheal Roger' , 'phone'=>'+1-713-377-6282' , 'email'=>'michael.roggers@org','location'=>'North and South America'],
        ['name'=>'Lucy Bhalla' , 'phone'=>'+91-989-276-7809' , 'email'=>'Lucy.Bhalla@lr.org','location'=>'Europe,Middle East And India'],
        ['name'=>'Hazlan Mohd Hatta' , 'phone'=>'+603-9212-2327' , 'email'=>'Hazlan.mohdhatta@lr.org','location'=>'Asia And Australia'],
        ['name'=>'IADC' , 'phone'=>'+1-713-292-1945' , 'email'=>'proctor@iadc.org','location'=>'Backup Contact'],
    ];
}
function RouteName()
{
    return Request()->route()->getName();
}
function getCalendarEvents($exams , array $courses_id = [])
{
    $courses_id = array_filter($courses_id);
     if(count($courses_id))
        {
            foreach($exams as $examType=>$examsForThisType)
            {
                $exams[$examType] = array_filter($examsForThisType , function($exam) use ($courses_id){
                         return (in_array($exam->course_type , $courses_id));
                }  );
            }
        }
        $fullCalendarEvents = [];
        // dd($exams);
        foreach($exams as $examType=>$examsOfThisType)
        {
            foreach($examsOfThisType as $exam)
            {
                $fullCalendarEvents[] = [
                'title'=>Request()->user('students')->getFullName() ,
                'exam_id'=>$exam->id,
                'start'=>$exam->start_date,
                'end'=>Carbon::make($exam->start_date)->addMinutes($exam->duration),
                'color'=>$exam->getCalendarBackground($examType),
                
            ] ;
            }
            
        }

        return $fullCalendarEvents ;
}
function getPositions(){
    return [
        'Assistant Driller',
        'Assistant Wellsite Supervisor / Wellsite Drilling Engineer',
        'Barge Engineer',
        'BOP/Subsea Engineer',
        'Captain/Master',
        'Casing Crew Supervisor',
        'Casing running personnel',
        'Casing-crew (non-supervisory)',
        'Cementer',
        'Coiled Tubing Driller',
        'Crane Operator',
        'Deck crew',
        'Directional Driller',
        'Downhole Equipment Specialists/Operators',
        'Driller',
        'Drilling Manager',
        'Drilling/Intervention Wellsite Supervisor (day & night)',
        'Dynamic Positioning Officer',
        'Fishing Tool Operators (non-pressure operations)',
        'Floorman',
        'Intervention Manager',
        'LMRP Engineer',
        'Logistics supervisors',
        'MPD/UBD wellsite service personnel',
        'MPD/UBD Wellsite Supervisor',
        'Mud Engineer',
        'Mud Logger/Wellsite Drilling Data Engineer',
        'MWD/LWD, Surveying Engineer or Operator',
        'Office-based Drilling Engineer/Senior Drilling Engineer',
        'Office-based Drilling Manager',
        'Office-based Drilling Supervisor / Superintendent',
        'Office-based Intervention',
        'Office-based Intervention/Workover Engineer/Senior Engineer',
        'Office-based logistics coordinator',
        'Office-based Operations Geologist',
        'Office-based Rig Manager',
        'Office-based Wellsite Completions Engineer/Senior Completions Engineer',
        'Office-based Workover Manager',
        'Oilfield equipment repair personnel',
        'OIM for mobile offshore drilling and intervention units',
        'Onshore monitoring crew',
        'Operator Offshore Installation Manager (OIM)',
        'Other non-supervisory and non-critical drilling or intervention personnel',
        'Pit Hand',
        'Pump Hand',
        'Rig Move Captain',
        'Rig Move Offshore Installation Manager',
        'Rig Superintendent Offshore',
        'Roustabout',
        'ROV personnel (non-supervisory)',
        'ROV personnel (supervisory)',
        'Shaker Hand',
        'Subsea Engineer',
        'Superintendent (day & night)',
        'Supply and support vessel Watch Officers and Captains',
        'Toolpusher',
        'Tubular and rig inspection personnel',
        'Well Control Engineers',
        'Well Control Specialists',
        'Well Control Trainers',
        'Wellsite Engineer',
        'Wellsite Geologist',
        'Wireline/Slickline crews (non-Supervisory)',
        'Motorman/Oiler'
    ];
}
function getImagePathObject($path)
{
    $image = new Image() ;
    $image->path = $path ; 

    return $image;
    // $image->full;
}
function getInstructorCertificationRules():array    
{
    $isInstructor = Request('Type_ID' ) == 4 ; 
    return [
                    'courses'=>'sometimes' . ($isInstructor  ? '|required' :'') ,
            'description'=>'sometimes' . ($isInstructor  ? '|required' :'') ,
            'supplement'=>'sometimes' . ($isInstructor  ? '|required' :'') ,
            'instructor_number'=>'sometimes' . ($isInstructor  ? '|required' :'') ,
            'issued_by'=>'sometimes' . ($isInstructor  ? '|required' :'') ,
            'issued_by_position'=>'sometimes' . ($isInstructor  ? '|required' :'') ,
            'certificate_date'=>'sometimes' . ($isInstructor  ? '|required' :'') ,
            'expiration_date'=>'sometimes' . ($isInstructor  ? '|required' :'') ,
    ];
}
function getInstructorCertificationMessage()
{
    return [
        'courses.required'=>'Please Select Certification Courses' ,
            'description.required'=>'Please Enter Certification Description' ,
            'supplement.required'=>'Please Enter Supplement' ,
            'instructor_number.required'=>'Please Enter Instructor Number' ,
            'issued_by.required'=>'Please Enter Issued By' ,
            'issued_by_position.required'=>'Please Enter Issuer Position' ,
            'certificate_date.required'=>'Please Enter Certificate Date',
            'expiration_date.required'=>'Please Enter Expiration Date' ,
            
    ];
}
function getCertificationDescription()
{
    return 'has met the criteria established by the international Association of Driling Contractors and is hereby <br>
                        approved as a Wellsharp instructor for the following:';
}
// function datediffInWeeks($date1, $date2)
// {
//     if($date1 > $date2) return datediffInWeeks($date2, $date1);
//     $first = DateTime::createFromFormat('m/d/Y', $date1);
//     $second = DateTime::createFromFormat('m/d/Y', $date2);
//     return floor($first->diff($second)->days/7);
// }

function getSmallestDate(array $exams , $field )
{
    $smallestDate = null ;
    foreach($exams as $exam)
    {
        $startDate = Carbon::make($exam->start_date) ;
        if(is_null($smallestDate) || $startDate <= $smallestDate)
        {
           
            $smallestDate = $startDate ;
        }
    }
    return $smallestDate;
    
}
function getTotalStudentsInExams($exams)
{
    $total = 0 ;
    foreach($exams as $exam)
    {
        $total+=$exam->students->count();
    }
    return $total ; 
}
function getClassesStatistics(array $exams )
{
    $smallestStartDate = getSmallestDate($exams , 'start_date');
    $numberOFWeeks = 0 ;
    $numberOFMonths = 0 ;
    $totalStudentsInAllExams = getTotalStudentsInExams($exams);
    if($smallestStartDate)
    {
        $numberOFWeeks = now()->diffInWeeks($smallestStartDate) ; 
        $numberOFMonths = now()->diffInMonths($smallestStartDate) ; 
    }
    
    $statistics = [
        'total-classes'=> 0 ,
        'avg-class-size'=>0 ,
        'classes-per-week'=>0,
        'classes-per-month'=>0 
    ];
    $statistics['total-classes'] = count($exams);
    $statistics['avg-class-size'] = $statistics['total-classes'] ? number_format($totalStudentsInAllExams / $statistics['total-classes'] * 100 , 2) : 0 ;
    $statistics['classes-per-week'] =$numberOFWeeks ? number_format($statistics['total-classes'] /$numberOFWeeks * 100 , 2) : 0 ;
    $statistics['classes-per-month'] =$numberOFMonths ? number_format($statistics['total-classes'] /$numberOFMonths * 100 , 2) : 0 ;
   return $statistics ;
   
}

function weekOfMonth($date) {
    //Get the first day of the month.
    $firstOfMonth = strtotime(date("Y-m-01", $date));
    //Apply above formula.
    return weekOfYear($date) - weekOfYear($firstOfMonth) + 1;
}

function weekOfYear($date) {
    $weekOfYear = intval(date("W", $date));
    if (date('n', $date) == "1" && $weekOfYear > 51) {
        // It's the last week of the previos year.
        return 0;
    }
    else if (date('n', $date) == "12" && $weekOfYear == 1) {
        // It's the first week of the next year.
        return 53;
    }
    else {
        // It's a "normal" week.
        return $weekOfYear;
    }
}

function getCoursesChartData($request , array $pastExams):array 
{
       $chartData = [];
      
       foreach($pastExams as $exam){
           $examChartData = $exam->getTraineesCountWithAllStatus() ;
           $chartData[] = [
               'course'=>$exam->getCourseName(),
               'passed'=>$examChartData['passed']['count'],
               'failed'=>$examChartData['failed']['count']
           ];
       }
       return $chartData ;
}

function getClassesChartData(array $exams , $datePeriod = 'week')
{
    $chartData = [
        
    ] ; 
    
    foreach($exams as $exam)
    {
        $groupingDate = $exam->getGroupingDate($datePeriod);
        if(isset($chartData[$groupingDate]))
        {
            $chartData[$groupingDate] += 1 ;
        }
        else{
            $chartData[$groupingDate] = 1 ;
        }
    }
    $formattedData = [];
    foreach($chartData as $date=>$chartDat)
    {
        $formattedData[] = [
            'date'=> $date ,
            'classes'=>$chartDat
        ];
    }
    return $formattedData ;
}
