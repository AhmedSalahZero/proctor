<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class AssignUserToExam extends Controller
{

    public function __invoke(Request $request , Student $student )
    {

        $exam = Exam::where('id',$request->input('exam_id'))->firstOrFail();

        if($exam->hasCertifications()){

        $exam->createCertificationFromExistingFor($student->ID);

        $exam->assignStudents($student->ID);



        return redirect()->route('students.index')->with('success','Student Has Been Assigned To '. $exam->title . ' Exam Successfully ');

        }
        return redirect()->back()->with('fail','This Exam Does Not has Any Certifications Yet') ;
    }
}
