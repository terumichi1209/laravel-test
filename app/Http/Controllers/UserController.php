<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPost;
use App\Services\UserService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $users = (new UserService())->list();
        return view('user.list', ['users' => $users]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('user.create', ['user' => \Session::get('_old_input')]);
    }

    /**
     * @param StoreUserPost $request
     * @return RedirectResponse
     */
    public function store(StoreUserPost $request): RedirectResponse
    {
        $user = $request->all();
        if ((new UserService())->store($user)) {
            return redirect('/user/')->with('success_message', trans('message.success_save'));
        }
        return redirect('/user/')->with('error_message', trans('message.failed_save'));
    }
}
