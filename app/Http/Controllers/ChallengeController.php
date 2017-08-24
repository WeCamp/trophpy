<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function listAll()
    {

        $challenges = Challenge::all();
        dd($challenges);
        return view('challenges.list', compact('challenges'));
    }
}
