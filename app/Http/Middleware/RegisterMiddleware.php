<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RegisterMiddleware
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
        //dd(Auth::user());
        if(Auth::check()){
        if(Auth::user()->reg_step==0){
            return redirect('/verify');
        }
        if(Auth::user()->reg_step==1){
            return redirect('complete_profile_1');
        }
        if(Auth::user()->reg_step==2) {
            return redirect('complete_profile_2');
        }
    }
        return $next($request);
    }
}
