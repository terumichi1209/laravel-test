<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\View\View;

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
}
