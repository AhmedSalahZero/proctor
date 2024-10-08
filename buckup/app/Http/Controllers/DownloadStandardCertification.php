<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF ;


class DownloadStandardCertification extends Controller
{

    public function __invoke( Certification $certification )
    {



        \PDF::loadView('backend.emails.basic.certification-mail', [
            'certification'=>$certification,
            'student'=>$certification->user,
        ] )->download('Basic Certification - '. $certification->user->User_Name. ' - ' .'.pdf');
        return redirect()->back();
    }
}
