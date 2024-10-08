<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontLoginController extends Controller
{

    public function __invoke(Request $request)
    {


        return view('frontend.login');
    }
}
