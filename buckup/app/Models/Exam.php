<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;

/**
 * App\Models\Exam
 *
 * @property int $id
 * @property string $title
 * @property float $passPercentage
 * @property string $zoomLink
 * @property int $noQuestions
 * @property string $startDate
 * @property string $duration
 * @property string $type
 * @property int $display
 * @property int $end
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Certification[] $certifications
 * @property-read int|null $certificationsCount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questionsCount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Student[] $students
 * @property-read int|null $studentsCount
 * @method static \Database\Factories\ExamFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam onlyDisplayed()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereNoQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam wherePassPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereZoomLink($value)
 * @mixin \Eloquent
 */
class Exam extends Model
{
    use HasFactory;

    const ACCURATETYPE='accurate';
    const FLEXIBLETYPE = 'flexible';

    public $failedMessage ;
    protected $with = ['country'];

    public static function types(): Collection
    {
        return collect([
            self::ACCURATETYPE,
            self::FLEXIBLETYPE,
        ]);
    }

    // protected $fillable = [
    //     'title','pass_percentage','zoom_link','no_questions',
    //     'completed_date','display','start_date','duration','type','end_date','end','proctor','stack','location','domain','instructor_id',
    //     'latitude','longitude'
    // ];
    protected $guarded = [
        'id'
    ];
    public function getGroupingDate($datePeriod)
    {
        if($datePeriod == 'By Week')
        {
            $startDate = $this->getStartDateInFormat('Y/m');
            $week = weekOfMonth(strtotime($this->start_date));
            return  $startDate . '('.$week .')';
        }
        if($datePeriod == 'By Day')
        {
            return  $this->getStartDateInFormat('Y/m/d');
        }   
        if($datePeriod == 'By Year')
        {
            return  $this->getStartDateInFormat('Y');
        }   

        // by default 
        return $this->getStartDateInFormat('Y/m/d') ;
    }
    public function instructor()
    {
        return $this->belongsTo(Student::class , 'instructor_id' , 'id');
    }
    
    public function setDisplayAttribute($display)
    {
        $this->attributes['display'] = (bool)($display);
    }

//    public function certification():hasOne
//    {
//        return $this->hasOne(Certification::class,'id','certification_id');
//    }

//    public function onlyDisplayedCertification()
//    {
//        return $this->certification()->onlyDisplayed();
//    }

    public function scopeOnlyDisplayed($query)
    {
        return $query->where('display',true);
    }

    public function hasStudents():bool
    {
        return $this->students->count();
    }



    public function students():belongsToMany
    {
        return $this
            ->belongsToMany(Student::class,'user_exam','exam_id','User_ID','id','ID')
            ->withPivot(['Done','absence','score','passed','Finished_At','entered_at','ID','note']);
    }

    public function assignStudents($students):void
    {
        $this->students()->attach($students , $this->getPivotData());
    }

    public function updateStudents($students):void
    {
        $this->students()->sync($this->formatStudentsArray($students));
    }

    private function getPivotData():array
    {
        return [
            'remaining_time'=>0,
            'time'=>$this->duration,
            'Started_At'=>$this->start_date,
            'Done'=>false
        ] ;
    }

    private function formatStudentsArray(Array $students):Collection
    {
        return collect(array_flip($students))->map(function(){
            return $this->getPivotData();
        });

    }

//    public function questions():hasMany
//    {
//        return $this->hasMany(Question::class , 'Type','id');
//    }

    public function getQuestions()
    {
        if(Certification::where('exam_id',$this->id)->first()) {
            return Question::where('Type',Certification::where('exam_id',$this->id)->first()->course_type)->get();
        }

        return collect([]) ;
    }

    public function addQuestions($request)
    {


        $data = $request->except(['_token']) ;

        for($question=1 ; $question<=count($data['questions']) ; $question++)
        {
        //    if(key_exists($question,$data['questions'])) {
                $theQuestion = Question::create([
                    'Question'=>$data['questions'][$question] ,
                    'Text_Answer'=>$data['questions'][$question],
                    'Type_ID'=>2  ,
                    'Test_ID'=> $data['exam_id'], //Test_ID == Exam_id
                    'Type'=>$data['exam_id'] , // type_id of subject(course)
                    'Degree'=>$data['degree'][$question],
                    'Num'=>1
                ]);
                $theQuestion->answers()->createMany(
                    $theQuestion->getAnswersRecords($data['answers'][$question],$theQuestion->ID , $data['correct'][$question])
                );

          //  }
        }
    }

