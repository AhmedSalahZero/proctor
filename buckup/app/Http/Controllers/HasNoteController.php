<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class HasNoteController extends Controller
{

    public function __invoke(Student  $student , Exam $exam)
    {
        return response()->json([
            'status'=>true ,
            'HasScore'=>$student->exams()->where('exam_id',$exam->id)->first()->pivot->note != null,
            'score'=>$student->exams()->where('exam_id',$exam->id)->first()->pivot->note ,
            // 'passed'=>$student->exams()->where('exam_id',$exam->id)->first()->pivot->score >= $exam->pass_percentage
        ])  ;
    }
}
