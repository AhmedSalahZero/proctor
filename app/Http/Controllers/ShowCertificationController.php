<?php

namespace App\Http\Controllers;

use App\Models\Certification;

class ShowCertificationController extends Controller
{

    public function __invoke(Certification $certification)
    {

        return view('frontend.showCertification')->with('certification',$certification);
    }
}
