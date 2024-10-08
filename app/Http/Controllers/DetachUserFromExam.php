<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class DetachUserFromExam extends Controller
{

    public function __invoke(Student $student , Exam $exam)
    {
        Certification::where('exam_id',$exam->id)->where('student_id',$student->ID)->delete();

        $student->exams()->detach($exam->id);

        return redirect()->back()->with('success','Student Has Been Removed Successfully From '.$exam->title . ' Exam');
    }
}
