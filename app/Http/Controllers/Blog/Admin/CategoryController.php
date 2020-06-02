<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var BlogCategoryRepository $blogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct()
    {
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogCategoryRepository->getAllWithPaginate(5);
        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.categories.create', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
//        dd($request, __METHOD__);
        $data = $request->input();

        $item = BlogCategory::create($data);

        if($item)
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
        dd(__METHOD__);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd(__METHOD__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
