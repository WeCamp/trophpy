<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserChallenge extends Pivot
{
    protected $table = 'user_challenges';
}
