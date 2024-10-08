<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
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
        if (Auth()->guard('admins')->check() || Auth('students')->check() && Auth('students')->user()->isProctor() || (Auth()->guard('students')->check() && Auth('students')->user()->isAdmin())) {
            return  $next($request);
        }

        return redirect()->route('login.index');
    }
}
