<?php

namespace App\Jobs;

use App\Mail\CertificationMail;
use App\Models\Certification;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CertificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $student , $certification ;

    public function __construct(Student $student , Certification $certification)
    {
        $this->student = $student ;

        $this->certification = $certification ;

    }


    public function handle()
    {

        Mail::to($this->student->email)->send(new CertificationMail($this->student , $this->certification));
        if($this->student->alt_email) {
            Mail::to($this->student->alt_email)->send(new CertificationMail($this->student , $this->certification));
        }

    }
}
