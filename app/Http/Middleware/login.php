<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::Check()) {
            if(Auth::User()->role > 0) {

                return redirect('/admin');
                } else {

                return redirect('/index');
                }
            }
            else {
            return $next($request);
        }
    }
}
