<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Administrator
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
        $user = Auth::user();
        return $next($request);
        if($user->roles[0]->role_name == "administrator"){
            return $next($request);
        }else{
            // return route('home');
            abort(503);
        }
    }
}
