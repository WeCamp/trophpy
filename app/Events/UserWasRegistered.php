<?php
declare(strict_types=1);

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

final class UserWasRegistered
{

    use SerializesModels;

    /** @var User */
    private $user;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
