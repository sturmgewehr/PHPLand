<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct()
    {
        $this->userService = app(UserService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->userService->getAllWithPaginate(15);
        return view('blog.admin.users.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(__METHOD__);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);

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
        $item = $this->userService->getEdit($id);
        return  view('blog.admin.users.edit', compact('item'));
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
        $data = $request->input();

        $item = $this->userService->update($id, $data);

        if($item)
        {
            return redirect()->route('blog.admin.users.edit', $item->id)
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
        $result = $this->userService->destroy($id);
        if($result)
        {
            return redirect()->route('blog.admin.users.index')
                ->with(['success' => 'Успешно удалено']);
        } else
        {
            return back()->withErrors(['msg' => 'Ошибка удаления'])
                ->withInput();
        }
    }
}
