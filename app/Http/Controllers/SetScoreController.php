<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class SetScoreController extends Controller
{

    public function __invoke(Student $student , Exam $exam)
    {
     //   dump(Request('score'));
       $student->exams()->updateExistingPivot($exam->id , [
           'score'=>Request('score') ,

       ]);

       return response()->json([
           'status'=>true ,
           'score'=>Request('score')
       ]);
    }
}
