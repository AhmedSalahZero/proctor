<?php

namespace App\Observers;

use App\Models\Stack;

class StackObserver
{
    public function deleting(Stack $stack)
    {
        $stack->certifications()->update([
            'stack_id'=>null
        ]);
    }
}
