<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// use function App\Helper\sendEmail;

class CertificationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $student , $certification;


    public function __construct($student,$certification)
    {
        $this->student = $student ;

        $this->certification = $certification ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(\sendEmail(),'IADC')
            ->subject('Certification Of '.$this->certification->course->name.' Course')
            ->view('backend.emails.certification-mail',[
                'student'=>$this->student ,
                'certification'=>$this->certification
            ]);

    }
}
