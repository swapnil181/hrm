<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
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
        if((Auth::user()->role=="EscalationManager")||(Auth::user()->role=="Admin")){
           return $next($request);

        }
        else{
         return redirect('/');
        }
        
    }
}
