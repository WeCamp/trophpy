<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{

    /**
     * View a user profile (retrieved by username)
     * @param User $user
     *
     * @return $this
     */
    public function view(User $user)
    {
        $user = $user->toArray();

        return view('users.view')->with(compact('user'));
    }
}
