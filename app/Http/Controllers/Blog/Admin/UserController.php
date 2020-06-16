<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->userRepository->getAllWithPaginate(15);
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
        $item = $this->userRepository->getEdit($id);
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
        $item = $this->userRepository->getEdit($id);
        if(empty($item))
        {
            return back()->withErrors(['msg' => "Пользователь id=[{$id}] не найден"])
                ->withInput();
        }

        $data = $request->input();

        $result = $item->update($data);
        if($result)
        {
            return redirect()->route('blog.admin.users.edit', $id)
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
        $result = User::destroy($id);
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
