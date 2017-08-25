<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

final class ChallengeController extends Controller
{
    public function listAll(): View
    {
        $challengesAsArray = Challenge::all()->toArray();

        return view('challenges.list', ['challenges' => $challengesAsArray]);
    }

    /**
     * @param $userChallengeId Id of UserChallenge
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function completeChallenge($userChallengeId)
    {
        $user = Auth::user();
        $currentChallenge = $user->currentChallenges()->wherePivot('id', $userChallengeId)->firstOrFail();
        $currentChallenge->pivot->update(['completed_on' => Carbon::now()]);

        return redirect(route('users.view', Auth::user()->username));
    }
}