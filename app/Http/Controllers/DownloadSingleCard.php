<?php

namespace App\Http\Controllers;

use App\Models\Certification;



class DownloadSingleCard extends Controller
{

    public function __invoke( Certification $certification )
    {


        \PDF::loadView('backend.emails.card.card_download', [
            'certification'=>$certification,
            'student'=>$certification->user,
            'public_path'=>true,
            'qrcode'=>$this->getFrontEndCardQrcode($certification,30)
        ]   , [ ] , [
//            'format'=>'A4-L' ,
            'format'=>[89 ,51] ,

        ])->download('Standard Certification - '. $certification->user->Full_Name . '  '.'.pdf' , [
            'default_font'=>'dejavusans'
        ] );
        return redirect()->back();

    }
}
