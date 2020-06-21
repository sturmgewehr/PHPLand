<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Services\BlogCategoryService;

class CategoryController extends BaseController
{
    /**
     * @var BlogCategoryService
     */
    private $blogCategoryService;

    public function __construct()
    {
        $this->blogCategoryService = app(BlogCategoryService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogCategoryService->getAllWithPaginate(5);
        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->blogCategoryService->getForComboBox();

        return view('blog.admin.categories.create', compact(['item', 'categoryList']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();

        $result = $this->blogCategoryService->create($data);

        if($result)
        {
            return redirect()->route('blog.admin.categories.create')
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
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->blogCategoryService->getEdit($id);

        $categoryList = $this->blogCategoryService->getForComboBox();

        return view('blog.admin.categories.edit', compact(['item', 'categoryList']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $data = $request->input();

        $item = $this->blogCategoryService->update($id, $data);
        if($item)
        {
            return redirect()->route('blog.admin.categories.edit', $item->id)
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
        $result = $this->blogCategoryService->destroy($id);

        if($result)
        {
            return redirect()->route('blog.admin.categories.index')
                ->with(['success' => 'Успешно удалено']);
        } else
        {
            return back()->withErrors(['msg' => 'Ошибка удаления'])
                ->withInput();
        }
    }
}
