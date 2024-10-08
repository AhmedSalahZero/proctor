<?php

namespace App\Observers;

class QuestionObserver
{
    public function deleting($question)
    {
        $question->answers()->delete();
    }

}
