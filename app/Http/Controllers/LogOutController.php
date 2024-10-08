<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogOutController extends Controller
{

    public function __invoke()
    {
        Auth('admins')->logout();

        Auth('students')->logout();

        return redirect()->route('login.index')->with('success','You Logged Out Successfully');
    }
}
