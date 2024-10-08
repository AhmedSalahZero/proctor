<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontLogoutController extends Controller
{

    public function __invoke(Request $request)
    {
        Auth()->guard('students')->logout();

        return redirect()->route('front.login.user');
    }
}
