<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function currentChallenges(): BelongsToMany
    {
        return $this->belongsToMany(Challenge::class, 'user_challenges')
            ->using('\App\Models\UserChallenge')
            ->whereNotNull('started_on')
            ->whereNull('completed_on')
            ->withPivot(['id', 'started_on'])
            ->orderBy('started_on');
    }

    public function completedChallenges(): BelongsToMany
    {
        return $this->belongsToMany(Challenge::class, 'user_challenges')
            ->using('\App\Models\UserChallenge')
            ->whereNotNull('started_on')
            ->whereNotNull('completed_on')
            ->withPivot(['id', 'started_on', 'completed_on'])
            ->orderBy('completed_on', 'desc');
    }

    public function challenges() : BelongsToMany
    {
        return $this->belongsToMany(Challenge::class, 'user_challenges')
        ->using('\App\Models\UserChallenge')
        ->whereNotNull('started_on')
            ->withPivot(['id', 'started_on', 'completed_on']);
    }

    public function availableChallenges(): Collection
    {
       return Challenge::all()->filter(function(Challenge $challenge) {
           return $this->challenges->contains($challenge) === false;
       });
    }
}
