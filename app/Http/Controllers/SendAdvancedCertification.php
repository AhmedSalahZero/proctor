<?php

namespace App\Http\Controllers;

use App\Jobs\CertificationJob;

use App\Models\Certification;
use Illuminate\Http\Request;

class SendAdvancedCertification extends Controller
{

    public function __invoke( Certification $certification)
    {

        $data["email"]=$certification->user->Email;

        $data["client_name"]=$certification->user->User_Name;
        $data["subject"]='Certification';

        $pdf = \PDF::loadView('backend.emails.advanced.download_adv_cert', [
            'certification'=>$certification,
            'student'=>$certification->user,
            'public_path'=>true,
            'qrcode'=>$this->getFrontEndCardQrcode($certification)
        ]);

        \Mail::send('backend.emails.advanced.certification-message', [
            'student'=>$certification->user,

        ], function($message)use($data,$pdf,$certification) {
            $message->to($certification->user->Email,$certification->user->User_Name)
                ->subject('IADC Certification')
                ->attachData($pdf->output(), "IADC Advanced Certification.pdf");
        });

        if($certification->user->hasAltEmail())
        {
            $pdf = \PDF::loadView('backend.emails.advanced.download_adv_cert', [
                'certification'=>$certification,
                'student'=>$certification->user,
                'public_path'=>true,
                'qrcode'=>$this->getFrontEndCardQrcode($certification)
            ]);

            \Mail::send('backend.emails.advanced.certification-message', [
                'student'=>$certification->user,

            ], function($message)use($data,$pdf,$certification) {
                $message->to($certification->user->alt_email,$certification->user->User_Name)
                    ->subject('IADC Certification')
                    ->attachData($pdf->output(), "IADC Advanced Certification.pdf");
            });
        }

        return redirect()->back()->with('success','Certification Has Been Sent Successfully');

    }
}
