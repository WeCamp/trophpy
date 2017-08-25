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
        $user = Auth::user();
        $challenges = $user->availableChallenges();

        return view('challenges.list', ['challenges' => $challenges->toArray()]);
    }

    /**
     * @param $challengeId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function startChallenge($challengeId)
    {
        $user = Auth::user();
        $challenge = Challenge::findOrFail($challengeId);
        $user->currentChallenges()->attach($challenge);

        return redirect(route('challenges.listAll', Auth::user()->username));
    }

    /**
     * @param $challengeId Id of Challenge
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function completeChallenge($challengeId)
    {
        $user = Auth::user();
        $user->currentChallenges()->sync([
            $challengeId => [
                'completed_on' => Carbon::now()
            ]
        ], false);

        return redirect(route('users.view', $user->username));
    }
}