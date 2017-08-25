<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function view(User $user): View
    {

        return view('users.view')->with([
            'user' => $user->toArray(),
            'currentChallenges' => $user->currentChallenges->toArray(),
            'completedChallenges' => $user->completedChallenges->toArray(),
        ]);
    }
}   
