<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class UsersArticle
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
        if(Auth::check() && Auth::user()->id == Cookie::get('users_article'))
        {
            return $next($request);
        }
        return redirect()->route('blog.posts.index')->withErrors(['msg' => 'У вас нет доступа к редактированию этой статьи']);
    }
}
