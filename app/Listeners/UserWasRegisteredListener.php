<?php
declare(strict_types=1);

namespace App\Listeners;

use App\Events\UserWasRegistered;
use Trophpy\Slack\SlackNotifier;

final class UserWasRegisteredListener
{

    /**
     * Handle the event.
     *
     * @param  UserWasRegistered $event
     *
     * @return void
     */
    public function handle(UserWasRegistered $event)
    {
        $user = $event->getUser();
        $link = route('users.view', $user->username);

        SlackNotifier::new()
                     ->text("{$user->name} just joined Trophpy, checkout the profile at: {$link}!")
                     ->dispatch()
        ;
    }
}
