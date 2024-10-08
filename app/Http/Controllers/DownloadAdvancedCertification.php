<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Support\Facades\Config;


class DownloadAdvancedCertification extends Controller
{


    public function __invoke( Certification $certification )
    {
       
        \PDF::loadView('backend.emails.advanced.download_adv_cert', [
            'certification'=>$certification,
            'student'=>$certification->user,
            'public_path'=>true,
            'qrcode'=>$this->getFrontEndCardQrcode($certification,50)
        ])->download('Advanced Certification - '. $certification->user->Full_Name . ' - '.'.pdf' ,[]);
        return redirect()->back();
    }
}
