<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\View\View;

final class ChallengeController extends Controller
{
    public function listAll(): View
    {
        $challengesAsArray = Challenge::all()->toArray();

        return view('challenges.list', ['challenges' => $challengesAsArray]);
    }
}