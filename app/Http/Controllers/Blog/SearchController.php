<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Services\BlogCategoryService;
use App\Services\BlogPostService;
use App\Services\UserService;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    /**
     * @var BlogPostService
     */
    private $blogPostService;

    /**
     * @var BlogCategoryService
     */
    private $blogCategoryService;

    /**
     * @var UserService
     */
    private $userService;

    public function __construct()
    {
        $this->blogPostService = app(BlogPostService::class);

        $this->blogCategoryService = app(BlogCategoryService::class);

        $this->userService = app(UserService::class);
    }

    public function index($condition = null, $value = null)
    {
        $condition = $_GET['condition'] ?? $condition;
        $value = $_GET['value'] ?? $value;

        if ($condition && $value)
        {
            $paginator = $this->blogPostService->getByCondition($condition, $value, 20);
        } else
        {
            $paginator = null;
        }
        return view('blog.search.index', compact(['paginator', 'value']));
    }

    public function userSearch()
    {
        
    }

    public function categorySearch()
    {
        
    }
}
