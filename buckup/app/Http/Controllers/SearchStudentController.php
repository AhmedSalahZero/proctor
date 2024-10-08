<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class SearchStudentController extends Controller
{

    public function __invoke(Request $request)
    {
        $searchWord = $request->input('search');

        if(ctype_digit($searchWord)) {
            return view('backend.students.view',[
                'students'=>Student::where('ID',$searchWord)
                    ->orWhere('Type_ID','like',"%$searchWord%")
                    ->orWhere('Phone','like',"%$searchWord%")
//                    ->orWhere('address','like',"%$searchWord%")
//                    ->orWhere('email','like',"%$searchWord%")
                    ->simplePaginate($this->paginationNumber)
            ]);
        }
        return view('backend.students.view',[
            'students'=>Student::where('User_Name','like',"%$searchWord%")
                     ->orWhere('Type_ID','like',"%$searchWord%")
                     ->orWhere('Phone','like',"%$searchWord%")
                     ->orWhere('Email','like',"%$searchWord%")
                ->orWhere('alt_email','like',"%$searchWord%")
                ->orWhere('Full_Name','like',"%$searchWord%")
                     ->simplePaginate($this->paginationNumber)
        ]);
    }
}
