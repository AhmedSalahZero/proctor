<?php

namespace App\Providers;

use App\Models\Category ;
use App\Models\Certification;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Section;
use App\Models\Student;
use App\Models\UserAnswer;
use App\Observers\categoryObserver;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


//        if ($this->app->isLocal()) {
//            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
//        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
        Paginator::useBootstrap();
       

        App()->singleton('allAnswers',function(){
            return UserAnswer::all();
        });
        App()->singleton('allExams',function(){
            return \App\Models\Exam::all() ;
        });
        App()->singleton('currentUser',function(){
            return Auth()->user();
        });

        View::share('cardDomain' , getCardDomain());
        
        // dd(\App\Models\Student::where('id',309)->first()->getRightAndWrongQuestions());

//        App()->bind('currentSection',function(){
//            return Section::where('slug',Request()->segment(2))->first() ;
//        });


    }
}
