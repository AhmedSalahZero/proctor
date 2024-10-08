<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LicenseAgreementController extends Controller
{

    public function __invoke(Request $request)
    {
        return view('frontend.license_agreement') ;
    }
}
