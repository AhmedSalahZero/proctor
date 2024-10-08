<?php

namespace App\Http\Controllers;

use App\Models\Certification;

use Illuminate\Http\Request;

class DownloadSingleBackCertification extends Controller
{

    public function __invoke( Certification $certification)
    {

        // header('Content-Type: application/pdf');
        \PDF::loadView('backend.emails.certification_back', [
            'certification'=>$certification,
            'student'=>$certification->user,
            'public_path'=>true ,
            'qrcode'=>$this->getFrontEndCardQrcode($certification , 75),
            'qrcode2'=>$this->getFrontEndCardQrcode($certification , 50)
        ] , [

        ] )->download('Certificate.pdf');
        return redirect()->back();
//        return view('backend.emails.certification',[
//            'download'=>true,
//            'student'=>$certification->user ,
//            'certification'=>$certification
//        ]);
    }
}
