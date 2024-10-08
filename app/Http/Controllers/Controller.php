<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Traits\FormRequest;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests , FormRequest;

    public $paginationNumber = 15 ;

    protected function mailDelayTime():Carbon
    {
        return now()->addSeconds(5);
    }

    public function getFrontEndCardQrcode(Certification  $certification,$size=100){

        $qrcode = \QrCode::size($size)->generate($certification->getAdvancedLink($certification));  ;
        // $qrcode = \QrCode::size($size)->generate($certification->getCertificationFrontLink());  ;


        $qrcodeAsString =$qrcode->__toString() ;

        return  str_replace('<?xml version="1.0" encoding="UTF-8"?>','',$qrcodeAsString);
    }

}
