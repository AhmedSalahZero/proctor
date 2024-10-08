<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class AbsenceStudentController extends Controller
{

    public function __invoke(Student $student , Exam $exam , bool $status)
    {

       $student->exams()->updateExistingPivot($exam->id , [
           'absence'=>! $status
       ]);

       return response()->json([
           'status'=>true ,
           'absence'=>(int) ! $status
       ]);
    }
}
