<?php

namespace App\Http\Controllers;

use App\Jobs\CertificationJob;

use App\Models\Certification;
use Illuminate\Http\Request;

class SendSingleCertification extends Controller
{

    public function __invoke( Certification $certification)
    {

        $data["email"]=$certification->user->Email;

        $data["client_name"]=$certification->user->User_Name;
        $data["subject"]='Certification';

        $pdf = \PDF::loadView('backend.emails.certification', [
            'certification'=>$certification,
            'student'=>$certification->user,
            'public_path'=>true ,
            'qrcode'=>$this->getFrontEndCardQrcode($certification , 75 ),
            'qrcode2'=>$this->getFrontEndCardQrcode($certification , 50)
        ]);

        \Mail::send('backend.emails.certification-message', [
            'student'=>$certification->user,

        ], function($message)use($data,$pdf,$certification) {
            $message->to($certification->user->Email,$certification->user->User_Name)
                ->subject('IADC Assessment Results')
                ->attachData($pdf->output(), "IADC Assessment Results.pdf");
        });

        if($certification->user->hasAltEmail())
        {
            $pdf = \PDF::loadView('backend.emails.certification', [
                'certification'=>$certification,
                'student'=>$certification->user,
                'public_path'=>true,
                'qrcode2'=>$this->getFrontEndCardQrcode($certification , 50),
                'qrcode'=>$this->getFrontEndCardQrcode($certification , 75 ) 
            ]);

            \Mail::send('backend.emails.certification-message', [
                'student'=>$certification->user,

            ], function($message)use($data,$pdf,$certification) {
                $message->to($certification->user->alt_email,$certification->user->User_Name)
                    ->subject('IADC Assessment Results')
                    ->attachData($pdf->output(), "IADC Assessment Results.pdf");
            });
        }

        return redirect()->back()->with('success','Certification Has Been Sent Successfully');

//            CertificationJob::dispatch($certification->user , $certification)->delay($this->mailDelayTime());
//
//            return redirect()->back()->with('success','Certification Email Has Been Sent');
    }
}
