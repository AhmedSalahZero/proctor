<?php

namespace App\Http\Controllers;

use App\Models\Certification;

use Illuminate\Http\Request;

class DownloadInstructorCertification extends Controller
{

    public function __invoke( )
    {
    $instructor = Auth('students')->user();
    $instructorCertification = $instructor->instructorCertification ; 
    if(! $instructorCertification )
    {
        return redirect()->back()->with('fail' ,'Can Not Find Certification For This Instructor');
    }
        // header('Content-Type: application/pdf');
        \PDF::loadView('backend.emails.instructor-certification', [
            'format' => [190, 236],
            'instructorCertification'=>$instructorCertification
            // 'certification'=>$certification,
            // 'student'=>$certification->user,
            // 'public_path'=>true ,
            // 'qrcode'=>$this->getFrontEndCardQrcode($certification , 75),
            // 'qrcode2'=>$this->getFrontEndCardQrcode($certification , 50)
        ] , [

        ] , [
           'format'=>[279.4,215.9] ,
        //    'format'=>'B4' ,
            // 'format'=>[200 ,500] ,

        ] )->download('Instructor Certification.pdf');
        return redirect()->back();
//        return view('backend.emails.certification',[
//            'download'=>true,
//            'student'=>$certification->user ,
//            'certification'=>$certification
//        ]);
    }
}
