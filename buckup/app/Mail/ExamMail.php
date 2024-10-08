<?php

namespace App\Mail;

// use function App\Helper\sendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamMail extends Mailable
{
    use Queueable, SerializesModels;

    private $exam;
    private $student;

    public function __construct($exam, $student)
    {
        $this->exam = $exam;
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //$this->exam
        return $this->from(\sendEmail(), 'wellsharp')
            ->subject('WellSharp Knowledge Exam Session - '.\Carbon\Carbon::make($this->exam->start_date)->format('d M Y'))
            ->markdown('backend.emails.exam_mail', [
                'url'=>'123',
                'exam'=>$this->exam,
                'student'=>$this->student,
                'owner'=>'wellsharp',

            ]);
    }
}
