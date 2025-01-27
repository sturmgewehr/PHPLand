<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userService->getEdit($id);
        return view('blog.profiles.show', compact('user'));
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
//        dd($item);
        return view('blog.profiles.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->input();

//        Here can't update user password.
//        Need to change user data changing
//        (for password as example need to create ChangeUserPasswordController)
        $item = $this->userService->update($id, $data);

        if($item)
        {
            return redirect()->route('profile.edit', $item['user']['id'])
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
            return redirect('/')->with(['success' => 'Пользователь успешно удален']);
        } else
        {
            return back()->withErrors(['msg' => 'Ошибка удаления профиля']);
        }
    }
}
