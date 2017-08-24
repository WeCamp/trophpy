<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function view(User $user): View
    {
        $user = $user->toArray();

        return view('users.view')->with(compact('user'));
    }
}
