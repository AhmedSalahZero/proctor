<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructionsController extends Controller
{

    public function __invoke(Request $request)
    {
       return view('frontend.instructions');
    }
}
