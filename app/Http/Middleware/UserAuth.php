<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //added condition to redirect to home page
    //after this middleware needs to be registered (added) to Kernel.php

    public function handle(Request $request, Closure $next)
    {
        if($request->path()=='login' && $request->session()->has('user'))
        {
            return redirect ('/');
        }
        return $next($request);
    }
}
