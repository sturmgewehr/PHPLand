<?php

namespace App\Http\Middleware;

use App\Services\BlogPostService;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class UsersArticle
{

    /**
     * @var BlogPostService
     */
    private $postService;

    public function __construct()
    {
        $this->postService = app(BlogPostService::class);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        define('ARTICLE_ID_POSITION', 2);

        $article_id = $request->segments()[ARTICLE_ID_POSITION];

        $post = $this->postService->getEdit($article_id);

        if(Auth::check() && Auth::user()->id == $post['user']['id'])
        {
            return $next($request);
        }
        return redirect()->route('blog.posts.index')->withErrors(['msg' => 'У вас нет доступа к редактированию этой статьи']);
    }
}
