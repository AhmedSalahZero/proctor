<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Student;
use Illuminate\Http\Request;

class ViewSingleCard extends Controller
{

    public function __invoke( Certification $certification )
    {

        return view('backend.emails.card.card', [
            'student'=>$certification->user ,
            'certification'=>$certification ,
            'qrcode'=>$this->getFrontEndCardQrcode($certification)
        ]);

//        return view('backend.emails.card.card', [
//            'student'=>$certification->user ,
//            'certification'=>$certification ,
//            'qrcode'=>$this->getBarcode($certification)
//        ]);
    }
}
