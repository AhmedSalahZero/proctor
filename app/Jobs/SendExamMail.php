<?php

namespace App\Jobs;

use App\Mail\CertificationMail;
use App\Mail\ExamMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendExamMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $users , $exam ;

    public function __construct($users,$exam)
    {
        $this->users = $users;
        $this->exam = $exam ;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->users instanceof Collection ?
            $this->users->each(function($student){

                $this->sendMailTo($student);

            //    sleep(5);

            })
            :
            $this->sendMailTo($this->users);

    }

    private function sendMailTo($student)
    {
        Mail::to($student->Email)->send(new ExamMail($this->exam,$student));
        if($student->hasAltEmail()){
            Mail::to($student->alt_email)->send(new ExamMail($this->exam,$student));
        }
    }
}
