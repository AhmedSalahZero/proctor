<?php

namespace App\Http\Controllers\Certification;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class DownloadCertification extends Controller
{
      public function downloadSingleCertification(
        //   $lang
    //   ,
      Certification $certification
      )
    {
        
        $qrcode = \QrCode::encoding('UTF-8')->size(100)->generate(Request()->root().'/en/certifications/'.$certification->id) ;
        $qrcodeAsString =$qrcode->__toString() ;
        $qrcodeWithoutString = str_replace('<?xml version="1.0" encoding="UTF-8"?>','',$qrcodeAsString);
        $pdf = \PDF::loadView('certifications.download', [
            'certification'=>$certification,
            'download'=>true,
            'qrcodeAsString'=>$qrcodeWithoutString
        ])->stream($certification->user_name . " Certification.pdf");

    }

    public function showSingleCertification(Certification $certification)
    {
         $qrcode = \QrCode::encoding('UTF-8')->size(100)->generate(Request()->root().'/en/certifications/'.$certification->getId()) ;
        $qrcodeAsString =$qrcode->__toString() ;
        $qrcodeWithoutString = str_replace('<?xml version="1.0" encoding="UTF-8"?>','',$qrcodeAsString);


        return view('certifications.download')->with('certification',$certification)
            ->with('qrcodeAsString',$qrcodeWithoutString);
            
    }
}
