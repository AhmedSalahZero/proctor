<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class ToggleStudentAbsence extends Controller
{

    public function __invoke(Student $student , Exam $exam)
    {
       $student->exams()->updateExistingPivot($exam->id , [
           'absence'=> ! $student->exams()->where('exams.id',$exam->id)->first()->pivot->absence
       ]);

       return redirect()->back()->with('success');

    }
}
