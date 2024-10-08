<?php

namespace App\Http\Controllers;

use App\Models\Exam;

class ProctorController extends Controller
{
    public function index()
    {
        // dd(Auth('students')->user()->ID);
        return view('backend.proctors.view' , [
            'exams'=>Exam::where('proctor',Auth('students')->user()->ID)->get()
        ]);

    }



    
}
