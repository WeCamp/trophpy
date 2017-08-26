<?php

namespace App\Listeners;

use App\Events\ChallengeWasCompleted;
use App\Models\Challenge;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Maknz\Slack\Attachment;
use Maknz\Slack\AttachmentField;
use Trophpy\Slack\SlackNotifier;

class NotifySlackOnChallengeCompleted
{
    /** @var Challenge */
    private $challenge;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ChallengeWasCompleted  $event
     * @return void
     */
    public function handle(ChallengeWasCompleted $event)
    {
        $this->challenge = $event->getChallenge();
        $attachment = $this->createNotificationAttachment();

        SlackNotifier::new()
            ->from('Trophpy Challenge Notifier')
            ->attach($attachment)
            ->queue();
    }

    private function createNotificationAttachment(): Attachment {
        $username = Auth::user()->username;
        $attributes = [
            'color' => '#36a64f',
            'title' => 'Trophpy challenge completed!',
            'pretext' => "@{$username} might have taken your place on the leaderboard, find out now! ".route('leaderboard.show')
        ];

        $attachment = new Attachment($attributes);
        $attachmentFields = $this->createAttachmentFields();

        $attachment->setFields($attachmentFields);

        return $attachment;
    }

    private function createAttachmentFields():array {
        return [
            new AttachmentField(['title' => 'User', 'value' => Auth::user()->name]),
            new AttachmentField(['title' => 'Challenge', 'value' => $this->challenge->title]),
        ];
    }
}
