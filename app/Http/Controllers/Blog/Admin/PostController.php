<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\BlogPost;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Services\BlogCategoryService;
use App\Services\BlogPostService;

class PostController extends BaseController
{
    /**
     * @var BlogPostService
     */
    private $blogPostService;

    /**
     * @var BlogCategoryService
     */
    private $blogCategoryService;

    public function __construct()
    {
        $this->blogPostService = app(BlogPostService::class);
        $this->blogCategoryService = app(BlogCategoryService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogPostService->getAllWithPaginate(25);
        return view('blog.admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        return view('blog.admin.posts.edit', compact(['item', 'categoryList']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BlogPostUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $data = $request->input();

        $item = $this->blogPostService->update($id, $data);

        if($item)
        {
            return redirect()->route('blog.admin.posts.edit', $item->id)
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
            return redirect()->route('blog.admin.posts.index')
                ->with(['success' => 'Успешно удалено']);
        } else
        {
            return back()->withErrors(['msg' => 'Ошибка удаления'])
                ->withInput();
        }
    }
}
