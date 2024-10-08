<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignoutInstructorController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if($request->user('students'))
        {
            Auth('students')->logout();
        }

        return \redirect()->route('instructor.login');
    }
}
