<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Arr;

class Authenticate extends Middleware
{

/*
 * I Have Added Handle Method
 *
 * */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }



    protected function redirectTo($request )
    {
        // dd();
        if (! $request->expectsJson()) {
            // if(Arr::first($this->guards )=== 'instructors'){
            //     return route('instructor.login.user');
            // }
            
            if(Arr::first($this->guards )=== 'students'){
                return route('front.login.user');
            }

        }
    }
}
