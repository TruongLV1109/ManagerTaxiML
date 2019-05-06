<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
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
        if(Auth::check()) {
            //$user = Auth::user();
            // if($user->quyen == 1) {
            //     return next
            // }else {redirect('login')}
            return $next($request);
        } else {
            return redirect('login');
        }
    }
}
