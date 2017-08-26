<?php
declare(strict_types=1);

namespace App\Events;

use App\Models\Challenge;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

final class ChallengeWasAccepted
{
    use Dispatchable, SerializesModels;

    private $challenge;

    /**
     * Create a new event instance.
     *
     * @param Challenge $challenge
     */
    public function __construct(Challenge $challenge)
    {
        $this->challenge = $challenge;
    }

    /**
     * @return Challenge
     */
    public function getChallenge(): Challenge
    {
        return $this->challenge;
    }
}
