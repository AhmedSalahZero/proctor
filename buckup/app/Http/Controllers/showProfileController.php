<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class showProfileController extends Controller
{
    public function __invoke(Request $request)
    {
     return view('instructor.profile.index' , [
         'user'=>$request->user('students')
     ]);
    }
}
