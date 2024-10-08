<?php

namespace App\Observers;

use App\Models\Rule;

class RuleObserver
{
    public function deleting(Rule $rule)
    {

        $rule->users()->delete();

        $rule->sectionsPermissions()->detach();

    }
}
