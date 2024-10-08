<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Student;
use Illuminate\Http\Request;

class ViewAdvancedCertification extends Controller
{

    public function __invoke( Certification $certification )
    {

        return view('backend.emails.advanced.advanced_certification', [
            'student'=>$certification->user ,
            'certification'=>$certification ,
            'qrcode'=>$this->getFrontEndCardQrcode($certification)
        ]);
    }
}
