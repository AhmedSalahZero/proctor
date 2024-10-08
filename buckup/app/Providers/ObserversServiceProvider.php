<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Exam;
use App\Models\Media;
use App\Models\Permission;
use App\Models\Question;
use App\Models\Rule;
use App\Models\Stack;
use App\Observers\categoryObserver;
use App\Observers\ExamObserver;
use App\Observers\MediaObserver;
use App\Observers\PermissionsObserver;
use App\Observers\QuestionObserver;
use App\Observers\RuleObserver;
use App\Observers\StackObserver;
use Illuminate\Support\ServiceProvider;

class ObserversServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Question::observe(QuestionObserver::class);
       // Stack::observe(StackObserver::class);

    }
}
