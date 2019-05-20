<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckEmployee
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
        if(Auth::user()->role!="Employee"){
            
            return redirect('/');
        }    
        return $next($request);
    }
}
