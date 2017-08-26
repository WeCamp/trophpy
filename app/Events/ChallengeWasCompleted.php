<?php
declare(strict_types=1);

namespace App\Events;

use App\Models\Challenge;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class ChallengeWasCompleted
{

    use Dispatchable, SerializesModels;

    /**
     * @var Challenge
     */
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

    public function getChallenge(): Challenge
    {
        return $this->challenge;
    }

}
