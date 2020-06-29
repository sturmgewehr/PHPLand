<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdatePasswordController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->userService = app(UserService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $passwords = $request->only(['password', 'old']);

        $result = $this->userService->changePassword($passwords);

        if( $result )
        {
            return redirect()->route('profile.edit', Auth::id())
                ->with(['success' => 'Пароль успешно изменен']);
        } else
        {
            return back()->withErrors(['msg' => 'Ошибка смены пароля']);
        }
    }

}
