<?php

namespace App\Http\Controllers;

use App\Models\User;

class LeaderBoardController extends Controller
{
    /**
     * Show a list of users ordered by ranking
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show() {
        $users = User::with('completedChallenges')->get()->sortByDesc(function($user){
            return $user->score();
        });

        return view('leaderBoard.show', ['users' => $users]);
    }
}
