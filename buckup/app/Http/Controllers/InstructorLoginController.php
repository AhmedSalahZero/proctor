<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorLoginController extends Controller
{

    public function __invoke(Request $request)
    {
        if(Auth('admins')->check())
        {
            Auth('admins')->logout();
        }
        if(Auth('students')->check())
        {
           
            if(Auth('students')->user()->isInstructor())
            {
                return redirect()->route('instructor.home.index');
            }
            Auth('students')->logout();
        }
        return view('instructor.login.login');


    }
}
