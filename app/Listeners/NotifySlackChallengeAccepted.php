<?php

namespace App\Listeners;

use App\Events\ChallengeWasAccepted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Maknz\Slack\Attachment;
use Maknz\Slack\AttachmentField;
use Trophpy\Slack\SlackNotifier;

class NotifySlackChallengeAccepted
{

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
     * @param  ChallengeWasAccepted  $event
     * @return void
     */
    public function handle(ChallengeWasAccepted $event)
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
            'title' => 'Trophpy challenge accepted!',
            'pretext' => "@{$username} just accepted a challenge!"
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
