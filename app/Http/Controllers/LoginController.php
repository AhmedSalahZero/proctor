<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.login.login');
    }

    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->input('email'))->first();

        $student = Student::where('User_Name', $request->input('email'))->OnlyAdmins()->first();
// dd($admin  , $student);
        if ($this->AuthUser($request, $admin, optional($admin)->password) ||
         $this->AuthUser($request,$student,
         optional($student)->Password, 'students')) {
            return response()->json([
                 'status'=>true,
                 'successUrl'=>route('dashboard'),
             ]);
        }

        return response()->json([
             'status'=>false,
             'failUrl'=>route('login.index'),
         ]);
    }

    private function AuthUser($request, $user, $password, $guard = 'admins')
    {
        if ($user) {
            if (($password) == $request->input('password')) {
                Auth($guard)->login($user);

                return true;
            }
        }

        return false;
    }
}
