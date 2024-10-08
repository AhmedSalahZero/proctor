<?php

namespace App\Http\Controllers;

use App\Jobs\CertificationJob;

use App\Models\Certification;
use Illuminate\Http\Request;

class SendSingleCard extends Controller
{

    public function __invoke( Certification $certification)
    {

        $data["email"]=$certification->user->Email;

        $data["client_name"]=$certification->user->User_Name;
        $data["subject"]='Certification';

        $pdf = \PDF::loadView('backend.emails.card.card_download', [
            'certification'=>$certification,
            'student'=>$certification->user,
            'public_path'=>true,
            'qrcode'=>$this->getFrontEndCardQrcode($certification)
        ]);

        \Mail::send('backend.emails.card.card-message', [
            'student'=>$certification->user,

        ], function($message)use($data,$pdf,$certification) {
            $message->to($certification->user->Email,$certification->user->User_Name)
                ->subject('IADC Certification')
                ->attachData($pdf->output(), "IADC Card .pdf");
        });

        if($certification->user->hasAltEmail())
        {
            $pdf = \PDF::loadView('backend.emails.card.card_download', [
                'certification'=>$certification,
                'student'=>$certification->user,
                'public_path'=>true,
                'qrcode'=>$this->getFrontEndCardQrcode($certification)
            ]);

            \Mail::send('backend.emails.card.card-message', [
                'student'=>$certification->user,

            ], function($message)use($data,$pdf,$certification) {
                $message->to($certification->user->alt_email,$certification->user->User_Name)
                    ->subject('IADC Certification')
                    ->attachData($pdf->output(), "IADC Card.pdf");
            });
        }

        return redirect()->back()->with('success','Certification Has Been Sent Successfully');

    }
}
