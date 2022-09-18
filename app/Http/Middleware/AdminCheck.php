<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {                     //mudar pro role 3    que criei de adminis
        if (Auth::check() && Auth::user()->role == 3) {
            return $next($request);
            
        }else{
            if (!Auth::check()){
                return redirect('/');
            }
            return redirect('/');
        }
            //cassio controler de usuario
       
    }
}


