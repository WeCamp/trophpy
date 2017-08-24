<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Http\Request;

class LeaderBoardController extends Controller
{
    /**
     * Show a list of users ordered by ranking
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show() {
        $usersAsArray = User::orderBy('name', 'asc')->get()->toArray();

        return view('leaderBoard.show', ['users' => $usersAsArray]);
    }
}
