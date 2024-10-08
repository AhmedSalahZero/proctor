<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class CloseExam extends Controller
{

    public function __invoke(Exam $exam)
    {
        $exam->update([
            'end'=>true ,
            'end_date'=>now()
        ]);

        return redirect()->back()->with('success','Exam Has Been Closed Successfully');

    }
}
