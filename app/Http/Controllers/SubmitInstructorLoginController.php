<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use Illuminate\Http\Request;

class SubmitInstructorLoginController extends Controller
{

    public function __invoke(Request $request)
    {


//        $admin = Admin::where('email', $request->input('email'))->first();

        $userName = urldecode($request->input('User_Name'));

        $student = Student::where('User_Name',$userName)->first();

        if ($this->AuthUser($request,$student, optional($student)->Password, 'students')) {

            return redirect(route('instructor.home.index'));

        }

        Auth('students')->logout();

        return redirect()->route('instructor.login.user')->with('fail',isset($isValidToEnterExam) ? $isValidToEnterExam['reason'] : 'Error: Invalid Login Provided');
//        return response()->json([
//            'status'=>false,
//            'failUrl'=>route('login.index'),
//            'reason'=>isset($isValidToEnterExam) ? $isValidToEnterExam['reason'] : 'Error: Invalid Login Provided'
//        ]);

    }

    private function AuthUser($request, $user, $password, $guard = 'admins')
    {
        // dd($request->input('password'));
        if ($user && $user->isInstructor()) {
            if (($password) == $request->input('password')) {
                Auth($guard)->login($user);
                return true;
            }
        }

        return false;
    }

}
