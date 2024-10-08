<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isInstructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user('students') && $request->user('students')->isInstructor())
        {
            return $next($request);
        }
        return redirect()->route('front.login.user');
    }
}
