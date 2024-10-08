<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Jobs\SendExamMail;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ExamMail extends Controller
{
    public function __invoke(Exam $exam )
    {
        if($exam->hasStudents()) {

           SendExamMail::dispatch($exam->students,$exam)->delay($this->mailDelayTime());

            return redirect()->route('exams.index')->with('success','Emails Have Been Sent Successfully');
        }

        return redirect()->back()->with('fail','This Exam Has No Student Yet ! ') ;

    }
}
