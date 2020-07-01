<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CheckCurrentUser
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
        define('USER_ID_POSITION', 1);

        $showed_user = $request->segments()[USER_ID_POSITION];

        if(Auth::id() == $showed_user)
        {
            return $next($request);
        }
        return back();
    }
}
