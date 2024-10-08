<?php

namespace App\Models;

use Carbon\Carbon;
use function App\Helper\generateRandomString;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_type',
        'completed_date',
        'course_type',
        'certification_id',
        'link',
        'supplement',
        'provider',
        'valid_to',
        'display',
        'provider_number',
        'instructor_name',
        'telephone_number',
        'student_id',
        'exam_id',
        'name',
        'skill_score',
        'course_date'
    ];

//    protected $guarded = [];
 //   public $score;

    public function course()
    {
        return $this->belongsTo(CourseType::class, 'course_type', 'id');
    }

    public function setCertificationId():void
    {
        $this->certification_id = $this->generateCertificationId();

        $this->save();
    }

    public function setScore($score):void
    {
        $this->score = $score;

        $this->save();

    }

    public function setPassed($passed):void
    {
        $this->passed = $passed;

        $this->save();
    }

    public function scopeOnlyDisplayed($query)
    {
        return $query->where('display', true);
    }

    private function generateCertificationId():string
    {
        $string = $this->generateRandomString();

        $lastTwoString = substr((explode('-', $string)[0]), -2);

        return str_replace($lastTwoString, $this->id, $string);
    }

    private function generateRandomString():string
    {
        return \generateRandomString();
    }

    public function setLink():void
    {
        $this->link = 'https://certification.wellsharpin.com/iadc_certification/'.$this->certification_id;
        $this->save();
    }

    public function getOuterUrl()
    {
        return getCertificationGeneralDomain().'/iadc_certification'.'/'.$this->certification_id; ;
    }

//    public function setQrCode()
//    {
//        dd(QrCode::generate($this->certification_id));
//        return QrCode::generate($this->certification_id);
//    }

    public function setValidTo():void
    {
        if(CourseType::where('id',$this->course_type)->first()->name==='Drilling Operation, Introductory')
        {
            $validDate = 5;
        }
        else
        {
            $validDate = 2 ;
        }

        $this->valid_to = Carbon::make($this->completed_date)->addYears($validDate);

        $this->save();
    }

    public function isValid()
    {
//        dd(Carbon::make($this->completed_date)->addYears($validDate));

        if (Carbon::make($this->valid_to)->greaterThan(now())) {
            return 'Valid';
        }

        return 'Invalid';
    }

    public function exam():belongsTo
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }

//    public function isDisplayed():bool
//    {
//        return $this->display;
//    }

    public function isDisplayed()
    {
        return $this->display;
    }

//    public function assignUsers(Array $users):void
//    {
//        foreach ($users as $user)
//        {
//            Create
//        }
//        $this->users()->attach($users , [
//            'display'=>false
//        ]);
//    }
//    public function users():belongsToMany
//    {
//        return $this->belongsToMany(Student::class ,'certification_student','certification_id',
//
//        'student_id','id','ID')->withPivot(['display']);
//    }

//    public function stack():belongsTo
//    {
//        return $this->belongsTo(Stack::class);
//    }

    public function getEndData()
    {
        return Carbon::make($this->completed_date)->format('M d , Y g:i A');
    }

    public function getEndDataOnly()
    {
        return Carbon::make($this->completed_date)->format('d F Y');
    }

    public function getValidationDateOnly()
    {
        return Carbon::make($this->valid_to)->format('d F Y');
    }

    public function user():belongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'ID');
    }

//    public function exam():belongsTo
//    {
//        return $this->belongsTo(Exam::class,'exam_id','id');
//    }

    public function getStandardLink($certification)
    {
        if (optional($certification->user)->ID) {
            return 'https://certification.wellsharp.org.in/iadc_certification/'.$this->certification_id;
        }

        return null;
    }

    public function getAdvancedLink($certification)
    {
        // dd();
        $cardDomain = getCardDomainFor($certification);
        
        if (optional($certification->user)->ID) {
            // return Request()->root().'/iadc_certification/'.$certification->certification_id;
            return $cardDomain . '?ID='.$this->certification_id;
            // return 'https://certification.wellsharp.org.in/iadc_certification/'.$this->certification_id;
        }
        

        return null;
    }

    public function setStudentID($student_id):self
    {
        $this->student_id = $student_id;

        return $this;
    }

    public function setName():self
    {
       $this->name = $this->user->Full_Name  ;

       $this->save();

       return $this ;

    }



    public function score()
    {

        if ($this->score) {
            return floor($this->score);
        } elseif ($this->exam) {
            if ($this->user->exams->where('id', $this->exam->id)->first()) {
                return floor($this->user->exams->where('id', $this->exam->id)->first()->pivot->score);
            }

            return 0;
        } else {
            return 0;
        }
    }

    public function hasPassed():bool
    {
        if ($this->score) {
            return floor($this->passed);
        } elseif ($this->exam) {
            if ($this->user->exams()->where('exams.id', $this->exam->id)->first()) {
                return $this->user->exams()->where('exams.id', $this->exam->id)->first()->pivot->score >= $this->exam->pass_percentage;
            }

            return false;
        } else {
            return false;
        }
    }

    public function canBeViewedAfterSuccess()
    {
        if($this->passed)
        {
            return true ;
        }

        $lastExam = $this->user->exams->where('Finished_At','<>', 'null')->last() ;

        if( $lastExam)
        {
             return $this->user->isPassedExam();
        }

        return false ;

    }

    public function canBeViewedAfterExamEnd()
    {
        if($this->score )
        {
            return true ;
        }
        $lastExam = $this->user->exams->last();


        if($lastExam && $lastExam->pivot->Finished_At)
        {
             return true ;
        }

        return false ;

    }

    public function getName()
    {
        return $this->name ;
    }

    public function getCourseName()
    {
        return $this->course ? $this->course->name : ''; 
    }
    public function getStudentEmail()
    {
        return $this->user ? $this->user->email : '';
    }
    

    


}
