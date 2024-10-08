<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmInfoController extends Controller
{

    public function __invoke(Request $request)
    {
        return view(
            'frontend.confirm_info'
        );
    }
}
