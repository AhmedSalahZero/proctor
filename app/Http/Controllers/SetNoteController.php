<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class SetNoteController extends Controller
{

    public function __invoke(Student $student , Exam $exam)
    {
        // dd(Request('score'));

     //   dump(Request('score'));

    //  dd($student->exams()->updateExistingPivot($exam->id , [
    //     'note'=>Request('score') ,

    //  ]));


       $student->exams()->updateExistingPivot($exam->id , [
           'note'=>Request('score') ,

       ]);

       return response()->json([
           'status'=>true ,
           'score'=>Request('score')
       ]);
    }
}
