<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class SetScoreAll extends Controller
{

    public function __invoke(Student $student , Exam $exam)
    {
//        $certification = $exam->certifications()->where('student_id',$student->ID)->first() ;
//
//        if($certification)
//        {
//            return $certification->update([
//                'score'=>Request('score') ,
//                'passed'=>Request('passed')??
//            ]) ;
//        }
//        if($this->exams()->wherePivot('exam_id',$exam->id)->first()->pivot->score != null)
//        {
//            return $this->exams()->wherePivot('exam_id',$exam->id)->first()->pivot->score ;
//        }
//        return 'No Score Yet ( Click To Edit )' ;


    }
}
