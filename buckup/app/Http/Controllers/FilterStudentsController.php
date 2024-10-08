<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class FilterStudentsController extends Controller
{

    public function __invoke(Request $request)
    {
        $search = $request->input('keyword') ;

        $students = Student::where('User_Name','like',"%$search%")
//            ->orWhere('Email','like',"%$search%")
//            ->orWhere('Full_Name','like',"%$search%")
//            ->orWhere('Phone','like',"%$search%")
//            ->orWhere('alt_email','like',"%$search%")
//            ->orWhere('ID','like',"%$search%")
            ->get();

        if(count($students)) {
            return response()->json([
                'status'=>'success',
                'students'=>$students
            ]);
        }

        return response()->json([
            'status'=>false ,
        ]);
    }
}
