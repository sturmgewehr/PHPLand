<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogPost;
use App\Services\BlogCategoryService;
use App\Services\BlogPostService;
use Illuminate\Support\Facades\Cookie;

class PostController extends BaseController
{
    /**
     * @var BlogCategoryService
     */
    private $blogCategoryService;

    /**
     * @var BlogPostService
     */
    private $blogPostService;

    public function __construct()
    {
        $this->blogCategoryService = app(BlogCategoryService::class);

        $this->blogPostService = app(BlogPostService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogPostService->getAllPublishedWithPaginate(20);

        $categoryList = $this->blogCategoryService->getForComboBox();

        return view('blog.posts.index', compact(['paginator', 'categoryList']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogPost();
        $categoryList = $this->blogCategoryService->getForComboBox();

        return view('blog.posts.create', compact(['item', 'categoryList']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        $data = $request->input();

        $result = $this->blogPostService->create($data);

        if($result)
        {
            return redirect()->route('blog.posts.index')
                ->with(['success' => 'Успешно сохранено']);
        } else
        {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->blogPostService->getEdit($id);

        $categoryList = $this->blogCategoryService->getForComboBox();

        return view('blog.posts.show', compact(['item', 'categoryList']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->blogPostService->getEdit($id);

        $categoryList = $this->blogCategoryService->getForComboBox();

        return view('blog.posts.edit', compact(['item', 'categoryList']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $data = $request->input();

        $item = $this->blogPostService->update($id, $data);

        if($item)
        {
            return redirect()->route('blog.posts.edit', $item['post']['id'])
                ->with(['success' => 'Успешно сохранено']);
        } else
        {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->blogPostService->destroy($id);
        if($result)
        {
            return redirect()->route('blog.posts.index')
                ->with(['success' => 'Успешно удалено']);
        } else
        {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
