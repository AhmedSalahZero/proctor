<?php

namespace App\Http\Controllers;

use App\Jobs\CertificationJob;
use App\Models\Certification;
use App\Models\Student;
use Illuminate\Http\Request;
use Mail;

use PDF;

class SendSingleReport extends Controller
{

    public function __invoke( Certification $certification)
    {
    //    ini_set('max_execution_time', 300);

        $data["email"]=$certification->user->Email;

        $data["client_name"]=$certification->user->User_Name;
        $data["subject"]='IADC Assessment Results';

        $pdf = PDF::loadView('backend.emails.score-report', [
            'certification'=>$certification,
           'student'=>$certification->user,
           'download'=>true ,
           'wrongAnswers'=>$certification->user->getRightAndWrongQuestions()
        ]);
        Mail::send('backend.emails.certification-message', [
            'student'=>$certification->user
        ], function($message)use($data,$pdf,$certification) {
            $message->to($certification->user->Email,$certification->user->User_Name)
                ->subject('IADC Assessment Results')
                ->attachData($pdf->output(), "IADC Assessment Results.pdf");
        });

        if($certification->user->hasAltEmail())
        {
            $pdf = PDF::loadView('backend.emails.score-report', [
                'certification'=>$certification,
                'student'=>$certification->user,
                'download'=>true ,
                'wrongAnswers'=>$certification->user->getRightAndWrongQuestions()
            ]);
            Mail::send('backend.emails.certification-message', [
                'student'=>$certification->user
            ], function($message)use($data,$pdf,$certification) {
                $message->to($certification->user->alt_email,$certification->user->User_Name)
                    ->subject('IADC Assessment Results')
                    ->attachData($pdf->output(), "IADC Assessment Results.pdf");
            });
        }

        return redirect()->back()->with('success','Email Has Sent Successfully');



//        $data["email"] = "ahmedconan17@yahoo.com";
//        $data["title"] = "From ItSolutionStuff.com";
//        $data["body"] = "This is Demo";
//
//        $pdf = \PDF::loadView('backend.emails.certification-mail', [
//            'certification'=>$certification,
//            'student'=>$certification->user
//        ]);
//
//        Mail::send('backend.emails.certification-mail', [
//            'certification'=>$certification,
//            'student'=>$certification->user
//        ], function($message)use($certification, $pdf) {
//            $message->to('ahmedconan17@yahoo.com', 'ahmedconan17@yahoo.com')
//                ->subject('subject here')
//                ->from(sendEmail())
//                ->attachData($pdf->output(), "text.pdf");
//        });

//        dd('Mail sent successfully');
//
//
//            CertificationJob::dispatch($certification->user , $certification)->delay($this->mailDelayTime());
//
//            return redirect()->back()->with('success','Report Email Has Been Sent');

    }
}
