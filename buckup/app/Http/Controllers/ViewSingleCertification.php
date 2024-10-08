<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Certification;

class ViewSingleCertification extends Controller
{

    public function __invoke( Certification $certification)
    {
        return view('backend.emails.showCertification' , [
            'student'=>$certification->user ,
            'certification'=>$certification
        ]);
        // return view('backend.emails.certification', [

        // ]);
    }
}
