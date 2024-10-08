<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class HasScoreAll extends Controller
{

    public function __invoke(Student $student , Exam $exam)
    {
//        dd('has Score All');

    }
}