    public function deleteOldQuestions():void
    {
        $this->questions->each(function($question){
            $question->answers()->delete();
        });

        $this->questions()->delete();

    }

    public function hasQuestions():bool
    {
        return $this->questions->count();
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class , 'exam_id','id');
    }

    public function createCertificationFromExistingFor(int $studentID)
    {
        $oldCertification = $this->certifications->first()->toArray() ;
        $oldCertification['student_id'] = $studentID ;
        array_shift($oldCertification)  ;
        return Certification::create($oldCertification);
    }

    public function hasCertifications():bool
    {

        return $this->certifications->count() > 0 ;
    }

    public function deleteCertifications():void
    {

        if($this->certifications()->count()) {
            $this->certifications()->each(function($certification){
               $certification->delete();
            });
        }
    }

    public function deleteCertificationsFor(Array $studentsIDS)
    {
        $this->certifications()->whereIn('student_id',$studentsIDS)->delete();
    }

    public function detachStudents():void
    {
         $this->students()->detach();
    }

    public function detachStudentsFor($studentsIds):void
    {
        $this->students()->detach($studentsIds);
    }

    public function scopeCurrent($builder)
    {
        return $builder->where('display',true)->where('end',false);

    }

    public function assignQuestions(int $courseType , int $noQuestions , Array $students)
    {
        $avaiableQuestionsForThisCourseQuery = $questionsAssociatedWithCourse = Question::where('Type' , $courseType);

        if( ($availableQuestion=$avaiableQuestionsForThisCourseQuery->count()) >= $noQuestions)
        {
            $this->save();

            $this->assignStudents($students);

            $questionsAssociatedWithCourse = $avaiableQuestionsForThisCourseQuery->inRandomOrder()->take($noQuestions)->get();

            foreach ($students as $studentID)
            {
               $student =  Student::where('id',$studentID)->first();
               $user_exam_id=$student->exams->where('id',$this->id)->first()->pivot->ID;

                foreach ($questionsAssociatedWithCourse as $q)
                {
                    UserAnswer::create([
                        'Question_ID'=>$q->ID ,
                        'Test_ID'=>$user_exam_id ,
                    ]);
                }
            }

            return [
                'status'=>true
            ];
        }
        return [
            'status'=>false ,
            'no_questions_available'=>$availableQuestion
        ] ;

    }

    public function formatUsersAnswers( $questionsAssociatedWithCourse,$user_exam_id):array
    {

        $formattedQuestions = [];

        foreach ($questionsAssociatedWithCourse as $q)
        {
            array_push($formattedQuestions , [
                'Question_ID'=>$q->ID ,
                'Test_ID'=>$user_exam_id
            ]);
        }
        return $formattedQuestions;

    }
    public function userAnswers():hasMany
    {
        return $this->hasMany(UserAnswer::class,'Test_ID','id');
    }

    public function isValidForThisUser($student):bool
    {
        switch ($this->type)
        {
            case self::FLEXIBLETYPE ;

            return $student->HasNotFinishedExam($this) 
            && $student->doesNotEnteredBefore($this) && $this->HasStarted() && $this->HasNotEnded() ;

            case self::ACCURATETYPE:
                return $student->HasNotFinishedExam($this) && $student->doesNotEnteredBefore($this) && $this->HasStarted() && $this->DoesNotEnded() && $this->HasNotEnded() ;
            default: false  ;

        }
    }

    private function HasNotEnded():bool
    {
        $this->failedMessage = 'The Exam Has Been Finished' ;

        return ! (bool) $this->end ;
    }

    private function DoesNotEnded():bool
    {
        $this->failedMessage = 'The Exam Time Is Expired ' ;

        return $this->getDeadTime()->greaterThanOrEqualTo(now());
    }

    private function HasStarted():bool
    {
        $this->failedMessage = 'The Exam Has Not Been Started Yet ' ;

        return Carbon::make($this->start_date)->lessThanOrEqualTo(now()) && (bool) $this->display ;
    }

    private function getDeadTime():Carbon
    {
        return Carbon::make($this->start_date)->addMinutes($this->duration);
    }

    function getRemainingTime($userExamId):string
    {


        if($this->type == self::FLEXIBLETYPE) {
            $userExam = User_exam::where('ID' , $userExamId)->first();
            if($userExam->entered_at && $userExam->first_entered_at)
            {
                $firstEnteredAt  = $userExam->first_entered_at ;
                $endData = Carbon::make($userExam->entered_at)->diff(Carbon::make($firstEnteredAt)->addMinutes($this->duration));
                // dd(Carbon::make($userExam->$firstEnteredAt)->diff());
                $endData = Carbon::createFromFormat('H:i:s', $endData->h .':' . sprintf("%02d", $endData->i) . ':' . sprintf("%02d",$endData->s) );
            return $this->formatRemainingDate($endData , false);
            
            }
            else{
                $endData = Carbon::make(now())->addMinutes($this->duration) ;
            return $this->formatRemainingDate($endData);

            }
// dd($endData);

        }

        $endData = Carbon::make($this->start_date)->addMinutes($this->duration);
        return $this->formatRemainingDate($endData);
    }

    private function formatRemainingDate(Carbon $endData , $fromNow  = true ):string
    {
        // $endData Carbon Object
        // gmdate — Format a GMT/UTC date/time
        return gmdate('H:i:s',$fromNow ? $endData->diffInSeconds() :$endData->secondsSinceMidnight()) ;
        // return gmdate('H:i:s',$endData->diffInSeconds()) ;
        //// 00:30:21

    }

    public function getCourse()
    {
        $certification = $this->certifications->first() ;
        if($certification)
        {
            return CourseType::where('id' , $certification->course_type)->first();
            // return  ;
        }
        if($this->course_type)
        {
            return CourseType::where('id' , $this->course_type)->first();
        }
        return null ;
    }

    public function getCourseName()
    {
        $course = $this->getCourse() ;
        return  $course ? $course->name : '';
    }


    public function getStartDateFormatted($onlyDate = false )
    {
            return Carbon::make($this->start_date)->format(getDefaultDateTimeFormat($onlyDate)); 
    }
    public function getEndDateFormatted($onlyDate = false)
    {
        return Carbon::make($this->start_date)->addMinutes($this->duration)->format(getDefaultDateTimeFormat($onlyDate)); 

    }

    public function getInstructorName()
    {
        $instructor = $this->instructor ;
        return $instructor ? $instructor->Full_Name : '';
    }

    public function getLocation()
    {
        return $this->location ; 
    }
    public function getLanguage()
    {
        return 'English' ; 
    }

    public function getClassId()
    {
        return $this->class_id ; 
    }

    public function getClassTitle()
    {
        return $this->class_title ;
    }
    public function getExamTitle()
    {
        return $this->title ;
    }
    
    public function getStartedOn()
    {
        return 'n/a';
    }
    public function getEndedOn()
    {
        return 'n/a';
    }
    public function getAddress()
    {
        return $this->address ;
    }
    public function getStackName()
    {
        return $this->getCourse()->stack ?? '';
    }
    public function getSupplement()
    {
        $certification = $this->certifications->first();
        if($certification)
        {
            return $certification->supplement ;
        }
        return  ' ';
    }

    public function getProctorName()
    {
        $proctor = Student::where('ID' , $this->proctor)->first();
        return $proctor ? $proctor->getFullName() : '';
        
    }

    public function getCalendarBackground($examType)
    {
        if($examType == 'past')
        {
            return 'gray';
        }
       return 'green';
    }

    public function getClassType($filter= false , $outerExam = null , &$filterExams = [] ) // exam type
    {
            $exam = $filter ? $outerExam : $this ; 
            
             $startDate = Carbon::make($exam->start_date) ;
            $startDatePlusDuration =  Carbon::make($exam->start_date)->addMinutes($exam->duration); 
            
            if($startDate <= now() && $startDatePlusDuration >= now()  )
            {
                if($filter)
                {
                    array_push($filterExams['ongoing'] ,$exam );
                }
                return 'ongoing';
                
            }
            elseif( $startDate >= now()  )
            {
                if($filter)
                {
                array_push($filterExams['upcoming'] , $exam );
                    
                }
                return 'upcoming';
            }
            else 
            {
                if($filter){
                    array_push($filterExams['past'] ,$exam );
                }
                return 'past';
            }
    }

    public function getProviderName()
    {
        return $this->certifications->first()->provider ?? '';
    }

    public function getCourseDate()
    {
        // دي مفروض تيجي من الادمن واحنا بنضيف الكورس وهتكون تاريخ ووقت
        if($this->getCourseStartDateFormatted() && $this->getCourseEndDateFormatted())
        {
            return $this->getCourseStartDateFormatted() .'/' . $this->getCourseEndDateFormatted();
        }
        if($this->getCourseStartDateFormatted())
        {
            return $this->getCourseStartDateFormatted();
        }
        // $course = $this->getCourse() ;
        // return $course ? $course->course_date : null ;
    }
    public function getCourseStartDateFormatted()
    {
        if($this->course_start_date){
            return Carbon::make($this->course_start_date)->format(getDefaultDateTimeFormat(true)) ;
        }
        
    }
    public function getCourseEndDateFormatted()
    {
        if($this->course_end_date){
            return Carbon::make($this->course_end_date)->format(getDefaultDateTimeFormat(true)) ;
        }
    }

    public function getRetakeCount()
    {
        return  0 ;
    }    
    
    public function getDuration()
    {
        return $this->duration ;
    }

    public function getDeployment()
    {
        return $this->deployment ; 
    }

    public function getTraineesAssessed()
    {
        return $this->students->count();
    }
    public function getStartDateInFormat($format)
    {
        return Carbon::make($this->start_date)->format($format);
    }
    public function getTraineesCountWithAllStatus():array 
    {
        $students = $this->students ;

        $filtered = [
            'passed'=>[
                'count'=>0 ,
                'rate'=>0
            ],
            'failed'=>[
                'count'=>0,
                'rate'=>0 
            ],
            'all'=>[
                'count'=> 0 ,
                'rate'=>0 ,
                'avg_score'=>0
            ]
        ];
        
        foreach($students as $student)
        {
            $student->isPassed = $student->PassedExam();
            if($student->isPassed == 'Passed')
            {
                $filtered['passed']['count'] += 1 ; 
                $filtered['all']['count'] += 1 ; 
            }
            else{
                    $filtered['failed']['count'] += 1 ; 
                    $filtered['all']['count'] += 1 ; 
            }
                $filtered['all']['avg_score']  += $student->PassedExam(true);
            
        }
        $filtered['passed']['rate'] = $filtered['all']['count'] ? 
        number_format($filtered['passed']['count'] / $filtered['all']['count'] , 2 ) : 0; 
        $filtered['failed']['rate'] = $filtered['all']['count'] ? 
        number_format($filtered['failed']['count'] / $filtered['all']['count'] , 2 ) : 0; 
        $filtered['all']['avg_score'] = ($filtered['all']['count'])?   number_format($filtered['all']['avg_score'] / ($filtered['all']['count']*100)*100 , 2)    : 0;
        return $filtered ; 
        
    }
    public function getTraineesRetakingExamCount()
    {
        return  0 ;
     }
     public function getRetakePassedCount()
     {
         return 0 ; 
    }
    public function getRetakeFailedCount()
    {
        return 0 ;
    }
    public function getRetakePassedRateCount()
    {
        return 0 ;
    }
    public function getRetakeAvgScore()
    {
        return 0; 
    }

    public static function booted()
    {
        static::creating(function($exam){
            $exam->class_title = $exam->title ;
        });
        static::updating(function($exam){
            $exam->class_title = $exam->title ;
        });
    
    }
    public function country(){
        return $this->belongsTo(Country::class , 'country_id','id');
    }
    public function getLongitudeAttribute(){
        if($this->country){
            return $this->country->longitude ;
        }
        
    }
    public function getLatitudeAttribute(){
        if($this->country){
            return $this->country->latitude ;
        }
        
    }

}


